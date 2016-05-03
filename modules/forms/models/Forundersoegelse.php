<?php

/**
 * This is the model class for table "{{forundersoegelse}}".
 *
 * The followings are the available columns in table '{{forundersoegelse}}':
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
 * @property string $aftaler_behandlingsmaal
 * @property string $aftaler_borgerplan
 * @property string $aftaler_forvarr
 * @property string $aftaler_henvis_empowern
 * @property string $aftaler_henvis_rehab
 * @property string $aftaler_opfl_kontrol
 * @property string $aldrig_ryger
 * @property string $anamnese
 * @property integer $antal_pakke_ryger
 * @property integer $antal_pakke_tidl
 * @property string $behand_textarea
 * @property string $billede_ct
 * @property string $billede_rontgen
 * @property string $billede_scintigrafi
 * @property double $blod_andet_alpha
 * @property double $blod_andet_pcarba
 * @property double $blod_elektro_creatin
 * @property double $blod_elektro_kalium
 * @property double $blod_elektro_natrium
 * @property double $blod_infek_leu
 * @property double $blod_kalk_calcium
 * @property double $blod_kalk_ppth
 * @property double $blod_kalk_vitamin
 * @property double $blod_procent
 * @property double $blod_sukker
 * @property string $blodigt
 * @property string $co_mor_adipositas
 * @property string $co_mor_depress
 * @property string $co_mor_diabets
 * @property string $co_mor_hjerteins
 * @property string $co_mor_hypertensio
 * @property string $co_mor_iskaem
 * @property string $co_mor_kakeksi
 * @property string $co_mor_oste
 * @property string $diagnose_tidspunkt
 * @property string $ekspektorat
 * @property string $empower_tidogdato
 * @property string $erhvervsanamnese
 * @property string $ernaering
 * @property integer $fagerstrom_score
 * @property string $funk_andet
 * @property string $funk_gaden
 * @property integer $funk_gangdistance
 * @property string $funk_hjaelp
 * @property string $funk_ilttilskud
 * @property string $funk_pers_pleje
 * @property string $funk_personlig_sel
 * @property string $funk_selvhjulpen
 * @property string $funk_trappe
 * @property string $henv_rehab_fravalgt
 * @property string $henv_rehab_hosp
 * @property string $henv_rehab_kommunal
 * @property string $henv_rehab_notat
 * @property string $henv_rehab_tele
 * @property string $hjemmeilt
 * @property string $hoste
 * @property integer $hvis_blodigt
 * @property string $ilt_dosis
 * @property integer $indlaeggelser
 * @property double $infektionstal_b_basofilocytter
 * @property double $infektionstal_b_eosinofilocytt
 * @property double $infektionstal_b_lymfocytter
 * @property double $infektionstal_b_monocytter
 * @property double $infektionstal_b_neutrofilocytt
 * @property double $infektionstal_b_trombocytter
 * @property double $infektionstal_neutrofilocytter
 * @property double $infektionstal_p_crp
 * @property integer $kure
 * @property string $label_symptomstatus
 * @property string $luftvej_exacerbationer
 * @property string $luftvej_status
 * @property string $luftvejs_symptomer
 * @property string $med_
 * @property string $med_dato
 * @property string $med_gennem
 * @property string $med_gennem_andenmed
 * @property string $med_gennem_bivirkninger
 * @property integer $med_gennem_dosis
 * @property integer $med_gennem_frekvens
 * @property double $med_gennem_hjemmeiltdosis
 * @property integer $med_gennem_hjemmeiltfre
 * @property string $med_gennem_maengde
 * @property string $med_gennem_pn
 * @property string $med_gennem_praeparat
 * @property double $med_gennem_styrke
 * @property string $med_medcinaktion
 * @property string $med_tid
 * @property string $medicin_gennem_ovrig
 * @property string $mrc_score
 * @property integer $objektive_blodtryk_dia
 * @property integer $objektive_blodtryk_sys
 * @property double $objektive_borger_bmi
 * @property double $objektive_borger_hojde
 * @property double $objektive_borger_vaegt
 * @property integer $objektive_borgermaaling_puls
 * @property integer $objektive_borgermaaling_respi
 * @property double $objektive_borgermaaling_temp
 * @property string $objektive_obj_dyspno
 * @property string $objektive_obj_farver
 * @property string $objektive_obj_odemer
 * @property string $objektive_objek_hud
 * @property string $objektive_steto_hjerte
 * @property string $objektive_steto_lunge
 * @property string $onsker_rygeaf
 * @property string $opf_kontrol
 * @property integer $ophorsaar
 * @property string $rehab_tidogdato
 * @property string $rehabel_tiddato
 * @property string $rehabhenvisning_dropdown
 * @property string $ryger
 * @property string $social
 * @property string $special_dexa
 * @property string $special_ekg
 * @property string $special_udvidet
 * @property string $speical_ekko
 * @property double $spiro_fev1
 * @property integer $spiro_fev1_forventet
 * @property double $spiro_fvc
 * @property double $spiro_tiffeneau
 * @property integer $strat_forvaerringer
 * @property integer $strat_gold
 * @property string $strat_mrc
 * @property integer $strat_niveau
 * @property string $symptomfrekvens
 * @property string $tidligere_ryger
 * @property integer $tobaks_maengde
 * @property string $tobaks_type
 * @property string $udda_til_medone
 * @property string $uddannelse_booking
 * @property string $uddannelse_emp_kat
 * @property string $uddannelse_handl
 * @property string $uddannelse_pulso
 * @property string $uddannelse_pulso_maaling
 * @property string $uddannelse_pulso_paasaetning
 * @property string $uddannelse_pulso_taend
 * @property string $uddannelse_spiro_
 * @property string $uddannelse_spiro_haandtering
 * @property string $uddannelse_spiro_puste
 * @property string $uddannelse_spiro_taend
 * @property string $uddannelse_taend_sluk
 * @property string $uddannelse_til_behand
 * @property string $uddannelse_til_bivirkninger
 * @property string $uddannelse_til_brug
 * @property string $uddannelse_til_ko
 * @property string $uddannelse_til_lavsstil
 * @property string $uddannelse_til_med
 * @property string $uddannelse_til_medicinkasse
 * @property string $uddannelse_til_mental
 * @property string $uddannelse_til_virkningsmaade
 * @property string $uddannelse_tilstandsvarktoj
 * @property string $uddannelse_ugeplaner
 * @property string $uddannelse_video
 */
