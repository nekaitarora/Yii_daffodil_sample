<?php

class AcuteModule extends CWebModule
{
	public $filesDir;
	public $sizeLimit;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'acute.models.*',
			'acute.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

    public static function t($str='',$params=array(), $dic='acute') {
        if (Yii::t("AcuteModule", $str)==$str){
            return Yii::t("AcuteModule.".$dic, $str, $params);
		}
        else{
            return Yii::t("AcuteModule", $str, $params);
		}
    }  	
}
