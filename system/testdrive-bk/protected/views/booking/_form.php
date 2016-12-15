<style>
    div.form label {
        display: inline;
    }
</style>
<div class="form">


    <?php
//CVarDumper::dump($model_guests, 10, true);
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'booking-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <table style="margin: 34px 0px 0px 0px;">
        <tbody>
            <tr>
                <td><?php echo $form->label($model, 'booking_id'); ?>: <?php echo $model->booking_id; ?></td>
                <td><?php echo $form->label($model, 'booking_time'); ?>: <?php echo Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat["long_time"], $model->booking_time); ?></td>
                <td><?php echo $form->label($model, 'ip'); ?>: <?php echo $model->ip; ?></td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'ref_code'); ?>: <?php echo $model->ref_code; ?> 
                </td>
                <td colspan="2">
                    <?php echo $form->labelEx($model, 'reservation_id'); ?>: <?php echo $model->reservation_id; ?> 
                </td>
            </tr>
            <tr>
                <td><br/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'no_of_guest'); ?>: <?php echo $model->no_of_guest; ?></td>
                <td><?php echo $form->label($model, 'total_payment'); ?>: $<?php echo Yii::app()->format->formatNumber($model->total_payment); ?></td>
                <td><?php echo $form->label($model, 'booking_status'); ?>: <?php
                    //echo $model->booking_status;
                    echo $form->dropDownList($model, 'booking_status', array(
                        /*
                          'payment_in_progress' => 'Payment in progress',
                          'reserved' => 'Reserved',
                          'payment_confirmed' => 'Payment confirmed',
                         */
                        'payment_successful' => 'Payment successful',
                        'payment_confirmed' => 'Payment confirmed',
                    )); /* array('disabled' => 'disabled') */
                    ?></td>
            </tr>
        </tbody>
    </table>



    <?php
    $model_guests = Guest::model();
    $criteria = new CDbCriteria;
    $criteria->compare('booking_id', $model->booking_id);
    //$criteria->with = array('promotion' => array('with' => 'promotion'));
    $criteria->with = array('promotion');
    //$criteria->compare('promotion.promotion_id', $this->tableA_name, true);
    //$criteria->distinct = true;
    //$criteria->together = true;

    $dataProvider = new CActiveDataProvider(
            get_class($model_guests), array(
        'criteria' => $criteria,
            )
    );


    //CVarDumper::dump($dataProvider, 10, true);
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'guest-grid',
        'dataProvider' => $dataProvider,
        //'filter' => $model_guests,
        'columns' => array(
            array(
                'name' => 'guest_id',
                'value' => 'CHtml::link("$data->guest_id", Yii::app()->createUrl("guest/view",array("id"=>$data->guest_id)))',
                'type' => 'raw',
            ),
            array(
                'name' => 'promotion_name',
                'value' => 'empty($data->promotion) ? CHtml::link("$data->promotion", Yii::app()->createUrl("promotionCode/view",array("id"=>$data->promotion_id))) : "---"',
                //'value' => '$data->promotion->promotion_name',
                'type' => 'raw',
            //'value' => 'GxHtml::valueEx($data->promotion)',
            ),
            'title',
            'first_name',
            'cruise_fare',
            'tax_fees_port',
            'discount',
            'subtotal',
        /*
          array(
          'name' => 'assigned_room_id',
          'value' => 'CHtml::link("$data->assigned_room_id", Yii::app()->createUrl("roomInventory/view",array("id"=>$data->assigned_room_id)))',
          'type' => 'raw',
          ),
          array(
          'name' => 'irt_id',
          'value' => 'CHtml::link("$data->irt_id", Yii::app()->createUrl("itineraryRoomType/view",array("id"=>$data->irt_id)))',
          'type' => 'raw',
          ), */
        ),
    ));
    ?>



    <div class="row">
        <?php echo $form->labelEx($model, 'internal_notes'); ?>
        <?php
        //echo $form->textArea($model, 'internal_notes'); 
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'internal_notes');
        ?>
        <?php echo $form->error($model, 'internal_notes'); ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'promotion_id');      ?>
        <?php
        //echo $form->dropDownList($model, 'promotion_id', GxHtml::listDataEx(PromotionCode::model()->findAllAttributes(null, true)));
        echo $form->hiddenField($model, 'promotion_id');
        ?>
        <?php //echo $form->error($model, 'promotion_id');  ?>
    </div><!-- row -->
    <div class="row">
        <?php //echo $form->labelEx($model, 'itinerary_id');      ?>
        <?php
        //echo $form->dropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAllAttributes(null, true)));
        echo $form->hiddenField($model, 'itinerary_id');
        ?>
        <?php //echo $form->error($model, 'itinerary_id');  ?>
    </div><!-- row -->


    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div><!-- form -->