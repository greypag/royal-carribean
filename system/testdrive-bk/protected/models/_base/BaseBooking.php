<?php

/**
 * This is the model base class for the table "booking".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Booking".
 *
 * Columns in table "booking" available as properties of the model,
 * followed by relations of table "booking" available as properties of the model.
 *
 * @property string $booking_id
 * @property integer $booking_time
 * @property string $ip
 * @property integer $no_of_guest
 * @property integer $total_payment
 * @property string $booking_status
 * @property string $internal_notes
 * @property integer $promotion_id
 * @property string $itinerary_id
 *
 * @property PromotionCode $promotionCode
 * @property Itinerary $itinerary
 */
abstract class BaseBooking extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'booking';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Booking|Bookings', $n);
    }

    public static function representingColumn() {
        return 'booking_id';
    }

    public function rules() {
        return array(
            array('booking_time, ip, no_of_guest, total_payment, booking_status, itinerary_id', 'required'),
            array('booking_time, no_of_guest', 'numerical', 'integerOnly' => true),
			
			array('total_payment', 'length', 'max'=>11),
            array('booking_status, itinerary_id', 'length', 'max' => 32),
            array('promotion_id', 'length', 'max' => 128),
            array('booking_id', 'length', 'max' => 255),
            array('ip', 'length', 'max' => 15),
            array('booking_id, booking_time, ip, no_of_guest, total_payment, booking_status, internal_notes, promotion_id, itinerary_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            //'guest' => array(self::HAS_MANY, 'Guest', 'guest_id'),
            'promotionCode' => array(self::BELONGS_TO, 'PromotionCode', 'promotion_id'),
            'itinerary' => array(self::BELONGS_TO, 'Itinerary', 'itinerary_id'),
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'booking_id' => Yii::t('app', 'Booking ID'),
            'booking_time' => Yii::t('app', 'Booking Time'),
            'ip' => Yii::t('app', 'IP Address'),
            'no_of_guest' => Yii::t('app', 'No. of Guests'),
            'total_payment' => Yii::t('app', 'Total Payment'),
            'booking_status' => Yii::t('app', 'Booking Status'),
            'internal_notes' => Yii::t('app', 'Internal Notes'),
            'promotion_id' => Yii::t('app', 'Promotion Description'),
            'itinerary_id' => 'Itinerary ID',
            'reservation_id' => Yii::t('app', 'Reservation ID'),
            'promotionCode' => null,
            'itinerary' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('booking_id', $this->booking_id, true);
        $criteria->compare('booking_time', $this->booking_time);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('no_of_guest', $this->no_of_guest);
        $criteria->compare('total_payment', $this->total_payment);
        $criteria->compare('booking_status', $this->booking_status, true);
        $criteria->compare('internal_notes', $this->internal_notes, true);
        $criteria->compare('promotion_id', $this->promotion_id);
        $criteria->compare('itinerary_id', $this->itinerary_id);
        $criteria->compare('reservation_id', $this->reservation_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['CGridViewPagination']['defaultPageSize']),
            ),
            'sort' => array(
                'defaultOrder' => 'booking_time DESC'
            )
        ));
    }


    protected function afterFind() {
        // convert to display format
        //$this->booking_time = Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long_time'], $this->booking_time);
        parent::afterFind();
    }

    protected function beforeValidate() {

        //$this->booking_time = CDateTimeParser::parse($this->booking_time, Yii::app()->params->dateFormat['long_time']);

        /*
          if ($this->start_date) {
          if (!$this->validate_end_date($this->end_date))
          $this->addError('end_date', 'Error Message');
          }
         */

        return parent::beforeValidate();
    }

}
