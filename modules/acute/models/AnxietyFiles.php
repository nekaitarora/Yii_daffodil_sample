<?php

/**
 * This is the model class for table "{{anxiety_files}}".
 *
 * The followings are the available columns in table '{{anxiety_files}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $filename
 * @property string $guid
 * @property string $mimetype
 * @property integer $assigned_to
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $deleted
 */
class AnxietyFiles extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AnxietyFiles the static model class
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
        return '{{anxiety_files}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, filename, guid, date_created', 'required'),
            array('assigned_to, created_by, modified_by, deleted', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>50),
            array('description, filename, guid, mimetype', 'length', 'max'=>255),
            array('date_modified', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, description, filename, guid, mimetype, assigned_to, date_created, date_modified, created_by, modified_by, deleted', 'safe', 'on'=>'search'),
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
            'id' => AcuteModule::t('ID'),
            'name' => AcuteModule::t('name'),
            'description' => AcuteModule::t('description'),
            'filename' => AcuteModule::t('filename'),
            'guid' => AcuteModule::t('guid'),
            'mimetype' => AcuteModule::t('mimetype'),
            'assigned_to' => AcuteModule::t('assigned_to'),
            'date_created' => AcuteModule::t('date_created'),
            'date_modified' => AcuteModule::t('date_modified'),
            'created_by' => AcuteModule::t('created_by'),
            'modified_by' => AcuteModule::t('modified_by'),
            'deleted' => AcuteModule::t('deleted'),
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('mimetype',$this->mimetype,true);
		$criteria->compare('assigned_to',$this->assigned_to);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('deleted',$this->deleted);

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