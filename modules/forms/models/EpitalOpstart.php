<?php

/**
 * This is the model class for table "{{epital_opstart}}".
 *
 * The followings are the available columns in table '{{epital_opstart}}':
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
 * @property string $behandling_og_prograstignering
 * @property string $billede_af_borger
 * @property string $bivirkninger
 * @property string $bookingogbestillinger
 * @property string $borgerens_plan
 * @property string $brug_af_enheder
 * @property string $certificering
 * @property string $dato
 * @property string $dato_for_samtykke
 * @property string $eccaktor
 * @property string $empowernmentkatalog
 * @property string $hoerelse
 * @property string $idforsamtykke
 * @property string $kognitivitet
 * @property string $kol
 * @property string $kol_tilstanden
 * @property string $kommunikation
 * @property string $medicinkasse
 * @property string $mental_traening
 * @property string $opladning
 * @property string $praeperater_dosering_admin
 * @property string $samtale_om_livsstil
 * @property string $samtykkegivet
 * @property string $skaermtest
 * @property string $sluttid
 * @property string $sprogkvalitet
 * @property string $starttid
 * @property string $syn
 * @property string $taend_sluk
 * @property string $tilstand
 * @property string $tilstandsvaerktoej
 * @property string $uddannelse_notat
 * @property string $ugeplanerogtilbud
 * @property string $videokonference
 * @property string $virkningsmaade
 */
class EpitalOpstart extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EpitalOpstart the static model class
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
        return '{{epital_opstart}}';
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
            array('behandling_og_prograstignering, billede_af_borger, bivirkninger, bookingogbestillinger, borgerens_plan, brug_af_enheder, certificering, empowernmentkatalog, hoerelse, medicinkasse, mental_traening, opladning, praeperater_dosering_admin, samtale_om_livsstil, samtykkegivet, skaermtest, sprogkvalitet, syn, taend_sluk, tilstandsvaerktoej, ugeplanerogtilbud, videokonference, virkningsmaade', 'length', 'max'=>100),
            array('eccaktor, kol, kol_tilstanden, sluttid, starttid, tilstand', 'length', 'max'=>25),
            array('idforsamtykke', 'length', 'max'=>150),
            array('kognitivitet', 'length', 'max'=>2),
            array('kommunikation', 'length', 'max'=>250),
            array('date_entered, date_modified, description, dato, dato_for_samtykke, uddannelse_notat', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, behandling_og_prograstignering, billede_af_borger, bivirkninger, bookingogbestillinger, borgerens_plan, brug_af_enheder, certificering, dato, dato_for_samtykke, eccaktor, empowernmentkatalog, hoerelse, idforsamtykke, kognitivitet, kol, kol_tilstanden, kommunikation, medicinkasse, mental_traening, opladning, praeperater_dosering_admin, samtale_om_livsstil, samtykkegivet, skaermtest, sluttid, sprogkvalitet, starttid, syn, taend_sluk, tilstand, tilstandsvaerktoej, uddannelse_notat, ugeplanerogtilbud, videokonference, virkningsmaade', 'safe', 'on'=>'search'),
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
            'behandling_og_prograstignering' => 'Behandling Og Prograstignering',
            'billede_af_borger' => 'Billede Af Borger',
            'bivirkninger' => 'Bivirkninger',
            'bookingogbestillinger' => 'Bookingogbestillinger',
            'borgerens_plan' => 'Borgerens Plan',
            'brug_af_enheder' => 'Brug Af Enheder',
            'certificering' => 'Certificering',
            'dato' => 'Dato',
            'dato_for_samtykke' => 'Dato For Samtykke',
            'eccaktor' => 'Eccaktor',
            'empowernmentkatalog' => 'Empowernmentkatalog',
            'hoerelse' => 'Hoerelse',
            'idforsamtykke' => 'Idforsamtykke',
            'kognitivitet' => 'Kognitivitet',
            'kol' => 'Kol',
            'kol_tilstanden' => 'Kol Tilstanden',
            'kommunikation' => 'Kommunikation',
            'medicinkasse' => 'Medicinkasse',
            'mental_traening' => 'Mental Traening',
            'opladning' => 'Opladning',
            'praeperater_dosering_admin' => 'Praeperater Dosering Admin',
            'samtale_om_livsstil' => 'Samtale Om Livsstil',
            'samtykkegivet' => 'Samtykkegivet',
            'skaermtest' => 'Skaermtest',
            'sluttid' => 'Sluttid',
            'sprogkvalitet' => 'Sprogkvalitet',
            'starttid' => 'Starttid',
            'syn' => 'Syn',
            'taend_sluk' => 'Taend Sluk',
            'tilstand' => 'Tilstand',
            'tilstandsvaerktoej' => 'Tilstandsvaerktoej',
            'uddannelse_notat' => 'Uddannelse Notat',
            'ugeplanerogtilbud' => 'Ugeplanerogtilbud',
            'videokonference' => 'Videokonference',
            'virkningsmaade' => 'Virkningsmaade',
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
		$criteria->compare('behandling_og_prograstignering',$this->behandling_og_prograstignering,true);
		$criteria->compare('billede_af_borger',$this->billede_af_borger,true);
		$criteria->compare('bivirkninger',$this->bivirkninger,true);
		$criteria->compare('bookingogbestillinger',$this->bookingogbestillinger,true);
		$criteria->compare('borgerens_plan',$this->borgerens_plan,true);
		$criteria->compare('brug_af_enheder',$this->brug_af_enheder,true);
		$criteria->compare('certificering',$this->certificering,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('dato_for_samtykke',$this->dato_for_samtykke,true);
		$criteria->compare('eccaktor',$this->eccaktor,true);
		$criteria->compare('empowernmentkatalog',$this->empowernmentkatalog,true);
		$criteria->compare('hoerelse',$this->hoerelse,true);
		$criteria->compare('idforsamtykke',$this->idforsamtykke,true);
		$criteria->compare('kognitivitet',$this->kognitivitet,true);
		$criteria->compare('kol',$this->kol,true);
		$criteria->compare('kol_tilstanden',$this->kol_tilstanden,true);
		$criteria->compare('kommunikation',$this->kommunikation,true);
		$criteria->compare('medicinkasse',$this->medicinkasse,true);
		$criteria->compare('mental_traening',$this->mental_traening,true);
		$criteria->compare('opladning',$this->opladning,true);
		$criteria->compare('praeperater_dosering_admin',$this->praeperater_dosering_admin,true);
		$criteria->compare('samtale_om_livsstil',$this->samtale_om_livsstil,true);
		$criteria->compare('samtykkegivet',$this->samtykkegivet,true);
		$criteria->compare('skaermtest',$this->skaermtest,true);
		$criteria->compare('sluttid',$this->sluttid,true);
		$criteria->compare('sprogkvalitet',$this->sprogkvalitet,true);
		$criteria->compare('starttid',$this->starttid,true);
		$criteria->compare('syn',$this->syn,true);
		$criteria->compare('taend_sluk',$this->taend_sluk,true);
		$criteria->compare('tilstand',$this->tilstand,true);
		$criteria->compare('tilstandsvaerktoej',$this->tilstandsvaerktoej,true);
		$criteria->compare('uddannelse_notat',$this->uddannelse_notat,true);
		$criteria->compare('ugeplanerogtilbud',$this->ugeplanerogtilbud,true);
		$criteria->compare('videokonference',$this->videokonference,true);
		$criteria->compare('virkningsmaade',$this->virkningsmaade,true);

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