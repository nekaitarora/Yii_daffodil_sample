<?php

/**
 * This is the model class for table "{{change_schema_baseline}}".
 *
 * The followings are the available columns in table '{{change_schema_baseline}}':
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $deleted
 * @property integer $assigned_user_id
 * @property integer $mood
 * @property integer $memory
 * @property integer $social_activity
 * @property integer $sleep_disorder
 * @property integer $how_does_the_home_look
 * @property string $what_citizen_can_do
 * @property integer $generally_initiative_of_citizen
 * @property integer $the_degree_of_hygiene
 * @property integer $physical_activity
 * @property integer $fall
 * @property integer $appetite
 * @property integer $thirst
 * @property integer $weight
 * @property integer $feces_pattern
 * @property integer $urination
 * @property integer $breathing
 * @property integer $cough
 * @property integer $fatigue
 * @property integer $pain
 * @property integer $dizzy
 * @property string $color
 * @property integer $more_than_5_preparations
 * @property integer $manages_citizen_his_daily_medication
 * @property integer $does_citizen_take_other_medicine
 * @property integer $does_citizen_take_alternative_medicine
 */
class ChangeSchemaBaseline extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ChangeSchemaBaseline the static model class
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
        return '{{change_schema_baseline}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date_created, date_modified, created_by, modified_by, assigned_user_id, mood, memory, social_activity, sleep_disorder, how_does_the_home_look, what_citizen_can_do, generally_initiative_of_citizen, the_degree_of_hygiene, physical_activity, fall, appetite, thirst, weight, feces_pattern, urination, breathing, cough, fatigue, pain, dizzy', 'required'),
            array('created_by, modified_by, deleted, assigned_user_id, mood, memory, social_activity, sleep_disorder, how_does_the_home_look, generally_initiative_of_citizen, the_degree_of_hygiene, physical_activity, fall, appetite, thirst, weight, feces_pattern, urination, breathing, cough, fatigue, pain, dizzy', 'numerical', 'integerOnly'=>true),
            array('what_citizen_can_do', 'length', 'max'=>100),
            array('color', 'length', 'max'=>10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, date_created, date_modified, created_by, modified_by, deleted, assigned_user_id, mood, memory, social_activity, sleep_disorder, how_does_the_home_look, what_citizen_can_do, generally_initiative_of_citizen, the_degree_of_hygiene, physical_activity, fall, appetite, thirst, weight, feces_pattern, urination, breathing, cough, fatigue, pain, dizzy, color', 'safe', 'on'=>'search'),
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
            'id' => 'ID',
            'date_created' => FormsModule::t('Date Created'),
            'date_modified' => FormsModule::t('Date Modified'),
            'created_by' => FormsModule::t('Created By'),
            'modified_by' => FormsModule::t('Modified By'),
            'deleted' => FormsModule::t('Deleted'),
            'assigned_user_id' => FormsModule::t('Assigned User'),
            'mood' => FormsModule::t('mood'),
            'memory' => FormsModule::t('memory'),
            'social_activity' => FormsModule::t('social_activity'),
            'sleep_disorder' => FormsModule::t('sleep_disorder'),
            'how_does_the_home_look' => FormsModule::t('how_does_the_home_look'),
            'what_citizen_can_do' => FormsModule::t('what_citizen_can_do'),
            'generally_initiative_of_citizen' => FormsModule::t('generally_initiative_of_citizen'),
            'the_degree_of_hygiene' => FormsModule::t('the_degree_of_hygiene'),
            'physical_activity' => FormsModule::t('physical_activity'),
            'fall' => FormsModule::t('fall'),
            'appetite' => FormsModule::t('appetite'),
            'thirst' => FormsModule::t('ahirst'),
            'weight' => FormsModule::t('weight'),
            'feces_pattern' => FormsModule::t('feces_pattern'),
            'urination' => FormsModule::t('urination'),
            'breathing' => FormsModule::t('breathing'),
            'cough' => FormsModule::t('cough'),
            'fatigue' => FormsModule::t('fatigue'),
            'pain' => FormsModule::t('pain'),
            'dizzy' => FormsModule::t('dizzy'),
            'color' => FormsModule::t('Color'),
			'more_than_5_preparations' => FormsModule::t('more_than_5_preparations'),
			'manages_citizen_his_daily_medication' => FormsModule::t('manages_citizen_his_daily_medication'),
			'does_citizen_take_other_medicine' => FormsModule::t('does_citizen_take_other_medicine'),
			'does_citizen_take_alternative_medicine' => FormsModule::t('does_citizen_take_alternative_medicine'),
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
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('assigned_user_id',$this->assigned_user_id);
		$criteria->compare('mood',$this->mood);
		$criteria->compare('memory',$this->memory);
		$criteria->compare('social_activity',$this->social_activity);
		$criteria->compare('sleep_disorder',$this->sleep_disorder);
		$criteria->compare('how_does_the_home_look',$this->how_does_the_home_look);
		$criteria->compare('what_citizen_can_do',$this->what_citizen_can_do,true);
		$criteria->compare('generally_initiative_of_citizen',$this->generally_initiative_of_citizen);
		$criteria->compare('the_degree_of_hygiene',$this->the_degree_of_hygiene);
		$criteria->compare('physical_activity',$this->physical_activity);
		$criteria->compare('fall',$this->fall);
		$criteria->compare('appetite',$this->appetite);
		$criteria->compare('thirst',$this->thirst);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('feces_pattern',$this->feces_pattern);
		$criteria->compare('urination',$this->urination);
		$criteria->compare('breathing',$this->breathing);
		$criteria->compare('cough',$this->cough);
		$criteria->compare('fatigue',$this->fatigue);
		$criteria->compare('pain',$this->pain);
		$criteria->compare('dizzy',$this->dizzy);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('more_than_5_preparations',$this->more_than_5_preparations);
		$criteria->compare('manages_citizen_his_daily_medication',$this->manages_citizen_his_daily_medication);
		$criteria->compare('does_citizen_take_other_medicine',$this->does_citizen_take_other_medicine);
		$criteria->compare('does_citizen_take_alternative_medicine',$this->does_citizen_take_alternative_medicine);

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
}