<?php

Yii::import('application.models._base.BaseReservationCode');

class ReservationCode extends BaseReservationCode
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function getNewId($twentyTimeStamp){
		$transaction=Yii::app()->db->beginTransaction();
		try
		{
		    //.... SQL executions OR model save()
		    $code = self::model()->find(
		    	array(
		    		'condition'=>"status = 0",
		    		'limit' => 1,
		    		'order' => 'id asc'
		    	)
		    );
		    if(count($code) > 0 || !empty($code)){
		    	$code->status = 2;
		    	$code->lock_date = $twentyTimeStamp;
		    	$code->update();
		    	$transaction->commit();
		    	return $code->reservation_id;
		    }else{
		    	$transaction->rollback();
		    	return false;
		    }
		    
		}
		catch(Exception $e) // an exception is raised if a query fails
		{
		    $transaction->rollback();
		    return false;
		}
	}
}