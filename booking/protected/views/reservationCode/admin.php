<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
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
	$.fn.yiiGridView.update('reservation-code-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<!--
<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button'));  ?>
<!--
<div class="search-form">
<?php
/*
  $this->renderPartial('_search', array(
  'model' => $model,
  ));
 */
?>
</div> -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reservation-code-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'reservation_id',
        array(
            'name' => 'status',
            'header' => Cruise::model()->getAttributeLabel('status'),
            //'value' => '(empty($data->status)) ? "Available" : ($data->status == 2) ? "Locked" : "Used"',
            'value' => array($model,'renderStatus'),
           // 'filter' => GxHtml::listDataEx(Cruise::model()->findAll(), 'cruise_id', array('cruise_id', 'cruise_name')),
            'filter' => array('0' => 'available', '2' => 'locked', '1' => 'used'),
            'type' => 'raw',
        ),
        //'create_date',
        'update_date',
        'lock_date',
        array(
            'class' => 'CButtonColumn', 'header' => 'Action'
        ),
    ),
));
?>