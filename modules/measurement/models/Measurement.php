<?php
Yii::import('application.modules.callcenter.component.*');
Yii::import('application.modules.callcenter.models.CallcenterHandled');


/**
 * This is the model class for table "tbl_measurements".
 *
 * The followings are the available columns in table 'tbl_measurements':
 * @property integer $id
 * @property string $name
 * @property string $date_entered
 * @property string $date_modified
 * @property integer $modified_user_id
 * @property integer $created_by
 * @property string $reason
 * @property integer $deleted
 * @property integer $assigned_user_id
 * @property integer $difficultyBreating
 * @property integer $inceasedCough
 * @property double $lungFunction
 * @property integer $pulse
 * @property double $state
 * @property integer $coloredSputum
 * @property double $temperature
 * @property integer $oxygenSaturation
 */
class Measurement extends CActiveRecord implements ICallcenterTask
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Measurement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_measurements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_entered, date_modified, modified_user_id, created_by, reason, assigned_user_id', 'required'),
			array('modified_user_id, created_by, deleted, assigned_user_id, difficultyBreating, inceasedCough, pulse, coloredSputum, oxygenSaturation', 'numerical', 'integerOnly'=>true),
			array('lungFunction, temperature', 'numerical'),
			array('name, reason', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, date_entered, date_modified, modified_user_id, created_by, reason, deleted, assigned_user_id, difficultyBreating, inceasedCough, lungFunction, pulse, state, coloredSputum, temperature, oxygenSaturation', 'safe', 'on'=>'search'),
		);
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
			'name' => MeasurementModule::t('name'),
			'reason' => MeasurementModule::t('reason'),
			'difficultyBreating' => MeasurementModule::t('difficultyBreating'),
			'inceasedCough' => MeasurementModule::t('inceasedCough'),
			'lungFunction' => MeasurementModule::t('lungFunction'),
			'pulse' => MeasurementModule::t('pulse'),
			'state' => MeasurementModule::t('state'),
			'coloredSputum' => MeasurementModule::t('coloredSputum'),
			'temperature' => MeasurementModule::t('temperature'),
			'oxygenSaturation' => MeasurementModule::t('oxygenSaturation'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('modified_user_id',$this->modified_user_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('assigned_user_id',$this->assigned_user_id);
		$criteria->compare('difficultyBreating',$this->difficultyBreating);
		$criteria->compare('inceasedCough',$this->inceasedCough);
		$criteria->compare('lungFunction',$this->lungFunction);
		$criteria->compare('pulse',$this->pulse);
		$criteria->compare('state',$this->state);
		$criteria->compare('coloredSputum',$this->coloredSputum);
		$criteria->compare('temperature',$this->temperature);
		$criteria->compare('oxygenSaturation',$this->oxygenSaturation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function behaviors(){
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
            $this->created_by = Yii::app()->user->id;
            $this->date_entered = date('Y-m-d H:i:s');
        }
        $this->modified_user_id = Yii::app()->user->id;
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

	protected function afterSave(){
		if($this->getIsNewRecord()){
			$m = Measurement::model()->findByPk((int)$this->id);
			if(in_array($m->state, array('red', 'yellow', 'orange'))){
				//Create callcenter handled=0 
				$ch = new CallcenterHandled();
				$ch->handled_by = Yii::app()->user->id;
				$ch->related_to = $this->id;
				$ch->related_type = 'Measurement';
				$ch->handled = 0;
				$ch->alarm_datetime = new CDbExpression('NOW()');
				$ch->alarm_user_id = $m->assigned_user_id;
				$ch->state = $m->state;
				$ch->alarm_description = '';
				$ch->save(false);			
			}
		}
		return parent::afterSave();
	}    

	public function setHandled($id){
		//Nothing happens when measurement mark as handeld
	}
	
}