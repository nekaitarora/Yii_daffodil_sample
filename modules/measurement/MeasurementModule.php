<?php

class MeasurementModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'measurement.models.*',
		));
	}

	public static function t($str='',$params=array(),$dic='measurement') {
        if (Yii::t("MeasurementModule", $str)==$str)
            return Yii::t("MeasurementModule.".$dic, $str, $params);
        else
            return Yii::t("MeasurementModule", $str, $params);
    } 
}
