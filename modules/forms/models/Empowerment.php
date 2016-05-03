<?php

/**
 * This is the model class for table "{{empowerment}}".
 *
 * The followings are the available columns in table '{{empowerment}}':
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
 * @property string $borgerundervisning
 * @property string $communities
 * @property string $dato
 * @property string $dietist
 * @property string $digitaltrygestop
 * @property string $eccak
 * @property string $epitalsuperbruger
 * @property string $epitalvejledning
 * @property string $foredragsomlydogvideofiler
 * @property string $information
 * @property string $koltraening01
 * @property string $koltraening02
 * @property string $koltraening03
 * @property string $lydfiler
 * @property string $mentaltilstandsmaaling
 * @property string $mentaltraening
 * @property string $monitoreringaftrivselsfaktor
 * @property string $netvaerk
 * @property string $notat
 * @property string $opgradering
 * @property string $personligcoaching
 * @property string $slu
 * @property string $starttid
 * @property string $sunddialog
 * @property string $sunddialog_to
 * @property string $telehjemmetraening
 */
class Empowerment extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Empowerment the static model class
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
        return '{{empowerment}}';
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
            array('eccak, slu, starttid', 'length', 'max'=>25),
            array('date_entered, date_modified, description, borgerundervisning, communities, dato, dietist, digitaltrygestop, epitalsuperbruger, epitalvejledning, foredragsomlydogvideofiler, information, koltraening01, koltraening02, koltraening03, lydfiler, mentaltilstandsmaaling, mentaltraening, monitoreringaftrivselsfaktor, netvaerk, notat, opgradering, personligcoaching, sunddialog, sunddialog_to, telehjemmetraening', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, borgerundervisning, communities, dato, dietist, digitaltrygestop, eccak, epitalsuperbruger, epitalvejledning, foredragsomlydogvideofiler, information, koltraening01, koltraening02, koltraening03, lydfiler, mentaltilstandsmaaling, mentaltraening, monitoreringaftrivselsfaktor, netvaerk, notat, opgradering, personligcoaching, slu, starttid, sunddialog, sunddialog_to, telehjemmetraening', 'safe', 'on'=>'search'),
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
            'borgerundervisning' => 'Borgerundervisning',
            'communities' => 'Communities',
            'dato' => 'Dato',
            'dietist' => 'Dietist',
            'digitaltrygestop' => 'Digitaltrygestop',
            'eccak' => 'Eccak',
            'epitalsuperbruger' => 'Epitalsuperbruger',
            'epitalvejledning' => 'Epitalvejledning',
            'foredragsomlydogvideofiler' => 'Foredragsomlydogvideofiler',
            'information' => 'Information',
            'koltraening01' => 'Koltraening01',
            'koltraening02' => 'Koltraening02',
            'koltraening03' => 'Koltraening03',
            'lydfiler' => 'Lydfiler',
            'mentaltilstandsmaaling' => 'Mentaltilstandsmaaling',
            'mentaltraening' => 'Mentaltraening',
            'monitoreringaftrivselsfaktor' => 'Monitoreringaftrivselsfaktor',
            'netvaerk' => 'Netvaerk',
            'notat' => 'Notat',
            'opgradering' => 'Opgradering',
            'personligcoaching' => 'Personligcoaching',
            'slu' => 'Slu',
            'starttid' => 'Starttid',
            'sunddialog' => 'Sunddialog',
            'sunddialog_to' => 'Sunddialog To',
            'telehjemmetraening' => 'Telehjemmetraening',
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
		$criteria->compare('borgerundervisning',$this->borgerundervisning,true);
		$criteria->compare('communities',$this->communities,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('dietist',$this->dietist,true);
		$criteria->compare('digitaltrygestop',$this->digitaltrygestop,true);
		$criteria->compare('eccak',$this->eccak,true);
		$criteria->compare('epitalsuperbruger',$this->epitalsuperbruger,true);
		$criteria->compare('epitalvejledning',$this->epitalvejledning,true);
		$criteria->compare('foredragsomlydogvideofiler',$this->foredragsomlydogvideofiler,true);
		$criteria->compare('information',$this->information,true);
		$criteria->compare('koltraening01',$this->koltraening01,true);
		$criteria->compare('koltraening02',$this->koltraening02,true);
		$criteria->compare('koltraening03',$this->koltraening03,true);
		$criteria->compare('lydfiler',$this->lydfiler,true);
		$criteria->compare('mentaltilstandsmaaling',$this->mentaltilstandsmaaling,true);
		$criteria->compare('mentaltraening',$this->mentaltraening,true);
		$criteria->compare('monitoreringaftrivselsfaktor',$this->monitoreringaftrivselsfaktor,true);
		$criteria->compare('netvaerk',$this->netvaerk,true);
		$criteria->compare('notat',$this->notat,true);
		$criteria->compare('opgradering',$this->opgradering,true);
		$criteria->compare('personligcoaching',$this->personligcoaching,true);
		$criteria->compare('slu',$this->slu,true);
		$criteria->compare('starttid',$this->starttid,true);
		$criteria->compare('sunddialog',$this->sunddialog,true);
		$criteria->compare('sunddialog_to',$this->sunddialog_to,true);
		$criteria->compare('telehjemmetraening',$this->telehjemmetraening,true);

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