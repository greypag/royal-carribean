<script>

    price_obj = {
        'currency-all': 'HK$X off per person - all',
        'currency-onetwo': 'HK$X off per person - 1st and 2nd berth',
        'currency-threefour': 'HK$X off per person - 3rd and 4th berth',
        'percentage-all': 'X% off - all',
        'percentage-onetwo': 'X% off - 1st and 2nd berth',
        'percentage-threefour': 'X% off - 3rd and 4th berth',
    }

    preset_obj = {
        'cruisefare-threefour': '3rd and 4th berth waive cruise fare ',
        'cruisefare-two': '2nd person waive cruise fare',
        'cruisefare_50percent-two': '2nd person half price',
    }
    flexible_discount_obj = {
        'flexible-discount' : 'flexible discount'
    }
    function dropdown_showValue(value) {
        /*
         console.log(typeof (preset_obj[value]) === "string");
         console.log(typeof(price_obj[value]) === "undefined");
         console.log("===================");
         */

        if (value == '') {
            $('.row.flexible_discount').slideUp();
            $('.row.figure_per_guest').slideUp();
            $('.row.non_pricing_notes').slideUp();
        } else {
            if (typeof (flexible_discount_obj[value]) === "string") {
                $('.row.flexible_discount').slideDown();
                $('.row.figure_per_guest').slideUp();
                $('.row.non_pricing_notes').slideUp();
            }
            else if (typeof (preset_obj[value]) === "string") {
                $('.row.flexible_discount').slideUp();
                $('.row.figure_per_guest').slideUp();
                $('.row.non_pricing_notes').slideUp();
            } else {

                if (typeof (price_obj[value]) === "string") {
                    $('.row.flexible_discount').slideUp();    
                    $('.row.figure_per_guest').slideDown();
                    $('.row.non_pricing_notes').slideUp();
                } else {
                    $('.row.flexible_discount').slideUp();   
                    $('.row.figure_per_guest').slideUp();
                    $('.row.non_pricing_notes').slideDown();
                }
            }
        }
    }

    function changeDiscountType(value,type,number){
        document.getElementById("PromotionCode_" + type + "_discount_" + number + "_type").value = value;
    }

</script>

