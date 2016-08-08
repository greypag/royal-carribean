
<style>
    span.required{
        display:none;
    }
</style>
<?php
$roomtype_name;
$isnt_EN = Yii::app()->language == 'en' ? true : false;
$date_format = $isnt_EN ? Yii::app()->params->dateFormat['display_StepLong'] : Yii::app()->params->dateFormat['display_StepLong_TC'];
//$atleast_OneRoomAvailable = false;
?>
<div class="header">
    <ul>
        <li class="stepone current"><span></span><?php echo Yii::t('booking', 'Cruise'); ?><div class="next"></div></li>
        <li class="steptwo"><span></span><?php echo Yii::t('booking', 'Information'); ?><div class="next"></div></li>
        <li class="stepthree"><span></span><?php echo Yii::t('booking', 'Review'); ?><div class="next"></div></li>
        <li class="stepfour"><span></span><?php echo Yii::t('booking', 'Payment'); ?></li>
        <li class="clearboth"></li>
    </ul>
</div>

<div class="content">
    <?php
    /*
      CVarDumper::dump($bookingModel, 10, true);
      CVarDumper::dump($model, 10, true);
      CVarDumper::dump($roomModel, 10, true);
      CVarDumper::dump($roomsModelData, 10, true);
      CVarDumper::dump($totalPrice, 10, true);
     */
    ?>


    <div class="col_left">
        <div class="form">
            <?php
            $form = $this->beginWidget('GxActiveForm', array(
                'id' => 'booking-form',
                'method' => 'get', //Useing get to let user back to the perious step.
                'enableAjaxValidation' => false,
                'action' => Yii::app()->createUrl('booking/steponeb'), //<- your form action here
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <?php echo $form->hiddenField($model, 'itinerary_id'); //echo $form->fileField($model, 'pdf');        ?>
            <?php echo CHtml::hiddenField('Others[price]', $totalPrice); ?>
            <?php //echo $form->hiddenField($model, 'end_date');    ?>
            <div class="row">
                <?php echo Yii::t('booking', 'Departure Date'); ?>
                <?php //echo $form->labelEx($model, 'start_date');   ?>:<br/>
                <?php
                // echo CHtml::textField("start_date", $model->start_date, array('readonly' => true));
                echo $form->hiddenField($model, 'start_date');

                echo CHtml::dropDownList('Others[start_date]', null, array(
                    $model->start_date => Yii::app()->getDateFormatter()->format($date_format, CDateTimeParser::parse($model->start_date, 'dd/MM/yyyy'))
                        ), array('class' => 'form-select', 'disabled' => true, 'style' => 'width:250px'));
                ?>

                <!--
                    <img src="/images/icons/btn_calendar.png" alt="" title="" style="margin-left: 10px;"/>
                -->

            </div><!-- row -->

            <div class="row">
                <div class="col">
                    <?php 
					//echo $form->label($model, 'port_of_departure'); //echo $form->labelEx($model, 'port_of_departure');
					echo Yii::t('booking', 'Port of Departure');
					?>:<br/>
                    <?php
					if ($isnt_EN) {
						echo $form->dropDownList($model, 'port_of_departure', array($model->port_of_departure => $model->port_of_departure), array('disabled' => true, 'style' => 'width:250px'));
                    } else {
						echo $form->dropDownList($model, 'port_of_departure_tc', array($model->port_of_departure_tc => $model->port_of_departure_tc), array('disabled' => true, 'style' => 'width:250px'));
                    }
				   ?>
                </div>
                <div class="col">

                    <?php echo $form->hiddenField($model['cruise'], 'cruise_id'); ?>
                    <?php 
					echo Yii::t('booking', 'Ship');
					//echo $form->label($model['cruise'], 'cruise_name'); //echo $form->labelEx($model['cruise'], 'cruise_name'); ?>:<br/>
                    <?php
                    //echo CHtml::textField("cruise_name", $model['cruise']->cruise_name, array('readonly' => true)); 

                    if ($isnt_EN) {
                        echo $form->dropDownList($model['cruise'], 'cruise_name', array($model['cruise']->cruise_name => $model['cruise']->cruise_name), array('disabled' => true, 'style' => 'width:250px'));
                    } else {
                        echo $form->dropDownList($model['cruise'], 'cruise_name_tc', array($model['cruise']->cruise_name_tc => $model['cruise']->cruise_name_tc), array('disabled' => true, 'style' => 'width:250px'));
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div><!-- row -->

            <div class="row">
                <div class="col">
                    <label for="Itinerary_adults"><?php echo Yii::t('booking', 'Adults'); ?>:</label><br/>
                    <?php
					
					$arrayDisableOptions = array();
					
					if( !($roomsModelData[0]['rt']->rt_capacity >2) ){
					//echo $roomsModelData[0]['rt']->rt_capacity;
						$arrayDisableOptions = array( 3=>array('disabled'=>'disabled'), 4 => array('disabled'=>'disabled'));
					}
					
                    echo CHtml::dropDownList('Others[adults]', null, array('1' => '1', '2' => '2', '3' => '3', '4' => '4'), array(
                        'style' => 'width:100px',
                        'class' => 'dynamic_dropDown',
                        'data-response' => 'dynamic_adults',
                        'id' => 'adults_dropDown',
						'options'=> $arrayDisableOptions ,
						));
                    ?>
                </div>
                <div class="col">
                    <label for="Itinerary_children"><?php echo Yii::t('booking', 'Children'); ?>:</label><br/>
                    <?php
					
					$arrayDisableOptions = array();
					
					if( !($roomsModelData[0]['rt']->rt_capacity >2) ){
					//echo $roomsModelData[0]['rt']->rt_capacity;
						$arrayDisableOptions = array( 2=>array('disabled'=>'disabled'), 3=>array('disabled'=>'disabled'));
					}
					
                    echo CHtml::dropDownList(
							'Others[child]', 
							null, 
							array('0' => '0', '1' => '1', '2' => '2', '3' => '3'), 
							array(
								'style' => 'width:100px',
								'class' => 'dynamic_dropDown',
								'data-response' => 'dynamic_child',
								'id' => 'child_dropDown',
								'options'=> $arrayDisableOptions ,
							)
						);
                    ?>
                </div>
                <div class="col">
                    <label for="Itinerary_Room"><?php echo Yii::t('booking', 'No. of Staterooms'); ?>:</label><br/>
                    <?php
//echo CHtml::textField("cruise_room", '1', array('readonly' => true)
                    echo CHtml::dropDownList('cruise_room', null, array('1' => '1'), array('disabled' => true, 'style' => 'width:100px'));
//); 
                    ?>
                </div>
                <div class="clear"></div>
                <!--<div><b class="black">Adults & Children (under 12) combination is totaling a maximum of 4 with at least 1 Adult</b></div>-->
            </div>


            <div class="row">
				<b>
					<label for="Others[promotion_code]">
					<?php 
					//echo $promoModel->getAttributeLabel('promotion_code'); 
					echo Yii::t('booking', 'Promotion Code');
					?>:</label>
				</b>
				<br/>
                <?php
                echo CHtml::textField("Others[promotion_code]",  null, array('style'=>'background-color: #fdf4dd;'));
//echo CHtml::hiddenField('Others[promotion_code]', null);

                echo CHtml::ajaxSubmitButton('', CController::createUrl('booking/servicePromotion', array('formID' => 'booking-form')), array(
                    'type' => 'POST',
                    'dataType' => 'json',
                    'success' => 'js:function(data){
                loadbtn = $("#Others_promotion_code_btn");
                setTimeout(function(){ 
                loadbtn.removeClass("active");
                if(data.result==="fail"){

                loadbtn.siblings(".prmo_name").html("");
                alert(data.data);   
                }else if( data.result === "success"){

                //console.log(data.data);
                //loadbtn.siblings(".prmo_name").html(data.data.promotion_name + " have been loaded !");
                loadbtn.siblings(".prmo_name").html("Promotion Code have been loaded successfully!");
                
                royalObject.calutionPrice(royalObject.getSelectedRoom(), data.data);
                //$(data.formID).find(".errorMessage").hide();
                }
                }, 500);
                }',
                    'beforeSend' => 'js:function(xhr, opts){
                loadbtn = $("#Others_promotion_code_btn");
                if( loadbtn.hasClass("active") ){
                xhr.abort();
                }
                loadbtn.addClass("active");
                }'
                        ), array(
                    'id' => 'Others_promotion_code_btn',
                    'class' => 'loadbtn',
                        //'alt' => 'Press this button to verify this promotion code.'
                ));
                ?>
                <div class="prmo_name"></div>
            </div>


            <div class="row">
                *<?php echo Yii::t('booking', 'Stateroom Category'); ?>
                <?php
                //echo $form->labelEx($roomsModelData[0]['rt'], 'rt_name');
                ?>:
                <?php
                /*
                  $display_roomArray = array();
                  foreach ($roomsModelData as $key => $roomItem) {


                  $startTimeStamp = CDateTimeParser::parse($roomItem->start_date, Yii::app()->params->dateFormat['long']);
                  $endTimeStamp = CDateTimeParser::parse($roomItem->end_date, Yii::app()->params->dateFormat['long']);

                  if ($roomInventory <= 0 || !Yii::app()->royalCaribbeanHelper->timeStampComparison($startTimeStamp, $endTimeStamp)) {
                  $display_roomArray[$roomItem['irt_id']] = array('disabled' => true);
                  } else {
                  $atleast_OneRoomAvailable = true;
                  }
                  }
                 */

                //CVarDumper::dump(GxHtml::listDataEx($roomsModelData, 'irt_id', array('rt.rt_name')), 10, true);
                //CVarDumper::dump($roomsModelData, 10, true);
                $roomtype_name = '';
                if ($isnt_EN) {
                    $roomtype_name = 'rt.rt_name';
                } else {
                    $roomtype_name = 'rt.rt_name_tc';
                }
                echo CHtml::activedropDownList($roomModel, 'irt_id', GxHtml::listDataEx($roomsModelData, 'irt_id', $roomtype_name), array(
                    'class' => 'form-control',
                    'id' => 'stateroom_dropDown',
                    'style' => 'width:100%',
                    'data-response' => 'dynamic_stateroom',
                        //'options' => $display_roomArray,
                        //'prompt' => 'Select a cruise',
                ));
                ?>
                <br/><br/>
				
                <b class="black"><?php echo Yii::t('booking', 'If the above options do not meet your choice, please contact our customer service officer at +852 3189 3200 or fill out the equiry form'); ?> 
				
				<?php 
				if ($isnt_EN) {
				?>
					<a href="http://www.royalcaribbean.com.hk/en/enquiry.php"><?php echo Yii::t('booking', 'click here'); ?></a>.
				<?php 
                } else {
				?>
					<a href="http://www.royalcaribbean.com.hk/tc/enquiry.php"><?php echo Yii::t('booking', 'click here'); ?></a>.
				<?php 
                }
				?>
				</b>
				
                <br/><br/>
                <div class="js-event-log"></div>
                <div class="rooms">
                    <?php
                    //CVarDumper::dump($roomsModelData, 10, true);
					

					//CVarDumper::dump($roomsModelData 10, true);
					//exit();
						
                    foreach ($roomsModelData as $key => $roomModelData) {


                        $roomInventory = RoomInventory::model()->countByAttributes(array(
                            'itinerary_id' => $model->itinerary_id,
                            'rt_id' => $roomModelData["rt"]["sys_rt_id"],
                            'status' => 'available',
                        ));
						
                        $disable = 'false';
                        if ($roomInventory <= 0) {
                            $disable = 'true';
                        }

                        //CVarDumper::dump($model->itinerary_id, 10, true);
                        //CVarDumper::dump($roomModelData["rt"]["sys_rt_id"], 10, true);
                        //CVarDumper::dump($roomInventory, 10, true);
                        /*
                          CVarDumper::dump($model->itinerary_id, 10, true);
                          CVarDumper::dump($roomModelData["rt"]["sys_rt_id"], 10, true);
                          $startTimeStamp = CDateTimeParser::parse($roomModelData->start_date, Yii::app()->params->dateFormat['compare_day']);
                          $endTimeStamp = CDateTimeParser::parse($roomModelData->end_date, Yii::app()->params->dateFormat['compare_day']);
                          $disable = 'false';
                          if ($roomInventory <= 0 || !Yii::app()->royalCaribbeanHelper->timeStampComparison($startTimeStamp, $endTimeStamp)) {
                          $disable = 'true';
                          }
                          CVarDumper::dump($roomModelData, 10, true);
                          CVarDumper::dump($roomModelData['rt'], 10, true);
                          if ($key == 15 ) {
                          exit();
                          }
                         */
                        ?>
                        <div id="room_<?php echo $roomModelData->irt_id; ?>" class="roomDesc"  
                             data-capacity="<?php echo $roomModelData['rt']->rt_capacity; ?>"  
                             data-fare1="<?php echo $roomModelData->fare_guest1_2; ?>" 
                             data-fare2="<?php echo $roomModelData->fare_guest3_4; ?>"  
                             data-taxes="<?php echo Yii::app()->format->unformatNumber($model->taxes_fee); ?>" 
                             data-port="0<?php //echo Yii::app()->format->unformatNumber($model->port_expenses);                                                   ?>"
                             data-ncff="<?php echo Yii::app()->format->unformatNumber($model->ncff); ?>"
                             data-disable="<?php echo $disable; ?>"
                             data-rt_id="<?php echo $roomModelData['rt']->sys_rt_id; ?>"
                             >   
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            /*
                                              echo CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $roomModelData['rt']->room_image, "image", array(
                                              'style' => 'width: 300px; height: 200px',
                                              ));
                                             */
                                            echo CHtml::image($roomModelData['rt']->room_image, "image", array(
                                                'style' => 'width: 300px; height: 200px',
                                            ));
                                            ?>
                                        </td>
                                        <td>

                                            <?php //echo $roomModelData['rt']->getAttributeLabel('rt_capacity');     ?>
                                            <?php //echo $roomModelData['rt']->rt_capacity; ?>
                                            <b>
                                                <?php
                                                if ($isnt_EN) {
                                                    echo GxHtml::encode($roomModelData['rt']->rt_name);
                                                } else {
                                                    echo GxHtml::encode($roomModelData['rt']->rt_name_tc);
                                                }
                                                ?>
                                            </b>

                                            <?php
                                            if ($disable == 'true') {
                                                ?>
                                                <span class="tag">
                                                    <?php
                                                    echo Yii::t('booking', 'Sold out');
                                                    ?>
                                                </span>
                                                <?php
                                            }
                                            ?>
                                            <div>
                                                <?php
                                                //echo $form->labelEx($roomModelData, 'fare_guest1_2'); 
                                                echo Yii::t('booking', 'Cruise Fare per head for first and second guest');
                                                ?>:
                                                HK$ <?php echo Yii::app()->format->formatNumber($roomModelData->fare_guest1_2 + Yii::app()->format->unformatNumber($model->ncff)); ?>
                                                <br/>
												
												<?php 
												if( $roomModelData['rt']->rt_capacity >2 ){
												?>
                                                <?php
                                                echo Yii::t('booking', 'Cruise Fare per head for third and forth guest');
                                                //echo $form->labelEx($roomModelData, 'fare_guest3_4'); 
                                                ?>:
                                                HK$ <?php echo Yii::app()->format->formatNumber($roomModelData->fare_guest3_4 + Yii::app()->format->unformatNumber($model->ncff)); ?>
                                                <br/>
												<?php
												}	
												?>
												
												
												<br/>
                                                <?php
                                                echo Yii::t('booking', 'Single Supplement');
                                                //echo $form->labelEx($roomModelData, 'fare_guest3_4'); 
                                                ?>:
                                                HK$ <?php echo Yii::app()->format->formatNumber(Yii::app()->format->calculateSingleSupplement($roomModelData, $model)); ?>
                                                <br/>
                                                <?php
                                                echo Yii::t('booking', 'Maximum up to people') . ': '. $roomModelData['rt']->rt_capacity . '';
                                                ?>

                                            </div>
                                            <?php
                                            if ($isnt_EN) {

                                                echo $roomModelData['rt']->rt_des;
                                            } else {

                                                echo $roomModelData['rt']->rt_des_tc;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        //CVarDumper::dump($model->itinerary_id, 10, true);
                        //CVarDumper::dump($roomModelData, 10, true);
                        //CVarDumper::dump($roomModelData["rt"]["rt_id"], 10, true);
                        //CVarDumper::dump($disable, 10, true);
                    }
                    ?>
                </div>
            </div><!-- row -->

            <div class="row remarks">
                <b>*<?php echo Yii::t('booking', 'Remarks'); ?>:</b>
                <div><?php echo Yii::t('booking', 'Cruise fares include accommodation, complimentary meals, snacks and drinks in selected dining venues.'); ?></div>
                <div><?php echo Yii::t('booking', 'Cruise fares exclude service charges and gratuities, taxes, fees and port expenses.'); ?></div>
                <div><?php echo Yii::t('booking', "No Guest younger than the age twenty-one (21) will be assigned to a stateroom unless accompanied in the same stateroom by an adult twenty-one (21) years old or older. A guest's age is established upon the first date of sailing."); ?></div>
                <div><?php echo Yii::t('booking', 'All itineraries are subject to change without prior notice.'); ?></div>
                <br/>
                <!-- <div>NCFF: HK$ <?php //echo $model->ncff;                               ?></div>
                <div>Port Fees and Taxes: HK$ <?php //echo $model->taxes_fee;                               ?></div>
                <div>Prepaid Gratuties: HK$ <?php //echo $model->prepaid_gratuties;                               ?></div>-->
            </div>
            <div class="row buttons">
                <?php
                if ($isnt_EN) {
                	echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png', array('id' => 'stepOneSubmitButton'));
                } else {
					echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png', array('id' => 'stepOneSubmitButton'));
                }
                $this->endWidget();
                ?>
            </div>
        </div>

    </div><!-- form -->


    <div class="col_right">
        <div class="box">
            <h2><?php echo Yii::t('booking', 'YOUR CRUISE'); ?></h2>
            <hr/>
            <?php //echo $form->label($model, 'port_of_departure'); 
			echo Yii::t('booking', 'Port of Departure');
			
			?>: <br/> 
            <?php
            //echo $form->labelEx($model, 'port_of_departure'); 
            ?>
            <b>
			<?php
			if ($isnt_EN) {

				echo $model->port_of_departure;
			} else {

				echo $model->port_of_departure_tc;
			}
			?>
			</b>
            <hr/>
            <!--
            <?php //echo $form->label($model, 'ports_of_calls');      ?>: <br/>
            <b>
            <?php
            //echo $model->ports_of_calls;
            ?>
            </b>
            <hr/>-->
            <?php echo Yii::t('booking', 'Itinerary'); ?>:<br/>
            <b><?php
                if ($isnt_EN) {

                    echo $model->itinerary_name;
                } else {

                    echo $model->itinerary_name_tc;
                }
                ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Sailing Date'); ?>:<br/>
            <?php
//echo $model->start_date .'<br/>';
//echo $model->end_date .'<br/><br/>';
//echo CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']) .'<br/>';
//echo Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong'], CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']));
            ?>
            <b><?php echo Yii::app()->getDateFormatter()->format($date_format, CDateTimeParser::parse($model->start_date, 'dd/MM/yyyy')); ?></b> - <br/>
            <b><?php echo Yii::app()->getDateFormatter()->format($date_format, CDateTimeParser::parse($model->end_date, 'dd/MM/yyyy')); ?></b>
            <br/>
            <?php
            if ($isnt_EN) {

                echo $model->days_nights_full_desc;
            } else {

                echo $model->days_nights_full_desc_tc;
            }
            ?>
            <hr/>
            <?php echo Yii::t('booking', 'Total No. of Guests'); ?>:<br/>
            <?php echo Yii::t('booking', 'Adults'); ?>: <span id="dynamic_adults" class="dynamic_contant"></span><br/>
            <?php echo Yii::t('booking', 'Children'); ?>: <span id="dynamic_child" class="dynamic_contant"></span>
            <hr/>
            <?php echo Yii::t('booking', 'Ship'); ?>:<br/>
            <b><?php
                if ($isnt_EN) {

                    echo $model['cruise']->cruise_name;
                } else {

                    echo $model['cruise']->cruise_name_tc;
                }
                ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Stateroom Category'); ?>:<br/>
            <span id="dynamic_stateroom" class="dynamic_contant"><?php
                if ($isnt_EN) {

                    echo $roomsModelData[0]['rt']->rt_name;
                } else {

                    echo $roomsModelData[0]['rt']->rt_name_tc;
                }
                ?></span>
            <hr/>
            <h3><?php echo Yii::t('booking', 'Total'); ?>:</h3>
            <span style="
                  font-size: 12px;
                  "><?php echo Yii::t('booking', '(include taxes, fees and port expenses)'); ?>
            </span>
            <div class="price">
                <b>$</b> <h2 id="totalPrice"><?php //echo $totalPrice;                                ?></h2> <b> HKD</b> 
            </div>
            <div class="remark">
                <!--View Summary of Charges,<br/>
                Special requests amound<br/> maybe altered.-->
            </div>

        </div>
    </div>
    <div class="clear"></div>
</div>

<script>

$(window).load(function() {
    <?php 
        if ($isnt_EN) { 
            if ($model->alert_message != '' && !is_null($model->alert_message) ) { 
    ?>
                var alert_message = "<?php echo $model->alert_message;?>";
                alert(alert_message);

    <?php    
            }
        }
        else {
            if ($model->alert_message_tc != '' && !is_null($model->alert_message_tc) ) { 
    ?>
                var alert_message = "<?php echo $model->alert_message_tc;?>";
                alert(alert_message);
    <?php 
            }
        } 
    ?>
});

</script>