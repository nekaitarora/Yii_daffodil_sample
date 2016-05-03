<?php

/**
 * This is the model class for table "{{intervalkontrol}}".
 *
 * The followings are the available columns in table '{{intervalkontrol}}':
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
 * @property string $aktor
 * @property string $dato
 * @property string $eccaktor
 * @property string $ghgh
 * @property string $interval_aftaler_andenempowerm
 * @property string $interval_aftaler_forvaerringsh
 * @property string $interval_aftaler_notat
 * @property string $interval_aftaler_opfolgendekon
 * @property string $interval_aftaler_rehabiliterin
 * @property string $interval_anamnese_ovrigeorgan
 * @property string $interval_anamnese_sidensidst
 * @property string $interval_blodtryk_diastolsk
 * @property string $interval_blodtryk_systolsk
 * @property string $interval_bm_puls
 * @property string $interval_bm_respfrek
 * @property string $interval_bm_saturation
 * @property string $interval_bm_temperatur
 * @property string $interval_borgermaal_bmi
 * @property string $interval_borgermaal_hojde
 * @property string $interval_borgermaal_vaegt
 * @property string $interval_datotidecc
 * @property string $interval_medicin_andenmedicin
 * @property string $interval_medicin_bivirkninger
 * @property integer $interval_medicin_dosis
 * @property string $interval_medicin_ecc
 * @property integer $interval_medicin_forstfrekvens
 * @property integer $interval_medicin_forstoverdosi
 * @property string $interval_medicin_forstoverprep
 * @property string $interval_medicin_forstoverstyr
 * @property integer $interval_medicin_frekvens
 * @property string $interval_medicin_maengde
 * @property string $interval_medicin_medicinaktion
 * @property string $interval_medicin_ovrigkolmedic
 * @property string $interval_medicin_pn
 * @property string $interval_medicin_pnmedforbrug
 * @property string $interval_obj_dyspno
 * @property string $interval_obj_farver
 * @property string $interval_obj_hud
 * @property string $interval_obj_odemer
 * @property string $interval_rygestat_aldrigryger
 * @property string $interval_rygestat_antalpakkeaa
 * @property string $interval_rygestat_cerutterperd
 * @property string $interval_rygestat_cigarerperda
 * @property string $interval_rygestat_cigaretter
 * @property string $interval_rygestat_fagerstrom
 * @property string $interval_rygestat_grampibetoba
 * @property string $interval_rygestat_onskerafv
 * @property string $interval_rygestat_ryger
 * @property string $interval_rygestattidl_janej
 * @property string $interval_rygestattidl_ophorsaa
 * @property string $interval_rygestattidl_pakkeaar
 * @property string $interval_spiro_fev1
 * @property string $interval_spiro_fev1ipct
 * @property string $interval_spiro_fvc
 * @property string $interval_spiro_tiffe
 * @property string $interval_symptom_exacerbatione
 * @property string $interval_symptom_status
 * @property string $interval_symptom_symptomer
 * @property string $medicinaktion
 * @property string $medicingennem
 * @property string $rygs
 * @property string $sluttid
 * @property string $start
 * @property string $tid
 */
