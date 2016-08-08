<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model, 'cruise_id'); ?>
		<?php echo $form->textField($model, 'cruise_id', array('maxlength' => 12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cruise_name'); ?>
		<?php echo $form->textField($model, 'cruise_name', array('maxlength' => 32)); ?>
	</div>


	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
