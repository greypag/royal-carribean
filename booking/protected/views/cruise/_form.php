<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'cruise-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'cruise_id'); ?>
        <?php echo $form->textField($model, 'cruise_id', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'cruise_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'cruise_name'); ?>
        <?php echo $form->textField($model, 'cruise_name', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'cruise_name'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'cruise_name_tc'); ?>
        <?php echo $form->textField($model, 'cruise_name_tc', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'cruise_name_tc'); ?>
    </div><!-- row -->


    <label><?php //echo GxHtml::encode($model->getRelationLabel('roomTypes'));  ?></label>
    <?php //echo $form->checkBoxList($model, 'roomTypes', GxHtml::encodeEx(GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)), false, true)); ?>

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->