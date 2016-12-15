<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	$model->label(2),
	Yii::t('app', 'Manage '. $model->label(2)),
);

$this->menu = array(
		//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cruise-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
 */
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'cruise-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'cruise_id',
		'cruise_name',
		'cruise_name_tc',
		array(
			'class' => 'CButtonColumn', 'header' => 'Action'
		),
	),
)); ?>