<div class="form">


    <?php
    $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'promotion-code-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>


    <table style="margin: 0px;">
        <tbody>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'promotion_id'); ?>
                    <?php echo $form->textField($model, 'promotion_id', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'promotion_id'); ?>

                </td>
                <td>
                    <?php echo $form->labelEx($model, 'promotion_code'); ?>
                    <?php //echo $form->textField($model, 'promotion_code', array('maxlength' => 32, 'readonly' => true)); ?>
                    <?php echo $form->textField($model, 'promotion_code', array('maxlength' => 32)); ?>
                    <?php echo $form->error($model, 'promotion_code'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'promotion_name'); ?>
                    <?php echo $form->textArea($model, 'promotion_name', array('maxlength' => 512, 'rows' => 6, 'cols' => 40)); ?>
                    <?php echo $form->error($model, 'promotion_name'); ?>
                </td>
                <td>
                    <?php echo $form->labelEx($model, 'promotion_name_tc'); ?>
                    <?php echo $form->textArea($model, 'promotion_name_tc', array('maxlength' => 512, 'rows' => 6, 'cols' => 40)); ?>
                    <?php echo $form->error($model, 'promotion_name_tc'); ?>
                </td>
            </tr>
    </table>


    <div class="row">
        <?php echo $form->labelEx($model, 'quota'); ?> 
        <?php
        $readonly = array('readonly' => 'readonly');
        if ($model->isNewRecord) {

            $readonly = '';
        }
        echo $form->textField($model, 'quota', $readonly);
        //echo i$model->isNewRecord;
        ?><br/>
        <!-- If you update this value, the accumulate_quota field will be synchronized automatically.-->
        <?php echo $form->error($model, 'quota'); ?>
    </div><!-- row -->

    <div class="row">

        <table style="margin: 0px;">
            <tbody>
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
                                'changeMonth' => true,
                                'changeYear' => true,
                                'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                                'minDate' => 'd', //day can choose >= tomorrow
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
                                'changeMonth' => true,
                                'changeYear' => true,
                                'dateFormat' => Yii::app()->params->dateFormat['display_long'],
                                'minDate' => '+1d', //day can choose >= tomorrow
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model, 'end_date'); ?>
                    </td>
                </tr>
        </table>
    </div><!-- row -->



    <div class="row">
        <?php echo $form->hiddenField($model, 'accumulate_quota'); ?>
    </div><!-- row -->


    <hr/>
    <table>
        <tbody>

            <tr>
                <th style="padding: 0px;" width="50%"></th>
                <th style="padding: 0px;" width="50%"></th>
            </tr>

            <tr>
                <td style="vertical-align: top;">
                    <?php echo $form->labelEx($model, 'type'); ?>
                    <?php
                    echo $form->dropDownList($model, 'type', array(/*
                          'currency' => 'Fixed Currency',
                          'percentage' => 'Fixed Percentage',
                          'nonpricing' => 'Non Pricing Notes'
                         */
                        'flexible-discount' => 'Flexible Discount',
                        'currency-all' => 'HK$X off per person - all',
                        'currency-onetwo' => 'HK$X off per person - 1st and 2nd berth',
                        'currency-threefour' => 'HK$X off per person - 3rd and 4th berth',
                        'percentage-all' => 'X% off - all',
                        'percentage-onetwo' => 'X% off - 1st and 2nd berth',
                        'percentage-threefour' => 'X% off - 3rd and 4th berth',
                        'cruisefare-threefour' => '3rd and 4th berth waive cruise fare ',
                        'cruisefare_50percent-two' => '2nd person half price',
                        'cruisefare-two' => '2nd person waive cruise fare',
                        'others' => 'Non Pricing',
                            ), array(
                        'onchange' => 'dropdown_showValue(this.value)',
                        'empty' => '-- Please select a promotion type --'
                            )
                    );
                    ?>
                    <?php echo $form->error($model, 'type'); ?>
                </td>
                <td style="vertical-align: top;">
                    <?php echo $form->labelEx($model, 'itinerary_id'); ?>
                    <?php
                    //if (!$model->isNewRecord) {
                    echo CHtml::activedropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAll(), 'itinerary_id', array('itinerary_id', 'itinerary_name')), array(
                        'class' => 'form-control',
                        //'prompt' => 'Select a cruise',
                        'ajax' => array(
                            'url' => $this->createUrl('ServiceGetAllRoomType'), // it is selected at MyHtml::ajax() which URL to use
                            'type' => 'GET',
                            'success' => 'function(data){
                                    $(".row.checkboxlist").show();
                                    var dynamicContent = $("#Stateroom-list");
                                    dynamicContent.hide().html(data).slideToggle();
                                    //console.log(data.renderedHtml);
                                }',
                            'data' => array('itinerary_id' => 'js:this.value', 'promotion_id' => $model->promotion_id),
                        ),
                        'empty' => '-- Please select an itinerary  --'
                    ));
                    /*
                      } else {
                      echo CHtml::activedropDownList($model, 'itinerary_id', GxHtml::listDataEx(Itinerary::model()->findAll(array(
                      )), 'itinerary_id', array('itinerary_id', 'itinerary_name')), array(
                      'empty' => '-- Please select an itinerary  --')
                      );
                      }
                     */
                    ?>
                    <?php echo $form->error($model, 'itinerary_id'); ?>
                </td><!-- row -->
            </tr>
            <tr>
                <td><br/></td>
                <td></td>
            </tr>
            <tr>
                <td style="vertical-align: top;">

                    <?php
                    $figure_per_guest = '';
                    $non_pricing_notes = '';
                    $flexible_discount = '';

