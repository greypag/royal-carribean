
<h2>Room Price table</h2>
<hr>
<?php
//CVarDumper::dump($itinereayRoomTypeModel->attributes, 10, true);
?>
<?php
//CVarDumper::dump($data_itinereayRoomTypeModel, 10, true);
$ori_itinereayRoomTypeModel = $itinereayRoomTypeModel;
$nowTimeStamp = strtotime("now");

/*
  $data_itinereayRoomTypeModels_RoomID_Array = array();
  foreach ($data_itinereayRoomTypeModels as $key => $data_itinereayRoomTypeModel) {
  array_push($data_itinereayRoomTypeModels_RoomID_Array, $data_itinereayRoomTypeModel->rt_id);
  }
 */

foreach ($roomTypeModels as $key => $roomTypeModel) {

    $isNewRecord = true;
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'itinerary-room-type-form' . $key,
        //'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            //'action'=>Yii::app()->createUrl('/itineraryRoomType/update'),
    ));


    foreach ($data_itinereayRoomTypeModels as $data_itinereayRoomTypeModel) {

        
        if ($data_itinereayRoomTypeModel->rt_id == $roomTypeModel->sys_rt_id) {

            $isNewRecord = false;
            $itinereayRoomTypeModel = $data_itinereayRoomTypeModel;
        }
    }

    if ($isNewRecord) {

        $itinereayRoomTypeModel = $ori_itinereayRoomTypeModel;
    }
    /*
      if (!is_null($data_itinereayRoomTypeModels[$key])) {
      //if (in_array($roomTypeModel->rt_id, $data_itinereayRoomTypeModels_RoomID_Array)) {

      $itinereayRoomTypeModel = $data_itinereayRoomTypeModels[$key];
      $isNewRecord = false;
      //$ir_id = $roomTypeModel->rt_id;
      //CVarDumper::dump($itinereayRoomTypeModel, 10, true);
      } else {
      $itinereayRoomTypeModel = $ori_itinereayRoomTypeModel;
      $isNewRecord = true;
      }
     */
    ?>
    <table>
        <tbody>
            <tr>
                <!-- <th width="100"></th> -->
                <th width="400"></th>
                <th width="140"></th>
                <th width="140"></th>
                <th width=""></th>
            </tr>
            <tr>
                <td >
                    <?php
                    echo $form->hiddenField($itinereayRoomTypeModel, 'cruise_id', array('value' => $roomTypeModel->attributes['cruise_id']));
                    /*
                      echo $form->dropDownList(
                      $itinereayRoomTypeModel, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAllAttributes(null, true), 'cruise_id'), array('options' => array($roomTypeModel->attributes['cruise_id'] => array('selected' => true)))
                      );
                     */

                    echo $form->hiddenField($itinereayRoomTypeModel, 'itinerary_id', array('value' => $itinerary_id));
                    echo $form->hiddenField($itinereayRoomTypeModel, 'irt_id', array('value' => $itinereayRoomTypeModel->irt_id));
                    echo $form->hiddenField($itinereayRoomTypeModel, 'rt_id', array('value' => $roomTypeModel->sys_rt_id));
                    ?>

                    <?php echo $form->labelEx($itinereayRoomTypeModel, 'rt_id');
                    ?> 
                    <?php
                    echo $form->dropDownList(
                            $itinereayRoomTypeModel, 'rt_id', GxHtml::listDataEx(RoomType::model()->findAllAttributes(array('rt_id', 'rt_name'), true), 'sys_rt_id', array('rt_id', 'rt_name')), array('disabled' => 'disabled', 'options' => array($roomTypeModel->sys_rt_id => array('selected' => true)))
                    );
                    //echo $form->textField($itinereayRoomTypeModel, 'rt_id',array('readonly'=>true));
                    ?>
                </td><!-- row -->
                <td >
                    <?php echo $form->labelEx($itinereayRoomTypeModel, 'fare_guest1_2'); ?>
                    <?php echo $form->textField($itinereayRoomTypeModel, 'fare_guest1_2'); ?>
                    <?php echo $form->error($itinereayRoomTypeModel, 'fare_guest1_2'); ?>
                </td><!-- row -->
                <td >
                    <?php echo $form->labelEx($itinereayRoomTypeModel, 'fare_guest3_4'); ?>
                    <?php echo $form->textField($itinereayRoomTypeModel, 'fare_guest3_4'); ?>
                    <?php echo $form->error($itinereayRoomTypeModel, 'fare_guest3_4'); ?>
                </td><!-- row -->
                <?php
                /*
                  echo $form->labelEx($itinereayRoomTypeModel, 'start_date');

                  if ($itinereayRoomTypeModel->start_date === false)
                  $itinereayRoomTypeModel->start_date = '';

                  echo $form->textField($itinereayRoomTypeModel, 'start_date', array(
                  'class' => 'date',
                  'id' => 'start_date' . $key . '_' . $nowTimeStamp
                  )
                  );
                  echo $form->error($itinereayRoomTypeModel, 'start_date');
                 */
                ?>
                <?php
                /*
                  echo $form->labelEx($itinereayRoomTypeModel, 'end_date');
                  //echo $form->dateField($roomTypeModel, 'end_date');
                  if ($itinereayRoomTypeModel->end_date === false)
                  $itinereayRoomTypeModel->end_date = '';


                  echo $form->textField($itinereayRoomTypeModel, 'end_date', array(
                  'class' => 'date',
                  'id' => 'end_date' . $key . '_' . $nowTimeStamp
                  )
                  );
                  echo $form->error($itinereayRoomTypeModel, 'end_date');
                 */
                ?>
                <td>
                    <?php
                    //echo GxHtml::submitButton(Yii::t('app', 'Save'));
                    //echo CHtml::ajaxSubmitButton("Update data", CController::createUrl('itinerary/ServiceSetRoomTypePrice'), array('update' => '#itinerary-from-price-' . $i));
                    //echo CHtml::ajaxSubmitButton("ajax", CController::createUrl('itinerary/ServiceSetRoomTypePrice', array('formID'=> 'itinerary-room-type-form' . $i)), array('update' => '#itinerary-room-type-form' . $i ));

                    $temp_url = $isNewRecord ? 'ServiceCreateRoomTypePrice' : 'ServiceUpdateRoomTypePrice';
                    $temp_createUpdate = $isNewRecord ? 'Create' : 'Update';
                    echo CHtml::ajaxSubmitButton($temp_createUpdate, CController::createUrl('itinerary/' . $temp_url, array('formID' => 'itinerary-room-type-form' . $key)), array(
                        'type' => 'POST',
                        'dataType' => 'json',
                        'success' => 'js:function(data){
                        //console.log(data);
                        if(data.result==="Error"){
                             $.each(data.details, function( index ) {
                                 $(data.formID).find(  "input[name=\'" + data.formPrefix + "["+ index +"]\']" ).siblings(".errorMessage").html($(this)[0]).show();
                                 //console.log(  $(this)[0] );
                                 //console.log( $(data.formID).find(  "input[name=\'" + data.formPrefix + "["+ index +"]\']" ));
                               });
                        }else if( data.result === "success"){
                            alert("Update successful!.");
                             $(data.formID).find(".errorMessage").hide();
                        }
                     }'
                            ), array(
                        'id' => 'btn_' . $key . '_submit_' . $nowTimeStamp,
                        'style' => 'float:left;'
                    ));
                    ?>
                    <?php
                    //echo GxHtml::submitButton(Yii::t('app', 'Save'));
                    //echo CHtml::ajaxSubmitButton("Update data", CController::createUrl('itinerary/ServiceSetRoomTypePrice'), array('update' => '#itinerary-from-price-' . $i));
                    //echo CHtml::ajaxSubmitButton("ajax", CController::createUrl('itinerary/ServiceSetRoomTypePrice', array('formID'=> 'itinerary-room-type-form' . $i)), array('update' => '#itinerary-room-type-form' . $i ));

                    if (!$isNewRecord) {

                        echo CHtml::ajaxSubmitButton('Delete', CController::createUrl('itinerary/ServiceDeleteRoomTypePrice', array('formID' => 'itinerary-room-type-form' . $key)), array(
                            'type' => 'POST',
                            'dataType' => 'json',
                            'success' => 'js:function(data){
                        //console.log(data);
                        if(data.result==="Error"){
                             $.each(data.details, function( index ) {
                                 $(data.formID).find(  "input[name=\'" + data.formPrefix + "["+ index +"]\']" ).siblings(".errorMessage").html($(this)[0]).show();
                                 //console.log(  $(this)[0] );
                                 //console.log( $(data.formID).find(  "input[name=\'" + data.formPrefix + "["+ index +"]\']" ));
                               });
                        }else if( data.result === "success"){
                            alert("Update successful!.");
                             $(data.formID).find(".errorMessage").hide();
                             $(data.formID).find("input[value=\"Update\"]").hide();
                             $(data.formID).find("input[type=\"text\"]").val("");
                        }
                     }'
                                ), array(
                            'id' => 'btn_' . $key . '_delete_' . $nowTimeStamp,
                            'style' => 'float:left; margin-left:5px;'
                        ));
                    }
                    ?>
                </td>
            </tr><!-- row -->
        </tbody>
    </table>

    <?php
    $this->endWidget();
}
?>

<?php //echo CHtml::submitButton($itinereayRoomTypeModel->isNewRecord ? 'Create' : 'Save');     ?>
