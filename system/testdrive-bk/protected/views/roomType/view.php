<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->sys_rt_id)),
    array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->sys_rt_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'rt_id',
        array(
            'name' => 'cruise',
            'type' => 'raw',
            'value' => $model->cruise !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->cruise)), array('cruise/view', 'id' => GxActiveRecord::extractPkValue($model->cruise, true))) : null,
        ),
        'rt_name',
        'rt_name_tc',
        array(
            'name' => 'rt_des',
            'type' => 'raw',
        ),
        array(
            'name' => 'rt_des_tc',
            'type' => 'raw',
        ),
        'rt_capacity',
        array(
            'name' => 'room_image',
            'type' => 'raw',
            'value' => (!(is_null($model->room_image)) && !(trim($model->room_image) === '')) ? CHtml::image( $model->room_image, "image", array(
                        'style' => 'height: 200px',
                    )) : null,
            /*
            'value' => (!(is_null($model->room_image)) && !(trim($model->room_image) === '')) ? CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $model->room_image, "image", array(
                        'style' => 'height: 200px',
                    )) : null,
             */
        ),
    //'language',
    ),
));
?>

