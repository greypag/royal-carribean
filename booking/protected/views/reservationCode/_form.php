
<?php
//public static registerScript(string $id, string $script, integer $position=NULL, array $htmlOptions=array ( ))
Yii::app()->clientScript->registerScript('search', "
        
    var button = $('input#importStep1'), interval;
    
    $.ajax_upload(button, {
        action : uploadActionPath,
        name : 'myfile',
        onComplete : function(self, response) {
            //this.enable();
            //console.log(response);
            alert('File: ' + self + ' update successfully! \\n' + response);
        },
        onError : function(file, ext) {
            //this.disable();
            //alert(file);
            //console.log('efg');
        }
      
    });

");
?>
<div>
    <div style="float:right;   padding: 5px 10px;   background-color: rgb(226, 228, 255); margin-right: 10px;">
        <?php //echo CHtml::button(Yii::t('importcsvModule.importcsv', 'Select CSV File'), array("id" => "importStep1")); ?>
        <?php echo CHtml::button(Yii::t('importcsv', 'Select CSV File'), array("id" => "importStep1")); ?>
    </div>
    <br style="clear:both;"/>
</div>

<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'reservation-code-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'reservation_id'); ?>
        <?php echo $form->textField($model, 'reservation_id'); ?>
        <?php echo $form->error($model, 'reservation_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php //echo $form->textField($model, 'status', array('maxlength' => 32)); ?>
        <?php echo $form->dropDownList($model, 'status', array('0' => 'available', '1' => 'used')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model,'create_date'); ?>
        <?php //echo $form->textField($model, 'create_date'); ?>
        <?php //echo $form->error($model,'create_date');  ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model,'update_date'); ?>
        <?php //echo $form->textField($model, 'update_date'); ?>
        <?php //echo $form->error($model,'update_date');  ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->