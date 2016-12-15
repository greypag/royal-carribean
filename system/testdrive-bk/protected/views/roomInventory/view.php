<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    GxHtml::valueEx($model),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->room_inventory_id)),
    array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->room_inventory_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
/*
CVarDumper::dump($model->rt, 10, true);
CVarDumper::dump($model->rt->rt_name, 10, true);
*/
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'room_inventory_id',
        array(
            'name' => 'itinerary',
            'type' => 'raw',
            'value' => $model->itinerary !== null ? GxHtml::link(GxHtml::encode($model->itinerary->itinerary_id. ': '. $model->itinerary->itinerary_name), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue($model->itinerary, true))) : null,
        //    'value' => $model->itinerary !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->itinerary)), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue($model->itinerary, true))) : null,
        ),
        array(
            'name' => 'rt',
            'type' => 'raw',
            'value' => $model->rt !== null ? GxHtml::link(GxHtml::encode($model->rt->rt_id. ': '. $model->rt->rt_name), array('roomType/view', 'id' => GxActiveRecord::extractPkValue($model->rt, true))) : null,
            //'value' => $model->rt !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->rt)), array('roomType/view', 'id' => GxActiveRecord::extractPkValue($model->rt, true))) : null,
        ),
        'room_no',
        array(
            'name' => 'update_time',
            'value' => Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $model->update_time)
        ),
        'booking_ip',
        'reservation_code',
        'status',
        'notes',
    ),
));
?>

