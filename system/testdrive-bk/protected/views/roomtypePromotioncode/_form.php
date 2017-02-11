<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'roomtype-promotioncode-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'promotion_id'); ?>
		<?php echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'promotion_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'rt_id'); ?>
		<?php echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'rt_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->