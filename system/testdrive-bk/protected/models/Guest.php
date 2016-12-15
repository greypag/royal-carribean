<?php

Yii::import('application.models._base.BaseGuest');

class Guest extends BaseGuest
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}