<?php

/**
 * This is the model class for table "{{akut_henvendelse}}".
 *
 * The followings are the available columns in table '{{akut_henvendelse}}':
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
 * @property string $aakt
 * @property string $aktuelfarvepatilstandsvarkt
 * @property string $anamnese
 * @property string $arsag
 * @property integer $blod_diastoliskblodtryk
 * @property integer $blod_systoliskblodtryk
 * @property integer $borg_puls
 * @property integer $borg_respirationsfrekvens
 * @property integer $borg_saturationsat
 * @property double $borg_temperatur
 * @property string $daato
 * @property string $dato
 * @property string $eccaktor
 * @property string $farvedesidstetredage
 * @property integer $for_dosis
 * @property integer $for_frekvens
 * @property string $for_praparat
 * @property double $for_styrke
 * @property string $medicin_gg_anden
 * @property string $medicin_gg_bivirkninger
 * @property string $medicin_gg_hjemdosis
 * @property integer $medicin_gg_hjemfrekvens
 * @property string $medicin_gg_medicinforbrug
 * @property string $medicin_gg_ovrig
 * @property string $medicin_medicinaktion
 * @property string $medig
 * @property string $obj_dyspno
 * @property string $obj_farver
 * @property string $obj_hud
 * @property string $obj_odemer
 * @property string $pn
 * @property string $pn_maengde
 * @property string $sluttid
 * @property double $spiro_fev1
 * @property integer $spiro_fev1iafforventet
 * @property double $spiro_fvc
 * @property double $spiro_tiffeneaindexfevfv
 * @property string $starttid
 * @property string $tid
 * @property string $tiltag_andre_aftaler
 * @property string $tiltag_empowerment
 * @property string $tiltag_opfolging
 * @property string $tiltag_visit_andet
 * @property string $tiltag_visit_indlaeg
 * @property string $tiltag_visit_intensiveret
 */
