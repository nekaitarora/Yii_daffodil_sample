<?php

/**
 * This is the model class for table "goals".
 *
 * The followings are the available columns in table 'goals':
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $deleted
 * @property string $goal
 * @property string $targets
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property string $category
 * @property integer $initial_state
 * @property integer $desire_state* 
 * @property integer $archive
 */
class Goal extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Goal the static model class
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
        return '{{goals}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date_created, date_modified, created_by, modified_by, goal, start_date, user_id', 'required'),
            array('created_by, modified_by, deleted, user_id, initial_state, desire_state, archive', 'numerical', 'integerOnly'=>true),
            array('goal', 'length', 'max'=>100),
            array('targets', 'length', 'max'=>4000),
            array('category', 'length', 'max'=>50),
            array('end_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, date_created, date_modified, created_by, modified_by, deleted, goal, targets, start_date, end_date, user_id, category, initial_state, desire_state, archive', 'safe', 'on'=>'search'),
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
            'followups'=>array(self::HAS_MANY, 'Followup', 'goal_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => GoalsModule::t('ID'),
            'date_created' => GoalsModule::t('Date Created'),
            'date_modified' => GoalsModule::t('Date Modified'),
            'created_by' => GoalsModule::t('Created By'),
            'modified_by' => GoalsModule::t('Modified By'),
            'deleted' => GoalsModule::t('Deleted'),
            'goal' => GoalsModule::t('goal'),
            'targets' => GoalsModule::t('targets'),
            'start_date' => GoalsModule::t('startdate'),
            'end_date' => GoalsModule::t('enddate'),
            'category' => GoalsModule::t('category'),
            'initial_state' => GoalsModule::t('initial_state'),
            'desire_state' => GoalsModule::t('desire_state'),            
            'archive' => GoalsModule::t('archive'),            
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
		$criteria->compare('goal',$this->goal,true);
		$criteria->compare('targets',$this->targets,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('initial_state',$this->initial_state);
		$criteria->compare('desire_state',$this->desire_state);
		$criteria->compare('archive',$this->archive);

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
            'select'=>'id, goal, start_date, end_date, targets, category'
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