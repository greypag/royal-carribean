<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'booking-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'booking_id'); ?>
        <?php echo $form->textField($model, 'booking_id', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'booking_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'booking_time'); ?>
        <?php echo $form->textField($model, 'booking_time'); ?>
        <?php echo $form->error($model, 'booking_time'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'ip'); ?>
        <?php echo $form->textField($model, 'ip', array('maxlength' => 15)); ?>
        <?php echo $form->error($model, 'ip'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'no_of_guest'); ?>
        <?php echo $form->textField($model, 'no_of_guest'); ?>
        <?php echo $form->error($model, 'no_of_guest'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'total_payment'); ?>
        <?php echo $form->textField($model, 'total_payment'); ?>
        <?php echo $form->error($model, 'total_payment'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'booking_status'); ?>
        <?php echo $form->textField($model, 'booking_status', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'booking_status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'internal_notes'); ?>
        <?php
        //echo $form->textArea($model, 'internal_notes'); 
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'internal_notes',
            // Optional config
            'compressorRoute' => 'tinyMce/compressor',
            //'spellcheckerUrl' => array('tinyMce/spellchecker'),
            // or use yandex spell: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
            //'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
            'fileManager' => array(
                'class' => 'ext.elFinder.TinyMceElFinder',
                'connectorRoute' => 'admin/elfinder/connector',
            ),
            'htmlOptions' => array(
                'rows' => 6,
                'cols' => 60,
            ),
        ));
        ?>
        <?php echo $form->error($model, 'internal_notes'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'promotion_id'); ?>
        <?php
        //echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)));
        echo $form->hiddenField($model, 'promotion_id');
        ?>
        <?php //echo $form->error($model, 'promotion_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'itinerary_id'); ?>
        <?php
        //echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)));
        echo $form->hiddenField($model, 'itinerary_id');
        ?>
        <?php //echo $form->error($model, 'itinerary_id'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->