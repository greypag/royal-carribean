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

    public $start_date;
	public $end_date;
	public $port_of_departure;
	public $ports_of_calls;
	public $port_of_boarding;
	public $cruise_id;
	public $rt_id;
	public $rt_name;

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
            array('rt_id, rt_name, start_date, end_date, booking_id, port_of_departure, ports_of_calls, port_of_boarding, cruise_id, booking_time, ip, no_of_guest, total_payment, booking_status, internal_notes, promotion_id, itinerary_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            //'guest' => array(self::HAS_MANY, 'Guest', 'guest_id'),
            'promotionCode' => array(self::BELONGS_TO, 'PromotionCode', 'promotion_id'),
            'itinerary' => array(self::BELONGS_TO, 'Itinerary', 'itinerary_id'),
			'room_inventory' => array(self::BELONGS_TO, 'RoomInventory', '', 'foreignKey' => array('reservation_id'=>'reservation_code')),
			'room_type'=>array(self::BELONGS_TO, 'RoomType', array('rt_id'=>'sys_rt_id'), 'through'=>'room_inventory')
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'booking_id' => Yii::t('app', 'Booking ID'),
            // 'booking_date' => Yii::t('app', 'Booking Date'),
            'booking_time' => Yii::t('app', 'Booking Time'),
            'ip' => Yii::t('app', 'IP Address'),
            'no_of_guest' => Yii::t('app', 'No. of Guests'),
            'total_payment' => Yii::t('app', 'Total Payment'),
            'booking_status' => Yii::t('app', 'Booking Status'),
            'internal_notes' => Yii::t('app', 'Internal Notes'),
            'promotion_id' => Yii::t('app', 'Promotion Description'),
            'reservation_id' => Yii::t('app', 'Reservation ID'),
			'itinerary_id' => 'Itinerary Code',
			'rt_id' => Yii::t('app', 'Stateroom Cat ID'),
            'start_date' => Yii::t('app', 'Departure Date'),
            'end_date' => Yii::t('app', 'Arrival Date'),
            'port_of_departure' => Yii::t('app', 'Port Of Departure'),
            'ports_of_calls' => Yii::t('app', 'Ports Of Calls'),
            // 'port_of_boarding' => Yii::t('app', 'Port Of Boarding'),
            'cruise_id' => Yii::t('app', 'Ship Code'),
            'promotionCode' => null,
            'itinerary' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('t.booking_id', $this->booking_id, true);
        // $criteria->compare('t.booking_time', $this->booking_date);
        $criteria->compare('t.booking_time', $this->booking_time);
        $criteria->compare('t.ip', $this->ip, true);
        $criteria->compare('t.no_of_guest', $this->no_of_guest);
        $criteria->compare('t.total_payment', $this->total_payment);
        $criteria->compare('t.booking_status', $this->booking_status, true);
        $criteria->compare('t.internal_notes', $this->internal_notes, true);
        $criteria->compare('t.promotion_id', $this->promotion_id);
        $criteria->compare('t.itinerary_id', $this->itinerary_id);
        $criteria->compare('t.reservation_id', $this->reservation_id);

        // $criteria->together = true;
		$criteria->with = array( 'itinerary','room_inventory','room_type' );
		$criteria->compare('itinerary.start_date', $this->start_date);
		$criteria->compare('itinerary.end_date', $this->end_date);
		$criteria->compare('itinerary.port_of_departure', $this->port_of_departure);
		$criteria->compare('itinerary.ports_of_calls', $this->ports_of_calls);
		$criteria->compare('itinerary.cruise_id', $this->cruise_id);

		$criteria->compare('room_type.rt_id', $this->rt_id);
		$criteria->compare('room_type.rt_name', $this->rt_name);

        $dataProvider =new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['CGridViewPagination']['defaultPageSize']),
            ),
            'sort' => array(
                'defaultOrder' => 'booking_time DESC',
                'attributes'=>array(
		            'attributes' => array(
				        '*', 'start_date', 'end_date', 'port_of_departure', 'ports_of_calls', 'port_of_boarding', 'cruise_id', 'rt_id', 'rt_name',
				    ),
		        ),
            )
        ));
		return $dataProvider;
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
