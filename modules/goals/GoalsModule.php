<?php
class GoalsModule extends CWebModule{
    public function init(){
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'goals.models.*',
        ));        
    }    
    
    public static function t($str='',$params=array(),$dic='goals') {
        if (Yii::t("GoalsModule", $str)==$str)
            return Yii::t("GoalsModule.".$dic, $str, $params);
        else
            return Yii::t("GoalsModule", $str, $params);
    }        
}