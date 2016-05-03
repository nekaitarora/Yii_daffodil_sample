<?php

class IndexController extends Controller{
	public function actionList(){
		foreach($this->module->forms as $form){
			$return['forms'][$form]= FormsModule::t($form);
		}
        $this->renderJson($return); 		
	}

	public function actionGetFormData($event_id, $model){
		$lModel =str_replace(array('{', '}'), array('', ''), $model::model()->tableName());
        $cmd = Yii::app()->db->createCommand();
        $row = $model::model()->find('deleted =0 AND event_id = :event_id AND assigned_user_id= :assigned_user_id', array(
            ':event_id'=>$event_id,
            ':assigned_user_id'=>$this->getContextUserId(),
        ));
        
        $return[$lModel] = $row;
        $this->renderJson($return);
	}
	
	public function actionSaveFormData($model){
		$modelClass = $model;
		$lModelClass =str_replace(array('{', '}'), array('', ''), $modelClass::model()->tableName());
		if($_REQUEST[$lModelClass]['id']){
			$model = $modelClass::model()->findByPk((int)$_REQUEST[$lModelClass]['id']);
		}
		else{
			$model = new $modelClass();
		}
		$columns = $modelClass::model()->tableSchema->columns;
		foreach($_REQUEST[$lModelClass] as $k=>$v){
			if(!empty($v) && $columns[$k]->dbType == 'date'){
				$_REQUEST[$lModelClass][$k] = UtilityManager::formatDate($v, UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
			}
			if($v=='null'){
				unset($_REQUEST[$lModelClass][$k]);
			}
		}
		
		$model->setAttributes($_REQUEST[$lModelClass], false);
		$model->assigned_user_id = $this->getContextUserId();

		if($_REQUEST['saveDraft'] != 1){
			$model->submitted = 1;
		}
		
		$return = array();
		$columnToValidate = array_keys($columns);
		unset($columnToValidate[array_search('id', $columnToValidate)]);
        if($model->validate($columnToValidate, false)){
            if($model->save(false)){
            	$return[$lModelClass] = $model;
                $httpResponseCode = 200;
            }
            else{
                //Save failed
                $return['errors'] = $model->getErrors();
                $httpResponseCode = 500;
            }
        }
        else{
            //Validation failed
            $return['errors'] = $model->getErrors();
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);        
	}
	
	public function actionSaveChangeSchema(){
		unset($_REQUEST['change_schema']['messages']);
		$lModelClass =str_replace(array('{', '}'), array('', ''), ChangeSchema::model()->tableName());
		if($_REQUEST['change_schema']['id']){
			$model = ChangeSchema::model()->findByPk((int)$_REQUEST['change_schema']['id']);
		}
		else{
			$model = new ChangeSchema();
		}
		$columns = ChangeSchema::model()->tableSchema->columns;
		foreach($_REQUEST[$lModelClass] as $k=>$v){
			if(!empty($v) && $columns[$k]->dbType == 'date'){
				$_REQUEST[$lModelClass][$k] = UtilityManager::formatDate($v, UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
			}
			if($v =='' or $v=='null'){
				unset($_REQUEST[$lModelClass][$k]);
			}
		}
		
		$model->setAttributes($_REQUEST[$lModelClass], false);
		$model->assigned_user_id = $this->getContextUserId();

		$contextUserId = $this->getContextUserId();
		$fallCommentCanNotbeEmpty = false;
		$baseline = ChangeSchemaBaseline::model()->find("deleted =0 AND assigned_user_id = :assigned_user_id", array(':assigned_user_id'=>$contextUserId));
		if($baseline && ($_REQUEST['change_schema']['fall'] - $baseline->fall)>0 && empty($_REQUEST['change_schema']['fall_comment']) ){
			$fallCommentCanNotbeEmpty = true;
		}
		if($_REQUEST['saveDraft'] != 1){
			$model->submitted = 1;
		}
		
		$return = array();
		$columnToValidate = array('mood', 'memory', 'social_activity', 'sleep_disorder', 'how_does_the_home_look', 
	        'what_citizen_can_do', 'generally_initiative_of_citizen', 'the_degree_of_hygiene', 
	        'physical_activity', 'fall', 'appetite', 'thirst', 'weight', 'feces_pattern', 
	        'urination', 'breathing', 'cough', 'fatigue', 'pain', 'dizzy', 'fall_comment',
			'more_than_5_preparations', 'discharged_with_medication_changes', 
            'manages_citizen_his_daily_medication', 'does_citizen_take_other_medicine', 
            'does_citizen_take_alternative_medicine', 'are_there_old_medicine_in_cabinet');

        if($model->validate($columnToValidate, false)){
            if($model->save(false)){
            	$return[$lModelClass] = $model->find("id=:id", array(':id'=>$model->id));
            	if(strlen($return[$lModelClass]->messages) > 0){
					$return[$lModelClass]->messages = explode('##', $return[$lModelClass]->messages);
            	}
            	else{
					$return[$lModelClass]->messages = array();
            	}
            	
                $httpResponseCode = 200;
            }
            else{
                //Save failed
                $return['errors'] = $model->getErrors();
                $httpResponseCode = 500;
            }
        }
        else{
            //Validation failed
            $return['errors'] = $model->getErrors();
            if($fallCommentCanNotbeEmpty){
				$return['errors']['fall_comment'][] = FormsModule::t('caution_always_feedback_when_dropping');
            }             
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);        
	}	

	public function actionGetChangeSchemaData($event_id){
		$contextUserId = $this->getContextUserId();
		$model = 'ChangeSchema';
		$lModel =str_replace(array('{', '}'), array('', ''), $model::model()->tableName());
        $cmd = Yii::app()->db->createCommand();
        $row = $model::model()->find('deleted =0 AND event_id = :event_id AND assigned_user_id= :assigned_user_id', array(
            ':event_id'=>$event_id,
            ':assigned_user_id'=>$this->getContextUserId(),
        ));
        
        $return[$lModel] = $row;
        $messages = array();
        if(strlen($return[$lModel]['messages']) > 0){
			$messages = explode('##', $return[$lModel]['messages']);
        }
        
        foreach($messages as $k =>$msg){
			if(empty($msg)){
				unset($messages[$k]);
			}
        }
        $return[$lModel]['messages'] = $messages;
        $baselineObj = ChangeSchemaBaseline::model()->find("deleted =0 AND assigned_user_id = :assigned_user_id", array(':assigned_user_id'=>$contextUserId));

        if (!empty($baselineObj))
		{
			$baseline = $baselineObj->getAttributes();
	        unset($baseline['does_citizen_take_alternative_medicine']);
	        unset($baseline['does_citizen_take_other_medicine']);
		}

        $return['baseline'] = $baseline;
        $this->renderJson($return);
	}				

	public function actionGetChangeSchema($id){
		$contextUserId = $this->getContextUserId();
		$model = 'ChangeSchema';
		$lModel =str_replace(array('{', '}'), array('', ''), $model::model()->tableName());
        $cmd = Yii::app()->db->createCommand();
        $row = $model::model()->find('deleted =0 AND id = :id', array(':id'=>$id));
        
        $return[$lModel] = $row;
        $messages = array();
        if(strlen($return[$lModel]['messages']) > 0){
			$messages = explode('##', $return[$lModel]['messages']);
        }
        
        $return[$lModel]['messages'] = $messages;
        $return['baseline'] = ChangeSchemaBaseline::model()->find("deleted =0 AND assigned_user_id = :assigned_user_id", array(':assigned_user_id'=>$contextUserId));
        $this->renderJson($return);
	}				

	public function actionGetTobs($id){
		$model = 'Tobs';
		$lModel =str_replace(array('{', '}'), array('', ''), $model::model()->tableName());
        $cmd = Yii::app()->db->createCommand();
        $row = $model::model()->find('deleted =0 AND id=:id', array(':id'=>$id));
        
        $return[$lModel] = $row;
        
        $this->renderJson($return);
	}	
}