<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
        //array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('itinerary-room-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?><img class="tooltips" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/get_info.png" width="18" height="18" title="You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.">

<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'itinerary-room-type-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'irt_id',
        array(
            'name' => 'itinerary_id',
            'value' => 'GxHtml::valueEx($data->itinerary)',
            'filter' => GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)),
        ),
        array(
            'name' => 'rt_id',
            'value' => 'GxHtml::valueEx($data->rt)',
            'filter' => GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)),
        ),
        /*
          array(
          'name'=>'cruise_id',
          'value'=>'GxHtml::valueEx($data->cruise)',
          'filter'=>GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)),
          ),
         */
        'fare_guest1_2',
        'fare_guest3_4',
        /*
          'start_date',
          'end_date',
         */
        array(
            'class' => 'CButtonColumn', 'header' => 'Action'
        ),
    ),
));
?>