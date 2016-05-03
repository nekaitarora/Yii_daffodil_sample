<?php

/**
 * This is the model class for table "{{henvisning}}".
 *
 * The followings are the available columns in table '{{henvisning}}':
 * @property integer $id
 * @property string $name
 * @property string $date_entered
 * @property string $date_modified
 * @property string $modified_user_id
 * @property string $created_by
 * @property string $description
 * @property integer $deleted
 * @property string $assigned_user_id
 * @property integer $event_id
 * @property integer $submitted
 * @property string $aarsag
 * @property string $aktor
 * @property string $dato
 * @property string $empowerment
 * @property string $notat
 * @property string $recipient_andet
 * @property string $recipient_bagvagt
 * @property string $recipient_kommune
 * @property string $recipient_mobileenhed
 * @property string $recipient_pl
 * @property string $sluttid
 * @property string $tid
 */
class Henvisning extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Henvisning the static model class
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
        return '{{henvisning}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, event_id', 'required'),
            array('deleted, event_id, submitted', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            array('modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('sluttid, tid', 'length', 'max'=>25),
            array('date_entered, date_modified, description, aarsag, aktor, dato, empowerment, notat, recipient_andet, recipient_bagvagt, recipient_kommune, recipient_mobileenhed, recipient_pl', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, aarsag, aktor, dato, empowerment, notat, recipient_andet, recipient_bagvagt, recipient_kommune, recipient_mobileenhed, recipient_pl, sluttid, tid', 'safe', 'on'=>'search'),
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
            'name' => 'id',
            'date_entered' => 'Date Entered',
            'date_modified' => 'Date Modified',
            'modified_user_id' => 'Modified User',
            'created_by' => 'Created By',
            'description' => 'Description',
            'deleted' => 'Deleted',
            'assigned_user_id' => 'Assigned User',
            'event_id' => 'Event',
            'submitted' => 'Submitted',
            'aarsag' => 'Aarsag',
            'aktor' => 'Aktor',
            'dato' => 'Dato',
            'empowerment' => 'Empowerment',
            'notat' => 'Notat',
            'recipient_andet' => 'Recipient Andet',
            'recipient_bagvagt' => 'Recipient Bagvagt',
            'recipient_kommune' => 'Recipient Kommune',
            'recipient_mobileenhed' => 'Recipient Mobileenhed',
            'recipient_pl' => 'Recipient Pl',
            'sluttid' => 'Sluttid',
            'tid' => 'Tid',
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
		$criteria->compare('modified_user_id',$this->modified_user_id,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('assigned_user_id',$this->assigned_user_id,true);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('submitted',$this->submitted);
		$criteria->compare('aarsag',$this->aarsag,true);
		$criteria->compare('aktor',$this->aktor,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('empowerment',$this->empowerment,true);
		$criteria->compare('notat',$this->notat,true);
		$criteria->compare('recipient_andet',$this->recipient_andet,true);
		$criteria->compare('recipient_bagvagt',$this->recipient_bagvagt,true);
		$criteria->compare('recipient_kommune',$this->recipient_kommune,true);
		$criteria->compare('recipient_mobileenhed',$this->recipient_mobileenhed,true);
		$criteria->compare('recipient_pl',$this->recipient_pl,true);
		$criteria->compare('sluttid',$this->sluttid,true);
		$criteria->compare('tid',$this->tid,true);

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
            $this->date_entered = new CDbExpression('NOW()');
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
}