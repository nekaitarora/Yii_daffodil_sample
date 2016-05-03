<?php

/**
 * This is the model class for table "{{change_schema}}".
 *
 * The followings are the available columns in table '{{change_schema}}':
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $modified_by
 * @property integer $deleted
 * @property integer $assigned_user_id
 * @property integer $event_id
 * @property integer $submitted
 * @property integer $mood
 * @property integer $memory
 * @property integer $social_activity
 * @property integer $sleep_disorder
 * @property integer $how_does_the_home_look
 * @property string $what_citizen_can_do
 * @property integer $generally_initiative_of_citizen
 * @property integer $the_degree_of_hygiene
 * @property integer $physical_activity
 * @property integer $fall
 * @property integer $appetite
 * @property integer $thirst
 * @property integer $weight
 * @property integer $feces_pattern
 * @property integer $urination
 * @property integer $breathing
 * @property integer $cough
 * @property integer $fatigue
 * @property integer $pain
 * @property integer $dizzy
 * @property string $mood_comment
 * @property string $memory_comment
 * @property string $social_activity_comment
 * @property string $sleep_disorder_comment
 * @property string $how_does_the_home_look_comment
 * @property string $what_citizen_can_do_comment
 * @property string $generally_initiative_of_citizen_comment
 * @property string $the_degree_of_hygiene_comment
 * @property string $physical_activity_comment
 * @property string $fall_comment
 * @property string $appetite_comment
 * @property string $thirst_comment
 * @property string $weight_comment
 * @property string $feces_pattern_comment
 * @property string $urination_comment
 * @property string $breathing_comment
 * @property string $cough_comment
 * @property string $fatigue_comment
 * @property string $pain_comment
 * @property string $dizzy_comment
 * @property string $color
 * @property integer $more_than_5_preparations
 * @property integer $discharged_with_medication_changes
 * @property integer $manages_citizen_his_daily_medication
 * @property integer $does_citizen_take_other_medicine
 * @property integer $does_citizen_take_alternative_medicine
 * @property integer $are_there_old_medicine_in_cabinet
 * @property integer $messages
 */
