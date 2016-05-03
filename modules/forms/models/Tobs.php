<?php

/**
 * This is the model class for table "{{tobs}}".
 *
 * The followings are the available columns in table '{{tobs}}':
 * @property integer $id
 * @property integer $assigned_user_id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $deleted
 * @property integer $pulse
 * @property string $awareness
 * @property double $temperature
 * @property integer $respiration
 * @property integer $systolic_blood_pressure
 * @property string $color
 * @property integer $event_id
 * @property integer $submitted
 * @property string $reason
 */
class Tobs extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Tobs the static model class
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
        return '{{tobs}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pulse, awareness, temperature, respiration, systolic_blood_pressure', 'required'),
            array('assigned_user_id, created_by, modified_by, deleted, event_id, submitted', 'numerical', 'integerOnly'=>true),
            array('awareness', 'length', 'max'=>50),
            array('color', 'length', 'max'=>10),
            array('date_modified', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, assigned_user_id, date_created, date_modified, created_by, modified_by, deleted, pulse, awareness, temperature, respiration, systolic_blood_pressure, color, event_id, submitted', 'safe', 'on'=>'search'),
            array('pulse', 'numerical', 'integerOnly'=>true,'min'=>0,'max'=>200, 'tooSmall'=>FormsModule::t('pulse_must_be_in_range'), 'tooBig'=>FormsModule::t('pulse_must_be_in_range')),
            array('temperature', 'numerical', 'integerOnly'=>false,'min'=>25,'max'=>45, 'tooSmall'=>FormsModule::t('temperature_must_be_in_range'), 'tooBig'=>FormsModule::t('temperature_must_be_in_range')),
            array('respiration', 'numerical', 'integerOnly'=>true,'min'=>0,'max'=>40, 'tooSmall'=>FormsModule::t('respiration_must_be_in_range'), 'tooBig'=>FormsModule::t('respiration_must_be_in_range')),
            array('systolic_blood_pressure', 'numerical', 'integerOnly'=>true,'min'=>50,'max'=>250, 'tooSmall'=>FormsModule::t('systolic_blood_pressure_must_be_in_range'), 'tooBig'=>FormsModule::t('systolic_blood_pressure_must_be_in_range')),
            array('awareness', 'in', 'range'=>array('Agitated', 'Habitual', 'Only responds to voice', 'Responds only to pain', 'No reaction'), 'allowEmpty'=>false)
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
            'id' => FormsModule::t('ID'),
            'assigned_user_id' => FormsModule::t('Assigned User'),
            'date_created' => FormsModule::t('Date Created'),
            'date_modified' => FormsModule::t('Date Modified'),
            'created_by' => FormsModule::t('Created By'),
            'modified_by' => FormsModule::t('Modified By'),
            'deleted' => FormsModule::t('Deleted'),
            'pulse' => FormsModule::t('pulse'),
            'awareness' => FormsModule::t('awareness'),
            'temperature' => FormsModule::t('temperature'),
            'respiration' => FormsModule::t('respiration'),
            'systolic_blood_pressure' => FormsModule::t('systolic_blood_pressure'),
            'color' => FormsModule::t('color'),
            'event_id' => FormsModule::t('Event'),
            'submitted' => FormsModule::t('Submitted'),
            'reason' => FormsModule::t('reason'),
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
		$criteria->compare('assigned_user_id',$this->assigned_user_id);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('pulse',$this->pulse);
		$criteria->compare('awareness',$this->awareness,true);
		$criteria->compare('temperature',$this->temperature);
		$criteria->compare('respiration',$this->respiration);
		$criteria->compare('systolic_blood_pressure',$this->systolic_blood_pressure);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('submitted',$this->submitted);
		$criteria->compare('reason',$this->reason,true);

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
    
    public function onAfterFind(){
        $this->setColorReason();
    }
    
    public function beforeSave(){
    	$this->setColorReason();
        if($this->isNewRecord){
            $this->created_by = Yii::app()->user->id;
            $this->date_created = new CDbExpression('NOW()');
        }
        $this->modified_by = Yii::app()->user->id;
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
    private function setColorReason(){
    	$score =0;
    	$values = array();
		if($this->pulse >=130){
			$score += 3;
			$values[] =3;
		}
		elseif($this->pulse >= 110 and $this->pulse < 130){
			$score += 2;
			$values[] =2;
		}
		elseif($this->pulse >= 90 and $this->pulse <110){
			$score += 1;
			$values[] =1;
		}
		elseif($this->pulse >= 50 and $this->pulse <90){
			$score += 0;
			$values[] =0;
		}
		elseif($this->pulse >= 40 and $this->pulse <50){
			$score += 1;
			$values[] =1;
		}
		else{
			$score += 2;
			$values[] =2;
		}
		
		
		if($this->awareness == 'Agitated'){
			$score += 1;
			$values[] =1;
		}
		elseif($this->awareness == 'Habitual'){
			$score += 0;
			$values[] =0;
		}
		elseif($this->awareness == 'Only responds to voice'){
			$score += 1;
			$values[] =1;
		}
		elseif($this->awareness == 'Responds only to pain'){
			$score += 2;
			$values[] =2;
		}
		elseif($this->awareness == 'No reaction'){
			$score += 3;
			$values[] =3;
		}
		
		if($this->temperature >= 40){
			$score += 3;
			$values[] =3;
		}
		elseif($this->temperature >=39 and $this->temperature < 40){
			$score += 2;
			$values[] =2;
		}
		elseif($this->temperature >=38 and $this->temperature < 39){
			$score += 1;
			$values[] =1;
		}
		elseif($this->temperature >=36 and $this->temperature < 38){
			$score += 0;
			$values[] =0;
		}
		elseif($this->temperature >=34 and $this->temperature < 36){
			$score += 2;
			$values[] =2;
		}
		elseif($this->temperature < 34){
			$score += 3;
			$values[] =3;
		}
		
		if($this->respiration>= 26){
			$score += 3;
			$values[] =3;
		}		
		elseif($this->respiration>= 21 and $this->respiration< 26){
			$score += 2;
			$values[] =2;
		}		
		elseif($this->respiration>= 17 and $this->respiration< 21){
			$score += 1;
			$values[] =1;
		}		
		elseif($this->respiration>= 10 and $this->respiration< 17){
			$score += 0;
			$values[] =0;
		}		
		elseif($this->respiration>= 6 and $this->respiration< 10){
			$score += 1;
			$values[] =1;
		}		
		elseif($this->respiration< 6){
			$score += 3;
			$values[] =3;
		}		

		if($this->systolic_blood_pressure >=200){
			$score += 2;
			$values[] =2;
		}
		elseif($this->systolic_blood_pressure >=100 and $this->systolic_blood_pressure <200){
			$score += 0;
			$values[] =0;
		}
		elseif($this->systolic_blood_pressure >=80 and $this->systolic_blood_pressure <100){
			$score += 1;
			$values[] =1;
		}
		elseif($this->systolic_blood_pressure >=70 and $this->systolic_blood_pressure <80){
			$score += 2;
			$values[] =2;
		}
		elseif($this->systolic_blood_pressure <70){
			$score += 3;
			$values[] =3;
		}
		
		$valueGE2 = false;
		foreach($values as $value){
			if($value>=2){
				$valueGE2 = true;
			}
		}
		$color='green';
		$reason='';
		if($score == 0){
			$color = 'green';
			$reason = 14;
		}
		elseif($score == 1){
			$color = 'yellow';
			$reason = 15;
		}
		elseif($score >= 5 ){
			$color = 'red';
			$reason = 18;
		}		
		elseif(($score > 2 && $score < 5) or ($valueGE2)){
			$color = 'red';
			$reason = 17;
		}		
		elseif($score == 2){
			$color = 'red';
			$reason = 16;
		}
		$this->color = $color;
        
        $tobsReasonMessage = "";
        
        $tobsReasonMessage = Yii::app()->db->createCommand()
                        ->select('message')
                        ->from('tbl_messages')
                        ->where("id=:id AND language=:lang", array(':id'=>$reason, ':lang'=>Yii::app()->user->language))
                        ->queryScalar();
                        
		$this->reason = $tobsReasonMessage;
    }

	protected function afterSave(){
		if($this->getIsNewRecord()){
			$tobs = Tobs::model()->findByPk((int)$this->id);
			if(in_array($tobs->color, array('red', 'yellow'))){

		        $user_id = Yii::app()->session['private_js_vars_session']['context_user_id'] ;
		        if(empty($user_id)){
		            $user_id = Yii::app()->user->id;
		        }        
				
				$ch = new CallcenterHandled();
				$ch->handled_by = Yii::app()->user->id;
				$ch->related_to = $tobs->id;
				$ch->related_type = 'Tobs';
				$ch->handled = 0;
				$ch->alarm_datetime = new CDbExpression('NOW()');
				$ch->alarm_user_id = $user_id;
				$ch->state = $tobs->color;
				$ch->alarm_description = 'TOBS';
				$ch->save(false);			
			}
		}
		return parent::afterSave();
	}
	
	public function beforeValidate(){
		$this->temperature = str_replace(',', '.', $this->temperature);
		return parent::beforeValidate();
	}    
}