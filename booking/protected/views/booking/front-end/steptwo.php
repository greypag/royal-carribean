<?php
$isnt_EN = Yii::app()->language == 'en' ? true : false;
Yii::app()->royalCaribbeanHelper->echoTimerScript($twentyTimeStamp);
$nowTimeStamp = strtotime("now");
?>

<?php include 'tracking_tag_transaction.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 4 - Information (Step 2)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/booking/index.php/booking/steptwo
This tag must be placed between the body tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt4-0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt4-0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<?php
$session=new CHttpSession;
$session->open();

$session->close();
?>

<div class="header">
    <ul>
        <li class="stepone"><span></span><?php echo Yii::t('booking', 'Cruise'); ?><div class="next"></div></li>
        <li class="steptwo current"><span></span><?php echo Yii::t('booking', 'Information'); ?><div class="next"></div></li>
        <li class="stepthree"><span></span><?php echo Yii::t('booking', 'Review'); ?><div class="next"></div></li>
        <li class="stepfour"><span></span><?php echo Yii::t('booking', 'Payment'); ?></li>
        <li class="clearboth"></li>
    </ul>
</div>

<div class="content">


    <div class="col_left">
        <div class="form">

            <?php
            $form = $this->beginWidget('GxActiveForm', array(
                'id' => 'guest-form',
                    //'enableClientValidation' => true,
                    //'enableAjaxValidation' => true,
                    /*
                      'clientOptions' => array(
                      'validateOnSubmit' => true,
                      'afterValidate' => 'js:function(form,data,hasError){

                      console.log("hi");
                      if(hasError){
                      console.log(data);
                      }
                      }'
                      ), */
                    //'enableAjaxValidation' => false,
                    //'action' => Yii::app()->createUrl('booking/stepthree'), //<- your form action here
            ));
            ?>
            <?php echo CHtml::hiddenField('Others[ajax]', 'true'); ?>
            <?php
            $adult = $cookies[4];
            $child = $cookies[5];

            for ($i = 0; $i < ($adult + $child); $i++) {

                $formObj = (!is_null($formModelData)) ? $formModelData[$i] : $formModel;
                //CVarDumper::dump($formObj, 10, true);
                //CVarDumper::dump($formModelData[$i], 10, true);
                //CVarDumper::dump(!is_null($formModelData[$i]), 10, true);
                //echo $form->errorSummary($formObj, Yii::t('booking', 'Please fill in the required information.'));
                echo $form->errorSummary($formObj);
                ?>

                <div class="guests row">
                    <div class="row title">
                        <h1>
                            <?php
							echo Yii::t('booking', 'Guest');
                            echo $i + 1;
                            /*
                              if ($i < $adult) {
                              echo ' (Adult)';
                              } else {
                              echo ' (Children)';
                              } */
                            ?>
                        </h1>
                        <span class="right">* <?php echo Yii::t('booking', 'Required Information'); ?></span>
                        <hr />
                    </div>

                    <div class="row">
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']title'); ?>
							*<?php echo Yii::t('booking', 'Title'); ?><br/>
                            <?php
                            echo CHtml::activeDropDownList($formObj, '[' . $i . ']title', array('Miss' => 'Miss', 'Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms'), array(
                                'style' => 'width:60px'));
                            ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']title'); ?>
                        </div>
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']first_name'); ?>
							*<?php echo Yii::t('booking', 'First Name'); ?><br/>
                            <?php echo $form->textField($formObj, '[' . $i . ']first_name', array('maxlength' => 32, 'style' => 'width:152px')); ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']first_name'); ?>
                        </div>
                        <!--
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']middle_name'); ?><br/>
                            <?php //echo $form->textField($formObj, '[' . $i . ']middle_name', array('maxlength' => 32, 'style' => 'width:152px')); ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']middle_name'); ?>
                        </div>
                        -->
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']last_name'); ?>
							*<?php echo Yii::t('booking', 'Last Name'); ?><br/>
                            <?php echo $form->textField($formObj, '[' . $i . ']last_name', array('maxlength' => 32, 'style' => 'width:152px')); ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']last_name'); ?>
                        </div>
                        <div class="clear"></div>
                    </div><!-- row -->
                    <div class="row">

                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']gender'); ?>
							*<?php echo Yii::t('booking', 'Gender'); ?><br/>
                            <?php
                            echo CHtml::activeDropDownList($formObj, '[' . $i . ']gender', array('F' => 'F', 'M' => 'M'), array(
                                'style' => 'width:60px'));
                            ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']gender'); ?>
                        </div>
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']date_of_birth'); ?>
							*<?php echo Yii::t('booking', 'Date of Birth'); ?><br/>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $formObj,
                                'attribute' => '[' . $i . ']date_of_birth',
                                'options' => array(
                                    'changeDay' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                    'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                                    //'minDate' => '+1d', //day can choose >= tomorrow
                                    'maxDate' => '-0d', //day can choose >= tomorrow
                                    'yearRange' => '-100y:c',
                                //'defaultDate' => '-20y'
                                ),
                                'htmlOptions' => array(
                                    'class' => 'datePicker',
                                    'id' => 'datePicker_' . $i . $nowTimeStamp
                                ),
                            ));
                            ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']date_of_birth'); ?>
                        </div>
                        <div class="clear"></div>
                    </div><!-- row -->

                    <div class="row">
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']phone_no'); ?>
							*<?php echo Yii::t('booking', 'Mobile number'); ?><br/>
                            <?php echo $form->textField($formObj, '[' . $i . ']phone_no', array('style' => 'width:270px')); ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']phone_no'); ?>
                        </div>
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']email'); ?>
							*<?php echo Yii::t('booking', 'Email'); ?><br/>
                            <?php echo $form->textField($formObj, '[' . $i . ']email', array('maxlength' => 64, 'style' => 'width:270px')); ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']email'); ?>
                        </div>
                        <div class="clear"></div>
                    </div><!-- row -->

                    <div class="row">
                        <div class="col">
                            <?php //echo $form->labelEx($formObj, '[' . $i . ']citizenship'); ?>
							*<?php echo Yii::t('booking', 'Citizenship'); ?><br/>
                            <?php
                            echo CHtml::activeDropDownList($formObj, '[' . $i . ']citizenship', array(
                                'ARG' => 'Argentina',
                                'AUS' => 'Australia',
                                'BRA' => 'Brazil',
                                'CAN' => 'Canada',
                                'DNK' => 'Denmark',
                                'FRA' => 'France',
                                'DEU' => 'Germany',
                                'ITA' => 'Italy',
                                'NOR' => 'Norway',
                                'GBR' => 'United Kingdom',
                                'USA' => 'United States',
                                'AFG' => 'Afghanistan',
                                'ALB' => 'Albania',
                                'DZA' => 'Algeria',
                                'ASM' => 'American Samoa',
                                'AND' => 'Andorra',
                                'AGO' => 'Angola',
                                'AIA' => 'Anguilla',
                                'ATA' => 'Antarctica',
                                'ATG' => 'Antigua And Barbuda',
                                'ARM' => 'Armenia',
                                'ABW' => 'Aruba',
                                'AUT' => 'Austria',
                                'AZE' => 'Azerbaijan',
                                'BHS' => 'Bahamas',
                                'BHR' => 'Bahrain',
                                'BGD' => 'Bangladesh',
                                'BRB' => 'Barbados',
                                'BLR' => 'Belarus',
                                'BEL' => 'Belgium',
                                'BLZ' => 'Belize',
                                'BEN' => 'Benin',
                                'BMU' => 'Bermuda',
                                'BTN' => 'Bhutan',
                                'BOL' => 'Bolivia',
                                'BON' => 'Bonaire',
                                'BIH' => 'Bosnia And Herzegovina',
                                'BWA' => 'Botswana',
                                'BVT' => 'Bouvet Island',
                                'IOT' => 'British Indian Ocean',
                                'BRN' => 'Brunei Darussalam',
                                'BGR' => 'Bulgaria',
                                'BFA' => 'Burkina Faso',
                                'BUR' => 'Burma',
                                'BDI' => 'Burundi',
                                'KHM' => 'Cambodia',
                                'CMR' => 'Cameroon',
                                'CPV' => 'Cape Verde Islands',
                                'CYM' => 'Cayman Islands',
                                'CAF' => 'Central African Repu',
                                'TCD' => 'Chad Republic',
                                'CHL' => 'Chile',
                                'CHN' => 'China',
                                'CXR' => 'Christmas Island',
                                'CCK' => 'Cocos Keeling Island',
                                'COL' => 'Colombia',
                                'COM' => 'Comoros',
                                'COK' => 'Cook Islands',
                                'CRI' => 'Costa Rica',
                                'CIV' => 'Cote Divoire',
                                'HRV' => 'Croatia',
                                'CUR' => 'Curacao',
                                'CYP' => 'Cyprus',
                                'CZE' => 'Czech Republic',
                                'DJI' => 'Djibouti',
                                'DMA' => 'Dominica',
                                'DOM' => 'Dominican Republic',
                                'UAE' => 'Dubai',
                                'TMP' => 'East Timor',
                                'ECU' => 'Ecuador',
                                'EGY' => 'Egypt',
                                'SLV' => 'El Salvador',
                                'GNQ' => 'Equatorial Guinea',
                                'ERI' => 'Eritrea',
                                'EST' => 'Estonia',
                                'ETH' => 'Ethiopia',
                                'FRO' => 'Faeroe Islands',
                                'FLK' => 'Falkland Islands',
                                'FJI' => 'Fiji Islands',
                                'FIN' => 'Finland',
                                'GUF' => 'French Guiana',
                                'PYF' => 'French Polynesia',
                                'ATF' => 'French South. Territ',
                                'GAB' => 'Gabon',
                                'GMB' => 'Gambia',
                                'GEO' => 'Georgia',
                                'GHA' => 'Ghana',
                                'GIB' => 'Gibraltar',
                                'GRC' => 'Greece',
                                'GRL' => 'Greenland',
                                'GRD' => 'Grenada',
                                'GLP' => 'Guadeloupe',
                                'GUM' => 'Guam',
                                'GTM' => 'Guatemala',
                                'GIN' => 'Guinea',
                                'GNB' => 'Guinea-Bissau',
                                'GUY' => 'Guyana',
                                'HTI' => 'Haiti',
                                'HMD' => 'Heard & Mcdonald Isl',
                                'HND' => 'Honduras',
                                'HKG' => 'Hong Kong',
                                'HUN' => 'Hungary',
                                'ISL' => 'Iceland',
                                'IND' => 'India',
                                'IDN' => 'Indonesia',
                                'IRQ' => 'Iraq',
                                'IRL' => 'Ireland',
                                'ISR' => 'Israel',
                                'JAM' => 'Jamaica',
                                'JPN' => 'Japan',
                                'JOR' => 'Jordan',
                                'KAZ' => 'Kazakhstan',
                                'KEN' => 'Kenya',
                                'KIR' => 'Kiribati',
                                'KWT' => 'Kuwait',
                                'KGZ' => 'Kyrgyzstan',
                                'LAO' => 'Laos',
                                'LVA' => 'Latvia',
                                'LBN' => 'Lebanon',
                                'LSO' => 'Lesotho',
                                'LBR' => 'Liberia',
                                'LBY' => 'Libya',
                                'LIE' => 'Liechtenstein',
                                'LTU' => 'Lithuania',
                                'LUX' => 'Luxembourg',
                                'MAC' => 'Macao',
                                'MCD' => 'Macedonia',
                                'MDG' => 'Madagascar',
                                'MWI' => 'Malawi',
                                'MYS' => 'Malaysia',
                                'MDV' => 'Maldives',
                                'MLI' => 'Mali Republic',
                                'MLT' => 'Malta',
                                'MHL' => 'Marshall Islands',
                                'MTO' => 'Martinique',
                                'MRT' => 'Mauritania',
                                'MUS' => 'Mauritius',
                                'MYT' => 'Mayotte Island',
                                'FXX' => 'Metropolitan France',
                                'MEX' => 'Mexico',
                                'FSM' => 'Micronesia',
                                'MDA' => 'Moldova',
                                'MCO' => 'Monaco',
                                'MNG' => 'Mongolian People\'s R',
                                'MNE' => 'Montenegro',
                                'MSR' => 'Montserrat',
                                'MAR' => 'Morocco',
                                'MOZ' => 'Mozambique',
                                'MMR' => 'Myanmar',
                                'NAM' => 'Namibia',
                                'NRU' => 'Nauru',
                                'NPL' => 'Nepal',
                                'NLD' => 'Netherlands',
                                'ANT' => 'Netherlands Antilles',
                                'NCL' => 'New Caledonia',
                                'NZL' => 'New Zealand',
                                'NIC' => 'Nicaragua',
                                'NGA' => 'Nigeria',
                                'NIU' => 'Niue',
                                'NFK' => 'Norfolk Island',
                                'MNP' => 'Northern Mariana Isl',
                                'OMN' => 'Oman',
                                'PAK' => 'Pakistan',
                                'PLW' => 'Palau',
                                'PSE' => 'Palestine                ',
                                'PAN' => 'Panama',
                                'PNG' => 'Papua New Guinea',
                                'PAR' => 'Paracel Islands',
                                'PRY' => 'Paraguay',
                                'PER' => 'Peru',
                                'PHL' => 'Philippines',
                                'PCN' => 'Pitcairn Islands',
                                'POL' => 'Poland',
                                'PRT' => 'Portugal',
                                'PRI' => 'Puerto Rico',
                                'QAT' => 'Qatar',
                                'COG' => 'Republic Of Congo',
                                'YMD' => 'Republic Of Yemen',
                                'REU' => 'Reunion Island',
                                'ROM' => 'Romania',
                                'RUE' => 'Russia',
                                'RWA' => 'Rwanda',
                                'SGS' => 'S. Georgia/S. Sandwich Is',
                                'SHN' => 'Saint Helena',
                                'KNA' => 'Saint Kitts & Nevis',
                                'LCA' => 'Saint Lucia',
                                'SPM' => 'Saint Pierre & Miquelon',
                                'WSM' => 'Samoa (Western Ind S',
                                'SMR' => 'San Marino',
                                'STP' => 'Sao Tome And Princip',
                                'SAU' => 'Saudi Arabia',
                                'SEN' => 'Senegal Republic',
                                'SRB' => 'Serbia',
                                'SYC' => 'Seychelles Islands',
                                'SLE' => 'Sierra Leone',
                                'SGP' => 'Singapore',
                                'SVK' => 'Slovakia',
                                'SVN' => 'Slovenia',
                                'SLB' => 'Solomon Islands',
                                'SOM' => 'Somalia',
                                'ZAF' => 'South Africa',
                                'KOR' => 'South Korea',
                                'ESP' => 'Spain',
                                'SPR' => 'Spratley Islands',
                                'LKA' => 'Sri Lanka',
                                'STK' => 'St. Kitts',
                                'STM' => 'St. Maarten',
                                'VCT' => 'St Vincent & Grenadi',
                                'SUR' => 'Suriname',
                                'SJM' => 'Svalbard & Jan Mayen Is',
                                'SWZ' => 'Swaziland',
                                'SWE' => 'Sweden',
                                'CHS' => 'Switzerland',
                                'TWN' => 'Taiwan',
                                'TJK' => 'Tajikistan',
                                'TZA' => 'Tanzania',
                                'THA' => 'Thailand',
                                'TGO' => 'Togo',
                                'TKL' => 'Tokelau',
                                'TON' => 'Tonga Islands',
                                'TTO' => 'Trinidad And Tobago',
                                'TUN' => 'Tunisia',
                                'TUR' => 'Turkey',
                                'TKM' => 'Turkmenistan',
                                'TCA' => 'Turks And Caicos Isl',
                                'TUV' => 'Tuvalu',
                                'UMI' => 'U.S. Minor Out Islands',
                                'UGA' => 'Uganda',
                                'UKR' => 'Ukraine',
                                'ARE' => 'United Arab Emirates',
                                'URY' => 'Uruguay',
                                'UZB' => 'Uzbekistan',
                                'VUT' => 'Vanuatu',
                                'VAT' => 'Vatican City',
                                'VEN' => 'Venezuela',
                                'VNM' => 'Vietnam',
                                'VGB' => 'Virgin Islands (Brit',
                                'VIR' => 'Virgin Islands (U.S.',
                                'WLF' => 'Wallis And Futuna Is',
                                'ESH' => 'Western Sahara',
                                'YEM' => 'Yemen',
                                'YUG' => 'Yugoslavia',
                                'ZAR' => 'Zaire',
                                'ZMB' => 'Zambia',
                                'ZWE' => 'Zimbabwe',
                                    )
                                    , array(
                                'options' => array('HKG' => array('selected' => 'selected')),
                                'style' => 'width:270px'));
                            ?>
                            <?php //echo $form->error($formObj, '[' . $i . ']citizenship'); ?>
                        </div>

                        <?php //echo $form->hiddenField($formObj, '[' . $i . ']document_type', array('value' => 'Passport'));      ?>

                        <?php //echo $form->labelEx($formObj, '[' . $i . ']document_number'); ?>
						<?php //echo Yii::t('booking', 'Passport Number'); ?><br/>
                        <?php
						/*
                        echo $form->textField($formObj, '[' . $i . ']document_number', array('maxlength' => 32,
                            'style' => 'width:270px'));
							*/
                        ?>
                        <?php //echo $form->error($formObj, '[' . $i . ']document_number'); ?>
                    </div><!-- row -->
                </div>
                <?php
            }
            ?>
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
					if ($isnt_EN) {
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png', array('class' => 'ajaxBtn', 'data-url' => Yii::app()->createAbsoluteUrl("booking/steptwo"), 'data-nexturl' => Yii::app()->createAbsoluteUrl("booking/stepthree")));
					}else{
						echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png', array('class' => 'ajaxBtn', 'data-url' => Yii::app()->createAbsoluteUrl("booking/steptwo"), 'data-nexturl' => Yii::app()->createAbsoluteUrl("booking/stepthree")));
					}
					?>
					<?php
                    //echo GxHtml::submitButton(Yii::t('booking', 'test'), array('class' => 'ajaxBtn', 'data-url'=> Yii::app()->createAbsoluteUrl("booking/steptwo")));
                    // echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/steptwo'), array('class' => 'ajaxBtn', 'data-url' => Yii::app()->createAbsoluteUrl("booking/steptwo")));
                    //echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png');
                    //echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/steptwo'));
                    ?>
                </span>
            </div>
        </div><!-- form -->
        <?php
        $this->endWidget();
        ?>
    </div>

    <div class="col_right">
        <div class="box">
            <h2><?php echo Yii::t('booking', 'YOUR CRUISE'); ?></h2>
            <hr/>
            <?php //echo $itineraryModel->getAttributeLabel('port_of_departure');
			echo Yii::t('booking', 'Port of Departure');
			?>: <br/>
            <b><?php echo $cookies[0]; ?></b>
            <hr/>
            <!--
            <?php //echo $itineraryModel->getAttributeLabel('ports_of_calls');   ?>: <br/>
            <b>
            <?php //echo $cookies['display'][9];   ?>
            </b>
            <hr/>-->
            <?php echo Yii::t('booking', 'Itinerary'); ?>:<br/>
            <b><?php echo $cookies[1]; ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Sailing Date'); ?>:<br/>
            <b><?php echo $cookies[2]; ?></b> - <br/>
            <b><?php echo $cookies[3]; ?></b>
            <br/>
            <?php
            echo $cookies[10];
            ?>
            <hr/>
            <?php echo Yii::t('booking', 'Total No. of Guests'); ?>:<br/>
            <?php echo Yii::t('booking', 'Adults'); ?>: <span id="dynamic_adults" class="dynamic_contant"><?php echo $cookies[4]; ?></span><br/>
            <?php echo Yii::t('booking', 'Children'); ?>:  <span id="dynamic_child" class="dynamic_contant"><?php echo $cookies[5]; ?></span>
            <hr/>
            <?php echo Yii::t('booking', 'Ship'); ?>:<br/>
            <b><?php echo $cookies[6]; ?></b>
            <hr/>
            <?php echo Yii::t('booking', 'Stateroom Category'); ?>:<br/>
            <span id="dynamic_stateroom" class="dynamic_contant"><?php echo $cookies[7]; ?></span>
            <hr/>
            <h3><?php echo Yii::t('booking', 'Total'); ?>:</h3>
            <span style="
                  font-size: 12px;
                  "><?php echo Yii::t('booking', '(include taxes, fees and port expenses)'); ?>
            </span>
            <div class="price">
                <b>$</b> <h2 id="totalPrice"><?php echo $session['session_total']; ?></h2> <b> <?php echo Yii::t('booking', 'HKD');?></b>
            </div>
            <div class="remark">
                <!--View Summary of Charges,<br/>
                Special requests amound<br/> maybe altered.-->
            </div>

        </div>
    </div>
    <div class="clear"></div>
</div>
