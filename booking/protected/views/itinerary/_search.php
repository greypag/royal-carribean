<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>


    <div class="row">
        <?php echo $form->label($model, 'cruise_id'); ?>
        <?php echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAll(), 'cruise_id', array('cruise_id', 'cruise_name')), array('prompt' => Yii::t('app', 'All'))); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'itinerary_id'); ?>
        <?php echo $form->textField($model, 'itinerary_id', array('size' => 12, 'maxlength' => 12)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'itinerary_id'); ?>
        <?php echo $form->textField($model, 'itinerary_id', array('size' => 12, 'maxlength' => 12)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'itinerary_name'); ?>
        <?php echo $form->textField($model, 'itinerary_name', array('size' => 32, 'maxlength' => 32)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'days_nights_full_desc'); ?>
        <?php echo $form->textField($model, 'days_nights_full_desc', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'days_nights_short_desc'); ?>
        <?php echo $form->textField($model, 'days_nights_short_desc', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'minimum_cruise_fares'); ?>
        <?php echo $form->textField($model, 'minimum_cruise_fares'); ?>
    </div>


    <div class="row">
        <?php echo $form->label($model, 'start_date'); ?>
        <?php
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
    </div>

    <div class="row">
        <?php echo $form->label($model, 'end_date'); ?>
        <?php
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
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->