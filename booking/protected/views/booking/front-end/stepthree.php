<style>
    span.required{
        display:none;
    }
</style>
<?php

$isnt_EN = Yii::app()->language == 'en' ? true : false;
Yii::app()->royalCaribbeanHelper->echoTimerScript($twentyTimeStamp);
?>
<div class="header">
    <ul>
        <li class="stepone"><span></span><?php echo Yii::t('booking', 'Cruise'); ?><div class="next"></div></li>
        <li class="steptwo"><span></span><?php echo Yii::t('booking', 'Information'); ?><div class="next"></div></li>
        <li class="stepthree current"><span></span><?php echo Yii::t('booking', 'Review'); ?><div class="next"></div></li>
        <li class="stepfour"><span></span><?php echo Yii::t('booking', 'Payment'); ?></li>
        <li class="clearboth"></li>
    </ul>
</div>

<div class="content">


    <div class="col_left">

        <?php
        //CVarDumper::dump($cookies, 10, true);
        $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'guest-form',
            //'method' => 'get', //Useing get to let user back to the perious step.
            'enableAjaxValidation' => false,
            'action' => Yii::app()->createUrl('booking/stepthree'), //<- your form action here
        ));
        ?>
        <div class="form">

            <div class="row header">
                <table width="100%">
                    <tbody>
                        <tr>
                            <th width="50%"></th>
                            <th width="50%"></th>
                        </tr>

                        <tr>
                            <td colspan="2"><?php echo Yii::t('booking', 'Sailing Date'); ?>: <b><?php echo $cookies['display'][2]; ?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo Yii::t('booking', 'Port of Departure'); ?>: <b><?php echo $cookies['display'][0]; ?></b></td>
                            <td><?php echo Yii::t('booking', 'Cruise'); ?>: <b><?php echo $cookies['display'][6]; ?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo Yii::t('booking', 'Guest'); ?>: <b><?php echo $cookies['display'][4] + $cookies['display'][5]; ?></b></td>
                            <td><?php echo Yii::t('booking', 'Room'); ?>: <b>1</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo Yii::t('booking', 'Stateroom '); ?>: 
                                <b><?php echo $cookies['display'][7]; ?></b>
                                <br/>
                                <span style="font-size: 12px;"><?php echo Yii::t('booking', '(Stateroom number will be assigned according to the best availability)'); ?></span>
                            </td>
                        </tr>
                        <?php
                        if (isset($cookies['promotion'])) {
                            ?>
                            <tr>
                                <td colspan="2">
                                    <?php echo $form->labelEx($promoModel, 'promotion_code'); ?>: <b><?php echo $cookies['promotion'][1] . ' (' . $cookies['promotion'][0] . ')'; ?></b>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <hr />
            </div>


            <?php
            $adult = $cookies['display'][4];
            $child = $cookies['display'][5];
            for ($i = 0; $i < ($adult + $child); $i++) {
                $session_guestModel = $session_guestModels[$i]
                ?>

                <div class="guests row">

                    <div class="row title">
                        <h1><?php echo Yii::t('booking', 'Guest'); ?>
                            <?php
                            echo $i + 1;
                            /*
                              if ($i < $adult) {
                              echo ' (Adult)';
                              } else {
                              echo ' (Children)';
                              }
                             */
                            ?>
                        </h1>
                    </div>

                    <table width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo Yii::t('booking', 'Title'); ?>:
                                    <b><?php echo $session_guestModel->title; ?></b>
                                </td>
                                <td>
                                    <?php echo Yii::t('booking', 'Name'); ?>:
                                    <b><?php echo $session_guestModel->last_name . '   ' . $session_guestModel->first_name; ?></b>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <?php echo Yii::t('booking', 'Gender'); ?>:
                                    <b><?php echo $session_guestModel->gender; ?></b>
                                </td>
                                <td>
                                    <?php echo Yii::t('booking', 'Date of Birth'); ?>:
                                    <b><?php echo $session_guestModel->date_of_birth; ?></b>

                                </td>
                            </tr><!-- row -->

                            <tr>
                                <td>
                                    <?php echo Yii::t('booking', 'Mobile number'); ?>:
                                    <b><?php echo $session_guestModel->phone_no; ?></b>

                                </td>
                                <td>
                                    <?php echo Yii::t('booking', 'Email'); ?>:
                                    <b> <?php echo $session_guestModel->email; ?></b>

                                </td>
                            </tr><!-- row -->

                            <tr>
                                <td>
                                    <?php echo Yii::t('booking', 'Citizenship'); ?>:
                                    <b><?php echo $session_guestModel->citizenship; ?></b>

                                </td>
                                <td>
                                    <?php //echo Yii::t('booking', 'Passport Number'); ?>
                                    <b><?php //echo $session_guestModel->document_number; ?></b>

                                </td>
                            </tr><!-- row -->

                            <?php
                            //CVarDumper::dump($session_guestModels[$i]->title, 10, true);
                            //CVarDumper::dump($session_guestModels, 10, true);
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
        </div><!-- form -->
        <?php
        $this->endWidget();
        ?>




        <div class="form">

            <div class="row"
                 style="
                 //font-size: 9px;      
                 //-webkit-transform: scale(0.9);
                 "
                 >
                <b><?php echo Yii::t('booking', 'Personal Information Collection Statement'); ?>:</b><br/>
                <?php echo Yii::t('booking', 'We shall keep your personal data confidential at all times. All personal data collected will be in compliance with the Personal Data(Privacy) Ordinance under the law of Hong Kong.'); ?>
            </div>
            <div class="row buttons">

                <?php
				if ($isnt_EN) {
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_prev.png', array('class' => 'btn_prev'));
					} else {
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_prev_tc.png', array('class' => 'btn_prev'));
					}
				?>

                <span class="next">
                    <?php
                    //echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png');
                    //echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_submit.png'), Yii::app()->createUrl('booking/stepfour'));
                    /*if ($isnt_EN) {
						echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/stepfour'));
					} else {
						echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png'), Yii::app()->createUrl('booking/stepfour'));
					}*/
					if ($isnt_EN) {
						echo GxHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/stepfour')); 
					} else {
						echo GxHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png'), Yii::app()->createUrl('booking/stepfour')); 
					}
					?>
                </span>
            </div>
        </div><!-- form -->
    </div>


    <div class="col_right">
        <div class="box">
            <h2><?php echo Yii::t('booking', 'YOUR CRUISE'); ?></h2>
            <hr/>
            <?php 
			//echo $itineraryModel->getAttributeLabel('port_of_departure'); 
			echo Yii::t('booking', 'Port of Departure');
			?>: <br/>
            <b><?php echo $cookies['display'][0]; ?></b>
            <hr/>
            <!--
            <?php //echo $itineraryModel->getAttributeLabel('ports_of_calls'); ?>: <br/>
            <b>
            <?php //echo $cookies['display'][9]; ?>
            </b>
            <hr/>-->
            <?php echo Yii::t('booking', 'Itinerary'); ?>:<br/>
            <b><?php echo $cookies['display'][1]; ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Sailing Date'); ?>:<br/>
            <b><?php echo $cookies['display'][2]; ?></b> - <br/>
            <b><?php echo $cookies['display'][3]; ?></b>            
            <br/>
            <?php
            echo $cookies['display'][10];
            ?>
            <hr/>
            <?php echo Yii::t('booking', 'Total No. of Guests'); ?>:<br/>
            <?php echo Yii::t('booking', 'Adults'); ?>: <span id="dynamic_adults" class="dynamic_contant"><?php echo $cookies['display'][4]; ?></span><br/>
            <?php echo Yii::t('booking', 'Children'); ?>:  <span id="dynamic_child" class="dynamic_contant"><?php echo $cookies['display'][5]; ?></span>
            <hr/>
            <?php echo Yii::t('booking', 'Ship'); ?>:<br/>
            <b><?php echo $cookies['display'][6]; ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Stateroom Category'); ?>:<br/>
            <span id="dynamic_stateroom" class="dynamic_contant"><?php echo $cookies['display'][7]; ?></span>
            <hr/>
            <h3><?php echo Yii::t('booking', 'Total'); ?>:</h3>
            <span style="
                  font-size: 12px;
                  "><?php echo Yii::t('booking', '(include taxes, fees and port expenses)'); ?>
            </span>
            <div class="price">
                <b>$</b> <h2 id="totalPrice"><?php echo $cookies['display'][8]; ?></h2> <b> <?php echo Yii::t('booking', 'HKD');?></b> 
            </div>
            <div class="remark">
                <!--View Summary of Charges,<br/>
                Special requests amound<br/> maybe altered.-->
            </div>

        </div>
    </div>




    <div class="clear"></div>
</div>
