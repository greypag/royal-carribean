<script>
    $(document).ready(function () {
        $("#price-table").find(".date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
<div class="form">
    <?php
    $itineraryRoomType_model = null;
    if (!$model->isNewRecord):

        $itineraryRoomType_model = ItineraryRoomType::model()->findAll(
                array(
                    'condition' => 'itinerary_id="' . $model->itinerary_id . '"' . ' and cruise_id="' . $model->cruise_id . '"'
                )
        );
        ?>
        <div class="row">
            <div id="price-table">
                <?php
                $this->renderPartial('_ajaxItinereayRoomType', array(
                    'roomTypeModels' => RoomType::model()->findAll(
                            array(
                                //'condition' => 'cruise_id="' . $model->cruise_id . '"' . ' and language="' . Yii::app()->params->language . '"',
                                'condition' => 'cruise_id="' . $model->cruise_id . '"',
                                'group' => 'rt_id',
                            )
                    ),
                    'itinerary_id' => $model->itinerary_id,
                    'itinereayRoomTypeModel' => ItineraryRoomType::model(),
                    'data_itinereayRoomTypeModels' => $itineraryRoomType_model
                ));
                ?>
            </div>
        </div>
        <?php
    endif;
    ?>
</div>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        //'enableAjaxValidation'=>true,
        'enableClientValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php
        //http://www.yiiframework.com/forum/index.php/topic/49177-yii-ajax-update-depending-dropdown-selection/

        echo $form->labelEx($model, 'cruise_name');
        $criteria = new CDbCriteria();
        //$criteria->select = '*, MAX(added_on) max_added_on';
        //$criteria->condition = 'receiver_id = :receiverId';
        $criteria->group = 'sender_id';
        //$criteria->order = 'priority_id DESC, max_added_on DESC';
        //$criteria->params = array('receiverId' => $userId);

        if (!$model->isNewRecord) {
            echo CHtml::activedropDownList($model, 'cruise_id', GxHtml::listDataEx(Cruise::model()->findAll(array(
                                'group' => 'cruise_id'
                            )), 'cruise_id', array('cruise_id', 'cruise_name')), array(
                'class' => 'form-control',
                //'prompt' => 'Select a cruise',
                'ajax' => array(
                    'url' => $this->createUrl('ServiceGetAllRoomType'), // it is selected at MyHtml::ajax() which URL to use
                    'type' => 'GET',
                    //'dataType' => 'json',
                    //'dataType' => 'html',
                    //'update' => '#price-table', //http://www.yiiframework.com/wiki/429/an-easy-solution-for-dependent-dropdownlist-using-ajax/
                    'success' => 'function(data){
                    
                    var dynamicContent = $("#price-table");
                    dynamicContent.hide().html(data).slideToggle();
                   
                    //dynamicContent.find(".date").datepicker();
                    //console.log(data.renderedHtml);
                            /*
                            if(data.registration){
                                console.log("answer from registration");
                            }else if(data.package){
                               console.log("answer from package");
                            }*/
                    
                    var dynamicContent = $("#price-table");
                    console.log(dynamicContent.find(".date"));
                    dynamicContent.find(".date").datepicker({
                        changeMonth: true,
                        changeYear: true,
            dateFormat:  "dd/mm/yy"
                    });
                         /*   */
                    }',
                    'data' => array('cruise_id' => 'js:this.value', 'itinerary_id' => $model->itinerary_id),
                )
            ));
        } else {

            echo CHtml::activedropDownList($model, 'cruise_id', CHtml::listData(Cruise::model()->findAll(array(
                                'group' => 'cruise_id'
                            )), 'cruise_id', 'cruise_name'), array(
                'class' => 'form-control',
                    //'prompt' => 'Select a cruise',
            ));
        }

        //$htmlOptions = array('size' => '1', 'prompt' => '-- select county --',);
        //echo $form->listBox($model, 'cruise', $data, $htmlOptions);
        //echo $form->error($model, 'cruise');
        //CVarDumper::dump($model->irt_id, 10, true);
        //echo CHtml::ajaxButton("Create Room Fare", CController::createUrl('ServiceGetAllRoomType'), array('update' => '#price-table'));
        //$this->endWidget();
        ?>
    </div>
    <?php
    /*
      $form = $this->beginWidget('CActiveForm', array(
      'id' => 'itinerary-form',
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      //'enableAjaxValidation'=>true,
      'enableClientValidation' => true,
      'htmlOptions' => array('enctype' => 'multipart/form-data'),
      ));
     */
    ?>


    <table>
        <tbody>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'itinerary_id'); ?>
                    <?php
                    if (!$model->isNewRecord) {
                        //CVarDumper::dump($bookingRecord, 10, true);
                        if ($bookingRecord == 0) {
                            echo $form->textField($model, 'itinerary_id', array('size' => 12, 'maxlength' => 12));
                        } else {
                            echo $model->itinerary_id . '<br/>**There are some booking records / inventories record exists, this field can not be modified.';
                            echo $form->hiddenField($model, 'itinerary_id');
                        }
                    } else {
                        echo $form->textField($model, 'itinerary_id', array('size' => 12, 'maxlength' => 12));
                    }
                    ?>
                    <?php echo $form->error($model, 'itinerary_id'); ?>
                    <br/>
                    <br/>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'status'); ?>
                    <?php
                    echo $form->radioButtonList($model,'status',array('bookable'=>'Bookable','unbookable'=>'Unbookable','unpublish'=>'UnPublish')); ?>
                 
                    <?php echo $form->error($model, 'status'); ?>
                    <br/>
                    <br/>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'start_date'); ?>
                    <?php
