<?php
class IndexController extends Controller{

	public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules(){
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
    	$userId = $this->getContextUserId();
    	$params = array();
    	$where[] = "AND";
    	$where[] = " deleted = 0 ";
    	$where[] = " assigned_to = :user_id ";
    	$params[':user_id'] = $userId;
		$cmdCount = Yii::app()->db->createCommand()->select('count(*)')
			->from('tbl_anxiety_files')
			->where($where, $params);
		
		$cmd = Yii::app()->db->createCommand()->select('id, name, filename, guid')
			->from('tbl_anxiety_files')
			->where($where, $params)
			->order('name');
        $cmd->limit(Yii::app()->params['entryPerPage'], $offset)
            ->order('date_created DESC');
		
		
		$totalRowCount = $cmdCount->queryScalar();
        $page = $_REQUEST['page']?$_REQUEST['page']:1;
        $offset = ($page-1)*Yii::app()->params['entryPerPage'];
		
		$return['rows'] = $cmd->queryAll();
        $return['pagination']= array(
            'totalPages' => ceil($totalRowCount/Yii::app()->params['entryPerPage']),
            'currentPage'=>$page
        );        
		$this->renderJson($return);            			
			
    }
    
    public function actionCreate(){
    	$userId = $this->getContextUserId();
    	$return = array();
		$af =new AnxietyFiles();
		$af->name = $_REQUEST['name'];
		$af->description = $_REQUEST['description'];
		$af->assigned_to = $userId;
		$af->filename = $_REQUEST['filename'];
		$af->guid = $_REQUEST['guid'];
		$httpResponseCode = 200;
		if($af->validate(array('name', 'filename', 'guid'), false) ){
			if($af->save(false)){
				$af = $af->findByPk($af->id);
				$return['acute'] = $af;
				$httpResponseCode = 200;
			}
			else{
                //Save failed
                $return['errors'] = $af->getErrors();
                $httpResponseCode = 500;
			}
		}
		else{
            //Validation failed
            $return['errors'] = $af->getErrors();			
            $httpResponseCode = 400;
		}
		$this->renderJson($return, $httpResponseCode);
    }

    public function actionUpdate($id){
    	$userId = $this->getContextUserId();
    	$return = array();
        parse_str(file_get_contents("php://input"), $put_vars);
        $_REQUEST = array_merge($_REQUEST, $put_vars);
		$af = AnxietyFiles::model()->findByPk((int)$id);
		
		if($af->assigned_to != $userId && Yii::app()->user->superuser != 1){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}
		
		$af->name = $_REQUEST['name'];
		$af->description = $_REQUEST['description'];
		$af->filename = $_REQUEST['filename'];
		//Remove previously uploaded file
		$this->removeFile($af->guid);
		$af->guid = $_REQUEST['guid'];
		if($af->validate(array('name', 'filename', 'guid'), false) ){
			if($af->save(false)){
				$af = $af->findByPk($af->id);
				$return['acute'] = $af;
				$httpResponseCode = 200;
			}
			else{
                //Save failed
                $return['errors'] = $af->getErrors();				
                $httpResponseCode = 500;
			}
		}
		else{
            //Validation failed
            $return['errors'] = $af->getErrors();
            $httpResponseCode = 400;
		}
		$this->renderJson($return, $httpResponseCode);
    }

    public function actionView($id){
    	$userId = $this->getContextUserId();
		$return = array();
		$af = AnxietyFiles::model()->findByPk((int)$id);		
		if($af->assigned_to != $userId && Yii::app()->user->superuser !=1){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}		
		$return['acute'] = $af;
		$this->renderJson($return);
    }

    public function actionDelete($id){
    	$userId = $this->getContextUserId();
        $af = AnxietyFiles::model()->findByPk((int)$id);
		//Remove previously uploaded file
		if($af->assigned_to != $userId && Yii::app()->user->superuser !=1){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}
        
        $af->delete();
        $this->removeFile($af->guid);
        $this->renderJson($return);
    }
    
    public function actionUpload(){
    	if(!empty($_REQUEST['id'])){
			$id = $_REQUEST['id'];
		}
		$error =array();
        $allowedExtensions = array('mp3');
        // max file size in bytes
        $sizeLimit = $this->module->sizeLimit;

        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $guid = $this->getGUID();
        // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
        $result = $uploader->handleGUIDUpload($guid, $this->module->filesDir);
        
        if($result['success']){
			$return['code']=0;
			$return['guid']=$result['guid'];
			$return['filename']=$result['filename'];
			$return['success']=1;
        }
        else{
			$return['code'] = 12;
			$return['error'] = $result['error'];
        }
		echo htmlspecialchars(json_encode($return), ENT_NOQUOTES);
    }
    
    public function actionDownload($id, $guid){

    	$userId = $this->getContextUserId();
		$af = AnxietyFiles::model()->find("deleted=0 AND id=:id AND guid=:guid", array(':id'=>(int)$id, ':guid'=>$guid));
		if(!$af or ($af->assigned_to !=$userId && Yii::app()->user->superuser != 1) ){
			throw new CHttpException(403, "You are not authorized to perform this action.");
		}
		$file = $this->module->filesDir.'/'.$af->guid;
		if(!file_exists($file)){
			throw new CHttpException(404);
		}
		return Yii::app()->getRequest()->sendFile($af->filename, @file_get_contents($file));
    }
    
    private function removeFile($guid){
		$file = $this->module->filesDir.'/'.$guid;
		if(file_exists($file)){
			@unlink($file);
		}
    }
}