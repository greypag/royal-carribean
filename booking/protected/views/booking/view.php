<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    GxHtml::valueEx($model),
);

$this->menu = array(
    //array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
    //array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->booking_id)),
    //array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->booking_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'booking_id',
        array(
            'name' => 'booking_time',
            'type' => 'raw',
            'value' => Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $model->booking_time),
        ),
        'ip',
        'no_of_guest',
        array(
            'name' => 'total_payment',
            'type' => 'raw',
            'value' => '$'.Yii::app()->format->formatNumber($model->total_payment),
        ),
        'booking_status',
        'internal_notes',
        //'ref_code',
        'reservation_id',
        //'payment_feedback',
        array(
            'name' => 'promotionCode',
            'type' => 'raw',
            'value' => $model->promotionCode !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->promotionCode)), array('promotionCode/view', 'id' => GxActiveRecord::extractPkValue($model->promotionCode, true))) : 'Not Applicable',
        ),
        array(
            'name' => 'itinerary',
            'type' => 'raw',
            'value' => $model->itinerary !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->itinerary)), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue($model->itinerary, true))) : 'Not Applicable',
        ),
    ),
));
?>


<?php
$model_guests = Guest::model();
$criteria = new CDbCriteria;
$criteria->compare('booking_id', $id);
//$criteria->with = array('promotion' => array('with' => 'promotion'));
$criteria->with = array('promotion');
//$criteria->compare('promotion.promotion_id', $this->tableA_name, true);
//$criteria->distinct = true;
//$criteria->together = true;
$dataProvider = new CActiveDataProvider(
        get_class($model_guests), array(
    'criteria' => $criteria,
        )
);


//CVarDumper::dump($dataProvider, 10, true);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'guest-grid',
    'dataProvider' => $dataProvider,
    //'filter' => $model_guests,
    'columns' => array(
        array(
            'name' => 'guest_id',
            'value' => 'CHtml::link("$data->guest_id", Yii::app()->createUrl("guest/view",array("id"=>$data->guest_id)))',
            'type' => 'raw',
        ),
        array(
            'name' => 'promotion_name',
            'value' => 'empty($data->promotion) ? CHtml::link("$data->promotion", Yii::app()->createUrl("promotionCode/view",array("id"=>$data->promotion_id))) : "---"',
            //'value' => '$data->promotion->promotion_name',
            'type' => 'raw',
        //'value' => 'GxHtml::valueEx($data->promotion)',
        ),
        'title',
        'first_name',
        'cruise_fare',
        'tax_fees_port',
        'discount',
        'subtotal',
        array(
            'name' => 'assigned_room_id',
            'value' => 'CHtml::link("$data->assigned_room_id", Yii::app()->createUrl("roomInventory/view",array("id"=>$data->assigned_room_id)))',
            'type' => 'raw',
        ), /*
      array(
      'name' => 'irt_id',
      'value' => 'CHtml::link("$data->irt_id", Yii::app()->createUrl("itineraryRoomType/view",array("id"=>$data->irt_id)))',
      'type' => 'raw',
      ), */
    ),
));
?>