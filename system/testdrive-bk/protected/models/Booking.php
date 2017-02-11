<?php

Yii::import('application.models._base.BaseBooking');

class Booking extends BaseBooking
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}