<?php

/**
 * This is the model class for table "{{intensivob}}".
 *
 * The followings are the available columns in table '{{intensivob}}':
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
 * @property double $a_bicarbonat
 * @property double $a_lactat
 * @property double $a_pco2
 * @property double $a_ph
 * @property double $a_po2
 * @property string $akut_forstovergangeper
 * @property string $akut_ilt05literperminu
 * @property string $akut_tabletbioclavid500mg
 * @property string $akut_tabletnozinan5mgpn
 * @property string $akut_tabletprednisolon100mg
 * @property string $beh_andreaftaler
 * @property string $beh_medicin
 * @property string $beh_nastestuegang
 * @property double $blo_pglukose
 * @property double $blodprocent
 * @property integer $bo_puls
 * @property double $bo_respirationsfrekvens
 * @property integer $bo_saturationsat
 * @property double $bor_temperatur
 * @property integer $diastoliskblodtryk
 * @property string $ekgelektrokardiogram
 * @property string $eks_andresygdomme
 * @property string $eks_behovforintravenosiv
 * @property string $eks_malignelidelser
 * @property string $eks_ustabildm
 * @property string $eks_ustabilhjertesygdom
 * @property string $eks_xscore4
 * @property double $el_pcreatinium
 * @property double $el_pkalium
 * @property double $el_pnatrium
 * @property integer $for_dosis
 * @property integer $for_frekvens
 * @property string $for_praeparat
 * @property string $for_praparat
 * @property double $for_styrke
 * @property string $fors_dato
 * @property integer $fors_dosis
 * @property string $fors_eccaktor
 * @property integer $fors_frekvens
 * @property double $fors_styrke
 * @property string $fors_tid
 * @property string $gen_andenmedicin
 * @property string $gen_bivirkninger
 * @property double $gen_dosis
 * @property integer $gen_frekvens
 * @property string $gen_mangde
 * @property string $gen_ovrigkolmedicin
 * @property string $gen_pnmedicinforbrug
 * @property string $genpn
 * @property string $hovedkriterier_algoritme
 * @property string $hovedkriterier_behovforinten
 * @property string $hovedkriterier_kompliant
 * @property double $in_bleukocytter
 * @property double $inf_bbasofilocytter
 * @property double $inf_beosinofilocytter
 * @property double $inf_blymfocytter
 * @property double $inf_bmonocytter
 * @property double $inf_bneutrofilocytter
 * @property double $inf_btrombocytter
 * @property double $inf_pcrp
 * @property string $info_stamoplysningerview
 * @property string $inklu_kliniskvurdering
 * @property integer $inklu_kliniskvurderingpoint
 * @property double $inklu_pco2
 * @property integer $inklu_pco2point
 * @property double $inklu_ph
 * @property integer $inklu_phpoint
 * @property integer $inklu_respirationsfrekvensrf
 * @property integer $inklu_respiratisfrekvensrf
 * @property integer $inklu_saturationsatpoint
 * @property integer $inklu_xscore
 * @property string $int_samtykkefraborger
 * @property string $int_stillingtagentilnivbeha
 * @property string $int_stillingtagentilrespirat
 * @property string $inten_dato
 * @property string $inten_eccaktor
 * @property string $inten_tid
 * @property string $intensiv_samstykke
 * @property string $intensiv_stillingtagen
 * @property string $intensiv_stillingtagentilnv
 * @property double $kal_pcalcium
 * @property double $kal_pdvitamin
 * @property double $kal_ppth
 * @property string $med_andenmedicin
 * @property string $med_bivirkninger
 * @property string $med_dato
 * @property double $med_dosis
 * @property string $med_eccaktor
 * @property integer $med_frekvens
 * @property string $med_maengde
 * @property string $med_medicinaktion
 * @property string $med_ovrigkolmedicin
 * @property string $med_pn
 * @property string $med_pn_medicinforbrug
 * @property string $med_pnmedicinforbrug
 * @property string $medd_pn
 * @property string $medi_medicinaktion
 * @property string $obj_dyspno
 * @property string $obj_farver
 * @property string $obj_hud
 * @property string $obj_odemer
 * @property string $op_ccopfolgniger
 * @property string $opf_andreaf
 * @property string $opf_dato
 * @property string $opf_tid
 * @property double $ov_alphaantitrypsin
 * @property double $ov_pcarbamid
 * @property string $pn
 * @property string $rekvisitioner
 * @property string $scree_eccaktor
 * @property string $scree_tid
 * @property string $stab_forstover46gangeper
 * @property string $stab_seretidemikrogram
 * @property string $stab_spiriva18mikrogram
 * @property string $stab_symbicortfortepust
 * @property string $stab_tabletbioclavid500mgx
 * @property string $stab_tabletprednisolon37
 * @property string $stab_ventolinbricanylpn
 * @property double $stu_stuegangstidspunkt
 * @property string $stu_subjektivvurdering
 * @property string $stuegangstidspunkt
 * @property string $stuegangtid
 * @property integer $systoliskblodtryk
 * @property string $ud_agailt
 * @property integer $ud_antaldageintensiveretobs
 * @property string $ud_epikrisetilegenlage
 * @property string $ud_fevkonstantellertigen
 * @property string $ud_kliniskstabil
 * @property string $ud_medicinkasse
 * @property string $ud_notat
 * @property string $ud_saturationsat90pmax
 * @property string $ud_sovettimer
 * @property string $ud_tilstandbedret
 * @property string $ud_viewcare
 * @property string $udd_forstover
 * @property string $udd_hjemmeilt
 * @property string $udd_kontrol
 * @property string $udd_medicin
 * @property string $udd_nodprocedure
 * @property string $udd_viewcareskarm
 * @property string $udskri_fev1konstantellersti
 * @property string $udskri_kliniskstabil
 * @property string $udskri_saturationsat90
 * @property string $udskri_sovettimer
 * @property string $udskri_tilstandbedret
 */
