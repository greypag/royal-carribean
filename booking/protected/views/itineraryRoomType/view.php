<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

/*
$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    //array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->irt_id)),
    array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->irt_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
*/
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php

//CVarDumper::dump(GxHtml::encode(GxHtml::valueEx($model->rt_id)) , 10, true);

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'irt_id',
        array(
            'name' => 'itinerary_id',
            'type' => 'raw',
            'value' => $model->itinerary_id !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model, 'itinerary_id')), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue(Itinerary::model(), true))) : null,
        ),
        array(
            'name' => 'rt_id',
            'type' => 'raw',
            'value' => $model->rt_id !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model, 'rt_id')), array('roomType/view', 'id' => GxActiveRecord::extractPkValue(RoomType::model(), true))) : null, //->find('rt_id="'.$model->rt_id.'"' Sai
        ),
        array(
            'name' => 'cruise_id',
            'type' => 'raw',
            'value' => $model->cruise_id !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model, 'cruise_id')), array('cruise/view', 'id' => GxActiveRecord::extractPkValue(Cruise::model(), true))) : null,
        ),
        'fare_guest1_2',
        'fare_guest3_4',
        'start_date',
        'end_date',
    ),
));
?>

<h2><?php //echo GxHtml::encode($model->getRelationLabel('itineraries')); ?></h2>
<?php

echo GxHtml::openTag('ul');
foreach ($model->itineraries as $relatedModel) {
    echo GxHtml::openTag('li');
    echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
    //echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('itinerary/view', 'id' => GxActiveRecord::extractPkValue(Itinerary::model(), true)));
    echo GxHtml::closeTag('li');
}
echo GxHtml::closeTag('ul');
?>