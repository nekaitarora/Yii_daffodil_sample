<?php
define("NO_ALERT", 0);
define("RED_ALERT", "red");
define("YELLOW_ALERT", "yellow");
define("GREEN_ALERT", "green");

class IndexController extends Controller
{
     public function filters(){
        return CMap::mergeArray(parent::filters(),array(
            'accessControl',
        ));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules(){
        return array(
            // Deny all unauthenticated users
            array('deny',
                'users'=>array('?'),
            ),
            //Allow only authenticated
            array('allow',
                'users'=>array('@'),
            ),
        );
    } 
    
    public function actionList(){
        $page = $_REQUEST['page']?$_REQUEST['page']:1;
        $offset = ($page-1)*Yii::app()->params['entryPerPage'];        
        $user_id = $this->getContextUserId();

        $countCmd = Yii::app()->db->createCommand();
        $totalRowCount = $countCmd->select("count(*)")
            ->from('tbl_measurements')
            ->where('assigned_user_id=:user_id and deleted=0',array(':user_id'=> $user_id))
            ->queryScalar();


        $cmd = Yii::app()->db->createCommand();
        $measurement = $cmd->select("id, date_entered, 
        	oxygenSaturation, lungFunction, pulse, temperature,  
        	difficultyBreating, inceasedCough, coloredSputum, state")
            ->from('tbl_measurements')
            ->where('assigned_user_id=:user_id and deleted=0',array(':user_id'=> $user_id))
            ->order('date_entered DESC')
            ->limit(Yii::app()->params['entryPerPage'], $offset)
            ->queryAll();

        $return['measurement'] = $measurement;
        $return['pagination']= array(
            'totalPages' => ceil($totalRowCount/Yii::app()->params['entryPerPage']),
            'currentPage'=>$page
        );        
        $this->renderJson($return);            
    }

    public function actionMeasurementsAfterGivenDateTime($userid){
        if (!Yii::app()->user->superuser){
            throw new CHttpException(403,"You are not authorized to perform this action.");
        }
        
        $where = array('AND', 'assigned_user_id=:user_id and deleted=0');
        $params = array(':user_id'=> $userid);
        if(isset($_REQUEST['datetime']) && !empty($_REQUEST['datetime'])){
			$where[]= "date_entered >= :dt";
			$params[':dt'] = $_REQUEST['datetime'];
        }


        $cmd = Yii::app()->db->createCommand();
        $measurement = $cmd->select("id, date_entered, 
        	oxygenSaturation, lungFunction, pulse, temperature,  
        	difficultyBreating, inceasedCough, coloredSputum, state")
            ->from('tbl_measurements')
            ->where($where, $params)
            ->order('date_entered DESC')
            ->queryAll();

        $return['measurement'] = $measurement;
        $this->renderJson($return);            
    }

    
    public function actionView($id){
        $user_id = $this->getContextUserId();
        $cmd = Yii::app()->db->createCommand();
        $measurement = $cmd->select("id, name, reason, date_entered, 
        	oxygenSaturation, lungFunction, pulse, temperature, 
        	difficultyBreating, inceasedCough, coloredSputum, state")
            ->from('tbl_measurements')
            ->where('deleted =0  AND id = :id', array(':id'=>$id))
            ->queryRow();  
            
        if(Yii::app()->user->superuser == 1 or $measurement['assigned_user_id'] == $user_id){
			$return['measurement'] = $measurement;
        }
        else{
			$return['measurement'] = false;
        }
        $this->renderJson($return);
    }
    
    public function actionCreateCOPDMeasurement(){
        $measurement = new Measurement();
        
        $measurement->name = $_REQUEST['name'];
        $measurement->reason = $_REQUEST['reason'];
        $measurement->difficultyBreating = $_REQUEST['difficultyBreating'];
        $measurement->inceasedCough = $_REQUEST['inceasedCough'];
        $measurement->lungFunction = str_replace(',', '.', $_REQUEST['lungFunction']);
        $measurement->pulse = $_REQUEST['pulse'];
        $measurement->state = $_REQUEST['state'];
        $measurement->coloredSputum = $_REQUEST['coloredSputum'];
        $measurement->temperature = str_replace(',', '.', $_REQUEST['temperature']);
        $measurement->oxygenSaturation = $_REQUEST['oxygenSaturation'];
        $measurement->assigned_user_id = $this->getContextUserId();
        
        $return = array();
        if($measurement->validate(array('name', 'reason','lungFunction', 'pulse', 'state', 'temperature', 'oxygenSaturation'), false)){
        	$transaction = Yii::app()->db->beginTransaction();
        	try{
	            if($measurement->save(false)){
	                $this->setServiceboardColor($measurement->state, $measurement->assigned_user_id, substr($measurement->date_entered, 0, 10));
	                if(in_array($measurement->state, array('yellow', 'red'))){
	                    $this->setServiceboardTooltipMessage($measurement->reason, $measurement->assigned_user_id, 
	                        substr($measurement->date_entered, 0, 10), $measurement->id);
	                }
	                $measurement->refresh();
	                if(!empty($_REQUEST['calendar_relate_measurement'])){
						Yii::app()->db->createCommand()->update(
							'calendar_relate_measurement',
							array('measurement_id'=>$measurement->id),
							array("id=:id"),
							array(':id'=>$_REQUEST['calendar_relate_measurement'])
						);
	                }
	                
	                $return['measurement'] = $measurement;
	                $cmd = Yii::app()->db->createCommand("SELECT message FROM tbl_messages WHERE language=:lang AND id = :id");
	                $message = $cmd->queryScalar(array(':id'=>$measurement->message_id, ':lang'=>Yii::app()->user->language));
	                $return['message'] = $message;
	                $transaction->commit();
	                $httpResponseCode =200;
	            }
	            else{
	                //Save failed
	                $return['errors'] = $measurement->getErrors();
	                $transaction->rollback();
	                $httpResponseCode = 500;
	            }
        	}
        	catch(Exception $e){
				$transaction->rollback();
				$return['message']=$e->getMessage();				
				$httpResponseCode = 500;
        	}

        }
        else{
            //Validation failed
            $return['errors'] = $measurement->getErrors();
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);        
    }
    
    public function actionUpdateCOPDMeasurement($id){
        parse_str(file_get_contents("php://input"), $put_vars);
        $_REQUEST = array_merge($_REQUEST, $put_vars);        
        $measurement = Measurement::model()->findByPk((int)$id);
        
        $measurement->name = $_REQUEST['name'];
        $measurement->reason = $_REQUEST['reason'];
        $measurement->difficultyBreating = $_REQUEST['difficultyBreating'];
        $measurement->inceasedCough = $_REQUEST['inceasedCough'];
        $measurement->lungFunction = str_replace(',', '.', $_REQUEST['lungFunction']);
        $measurement->pulse = $_REQUEST['pulse'];
        $measurement->state = $_REQUEST['state'];
        $measurement->coloredSputum = $_REQUEST['coloredSputum'];
        $measurement->temperature = str_replace(',', '.', $_REQUEST['temperature']);
        $measurement->oxygenSaturation = $_REQUEST['oxygenSaturation'];
                
        $return = array();
        if($measurement->validate(array('name', 'reason','lungFunction', 'pulse', 'state', 'temperature', 'oxygenSaturation'), false)){
        	$transaction = Yii::app()->db->beginTransaction();
        	try{
	            if($measurement->save(false)){
	                $this->setServiceboardColor($measurement->state, $measurement->assigned_user_id, substr($measurement->date_entered, 0, 10));
	                if(in_array($measurement->state, array('yellow', 'red'))){
	                    $this->setServiceboardTooltipMessage($measurement->reason, $measurement->assigned_user_id, 
	                        substr($measurement->date_entered, 0, 10), $measurement->id);
	                }
	                $return['measurement'] = $measurement;
	                $transaction->commit();
	                $httpResponseCode = 200;
	            }
	            else{
	                //Save failed
	                $return['errors'] = $measurement->getErrors();
	                $transaction->rollback();
	                $httpResponseCode = 500;
	            }
        	}
        	catch(Exception $e){
				$transaction->rollback();
				$return['message']=$e->getMessage();				
				$httpResponseCode = 500;
        	}	            
        }
        else{
            //Validation failed
            $return['errors'] = $measurement->getErrors();
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);
    }
    
    public function actionDelete($id){
        $measurement = Measurement::model()->findByPk((int)$id);
        $this->deleteMeasurementTooltipMessage($measurement->id);
        $measurement->delete();
        $this->renderJson($return);        
    }
    
    public function actionGetLast3Measurement(){
        
        $user_id = $this->getContextUserId();
        $user = User::model()->findByPk($user_id);
        $cmd = Yii::app()->db->createCommand();
        $measurement = $cmd->select("id, date_entered, oxygenSaturation, lungFunction, pulse, temperature, 
        	difficultyBreating, inceasedCough, coloredSputum, state, reason")
            ->from('tbl_measurements')
            ->where('assigned_user_id=:user_id AND deleted =0',array(':user_id'=> $user_id))
            ->order('date_entered DESC')
            ->limit('3')
            ->queryAll();
        $return['measurement'] = $measurement;
        $return['gender'] = $user->sex==1?'man':'woman';
        $this->renderJson($return);         
    }

    private function setServiceboardColor($color, $userId, $serviceboardDate){
        
        $sbc = ServiceboardDayColor::model()->find('user_id = :user_id AND  serviceboard_date=:serviceboardDate', 
            array(':user_id'=> $userId, ':serviceboardDate'=>$serviceboardDate));
        
        if($sbc){
            if($color == 'red' && in_array($sbc->color, array('','green', 'oranage', 'yellow'))){
                $sbc->color = 'red';
            }
            if($color == 'yellow' && in_array($sbc->color, array('', 'green', 'oranage'))){
                $sbc->color = 'yellow';
            }
            $sbc->save(false);
        }
        else{
            $sbc = new ServiceboardDayColor();
            $sbc->color = $color;
            $sbc->serviceboard_date = $serviceboardDate;
            $sbc->user_id = $userId;
            $sbc->save(false);
        }
    }

    private function setServiceboardTooltipMessage($message, $userId, $serviceboardDate, $measurementId){
        
        $msg = ServiceboardTooltipMessages::model()->find("deleted =0 AND related_module='measurement' AND related_id=:related_id", array(':related_id'=>$measurementId));
        if(!$msg){
            $msg = new ServiceboardTooltipMessages;
        }
        $msg->serviceboard_date =  $serviceboardDate;
        $msg->message = $message;
        $msg->user_id = $userId;
        $msg->related_module = 'measurement';
        $msg->related_id = $measurementId;
        $msg->save(false);
    }
    
    private function deleteMeasurementTooltipMessage($measurementId){
        ServiceboardTooltipMessages::model()->updateAll(array('deleted'=>1), "deleted =0 AND related_module='measurement' AND related_id=:related_id", array(':related_id'=>$measurementId));
    }
}