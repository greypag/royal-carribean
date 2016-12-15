<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage '. $model->label(2)),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<!--
<div class="search-form">
<?php
/*
  $this->renderPartial('_search', array(
  'model' => $model,
  ));
 */
?>
</div><!-- search-form -->

<?php
//CVarDumper::dump(CHtml::listData(Cruise::model()->findAll(), 'cruise_id', 'cruise_name'));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'room-type-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'cruise_id',
            'header'=> Cruise::model()->getAttributeLabel('cruise_name'),
            'value' => 'GxHtml::valueEx($data->cruise)',
            //'filter' => CHtml::listData(Cruise::model()->findAll(), 'cruise_id', 'cruise_name'),
            'filter' => GxHtml::listDataEx(Cruise::model()->findAllAttributes(array('cruise_id','cruise_name'), true), 'cruise_id', array('cruise_id','cruise_name')),
        ),
        'rt_id',
        'rt_name',
        array('name' => 'rt_des', 'type' => 'raw'),
        'rt_capacity',
        /*
          'room_image',
          'language',
         */
        array(
            'class' => 'CButtonColumn', 'header' => 'Action'
        ),
    ),
));
?>