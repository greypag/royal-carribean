<?php

Yii::import('application.models._base.BaseCruise');

class Cruise extends BaseCruise
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}