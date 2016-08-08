<?php
$this->breadcrumbs = array(
    //$model->label(2) => array('admin'),
    //Yii::t('app', 'Manage'),
    Yii::t('app', 'Itineraries'),
    Yii::t('app', 'Manage ' . $model->label(2)),
);

$this->menu = array(
    //array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
);

/*
  Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('promotion-code-grid', {
  data: $(this).serialize()
  });
  return false;
  });
  ");
 */
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>


<?php //echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button'));  ?>
<!--<div class="search-form">
<?php
/*
  $this->renderPartial('_search', array(
  'model' => $model,
  ));
 */
?>
</div><!-- search-form -->

<?php
/*
  $this->widget('zii.widgets.grid.CGridView', array(
  'id' => 'promotion-code-grid',
  'dataProvider' => $model->search(),
  'filter' => $model,
  'columns' => array(
  'promotion_id',
  'promotion_name',
  'promotion_code',
  'start_date',
  'end_date',
  'type',
  'quota',
  'accumulate_quota',
  'figure_per_guest',
  'quota',
  'accumulate_quota',
  'internal_notes',
  'non_pricing_notes',
  array(
  'class' => 'CButtonColumn', 'header' => 'Action'
  ),
  ),
  ));

 */


$this->widget('ext.EExcelView', array(
    "summaryText" => false,
    'title' => 'RCC-PromotionRecord(' . date("Y-m-d") . ')',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'promotion_id',
        'promotion_name',
        'promotion_name_tc',
        'promotion_code',
        'start_date',
        'end_date',
        //'type',
        'quota',
        'accumulate_quota',
        /*
          'figure_per_guest',
          'quota',
          'accumulate_quota',
          'internal_notes',
          'non_pricing_notes',
         */
        array(
            'class' => 'CButtonColumn', 'header' => 'Action'
        ),
    ),
    //'itemsCssClass' => 'table table-striped',
    'template' => "{summary}\n{items}\n{exportbuttons}\n{pager}",
        //'htmlOptions' => array("class" => "report_grid_view report_grid_portlet_view")
        )
);
?>

