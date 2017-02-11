

<?php
//public static registerScript(string $id, string $script, integer $position=NULL, array $htmlOptions=array ( ))
Yii::app()->clientScript->registerScript('search', "
        $('#queryString_btn').click(function (event) {

            //event.preventDefault();
            roomInventory_itinerary_id = $('#RoomInventory_itinerary_id').val();
            roomInventory_rt_id = $('#RoomInventory_rt_id').val();
            
                
            if( roomInventory_itinerary_id === '' ||  roomInventory_rt_id === '' ){
                event.preventDefault();
                alert('Please select a itinerary and room type first!'); 
            }else{
                
                href = $(this).attr('data-defaultLink') + '?itinerary_id=' + roomInventory_itinerary_id + '&rt_id=' + roomInventory_rt_id;
                
                $(this).attr('href', href);
                //console.log(href);
            }
        });
        
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

<div class="form">
    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'room-inventory-form',
        'enableAjaxValidation' => false,
    ));
    ?>


    <div>
        <p class="note"  style="float:left">
            <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
        </p>



        <div style="float:right;   padding: 5px 10px;   background-color: rgb(226, 228, 255);">
            <?php
            echo CHtml::link('Excel Template Download', Yii::app()->createUrl('roomInventory/serviceDownloadTemplate'), array('id' => 'queryString_btn', 'target' => '_blank', 'data-defaultLink' => Yii::app()->createUrl('roomInventory/serviceDownloadTemplate')))
            ?>
        </div>
        <div style="float:right;   padding: 5px 10px;   background-color: rgb(226, 228, 255); margin-right: 10px;">
            <?php //echo CHtml::button(Yii::t('importcsvModule.importcsv', 'Select CSV File'), array("id" => "importStep1")); ?>
            <?php echo CHtml::button(Yii::t('importcsv', 'Select CSV File'), array("id" => "importStep1")); ?>
        </div>
        <br style="clear:both;"/>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'itinerary_id'); ?>
        <?php
        echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(array('itinerary_id', 'itinerary_name'), true), 'itinerary_id', array('itinerary_id', 'itinerary_name')), array(
            'prompt' => 'Select an itinerary',
            'ajax' => array(
                'type' => 'POST',
                'url' => Yii::app()->createUrl('Itinerary/ServiceLoadAvailableRoomID'), //or $this->createUrl('loadcities') if '$this' extends CController
                'update' => '#RoomInventory_rt_id', //or 'success' => 'function(data){...handle the data in the way you want...}',
                'data' => array('itinerary_id' => 'js:this.value'),
            ))
        );
        ?>
        <?php echo $form->error($model, 'itinerary_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'rt_id'); ?>
        <?php
        //echo $model->rt_id;
        ?>
        <?php
        //echo $form->dropDownList($model, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true)), array(
        $data_roomType = array();
        if (!$model->isNewRecord) {

            $data_roomType = GxHtml::listDataEx(RoomType::model()->findAllAttributes(null, true));
            //$data_roomType = GxHtml::listDataEx(RoomType::model()->findAllAttributes(array('rt_id', 'rt_name'), true));


            foreach ($data_roomType as $label => &$title) {
                $roomType = RoomType::model()->find('rt_id=:rt_id', array(':rt_id' => $title));
				//CVarDumper::dump($roomType);
                //$title = $label . ': ' .$roomType->rt_name;
                $title = $roomType->rt_id . ': ' .$roomType->rt_name;
            }
        }
        echo $form->dropDownList($model, 'rt_id', $data_roomType, array(
            'empty' => '-- Please select an itinerary --')
        );
        ?>
        <?php echo $form->error($model, 'rt_id'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'room_no'); ?>
        <?php echo $form->textField($model, 'room_no', array('maxlength' => 64)); ?>
        <?php echo $form->error($model, 'room_no'); ?>
    </div><!-- row -->
    <div class="row">

        <?php
        if (!$model->isNewRecord && is_null($model->update_time)) {
            echo $form->labelEx($model, 'update_time');
            echo Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $model->update_time);
            //echo $form->textField($model, 'update_time', array('readonly' => true));
            //echo $form->textField($model, 'update_time', array('readonly' => true));
            //echo $form->textField($model, 'update_time', array('readonly' => true,  'value' => Yii::app()->getDateFormatter( )->format(Yii::app()->params->dateFormat["long_time"], $model->update_time)));
            //echo $form->error($model, 'update_time');
        }
        ?>
    </div><!-- row -->
    <div class="row">

        <?php
        if (!$model->isNewRecord && is_null($model->booking_ip)) {
            echo $form->labelEx($model, 'booking_ip');
            echo $model->booking_ip;
            //echo $form->textField($model, 'booking_ip', array('readonly' => true));
            //echo $form->error($model, 'booking_ip');
        }
        ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('available' => 'available', 'payment_successful' => 'payment_successful')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'reservation_code'); ?>
        <?php echo $form->textField($model, 'reservation_code', array('maxlength' => 20)); ?>
        <?php echo $form->error($model, 'reservation_code'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'notes'); ?>
        <?php
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'notes');
        ?>
        <?php echo $form->error($model, 'notes'); ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->