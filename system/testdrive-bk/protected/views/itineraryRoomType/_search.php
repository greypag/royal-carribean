<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'irt_id'); ?>
		<?php echo $form->textField($model, 'irt_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'itinerary_id'); ?>
		<?php echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_id'); ?>
		<?php echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cruise_id'); ?>
		<?php echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fare_guest1_2'); ?>
		<?php echo $form->textField($model, 'fare_guest1_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fare_guest3_4'); ?>
		<?php echo $form->textField($model, 'fare_guest3_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'start_date'); ?>
		<?php echo $form->textField($model, 'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'end_date'); ?>
		<?php echo $form->textField($model, 'end_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
