<?php
class IndexController extends Controller{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            // Deny all unauthenticated users
            array('deny',
                'users'=>array('?'),
            ),            
            array('allow',  // allow all users to perform actions
                'users'=>array('@'),
            ),                        
        );
    }

    public function actionList(){
    	$showDone = !isset($_REQUEST['filter']['show_done'])?1:$_REQUEST['filter']['show_done'];
    	$assigned_to = !isset($_REQUEST['filter']['assigned_to'])?array():$_REQUEST['filter']['assigned_to'];
    	$param = array();

		$cmdCount = Yii::app()->db->createCommand()
			->select("count(*)")
			->from('tbl_employee_task et')
			->join("tbl_users u1", "u1.id = et.created_by ")
			->leftJoin('tbl_users u', 'et.done_by = u.id');

		$cmd = Yii::app()->db->createCommand()
			->selectDistinct("et.*, (
				SELECT GROUP_CONCAT(tag SEPARATOR ', ') 
				FROM tbl_user_tags 
				WHERE deleted =0 
				AND related_id = et.id
				AND related_module = 'employeetask'
				) AS assigned_to, 
				concat_ws(' ', u.first_name, u.last_name) as done_by,
				concat_ws(' ', u1.first_name, u1.last_name) as created_by_fullname ")
			->from('tbl_employee_task et')
			->join("tbl_users u1", "u1.id = et.created_by ")
			->leftJoin('tbl_users u', 'et.done_by = u.id');

		$where = array('AND', ' et.deleted =0 ');
		if(!$showDone){
			$where[] = "(et.done IS NULL OR et.done != 1) ";
		}
		
		$join = array();
		if(is_array($assigned_to) && count($assigned_to )> 0){
			$cmdCount->leftJoin("tbl_user_tags tag", "et.id = tag.related_id AND related_module = 'employeetask' AND tag.deleted =0");
			$cmd->leftJoin("tbl_user_tags tag", "et.id = tag.related_id AND related_module = 'employeetask' AND tag.deleted =0");
			$where[] = array('IN', 'tag', $assigned_to);
		}
		$cmdCount->where($where);
		$cmd->where($where);
		
		$totalRowCount = $cmdCount->queryScalar();
        $page = $_REQUEST['page']?$_REQUEST['page']:1;
        $offset = ($page-1)*Yii::app()->params['entryPerPage'];

        $cmd->limit(Yii::app()->params['entryPerPage'], $offset)
            ->order('et.date_created DESC');
		
		$return['rows'] = $cmd->queryAll();
        $return['pagination']= array(
            'totalPages' => ceil($totalRowCount/Yii::app()->params['entryPerPage']),
            'currentPage'=>$page
        );        
		$this->renderJson($return);
    }
    
    public function actionCreate(){
    	$return = array();
		$et =new EmployeeTask();
		$et->title = $_REQUEST['title'];
		$et->description = $_REQUEST['description'];
		$et->related_to = $_REQUEST['related_to'];
		$assigned_to = isset($_REQUEST['assigned_to'])?$_REQUEST['assigned_to']:array();
		$et->tags = join(',', $assigned_to);
		$et->repeat= $_REQUEST['repeat'];
		if($et->repeat== 1){
			$phpdateFormat = UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format);
			$et->repeat_from = UtilityManager::formatDate($_REQUEST['repeat_from'], $phpdateFormat.' H:i:s', 'Y-m-d H:i:s');
			if(!empty($_REQUEST['repeat_to'])){
				$et->repeat_to = UtilityManager::formatDate($_REQUEST['repeat_to'], $phpdateFormat, 'Y-m-d');
			}
			$et->repeat_type = $_REQUEST['repeat_type'];
			if($et->repeat_type == 'week'){
				$types = array();
				for($i=0; $i<7; $i++){
					if(isset($_REQUEST['extra']["week_$i"])){
						$types[] = $i;
					}
				}
				$et->repeat_extra = join(',', $types);
			}
			else{
				$et->repeat_extra = $_REQUEST['extra'];
			}
		}
		else{
			$et->repeat_from = null;
			$et->repeat_to = null;
			$et->repeat_type = null;
			$et->repeat_extra = null;
		}		

		if($et->validate(array('title', 'description', 'related_to', 'repeat_from', 'repeat_to', 'repeat_type', 'repeat_extra'), false) and !empty($assigned_to)){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				if($et->save(false)){
					if(is_array($assigned_to) && count($assigned_to)> 0){
						$this->setTags($assigned_to, $et->id);
					}
					$et = $et->findByPk($et->id);
					$return['employeetask'] = $et;
					$transaction->commit();
					$httpResponseCode = 200;
				}
				else{
	                //Save failed
	                $return['errors'] = $et->getErrors();				
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
            $return['errors'] = $et->getErrors();			
            if(empty($assigned_to)){
				$return['errors']['assigned_to'][] = EmployeetaskModule::t('assigned_to_can_not_be_blank');
            }
            $httpResponseCode = 400;
		}
		
		$this->renderJson($return, $httpResponseCode);
    }

    public function actionUpdate($id){
    	$return = array();
        parse_str(file_get_contents("php://input"), $put_vars);
        $_REQUEST = array_merge($_REQUEST, $put_vars);
		$et = EmployeeTask::model()->findByPk((int)$id);
		
		if($et->created_by != Yii::app()->user->id){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}
		
		$et->title = $_REQUEST['title'];
		$et->description = $_REQUEST['description'];
		$et->related_to = $_REQUEST['related_to'];
		$assigned_to = isset($_REQUEST['assigned_to'])?$_REQUEST['assigned_to']:array();
		
		$et->repeat= $_REQUEST['repeat'];
		if($et->repeat== 1){
			
			$phpdateFormat = UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format);
			if(!empty($_REQUEST['repeat_from'])){
				$et->repeat_from = UtilityManager::formatDate($_REQUEST['repeat_from'], $phpdateFormat.' H:i:s', 'Y-m-d H:i:s');
			}
			if(!empty($_REQUEST['repeat_to'])){
				$et->repeat_to = UtilityManager::formatDate($_REQUEST['repeat_to'], $phpdateFormat, 'Y-m-d');
			}
			$et->repeat_type = $_REQUEST['repeat_type'];
			if($et->repeat_type == 'week'){
				$types = array();
				for($i=0; $i<7; $i++){
					if(isset($_REQUEST['extra']["week_$i"])){
						$types[] = $i;
					}
				}
				$et->repeat_extra = join(',', $types);
			}
			else{
				$et->repeat_extra = $_REQUEST['extra'];
			}
			
		}
		else{
			$et->repeat_from = null;
			$et->repeat_to = null;
			$et->repeat_type = null;
			$et->repeat_extra = null;
		}
		if($et->validate(array('title', 'description', 'related_to', 'repeat_from', 'repeat_to', 'repeat_type', 'repeat_extra'), false) and !empty($assigned_to)){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				if($et->save(false)){
					if(is_array($assigned_to) && count($assigned_to)> 0){
						$this->setTags($assigned_to, $et->id);
					}
					$et = $et->findByPk($et->id);
					$return['employeetask'] = $et;
					$transaction->commit();
					$httpResponseCode = 200;
				}
				else{
	                //Save failed
	                $return['errors'] = $et->getErrors();				
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
            $return['errors'] = $et->getErrors();
            if(empty($assigned_to)){
				$return['errors']['assigned_to'][] = EmployeetaskModule::t('assigned_to_can_not_be_blank');
            }            
            $httpResponseCode = 400;
		}
		$this->renderJson($return, $httpResponseCode);
    }

    public function actionView($id){
		$return = array();
		$cmd =Yii::app()->db->createCommand("SELECT et.*, 
			concat(u.first_name, ' ', u.last_name) related_to_name,
			concat_ws(' ', u2.first_name, u2.last_name) as done_by
			FROM tbl_employee_task et
			LEFT JOIN tbl_users u on et.related_to=u.id
			LEFT JOIN tbl_users u2 on et.done_by=u2.id
			WHERE et.deleted =0
			AND et.id = :id");
		$et = $cmd->queryRow(true, array(':id'=>$id));
		
		$return['employeetask'] = $et;
		$return['employeetask']['assigned_to'] = $this->getTags($et['id']);
		$this->renderJson($return);
    }

    public function actionDelete($id){
        $et = EmployeeTask::model()->findByPk((int)$id);
		if($et->created_by != Yii::app()->user->id){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}
        
        $et->delete();
        $this->renderJson($return);
		
    }
    
    public function actionSetDone($id){
		$et = EmployeeTask::model()->findByPk((int)$id);
		$et->markAsDone();
		
		$return = array();
		
		$cmd =Yii::app()->db->createCommand("SELECT et.*, 
			concat(u.first_name, ' ', u.last_name) related_to_name,
			concat_ws(' ', u2.first_name, u2.last_name) as done_by
			FROM tbl_employee_task et
			LEFT JOIN tbl_users u on et.related_to=u.id
			LEFT JOIN tbl_users u2 on et.done_by=u2.id
			WHERE et.deleted =0
			AND et.id = :id");
		$et = $cmd->queryRow(true, array(':id'=>$id));		
		$return['employeetask'] = $et;
        $this->renderJson($return);
    }

    public function actionTags(){
    	//Only user with is_service_accout = 1 and its tag
		$q = $_REQUEST['q'];
		$sql = "SELECT DISTINCT tag
			FROM (
				SELECT concat(u.first_name, ' ', u.last_name) tag
				FROM tbl_users u 
				WHERE concat(first_name, ' ', last_name) LIKE :query
				AND u.is_service_account != 1
				UNION
				SELECT tag 
				FROM tbl_user_tags tag
				WHERE deleted =0
				AND tag LIKE :query
			) AS A
			ORDER BY tag";
		$cmd = Yii::app()->db->createCommand($sql);
		$tags = $cmd->queryColumn(array(':query'=>"%{$q}%"));
		$return = array();
		$return['tags']= $tags;
		$this->renderJson($return);
    }

    public function actionTaskTags(){
    	//Only tags assigned to employee task
		$q = $_REQUEST['q'];
		$sql = "SELECT DISTINCT tag 
			FROM tbl_user_tags tag
			WHERE deleted =0
			AND related_module = 'employeetask'
			AND tag LIKE :query
			ORDER BY tag";
		$cmd = Yii::app()->db->createCommand($sql);
		$tags = $cmd->queryColumn(array(':query'=>"%{$q}%"));
		$return = array();
		$return['tags']= $tags;
		$this->renderJson($return);
    }    

    public function actionUserTags(){
    	//Only tags assigned to employee task
		$q = $_REQUEST['q'];
		$sql = "SELECT concat(u.first_name, ' ', u.last_name) name, username, id
			FROM tbl_users u 
			WHERE concat(first_name, ' ', last_name) LIKE :query
			ORDER BY name";
		$cmd = Yii::app()->db->createCommand($sql);
		$tags = $cmd->queryAll(true, array(':query'=>"%{$q}%"));
		$return = array();
		$return['tags']= $tags;
		$this->renderJson($return);
    }

    private function setTags($tags, $taskId){
    	$oldTags = $this->getTags($taskId);
    	
    	//Delete removed tags
    	$deleteTags = array_diff($oldTags, $tags);
    	Yii::app()->db->createCommand()
    		->update("tbl_user_tags",
    			array('deleted'=>'1'),
    			array('and', 
    				"related_id=:task_id AND related_module = 'employeetask'",	
    				array('in', 'tag', $deleteTags)
    			),
    			array(':task_id'=>$taskId)
    		);
    	
    	
    	//Add new tags
    	$addTags = array_diff($tags, $oldTags);
		$sql = "INSERT INTO tbl_user_tags 
			(`date_created`, `date_modified`, `deleted`, `created_by`, `modified_by`, `tag`, `related_id`, `related_module`)
			VALUES (now(), now(), 0, :created_by, :modified_by, :tag, :task_id, 'employeetask')";
		$cmd = Yii::app()->db->createCommand($sql);
		foreach($addTags as $tag){
			$cmd->execute(array(
				":created_by"=>Yii::app()->user->id,
				":modified_by"=>Yii::app()->user->id,
				":tag"=>$tag,
				":task_id"=>$taskId,
				)
			);
		}
    }
    
    private function getTags($taskId){
		$sql = "SELECT tag 
			FROM tbl_user_tags 
			WHERE deleted=0 
			AND related_module = 'employeetask' 
			AND related_id = :task_id";

		$cmd = Yii::app()->db->createCommand($sql);
		$tags = $cmd->queryColumn(array(':task_id'=>$taskId));
		if(empty($tags)){
			$tags = array();
		}
		return $tags;
    }	
}