class IntensivOb extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return IntensivOb the static model class
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
        return '{{intensivob}}';
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
            array('deleted, event_id, submitted, bo_puls, bo_saturationsat, diastoliskblodtryk, for_dosis, for_frekvens, fors_dosis, fors_frekvens, gen_frekvens, inklu_kliniskvurderingpoint, inklu_pco2point, inklu_phpoint, inklu_respirationsfrekvensrf, inklu_respiratisfrekvensrf, inklu_saturationsatpoint, inklu_xscore, med_frekvens, systoliskblodtryk, ud_antaldageintensiveretobs', 'numerical', 'integerOnly'=>true),
            array('a_bicarbonat, a_lactat, a_pco2, a_ph, a_po2, blo_pglukose, blodprocent, bo_respirationsfrekvens, bor_temperatur, el_pcreatinium, el_pkalium, el_pnatrium, for_styrke, fors_styrke, gen_dosis, in_bleukocytter, inf_bbasofilocytter, inf_beosinofilocytter, inf_blymfocytter, inf_bmonocytter, inf_bneutrofilocytter, inf_btrombocytter, inf_pcrp, inklu_pco2, inklu_ph, kal_pcalcium, kal_pdvitamin, kal_ppth, med_dosis, ov_alphaantitrypsin, ov_pcarbamid, stu_stuegangstidspunkt', 'numerical'),
            array('name', 'length', 'max'=>255),
            array('modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('akut_forstovergangeper, akut_ilt05literperminu, akut_tabletbioclavid500mg, akut_tabletnozinan5mgpn, akut_tabletprednisolon100mg, eks_andresygdomme, eks_behovforintravenosiv, eks_malignelidelser, eks_ustabildm, eks_ustabilhjertesygdom, eks_xscore4, genpn, hovedkriterier_algoritme, hovedkriterier_behovforinten, hovedkriterier_kompliant, info_stamoplysningerview, med_pn, medd_pn, pn, rekvisitioner, stab_forstover46gangeper, stab_seretidemikrogram, stab_spiriva18mikrogram, stab_symbicortfortepust, stab_tabletbioclavid500mgx, stab_tabletprednisolon37, stab_ventolinbricanylpn, ud_agailt, ud_fevkonstantellertigen, ud_kliniskstabil, ud_medicinkasse, ud_saturationsat90pmax, ud_sovettimer, ud_tilstandbedret, ud_viewcare, udskri_fev1konstantellersti, udskri_kliniskstabil, udskri_saturationsat90, udskri_sovettimer, udskri_tilstandbedret', 'length', 'max'=>100),
            array('for_praeparat, fors_eccaktor, fors_tid, inten_eccaktor, inten_tid, med_eccaktor, opf_andreaf, opf_tid, scree_eccaktor, scree_tid, stuegangtid', 'length', 'max'=>25),
            array('date_entered, date_modified, description, beh_andreaftaler, beh_medicin, beh_nastestuegang, ekgelektrokardiogram, for_praparat, fors_dato, gen_andenmedicin, gen_bivirkninger, gen_mangde, gen_ovrigkolmedicin, gen_pnmedicinforbrug, inklu_kliniskvurdering, int_samtykkefraborger, int_stillingtagentilnivbeha, int_stillingtagentilrespirat, inten_dato, intensiv_samstykke, intensiv_stillingtagen, intensiv_stillingtagentilnv, med_andenmedicin, med_bivirkninger, med_dato, med_maengde, med_medicinaktion, med_ovrigkolmedicin, med_pn_medicinforbrug, med_pnmedicinforbrug, medi_medicinaktion, obj_dyspno, obj_farver, obj_hud, obj_odemer, op_ccopfolgniger, opf_dato, stu_subjektivvurdering, stuegangstidspunkt, ud_epikrisetilegenlage, ud_notat, udd_forstover, udd_hjemmeilt, udd_kontrol, udd_medicin, udd_nodprocedure, udd_viewcareskarm', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, a_bicarbonat, a_lactat, a_pco2, a_ph, a_po2, akut_forstovergangeper, akut_ilt05literperminu, akut_tabletbioclavid500mg, akut_tabletnozinan5mgpn, akut_tabletprednisolon100mg, beh_andreaftaler, beh_medicin, beh_nastestuegang, blo_pglukose, blodprocent, bo_puls, bo_respirationsfrekvens, bo_saturationsat, bor_temperatur, diastoliskblodtryk, ekgelektrokardiogram, eks_andresygdomme, eks_behovforintravenosiv, eks_malignelidelser, eks_ustabildm, eks_ustabilhjertesygdom, eks_xscore4, el_pcreatinium, el_pkalium, el_pnatrium, for_dosis, for_frekvens, for_praeparat, for_praparat, for_styrke, fors_dato, fors_dosis, fors_eccaktor, fors_frekvens, fors_styrke, fors_tid, gen_andenmedicin, gen_bivirkninger, gen_dosis, gen_frekvens, gen_mangde, gen_ovrigkolmedicin, gen_pnmedicinforbrug, genpn, hovedkriterier_algoritme, hovedkriterier_behovforinten, hovedkriterier_kompliant, in_bleukocytter, inf_bbasofilocytter, inf_beosinofilocytter, inf_blymfocytter, inf_bmonocytter, inf_bneutrofilocytter, inf_btrombocytter, inf_pcrp, info_stamoplysningerview, inklu_kliniskvurdering, inklu_kliniskvurderingpoint, inklu_pco2, inklu_pco2point, inklu_ph, inklu_phpoint, inklu_respirationsfrekvensrf, inklu_respiratisfrekvensrf, inklu_saturationsatpoint, inklu_xscore, int_samtykkefraborger, int_stillingtagentilnivbeha, int_stillingtagentilrespirat, inten_dato, inten_eccaktor, inten_tid, intensiv_samstykke, intensiv_stillingtagen, intensiv_stillingtagentilnv, kal_pcalcium, kal_pdvitamin, kal_ppth, med_andenmedicin, med_bivirkninger, med_dato, med_dosis, med_eccaktor, med_frekvens, med_maengde, med_medicinaktion, med_ovrigkolmedicin, med_pn, med_pn_medicinforbrug, med_pnmedicinforbrug, medd_pn, medi_medicinaktion, obj_dyspno, obj_farver, obj_hud, obj_odemer, op_ccopfolgniger, opf_andreaf, opf_dato, opf_tid, ov_alphaantitrypsin, ov_pcarbamid, pn, rekvisitioner, scree_eccaktor, scree_tid, stab_forstover46gangeper, stab_seretidemikrogram, stab_spiriva18mikrogram, stab_symbicortfortepust, stab_tabletbioclavid500mgx, stab_tabletprednisolon37, stab_ventolinbricanylpn, stu_stuegangstidspunkt, stu_subjektivvurdering, stuegangstidspunkt, stuegangtid, systoliskblodtryk, ud_agailt, ud_antaldageintensiveretobs, ud_epikrisetilegenlage, ud_fevkonstantellertigen, ud_kliniskstabil, ud_medicinkasse, ud_notat, ud_saturationsat90pmax, ud_sovettimer, ud_tilstandbedret, ud_viewcare, udd_forstover, udd_hjemmeilt, udd_kontrol, udd_medicin, udd_nodprocedure, udd_viewcareskarm, udskri_fev1konstantellersti, udskri_kliniskstabil, udskri_saturationsat90, udskri_sovettimer, udskri_tilstandbedret', 'safe', 'on'=>'search'),
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
            'name' => 'Name',
            'date_entered' => 'Date Entered',
            'date_modified' => 'Date Modified',
            'modified_user_id' => 'Modified User',
            'created_by' => 'Created By',
            'description' => 'Description',
            'deleted' => 'Deleted',
            'assigned_user_id' => 'Assigned User',
            'event_id' => 'Event',
            'submitted' => 'Submitted',
            'a_bicarbonat' => 'A Bicarbonat',
            'a_lactat' => 'A Lactat',
            'a_pco2' => 'A Pco2',
            'a_ph' => 'A Ph',
            'a_po2' => 'A Po2',
            'akut_forstovergangeper' => 'Akut Forstovergangeper',
            'akut_ilt05literperminu' => 'Akut Ilt05literperminu',
            'akut_tabletbioclavid500mg' => 'Akut Tabletbioclavid500mg',
            'akut_tabletnozinan5mgpn' => 'Akut Tabletnozinan5mgpn',
            'akut_tabletprednisolon100mg' => 'Akut Tabletprednisolon100mg',
            'beh_andreaftaler' => 'Beh Andreaftaler',
            'beh_medicin' => 'Beh Medicin',
            'beh_nastestuegang' => 'Beh Nastestuegang',
            'blo_pglukose' => 'Blo Pglukose',
            'blodprocent' => 'Blodprocent',
            'bo_puls' => 'Bo Puls',
            'bo_respirationsfrekvens' => 'Bo Respirationsfrekvens',
            'bo_saturationsat' => 'Bo Saturationsat',
            'bor_temperatur' => 'Bor Temperatur',
            'diastoliskblodtryk' => 'Diastoliskblodtryk',
            'ekgelektrokardiogram' => 'Ekgelektrokardiogram',
            'eks_andresygdomme' => 'Eks Andresygdomme',
            'eks_behovforintravenosiv' => 'Eks Behovforintravenosiv',
            'eks_malignelidelser' => 'Eks Malignelidelser',
            'eks_ustabildm' => 'Eks Ustabildm',
            'eks_ustabilhjertesygdom' => 'Eks Ustabilhjertesygdom',
            'eks_xscore4' => 'Eks Xscore4',
            'el_pcreatinium' => 'El Pcreatinium',
            'el_pkalium' => 'El Pkalium',
            'el_pnatrium' => 'El Pnatrium',
            'for_dosis' => 'For Dosis',
            'for_frekvens' => 'For Frekvens',
            'for_praeparat' => 'For Praeparat',
            'for_praparat' => 'For Praparat',
            'for_styrke' => 'For Styrke',
            'fors_dato' => 'Fors Dato',
            'fors_dosis' => 'Fors Dosis',
            'fors_eccaktor' => 'Fors Eccaktor',
            'fors_frekvens' => 'Fors Frekvens',
            'fors_styrke' => 'Fors Styrke',
            'fors_tid' => 'Fors Tid',
            'gen_andenmedicin' => 'Gen Andenmedicin',
            'gen_bivirkninger' => 'Gen Bivirkninger',
            'gen_dosis' => 'Gen Dosis',
            'gen_frekvens' => 'Gen Frekvens',
            'gen_mangde' => 'Gen Mangde',
            'gen_ovrigkolmedicin' => 'Gen Ovrigkolmedicin',
            'gen_pnmedicinforbrug' => 'Gen Pnmedicinforbrug',
            'genpn' => 'Genpn',
            'hovedkriterier_algoritme' => 'Hovedkriterier Algoritme',
            'hovedkriterier_behovforinten' => 'Hovedkriterier Behovforinten',
            'hovedkriterier_kompliant' => 'Hovedkriterier Kompliant',
            'in_bleukocytter' => 'In Bleukocytter',
            'inf_bbasofilocytter' => 'Inf Bbasofilocytter',
            'inf_beosinofilocytter' => 'Inf Beosinofilocytter',
            'inf_blymfocytter' => 'Inf Blymfocytter',
            'inf_bmonocytter' => 'Inf Bmonocytter',
            'inf_bneutrofilocytter' => 'Inf Bneutrofilocytter',
            'inf_btrombocytter' => 'Inf Btrombocytter',
            'inf_pcrp' => 'Inf Pcrp',
            'info_stamoplysningerview' => 'Info Stamoplysningerview',
            'inklu_kliniskvurdering' => 'Inklu Kliniskvurdering',
            'inklu_kliniskvurderingpoint' => 'Inklu Kliniskvurderingpoint',
            'inklu_pco2' => 'Inklu Pco2',
            'inklu_pco2point' => 'Inklu Pco2point',
            'inklu_ph' => 'Inklu Ph',
            'inklu_phpoint' => 'Inklu Phpoint',
            'inklu_respirationsfrekvensrf' => 'Inklu Respirationsfrekvensrf',
            'inklu_respiratisfrekvensrf' => 'Inklu Respiratisfrekvensrf',
            'inklu_saturationsatpoint' => 'Inklu Saturationsatpoint',
            'inklu_xscore' => 'Inklu Xscore',
            'int_samtykkefraborger' => 'Int Samtykkefraborger',
            'int_stillingtagentilnivbeha' => 'Int Stillingtagentilnivbeha',
            'int_stillingtagentilrespirat' => 'Int Stillingtagentilrespirat',
            'inten_dato' => 'Inten Dato',
            'inten_eccaktor' => 'Inten Eccaktor',
            'inten_tid' => 'Inten Tid',
            'intensiv_samstykke' => 'Intensiv Samstykke',
            'intensiv_stillingtagen' => 'Intensiv Stillingtagen',
            'intensiv_stillingtagentilnv' => 'Intensiv Stillingtagentilnv',
            'kal_pcalcium' => 'Kal Pcalcium',
            'kal_pdvitamin' => 'Kal Pdvitamin',
            'kal_ppth' => 'Kal Ppth',
            'med_andenmedicin' => 'Med Andenmedicin',
            'med_bivirkninger' => 'Med Bivirkninger',
            'med_dato' => 'Med Dato',
            'med_dosis' => 'Med Dosis',
            'med_eccaktor' => 'Med Eccaktor',
            'med_frekvens' => 'Med Frekvens',
            'med_maengde' => 'Med Maengde',
            'med_medicinaktion' => 'Med Medicinaktion',
            'med_ovrigkolmedicin' => 'Med Ovrigkolmedicin',
            'med_pn' => 'Med Pn',
            'med_pn_medicinforbrug' => 'Med Pn Medicinforbrug',
            'med_pnmedicinforbrug' => 'Med Pnmedicinforbrug',
            'medd_pn' => 'Medd Pn',
            'medi_medicinaktion' => 'Medi Medicinaktion',
            'obj_dyspno' => 'Obj Dyspno',
            'obj_farver' => 'Obj Farver',
            'obj_hud' => 'Obj Hud',
            'obj_odemer' => 'Obj Odemer',
            'op_ccopfolgniger' => 'Op Ccopfolgniger',
            'opf_andreaf' => 'Opf Andreaf',
            'opf_dato' => 'Opf Dato',
            'opf_tid' => 'Opf Tid',
            'ov_alphaantitrypsin' => 'Ov Alphaantitrypsin',
            'ov_pcarbamid' => 'Ov Pcarbamid',
            'pn' => 'Pn',
            'rekvisitioner' => 'Rekvisitioner',
            'scree_eccaktor' => 'Scree Eccaktor',
            'scree_tid' => 'Scree Tid',
            'stab_forstover46gangeper' => 'Stab Forstover46gangeper',
            'stab_seretidemikrogram' => 'Stab Seretidemikrogram',
            'stab_spiriva18mikrogram' => 'Stab Spiriva18mikrogram',
            'stab_symbicortfortepust' => 'Stab Symbicortfortepust',
            'stab_tabletbioclavid500mgx' => 'Stab Tabletbioclavid500mgx',
            'stab_tabletprednisolon37' => 'Stab Tabletprednisolon37',
            'stab_ventolinbricanylpn' => 'Stab Ventolinbricanylpn',
            'stu_stuegangstidspunkt' => 'Stu Stuegangstidspunkt',
            'stu_subjektivvurdering' => 'Stu Subjektivvurdering',
            'stuegangstidspunkt' => 'Stuegangstidspunkt',
            'stuegangtid' => 'Stuegangtid',
            'systoliskblodtryk' => 'Systoliskblodtryk',
            'ud_agailt' => 'Ud Agailt',
            'ud_antaldageintensiveretobs' => 'Ud Antaldageintensiveretobs',
            'ud_epikrisetilegenlage' => 'Ud Epikrisetilegenlage',
            'ud_fevkonstantellertigen' => 'Ud Fevkonstantellertigen',
            'ud_kliniskstabil' => 'Ud Kliniskstabil',
            'ud_medicinkasse' => 'Ud Medicinkasse',
            'ud_notat' => 'Ud Notat',
            'ud_saturationsat90pmax' => 'Ud Saturationsat90pmax',
            'ud_sovettimer' => 'Ud Sovettimer',
            'ud_tilstandbedret' => 'Ud Tilstandbedret',
            'ud_viewcare' => 'Ud Viewcare',
            'udd_forstover' => 'Udd Forstover',
            'udd_hjemmeilt' => 'Udd Hjemmeilt',
            'udd_kontrol' => 'Udd Kontrol',
            'udd_medicin' => 'Udd Medicin',
            'udd_nodprocedure' => 'Udd Nodprocedure',
            'udd_viewcareskarm' => 'Udd Viewcareskarm',
            'udskri_fev1konstantellersti' => 'Udskri Fev1konstantellersti',
            'udskri_kliniskstabil' => 'Udskri Kliniskstabil',
            'udskri_saturationsat90' => 'Udskri Saturationsat90',
            'udskri_sovettimer' => 'Udskri Sovettimer',
            'udskri_tilstandbedret' => 'Udskri Tilstandbedret',
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
		$criteria->compare('a_bicarbonat',$this->a_bicarbonat);
		$criteria->compare('a_lactat',$this->a_lactat);
		$criteria->compare('a_pco2',$this->a_pco2);
		$criteria->compare('a_ph',$this->a_ph);
		$criteria->compare('a_po2',$this->a_po2);
		$criteria->compare('akut_forstovergangeper',$this->akut_forstovergangeper,true);
		$criteria->compare('akut_ilt05literperminu',$this->akut_ilt05literperminu,true);
		$criteria->compare('akut_tabletbioclavid500mg',$this->akut_tabletbioclavid500mg,true);
		$criteria->compare('akut_tabletnozinan5mgpn',$this->akut_tabletnozinan5mgpn,true);
		$criteria->compare('akut_tabletprednisolon100mg',$this->akut_tabletprednisolon100mg,true);
		$criteria->compare('beh_andreaftaler',$this->beh_andreaftaler,true);
		$criteria->compare('beh_medicin',$this->beh_medicin,true);
		$criteria->compare('beh_nastestuegang',$this->beh_nastestuegang,true);
		$criteria->compare('blo_pglukose',$this->blo_pglukose);
		$criteria->compare('blodprocent',$this->blodprocent);
		$criteria->compare('bo_puls',$this->bo_puls);
		$criteria->compare('bo_respirationsfrekvens',$this->bo_respirationsfrekvens);
		$criteria->compare('bo_saturationsat',$this->bo_saturationsat);
		$criteria->compare('bor_temperatur',$this->bor_temperatur);
		$criteria->compare('diastoliskblodtryk',$this->diastoliskblodtryk);
		$criteria->compare('ekgelektrokardiogram',$this->ekgelektrokardiogram,true);
		$criteria->compare('eks_andresygdomme',$this->eks_andresygdomme,true);
		$criteria->compare('eks_behovforintravenosiv',$this->eks_behovforintravenosiv,true);
		$criteria->compare('eks_malignelidelser',$this->eks_malignelidelser,true);
		$criteria->compare('eks_ustabildm',$this->eks_ustabildm,true);
		$criteria->compare('eks_ustabilhjertesygdom',$this->eks_ustabilhjertesygdom,true);
		$criteria->compare('eks_xscore4',$this->eks_xscore4,true);
		$criteria->compare('el_pcreatinium',$this->el_pcreatinium);
		$criteria->compare('el_pkalium',$this->el_pkalium);
		$criteria->compare('el_pnatrium',$this->el_pnatrium);
		$criteria->compare('for_dosis',$this->for_dosis);
		$criteria->compare('for_frekvens',$this->for_frekvens);
		$criteria->compare('for_praeparat',$this->for_praeparat,true);
		$criteria->compare('for_praparat',$this->for_praparat,true);
		$criteria->compare('for_styrke',$this->for_styrke);
		$criteria->compare('fors_dato',$this->fors_dato,true);
		$criteria->compare('fors_dosis',$this->fors_dosis);
		$criteria->compare('fors_eccaktor',$this->fors_eccaktor,true);
		$criteria->compare('fors_frekvens',$this->fors_frekvens);
		$criteria->compare('fors_styrke',$this->fors_styrke);
		$criteria->compare('fors_tid',$this->fors_tid,true);
		$criteria->compare('gen_andenmedicin',$this->gen_andenmedicin,true);
		$criteria->compare('gen_bivirkninger',$this->gen_bivirkninger,true);
		$criteria->compare('gen_dosis',$this->gen_dosis);
		$criteria->compare('gen_frekvens',$this->gen_frekvens);
		$criteria->compare('gen_mangde',$this->gen_mangde,true);
		$criteria->compare('gen_ovrigkolmedicin',$this->gen_ovrigkolmedicin,true);
		$criteria->compare('gen_pnmedicinforbrug',$this->gen_pnmedicinforbrug,true);
		$criteria->compare('genpn',$this->genpn,true);
		$criteria->compare('hovedkriterier_algoritme',$this->hovedkriterier_algoritme,true);
		$criteria->compare('hovedkriterier_behovforinten',$this->hovedkriterier_behovforinten,true);
		$criteria->compare('hovedkriterier_kompliant',$this->hovedkriterier_kompliant,true);
		$criteria->compare('in_bleukocytter',$this->in_bleukocytter);
		$criteria->compare('inf_bbasofilocytter',$this->inf_bbasofilocytter);
		$criteria->compare('inf_beosinofilocytter',$this->inf_beosinofilocytter);
		$criteria->compare('inf_blymfocytter',$this->inf_blymfocytter);
		$criteria->compare('inf_bmonocytter',$this->inf_bmonocytter);
		$criteria->compare('inf_bneutrofilocytter',$this->inf_bneutrofilocytter);
		$criteria->compare('inf_btrombocytter',$this->inf_btrombocytter);
		$criteria->compare('inf_pcrp',$this->inf_pcrp);
		$criteria->compare('info_stamoplysningerview',$this->info_stamoplysningerview,true);
		$criteria->compare('inklu_kliniskvurdering',$this->inklu_kliniskvurdering,true);
		$criteria->compare('inklu_kliniskvurderingpoint',$this->inklu_kliniskvurderingpoint);
		$criteria->compare('inklu_pco2',$this->inklu_pco2);
		$criteria->compare('inklu_pco2point',$this->inklu_pco2point);
		$criteria->compare('inklu_ph',$this->inklu_ph);
		$criteria->compare('inklu_phpoint',$this->inklu_phpoint);
		$criteria->compare('inklu_respirationsfrekvensrf',$this->inklu_respirationsfrekvensrf);
		$criteria->compare('inklu_respiratisfrekvensrf',$this->inklu_respiratisfrekvensrf);
		$criteria->compare('inklu_saturationsatpoint',$this->inklu_saturationsatpoint);
		$criteria->compare('inklu_xscore',$this->inklu_xscore);
		$criteria->compare('int_samtykkefraborger',$this->int_samtykkefraborger,true);
		$criteria->compare('int_stillingtagentilnivbeha',$this->int_stillingtagentilnivbeha,true);
		$criteria->compare('int_stillingtagentilrespirat',$this->int_stillingtagentilrespirat,true);
		$criteria->compare('inten_dato',$this->inten_dato,true);
		$criteria->compare('inten_eccaktor',$this->inten_eccaktor,true);
		$criteria->compare('inten_tid',$this->inten_tid,true);
		$criteria->compare('intensiv_samstykke',$this->intensiv_samstykke,true);
		$criteria->compare('intensiv_stillingtagen',$this->intensiv_stillingtagen,true);
		$criteria->compare('intensiv_stillingtagentilnv',$this->intensiv_stillingtagentilnv,true);
		$criteria->compare('kal_pcalcium',$this->kal_pcalcium);
		$criteria->compare('kal_pdvitamin',$this->kal_pdvitamin);
		$criteria->compare('kal_ppth',$this->kal_ppth);
		$criteria->compare('med_andenmedicin',$this->med_andenmedicin,true);
		$criteria->compare('med_bivirkninger',$this->med_bivirkninger,true);
		$criteria->compare('med_dato',$this->med_dato,true);
		$criteria->compare('med_dosis',$this->med_dosis);
		$criteria->compare('med_eccaktor',$this->med_eccaktor,true);
		$criteria->compare('med_frekvens',$this->med_frekvens);
		$criteria->compare('med_maengde',$this->med_maengde,true);
		$criteria->compare('med_medicinaktion',$this->med_medicinaktion,true);
		$criteria->compare('med_ovrigkolmedicin',$this->med_ovrigkolmedicin,true);
		$criteria->compare('med_pn',$this->med_pn,true);
		$criteria->compare('med_pn_medicinforbrug',$this->med_pn_medicinforbrug,true);
		$criteria->compare('med_pnmedicinforbrug',$this->med_pnmedicinforbrug,true);
		$criteria->compare('medd_pn',$this->medd_pn,true);
		$criteria->compare('medi_medicinaktion',$this->medi_medicinaktion,true);
		$criteria->compare('obj_dyspno',$this->obj_dyspno,true);
		$criteria->compare('obj_farver',$this->obj_farver,true);
		$criteria->compare('obj_hud',$this->obj_hud,true);
		$criteria->compare('obj_odemer',$this->obj_odemer,true);
		$criteria->compare('op_ccopfolgniger',$this->op_ccopfolgniger,true);
		$criteria->compare('opf_andreaf',$this->opf_andreaf,true);
		$criteria->compare('opf_dato',$this->opf_dato,true);
		$criteria->compare('opf_tid',$this->opf_tid,true);
		$criteria->compare('ov_alphaantitrypsin',$this->ov_alphaantitrypsin);
		$criteria->compare('ov_pcarbamid',$this->ov_pcarbamid);
		$criteria->compare('pn',$this->pn,true);
		$criteria->compare('rekvisitioner',$this->rekvisitioner,true);
		$criteria->compare('scree_eccaktor',$this->scree_eccaktor,true);
		$criteria->compare('scree_tid',$this->scree_tid,true);
		$criteria->compare('stab_forstover46gangeper',$this->stab_forstover46gangeper,true);
		$criteria->compare('stab_seretidemikrogram',$this->stab_seretidemikrogram,true);
		$criteria->compare('stab_spiriva18mikrogram',$this->stab_spiriva18mikrogram,true);
		$criteria->compare('stab_symbicortfortepust',$this->stab_symbicortfortepust,true);
		$criteria->compare('stab_tabletbioclavid500mgx',$this->stab_tabletbioclavid500mgx,true);
		$criteria->compare('stab_tabletprednisolon37',$this->stab_tabletprednisolon37,true);
		$criteria->compare('stab_ventolinbricanylpn',$this->stab_ventolinbricanylpn,true);
		$criteria->compare('stu_stuegangstidspunkt',$this->stu_stuegangstidspunkt);
		$criteria->compare('stu_subjektivvurdering',$this->stu_subjektivvurdering,true);
		$criteria->compare('stuegangstidspunkt',$this->stuegangstidspunkt,true);
		$criteria->compare('stuegangtid',$this->stuegangtid,true);
		$criteria->compare('systoliskblodtryk',$this->systoliskblodtryk);
		$criteria->compare('ud_agailt',$this->ud_agailt,true);
		$criteria->compare('ud_antaldageintensiveretobs',$this->ud_antaldageintensiveretobs);
		$criteria->compare('ud_epikrisetilegenlage',$this->ud_epikrisetilegenlage,true);
		$criteria->compare('ud_fevkonstantellertigen',$this->ud_fevkonstantellertigen,true);
		$criteria->compare('ud_kliniskstabil',$this->ud_kliniskstabil,true);
		$criteria->compare('ud_medicinkasse',$this->ud_medicinkasse,true);
		$criteria->compare('ud_notat',$this->ud_notat,true);
		$criteria->compare('ud_saturationsat90pmax',$this->ud_saturationsat90pmax,true);
		$criteria->compare('ud_sovettimer',$this->ud_sovettimer,true);
		$criteria->compare('ud_tilstandbedret',$this->ud_tilstandbedret,true);
		$criteria->compare('ud_viewcare',$this->ud_viewcare,true);
		$criteria->compare('udd_forstover',$this->udd_forstover,true);
		$criteria->compare('udd_hjemmeilt',$this->udd_hjemmeilt,true);
		$criteria->compare('udd_kontrol',$this->udd_kontrol,true);
		$criteria->compare('udd_medicin',$this->udd_medicin,true);
		$criteria->compare('udd_nodprocedure',$this->udd_nodprocedure,true);
		$criteria->compare('udd_viewcareskarm',$this->udd_viewcareskarm,true);
		$criteria->compare('udskri_fev1konstantellersti',$this->udskri_fev1konstantellersti,true);
		$criteria->compare('udskri_kliniskstabil',$this->udskri_kliniskstabil,true);
		$criteria->compare('udskri_saturationsat90',$this->udskri_saturationsat90,true);
		$criteria->compare('udskri_sovettimer',$this->udskri_sovettimer,true);
		$criteria->compare('udskri_tilstandbedret',$this->udskri_tilstandbedret,true);

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