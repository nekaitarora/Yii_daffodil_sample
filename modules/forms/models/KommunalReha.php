<?php

/**
 * This is the model class for table "{{kommunal_reha}}".
 *
 * The followings are the available columns in table '{{kommunal_reha}}':
 * @property integer $id
 * @property string $name
 * @property string $date_entered
 * @property string $date_modified
 * @property string $modified_user_id
 * @property string $created_by
 * @property string $description
 * @property integer $deleted
 * @property string $list_id
 * @property string $assigned_user_id
 * @property integer $event_id
 * @property integer $submitted
 * @property string $anamnestiske_oplysninger
 * @property string $boo_datoforbooster01
 * @property string $boo_datoforbooster02
 * @property string $boo_datoforbooster03
 * @property string $borfunk_klarertrappegang
 * @property string $borger_adresse
 * @property integer $borger_cprnummer
 * @property string $borger_efternavn
 * @property string $borger_fornavn
 * @property integer $borger_tlf
 * @property string $borgfunk_andet
 * @property string $borgfunk_behovforilttilskud
 * @property string $borgfunk_gangdistance
 * @property string $borgfunk_hjalptilpersonligp
 * @property string $borgfunk_kommerpagaden
 * @property string $borgfunk_personligselvhjulpen
 * @property string $borgfunk_praktiskhjalptilre
 * @property string $borgfunk_selvhjulpen
 * @property integer $broger_tlff
 * @property string $dato
 * @property string $dia_andet
 * @property string $diag_bidiagnoser
 * @property string $diag_hoveddiagnose
 * @property string $eccktor
 * @property string $er
 * @property string $erna_beh_forinddia
 * @property double $erna_bodymassndex
 * @property string $erna_ffmi1
 * @property string $erna_utilsigtetvagttab
 * @property string $genop_afdeling
 * @property string $genop_dato
 * @property string $genop_efternavn_fornavn
 * @property string $genop_email
 * @property integer $genop_fax
 * @property integer $genop_telefon
 * @property string $genop_titel
 * @property string $kommentarer
 * @property string $kon_datoforkontakttilborger
 * @property string $kon_indlaggelsesdato
 * @property string $kon_udskrivningsdato
 * @property string $kontaktpersonikommune
 * @property string $kontaktpersonikommune_titel_ef
 * @property integer $kontaktpersonko_tlf
 * @property string $kontaktpersonpahospital
 * @property string $kontaktpersonpahospital_titel
 * @property integer $kontaktpersonpahospital_tlf
 * @property string $opl_andenadresseangiv
 * @property string $opl_andet
 * @property string $opl_egenfolkeregisteradresse
 * @property string $opl_jatransportskalarrange
 * @property string $opl_nejborgerensorgerselv
 * @property string $opl_rollator
 * @property integer $prak_fax
 * @property string $prak_fornavnefternavn
 * @property integer $prak_kontakttelefon
 * @property string $prak_praksisadresse
 * @property string $regi
 * @property string $regi_dropdown
 * @property string $rehab_resultat
 * @property double $rehab_spio_fev1
 * @property integer $rehab_spio_fevfor
 * @property double $rehab_spio_fvc
 * @property double $rehab_spio_tiffen
 * @property integer $rehab_straf_antaex
 * @property integer $rehab_straf_gold
 * @property string $rehab_straf_mrc
 * @property string $rehabiliteringshenvisningstat
 * @property string $rygsta_aldri_janej
 * @property double $rygsta_ryger_antalpa
 * @property integer $rygsta_ryger_cerutter
 * @property integer $rygsta_ryger_cigaratter
 * @property integer $rygsta_ryger_cigarer
 * @property integer $rygsta_ryger_cigaretter
 * @property string $rygsta_ryger_janej
 * @property double $rygsta_ryger_pibet
 * @property string $rygsta_ryger_rygaf
 * @property integer $rygsta_ryger_score
 * @property string $rygsta_tidl_janej
 * @property integer $rygsta_tidl_ophorsar
 * @property integer $rygsta_tidl_pakkear
 * @property string $slut
 * @property string $start
 */
