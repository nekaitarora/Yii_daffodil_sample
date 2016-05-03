<?php
class IndexController extends Controller{
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

        $cmdCount = Yii::app()->db->createCommand()
            ->select("count(*)")
            ->from('tbl_goals g')
            ->leftJoin('tbl_goals_followup f', 'g.id = f.goal_id AND f.latest=1 AND f.deleted = 0 ')
            ->where('g.deleted =0 AND g.user_id=:user_id', array(':user_id'=> $user_id));
        $totalRowCount = $cmdCount->queryScalar();        
        
        $cmd = Yii::app()->db->createCommand();
        $goals = $cmd->select("g.id, g.goal, g.start_date, g.end_date, g.targets, 
        	f.date_created last_followup_date, progress, g.category, g.archive")
            ->from('tbl_goals g')
            ->leftJoin('tbl_goals_followup f', 'g.id = f.goal_id AND f.latest=1 AND f.deleted = 0 ')
            ->where('g.deleted =0 AND g.user_id=:user_id', array(':user_id'=> $user_id))
            ->order('f.date_created DESC')
            ->limit(Yii::app()->params['entryPerPage'], $offset)
            ->queryAll();
        $return['goals'] = $goals;
        $return['pagination']= array(
            'totalPages' => ceil($totalRowCount/Yii::app()->params['entryPerPage']),
            'currentPage'=>$page
        );        
        $this->renderJson($return);            
    }
    
    public function actionView($id){
        $goal = $this->getGoalById($id);
        $cmd = Yii::app()->db->createCommand();
        $followups = $cmd->select("id, date_created, progress, current_status")
            ->from('{{goals_followup}}')
            ->where('goal_id = :id', array(':id'=>$id))
            ->order('date_created DESC')
            ->queryAll();
            
        $goal['followups'] = $followups;
        $return['goal'] = $goal;
        $this->renderJson($return);
    }

