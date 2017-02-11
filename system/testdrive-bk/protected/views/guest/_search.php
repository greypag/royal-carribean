<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'guest_id'); ?>
		<?php echo $form->textField($model, 'guest_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'irt_id'); ?>
		<?php echo $form->dropDownList($model, 'irt_id', GxHtml::listDataEx(ItineraryRoomType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'booking_id'); ?>
		<?php echo $form->dropDownList($model, 'booking_id', GxHtml::listDataEx(Booking::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'promotion_id'); ?>
		<?php echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'first_name'); ?>
		<?php echo $form->textField($model, 'first_name', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'middle_name'); ?>
		<?php echo $form->textField($model, 'middle_name', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'last_name'); ?>
		<?php echo $form->textField($model, 'last_name', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gender'); ?>
		<?php echo $form->textField($model, 'gender', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'document_type'); ?>
		<?php echo $form->textField($model, 'document_type', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'document_number'); ?>
		<?php echo $form->textField($model, 'document_number', array('maxlength' => 32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_of_birth'); ?>
		<?php echo $form->textField($model, 'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'phone_no'); ?>
		<?php echo $form->textField($model, 'phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'citizenship'); ?>
		<?php echo $form->textField($model, 'citizenship', array('maxlength' => 34)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cruise_fare'); ?>
		<?php echo $form->textField($model, 'cruise_fare'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'subtotal'); ?>
		<?php echo $form->textField($model, 'subtotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tax_fees_port'); ?>
		<?php echo $form->textField($model, 'tax_fees_port'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'discount'); ?>
		<?php echo $form->textField($model, 'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'assigned_room_id'); ?>
		<?php echo $form->textField($model, 'assigned_room_id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rc_global_guest_id'); ?>
		<?php echo $form->textField($model, 'rc_global_guest_id', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'internal_notes'); ?>
		<?php echo $form->textField($model, 'internal_notes', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'allow_personalData'); ?>
		<?php echo $form->textField($model, 'allow_personalData', array('maxlength' => 11)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
