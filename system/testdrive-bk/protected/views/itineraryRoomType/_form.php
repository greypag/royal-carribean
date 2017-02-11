<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'itinerary-room-type-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true), 'itinerary_id'), array('style' => 'display: none')); ?>
    <?php echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true), 'rt_id'), array('style' => 'display: none')); ?>
    <?php echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes(null, true), 'cruise_id'), array('style' => 'display: none')); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'fare_guest1_2'); ?>
        <?php echo $form->textField($model, 'fare_guest1_2'); ?>
        <?php echo $form->error($model, 'fare_guest1_2'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'fare_guest3_4'); ?>
        <?php echo $form->textField($model, 'fare_guest3_4'); ?>
        <?php echo $form->error($model, 'fare_guest3_4'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'start_date'); ?>
        <?php
        //echo $form->dateField($model, 'start_date');
        if ($model->start_date === false)
            $model->start_date = '';

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'start_date',
            'options' => array(
                'changeMonth' => true,
                'changeYear' => true,
                'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                //'minDate' => '+1d', //day can choose >= tomorrow
            ),
        ));
        ?>
        <?php echo $form->error($model, 'start_date'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'end_date'); ?>
        <?php
        //echo $form->dateField($model, 'end_date');
        if ($model->end_date === false)
            $model->end_date = '';

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'end_date',
            'options' => array(
                'changeMonth' => true,
                'changeYear' => true,
                'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                //'minDate' => '+1d', //day can choose >= tomorrow
            ),
        ));
        ?>
        <?php echo $form->error($model, 'end_date'); ?>
    </div><!-- row -->

    <label><?php //echo GxHtml::encode($model->getRelationLabel('itineraries')); ?></label>
    <?php //echo $form->checkBoxList($model, 'itineraries', GxHtml::encodeEx(GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)), false, true)); ?>
    <?php //echo $form->radioButtonList($model, 'itinerary_id', GxHtml::encodeEx(GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true), 'itinerary_id'), false, true)); ?>

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->