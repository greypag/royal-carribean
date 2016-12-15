<div class="wide form">

    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'booking_id'); ?>
        <?php echo $form->textField($model, 'booking_id', array('maxlength' => 32)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'booking_time'); ?>
        <?php echo $form->textField($model, 'booking_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'ip'); ?>
        <?php echo $form->textField($model, 'ip', array('maxlength' => 15)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'no_of_guest'); ?>
        <?php echo $form->textField($model, 'no_of_guest'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'total_payment'); ?>
        <?php echo $form->textField($model, 'total_payment'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'booking_status'); ?>
        <?php
        //echo $form->textField($model, 'booking_status', array('maxlength' => 32)); 

        echo $form->dropDownList($model, 'booking_status', array(
            '' => '-- Please select a booking_status --',
            'payment_in_progress' => 'Payment in progress',
            'reserved' => 'Reserved',
            'payment_confirmed' => 'Payment confirmed'
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'internal_notes'); ?>
        <?php echo $form->textArea($model, 'internal_notes'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'promotion_id'); ?>
        <?php echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'itinerary_id'); ?>
        <?php echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
    </div>

    <div class="row buttons">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
