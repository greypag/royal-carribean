<?php
$this->breadcrumbs = array(
    'Booking & Inventory',
    $model->label(2) => array(''),
    Yii::t('app', 'Manage ' . $model->label(2)),
);

$this->menu = array(
    //array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'All') . ' ' . $model->label(), 'url' => array('admin')),
    array('label' => Yii::t('app', 'Available') . ' ' . $model->label(), 'url' => array('admin?status=available')),
    array('label' => Yii::t('app', 'Payment successful') . ' ' . $model->label(), 'url' => array('admin?status=payment_successful')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-inventory-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?><img class="tooltips" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/get_info.png" width="18" height="18" title="You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.">

<div class="search-form" style="display: none;">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<div>
    <?php
    echo CHtml::link('<span style="
    padding: 5px 10px;
    background-color: rgb(226, 228, 255);
    display: inline-block;
  margin-top: 10px;
      
"<span>Unlock Expired Rooms</span>', Yii::app()->createUrl('roomInventory/serviceUnlockExpriedRooms'));
//, array('style' => 'display: block;')
    ?>
</div>

<div align="right" class="row">
    <?php
// Extract and put PageSize folder into extensions directory
// Place the widget just before the GridView
    $this->widget('application.extensions.PageSize.PageSize', array(
        'mGridId' => 'roomInventory-grid', //Gridview id
        'mPageSize' => @$_GET['pageSize'],
        'mDefPageSize' => Yii::app()->params['CGridViewPagination']['defaultPageSize'],
        'mPageSizeOptions' => Yii::app()->params['CGridViewPagination']['pageSizeOptions'], // Optional, you can use with the widget default
    ));
    ?>
</div>
<?php

$this->widget('ext.EExcelView', array(
    'id' => 'roomInventory-grid',
    'title' => 'RCC-StateroomRecord(' . date("Y-m-d") . ')',
    "summaryText" => false,
    'dataProvider' => $model->search(),
    'filter' => $model,
    //'itemsCssClass' => 'table table-striped',
    'columns' => array(
        //'room_inventory_id',
        'room_no',
        array(
            'name' => 'itinerary_id',
            'type' => 'raw',
            'value' => function($data) {
				
				if(! empty( $data->itinerary)){
					return '<b>' . $data->itinerary->itinerary_id . '</b>:<br/>' . $data->itinerary->itinerary_name;
				}
            },
            //'value' => 'GxHtml::valueEx($data->itinerary)',
            //'filter' => GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)),
            'filter' => GxHtml::listDataEx(Itinerary::model()->findAll(), 'itinerary_id', array('itinerary_id', 'itinerary_name'))
        ),
        array(
            'name' => 'rt_id',
            'type' => 'raw',
            'value' => function($data) {
                return '<b>' . $data->rt->rt_id . '</b>:<br/>' . $data->rt->rt_name;
            },
            //'value' => '<b>$data->rt->rt_id."</b>: ". $data->rt->rt_name',
            //'value' => 'GxHtml::valueEx($data->rt)',
            //'filter' => GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)),
            'filter' => GxHtml::listDataEx(RoomType::model()->findAll(), 'sys_rt_id', array('rt_id', 'rt_name')),
            'htmlOptions' => array('width' => '80px'),
        ),
        //'update_time',
        array(
            'name' => 'update_time',
            //'value' => '$data->update_time'
            'header' => null,
            'value' => '($data->update_time == 0)? "" : Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"],  $data->update_time)',
        ),
        'booking_ip',
        'reservation_code',
        array(
            'name' => 'status',
            'value' => '$data->status',
            'filter' => array('available' => 'available', 'locked' => 'locked', 'payment_successful' => 'payment_successful'),
            'htmlOptions' => array('width' => '60px'),
        ),
        /*
          'status',
          'notes',
         */
        array(
            'class' => 'CButtonColumn', 'header' => 'Action'
        ),
    ),
    'template' => "{summary}\n{items}\n{exportbuttons}\n{pager}",
        //'htmlOptions' => array("class" => "report_grid_view report_grid_portlet_view")
        )
);
?>