class ChangeSchema extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ChangeSchema the static model class
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
        return '{{change_schema}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        $rules= array(
            array('date_created, date_modified, created_by, modified_by, assigned_user_id, 
            	mood, memory, social_activity, sleep_disorder, how_does_the_home_look, 
            	what_citizen_can_do, generally_initiative_of_citizen, the_degree_of_hygiene, 
            	physical_activity, fall, appetite, thirst, weight, feces_pattern, urination, 
            	breathing, cough, fatigue, pain, dizzy, more_than_5_preparations, 
            	discharged_with_medication_changes, manages_citizen_his_daily_medication', 'required'),
            array('created_by, modified_by, deleted, assigned_user_id, event_id, submitted, 
            	mood, memory, social_activity, sleep_disorder, how_does_the_home_look, 
            	generally_initiative_of_citizen, the_degree_of_hygiene, physical_activity, fall, 
            	appetite, thirst, weight, feces_pattern, urination, breathing, cough, fatigue, 
            	pain, dizzy, more_than_5_preparations, discharged_with_medication_changes, 
            	manages_citizen_his_daily_medication, does_citizen_take_other_medicine, 
            	does_citizen_take_alternative_medicine, are_there_old_medicine_in_cabinet', 'numerical', 'integerOnly'=>true),
            array('what_citizen_can_do', 'length', 'max'=>100),
            array('mood_comment, memory_comment, social_activity_comment, sleep_disorder_comment, 
            	how_does_the_home_look_comment, what_citizen_can_do_comment, 
            	generally_initiative_of_citizen_comment, the_degree_of_hygiene_comment, 
            	physical_activity_comment, fall_comment, appetite_comment, thirst_comment, 
            	weight_comment, feces_pattern_comment, urination_comment, breathing_comment, 
            	cough_comment, fatigue_comment, pain_comment, dizzy_comment', 'length', 'max'=>1000),
            	
            array('color', 'length', 'max'=>10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, date_created, date_modified, created_by, modified_by, deleted, assigned_user_id, 
            	event_id, submitted, mood, memory, social_activity, sleep_disorder, how_does_the_home_look, 
            	what_citizen_can_do, generally_initiative_of_citizen, the_degree_of_hygiene, physical_activity, 
            	fall, appetite, thirst, weight, feces_pattern, urination, breathing, cough, fatigue, pain, 
            	dizzy, mood_comment, memory_comment, social_activity_comment, sleep_disorder_comment, 
            	how_does_the_home_look_comment, what_citizen_can_do_comment, generally_initiative_of_citizen_comment, 
            	the_degree_of_hygiene_comment, physical_activity_comment, fall_comment, appetite_comment, 
            	thirst_comment, weight_comment, feces_pattern_comment, urination_comment, breathing_comment, 
            	cough_comment, fatigue_comment, pain_comment, dizzy_comment, color, dizzy, 
            	more_than_5_preparations, discharged_with_medication_changes, 
            	manages_citizen_his_daily_medication, does_citizen_take_other_medicine, 
            	does_citizen_take_alternative_medicine, are_there_old_medicine_in_cabinet, messages', 'safe', 'on'=>'search'),
            array('fall_comment', 'validateFallComment'),
            array('more_than_5_preparations, discharged_with_medication_changes,
            	manages_citizen_his_daily_medication, does_citizen_take_other_medicine, 
            	does_citizen_take_alternative_medicine, are_there_old_medicine_in_cabinet', 'in', 'range'=>array(0,1)),
        );
        
        if($this->manages_citizen_his_daily_medication == 1){
			$rules[] = array('does_citizen_take_other_medicine', 'required');
			
			if($this->does_citizen_take_other_medicine == 1){
				$rules[] = array('does_citizen_take_alternative_medicine, are_there_old_medicine_in_cabinet', 'required');
			}
        }
        return $rules;
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
            'date_created' => FormsModule::t('Date Created'),
            'date_modified' => FormsModule::t('Date Modified'),
            'created_by' => FormsModule::t('Created By'),
            'modified_by' => FormsModule::t('Modified By'),
            'deleted' => FormsModule::t('Deleted'),
            'assigned_user_id' => FormsModule::t('Assigned User'),
            'event_id' => FormsModule::t('Event'),
            'submitted' => FormsModule::t('Submitted'),
            'mood' => FormsModule::t('mood'),
            'memory' => FormsModule::t('memory'),
            'social_activity' => FormsModule::t('social_activity'),
            'sleep_disorder' => FormsModule::t('sleep_disorder'),
            'how_does_the_home_look' => FormsModule::t('how_does_the_home_look'),
            'what_citizen_can_do' => FormsModule::t('what_citizen_can_do'),
            'generally_initiative_of_citizen' => FormsModule::t('generally_initiative_of_citizen'),
            'the_degree_of_hygiene' => FormsModule::t('the_degree_of_hygiene'),
            'physical_activity' => FormsModule::t('physical_activity'),
            'fall' => FormsModule::t('fall'),
            'appetite' => FormsModule::t('appetite'),
            'thirst' => FormsModule::t('ahirst'),
            'weight' => FormsModule::t('weight'),
            'feces_pattern' => FormsModule::t('feces_pattern'),
            'urination' => FormsModule::t('urination'),
            'breathing' => FormsModule::t('breathing'),
            'cough' => FormsModule::t('cough'),
            'fatigue' => FormsModule::t('fatigue'),
            'pain' => FormsModule::t('pain'),
            'dizzy' => FormsModule::t('dizzy'),
            'mood_comment' => FormsModule::t('mood_comment'),
            'memory_comment' => FormsModule::t('memory_comment'),
            'social_activity_comment' => FormsModule::t('social_activity_comment'),
            'sleep_disorder_comment' => FormsModule::t('sleep_disorder_comment'),
            'how_does_the_home_look_comment' => FormsModule::t('how_does_the_home_look_comment'),
            'what_citizen_can_do_comment' => FormsModule::t('what_citizen_can_do_comment'),
            'generally_initiative_of_citizen_comment' => FormsModule::t('generally_initiative_of_citizen_comment'),
            'the_degree_of_hygiene_comment' => FormsModule::t('the_degree_of_hygiene_comment'),
            'physical_activity_comment' => FormsModule::t('physical_activity_comment'),
            'fall_comment' => FormsModule::t('fall_comment'),
            'appetite_comment' => FormsModule::t('appetite_comment'),
            'thirst_comment' => FormsModule::t('thirst_comment'),
            'weight_comment' => FormsModule::t('weight_comment'),
            'feces_pattern_comment' => FormsModule::t('feces_pattern_comment'),
            'urination_comment' => FormsModule::t('urination_comment'),
            'breathing_comment' => FormsModule::t('breathing_comment'),
            'cough_comment' => FormsModule::t('cough_comment'),
            'fatigue_comment' => FormsModule::t('fatigue_comment'),
            'pain_comment' => FormsModule::t('pain_comment'),
            'dizzy_comment' => FormsModule::t('dizzy_comment'),
            'color' => 'Color',
            'more_than_5_preparations' => FormsModule::t('more_than_5_preparations'),
            'discharged_with_medication_changes' => FormsModule::t('discharged_with_medication_changes'),
            'manages_citizen_his_daily_medication' => FormsModule::t('manages_citizen_his_daily_medication'),
            'does_citizen_take_other_medicine' => FormsModule::t('does_citizen_take_other_medicine'),
            'does_citizen_take_alternative_medicine' => FormsModule::t('does_citizen_take_alternative_medicine'),
            'are_there_old_medicine_in_cabinet' => FormsModule::t('are_there_old_medicine_in_cabinet'), 
            'messages' => 'Messages',           
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
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('assigned_user_id',$this->assigned_user_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('submitted',$this->submitted);
		$criteria->compare('mood',$this->mood);
		$criteria->compare('memory',$this->memory);
		$criteria->compare('social_activity',$this->social_activity);
		$criteria->compare('sleep_disorder',$this->sleep_disorder);
		$criteria->compare('how_does_the_home_look',$this->how_does_the_home_look);
		$criteria->compare('what_citizen_can_do',$this->what_citizen_can_do,true);
		$criteria->compare('generally_initiative_of_citizen',$this->generally_initiative_of_citizen);
		$criteria->compare('the_degree_of_hygiene',$this->the_degree_of_hygiene);
		$criteria->compare('physical_activity',$this->physical_activity);
		$criteria->compare('fall',$this->fall);
		$criteria->compare('appetite',$this->appetite);
		$criteria->compare('thirst',$this->thirst);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('feces_pattern',$this->feces_pattern);
		$criteria->compare('urination',$this->urination);
		$criteria->compare('breathing',$this->breathing);
		$criteria->compare('cough',$this->cough);
		$criteria->compare('fatigue',$this->fatigue);
		$criteria->compare('pain',$this->pain);
		$criteria->compare('dizzy',$this->dizzy);
		$criteria->compare('mood_comment',$this->mood_comment,true);
		$criteria->compare('memory_comment',$this->memory_comment,true);
		$criteria->compare('social_activity_comment',$this->social_activity_comment,true);
		$criteria->compare('sleep_disorder_comment',$this->sleep_disorder_comment,true);
		$criteria->compare('how_does_the_home_look_comment',$this->how_does_the_home_look_comment,true);
		$criteria->compare('what_citizen_can_do_comment',$this->what_citizen_can_do_comment,true);
		$criteria->compare('generally_initiative_of_citizen_comment',$this->generally_initiative_of_citizen_comment,true);
		$criteria->compare('the_degree_of_hygiene_comment',$this->the_degree_of_hygiene_comment,true);
		$criteria->compare('physical_activity_comment',$this->physical_activity_comment,true);
		$criteria->compare('fall_comment',$this->fall_comment,true);
		$criteria->compare('appetite_comment',$this->appetite_comment,true);
		$criteria->compare('thirst_comment',$this->thirst_comment,true);
		$criteria->compare('weight_comment',$this->weight_comment,true);
		$criteria->compare('feces_pattern_comment',$this->feces_pattern_comment,true);
		$criteria->compare('urination_comment',$this->urination_comment,true);
		$criteria->compare('breathing_comment',$this->breathing_comment,true);
		$criteria->compare('cough_comment',$this->cough_comment,true);
		$criteria->compare('fatigue_comment',$this->fatigue_comment,true);
		$criteria->compare('pain_comment',$this->pain_comment,true);
		$criteria->compare('dizzy_comment',$this->dizzy_comment,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('more_than_5_preparations',$this->more_than_5_preparations);
		$criteria->compare('discharged_with_medication_changes',$this->discharged_with_medication_changes);
		$criteria->compare('manages_citizen_his_daily_medication',$this->manages_citizen_his_daily_medication);
		$criteria->compare('does_citizen_take_other_medicine',$this->does_citizen_take_other_medicine);
		$criteria->compare('does_citizen_take_alternative_medicine',$this->does_citizen_take_alternative_medicine);
		$criteria->compare('are_there_old_medicine_in_cabinet',$this->are_there_old_medicine_in_cabinet);
		$criteria->compare('messages',$this->messages);

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
		$this->setColorMessage();
        if($this->isNewRecord){
            $this->created_by = Yii::app()->user->id;
            $this->date_created = new CDbExpression('NOW()');
        }
        $this->modified_by = Yii::app()->user->id;
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

    private function getContextUserId(){
        $user_id = Yii::app()->session['private_js_vars_session']['context_user_id'] ;
        if(empty($user_id)){
            $user_id = Yii::app()->user->id;
        }        
        return $user_id;
    }

	public function validateFallComment($attribute, $params){
		if(!$this->isNewRecord && ($this->fall - ChangeSchema::model()->findByPk($this->id)->fall)>0 && empty($this->fall_comment)){
			$this->addError('fall_comment', FormsModule::t('fall_comment can not be empty'));
		}
	}
	
	private function setColorMessage(){
    	$context_user_id = $this->getContextUserId();
    	$messages = array();

    	$sql ="SELECT * 
    		FROM tbl_change_schema_baseline
    		WHERE deleted =0 
    		AND assigned_user_id = :assigned_user_id";
    	$cmd = Yii::app()->db->createCommand($sql);
    	$row = $cmd->queryRow(true, array(':assigned_user_id'=>$context_user_id));
    	$noBaseine = false;
    	if(empty($row['id'])){
    		$noBaseine = true;
			$baseline = new ChangeSchemaBaseline();
			$baseline->setAttributes($this->attributes, false);
			$baseline->save(false);
			$this->color = 'green';
			
			$messages[] = FormsModule::t('Habitual mode set for "other medicine"');
			$messages[] = FormsModule::t('Habitual mode set for "Preparations"');
			$messages[] = FormsModule::t('Habitual mode set to "daily medicine"');
			$messages[] = FormsModule::t('Habitual mode set for "alternative medicine"');
			$this->messages = implode('##',$messages);
    	}
    	else{
    		$fieldValueTranslation = $this->getFieldValueTranslation();
			$baseline = $row;
			$color = array();
    		$this_wccd = explode(',', $this->what_citizen_can_do);
    		$base_wccd = explode(',', $baseline['what_citizen_can_do']);

    		$this_wccd_count = count($this_wccd);
    		$base_wccd_count = count($base_wccd);
    		if(($base_wccd_count - $this_wccd_count)> 0){
    			if(($base_wccd_count - $this_wccd_count)> 1){
    				$fieldColor = 'red';
    			}
    			elseif(($base_wccd_count - $this_wccd_count) == 1){
					$fieldColor = 'yellow';
    			}
				
				$thisTasks = array();
				foreach($this_wccd as $task){
					$thisTasks[] = FormsModule::t($fieldValueTranslation['what_citizen_can_do'][$task]);
				}
				$baseTasks = array();
				foreach($base_wccd as $task){
					$baseTasks[] = FormsModule::t($fieldValueTranslation['what_citizen_can_do'][$task]);
				}
				$color[] = $fieldColor;
				$field = 'what_citizen_can_do';
				$messages[] = FormsModule::t('field_value_changed_from_to', array(
					'{color}'=>FormsModule::t($fieldColor),
					'{field}'=>FormsModule::t($field),
					'{baseline}'=>implode(', ', $baseTasks),
					'{newvalue}'=>implode(', ', $thisTasks),
				));
			}

    		
    		
    		$fieldsWith3Option = array('mood', 'memory', 'social_activity', 'sleep_disorder',
    			'how_does_the_home_look', 'generally_initiative_of_citizen', 'the_degree_of_hygiene',
    			'physical_activity', 'fall', 'feces_pattern', 'breathing', 'cough', 'fatigue', 'pain', 'dizzy');
			
			
			
            foreach($fieldsWith3Option as $field){
				if(($this->$field - $baseline[$field]) > 1){
					$fieldColor = 'red';
					$color[] = $fieldColor;
					$messages[] = FormsModule::t('field_value_changed_from_to', array(
						'{color}'=>FormsModule::t($fieldColor),
						'{field}'=>FormsModule::t($field),
						'{baseline}'=>FormsModule::t($fieldValueTranslation[$field][$baseline[$field]]),
						'{newvalue}'=>FormsModule::t($fieldValueTranslation[$field][$this->$field]),
					));
					
				}
				else if(($this->$field - $baseline[$field] ) == 1){
					$fieldColor = 'yellow';
					$color[] = $fieldColor;
					$messages[] = FormsModule::t('field_value_changed_from_to', array(
						'{color}'=>FormsModule::t($fieldColor),
						'{field}'=>FormsModule::t($field),
						'{baseline}'=>FormsModule::t($fieldValueTranslation[$field][$baseline[$field]]),
						'{newvalue}'=>FormsModule::t($fieldValueTranslation[$field][$this->$field]),
					));
				}
				else{
					$color[] = 'green';
				}
            }
    			

    		$fieldsWith2Option = array('appetite', 'thirst', 'weight', 'urination');
            foreach($fieldsWith2Option as $field){
				if(($this->$field - $baseline[$field]) > 1){
					$fieldColor = 'yellow';
					$color[] = $fieldColor;
					$messages[] = FormsModule::t('field_value_changed_from_to', array(
						'{color}'=>FormsModule::t($fieldColor),
						'{field}'=>FormsModule::t($field),
						'{baseline}'=>FormsModule::t($fieldValueTranslation[$field][$baseline[$field]]),
						'{newvalue}'=>FormsModule::t($fieldValueTranslation[$field][$this->$field]),
					));
					
				}
				else{
					$color[] = 'green';
				}
            }
            
			if($baseline['more_than_5_preparations'] == 0 && $this->more_than_5_preparations == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen takes more than 5 preparations');
            }
            else{
				$color[] = 'green';
            }
            
			if($this->discharged_with_medication_changes == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: The citizen is discharged with medication');				
			}            
            else{
				$color[] = 'green';
            }
            
            if($baseline['manages_citizen_his_daily_medication'] == 0 && $this->manages_citizen_his_daily_medication == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: You have changed "daily medication". You also need to change the habitual state for citizen');
            }
            else if($baseline['manages_citizen_his_daily_medication'] == 1 && $this->manages_citizen_his_daily_medication == 0){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: You have changed "daily medication". You also need to change the habitual state for citizen');
            }
            else{
				$color[] = 'green';
            }

            if($baseline['does_citizen_take_other_medicine'] == 0 && $this->does_citizen_take_other_medicine == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen changed to take other medicine');
            }
            else if($baseline['does_citizen_take_other_medicine'] == 1 && $this->does_citizen_take_other_medicine == 0){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen changed to no longer taking other medication');
            }
            else{
				$color[] = 'green';
            }			


            if($baseline['does_citizen_take_alternative_medicine'] == 0 && $this->does_citizen_take_alternative_medicine == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen changed to take alternative medicine');
            }
            else if($baseline['does_citizen_take_alternative_medicine'] == 1 && $this->does_citizen_take_alternative_medicine == 0){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen changed to no longer take alternative medicine');
            }
            else{
				$color[] = 'green';
            }

            
			if($this->are_there_old_medicine_in_cabinet == 1){
				$color[] = 'red';
				$messages[] = FormsModule::t('Red: Citizen has old medicine in cabinet');
			}            
            else{
				$color[] = 'green';
            }            
            
            if(in_array('red', $color)){
				$this->color = 'red';
            }
            elseif(in_array('yellow', $color)){
				$this->color = 'yellow';
            }
            else{
				$this->color = 'green';
				$messages[] = FormsModule::t('green_everything_looks_fine');
            }

            if(count($messages)>0){
            	$this->messages = implode('##',$messages);
			}
            
    	}		
	}

	protected function afterSave(){
		if($this->getIsNewRecord()){
			$cs = ChangeSchema::model()->findByPk((int)$this->id);
			if(in_array($cs->color, array('red', 'yellow'))){
		        $user_id = Yii::app()->session['private_js_vars_session']['context_user_id'] ;
		        if(empty($user_id)){
		            $user_id = Yii::app()->user->id;
		        }
				
				$ch = new CallcenterHandled();
				$ch->handled_by = Yii::app()->user->id;
				$ch->related_to = $cs->id;
				$ch->related_type = 'ChangeSchema';
				$ch->handled = 0;
				$ch->alarm_datetime = new CDbExpression('NOW()');
				$ch->alarm_user_id = $user_id;
				$ch->state = $cs->color;
				$ch->alarm_description = 'Ændringsskema';
				$ch->save(false);			
			}
		}
		return parent::afterSave();
	}    
	
	private function getFieldValueTranslation(){
		$fieldValueTranslation = array();
		$fieldValueTranslation['mood'][1] = FormsModule::t('glad_positive');
		$fieldValueTranslation['mood'][2] = FormsModule::t('neutral');
		$fieldValueTranslation['mood'][3] = FormsModule::t('sad_negative');
		$fieldValueTranslation['memory'][1] = FormsModule::t('good');
		$fieldValueTranslation['memory'][2] = FormsModule::t('fluctuating');
		$fieldValueTranslation['memory'][3] = FormsModule::t('forgetful');
		$fieldValueTranslation['social_activity'][1] = FormsModule::t('active');
		$fieldValueTranslation['social_activity'][2] = FormsModule::t('slightly_active');
		$fieldValueTranslation['social_activity'][3] = FormsModule::t('passive');
		$fieldValueTranslation['sleep_disorder'][1] = FormsModule::t('rerely');
		$fieldValueTranslation['sleep_disorder'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['sleep_disorder'][3] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['how_does_the_home_look'][1] = FormsModule::t('very_tidy');
		$fieldValueTranslation['how_does_the_home_look'][2] = FormsModule::t('tidy');
		$fieldValueTranslation['how_does_the_home_look'][3] = FormsModule::t('less_tidy');
		$fieldValueTranslation['generally_initiative_of_citizen'][1] = FormsModule::t('very');
		$fieldValueTranslation['generally_initiative_of_citizen'][2] = FormsModule::t('slightly');
		$fieldValueTranslation['generally_initiative_of_citizen'][3] = FormsModule::t('passive');
		$fieldValueTranslation['the_degree_of_hygiene'][1] = FormsModule::t('very_groomed');
		$fieldValueTranslation['the_degree_of_hygiene'][2] = FormsModule::t('groomed');
		$fieldValueTranslation['the_degree_of_hygiene'][3] = FormsModule::t('less_groomed');
		$fieldValueTranslation['physical_activity'][1] = FormsModule::t('very_active');
		$fieldValueTranslation['physical_activity'][2] = FormsModule::t('active');
		$fieldValueTranslation['physical_activity'][3] = FormsModule::t('passive');
		$fieldValueTranslation['fall'][1] = FormsModule::t('never');
		$fieldValueTranslation['fall'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['fall'][3] = FormsModule::t('often');
		$fieldValueTranslation['feces_pattern'][1] = FormsModule::t('no_problems');
		$fieldValueTranslation['feces_pattern'][2] = FormsModule::t('sometimes_constipation');
		$fieldValueTranslation['feces_pattern'][3] = FormsModule::t('complaints');
		$fieldValueTranslation['breathing'][1] = FormsModule::t('normal');
		$fieldValueTranslation['breathing'][2] = FormsModule::t('shortness_of_breath_movement');
		$fieldValueTranslation['breathing'][3] = FormsModule::t('shortness_of_breath_rest');
		$fieldValueTranslation['cough'][1] = FormsModule::t('never');
		$fieldValueTranslation['cough'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['cough'][3] = FormsModule::t('often');
		$fieldValueTranslation['fatigue'][1] = FormsModule::t('never');
		$fieldValueTranslation['fatigue'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['fatigue'][3] = FormsModule::t('often');
		$fieldValueTranslation['pain'][1] = FormsModule::t('never');
		$fieldValueTranslation['pain'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['pain'][3] = FormsModule::t('often');
		$fieldValueTranslation['dizzy'][1] = FormsModule::t('never');
		$fieldValueTranslation['dizzy'][2] = FormsModule::t('from_time_to_time');
		$fieldValueTranslation['dizzy'][3] = FormsModule::t('often');
		$fieldValueTranslation['appetite'][1] = FormsModule::t('good');
		$fieldValueTranslation['appetite'][3] = FormsModule::t('should_be_encouraged');
		$fieldValueTranslation['thirst'][1] = FormsModule::t('good');
		$fieldValueTranslation['thirst'][3] = FormsModule::t('should_be_encouraged');
		$fieldValueTranslation['weight'][1] = FormsModule::t('keeps_weight');
		$fieldValueTranslation['weight'][3] = FormsModule::t('clothes_hanging');
		$fieldValueTranslation['urination'][1] = FormsModule::t('continent');
		$fieldValueTranslation['urination'][3] = FormsModule::t('incontinent');		
		
		$fieldValueTranslation['what_citizen_can_do'][1] = FormsModule::t('flowers');		
		$fieldValueTranslation['what_citizen_can_do'][2] = FormsModule::t('bed_linens');		
		$fieldValueTranslation['what_citizen_can_do'][3] = FormsModule::t('waste');		
		$fieldValueTranslation['what_citizen_can_do'][4] = FormsModule::t('dish');		
		$fieldValueTranslation['what_citizen_can_do'][5] = FormsModule::t('toilet_bath');		
		$fieldValueTranslation['what_citizen_can_do'][6] = FormsModule::t('flowers');		
		
		return $fieldValueTranslation;
	}
}