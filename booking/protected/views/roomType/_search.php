<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model, 'cruise_id'); ?>
		<?php echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_id'); ?>
		<?php echo $form->textField($model, 'rt_id', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_name'); ?>
		<?php echo $form->textField($model, 'rt_name', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_des'); ?>
		<?php echo $form->textArea($model, 'rt_des'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_capacity'); ?>
		<?php echo $form->textField($model, 'rt_capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'room_image'); ?>
		<?php echo $form->textField($model, 'room_image', array('maxlength' => 255)); ?>
	</div>


	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