class AkutHenvendelse extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AkutHenvendelse the static model class
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
        return '{{akut_henvendelse}}';
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
            array('deleted, event_id, submitted, blod_diastoliskblodtryk, blod_systoliskblodtryk, borg_puls, borg_respirationsfrekvens, borg_saturationsat, for_dosis, for_frekvens, medicin_gg_hjemfrekvens, spiro_fev1iafforventet', 'numerical', 'integerOnly'=>true),
            array('borg_temperatur, for_styrke, spiro_fev1, spiro_fvc, spiro_tiffeneaindexfevfv', 'numerical'),
            array('name, aakt, eccaktor', 'length', 'max'=>255),
            array('modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('medicin_gg_hjemdosis', 'length', 'max'=>10),
            array('medig, pn', 'length', 'max'=>100),
            array('pn_maengde, sluttid, starttid, tid', 'length', 'max'=>25),
            array('date_entered, date_modified, description, aktuelfarvepatilstandsvarkt, anamnese, arsag, daato, dato, farvedesidstetredage, for_praparat, medicin_gg_anden, medicin_gg_bivirkninger, medicin_gg_medicinforbrug, medicin_gg_ovrig, medicin_medicinaktion, obj_dyspno, obj_farver, obj_hud, obj_odemer, tiltag_andre_aftaler, tiltag_empowerment, tiltag_opfolging, tiltag_visit_andet, tiltag_visit_indlaeg, tiltag_visit_intensiveret', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, aakt, aktuelfarvepatilstandsvarkt, anamnese, arsag, blod_diastoliskblodtryk, blod_systoliskblodtryk, borg_puls, borg_respirationsfrekvens, borg_saturationsat, borg_temperatur, daato, dato, eccaktor, farvedesidstetredage, for_dosis, for_frekvens, for_praparat, for_styrke, medicin_gg_anden, medicin_gg_bivirkninger, medicin_gg_hjemdosis, medicin_gg_hjemfrekvens, medicin_gg_medicinforbrug, medicin_gg_ovrig, medicin_medicinaktion, medig, obj_dyspno, obj_farver, obj_hud, obj_odemer, pn, pn_maengde, sluttid, spiro_fev1, spiro_fev1iafforventet, spiro_fvc, spiro_tiffeneaindexfevfv, starttid, tid, tiltag_andre_aftaler, tiltag_empowerment, tiltag_opfolging, tiltag_visit_andet, tiltag_visit_indlaeg, tiltag_visit_intensiveret', 'safe', 'on'=>'search'),
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
            'aakt' => 'Aakt',
            'aktuelfarvepatilstandsvarkt' => 'Aktuelfarvepatilstandsvarkt',
            'anamnese' => 'Anamnese',
            'arsag' => 'Arsag',
            'blod_diastoliskblodtryk' => 'Blod Diastoliskblodtryk',
            'blod_systoliskblodtryk' => 'Blod Systoliskblodtryk',
            'borg_puls' => 'Borg Puls',
            'borg_respirationsfrekvens' => 'Borg Respirationsfrekvens',
            'borg_saturationsat' => 'Borg Saturationsat',
            'borg_temperatur' => 'Borg Temperatur',
            'daato' => 'Daato',
            'dato' => 'Dato',
            'eccaktor' => 'Eccaktor',
            'farvedesidstetredage' => 'Farvedesidstetredage',
            'for_dosis' => 'For Dosis',
            'for_frekvens' => 'For Frekvens',
            'for_praparat' => 'For Praparat',
            'for_styrke' => 'For Styrke',
            'medicin_gg_anden' => 'Medicin Gg Anden',
            'medicin_gg_bivirkninger' => 'Medicin Gg Bivirkninger',
            'medicin_gg_hjemdosis' => 'Medicin Gg Hjemdosis',
            'medicin_gg_hjemfrekvens' => 'Medicin Gg Hjemfrekvens',
            'medicin_gg_medicinforbrug' => 'Medicin Gg Medicinforbrug',
            'medicin_gg_ovrig' => 'Medicin Gg Ovrig',
            'medicin_medicinaktion' => 'Medicin Medicinaktion',
            'medig' => 'Medig',
            'obj_dyspno' => 'Obj Dyspno',
            'obj_farver' => 'Obj Farver',
            'obj_hud' => 'Obj Hud',
            'obj_odemer' => 'Obj Odemer',
            'pn' => 'Pn',
            'pn_maengde' => 'Pn Maengde',
            'sluttid' => 'Sluttid',
            'spiro_fev1' => 'Spiro Fev1',
            'spiro_fev1iafforventet' => 'Spiro Fev1iafforventet',
            'spiro_fvc' => 'Spiro Fvc',
            'spiro_tiffeneaindexfevfv' => 'Spiro Tiffeneaindexfevfv',
            'starttid' => 'Starttid',
            'tid' => 'Tid',
            'tiltag_andre_aftaler' => 'Tiltag Andre Aftaler',
            'tiltag_empowerment' => 'Tiltag Empowerment',
            'tiltag_opfolging' => 'Tiltag Opfolging',
            'tiltag_visit_andet' => 'Tiltag Visit Andet',
            'tiltag_visit_indlaeg' => 'Tiltag Visit Indlaeg',
            'tiltag_visit_intensiveret' => 'Tiltag Visit Intensiveret',
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
		$criteria->compare('aakt',$this->aakt,true);
		$criteria->compare('aktuelfarvepatilstandsvarkt',$this->aktuelfarvepatilstandsvarkt,true);
		$criteria->compare('anamnese',$this->anamnese,true);
		$criteria->compare('arsag',$this->arsag,true);
		$criteria->compare('blod_diastoliskblodtryk',$this->blod_diastoliskblodtryk);
		$criteria->compare('blod_systoliskblodtryk',$this->blod_systoliskblodtryk);
		$criteria->compare('borg_puls',$this->borg_puls);
		$criteria->compare('borg_respirationsfrekvens',$this->borg_respirationsfrekvens);
		$criteria->compare('borg_saturationsat',$this->borg_saturationsat);
		$criteria->compare('borg_temperatur',$this->borg_temperatur);
		$criteria->compare('daato',$this->daato,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('eccaktor',$this->eccaktor,true);
		$criteria->compare('farvedesidstetredage',$this->farvedesidstetredage,true);
		$criteria->compare('for_dosis',$this->for_dosis);
		$criteria->compare('for_frekvens',$this->for_frekvens);
		$criteria->compare('for_praparat',$this->for_praparat,true);
		$criteria->compare('for_styrke',$this->for_styrke);
		$criteria->compare('medicin_gg_anden',$this->medicin_gg_anden,true);
		$criteria->compare('medicin_gg_bivirkninger',$this->medicin_gg_bivirkninger,true);
		$criteria->compare('medicin_gg_hjemdosis',$this->medicin_gg_hjemdosis,true);
		$criteria->compare('medicin_gg_hjemfrekvens',$this->medicin_gg_hjemfrekvens);
		$criteria->compare('medicin_gg_medicinforbrug',$this->medicin_gg_medicinforbrug,true);
		$criteria->compare('medicin_gg_ovrig',$this->medicin_gg_ovrig,true);
		$criteria->compare('medicin_medicinaktion',$this->medicin_medicinaktion,true);
		$criteria->compare('medig',$this->medig,true);
		$criteria->compare('obj_dyspno',$this->obj_dyspno,true);
		$criteria->compare('obj_farver',$this->obj_farver,true);
		$criteria->compare('obj_hud',$this->obj_hud,true);
		$criteria->compare('obj_odemer',$this->obj_odemer,true);
		$criteria->compare('pn',$this->pn,true);
		$criteria->compare('pn_maengde',$this->pn_maengde,true);
		$criteria->compare('sluttid',$this->sluttid,true);
		$criteria->compare('spiro_fev1',$this->spiro_fev1);
		$criteria->compare('spiro_fev1iafforventet',$this->spiro_fev1iafforventet);
		$criteria->compare('spiro_fvc',$this->spiro_fvc);
		$criteria->compare('spiro_tiffeneaindexfevfv',$this->spiro_tiffeneaindexfevfv);
		$criteria->compare('starttid',$this->starttid,true);
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('tiltag_andre_aftaler',$this->tiltag_andre_aftaler,true);
		$criteria->compare('tiltag_empowerment',$this->tiltag_empowerment,true);
		$criteria->compare('tiltag_opfolging',$this->tiltag_opfolging,true);
		$criteria->compare('tiltag_visit_andet',$this->tiltag_visit_andet,true);
		$criteria->compare('tiltag_visit_indlaeg',$this->tiltag_visit_indlaeg,true);
		$criteria->compare('tiltag_visit_intensiveret',$this->tiltag_visit_intensiveret,true);

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