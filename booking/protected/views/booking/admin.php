<?php
$this->breadcrumbs = array(
    'Booking & Inventory',
    $model->label(2) => array('admin'),
        //Yii::t('app', 'Manage ' .  $model->label(2)),
);


/*

  2015-07-08 (原本我地係用log file, 但佢地唔鐘意。)
  $files = CFileHelper::findFiles(Yii::app()->basePath . DIRECTORY_SEPARATOR . "../upload/log");
  $menuList = array();
  foreach ($files as $file) {

  //CVarDumper::dump($file, 10, true);
  //CVarDumper::dump(Yii::app()->getBaseUrl(true). DIRECTORY_SEPARATOR . "upload/log/". basename($file), 10, true);
  //echo CHtml::link(basename($file), Yii::app()->getBaseUrl(true). DIRECTORY_SEPARATOR . "upload/log/". basename($file));
  $menuList = array(
  'label' => basename($file),
  'url' => Yii::app()->getBaseUrl(true) . DIRECTORY_SEPARATOR . "upload/log/" . basename($file),
  'linkOptions' => array('target' => '_blank')
  );
  }
 */
$menuList = array(
    'label' => 'Log records',
    'url' => array('log/admin'),
        //'linkOptions' => array('target' => '_blank')
);




//CVarDumper::dump($menuList, 10, true);
$this->menu = array($menuList);
/*
  $this->menu = array(
  //array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
  //array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
  );
 */








Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('booking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
//CVarDumper::dump(Yii::app()->getBaseUrl(true). DIRECTORY_SEPARATOR . "upload/log", 10, true);
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<img class="tooltips" src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/get_info.png" width="18" height="18" title="You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.">
<div class="search-form" style="display: none;">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->


<div align="right" class="row">
    <?php
// Extract and put PageSize folder into extensions directory
// Place the widget just before the GridView
    $this->widget('application.extensions.PageSize.PageSize', array(
        'mGridId' => 'booking-grid', //Gridview id
        'mPageSize' => @$_GET['pageSize'],
        'mDefPageSize' => Yii::app()->params['CGridViewPagination']['defaultPageSize'],
        'mPageSizeOptions' => Yii::app()->params['CGridViewPagination']['pageSizeOptions'], // Optional, you can use with the widget default
    ));
    ?>
</div>
<?php
/*
  $this->widget('zii.widgets.grid.CGridView', array(
  'id' => 'booking-grid',
  'dataProvider' => $model->search(),
  'filter' => $model,
  'columns' => array(
  'booking_id',
  //'booking_time',
  array(
  'name' => 'booking_time',
  'value' => 'Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $data->booking_time)',
  ),
  'ip',
  'no_of_guest',
  'total_payment',
  array(
  'name' => 'booking_status',
  'value' => '$data->booking_status',
  'filter' => array(
  'payment_in_progress' => 'Payment in progress',
  'on_hold' => 'On hold',
  'payment_confirmed' => 'Payment confirmed',
  )
  ),
  array(
  'name' => 'promotion_id',
  'value' => 'GxHtml::valueEx($data->promotionCode)',
  'filter' => GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)),
  ),
  array(
  'class' => 'CButtonColumn',
  ),
  ),
  ));
 */
//CVarDumper::dump(date("Y-m-d"), 10, true);
//http://www.yiiframework.com/extension/eexcelview/#hh0
$this->widget('ext.EExcelView', array(
    'id' => 'booking-grid',
    'title' => 'RCC-BookingRecord(' . date("Y-m-d") . ')',
    "summaryText" => false,
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'ref_code',
        'booking_id',
        array(
            'name' => 'booking_time',
            'value' => 'Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $data->booking_time)',
        ),
        'ip',
        'no_of_guest',
        'total_payment',
        array(
            'name' => 'booking_status',
            'value' => '$data->booking_status',
            'filter' => array(
                //'payment_in_progress' => 'Payment in progress',
                'payment_successful' => 'Payment successful',
                'payment_confirmed' => 'Payment confirmed',
            )
        ),
        'reservation_id',
        array(
            'name' => 'promotion_id',
            'value' => 'GxHtml::valueEx($data->promotionCode)',
            'filter' => GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)),
        ),
        array(
            'name'=>'itinerary_id',
            'value'=>'GxHtml::valueEx($data->itinerary)',
            'filter'=>GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)),
        ),
        // array(
        //     'name' => 'rt_id',
        //     'value'=> '$data->room_type ? $data->room_type->rt_id: "-"' ,
        // ),
        // array(
        //     'name' => 'rt_name',
        //     'value'=> '$data->room_type ? $data->room_type->rt_name: "-"' ,
        // ),
        array(
            'name' => 'rt_id',
            'type' => 'raw',
            'value' => function($data) {
                return '<b>' . ( $data->room_type ? $data->room_type->rt_id : '-' )  . '</b>:<br/>' . ( $data->room_type ? $data->room_type->rt_name : '-' );
            },
            'filter' => GxHtml::listDataEx(RoomType::model()->findAll(), 'rt_id', array('rt_id', 'rt_name')),
            'htmlOptions' => array('width' => '80px'),
        ),
        // array(
        //     'name' => 'start_date',
        //     'value' => '$data->itinerary->start_date',
        // ),
        // array(
        //     'name' => 'end_date',
        //     'value' => '$data->itinerary->end_date',
        // ),
        // array(
        //     'name' => 'start_date',
        //     'value' => '$data->itinerary ? Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $data->itinerary->start_date) : "-"',
        // ),
        // array(
        //     'name' => 'end_date',
        //     'value' => '$data->itinerary ? Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $data->itinerary->end_date) : "-"',
        // ),
        array(
            'name' => 'start_date',
            'value' => '$data->itinerary ? $data->itinerary->start_date : "-"',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'start_date',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_start_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(// (#3)
                    'showOn' => 'focus',
                    'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                //'showButtonPanel' => true,
                )
                    ), true), // (#4)
        ),
        array(
            'name' => 'end_date',
            'value' => '$data->itinerary ? $data->itinerary->end_date : "-"',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'end_date',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_end_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(// (#3)
                    'showOn' => 'focus',
                    'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                //'showButtonPanel' => true,
                )
                    ), true), // (#4)
        ),
        array(
            'name' => 'port_of_departure',
            'value'=> '$data->itinerary ? $data->itinerary->port_of_departure: "-"' ,
        ),
        array(
            'name' => 'ports_of_calls',
            'value'=> '$data->itinerary ? $data->itinerary->ports_of_calls: "-"' ,
        ),
        // array(
        //     'name' => 'port_of_boarding',
        //     'value'=> '$data->itinerary ? $data->itinerary->port_of_boarding: "-"' ,
        // ),
        array(
            'name' => 'cruise_id',
            'value'=> '$data->itinerary ? $data->itinerary->cruise_id: "-"' ,
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Action',
            'template' => '{view}{update}',
			),
    ),
    //'itemsCssClass' => 'table table-striped',
    'template' => "{summary}\n{items}\n{exportbuttons}\n{pager}",
        //'htmlOptions' => array("class" => "report_grid_view report_grid_portlet_view")
        )
);
echo CHtml::link('Download Excel report for RCC', array('booking/DownloadExcel'));
?>
