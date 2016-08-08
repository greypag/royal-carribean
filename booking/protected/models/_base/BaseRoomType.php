<?php

/**
 * This is the model base class for the table "room_type".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RoomType".
 *
 * Columns in table "room_type" available as properties of the model,
 * followed by relations of table "room_type" available as properties of the model.
 *
 * @property integer $id
 * @property string $cruise_id
 * @property string $rt_id
 * @property string $rt_name
 * @property string $rt_des
 * @property integer $rt_capacity
 * @property string $room_image
 * @property string $language
 *
 * @property Cruise $cruise
 */
abstract class BaseRoomType extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'room_type';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Stateroom Cat.|Stateroom Cats.', $n);
    }

    public static function representingColumn() {
        return 'rt_id';
    }

    public function rules() {
        return array(
            array('cruise_id, rt_id, rt_name, rt_name_tc, rt_des, rt_des_tc, rt_capacity, room_image', 'required'),
            array('rt_id', 'UniqueAttributesValidator', 'with' => 'cruise_id', 'message' => 'This Room type ID is already in Cruise ID!'),
            array(
                'rt_id',
                'match', 'pattern' => '/^\S*$/',
                'message' => 'No space allowed in Room type ID.',
            ),
            //array('rt_id', 'unique', 'className' => 'RoomType',
            //    'attributeName' => 'rt_id',
            //    'message' => 'This Roomtype ID is already in use!'),
            array('rt_capacity', 'numerical', 'integerOnly' => true),
            array('rt_id, cruise_id', 'length', 'max' => 32),
            array('rt_name, rt_name_tc',  'length','max' => 64),
            array('room_image', 'length', 'max' => 255),
            array('cruise_id, rt_id, rt_name, rt_name_tc, rt_des, rt_des_tc, rt_capacity, room_image', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'cruise' => array(self::BELONGS_TO, 'Cruise', 'cruise_id'),
            //'rt' => array(self::HAS_MANY, 'ItineraryRoomType', 'rt_id'),
            'rt' => array(self::HAS_MANY, 'ItineraryRoomType', 'sys_rt_id'),
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'cruise_id' => Yii::t('app', 'Cruise ID'),
            'rt_id' => Yii::t('app', 'Stateroom Cat. ID'),
            'rt_name' => Yii::t('app', 'Stateroom'),
            'rt_name_tc' => Yii::t('app', 'Stateroom (Traditional Chinese)'),
            'rt_des' => Yii::t('app', 'Stateroom Cat. Desc.'),
            'rt_des_tc' => Yii::t('app', 'Stateroom Cat. (Traditional Chinese)'),
            'rt_capacity' => Yii::t('app', 'Capacity'),
            'room_image' => Yii::t('app', 'Room Type Image'),
            'cruise' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('cruise_id', $this->cruise_id);
        $criteria->compare('rt_id', $this->rt_id, true);
        $criteria->compare('rt_name', $this->rt_name, true);
        $criteria->compare('rt_des', $this->rt_des, true);
        $criteria->compare('rt_name_tc', $this->rt_name, true);
        $criteria->compare('rt_des_tc', $this->rt_des, true);
        $criteria->compare('rt_capacity', $this->rt_capacity);
        $criteria->compare('room_image', $this->room_image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'create_time DESC',
            )
        ));
    }
    
    protected function afterFind() {
        /*
        CVarDumper::dump($this->scenario, 10, true);
        if ( $this->scenario != 'delete_update' ){
         */
            $this->room_image = Yii::app()->getBaseUrl(true) . '/' . $this->room_image;
        //}
        parent::afterFind();
    }

    protected function beforeValidate() {
        
        $this->room_image = str_replace(Yii::app()->getBaseUrl(true) . '/', '', $this->room_image);
        return parent::beforeValidate();
    }
}
