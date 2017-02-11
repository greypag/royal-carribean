<?php
$this->breadcrumbs = array(
    'Booking & Inventory',
    $model->label(2) => array('admin'),
        //Yii::t('app', 'Manage ' . $model->label(2)),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
        //array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
);

/*
  Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('guest-grid', {
  data: $(this).serialize()
  });
  return false;
  });
  ");
 */
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<!--<div class="search-form">
<?php
/*
  $this->renderPartial('_search', array(
  'model' => $model,
  ));
 */
?>
</div><!-- search-form -->


<div align="right" class="row">
    <?php
// Extract and put PageSize folder into extensions directory
// Place the widget just before the GridView
    $this->widget('application.extensions.PageSize.PageSize', array(
        'mGridId' => 'guest-grid', //Gridview id
        'mPageSize' => @$_GET['pageSize'],
        'mDefPageSize' => Yii::app()->params['CGridViewPagination']['defaultPageSize'],
        'mPageSizeOptions' => Yii::app()->params['CGridViewPagination']['pageSizeOptions'], // Optional, you can use with the widget default
    ));
    ?>
</div>
<?php
//echo  PromotionCode::model()->getAttributeLabel('promotion_name');
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'guest-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'guest_id',
        'title',
        'first_name',
        'last_name',
        'phone_no',
        'email',
        //'cruise_fare',
        //'tax_fees_port',
        //'discount',
        //'subtotal',
        //'assigned_room_id',
        array(
            'name' => 'assigned_room_id',
            'value' => 'CHtml::link("$data->assigned_room_id", Yii::app()->createUrl("roomInventory/view",array("id"=>$data->assigned_room_id)))',
            'type' => 'raw',
        ),
        /*
        array(
            'name' => 'irt_id',
            //'value' => 'CHtml::link("$data->irt_idz", Yii::app()->createUrl("itineraryRoomType/view",array("id"=>$data->irt_id)))',
            'value' => 'CHtml::link("$data->irt", Yii::app()->createUrl("itineraryRoomType/view",array("id"=>$data->irt_id)))',
            'type' => 'raw',
        ),
        */
        array(
            'name' => 'booking_id',
            'value' => 'CHtml::link("$data->booking_id", Yii::app()->createUrl("booking/view",array("id"=>$data->booking_id)))',
            'type' => 'raw',
        //'value' => 'GxHtml::valueEx($data->booking)',
        //'filter' => GxHtml::listDataEx(Booking::model()->findAllAttributes(null, true)),
        ),
        array(
            'name' => 'promotion_id',
            'header' => PromotionCode::model()->getAttributeLabel('promotion_name'),
            'value' => 'CHtml::link("$data->promotion", Yii::app()->createUrl("promotionCode/view",array("id"=>$data->promotion_id)))',
            'type' => 'raw',
            //'value' => 'GxHtml::valueEx($data->promotion)',
            'filter' => GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)),
        ),
        /*
          'middle_name',
          'last_name',
          'gender',
          'document_type',
          'document_number',
          'date_of_birth',
          'phone_no',
          'status',
          'email',
          'citizenship',
          'rc_global_guest_id',
          'internal_notes',
          'allow_personalData',
         */
        array(
            'class' => 'CButtonColumn', 'header' => 'Action',
            'template' => '{view}{update}',
			
        ),
    ),
));
?>