<?php

/**
 * This is the model class for table "{{stamdata}}".
 *
 * The followings are the available columns in table '{{stamdata}}':
 * @property string $id
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
 * @property string $adresse_1
 * @property string $alt
 * @property integer $alternativ_telefon
 * @property string $billede_af_borger
 * @property string $borger_adresse
 * @property integer $borger_alder
 * @property string $borger_alt
 * @property string $borger_by
 * @property string $borger_cpr
 * @property string $borger_efternavn
 * @property string $borger_fornavn
 * @property string $borger_kon
 * @property string $borger_mail
 * @property string $borger_mobil
 * @property string $borger_zip
 * @property string $bqa
 * @property string $cpr
 * @property string $dato
 * @property string $ecc_aktor
 * @property string $ef
 * @property string $efternavn_1
 * @property string $egen_by
 * @property integer $egen_kontakttlf
 * @property string $egen_mail
 * @property string $egen_navne
 * @property string $egen_praksisadresse
 * @property string $egen_praksisnavn
 * @property integer $egen_ydernummer
 * @property string $em
 * @property integer $enge_zip
 * @property string $forn
 * @property string $hos_email
 * @property string $hos_kontakt
 * @property string $hos_navn
 * @property integer $hos_telefonnummer
 * @property string $kom_bopael
 * @property string $kom_kontakt
 * @property string $kom_mai
 * @property integer $kom_tlf
 * @property string $kq
 * @property string $mobil
 * @property integer $mobilnummer
 * @property string $paar_adresse
 * @property integer $paar_alt
 * @property string $paar_by
 * @property string $paar_efternavn
 * @property string $paar_fornavn
 * @property string $paar_kon
 * @property string $paar_mail
 * @property integer $paar_mobil
 * @property string $paar_postnummer
 * @property string $paar_relation
 * @property string $post
 * @property string $postnummer
 * @property string $rel
 * @property string $relation_1
 * @property string $slut_tid
 * @property string $soc_aegte_andet
 * @property integer $soc_aegte_born
 * @property string $soc_aegte_enke
 * @property string $soc_aegte_enlig
 * @property string $soc_aegte_gift
 * @property string $soc_aegte_haand
 * @property string $soc_aegte_mellem
 * @property string $soc_aegte_sam
 * @property string $soc_aegte_student
 * @property string $soc_arbejd_deltid
 * @property string $soc_arbejd_fuldtid
 * @property string $soc_arbejd_hjemm
 * @property string $soc_arbejd_nujob
 * @property string $soc_arbejd_pen
 * @property string $soc_arbejd_tidl1
 * @property string $soc_arbejd_tidl2
 * @property string $soc_arbejd_tidl3
 * @property string $soc_bolig_ejer
 * @property string $soc_bolig_elevato
 * @property string $soc_bolig_hus
 * @property string $soc_bolig_lejebolig
 * @property string $soc_udd_folke
 * @property string $soc_uddan_uni
 * @property string $start_tid
 */