class Intervalkontrol extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Intervalkontrol the static model class
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
        return '{{intervalkontrol}}';
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
            array('deleted, event_id, submitted, interval_medicin_dosis, interval_medicin_forstfrekvens, interval_medicin_forstoverdosi, interval_medicin_frekvens', 'numerical', 'integerOnly'=>true),
            array('name, aktor, interval_aftaler_forvaerringsh, interval_aftaler_notat, interval_anamnese_ovrigeorgan, interval_anamnese_sidensidst, interval_bm_puls, interval_bm_respfrek, interval_bm_saturation, interval_bm_temperatur, interval_datotidecc, interval_medicin_andenmedicin, interval_medicin_bivirkninger, interval_medicin_ecc, interval_medicin_forstoverprep, interval_medicin_medicinaktion, interval_medicin_ovrigkolmedic, interval_medicin_pnmedforbrug, interval_obj_dyspno, interval_obj_farver, interval_obj_hud, interval_obj_odemer, interval_symptom_exacerbatione, interval_symptom_status, interval_symptom_symptomer', 'length', 'max'=>255),
            array('modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('dato, tid', 'length', 'max'=>50),
            array('eccaktor, interval_blodtryk_diastolsk, interval_blodtryk_systolsk, interval_borgermaal_bmi, interval_borgermaal_hojde, interval_borgermaal_vaegt, interval_medicin_forstoverstyr, interval_medicin_maengde, interval_rygestat_antalpakkeaa, interval_rygestat_cerutterperd, interval_rygestat_cigarerperda, interval_rygestat_cigaretter, interval_rygestat_fagerstrom, interval_rygestat_grampibetoba, interval_rygestattidl_ophorsaa, interval_rygestattidl_pakkeaar, interval_spiro_fev1, interval_spiro_fev1ipct, interval_spiro_tiffe, sluttid, start', 'length', 'max'=>25),
            array('ghgh, interval_medicin_pn, interval_rygestat_aldrigryger, interval_rygestat_onskerafv, interval_rygestat_ryger, interval_rygestattidl_janej, medicingennem, rygs', 'length', 'max'=>100),
            array('date_entered, date_modified, description, interval_aftaler_andenempowerm, interval_aftaler_opfolgendekon, interval_aftaler_rehabiliterin, interval_spiro_fvc, medicinaktion', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, aktor, dato, eccaktor, ghgh, interval_aftaler_andenempowerm, interval_aftaler_forvaerringsh, interval_aftaler_notat, interval_aftaler_opfolgendekon, interval_aftaler_rehabiliterin, interval_anamnese_ovrigeorgan, interval_anamnese_sidensidst, interval_blodtryk_diastolsk, interval_blodtryk_systolsk, interval_bm_puls, interval_bm_respfrek, interval_bm_saturation, interval_bm_temperatur, interval_borgermaal_bmi, interval_borgermaal_hojde, interval_borgermaal_vaegt, interval_datotidecc, interval_medicin_andenmedicin, interval_medicin_bivirkninger, interval_medicin_dosis, interval_medicin_ecc, interval_medicin_forstfrekvens, interval_medicin_forstoverdosi, interval_medicin_forstoverprep, interval_medicin_forstoverstyr, interval_medicin_frekvens, interval_medicin_maengde, interval_medicin_medicinaktion, interval_medicin_ovrigkolmedic, interval_medicin_pn, interval_medicin_pnmedforbrug, interval_obj_dyspno, interval_obj_farver, interval_obj_hud, interval_obj_odemer, interval_rygestat_aldrigryger, interval_rygestat_antalpakkeaa, interval_rygestat_cerutterperd, interval_rygestat_cigarerperda, interval_rygestat_cigaretter, interval_rygestat_fagerstrom, interval_rygestat_grampibetoba, interval_rygestat_onskerafv, interval_rygestat_ryger, interval_rygestattidl_janej, interval_rygestattidl_ophorsaa, interval_rygestattidl_pakkeaar, interval_spiro_fev1, interval_spiro_fev1ipct, interval_spiro_fvc, interval_spiro_tiffe, interval_symptom_exacerbatione, interval_symptom_status, interval_symptom_symptomer, medicinaktion, medicingennem, rygs, sluttid, start, tid', 'safe', 'on'=>'search'),
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
            'aktor' => 'Aktor',
            'dato' => 'Dato',
            'eccaktor' => 'Eccaktor',
            'ghgh' => 'Ghgh',
            'interval_aftaler_andenempowerm' => 'Interval Aftaler Andenempowerm',
            'interval_aftaler_forvaerringsh' => 'Interval Aftaler Forvaerringsh',
            'interval_aftaler_notat' => 'Interval Aftaler Notat',
            'interval_aftaler_opfolgendekon' => 'Interval Aftaler Opfolgendekon',
            'interval_aftaler_rehabiliterin' => 'Interval Aftaler Rehabiliterin',
            'interval_anamnese_ovrigeorgan' => 'Interval Anamnese Ovrigeorgan',
            'interval_anamnese_sidensidst' => 'Interval Anamnese Sidensidst',
            'interval_blodtryk_diastolsk' => 'Interval Blodtryk Diastolsk',
            'interval_blodtryk_systolsk' => 'Interval Blodtryk Systolsk',
            'interval_bm_puls' => 'Interval Bm Puls',
            'interval_bm_respfrek' => 'Interval Bm Respfrek',
            'interval_bm_saturation' => 'Interval Bm Saturation',
            'interval_bm_temperatur' => 'Interval Bm Temperatur',
            'interval_borgermaal_bmi' => 'Interval Borgermaal Bmi',
            'interval_borgermaal_hojde' => 'Interval Borgermaal Hojde',
            'interval_borgermaal_vaegt' => 'Interval Borgermaal Vaegt',
            'interval_datotidecc' => 'Interval Datotidecc',
            'interval_medicin_andenmedicin' => 'Interval Medicin Andenmedicin',
            'interval_medicin_bivirkninger' => 'Interval Medicin Bivirkninger',
            'interval_medicin_dosis' => 'Interval Medicin Dosis',
            'interval_medicin_ecc' => 'Interval Medicin Ecc',
            'interval_medicin_forstfrekvens' => 'Interval Medicin Forstfrekvens',
            'interval_medicin_forstoverdosi' => 'Interval Medicin Forstoverdosi',
            'interval_medicin_forstoverprep' => 'Interval Medicin Forstoverprep',
            'interval_medicin_forstoverstyr' => 'Interval Medicin Forstoverstyr',
            'interval_medicin_frekvens' => 'Interval Medicin Frekvens',
            'interval_medicin_maengde' => 'Interval Medicin Maengde',
            'interval_medicin_medicinaktion' => 'Interval Medicin Medicinaktion',
            'interval_medicin_ovrigkolmedic' => 'Interval Medicin Ovrigkolmedic',
            'interval_medicin_pn' => 'Interval Medicin Pn',
            'interval_medicin_pnmedforbrug' => 'Interval Medicin Pnmedforbrug',
            'interval_obj_dyspno' => 'Interval Obj Dyspno',
            'interval_obj_farver' => 'Interval Obj Farver',
            'interval_obj_hud' => 'Interval Obj Hud',
            'interval_obj_odemer' => 'Interval Obj Odemer',
            'interval_rygestat_aldrigryger' => 'Interval Rygestat Aldrigryger',
            'interval_rygestat_antalpakkeaa' => 'Interval Rygestat Antalpakkeaa',
            'interval_rygestat_cerutterperd' => 'Interval Rygestat Cerutterperd',
            'interval_rygestat_cigarerperda' => 'Interval Rygestat Cigarerperda',
            'interval_rygestat_cigaretter' => 'Interval Rygestat Cigaretter',
            'interval_rygestat_fagerstrom' => 'Interval Rygestat Fagerstrom',
            'interval_rygestat_grampibetoba' => 'Interval Rygestat Grampibetoba',
            'interval_rygestat_onskerafv' => 'Interval Rygestat Onskerafv',
            'interval_rygestat_ryger' => 'Interval Rygestat Ryger',
            'interval_rygestattidl_janej' => 'Interval Rygestattidl Janej',
            'interval_rygestattidl_ophorsaa' => 'Interval Rygestattidl Ophorsaa',
            'interval_rygestattidl_pakkeaar' => 'Interval Rygestattidl Pakkeaar',
            'interval_spiro_fev1' => 'Interval Spiro Fev1',
            'interval_spiro_fev1ipct' => 'Interval Spiro Fev1ipct',
            'interval_spiro_fvc' => 'Interval Spiro Fvc',
            'interval_spiro_tiffe' => 'Interval Spiro Tiffe',
            'interval_symptom_exacerbatione' => 'Interval Symptom Exacerbatione',
            'interval_symptom_status' => 'Interval Symptom Status',
            'interval_symptom_symptomer' => 'Interval Symptom Symptomer',
            'medicinaktion' => 'Medicinaktion',
            'medicingennem' => 'Medicingennem',
            'rygs' => 'Rygs',
            'sluttid' => 'Sluttid',
            'start' => 'Start',
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
		$criteria->compare('aktor',$this->aktor,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('eccaktor',$this->eccaktor,true);
		$criteria->compare('ghgh',$this->ghgh,true);
		$criteria->compare('interval_aftaler_andenempowerm',$this->interval_aftaler_andenempowerm,true);
		$criteria->compare('interval_aftaler_forvaerringsh',$this->interval_aftaler_forvaerringsh,true);
		$criteria->compare('interval_aftaler_notat',$this->interval_aftaler_notat,true);
		$criteria->compare('interval_aftaler_opfolgendekon',$this->interval_aftaler_opfolgendekon,true);
		$criteria->compare('interval_aftaler_rehabiliterin',$this->interval_aftaler_rehabiliterin,true);
		$criteria->compare('interval_anamnese_ovrigeorgan',$this->interval_anamnese_ovrigeorgan,true);
		$criteria->compare('interval_anamnese_sidensidst',$this->interval_anamnese_sidensidst,true);
		$criteria->compare('interval_blodtryk_diastolsk',$this->interval_blodtryk_diastolsk,true);
		$criteria->compare('interval_blodtryk_systolsk',$this->interval_blodtryk_systolsk,true);
		$criteria->compare('interval_bm_puls',$this->interval_bm_puls,true);
		$criteria->compare('interval_bm_respfrek',$this->interval_bm_respfrek,true);
		$criteria->compare('interval_bm_saturation',$this->interval_bm_saturation,true);
		$criteria->compare('interval_bm_temperatur',$this->interval_bm_temperatur,true);
		$criteria->compare('interval_borgermaal_bmi',$this->interval_borgermaal_bmi,true);
		$criteria->compare('interval_borgermaal_hojde',$this->interval_borgermaal_hojde,true);
		$criteria->compare('interval_borgermaal_vaegt',$this->interval_borgermaal_vaegt,true);
		$criteria->compare('interval_datotidecc',$this->interval_datotidecc,true);
		$criteria->compare('interval_medicin_andenmedicin',$this->interval_medicin_andenmedicin,true);
		$criteria->compare('interval_medicin_bivirkninger',$this->interval_medicin_bivirkninger,true);
		$criteria->compare('interval_medicin_dosis',$this->interval_medicin_dosis);
		$criteria->compare('interval_medicin_ecc',$this->interval_medicin_ecc,true);
		$criteria->compare('interval_medicin_forstfrekvens',$this->interval_medicin_forstfrekvens);
		$criteria->compare('interval_medicin_forstoverdosi',$this->interval_medicin_forstoverdosi);
		$criteria->compare('interval_medicin_forstoverprep',$this->interval_medicin_forstoverprep,true);
		$criteria->compare('interval_medicin_forstoverstyr',$this->interval_medicin_forstoverstyr,true);
		$criteria->compare('interval_medicin_frekvens',$this->interval_medicin_frekvens);
		$criteria->compare('interval_medicin_maengde',$this->interval_medicin_maengde,true);
		$criteria->compare('interval_medicin_medicinaktion',$this->interval_medicin_medicinaktion,true);
		$criteria->compare('interval_medicin_ovrigkolmedic',$this->interval_medicin_ovrigkolmedic,true);
		$criteria->compare('interval_medicin_pn',$this->interval_medicin_pn,true);
		$criteria->compare('interval_medicin_pnmedforbrug',$this->interval_medicin_pnmedforbrug,true);
		$criteria->compare('interval_obj_dyspno',$this->interval_obj_dyspno,true);
		$criteria->compare('interval_obj_farver',$this->interval_obj_farver,true);
		$criteria->compare('interval_obj_hud',$this->interval_obj_hud,true);
		$criteria->compare('interval_obj_odemer',$this->interval_obj_odemer,true);
		$criteria->compare('interval_rygestat_aldrigryger',$this->interval_rygestat_aldrigryger,true);
		$criteria->compare('interval_rygestat_antalpakkeaa',$this->interval_rygestat_antalpakkeaa,true);
		$criteria->compare('interval_rygestat_cerutterperd',$this->interval_rygestat_cerutterperd,true);
		$criteria->compare('interval_rygestat_cigarerperda',$this->interval_rygestat_cigarerperda,true);
		$criteria->compare('interval_rygestat_cigaretter',$this->interval_rygestat_cigaretter,true);
		$criteria->compare('interval_rygestat_fagerstrom',$this->interval_rygestat_fagerstrom,true);
		$criteria->compare('interval_rygestat_grampibetoba',$this->interval_rygestat_grampibetoba,true);
		$criteria->compare('interval_rygestat_onskerafv',$this->interval_rygestat_onskerafv,true);
		$criteria->compare('interval_rygestat_ryger',$this->interval_rygestat_ryger,true);
		$criteria->compare('interval_rygestattidl_janej',$this->interval_rygestattidl_janej,true);
		$criteria->compare('interval_rygestattidl_ophorsaa',$this->interval_rygestattidl_ophorsaa,true);
		$criteria->compare('interval_rygestattidl_pakkeaar',$this->interval_rygestattidl_pakkeaar,true);
		$criteria->compare('interval_spiro_fev1',$this->interval_spiro_fev1,true);
		$criteria->compare('interval_spiro_fev1ipct',$this->interval_spiro_fev1ipct,true);
		$criteria->compare('interval_spiro_fvc',$this->interval_spiro_fvc,true);
		$criteria->compare('interval_spiro_tiffe',$this->interval_spiro_tiffe,true);
		$criteria->compare('interval_symptom_exacerbatione',$this->interval_symptom_exacerbatione,true);
		$criteria->compare('interval_symptom_status',$this->interval_symptom_status,true);
		$criteria->compare('interval_symptom_symptomer',$this->interval_symptom_symptomer,true);
		$criteria->compare('medicinaktion',$this->medicinaktion,true);
		$criteria->compare('medicingennem',$this->medicingennem,true);
		$criteria->compare('rygs',$this->rygs,true);
		$criteria->compare('sluttid',$this->sluttid,true);
		$criteria->compare('start',$this->start,true);
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