//echo $form->dateField($model, 'start_date');
                    if ($model->start_date === false)
                        $model->start_date = '';

                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'start_date',
                        'options' => array(
                            'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                        //'minDate' => '+1d', //day can choose >= tomorrow
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'start_date'); ?>

                </td>

                <td>
                    <?php echo $form->labelEx($model, 'end_date'); ?>
                    <?php
//echo $form->dateField($model, 'end_date');
                    if ($model->end_date === false)
                        $model->end_date = '';

                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'end_date',
                        'options' => array(
                            'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                        //'minDate' => '+1d', //day can choose >= tomorrow
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'end_date'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'itinerary_name'); ?>
                    <?php echo $form->textField($model, 'itinerary_name', array('size' => 32, 'maxlength' => 128)); ?>
                    <?php echo $form->error($model, 'itinerary_name'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'itinerary_name_tc'); ?>
                    <?php echo $form->textField($model, 'itinerary_name_tc', array('size' => 32, 'maxlength' => 128)); ?>
                    <?php echo $form->error($model, 'itinerary_name_tc'); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <!--<b>Port of Departure </b><br/>-->
                    <?php
                    echo $form->labelEx($model, 'port_of_departure');
                    ?>
                    <?php echo $form->textField($model, 'port_of_departure', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'port_of_departure'); ?>
                </td>
                <td>
                    <?php
                    echo $form->labelEx($model, 'port_of_departure_tc');
                    ?>
                    <?php echo $form->textField($model, 'port_of_departure_tc', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'port_of_departure_tc'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'ports_of_calls'); ?>
                    <?php echo $form->textField($model, 'ports_of_calls', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'ports_of_calls'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'ports_of_calls_tc'); ?>
                    <?php echo $form->textField($model, 'ports_of_calls_tc', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'ports_of_calls_tc'); ?>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <?php //echo $form->labelEx($model, 'port_of_boarding'); ?>
                    <?php //echo $form->textField($model, 'port_of_boarding', array('maxlength' => 32)); ?>
                    <?php //echo $form->error($model, 'port_of_boarding'); ?>
                </td>
                <td>
                </td>
            </tr>

            <tr>
                <td style="
                    vertical-align: top;
                    ">

                    <div class="row">
                        <?php echo $form->labelEx($model, 'pdf'); ?>
                        <?php echo $form->hiddenField($model, 'pdf'); //echo $form->fileField($model, 'pdf');        ?>
                        <?php
                        Yii::app()->royalCaribbeanHelper->echo_AjaxFileUpload('Itinerary', 'pdf', 'pdf');
                        ?>
                        <?php
                        //if (!(is_null($model->pdf)) && !(trim($model->pdf) === '')) {
                        if (str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->pdf)) {
                            echo CHtml::link('Download file', $model->pdf, array('target' => '_blank', 'class' => 'pdf'));
                        }
                        ?>
                        <?php echo $form->error($model, 'pdf'); ?>
                    </div>
                </td>
                <td style="
                    vertical-align: top;
                    ">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'image'); ?>
                        <?php echo $form->hiddenField($model, 'image');  //echo $form->fileField($model, 'image');        ?>
                        <?php
                        //phpinfo();
                        Yii::app()->royalCaribbeanHelper->echo_AjaxFileUpload('Itinerary', 'image', 'image');
                        ?>

                        <br/>
                        <?php
                        if (str_replace(Yii::app()->getBaseUrl(true) . '/', '', $model->image)) {

                            // if (!(is_null($model->image)) && !(trim($model->image) === '')) {
                            echo CHtml::image($model->image, "image", array(
                                'style' => 'height: 100px',
                                'class' => 'image'
                            ));
                        }
                        ?> 
                        <?php echo $form->error($model, 'image'); ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!--
        <div class="row">
    <?php //echo $form->labelEx($model, 'prepaid_gratuties');    ?>
    <?php //echo $form->textField($model, 'prepaid_gratuties', array('size' => 80, 'maxlength' => 255));  ?>
    <?php //echo $form->error($model, 'prepaid_gratuties'); ?>
        </div>
    -->

    <div class="row">
        <?php echo $form->labelEx($model, 'days_nights_full_desc'); ?>
        <?php
        //echo $form->textArea($model, 'days_nights_full_desc', array('rows' => 1, 'cols' => 80)); 
        echo $form->textField($model, 'days_nights_full_desc', array('size' => 80, 'maxlength' => 255));
        ?>
        <?php echo $form->error($model, 'days_nights_full_desc'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'days_nights_full_desc_tc'); ?>
        <?php echo $form->textField($model, 'days_nights_full_desc_tc', array('size' => 80, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'days_nights_full_desc_tc'); ?>
    </div>

    <!--
    <div class="row">
        <?php //echo $form->labelEx($model, 'ports_of_calls'); ?>
        <?php
        //Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'ports_of_calls');
        ?>

        <?php //echo $form->error($model, 'ports_of_calls'); ?>
    </div>
    -->

    <br/>
    <br/>
    <br/>
    <h3>Price related:</h3>
    <hr/>


    <div class="row">
        <?php echo $form->labelEx($model, 'minimum_cruise_fares'); ?>
        <?php echo $form->textField($model, 'minimum_cruise_fares'); ?> HKD and up
        <?php echo $form->error($model, 'minimum_cruise_fares'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'taxes_fee'); ?>
        <?php echo $form->textField($model, 'taxes_fee'); ?>
        <?php echo $form->error($model, 'taxes_fee'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ncff'); ?>
        <?php echo $form->textField($model, 'ncff'); ?>
        <?php echo $form->error($model, 'ncff'); ?>
    </div>


    <div class="row">
        <?php //echo $form->labelEx($model, 'language');      ?>
        <?php //echo $form->dropDownList($model, 'language', array('en' => 'English', 'tc' => '中文'), array('style' => 'display: none'));   ?>
        <?php //echo $form->error($model, 'language');   ?>
    </div>

    <br/>
    <br/>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' ); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->