class Stamdata extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Stamdata the static model class
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
        return '{{stamdata}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, name, event_id', 'required'),
            array('deleted, event_id, submitted', 'numerical', 'integerOnly'=>true),
            array('id, modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('name, borger_efternavn, borger_fornavn, ecc_aktor, egen_praksisnavn, hos_email, hos_navn, kom_mai, slut_tid, start_tid', 'length', 'max'=>255),
            array('alt, efternavn_1, kq, postnummer, relation_1', 'length', 'max'=>25),
            array('billede_af_borger, borger_kon, soc_aegte_enke, soc_aegte_enlig, soc_aegte_gift, soc_aegte_haand, soc_aegte_mellem, soc_aegte_sam, soc_aegte_student, soc_arbejd_deltid, soc_arbejd_fuldtid, soc_arbejd_hjemm, soc_arbejd_pen, soc_bolig_ejer, soc_bolig_elevato, soc_bolig_hus, soc_bolig_lejebolig, soc_udd_folke, soc_uddan_uni', 'length', 'max'=>100),
            array('borger_alt, borger_mobil', 'length', 'max'=>8),
            array('borger_cpr', 'length', 'max'=>10),
            array('borger_zip', 'length', 'max'=>4),
            array('cpr', 'length', 'max'=>11),
            array('date_entered, date_modified, description, adresse_1, borger_adresse, borger_by, borger_mail, bqa, dato, ef, egen_by, egen_mail, egen_navne, egen_praksisadresse, em, forn, hos_kontakt, kom_bopael, kom_kontakt, mobil, paar_adresse, paar_by, paar_efternavn, paar_fornavn, paar_kon, paar_mail, paar_postnummer, paar_relation, post, rel, soc_aegte_andet, soc_arbejd_nujob, soc_arbejd_tidl1, soc_arbejd_tidl2, soc_arbejd_tidl3', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, adresse_1, alt, alternativ_telefon, billede_af_borger, borger_adresse, borger_alder, borger_alt, borger_by, borger_cpr, borger_efternavn, borger_fornavn, borger_kon, borger_mail, borger_mobil, borger_zip, bqa, cpr, dato, ecc_aktor, ef, efternavn_1, egen_by, egen_kontakttlf, egen_mail, egen_navne, egen_praksisadresse, egen_praksisnavn, egen_ydernummer, em, enge_zip, forn, hos_email, hos_kontakt, hos_navn, hos_telefonnummer, kom_bopael, kom_kontakt, kom_mai, kom_tlf, kq, mobil, mobilnummer, paar_adresse, paar_alt, paar_by, paar_efternavn, paar_fornavn, paar_kon, paar_mail, paar_mobil, paar_postnummer, paar_relation, post, postnummer, rel, relation_1, slut_tid, soc_aegte_andet, soc_aegte_born, soc_aegte_enke, soc_aegte_enlig, soc_aegte_gift, soc_aegte_haand, soc_aegte_mellem, soc_aegte_sam, soc_aegte_student, soc_arbejd_deltid, soc_arbejd_fuldtid, soc_arbejd_hjemm, soc_arbejd_nujob, soc_arbejd_pen, soc_arbejd_tidl1, soc_arbejd_tidl2, soc_arbejd_tidl3, soc_bolig_ejer, soc_bolig_elevato, soc_bolig_hus, soc_bolig_lejebolig, soc_udd_folke, soc_uddan_uni, start_tid', 'safe', 'on'=>'search'),
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
            'name' => 'ID',
            'date_entered' => 'Date Entered',
            'date_modified' => 'Date Modified',
            'modified_user_id' => 'Modified User',
            'created_by' => 'Created By',
            'description' => 'Description',
            'deleted' => 'Deleted',
            'assigned_user_id' => 'Assigned User',
            'event_id' => 'Event',
            'submitted' => 'Submitted',
            'adresse_1' => 'Adresse 1',
            'alt' => 'Alt',
            'alternativ_telefon' => 'Alternativ Telefon',
            'billede_af_borger' => 'Billede Af Borger',
            'borger_adresse' => 'Borger Adresse',
            'borger_alder' => 'Borger Alder',
            'borger_alt' => 'Borger Alt',
            'borger_by' => 'Borger By',
            'borger_cpr' => 'Borger Cpr',
            'borger_efternavn' => 'Borger Efternavn',
            'borger_fornavn' => 'Borger Fornavn',
            'borger_kon' => 'Borger Kon',
            'borger_mail' => 'Borger Mail',
            'borger_mobil' => 'Borger Mobil',
            'borger_zip' => 'Borger Zip',
            'bqa' => 'Bqa',
            'cpr' => 'Cpr',
            'dato' => 'Dato',
            'ecc_aktor' => 'Ecc Aktor',
            'ef' => 'Ef',
            'efternavn_1' => 'Efternavn 1',
            'egen_by' => 'Egen By',
            'egen_kontakttlf' => 'Egen Kontakttlf',
            'egen_mail' => 'Egen Mail',
            'egen_navne' => 'Egen Navne',
            'egen_praksisadresse' => 'Egen Praksisadresse',
            'egen_praksisnavn' => 'Egen Praksisnavn',
            'egen_ydernummer' => 'Egen Ydernummer',
            'em' => 'Em',
            'enge_zip' => 'Enge Zip',
            'forn' => 'Forn',
            'hos_email' => 'Hos Email',
            'hos_kontakt' => 'Hos Kontakt',
            'hos_navn' => 'Hos Navn',
            'hos_telefonnummer' => 'Hos Telefonnummer',
            'kom_bopael' => 'Kom Bopael',
            'kom_kontakt' => 'Kom Kontakt',
            'kom_mai' => 'Kom Mai',
            'kom_tlf' => 'Kom Tlf',
            'kq' => 'Kq',
            'mobil' => 'Mobil',
            'mobilnummer' => 'Mobilnummer',
            'paar_adresse' => 'Paar Adresse',
            'paar_alt' => 'Paar Alt',
            'paar_by' => 'Paar By',
            'paar_efternavn' => 'Paar Efternavn',
            'paar_fornavn' => 'Paar Fornavn',
            'paar_kon' => 'Paar Kon',
            'paar_mail' => 'Paar Mail',
            'paar_mobil' => 'Paar Mobil',
            'paar_postnummer' => 'Paar Postnummer',
            'paar_relation' => 'Paar Relation',
            'post' => 'Post',
            'postnummer' => 'Postnummer',
            'rel' => 'Rel',
            'relation_1' => 'Relation 1',
            'slut_tid' => 'Slut Tid',
            'soc_aegte_andet' => 'Soc Aegte Andet',
            'soc_aegte_born' => 'Soc Aegte Born',
            'soc_aegte_enke' => 'Soc Aegte Enke',
            'soc_aegte_enlig' => 'Soc Aegte Enlig',
            'soc_aegte_gift' => 'Soc Aegte Gift',
            'soc_aegte_haand' => 'Soc Aegte Haand',
            'soc_aegte_mellem' => 'Soc Aegte Mellem',
            'soc_aegte_sam' => 'Soc Aegte Sam',
            'soc_aegte_student' => 'Soc Aegte Student',
            'soc_arbejd_deltid' => 'Soc Arbejd Deltid',
            'soc_arbejd_fuldtid' => 'Soc Arbejd Fuldtid',
            'soc_arbejd_hjemm' => 'Soc Arbejd Hjemm',
            'soc_arbejd_nujob' => 'Soc Arbejd Nujob',
            'soc_arbejd_pen' => 'Soc Arbejd Pen',
            'soc_arbejd_tidl1' => 'Soc Arbejd Tidl1',
            'soc_arbejd_tidl2' => 'Soc Arbejd Tidl2',
            'soc_arbejd_tidl3' => 'Soc Arbejd Tidl3',
            'soc_bolig_ejer' => 'Soc Bolig Ejer',
            'soc_bolig_elevato' => 'Soc Bolig Elevato',
            'soc_bolig_hus' => 'Soc Bolig Hus',
            'soc_bolig_lejebolig' => 'Soc Bolig Lejebolig',
            'soc_udd_folke' => 'Soc Udd Folke',
            'soc_uddan_uni' => 'Soc Uddan Uni',
            'start_tid' => 'Start Tid',
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

		$criteria->compare('id',$this->id,true);
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
		$criteria->compare('adresse_1',$this->adresse_1,true);
		$criteria->compare('alt',$this->alt,true);
		$criteria->compare('alternativ_telefon',$this->alternativ_telefon);
		$criteria->compare('billede_af_borger',$this->billede_af_borger,true);
		$criteria->compare('borger_adresse',$this->borger_adresse,true);
		$criteria->compare('borger_alder',$this->borger_alder);
		$criteria->compare('borger_alt',$this->borger_alt,true);
		$criteria->compare('borger_by',$this->borger_by,true);
		$criteria->compare('borger_cpr',$this->borger_cpr,true);
		$criteria->compare('borger_efternavn',$this->borger_efternavn,true);
		$criteria->compare('borger_fornavn',$this->borger_fornavn,true);
		$criteria->compare('borger_kon',$this->borger_kon,true);
		$criteria->compare('borger_mail',$this->borger_mail,true);
		$criteria->compare('borger_mobil',$this->borger_mobil,true);
		$criteria->compare('borger_zip',$this->borger_zip,true);
		$criteria->compare('bqa',$this->bqa,true);
		$criteria->compare('cpr',$this->cpr,true);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('ecc_aktor',$this->ecc_aktor,true);
		$criteria->compare('ef',$this->ef,true);
		$criteria->compare('efternavn_1',$this->efternavn_1,true);
		$criteria->compare('egen_by',$this->egen_by,true);
		$criteria->compare('egen_kontakttlf',$this->egen_kontakttlf);
		$criteria->compare('egen_mail',$this->egen_mail,true);
		$criteria->compare('egen_navne',$this->egen_navne,true);
		$criteria->compare('egen_praksisadresse',$this->egen_praksisadresse,true);
		$criteria->compare('egen_praksisnavn',$this->egen_praksisnavn,true);
		$criteria->compare('egen_ydernummer',$this->egen_ydernummer);
		$criteria->compare('em',$this->em,true);
		$criteria->compare('enge_zip',$this->enge_zip);
		$criteria->compare('forn',$this->forn,true);
		$criteria->compare('hos_email',$this->hos_email,true);
		$criteria->compare('hos_kontakt',$this->hos_kontakt,true);
		$criteria->compare('hos_navn',$this->hos_navn,true);
		$criteria->compare('hos_telefonnummer',$this->hos_telefonnummer);
		$criteria->compare('kom_bopael',$this->kom_bopael,true);
		$criteria->compare('kom_kontakt',$this->kom_kontakt,true);
		$criteria->compare('kom_mai',$this->kom_mai,true);
		$criteria->compare('kom_tlf',$this->kom_tlf);
		$criteria->compare('kq',$this->kq,true);
		$criteria->compare('mobil',$this->mobil,true);
		$criteria->compare('mobilnummer',$this->mobilnummer);
		$criteria->compare('paar_adresse',$this->paar_adresse,true);
		$criteria->compare('paar_alt',$this->paar_alt);
		$criteria->compare('paar_by',$this->paar_by,true);
		$criteria->compare('paar_efternavn',$this->paar_efternavn,true);
		$criteria->compare('paar_fornavn',$this->paar_fornavn,true);
		$criteria->compare('paar_kon',$this->paar_kon,true);
		$criteria->compare('paar_mail',$this->paar_mail,true);
		$criteria->compare('paar_mobil',$this->paar_mobil);
		$criteria->compare('paar_postnummer',$this->paar_postnummer,true);
		$criteria->compare('paar_relation',$this->paar_relation,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('postnummer',$this->postnummer,true);
		$criteria->compare('rel',$this->rel,true);
		$criteria->compare('relation_1',$this->relation_1,true);
		$criteria->compare('slut_tid',$this->slut_tid,true);
		$criteria->compare('soc_aegte_andet',$this->soc_aegte_andet,true);
		$criteria->compare('soc_aegte_born',$this->soc_aegte_born);
		$criteria->compare('soc_aegte_enke',$this->soc_aegte_enke,true);
		$criteria->compare('soc_aegte_enlig',$this->soc_aegte_enlig,true);
		$criteria->compare('soc_aegte_gift',$this->soc_aegte_gift,true);
		$criteria->compare('soc_aegte_haand',$this->soc_aegte_haand,true);
		$criteria->compare('soc_aegte_mellem',$this->soc_aegte_mellem,true);
		$criteria->compare('soc_aegte_sam',$this->soc_aegte_sam,true);
		$criteria->compare('soc_aegte_student',$this->soc_aegte_student,true);
		$criteria->compare('soc_arbejd_deltid',$this->soc_arbejd_deltid,true);
		$criteria->compare('soc_arbejd_fuldtid',$this->soc_arbejd_fuldtid,true);
		$criteria->compare('soc_arbejd_hjemm',$this->soc_arbejd_hjemm,true);
		$criteria->compare('soc_arbejd_nujob',$this->soc_arbejd_nujob,true);
		$criteria->compare('soc_arbejd_pen',$this->soc_arbejd_pen,true);
		$criteria->compare('soc_arbejd_tidl1',$this->soc_arbejd_tidl1,true);
		$criteria->compare('soc_arbejd_tidl2',$this->soc_arbejd_tidl2,true);
		$criteria->compare('soc_arbejd_tidl3',$this->soc_arbejd_tidl3,true);
		$criteria->compare('soc_bolig_ejer',$this->soc_bolig_ejer,true);
		$criteria->compare('soc_bolig_elevato',$this->soc_bolig_elevato,true);
		$criteria->compare('soc_bolig_hus',$this->soc_bolig_hus,true);
		$criteria->compare('soc_bolig_lejebolig',$this->soc_bolig_lejebolig,true);
		$criteria->compare('soc_udd_folke',$this->soc_udd_folke,true);
		$criteria->compare('soc_uddan_uni',$this->soc_uddan_uni,true);
		$criteria->compare('start_tid',$this->start_tid,true);

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