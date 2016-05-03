<?php

/**
 * This is the model class for table "{{omsorgssamtale}}".
 *
 * The followings are the available columns in table '{{omsorgssamtale}}':
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
 * @property string $anamnese
 * @property string $andenempowerment
 * @property string $andreaftaler
 * @property string $arsag
 * @property string $dato
 * @property string $eccaktor
 * @property string $henvisning
 * @property string $medicin
 * @property string $opfolgning
 * @property string $slut_tid
 * @property string $tid
 * @property string $tiltag
 */
class Omsorgssamtale extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Omsorgssamtale the static model class
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
        return '{{omsorgssamtale}}';
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
            array('eccaktor, slut_tid, tid', 'length', 'max'=>25),
            array('henvisning', 'length', 'max'=>100),
            array('date_entered, date_modified, description, anamnese, andenempowerment, andreaftaler, arsag, dato, medicin, opfolgning, tiltag', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, anamnese, andenempowerment, andreaftaler, arsag, dato, eccaktor, henvisning, medicin, opfolgning, slut_tid, tid, tiltag', 'safe', 'on'=>'search'),
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
            'anamnese' => 'Anamnese',
            'andenempowerment' => 'Andenempowerment',
            'andreaftaler' => 'Andreaftaler',
            'arsag' => 'Arsag',
            'dato' => 'Dato',
            'eccaktor' => 'Eccaktor',
            'henvisning' => 'Henvisning',
            'medicin' => 'Medicin',
            'opfolgning' => 'Opfolgning',
            'slut_tid' => 'Slut Tid',
            'tid' => 'Tid',
            'tiltag' => 'Tiltag',
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
		$criteria->compare('anamnese',$this->anamnese,true);
		$criteria->compare('andenempowerment',$this->andenempowerment,true);
		$criteria->compare('andreaftaler',$this->andreaftaler,true);
		$criteria->compare('arsag',$this->arsag,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('eccaktor',$this->eccaktor,true);
		$criteria->compare('henvisning',$this->henvisning,true);
		$criteria->compare('medicin',$this->medicin,true);
		$criteria->compare('opfolgning',$this->opfolgning,true);
		$criteria->compare('slut_tid',$this->slut_tid,true);
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('tiltag',$this->tiltag,true);

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