class KommunalReha extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return KommunalReha the static model class
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
        return '{{kommunal_reha}}';
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
            array('deleted, event_id, submitted, borger_cprnummer, borger_tlf, broger_tlff, genop_fax, genop_telefon, kontaktpersonko_tlf, kontaktpersonpahospital_tlf, prak_fax, prak_kontakttelefon, rehab_spio_fevfor, rehab_straf_antaex, rehab_straf_gold, rygsta_ryger_cerutter, rygsta_ryger_cigaratter, rygsta_ryger_cigarer, rygsta_ryger_cigaretter, rygsta_ryger_score, rygsta_tidl_ophorsar, rygsta_tidl_pakkear', 'numerical', 'integerOnly'=>true),
            array('erna_bodymassndex, rehab_spio_fev1, rehab_spio_fvc, rehab_spio_tiffen, rygsta_ryger_antalpa, rygsta_ryger_pibet', 'numerical'),
            array('name', 'length', 'max'=>255),
            array('modified_user_id, created_by, list_id, assigned_user_id', 'length', 'max'=>36),
            array('borfunk_klarertrappegang, borgfunk_behovforilttilskud, borgfunk_hjalptilpersonligp, borgfunk_kommerpagaden, borgfunk_personligselvhjulpen, borgfunk_praktiskhjalptilre, borgfunk_selvhjulpen, er, opl_egenfolkeregisteradresse, opl_jatransportskalarrange, opl_nejborgerensorgerselv, opl_rollator, regi_dropdown, rehab_straf_mrc, rygsta_aldri_janej, rygsta_ryger_janej, rygsta_ryger_rygaf, rygsta_tidl_janej', 'length', 'max'=>100),
            array('eccktor, genop_afdeling, genop_efternavn_fornavn, genop_email, genop_titel, slut, start', 'length', 'max'=>25),
            array('date_entered, date_modified, description, anamnestiske_oplysninger, boo_datoforbooster01, boo_datoforbooster02, boo_datoforbooster03, borger_adresse, borger_efternavn, borger_fornavn, borgfunk_andet, borgfunk_gangdistance, dato, dia_andet, diag_bidiagnoser, diag_hoveddiagnose, erna_beh_forinddia, erna_ffmi1, erna_utilsigtetvagttab, genop_dato, kommentarer, kon_datoforkontakttilborger, kon_indlaggelsesdato, kon_udskrivningsdato, kontaktpersonikommune, kontaktpersonikommune_titel_ef, kontaktpersonpahospital, kontaktpersonpahospital_titel, opl_andenadresseangiv, opl_andet, prak_fornavnefternavn, prak_praksisadresse, regi, rehab_resultat, rehabiliteringshenvisningstat', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, list_id, assigned_user_id, event_id, submitted, anamnestiske_oplysninger, boo_datoforbooster01, boo_datoforbooster02, boo_datoforbooster03, borfunk_klarertrappegang, borger_adresse, borger_cprnummer, borger_efternavn, borger_fornavn, borger_tlf, borgfunk_andet, borgfunk_behovforilttilskud, borgfunk_gangdistance, borgfunk_hjalptilpersonligp, borgfunk_kommerpagaden, borgfunk_personligselvhjulpen, borgfunk_praktiskhjalptilre, borgfunk_selvhjulpen, broger_tlff, dato, dia_andet, diag_bidiagnoser, diag_hoveddiagnose, eccktor, er, erna_beh_forinddia, erna_bodymassndex, erna_ffmi1, erna_utilsigtetvagttab, genop_afdeling, genop_dato, genop_efternavn_fornavn, genop_email, genop_fax, genop_telefon, genop_titel, kommentarer, kon_datoforkontakttilborger, kon_indlaggelsesdato, kon_udskrivningsdato, kontaktpersonikommune, kontaktpersonikommune_titel_ef, kontaktpersonko_tlf, kontaktpersonpahospital, kontaktpersonpahospital_titel, kontaktpersonpahospital_tlf, opl_andenadresseangiv, opl_andet, opl_egenfolkeregisteradresse, opl_jatransportskalarrange, opl_nejborgerensorgerselv, opl_rollator, prak_fax, prak_fornavnefternavn, prak_kontakttelefon, prak_praksisadresse, regi, regi_dropdown, rehab_resultat, rehab_spio_fev1, rehab_spio_fevfor, rehab_spio_fvc, rehab_spio_tiffen, rehab_straf_antaex, rehab_straf_gold, rehab_straf_mrc, rehabiliteringshenvisningstat, rygsta_aldri_janej, rygsta_ryger_antalpa, rygsta_ryger_cerutter, rygsta_ryger_cigaratter, rygsta_ryger_cigarer, rygsta_ryger_cigaretter, rygsta_ryger_janej, rygsta_ryger_pibet, rygsta_ryger_rygaf, rygsta_ryger_score, rygsta_tidl_janej, rygsta_tidl_ophorsar, rygsta_tidl_pakkear, slut, start', 'safe', 'on'=>'search'),
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
            'list_id' => 'List',
            'assigned_user_id' => 'Assigned User',
            'event_id' => 'Event',
            'submitted' => 'Submitted',
            'anamnestiske_oplysninger' => 'Anamnestiske Oplysninger',
            'boo_datoforbooster01' => 'Boo Datoforbooster01',
            'boo_datoforbooster02' => 'Boo Datoforbooster02',
            'boo_datoforbooster03' => 'Boo Datoforbooster03',
            'borfunk_klarertrappegang' => 'Borfunk Klarertrappegang',
            'borger_adresse' => 'Borger Adresse',
            'borger_cprnummer' => 'Borger Cprnummer',
            'borger_efternavn' => 'Borger Efternavn',
            'borger_fornavn' => 'Borger Fornavn',
            'borger_tlf' => 'Borger Tlf',
            'borgfunk_andet' => 'Borgfunk Andet',
            'borgfunk_behovforilttilskud' => 'Borgfunk Behovforilttilskud',
            'borgfunk_gangdistance' => 'Borgfunk Gangdistance',
            'borgfunk_hjalptilpersonligp' => 'Borgfunk Hjalptilpersonligp',
            'borgfunk_kommerpagaden' => 'Borgfunk Kommerpagaden',
            'borgfunk_personligselvhjulpen' => 'Borgfunk Personligselvhjulpen',
            'borgfunk_praktiskhjalptilre' => 'Borgfunk Praktiskhjalptilre',
            'borgfunk_selvhjulpen' => 'Borgfunk Selvhjulpen',
            'broger_tlff' => 'Broger Tlff',
            'dato' => 'Dato',
            'dia_andet' => 'Dia Andet',
            'diag_bidiagnoser' => 'Diag Bidiagnoser',
            'diag_hoveddiagnose' => 'Diag Hoveddiagnose',
            'eccktor' => 'Eccktor',
            'er' => 'Er',
            'erna_beh_forinddia' => 'Erna Beh Forinddia',
            'erna_bodymassndex' => 'Erna Bodymassndex',
            'erna_ffmi1' => 'Erna Ffmi1',
            'erna_utilsigtetvagttab' => 'Erna Utilsigtetvagttab',
            'genop_afdeling' => 'Genop Afdeling',
            'genop_dato' => 'Genop Dato',
            'genop_efternavn_fornavn' => 'Genop Efternavn Fornavn',
            'genop_email' => 'Genop Email',
            'genop_fax' => 'Genop Fax',
            'genop_telefon' => 'Genop Telefon',
            'genop_titel' => 'Genop Titel',
            'kommentarer' => 'Kommentarer',
            'kon_datoforkontakttilborger' => 'Kon Datoforkontakttilborger',
            'kon_indlaggelsesdato' => 'Kon Indlaggelsesdato',
            'kon_udskrivningsdato' => 'Kon Udskrivningsdato',
            'kontaktpersonikommune' => 'Kontaktpersonikommune',
            'kontaktpersonikommune_titel_ef' => 'Kontaktpersonikommune Titel Ef',
            'kontaktpersonko_tlf' => 'Kontaktpersonko Tlf',
            'kontaktpersonpahospital' => 'Kontaktpersonpahospital',
            'kontaktpersonpahospital_titel' => 'Kontaktpersonpahospital Titel',
            'kontaktpersonpahospital_tlf' => 'Kontaktpersonpahospital Tlf',
            'opl_andenadresseangiv' => 'Opl Andenadresseangiv',
            'opl_andet' => 'Opl Andet',
            'opl_egenfolkeregisteradresse' => 'Opl Egenfolkeregisteradresse',
            'opl_jatransportskalarrange' => 'Opl Jatransportskalarrange',
            'opl_nejborgerensorgerselv' => 'Opl Nejborgerensorgerselv',
            'opl_rollator' => 'Opl Rollator',
            'prak_fax' => 'Prak Fax',
            'prak_fornavnefternavn' => 'Prak Fornavnefternavn',
            'prak_kontakttelefon' => 'Prak Kontakttelefon',
            'prak_praksisadresse' => 'Prak Praksisadresse',
            'regi' => 'Regi',
            'regi_dropdown' => 'Regi Dropdown',
            'rehab_resultat' => 'Rehab Resultat',
            'rehab_spio_fev1' => 'Rehab Spio Fev1',
            'rehab_spio_fevfor' => 'Rehab Spio Fevfor',
            'rehab_spio_fvc' => 'Rehab Spio Fvc',
            'rehab_spio_tiffen' => 'Rehab Spio Tiffen',
            'rehab_straf_antaex' => 'Rehab Straf Antaex',
            'rehab_straf_gold' => 'Rehab Straf Gold',
            'rehab_straf_mrc' => 'Rehab Straf Mrc',
            'rehabiliteringshenvisningstat' => 'Rehabiliteringshenvisningstat',
            'rygsta_aldri_janej' => 'Rygsta Aldri Janej',
            'rygsta_ryger_antalpa' => 'Rygsta Ryger Antalpa',
            'rygsta_ryger_cerutter' => 'Rygsta Ryger Cerutter',
            'rygsta_ryger_cigaratter' => 'Rygsta Ryger Cigaratter',
            'rygsta_ryger_cigarer' => 'Rygsta Ryger Cigarer',
            'rygsta_ryger_cigaretter' => 'Rygsta Ryger Cigaretter',
            'rygsta_ryger_janej' => 'Rygsta Ryger Janej',
            'rygsta_ryger_pibet' => 'Rygsta Ryger Pibet',
            'rygsta_ryger_rygaf' => 'Rygsta Ryger Rygaf',
            'rygsta_ryger_score' => 'Rygsta Ryger Score',
            'rygsta_tidl_janej' => 'Rygsta Tidl Janej',
            'rygsta_tidl_ophorsar' => 'Rygsta Tidl Ophorsar',
            'rygsta_tidl_pakkear' => 'Rygsta Tidl Pakkear',
            'slut' => 'Slut',
            'start' => 'Start',
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
		$criteria->compare('list_id',$this->list_id,true);
		$criteria->compare('assigned_user_id',$this->assigned_user_id,true);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('submitted',$this->submitted);
		$criteria->compare('anamnestiske_oplysninger',$this->anamnestiske_oplysninger,true);
		$criteria->compare('boo_datoforbooster01',$this->boo_datoforbooster01,true);
		$criteria->compare('boo_datoforbooster02',$this->boo_datoforbooster02,true);
		$criteria->compare('boo_datoforbooster03',$this->boo_datoforbooster03,true);
		$criteria->compare('borfunk_klarertrappegang',$this->borfunk_klarertrappegang,true);
		$criteria->compare('borger_adresse',$this->borger_adresse,true);
		$criteria->compare('borger_cprnummer',$this->borger_cprnummer);
		$criteria->compare('borger_efternavn',$this->borger_efternavn,true);
		$criteria->compare('borger_fornavn',$this->borger_fornavn,true);
		$criteria->compare('borger_tlf',$this->borger_tlf);
		$criteria->compare('borgfunk_andet',$this->borgfunk_andet,true);
		$criteria->compare('borgfunk_behovforilttilskud',$this->borgfunk_behovforilttilskud,true);
		$criteria->compare('borgfunk_gangdistance',$this->borgfunk_gangdistance,true);
		$criteria->compare('borgfunk_hjalptilpersonligp',$this->borgfunk_hjalptilpersonligp,true);
		$criteria->compare('borgfunk_kommerpagaden',$this->borgfunk_kommerpagaden,true);
		$criteria->compare('borgfunk_personligselvhjulpen',$this->borgfunk_personligselvhjulpen,true);
		$criteria->compare('borgfunk_praktiskhjalptilre',$this->borgfunk_praktiskhjalptilre,true);
		$criteria->compare('borgfunk_selvhjulpen',$this->borgfunk_selvhjulpen,true);
		$criteria->compare('broger_tlff',$this->broger_tlff);
		$criteria->compare('dato',$this->dato,true);
		$criteria->compare('dia_andet',$this->dia_andet,true);
		$criteria->compare('diag_bidiagnoser',$this->diag_bidiagnoser,true);
		$criteria->compare('diag_hoveddiagnose',$this->diag_hoveddiagnose,true);
		$criteria->compare('eccktor',$this->eccktor,true);
		$criteria->compare('er',$this->er,true);
		$criteria->compare('erna_beh_forinddia',$this->erna_beh_forinddia,true);
		$criteria->compare('erna_bodymassndex',$this->erna_bodymassndex);
		$criteria->compare('erna_ffmi1',$this->erna_ffmi1,true);
		$criteria->compare('erna_utilsigtetvagttab',$this->erna_utilsigtetvagttab,true);
		$criteria->compare('genop_afdeling',$this->genop_afdeling,true);
		$criteria->compare('genop_dato',$this->genop_dato,true);
		$criteria->compare('genop_efternavn_fornavn',$this->genop_efternavn_fornavn,true);
		$criteria->compare('genop_email',$this->genop_email,true);
		$criteria->compare('genop_fax',$this->genop_fax);
		$criteria->compare('genop_telefon',$this->genop_telefon);
		$criteria->compare('genop_titel',$this->genop_titel,true);
		$criteria->compare('kommentarer',$this->kommentarer,true);
		$criteria->compare('kon_datoforkontakttilborger',$this->kon_datoforkontakttilborger,true);
		$criteria->compare('kon_indlaggelsesdato',$this->kon_indlaggelsesdato,true);
		$criteria->compare('kon_udskrivningsdato',$this->kon_udskrivningsdato,true);
		$criteria->compare('kontaktpersonikommune',$this->kontaktpersonikommune,true);
		$criteria->compare('kontaktpersonikommune_titel_ef',$this->kontaktpersonikommune_titel_ef,true);
		$criteria->compare('kontaktpersonko_tlf',$this->kontaktpersonko_tlf);
		$criteria->compare('kontaktpersonpahospital',$this->kontaktpersonpahospital,true);
		$criteria->compare('kontaktpersonpahospital_titel',$this->kontaktpersonpahospital_titel,true);
		$criteria->compare('kontaktpersonpahospital_tlf',$this->kontaktpersonpahospital_tlf);
		$criteria->compare('opl_andenadresseangiv',$this->opl_andenadresseangiv,true);
		$criteria->compare('opl_andet',$this->opl_andet,true);
		$criteria->compare('opl_egenfolkeregisteradresse',$this->opl_egenfolkeregisteradresse,true);
		$criteria->compare('opl_jatransportskalarrange',$this->opl_jatransportskalarrange,true);
		$criteria->compare('opl_nejborgerensorgerselv',$this->opl_nejborgerensorgerselv,true);
		$criteria->compare('opl_rollator',$this->opl_rollator,true);
		$criteria->compare('prak_fax',$this->prak_fax);
		$criteria->compare('prak_fornavnefternavn',$this->prak_fornavnefternavn,true);
		$criteria->compare('prak_kontakttelefon',$this->prak_kontakttelefon);
		$criteria->compare('prak_praksisadresse',$this->prak_praksisadresse,true);
		$criteria->compare('regi',$this->regi,true);
		$criteria->compare('regi_dropdown',$this->regi_dropdown,true);
		$criteria->compare('rehab_resultat',$this->rehab_resultat,true);
		$criteria->compare('rehab_spio_fev1',$this->rehab_spio_fev1);
		$criteria->compare('rehab_spio_fevfor',$this->rehab_spio_fevfor);
		$criteria->compare('rehab_spio_fvc',$this->rehab_spio_fvc);
		$criteria->compare('rehab_spio_tiffen',$this->rehab_spio_tiffen);
		$criteria->compare('rehab_straf_antaex',$this->rehab_straf_antaex);
		$criteria->compare('rehab_straf_gold',$this->rehab_straf_gold);
		$criteria->compare('rehab_straf_mrc',$this->rehab_straf_mrc,true);
		$criteria->compare('rehabiliteringshenvisningstat',$this->rehabiliteringshenvisningstat,true);
		$criteria->compare('rygsta_aldri_janej',$this->rygsta_aldri_janej,true);
		$criteria->compare('rygsta_ryger_antalpa',$this->rygsta_ryger_antalpa);
		$criteria->compare('rygsta_ryger_cerutter',$this->rygsta_ryger_cerutter);
		$criteria->compare('rygsta_ryger_cigaratter',$this->rygsta_ryger_cigaratter);
		$criteria->compare('rygsta_ryger_cigarer',$this->rygsta_ryger_cigarer);
		$criteria->compare('rygsta_ryger_cigaretter',$this->rygsta_ryger_cigaretter);
		$criteria->compare('rygsta_ryger_janej',$this->rygsta_ryger_janej,true);
		$criteria->compare('rygsta_ryger_pibet',$this->rygsta_ryger_pibet);
		$criteria->compare('rygsta_ryger_rygaf',$this->rygsta_ryger_rygaf,true);
		$criteria->compare('rygsta_ryger_score',$this->rygsta_ryger_score);
		$criteria->compare('rygsta_tidl_janej',$this->rygsta_tidl_janej,true);
		$criteria->compare('rygsta_tidl_ophorsar',$this->rygsta_tidl_ophorsar);
		$criteria->compare('rygsta_tidl_pakkear',$this->rygsta_tidl_pakkear);
		$criteria->compare('slut',$this->slut,true);
		$criteria->compare('start',$this->start,true);

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