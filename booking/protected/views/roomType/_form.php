<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'room-type-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'rt_id'); ?>
        <?php echo $form->textField($model, 'rt_id', array('maxlength' => 32)); ?>
        <?php echo $form->error($model, 'rt_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'cruise_id'); ?>
        <?php
        //CVarDumper::dump(   GxHtml::listDataEx(Cruise::model()->findAllAttributes(null, true),'cruise_id'), 10, true);
        echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes(array('cruise_id', 'cruise_name'), true), 'cruise_id', array('cruise_id', 'cruise_name')));
        //echo $form->dropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes('cruise_name', true)));
        ?>
        <?php echo $form->error($model, 'cruise_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'rt_capacity'); ?>
        <?php echo $form->textField($model, 'rt_capacity'); ?>
        <?php echo $form->error($model, 'rt_capacity'); ?>
    </div><!-- row -->
    <div class="row">
        <table>
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'rt_name'); ?>
                        <?php echo $form->textField($model, 'rt_name', array('maxlength' => 64)); ?>
                        <?php echo $form->error($model, 'rt_name'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'rt_name_tc'); ?>
                        <?php echo $form->textField($model, 'rt_name_tc', array('maxlength' => 64)); ?>
                        <?php echo $form->error($model, 'rt_name_tc'); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'rt_des'); ?>
        <?php //echo $form->textArea($model, 'rt_des'); ?>
        <?php
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'rt_des');
        ?>
        <?php echo $form->error($model, 'rt_des'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'rt_des_tc'); ?>
        <?php //echo $form->textArea($model, 'rt_des'); ?>
        <?php
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'rt_des_tc');
        ?>
        <?php echo $form->error($model, 'rt_des_tc'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'room_image'); ?>
        <?php echo $form->hiddenField($model, 'room_image'); ?>

        <?php
        //CVarDumper::dump(  $this, 10, true);
        Yii::app()->royalCaribbeanHelper->echo_AjaxFileUpload('RoomType', 'image', 'room_image');

        if (!(is_null($model->room_image)) && !(trim($model->room_image) === '')) {
            echo CHtml::image($model->room_image, "image", array(
                'style' => 'height: 200px',
                'class'=> 'image'
            ));
            /*
              echo CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $model->room_image, "image", array(
              'style' => 'height: 200px',
              ));
             */
        }
        ?> 
        <?php echo $form->error($model, 'room_image'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'language');   ?>
        <?php //echo $form->dropDownList($model, 'language', array('en' => 'English', 'tc' => '中文')); ?>
        <?php //echo $form->error($model, 'language'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->