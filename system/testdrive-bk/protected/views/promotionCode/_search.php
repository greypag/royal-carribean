<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'promotion_id'); ?>
		<?php echo $form->textField($model, 'promotion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'promotion_name'); ?>
		<?php echo $form->textField($model, 'promotion_name', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'promotion_code'); ?>
		<?php echo $form->textField($model, 'promotion_code', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start_date'); ?>
		<?php echo $form->textField($model, 'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'end_date'); ?>
		<?php echo $form->textField($model, 'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'figure_per_guest'); ?>
		<?php echo $form->textField($model, 'figure_per_guest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'quota'); ?>
		<?php echo $form->textField($model, 'quota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accumulate_quota'); ?>
		<?php echo $form->textField($model, 'accumulate_quota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'internal_notes'); ?>
		<?php echo $form->textArea($model, 'internal_notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'non_pricing_notes'); ?>
		<?php echo $form->textArea($model, 'non_pricing_notes'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
