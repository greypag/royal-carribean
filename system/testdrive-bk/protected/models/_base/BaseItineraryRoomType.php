<?php

/**
 * This is the model base class for the table "itinerary_room_type".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ItineraryRoomType".
 *
 * Columns in table "itinerary_room_type" available as properties of the model,
 * followed by relations of table "itinerary_room_type" available as properties of the model.
 *
 * @property integer irt_id
 * @property string $itinerary_id
 * @property string $rt_id
 * @property string $cruise_id
 * @property integer $fare_guest1_2
 * @property integer $fare_guest3_4
 * @property integer $start_date
 * @property integer $end_date
 *
 * @property Itinerary[] $itineraries
 * @property RoomType $rt
 * @property Itinerary $itinerary
 * @property RoomType $cruise
 */
abstract class BaseItineraryRoomType extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'itinerary_room_type';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'ItineraryRoomType|ItineraryRoomTypes', $n);
    }

    public static function representingColumn() {
        return 'itinerary_id';
    }

    public function rules() {
        return array(
            array('itinerary_id, rt_id, cruise_id, fare_guest1_2, fare_guest3_4', 'required'),
            //array('itinerary_id, rt_id, cruise_id, fare_guest1_2, fare_guest3_4, start_date, end_date', 'required'),
            array('itinerary_id', 'UniqueAttributesValidator', 'with' => 'rt_id,cruise_id', 'message' => 'Same relation is existed!'),
            array('fare_guest1_2, fare_guest3_4', 'numerical', 'integerOnly' => true, 'min'=> 0),
            array('itinerary_id, rt_id, cruise_id', 'length', 'max' => 32),
            array('irt_id, itinerary_id, rt_id, cruise_id, fare_guest1_2, fare_guest3_4', 'safe', 'on' => 'search'),
            //array('irt_id, itinerary_id, rt_id, cruise_id, fare_guest1_2, fare_guest3_4, start_date, end_date', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'itineraries' => array(self::HAS_MANY, 'Itinerary', 'itinerary_id'),
            'itinerary' => array(self::BELONGS_TO, 'Itinerary', 'itinerary_id'),
            'rt' => array(self::BELONGS_TO, 'RoomType', 'rt_id'),
            'cruise' => array(self::BELONGS_TO, 'RoomType', 'cruise_id'),
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'irt_id' => Yii::t('app', 'Irt_ID'),
            'itinerary_id' => null,
            'rt_id' => Yii::t('app', 'Room ID'),
            'cruise_id' => Yii::t('app', 'Cruise ID'),
            'fare_guest1_2' => Yii::t('app', 'Fare of Guest 1&2'),
            'fare_guest3_4' => Yii::t('app', 'Fare of Guest 3&4'),
            //'start_date' => Yii::t('app', 'Start Date'),
            //'end_date' => Yii::t('app', 'End Date'),
            'itineraries' => null,
            'rt' => null,
            'itinerary' => null,
            'cruise' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('irt_id', $this->irt_id);
        $criteria->compare('itinerary_id', $this->itinerary_id);
        $criteria->compare('rt_id', $this->rt_id);
        $criteria->compare('cruise_id', $this->cruise_id);
        $criteria->compare('fare_guest1_2', $this->fare_guest1_2);
        $criteria->compare('fare_guest3_4', $this->fare_guest3_4);
        //$criteria->compare('start_date', $this->start_date);
        //$criteria->compare('end_date', $this->end_date);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterFind() {
        // convert to display format
        //$this->start_date = Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $this->start_date);
        //$this->end_date = Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $this->end_date);

        parent::afterFind();
    }

    /*
      protected function beforeValidate() {
      // convert to storage format
      $this->start_date =  Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $this->start_date);
      $this->end_date =  Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['long'], $this->end_date);

      return parent::beforeValidate();
      }
     */
}
