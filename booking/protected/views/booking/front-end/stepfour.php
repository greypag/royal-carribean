<?php include 'tracking_tag_transaction.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 6 - Before Payment (Step 4)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/booking/index.php/booking/stepfour
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=b4p;cat=slt6-0;u1=<?php echo $_SESSION['captcha']['totalvalue'] ?>;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=b4p;cat=slt6-0;u1=<?php echo $_SESSION['captcha']['totalvalue'] ?>;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<div class="header">
    <ul>
        <li class="stepone"><span></span><?php echo Yii::t('booking', 'Cruise'); ?><div class="next"></div></li>
        <li class="steptwo"><span></span><?php echo Yii::t('booking', 'Information'); ?><div class="next"></div></li>
        <li class="stepthree"><span></span><?php echo Yii::t('booking', 'Review'); ?><div class="next"></div></li>
        <li class="stepfour current"><span></span><?php echo Yii::t('booking', 'Payment'); ?></li>
        <li class="clearboth"></li>
    </ul>
</div>
<div class="content">





    <div class="col_left">
        <?php
		$isnt_EN = Yii::app()->language == 'en' ? true : false;
        //CVarDumper::dump($cookies, 10, true);
        $form = $this->beginWidget('GxActiveForm', array(
            'id' => 'card-form',
            //'method' => 'get', //Useing get to let user back to the perious step.
            'enableAjaxValidation' => false,
            'action' => Yii::app()->createUrl('booking/stepfour'), //<- your form action here
        ));

        ?>
        <input type="hidden" name="card-form-submition" value="Y"/>
        <div class="form">
            <div class="errorSummary" style="<?php if (!$formValid) echo 'display: block'; ?>"><p><?php echo Yii::t('booking', 'Input errors: Please try again'); ?>:</p>
                <ul>
                    <li style="<?php if ($formError["card_type"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Card type cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["card_family_name"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Last Name on card cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["card_given_name"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'First Name on card cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["card_number"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Card number cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["expire_month"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Expiration month cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["expire_year"]["error"] == 1) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Expiration year cannot be blank.'); ?></li>
                    <li style="<?php if ($formError["card_number"]["error"] == 2) echo 'display: list-item;' ?>"><?php echo Yii::t('booking', 'Card number format invalid.'); ?></li>
                    <?php if ($formError["submit"]["error"] == 1): ?>
                        <li style="display: list-item;"><?php echo $formError["submit"]["message"]; ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="row title">
                <h1><?php echo Yii::t('booking', 'Card Information'); ?></h1>
                <span class="right">* <?php echo Yii::t('booking', 'Required Information');?></span>
                <hr />
            </div>
            <div class="row">
                <div class="col">
                    <label>*<?php echo Yii::t('booking', 'Card type'); ?>:</label><br/>
                    <label class="card-option">
                        <input type="radio" name="card_type" value="VI" <?php echo @$_POST["card_type"] == "VI" ? "checked='checked'" : ""; ?>/>
                        <img src="<?php echo Yii::app()->request->baseUrl . '/images/icons/visa-icon.jpg'; ?>" />
                    </label>
                    <label class="card-option">
                        <input type="radio" name="card_type" value="MC" <?php echo @$_POST["card_type"] == "MC" ? "checked='checked'" : ""; ?>/>
                        <img src="<?php echo Yii::app()->request->baseUrl . '/images/icons/mc-icon.jpg'; ?>" />
                    </label>
                    <label class="card-option">
                        <input type="radio" name="card_type" value="AX" <?php echo @$_POST["card_type"] == "AX" ? "checked='checked'" : ""; ?>/>
                        <img src="<?php echo Yii::app()->request->baseUrl . '/images/icons/ae-icon.jpg'; ?>" />
                    </label>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="card_family_name">*<?php echo Yii::t('booking', 'Last Name on card'); ?>:</label><br/>
                    <input type="text" name="card_family_name" id="card_family_name" value="<?php @$_POST["card_family_name"] ?>">
                </div>
                <div class="col">
                    <label for="card_given_name">*<?php echo Yii::t('booking', 'First Name on card'); ?>:</label><br/>
                    <input type="text" name="card_given_name" id="card_given_name" value="<?php @$_POST["card_given_name"] ?>">
                </div>
                <div class="clear"></div>
            </div><!-- row -->
            <div class="row">
                <div class="col">
                    <label for="card_number">*<?php echo Yii::t('booking', 'Card number'); ?>:</label><br/>
                    <input type="text" name="card_number" id="card_number" value="<?php @$_POST["card_number"] ?>">
                </div>
                <div class="col expired-row">
                    <label>*<?php echo Yii::t('booking', 'Expiration date'); ?>:</label><br/>
                    <?php
                    $months = array("" => "MM");
					$month_string;
                    $month_string_en = array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC',);
                    $month_string_tc = array('1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月',);
					if ($isnt_EN) {
						$month_string = $month_string_en;
					}else{
						$month_string = $month_string_tc;
					}

                    for ($i = 1; $i <= 12; $i++) {
                        $month = str_pad($i, 2, '0', STR_PAD_LEFT);
                        $months[$month] = $month_string[$i-1];
                        //$months[$month] = $month;
                    }
                    //CVarDumper::dump($months, 10, true);
                    echo CHtml::dropDownList('expire_month', @$_POST["expire_month"], $months, array('class' => 'form-select', 'style' => 'width:130px'));
                    ?>
                    <?php
                    $startYear = date("Y");
                    $years = array("" => "YYYY");
                    for ($i = 0; $i <= 10; $i++) {
                        $years[date('y') + $i] = $startYear + $i;
                    }
                    echo CHtml::dropDownList('expire_year', @$_POST["expire_year"], $years, array('class' => 'form-select expire-year', 'style' => 'width:130px'));
                    ?>
                </div>
                <div class="clear"></div>
            </div><!-- row -->
            <hr />
            <div class="row buttons">

                <?php
				/*
				if ($isnt_EN) {
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_prev.png', array('class' => 'btn_prev'));
					} else {
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_prev_tc.png', array('class' => 'btn_prev'));
				}
				*/
				?>

                <span class="next">
                    <?php
                    if ($isnt_EN) {
					?>
						<img src="<?php echo Yii::app()->request->baseUrl . '/images/icons/btn_next.png'; ?>" class="btn-submit" />
                    <?php
                    }else{
					?>
						<img src="<?php echo Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png'; ?>" class="btn-submit" />
                    <?php
                    }
					?>
                </span>
            </div>
        </div>
        <?php
        $this->endWidget();
        ?>
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
            <?php //echo $itineraryModel->getAttributeLabel('ports_of_calls');  ?>: <br/>
            <b>
            <?php //echo $cookies['display'][9];  ?>
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/card-form.js"></script>