//CVarDumper::dump($others['presetPromotion'], 10, true);
//CVarDumper::dump($model->type, 10, true);





                    if (is_null($model->type) || in_array($model->type, $others['presetPromotion'])) {
                        $non_pricing_notes = 'display: none;';
                        $figure_per_guest = 'display: none;';
                        $flexible_discount = 'display: none;';
                    } else if ($model->type == 'flexible-discount') {
                        $non_pricing_notes = 'display: none;';
                        $figure_per_guest = 'display: none;';
                    } else {
                        if (in_array($model->type, $others['pricingPromotion'])) {
                            $flexible_discount = 'display: none;';
                            $non_pricing_notes = 'display: none;';
                        } else {
                            $flexible_discount = 'display: none;';
                            $figure_per_guest = 'display: none;';
                        }
                    }
                    ?>
                    <div class="row flexible_discount" style="<?php echo $flexible_discount; ?>">
                        <?php echo $form->labelEx($model, 'flexible_discount'); ?>
                        <table>
                        <tr>
                            <td colspan='2'></td>
                            <td colspan='2'>
                                 <?php echo $form->labelEx($model, 'ccf'); ?>
                            </td>
                            <td colspan='3'>
                                 <?php echo $form->labelEx($model, 'nccf'); ?>
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <?php echo $form->labelEx($model, 'guest_1'); ?>
                            </td>
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'ccf_discount_1_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td >    
                                <?php echo $form->textField($model, 'flexible_discount_ccf_1', array('size' => 1)); ?>
                            </td>
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'nccf_discount_1_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td >                                 
                                <?php echo $form->textField($model, 'flexible_discount_nccf_1', array('size' => 1)); ?>
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <?php echo $form->labelEx($model, 'guest_2'); ?>
                            </td>                        
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'ccf_discount_2_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                         
                                <?php echo $form->textField($model, 'flexible_discount_ccf_2', array('size' => 1)); ?>
                            </td>
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'nccf_discount_2_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                                    
                                <?php echo $form->textField($model, 'flexible_discount_nccf_2', array('size' => 1)); ?>
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <?php echo $form->labelEx($model, 'guest_3'); ?>
                            </td>                        
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'ccf_discount_3_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                     
                                <?php echo $form->textField($model, 'flexible_discount_ccf_3', array('size' => 1)); ?>
                            </td>
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'nccf_discount_3_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                                      
                                <?php echo $form->textField($model, 'flexible_discount_nccf_3', array('size' => 1)); ?>
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <?php echo $form->labelEx($model, 'guest_4'); ?>
                            </td>                        
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'ccf_discount_4_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                       
                                <?php echo $form->textField($model, 'flexible_discount_ccf_4', array('size' => 1)); ?>
                            </td>
                            <td width="10px">
                                <?php
                                echo $form->dropDownList($model, 'nccf_discount_4_type', array(/*
                                      'currency' => 'Fixed Currency',
                                      'percentage' => 'Fixed Percentage',
                                      'nonpricing' => 'Non Pricing Notes'
                                     */
                                    '%' => '%',
                                    '$' => '$'
                                        )
                                );
                                ?>
                            </td>
                            <td>                                      
                                <?php echo $form->textField($model, 'flexible_discount_nccf_4', array('size' => 1)); ?>
                            </td>                    
                        </tr>                                                                     
                        </table>                 
                    </div>
                    <div class="row figure_per_guest" style="<?php echo $figure_per_guest; ?>">
                        <?php echo $form->labelEx($model, 'figure_per_guest'); ?>
                        <?php echo $form->textField($model, 'figure_per_guest'); ?>
                        <br/>
                        When using $X off while this input box is 50, means -$50<br/>
                        When using X% off while this input box is 50, means 50%

                        <?php echo $form->error($model, 'figure_per_guest'); ?>
                    </div><!-- row -->

                    <div class="row non_pricing_notes" style="<?php echo $non_pricing_notes; ?>">
                        <?php echo $form->labelEx($model, 'non_pricing_notes'); ?>
                        <?php echo $form->textArea($model, 'non_pricing_notes', array('rows' => 6, 'cols' => 40)); ?>
                        <?php echo $form->error($model, 'non_pricing_notes'); ?>
                    </div><!-- row -->
                </td>
                <td class="row checkboxlist" style="vertical-align: top;">


                    <div id="Stateroom-list">
                        <?php
                        if (!$model->isNewRecord) {
                            PromotionCodeController::actionServiceGetAllRoomType($model->itinerary_id, $model->promotion_id);
                        }
                        ?>
                    </div>
                </td>
            </tr><!-- row -->
        </tbody>
    </table>

    <hr/>
    <div class="row">
        <?php echo $form->labelEx($model, 'internal_notes'); ?>
        <?php
        Yii::app()->royalCaribbeanHelper->echoTinyMCE($model, 'internal_notes');
        ?>
        <?php echo $form->error($model, 'internal_notes'); ?>
    </div><!-- row -->

    <?php
    echo GxHtml::submitButton(Yii::t('app', $model->isNewRecord ? 'Create' : 'Update'));
    //echo GxHtml::submitButton(Yii::t('app', 'Update'));
    $this->endWidget();
    ?>
</div><!-- form -->

