<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->promotion_id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->promotion_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'promotion_id',
'promotion_name',
'promotion_name_tc',
'promotion_code',
'start_date',
'end_date',
'type',
'figure_per_guest',
'ccf_discount_1_type',
'flexible_discount_ccf_1',
'ccf_discount_2_type',
'flexible_discount_ccf_2',
'ccf_discount_3_type',
'flexible_discount_ccf_3',
'ccf_discount_4_type',
'flexible_discount_ccf_4',
'nccf_discount_1_type',
'flexible_discount_nccf_1',
'nccf_discount_2_type',
'flexible_discount_nccf_2',
'nccf_discount_3_type',
'flexible_discount_nccf_3',
'nccf_discount_4_type',
'flexible_discount_nccf_4',
'quota',
'accumulate_quota',
'internal_notes',
'non_pricing_notes',
	),
)); ?>

