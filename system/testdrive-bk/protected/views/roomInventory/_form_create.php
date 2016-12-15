

<?php
//public static registerScript(string $id, string $script, integer $position=NULL, array $htmlOptions=array ( ))

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
                $title = $label . ': ' . $roomType->rt_name;
            }
        }
        echo $form->dropDownList($model, 'rt_id', $data_roomType, array(
            'empty' => '-- Please select an itinerary --')
        );
        ?>
        <?php echo $form->error($model, 'rt_id'); ?>
    </div><!-- row -->
    <div class="row">

        <?php
        if ($model->isNewRecord) {
            //echo $form->labelEx($model, 'booking_ip');
            //echo $model->booking_ip;

            echo CHtml::activeLabel($model, 'quantity');
            echo $form->textField($model, 'quantity');
            echo $form->error($model, 'quantity');
            //echo CHtml::textField('RoomInventory[quantity]');
        }
        ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->