    private function getGoalById($id){
        $user_id = $this->getContextUserId();
        $cmd = Yii::app()->db->createCommand();
        $goal = $cmd->select("g.id, g.goal, g.start_date, g.end_date, g.targets, 
        	f.date_created last_followup_date, g.category, 
        	IFNULL(g.initial_state, 0) initial_state, IFNULL(g.desire_state, 0) desire_state, g.archive")
            ->from('tbl_goals g')
            ->leftJoin('tbl_goals_followup f', 'g.id = f.goal_id AND f.latest=1 AND f.deleted = 0 ')
            ->where('g.deleted =0  AND g.id = :id AND g.user_id=:user_id', array(':id'=>$id, ':user_id'=> $user_id))
            ->queryRow();
        return $goal;        
    }
    
    public function actionCreate(){
        $goal = new Goal();
        $goal->goal = $_REQUEST['goal'];
        if(!empty($_REQUEST['start_date'])){
            $goal->start_date = UtilityManager::formatDate($_REQUEST['start_date'], UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
        }
        $goal->user_id = $this->getContextUserId();
        if(!empty($_REQUEST['end_date'])){
            $goal->end_date = UtilityManager::formatDate($_REQUEST['end_date'], UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
        }
        $goal->targets = $_REQUEST['targets'];
        $goal->category = $_REQUEST['category'];
        $goal->desire_state = $_REQUEST['desire_state'];
        $goal->initial_state = $_REQUEST['initial_state'];
        $goal->archive = $_REQUEST['archive'];
        $return = array();
        if($goal->validate(array('goal', 'start_date', 'end_date', 'targets', 'desire_state', 'initial_state'), false)){
            if($goal->save(false)){
                $goal = $this->getGoalById($goal->id);
                if(!$goal){
                    $goal = array();
                }
                $return['goal'] = $goal;
                $httpResponseCode = 200;
            }
            else{
                //Save failed
                $return['errors'] = $goal->getErrors();
                $httpResponseCode = 500;
            }
        }
        else{
            //Validation failed
            $return['errors'] = $goal->getErrors();
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);        
    }

    public function actionUpdate($id){
        parse_str(file_get_contents("php://input"), $put_vars);
        $_REQUEST = array_merge($_REQUEST, $put_vars);        
        $goal = Goal::model()->findByPk((int)$id);
        $goal->goal = $_REQUEST['goal'];
        if(isset($_REQUEST['start_date']) && !empty($_REQUEST['start_date'])){
            $goal->start_date = UtilityManager::formatDate($_REQUEST['start_date'], UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
        }else{
            $goal->start_date = null;
        }
        if(!empty($_REQUEST['end_date'])){
            $goal->end_date = UtilityManager::formatDate($_REQUEST['end_date'], UtilityManager::getFormatedDate(Yii::app()->user->preferred_date_format), 'Y-m-d');
        }
        $goal->targets = $_REQUEST['targets'];
        $goal->category = $_REQUEST['category'];
        $goal->desire_state = $_REQUEST['desire_state'];
        $goal->initial_state = $_REQUEST['initial_state'];
        $goal->archive = $_REQUEST['archive'];
        $return = array();
        if($goal->validate(array('goal', 'start_date', 'end_date', 'targets', 'desire_state', 'initial_state'), false)){
            if($goal->save(false)){
                $goal = $this->getGoalById($goal->id);
                if(!$goal){
                    $goal = array();
                }
                $return['goal'] = $goal;
                $httpResponseCode = 200;
            }
            else{
                //Save failed
                $return['errors'] = $goal->getErrors();
                $httpResponseCode = 500;
            }
        }
        else{
            //Validation failed
            $return['errors'] = $goal->getErrors();
            $httpResponseCode = 400;
        }
        $this->renderJson($return, $httpResponseCode);
    }
    
    public function actionDelete($id){
        $goal = Goal::model()->findByPk((int)$id);
        $goal->delete();
        $this->renderJson($return);        
    }
    
    public function actionFollowups($id){
        $followups = Followup::model()->find('goal_id = :id', array(':id'=>$id));
        $return['followups'] = $followups;
        $this->renderJson($return);
    }
    
    public function actionAddFollowup($id){
        $return = array();
        $goal = Goal::model()->findByPk((int)$id);
        if(!$goal){
            $return['errors'][] = 'Goal does not exist';
            $httpResponseCode = 400;
        }
        else{
            
            $followup = new Followup();
            $followup->progress = (isset($_REQUEST['progress']) && !empty($_REQUEST['progress']))?$_REQUEST['progress']:0;
            $followup->current_status = $_REQUEST['current_status'];
            $followup->goal_id = $id;
            $followup->latest = 1;
            

            if($followup->validate(array('progress', 'current_status', 'goal_id'), false)){
                Followup::model()->updateAll(array('latest'=>0), "goal_id=:goal_id", array(':goal_id'=>$id));
                
                //Todo: Transaction in try catch
                if($followup->save(false)){
                    $followup = Followup::model()->findByPk($followup->id);
                    if(!$followup){
                        $followup = array();
                    }
                    $return['followup'] = $followup;
                    $this->saveGoalFeedback($id, $_REQUEST['event_id'], $_REQUEST['progress']);
                    $httpResponseCode = 200;
                }
                else{
                    //Save failed
                    $return['errors'] = $followup->getErrors();
                    $httpResponseCode = 500;
                }
            }
            else{
                //Validation failed
                $return['errors'] = $followup->getErrors();
                $httpResponseCode = 400;
            }
        }
        $this->renderJson($return, $httpResponseCode);          
    }
    
    public function actionDeleteFollowup($id, $followup_id){
        $return = array();
        $goal = Goal::model()->findAllByPk((int)$id);
        if(!$goal){
            $return['errors'][] = 'Goal does not exist';
            $httpResponseCode = 500;
        }
        else{
            $followup = Followup::model()->findByPk((int)$followup_id, "goal_id=:goal_id", array(':goal_id'=>$id));
            $followup->delete();
            $httpResponseCode = 200;
        }
        $this->renderJson($return, $httpResponseCode);
    }
    
    private function saveGoalFeedback($goalId, $eventId, $progress){
        if(empty($goalId) or empty($progress) or empty($eventId)){
            return;
        }

        $sql = "REPLACE INTO jqcalendar_goal_feebback (date_created, date_modified, deleted, 
            created_by, modified_by, event_id, goal_id, progress)
            VALUES(now(), now(), 0, :user_id, :user_id, :event_id, :goal_id, :progress)";
        Yii::app()->db->createCommand($sql)->execute(array(
            ':event_id'=>$eventId,
            ':goal_id'=>$goalId,
            ':progress'=>$progress,
            ':user_id'=>Yii::app()->user->id
        ));
    }    
}