<?php

/**
 * This is the model class for table "goals_followup".
 *
 * The followings are the available columns in table 'goals_followup':
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $deleted
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $progress
 * @property string $current_status
 * @property integer $goal_id
 */
class Followup extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Followup the static model class
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
        return '{{goals_followup}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('progress', 'required', 'message' => GoalsModule::t('The field "{translatedFieldName}" is mandatory', array('{translatedFieldName}'=>GoalsModule::t('how_is_your_progress')))),
            array('progress', 'numerical', 'integerOnly'=>true, 'message' => GoalsModule::t('The field "{translatedFieldName}" is mandatory', array('{translatedFieldName}'=>GoalsModule::t('how_is_your_progress')))),
            array('date_created, date_modified, created_by, modified_by, goal_id', 'required'),
            array('deleted, created_by, modified_by, goal_id', 'numerical', 'integerOnly'=>true),
            array('current_status', 'length', 'max'=>4000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, date_created, date_modified, deleted, created_by, modified_by, progress, current_status, goal_id', 'safe', 'on'=>'search'),
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
            'goal'=>array(self::BELONGS_TO, 'Goal', 'goal_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted' => 'Deleted',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'progress' => 'Progress',
            'current_status' => 'Current Status',
            'goal_id' => 'Goal',
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
		$criteria->compare('progress',$this->progress);
		$criteria->compare('current_status',$this->current_status,true);
		$criteria->compare('goal_id',$this->goal_id);

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
            'select'=>'id, date_created, progress, current_status, goal_id'
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