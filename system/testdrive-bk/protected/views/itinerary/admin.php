<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */

$this->breadcrumbs = array(
    //'Itineraries' => array('index'),
    'Itineraries',
    Yii::t('app', 'Manage ' . $model->label(2)),
        //'Manage',
);

$this->menu = array(
    array('label' => 'List of Itineraries', 'url' => array('index')),
    array('label' => 'Create an Itinerary', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#itinerary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Itineraries</h1>

<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<!--<div class="search-form" style="display:none"> -->
<?php
/*
  $this->renderPartial('_search', array(
  'model' => $model,
  ));
 */
?>
<!--</div> search-form -->
<div align="right" class="row">
    <?php
// Extract and put PageSize folder into extensions directory
// Place the widget just before the GridView
    $this->widget('application.extensions.PageSize.PageSize', array(
        'mGridId' => 'itinerary-grid', //Gridview id
        'mPageSize' => @$_GET['pageSize'],
        'mDefPageSize' => Yii::app()->params['CGridViewPagination']['defaultPageSize'],
        'mPageSizeOptions' => Yii::app()->params['CGridViewPagination']['pageSizeOptions'], // Optional, you can use with the widget default
    ));
    ?>
</div>
<?php
//CVarDumper::dump($model->search(), 10, true);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'itinerary-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
    'columns' => array(
        //'cruise_id',
        array(
            'name' => 'cruise_id',
            'header' => Cruise::model()->getAttributeLabel('cruise_name'),
            'value' => 'CHtml::link("$data->cruise", Yii::app()->createUrl("cruise/view",array("id"=>$data->cruise_id)))',
            'filter' => GxHtml::listDataEx(Cruise::model()->findAll(), 'cruise_id', array('cruise_id', 'cruise_name')),
            'type' => 'raw',
        ),
        'itinerary_id',
        'itinerary_name',
        //'days_nights_full_desc',
        //'days_nights_short_desc',
        'minimum_cruise_fares',
        //'pdf',
        array(
            'name' => 'start_date',
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
        /*
          'taxes_fee',
          'port_expenses',
          'prepaid_gratuties',
          'ncff',
          'image',
          'language',
          'start_date',
          'end_date',
         */
        array(
            'class' => 'CButtonColumn', 
            'header' => 'Action',
            'template' => '{view}{update}{delete}',
            'buttons' => array
                (
                'view' => array
                    (
                    //'label' => 'Send an e-mail to this user',
                    //'imageUrl' => Yii::app()->request->baseUrl . '/images/email.png',
                    'url' => 'Yii::app()->createUrl("/booking/stepone/id/".$data->itinerary_id)',
                    'options' => array("target" => "_blank"),
                //'url' => 'Yii::app()->createUrl("itineraryRoomType/update", array("id"=>$data->irt_id))',
                ),
                'update' => array
                    (
                    'url' => 'Yii::app()->createUrl("itinerary/update/id/".$data->itinerary_id)',
                //'visible' => '$data->irt_id > 0',
                //'click' => 'function(){alert("Going down!");}',
                ),
                'delete' => array
                    (
                    'url' => 'Yii::app()->createUrl("itinerary/delete/id/".$data->itinerary_id)',
                //'visible' => '$data->irt_id > 0',
                //'click' => 'function(){alert("Going down!");}',
                ),
            ),
        ),
    ),
));
?>
