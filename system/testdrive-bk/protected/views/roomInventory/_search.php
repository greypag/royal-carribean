<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'room_inventory_id'); ?>
		<?php echo $form->textField($model, 'room_inventory_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'itinerary_id'); ?>
		<?php echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAll(), 'itinerary_id', array('itinerary_id','itinerary_name')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rt_id'); ?>
		<?php //echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All')));
                echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAll(), 'rt_id', array('rt_id','rt_name')), array('prompt' => Yii::t('app', 'All'))); 
                ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'room_no'); ?>
		<?php echo $form->textField($model, 'room_no', array('maxlength' => 64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_time'); ?>
		<?php echo $form->textField($model, 'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'booking_ip'); ?>
		<?php echo $form->textField($model, 'booking_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php 
                echo $form->dropDownList($model, 'status', array('available' => 'available', 'reserved' => 'reserved'));
                //echo $form->textField($model, 'status', array('maxlength' => 32)); 
                ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model, 'reservation_code'); ?>
		<?php echo $form->textField($model, 'reservation_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'notes'); ?>
		<?php echo $form->textArea($model, 'notes'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
