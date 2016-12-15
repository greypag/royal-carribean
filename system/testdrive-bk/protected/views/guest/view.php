<?php

$this->breadcrumbs = array(
	$model->label(2) => array('admin'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->guest_id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->guest_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'guest_id',
array(
			'name' => 'irt',
			'type' => 'raw',
			'value' => $model->irt !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->irt)), array('itineraryRoomType/view', 'id' => GxActiveRecord::extractPkValue($model->irt, true))) : null,
			),
array(
			'name' => 'booking',
			'type' => 'raw',
			'value' => $model->booking !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->booking)), array('booking/view', 'id' => GxActiveRecord::extractPkValue($model->booking, true))) : null,
			),
array(
			'name' => 'promotion',
			'type' => 'raw',
			'value' => $model->promotion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->promotion)), array('promotionCode/view', 'id' => GxActiveRecord::extractPkValue($model->promotion, true))) : null,
			),
'title',
'first_name',
'middle_name',
'last_name',
'gender',
'document_type',
'document_number',
'date_of_birth',
'phone_no',
'email',
'citizenship',
'cruise_fare',
'subtotal',
'tax_fees_port',
'discount',
'status',
'assigned_room_id',
'rc_global_guest_id',
'internal_notes',
'allow_personalData',
	),
)); ?>

