<?php
Yii::import('application.modules.callcenter.component.*');
Yii::import('application.modules.callcenter.models.CallcenterHandled');

/**
 * This is the model class for table "{{employee_task}}".
 *
 * The followings are the available columns in table '{{employee_task}}':
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $deleted
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $title
 * @property string $description
 * @property integer $done
 * @property integer $done_by
 * @property string $done_datetime
 * @property integer $related_to
 * @property integer $repeat
 * @property string $repeat_from
 * @property string $repeat_type
 * @property string $repeat_extra
 * @property string $repeat_to
 */
class EmployeeTask extends CActiveRecord implements ICallcenterTask
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeTask the static model class
     */
    public $tags;
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{employee_task}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        $rules = array(
            array('date_created, date_modified, created_by, modified_by, title', 'required'),
            array('deleted, created_by, modified_by, done, done_by, related_to, repeat', 'numerical', 'integerOnly'=>true),
            array('title', 'length', 'max'=>100),
            array('description', 'length', 'max'=>1000),
            array('repeat_type, repeat_extra', 'length', 'max'=>20),
            array('done_datetime, repeat_from, repeat_to', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, date_created, date_modified, deleted, created_by, modified_by, title, description, done, done_by, done_datetime, related_to', 'safe', 'on'=>'search'),
        );
        
        if($this->repeat ==1){
			$rules[] = array('repeat_from, repeat_to, repeat_type, repeat_extra', 'required');
        }
        return $rules;
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => EmployeetaskModule::t('ID'),
            'date_created' => EmployeetaskModule::t('date_created'),
            'date_modified' => EmployeetaskModule::t('Date Modified'),
            'deleted' => EmployeetaskModule::t('Deleted'),
            'created_by' => EmployeetaskModule::t('Created By'),
            'modified_by' => EmployeetaskModule::t('Modified By'),
            'title' => EmployeetaskModule::t('title'),
            'description' => EmployeetaskModule::t('description'),
            'done' => EmployeetaskModule::t('done'),
            'done_by' => EmployeetaskModule::t('done_by'),
            'done_datetime' => EmployeetaskModule::t('done_datetime'),
            'related_to' => EmployeetaskModule::t('related_to'),
            'repeat' => EmployeetaskModule::t('repeat'),
            'repeat_from' => EmployeetaskModule::t('repeat_from'),
            'repeat_type' => EmployeetaskModule::t('Repeat Type'),
            'repeat_extra' => EmployeetaskModule::t('repeat_type'),
            'repeat_to' => EmployeetaskModule::t('repeat_to'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('done',$this->done);
		$criteria->compare('done_by',$this->done_by);
		$criteria->compare('done_datetime',$this->done_datetime,true);
		$criteria->compare('related_to',$this->related_to);
		$criteria->compare('repeat',$this->repeat);
		$criteria->compare('repeat_from',$this->repeat_from,true);
		$criteria->compare('repeat_type',$this->repeat_type,true);
		$criteria->compare('repeat_extra',$this->repeat_extra,true);
		$criteria->compare('repeat_to',$this->repeat_to,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function behaviors()
    {
        return array(
            'LoggableBehavior'=> 'application.modules.auditTrail.behaviors.LoggableBehavior',
        );
    }
    
    public function defaultScope(){
        return array(
            'condition'=>'deleted=0',
        );        
    }    
    
    public function beforeSave(){
        if($this->isNewRecord){
        	if(!empty(Yii::app()->user->id)){
            	$this->created_by = Yii::app()->user->id;
			}
            $this->date_created = new CDbExpression('NOW()');
        }
        if(!empty(Yii::app()->user->id)){
        	$this->modified_by = Yii::app()->user->id;
		}
        $this->date_modified = new CDbExpression('NOW()');
        
        return parent::beforeSave();
    }
    
    public function delete(){
        if(!$this->getIsNewRecord())
        {
            Yii::trace(get_class($this).'.delete()','system.db.ar.CActiveRecord');
            if($this->beforeDelete())
            {
                $result=$this->updateByPk($this->getPrimaryKey(), array('deleted'=>1));
                $this->afterDelete();
                return $result;
            }
            else
                return false;
        }
        else{
            throw new CDbException(Yii::t('yii','The active record cannot be deleted because it is new.'));
        }
        
    }    

	protected function afterDelete(){
		$this->createNextInstance();
		parent::afterDelete();
	}

    
    public function markAsDone(){
		if($this->id){
			$this->done =1;
			$this->done_by = Yii::app()->user->id;
			$this->done_datetime = new CDbExpression('NOW()');
			$this->save(false);
			$this->createNextInstance();
		}
    }
    
    public function createNextInstance(){
    	if($this->repeat != 1 || empty($this->repeat_extra)){
			return;
    	}
		$et = new EmployeeTask();
		$et->setAttributes($this->getAttributes());
		$et->id = null;
		$et->isNewRecord = true;
		$et->done =0;
		$et->done_by = null;
		$et->done_datetime = null;
		$et->date_created = new CDbExpression('NOW()');
		$et->created_by = Yii::app()->user->id;
        $et->modified_by = Yii::app()->user->id;
        $et->date_modified = new CDbExpression('NOW()');		

		if($et->repeat_type == 'day'){
			$newFrom = strtotime($et->repeat_from . " +{$et->repeat_extra} day");
			$et->repeat_from = date('Y-m-d H:i:s', $newFrom);
		}
		elseif($et->repeat_type == 'month'){
			$newFrom = strtotime($et->repeat_from . " +{$et->repeat_extra} month");
			$et->repeat_from = date('Y-m-d H:i:s', $newFrom);
		}
		elseif($et->repeat_type == 'year'){
			$newFrom = strtotime($et->repeat_from . " +{$et->repeat_extra} year");
			$et->repeat_from = date('Y-m-d H:i:s', $newFrom);
		}
		elseif($et->repeat_type == 'week'){
			$from = strtotime($et->repeat_from);
	        $curent_day = date('N', $from);
	        $curent_day = $curent_day == 7 ? 0 : $curent_day;
	        $next_day = $this->getWeekDayAfterThis($curent_day, $et->repeat_extra);
	        $next_day = date('l', strtotime("Sunday +{$next_day} days"));
	        $newFrom = strtotime($this->weekdayAfter($from, $next_day));
	        $et->repeat_from = date('Y-m-d H:i:s', $newFrom);
		}

		if(strtotime($et->repeat_from) < strtotime($et->repeat_to. " +1 day")){
			if($et->save(false)){
				//Set/copy assigned_to tags from old issue
				$sql = "INSERT INTO `tbl_user_tags`(
					`date_created`, `date_modified`, `deleted`, `created_by`, `modified_by`,
					`tag`, `related_id`, `related_module`)
					SELECT NOW(), NOW(), 0, :user_id, :user_id,
					tag, :new_id, 'employeetask'
					FROM tbl_user_tags 
					WHERE deleted =0 
					AND related_id = :old_id";
				$cmd = Yii::app()->db->createCommand($sql);
				$cmd->execute(array(':new_id'=>$et->id, ':old_id'=>$this->id, ':user_id'=>Yii::app()->user->id));
			}
		}
    }
    
    private function getWeekDayAfterThis($curent, $extra){
        $dates = explode(',', $extra);
        if(in_array($curent,$dates)){
            $key = array_search($curent,$dates);
            return $dates[$key+1>=count($dates) ? 0 : $key+1];
        }
        return $dates[0];
    }

    private function weekdayAfter($date, $day){
        return date("Y-m-d",strtotime($day,  $date + 24*60*60)).date(' H:i:s',$date);
    }

	public function setHandled($id){
		$et = EmployeeTask::model()->findByPk((int)$id);
        if($et){
            $et->markAsDone();
        }
	}
	
	protected function afterSave(){
		if($this->getIsNewRecord()){
			//Create callcenter handled=0 
			$ch = new CallcenterHandled();
			$ch->handled_by = Yii::app()->user->id;
			$ch->related_to = $this->id;
			$ch->related_type = 'EmployeeTask';
			$ch->handled = 0;
			$ch->alarm_datetime = new CDbExpression('NOW()');
			$ch->alarm_user_id = $this->related_to;
			$ch->state = null;
			$ch->alarm_description = $this->title;
			$ch->tags = $this->tags;
			$ch->save(false);			
		}
	}
}