class Forundersoegelse extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Forundersoegelse the static model class
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
        return '{{forundersoegelse}}';
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
            array('deleted, event_id, submitted, antal_pakke_ryger, antal_pakke_tidl, fagerstrom_score, funk_gangdistance, hvis_blodigt, indlaeggelser, kure, med_gennem_dosis, med_gennem_frekvens, med_gennem_hjemmeiltfre, objektive_blodtryk_dia, objektive_blodtryk_sys, objektive_borgermaaling_puls, objektive_borgermaaling_respi, ophorsaar, spiro_fev1_forventet, strat_forvaerringer, strat_gold, strat_niveau, tobaks_maengde', 'numerical', 'integerOnly'=>true),
            array('blod_andet_alpha, blod_andet_pcarba, blod_elektro_creatin, blod_elektro_kalium, blod_elektro_natrium, blod_infek_leu, blod_kalk_calcium, blod_kalk_ppth, blod_kalk_vitamin, blod_procent, blod_sukker, infektionstal_b_basofilocytter, infektionstal_b_eosinofilocytt, infektionstal_b_lymfocytter, infektionstal_b_monocytter, infektionstal_b_neutrofilocytt, infektionstal_b_trombocytter, infektionstal_neutrofilocytter, infektionstal_p_crp, med_gennem_hjemmeiltdosis, med_gennem_styrke, objektive_borger_bmi, objektive_borger_hojde, objektive_borger_vaegt, objektive_borgermaaling_temp, spiro_fev1, spiro_fvc, spiro_tiffeneau', 'numerical'),
            array('name, billede_ct, billede_rontgen, billede_scintigrafi, empower_tidogdato, erhvervsanamnese, luftvej_status, luftvejs_symptomer, med_gennem_maengde, med_gennem_praeparat, opf_kontrol, rehab_tidogdato', 'length', 'max'=>255),
            array('modified_user_id, created_by, assigned_user_id', 'length', 'max'=>36),
            array('aftaler_behandlingsmaal, aftaler_borgerplan, aftaler_forvarr, aftaler_henvis_empowern, aftaler_henvis_rehab, aftaler_opfl_kontrol, aldrig_ryger, blodigt, co_mor_adipositas, co_mor_depress, co_mor_diabets, co_mor_hjerteins, co_mor_hypertensio, co_mor_iskaem, co_mor_kakeksi, co_mor_oste, ekspektorat, funk_gaden, funk_hjaelp, funk_ilttilskud, funk_pers_pleje, funk_personlig_sel, funk_selvhjulpen, funk_trappe, henv_rehab_fravalgt, henv_rehab_hosp, henv_rehab_kommunal, henv_rehab_tele, hjemmeilt, hoste, ilt_dosis, mrc_score, onsker_rygeaf, rehabhenvisning_dropdown, ryger, strat_mrc, symptomfrekvens, tidligere_ryger, tobaks_type, udda_til_medone, uddannelse_booking, uddannelse_emp_kat, uddannelse_handl, uddannelse_pulso_maaling, uddannelse_pulso_paasaetning, uddannelse_pulso_taend, uddannelse_spiro_haandtering, uddannelse_spiro_puste, uddannelse_spiro_taend, uddannelse_taend_sluk, uddannelse_til_behand, uddannelse_til_bivirkninger, uddannelse_til_ko, uddannelse_til_lavsstil, uddannelse_til_medicinkasse, uddannelse_til_mental, uddannelse_til_virkningsmaade, uddannelse_tilstandsvarktoj, uddannelse_ugeplaner, uddannelse_video', 'length', 'max'=>100),
            array('diagnose_tidspunkt, med_tid, rehabel_tiddato', 'length', 'max'=>25),
            array('date_entered, date_modified, description, anamnese, behand_textarea, ernaering, funk_andet, henv_rehab_notat, label_symptomstatus, luftvej_exacerbationer, med_, med_dato, med_gennem, med_gennem_andenmed, med_gennem_bivirkninger, med_gennem_pn, med_medcinaktion, medicin_gennem_ovrig, objektive_obj_dyspno, objektive_obj_farver, objektive_obj_odemer, objektive_objek_hud, objektive_steto_hjerte, objektive_steto_lunge, social, special_dexa, special_ekg, special_udvidet, speical_ekko, uddannelse_pulso, uddannelse_spiro_, uddannelse_til_brug, uddannelse_til_med', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id, event_id, submitted, aftaler_behandlingsmaal, aftaler_borgerplan, aftaler_forvarr, aftaler_henvis_empowern, aftaler_henvis_rehab, aftaler_opfl_kontrol, aldrig_ryger, anamnese, antal_pakke_ryger, antal_pakke_tidl, behand_textarea, billede_ct, billede_rontgen, billede_scintigrafi, blod_andet_alpha, blod_andet_pcarba, blod_elektro_creatin, blod_elektro_kalium, blod_elektro_natrium, blod_infek_leu, blod_kalk_calcium, blod_kalk_ppth, blod_kalk_vitamin, blod_procent, blod_sukker, blodigt, co_mor_adipositas, co_mor_depress, co_mor_diabets, co_mor_hjerteins, co_mor_hypertensio, co_mor_iskaem, co_mor_kakeksi, co_mor_oste, diagnose_tidspunkt, ekspektorat, empower_tidogdato, erhvervsanamnese, ernaering, fagerstrom_score, funk_andet, funk_gaden, funk_gangdistance, funk_hjaelp, funk_ilttilskud, funk_pers_pleje, funk_personlig_sel, funk_selvhjulpen, funk_trappe, henv_rehab_fravalgt, henv_rehab_hosp, henv_rehab_kommunal, henv_rehab_notat, henv_rehab_tele, hjemmeilt, hoste, hvis_blodigt, ilt_dosis, indlaeggelser, infektionstal_b_basofilocytter, infektionstal_b_eosinofilocytt, infektionstal_b_lymfocytter, infektionstal_b_monocytter, infektionstal_b_neutrofilocytt, infektionstal_b_trombocytter, infektionstal_neutrofilocytter, infektionstal_p_crp, kure, label_symptomstatus, luftvej_exacerbationer, luftvej_status, luftvejs_symptomer, med_, med_dato, med_gennem, med_gennem_andenmed, med_gennem_bivirkninger, med_gennem_dosis, med_gennem_frekvens, med_gennem_hjemmeiltdosis, med_gennem_hjemmeiltfre, med_gennem_maengde, med_gennem_pn, med_gennem_praeparat, med_gennem_styrke, med_medcinaktion, med_tid, medicin_gennem_ovrig, mrc_score, objektive_blodtryk_dia, objektive_blodtryk_sys, objektive_borger_bmi, objektive_borger_hojde, objektive_borger_vaegt, objektive_borgermaaling_puls, objektive_borgermaaling_respi, objektive_borgermaaling_temp, objektive_obj_dyspno, objektive_obj_farver, objektive_obj_odemer, objektive_objek_hud, objektive_steto_hjerte, objektive_steto_lunge, onsker_rygeaf, opf_kontrol, ophorsaar, rehab_tidogdato, rehabel_tiddato, rehabhenvisning_dropdown, ryger, social, special_dexa, special_ekg, special_udvidet, speical_ekko, spiro_fev1, spiro_fev1_forventet, spiro_fvc, spiro_tiffeneau, strat_forvaerringer, strat_gold, strat_mrc, strat_niveau, symptomfrekvens, tidligere_ryger, tobaks_maengde, tobaks_type, udda_til_medone, uddannelse_booking, uddannelse_emp_kat, uddannelse_handl, uddannelse_pulso, uddannelse_pulso_maaling, uddannelse_pulso_paasaetning, uddannelse_pulso_taend, uddannelse_spiro_, uddannelse_spiro_haandtering, uddannelse_spiro_puste, uddannelse_spiro_taend, uddannelse_taend_sluk, uddannelse_til_behand, uddannelse_til_bivirkninger, uddannelse_til_brug, uddannelse_til_ko, uddannelse_til_lavsstil, uddannelse_til_med, uddannelse_til_medicinkasse, uddannelse_til_mental, uddannelse_til_virkningsmaade, uddannelse_tilstandsvarktoj, uddannelse_ugeplaner, uddannelse_video', 'safe', 'on'=>'search'),
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
            'aftaler_behandlingsmaal' => 'Aftaler Behandlingsmaal',
            'aftaler_borgerplan' => 'Aftaler Borgerplan',
            'aftaler_forvarr' => 'Aftaler Forvarr',
            'aftaler_henvis_empowern' => 'Aftaler Henvis Empowern',
            'aftaler_henvis_rehab' => 'Aftaler Henvis Rehab',
            'aftaler_opfl_kontrol' => 'Aftaler Opfl Kontrol',
            'aldrig_ryger' => 'Aldrig Ryger',
            'anamnese' => 'Anamnese',
            'antal_pakke_ryger' => 'Antal Pakke Ryger',
            'antal_pakke_tidl' => 'Antal Pakke Tidl',
            'behand_textarea' => 'Behand Textarea',
            'billede_ct' => 'Billede Ct',
            'billede_rontgen' => 'Billede Rontgen',
            'billede_scintigrafi' => 'Billede Scintigrafi',
            'blod_andet_alpha' => 'Blod Andet Alpha',
            'blod_andet_pcarba' => 'Blod Andet Pcarba',
            'blod_elektro_creatin' => 'Blod Elektro Creatin',
            'blod_elektro_kalium' => 'Blod Elektro Kalium',
            'blod_elektro_natrium' => 'Blod Elektro Natrium',
            'blod_infek_leu' => 'Blod Infek Leu',
            'blod_kalk_calcium' => 'Blod Kalk Calcium',
            'blod_kalk_ppth' => 'Blod Kalk Ppth',
            'blod_kalk_vitamin' => 'Blod Kalk Vitamin',
            'blod_procent' => 'Blod Procent',
            'blod_sukker' => 'Blod Sukker',
            'blodigt' => 'Blodigt',
            'co_mor_adipositas' => 'Co Mor Adipositas',
            'co_mor_depress' => 'Co Mor Depress',
            'co_mor_diabets' => 'Co Mor Diabets',
            'co_mor_hjerteins' => 'Co Mor Hjerteins',
            'co_mor_hypertensio' => 'Co Mor Hypertensio',
            'co_mor_iskaem' => 'Co Mor Iskaem',
            'co_mor_kakeksi' => 'Co Mor Kakeksi',
            'co_mor_oste' => 'Co Mor Oste',
            'diagnose_tidspunkt' => 'Diagnose Tidspunkt',
            'ekspektorat' => 'Ekspektorat',
            'empower_tidogdato' => 'Empower Tidogdato',
            'erhvervsanamnese' => 'Erhvervsanamnese',
            'ernaering' => 'Ernaering',
            'fagerstrom_score' => 'Fagerstrom Score',
            'funk_andet' => 'Funk Andet',
            'funk_gaden' => 'Funk Gaden',
            'funk_gangdistance' => 'Funk Gangdistance',
            'funk_hjaelp' => 'Funk Hjaelp',
            'funk_ilttilskud' => 'Funk Ilttilskud',
            'funk_pers_pleje' => 'Funk Pers Pleje',
            'funk_personlig_sel' => 'Funk Personlig Sel',
            'funk_selvhjulpen' => 'Funk Selvhjulpen',
            'funk_trappe' => 'Funk Trappe',
            'henv_rehab_fravalgt' => 'Henv Rehab Fravalgt',
            'henv_rehab_hosp' => 'Henv Rehab Hosp',
            'henv_rehab_kommunal' => 'Henv Rehab Kommunal',
            'henv_rehab_notat' => 'Henv Rehab Notat',
            'henv_rehab_tele' => 'Henv Rehab Tele',
            'hjemmeilt' => 'Hjemmeilt',
            'hoste' => 'Hoste',
            'hvis_blodigt' => 'Hvis Blodigt',
            'ilt_dosis' => 'Ilt Dosis',
            'indlaeggelser' => 'Indlaeggelser',
            'infektionstal_b_basofilocytter' => 'Infektionstal B Basofilocytter',
            'infektionstal_b_eosinofilocytt' => 'Infektionstal B Eosinofilocytt',
            'infektionstal_b_lymfocytter' => 'Infektionstal B Lymfocytter',
            'infektionstal_b_monocytter' => 'Infektionstal B Monocytter',
            'infektionstal_b_neutrofilocytt' => 'Infektionstal B Neutrofilocytt',
            'infektionstal_b_trombocytter' => 'Infektionstal B Trombocytter',
            'infektionstal_neutrofilocytter' => 'Infektionstal Neutrofilocytter',
            'infektionstal_p_crp' => 'Infektionstal P Crp',
            'kure' => 'Kure',
            'label_symptomstatus' => 'Label Symptomstatus',
            'luftvej_exacerbationer' => 'Luftvej Exacerbationer',
            'luftvej_status' => 'Luftvej Status',
            'luftvejs_symptomer' => 'Luftvejs Symptomer',
            'med_' => 'Med',
            'med_dato' => 'Med Dato',
            'med_gennem' => 'Med Gennem',
            'med_gennem_andenmed' => 'Med Gennem Andenmed',
            'med_gennem_bivirkninger' => 'Med Gennem Bivirkninger',
            'med_gennem_dosis' => 'Med Gennem Dosis',
            'med_gennem_frekvens' => 'Med Gennem Frekvens',
            'med_gennem_hjemmeiltdosis' => 'Med Gennem Hjemmeiltdosis',
            'med_gennem_hjemmeiltfre' => 'Med Gennem Hjemmeiltfre',
            'med_gennem_maengde' => 'Med Gennem Maengde',
            'med_gennem_pn' => 'Med Gennem Pn',
            'med_gennem_praeparat' => 'Med Gennem Praeparat',
            'med_gennem_styrke' => 'Med Gennem Styrke',
            'med_medcinaktion' => 'Med Medcinaktion',
            'med_tid' => 'Med Tid',
            'medicin_gennem_ovrig' => 'Medicin Gennem Ovrig',
            'mrc_score' => 'Mrc Score',
            'objektive_blodtryk_dia' => 'Objektive Blodtryk Dia',
            'objektive_blodtryk_sys' => 'Objektive Blodtryk Sys',
            'objektive_borger_bmi' => 'Objektive Borger Bmi',
            'objektive_borger_hojde' => 'Objektive Borger Hojde',
            'objektive_borger_vaegt' => 'Objektive Borger Vaegt',
            'objektive_borgermaaling_puls' => 'Objektive Borgermaaling Puls',
            'objektive_borgermaaling_respi' => 'Objektive Borgermaaling Respi',
            'objektive_borgermaaling_temp' => 'Objektive Borgermaaling Temp',
            'objektive_obj_dyspno' => 'Objektive Obj Dyspno',
            'objektive_obj_farver' => 'Objektive Obj Farver',
            'objektive_obj_odemer' => 'Objektive Obj Odemer',
            'objektive_objek_hud' => 'Objektive Objek Hud',
            'objektive_steto_hjerte' => 'Objektive Steto Hjerte',
            'objektive_steto_lunge' => 'Objektive Steto Lunge',
            'onsker_rygeaf' => 'Onsker Rygeaf',
            'opf_kontrol' => 'Opf Kontrol',
            'ophorsaar' => 'Ophorsaar',
            'rehab_tidogdato' => 'Rehab Tidogdato',
            'rehabel_tiddato' => 'Rehabel Tiddato',
            'rehabhenvisning_dropdown' => 'Rehabhenvisning Dropdown',
            'ryger' => 'Ryger',
            'social' => 'Social',
            'special_dexa' => 'Special Dexa',
            'special_ekg' => 'Special Ekg',
            'special_udvidet' => 'Special Udvidet',
            'speical_ekko' => 'Speical Ekko',
            'spiro_fev1' => 'Spiro Fev1',
            'spiro_fev1_forventet' => 'Spiro Fev1 Forventet',
            'spiro_fvc' => 'Spiro Fvc',
            'spiro_tiffeneau' => 'Spiro Tiffeneau',
            'strat_forvaerringer' => 'Strat Forvaerringer',
            'strat_gold' => 'Strat Gold',
            'strat_mrc' => 'Strat Mrc',
            'strat_niveau' => 'Strat Niveau',
            'symptomfrekvens' => 'Symptomfrekvens',
            'tidligere_ryger' => 'Tidligere Ryger',
            'tobaks_maengde' => 'Tobaks Maengde',
            'tobaks_type' => 'Tobaks Type',
            'udda_til_medone' => 'Udda Til Medone',
            'uddannelse_booking' => 'Uddannelse Booking',
            'uddannelse_emp_kat' => 'Uddannelse Emp Kat',
            'uddannelse_handl' => 'Uddannelse Handl',
            'uddannelse_pulso' => 'Uddannelse Pulso',
            'uddannelse_pulso_maaling' => 'Uddannelse Pulso Maaling',
            'uddannelse_pulso_paasaetning' => 'Uddannelse Pulso Paasaetning',
            'uddannelse_pulso_taend' => 'Uddannelse Pulso Taend',
            'uddannelse_spiro_' => 'Uddannelse Spiro',
            'uddannelse_spiro_haandtering' => 'Uddannelse Spiro Haandtering',
            'uddannelse_spiro_puste' => 'Uddannelse Spiro Puste',
            'uddannelse_spiro_taend' => 'Uddannelse Spiro Taend',
            'uddannelse_taend_sluk' => 'Uddannelse Taend Sluk',
            'uddannelse_til_behand' => 'Uddannelse Til Behand',
            'uddannelse_til_bivirkninger' => 'Uddannelse Til Bivirkninger',
            'uddannelse_til_brug' => 'Uddannelse Til Brug',
            'uddannelse_til_ko' => 'Uddannelse Til Ko',
            'uddannelse_til_lavsstil' => 'Uddannelse Til Lavsstil',
            'uddannelse_til_med' => 'Uddannelse Til Med',
            'uddannelse_til_medicinkasse' => 'Uddannelse Til Medicinkasse',
            'uddannelse_til_mental' => 'Uddannelse Til Mental',
            'uddannelse_til_virkningsmaade' => 'Uddannelse Til Virkningsmaade',
            'uddannelse_tilstandsvarktoj' => 'Uddannelse Tilstandsvarktoj',
            'uddannelse_ugeplaner' => 'Uddannelse Ugeplaner',
            'uddannelse_video' => 'Uddannelse Video',
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
		$criteria->compare('aftaler_behandlingsmaal',$this->aftaler_behandlingsmaal,true);
		$criteria->compare('aftaler_borgerplan',$this->aftaler_borgerplan,true);
		$criteria->compare('aftaler_forvarr',$this->aftaler_forvarr,true);
		$criteria->compare('aftaler_henvis_empowern',$this->aftaler_henvis_empowern,true);
		$criteria->compare('aftaler_henvis_rehab',$this->aftaler_henvis_rehab,true);
		$criteria->compare('aftaler_opfl_kontrol',$this->aftaler_opfl_kontrol,true);
		$criteria->compare('aldrig_ryger',$this->aldrig_ryger,true);
		$criteria->compare('anamnese',$this->anamnese,true);
		$criteria->compare('antal_pakke_ryger',$this->antal_pakke_ryger);
		$criteria->compare('antal_pakke_tidl',$this->antal_pakke_tidl);
		$criteria->compare('behand_textarea',$this->behand_textarea,true);
		$criteria->compare('billede_ct',$this->billede_ct,true);
		$criteria->compare('billede_rontgen',$this->billede_rontgen,true);
		$criteria->compare('billede_scintigrafi',$this->billede_scintigrafi,true);
		$criteria->compare('blod_andet_alpha',$this->blod_andet_alpha);
		$criteria->compare('blod_andet_pcarba',$this->blod_andet_pcarba);
		$criteria->compare('blod_elektro_creatin',$this->blod_elektro_creatin);
		$criteria->compare('blod_elektro_kalium',$this->blod_elektro_kalium);
		$criteria->compare('blod_elektro_natrium',$this->blod_elektro_natrium);
		$criteria->compare('blod_infek_leu',$this->blod_infek_leu);
		$criteria->compare('blod_kalk_calcium',$this->blod_kalk_calcium);
		$criteria->compare('blod_kalk_ppth',$this->blod_kalk_ppth);
		$criteria->compare('blod_kalk_vitamin',$this->blod_kalk_vitamin);
		$criteria->compare('blod_procent',$this->blod_procent);
		$criteria->compare('blod_sukker',$this->blod_sukker);
		$criteria->compare('blodigt',$this->blodigt,true);
		$criteria->compare('co_mor_adipositas',$this->co_mor_adipositas,true);
		$criteria->compare('co_mor_depress',$this->co_mor_depress,true);
		$criteria->compare('co_mor_diabets',$this->co_mor_diabets,true);
		$criteria->compare('co_mor_hjerteins',$this->co_mor_hjerteins,true);
		$criteria->compare('co_mor_hypertensio',$this->co_mor_hypertensio,true);
		$criteria->compare('co_mor_iskaem',$this->co_mor_iskaem,true);
		$criteria->compare('co_mor_kakeksi',$this->co_mor_kakeksi,true);
		$criteria->compare('co_mor_oste',$this->co_mor_oste,true);
		$criteria->compare('diagnose_tidspunkt',$this->diagnose_tidspunkt,true);
		$criteria->compare('ekspektorat',$this->ekspektorat,true);
		$criteria->compare('empower_tidogdato',$this->empower_tidogdato,true);
		$criteria->compare('erhvervsanamnese',$this->erhvervsanamnese,true);
		$criteria->compare('ernaering',$this->ernaering,true);
		$criteria->compare('fagerstrom_score',$this->fagerstrom_score);
		$criteria->compare('funk_andet',$this->funk_andet,true);
		$criteria->compare('funk_gaden',$this->funk_gaden,true);
		$criteria->compare('funk_gangdistance',$this->funk_gangdistance);
		$criteria->compare('funk_hjaelp',$this->funk_hjaelp,true);
		$criteria->compare('funk_ilttilskud',$this->funk_ilttilskud,true);
		$criteria->compare('funk_pers_pleje',$this->funk_pers_pleje,true);
		$criteria->compare('funk_personlig_sel',$this->funk_personlig_sel,true);
		$criteria->compare('funk_selvhjulpen',$this->funk_selvhjulpen,true);
		$criteria->compare('funk_trappe',$this->funk_trappe,true);
		$criteria->compare('henv_rehab_fravalgt',$this->henv_rehab_fravalgt,true);
		$criteria->compare('henv_rehab_hosp',$this->henv_rehab_hosp,true);
		$criteria->compare('henv_rehab_kommunal',$this->henv_rehab_kommunal,true);
		$criteria->compare('henv_rehab_notat',$this->henv_rehab_notat,true);
		$criteria->compare('henv_rehab_tele',$this->henv_rehab_tele,true);
		$criteria->compare('hjemmeilt',$this->hjemmeilt,true);
		$criteria->compare('hoste',$this->hoste,true);
		$criteria->compare('hvis_blodigt',$this->hvis_blodigt);
		$criteria->compare('ilt_dosis',$this->ilt_dosis,true);
		$criteria->compare('indlaeggelser',$this->indlaeggelser);
		$criteria->compare('infektionstal_b_basofilocytter',$this->infektionstal_b_basofilocytter);
		$criteria->compare('infektionstal_b_eosinofilocytt',$this->infektionstal_b_eosinofilocytt);
		$criteria->compare('infektionstal_b_lymfocytter',$this->infektionstal_b_lymfocytter);
		$criteria->compare('infektionstal_b_monocytter',$this->infektionstal_b_monocytter);
		$criteria->compare('infektionstal_b_neutrofilocytt',$this->infektionstal_b_neutrofilocytt);
		$criteria->compare('infektionstal_b_trombocytter',$this->infektionstal_b_trombocytter);
		$criteria->compare('infektionstal_neutrofilocytter',$this->infektionstal_neutrofilocytter);
		$criteria->compare('infektionstal_p_crp',$this->infektionstal_p_crp);
		$criteria->compare('kure',$this->kure);
		$criteria->compare('label_symptomstatus',$this->label_symptomstatus,true);
		$criteria->compare('luftvej_exacerbationer',$this->luftvej_exacerbationer,true);
		$criteria->compare('luftvej_status',$this->luftvej_status,true);
		$criteria->compare('luftvejs_symptomer',$this->luftvejs_symptomer,true);
		$criteria->compare('med_',$this->med_,true);
		$criteria->compare('med_dato',$this->med_dato,true);
		$criteria->compare('med_gennem',$this->med_gennem,true);
		$criteria->compare('med_gennem_andenmed',$this->med_gennem_andenmed,true);
		$criteria->compare('med_gennem_bivirkninger',$this->med_gennem_bivirkninger,true);
		$criteria->compare('med_gennem_dosis',$this->med_gennem_dosis);
		$criteria->compare('med_gennem_frekvens',$this->med_gennem_frekvens);
		$criteria->compare('med_gennem_hjemmeiltdosis',$this->med_gennem_hjemmeiltdosis);
		$criteria->compare('med_gennem_hjemmeiltfre',$this->med_gennem_hjemmeiltfre);
		$criteria->compare('med_gennem_maengde',$this->med_gennem_maengde,true);
		$criteria->compare('med_gennem_pn',$this->med_gennem_pn,true);
		$criteria->compare('med_gennem_praeparat',$this->med_gennem_praeparat,true);
		$criteria->compare('med_gennem_styrke',$this->med_gennem_styrke);
		$criteria->compare('med_medcinaktion',$this->med_medcinaktion,true);
		$criteria->compare('med_tid',$this->med_tid,true);
		$criteria->compare('medicin_gennem_ovrig',$this->medicin_gennem_ovrig,true);
		$criteria->compare('mrc_score',$this->mrc_score,true);
		$criteria->compare('objektive_blodtryk_dia',$this->objektive_blodtryk_dia);
		$criteria->compare('objektive_blodtryk_sys',$this->objektive_blodtryk_sys);
		$criteria->compare('objektive_borger_bmi',$this->objektive_borger_bmi);
		$criteria->compare('objektive_borger_hojde',$this->objektive_borger_hojde);
		$criteria->compare('objektive_borger_vaegt',$this->objektive_borger_vaegt);
		$criteria->compare('objektive_borgermaaling_puls',$this->objektive_borgermaaling_puls);
		$criteria->compare('objektive_borgermaaling_respi',$this->objektive_borgermaaling_respi);
		$criteria->compare('objektive_borgermaaling_temp',$this->objektive_borgermaaling_temp);
		$criteria->compare('objektive_obj_dyspno',$this->objektive_obj_dyspno,true);
		$criteria->compare('objektive_obj_farver',$this->objektive_obj_farver,true);
		$criteria->compare('objektive_obj_odemer',$this->objektive_obj_odemer,true);
		$criteria->compare('objektive_objek_hud',$this->objektive_objek_hud,true);
		$criteria->compare('objektive_steto_hjerte',$this->objektive_steto_hjerte,true);
		$criteria->compare('objektive_steto_lunge',$this->objektive_steto_lunge,true);
		$criteria->compare('onsker_rygeaf',$this->onsker_rygeaf,true);
		$criteria->compare('opf_kontrol',$this->opf_kontrol,true);
		$criteria->compare('ophorsaar',$this->ophorsaar);
		$criteria->compare('rehab_tidogdato',$this->rehab_tidogdato,true);
		$criteria->compare('rehabel_tiddato',$this->rehabel_tiddato,true);
		$criteria->compare('rehabhenvisning_dropdown',$this->rehabhenvisning_dropdown,true);
		$criteria->compare('ryger',$this->ryger,true);
		$criteria->compare('social',$this->social,true);
		$criteria->compare('special_dexa',$this->special_dexa,true);
		$criteria->compare('special_ekg',$this->special_ekg,true);
		$criteria->compare('special_udvidet',$this->special_udvidet,true);
		$criteria->compare('speical_ekko',$this->speical_ekko,true);
		$criteria->compare('spiro_fev1',$this->spiro_fev1);
		$criteria->compare('spiro_fev1_forventet',$this->spiro_fev1_forventet);
		$criteria->compare('spiro_fvc',$this->spiro_fvc);
		$criteria->compare('spiro_tiffeneau',$this->spiro_tiffeneau);
		$criteria->compare('strat_forvaerringer',$this->strat_forvaerringer);
		$criteria->compare('strat_gold',$this->strat_gold);
		$criteria->compare('strat_mrc',$this->strat_mrc,true);
		$criteria->compare('strat_niveau',$this->strat_niveau);
		$criteria->compare('symptomfrekvens',$this->symptomfrekvens,true);
		$criteria->compare('tidligere_ryger',$this->tidligere_ryger,true);
		$criteria->compare('tobaks_maengde',$this->tobaks_maengde);
		$criteria->compare('tobaks_type',$this->tobaks_type,true);
		$criteria->compare('udda_til_medone',$this->udda_til_medone,true);
		$criteria->compare('uddannelse_booking',$this->uddannelse_booking,true);
		$criteria->compare('uddannelse_emp_kat',$this->uddannelse_emp_kat,true);
		$criteria->compare('uddannelse_handl',$this->uddannelse_handl,true);
		$criteria->compare('uddannelse_pulso',$this->uddannelse_pulso,true);
		$criteria->compare('uddannelse_pulso_maaling',$this->uddannelse_pulso_maaling,true);
		$criteria->compare('uddannelse_pulso_paasaetning',$this->uddannelse_pulso_paasaetning,true);
		$criteria->compare('uddannelse_pulso_taend',$this->uddannelse_pulso_taend,true);
		$criteria->compare('uddannelse_spiro_',$this->uddannelse_spiro_,true);
		$criteria->compare('uddannelse_spiro_haandtering',$this->uddannelse_spiro_haandtering,true);
		$criteria->compare('uddannelse_spiro_puste',$this->uddannelse_spiro_puste,true);
		$criteria->compare('uddannelse_spiro_taend',$this->uddannelse_spiro_taend,true);
		$criteria->compare('uddannelse_taend_sluk',$this->uddannelse_taend_sluk,true);
		$criteria->compare('uddannelse_til_behand',$this->uddannelse_til_behand,true);
		$criteria->compare('uddannelse_til_bivirkninger',$this->uddannelse_til_bivirkninger,true);
		$criteria->compare('uddannelse_til_brug',$this->uddannelse_til_brug,true);
		$criteria->compare('uddannelse_til_ko',$this->uddannelse_til_ko,true);
		$criteria->compare('uddannelse_til_lavsstil',$this->uddannelse_til_lavsstil,true);
		$criteria->compare('uddannelse_til_med',$this->uddannelse_til_med,true);
		$criteria->compare('uddannelse_til_medicinkasse',$this->uddannelse_til_medicinkasse,true);
		$criteria->compare('uddannelse_til_mental',$this->uddannelse_til_mental,true);
		$criteria->compare('uddannelse_til_virkningsmaade',$this->uddannelse_til_virkningsmaade,true);
		$criteria->compare('uddannelse_tilstandsvarktoj',$this->uddannelse_tilstandsvarktoj,true);
		$criteria->compare('uddannelse_ugeplaner',$this->uddannelse_ugeplaner,true);
		$criteria->compare('uddannelse_video',$this->uddannelse_video,true);

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