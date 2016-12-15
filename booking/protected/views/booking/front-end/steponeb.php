<script>
    $('document').ready(function () {

        $('.inner >.main-container>.content>.col_left .form .row.buttons>.next').on('click', function (e) {


            if (!$('#agree_terms').is(':checked')) {
                e.preventDefault();
                alert('<?php echo Yii::t('booking', 'Required filed: Please read and accept the terms & conditions.'); ?>');
            }
        })
    });
</script>
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
    //CVarDumper::dump($model, 10, true);
    /*
      CVarDumper::dump(ItineraryRoomType::model()->with('rt')->findAll(
      array(
      //'condition' => 'language="' . Yii::app()->params->language . '"',
      'condition' => 't.itinerary_id="' . $itinerary_ID . '"',
      )), 10, true);
     */
    $isnt_EN = Yii::app()->language == 'en' ? true : false;
    $date_format = $isnt_EN ? Yii::app()->params->dateFormat['display_StepLong'] : Yii::app()->params->dateFormat['display_StepLong_TC'];
    $col_span = $others['total_guest'] + 1;
    $cruiseFare_total = 0;
    $ncff_total = 0;
    $subtotal = 0;
    $taxes_port_total = 0;
    $promotion_total = 0;
    $total = 0;

    $single_Supplement = 0;
    $guest_price = array();

    $itineraryModel__NCFF_Unformated = Yii::app()->format->unformatNumber($itineraryModel->ncff);
    ?>


    <div class="col_left">
        <div class="form">
            <div class="row title">
                <h1><?php echo Yii::t('booking', 'Payment Breakdown'); ?></h1> (HK$)
            </div>
            <div class="row">
                <table class="price_table">
                    <tbody>
                        <tr>
                            <th width="<?php echo 6 - ($others['total_guest']); ?>0%" class="title"><?php echo Yii::t('booking', 'Cruise Fare'); ?></th>
                            <?php
                            for ($i = 1; $i <= $others['total_guest']; $i++) {
                                ?>
                                <th><?php echo Yii::t('booking', 'Guest'); ?> <?php echo $i; ?></th>
                                <?php
                            }
                            ?>
                            <th><?php echo Yii::t('booking', 'Total'); ?></th>
                        </tr>
                        <tr>
                            <td class="normal"><?php echo Yii::t('booking', 'Cruise Fare'); ?></td>
                            <?php
                            if ($others['total_guest'] == 1) {
                                $single_Supplement = Yii::app()->format->calculateSingleSupplement($roomModelData, $itineraryModel);
                            }

                            for ($i = 1; $i <= $others['total_guest']; $i++) {
                                $price = ($i <= 2) ? $roomModelData->fare_guest1_2 : $roomModelData->fare_guest3_4;
                                $cruiseFare_total = $cruiseFare_total + $price + $itineraryModel__NCFF_Unformated;
                                ?>
                                <td><?php echo Yii::app()->format->formatNumber($price + $itineraryModel__NCFF_Unformated); ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo Yii::app()->format->formatNumber($cruiseFare_total); ?></td>
                        </tr>
                        <!--
                        <tr>
                            <td class="normal">NCFF</td>
                        <?php
                        for ($i = 1; $i <= $others['total_guest']; $i++) {
                            $ncff_total = $ncff_total + $itineraryModel__NCFF_Unformated;
                            ?>
                                                                    <td><?php //echo $itineraryModel->ncff;          ?></td>
                            <?php
                        }
                        ?>
                            <td><?php //echo Yii::app()->format->formatNumber($ncff_total);          ?></td>
                        </tr>
                        -->
                        <?php
                        if ($others['total_guest'] == 1) {
                            ?>
                            <tr>
                                <td class="normal"><?php echo Yii::t('booking', 'Single Supplement'); ?></td>
                                <td><?php echo Yii::app()->format->formatNumber($single_Supplement); ?></td>
                                <td><?php echo Yii::app()->format->formatNumber($single_Supplement); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <!--
                        <tr>
                            <td class="normal">Subtotal</td>
                        <?php
                        for ($i = 1; $i <= $others['total_guest']; $i++) {

                            $price = ($i <= 2) ? $roomModelData->fare_guest1_2 : $roomModelData->fare_guest3_4;
                            $price = $price + $itineraryModel__NCFF_Unformated + $single_Supplement;
                            $subtotal = $subtotal + $price;
                            $guest_price[$i] = $price;
                            ?>
                                                                    <td><?php //echo Yii::app()->format->formatNumber($price);          ?></td>
                            <?php
                        }
                        ?>
                            <td><?php //echo Yii::app()->format->formatNumber($subtotal);          ?></td>
                        </tr>
                        -->
                        <tr>
                            <td COLSPAN=<?php echo $col_span; ?>  class="title"><?php echo Yii::t('booking', 'Taxes, Fees and Port Expenses'); ?></td>
                            <td class="title"></td>
                        </tr>
                        <tr>
                            <td class="normal"><?php echo Yii::t('booking', 'Taxes, Fees and Port Expenses'); ?></td>
                            <?php
                            $taxes_fee = Yii::app()->format->unformatNumber($itineraryModel->taxes_fee);
                            $port_expenses = Yii::app()->format->unformatNumber($itineraryModel->port_expenses);
                            for ($i = 1; $i <= $others['total_guest']; $i++) {
                                //$price = $taxes_fee + $port_expenses;    26-5-2015 taxes_fee = Taxes, Fees and Port Expenses
                                $price = $taxes_fee;
                                $taxes_port_total = $taxes_port_total + $price;
                                $guest_price[$i] = $guest_price[$i] + $price;
                                ?>
                                <td><?php echo Yii::app()->format->formatNumber($price); ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo Yii::app()->format->formatNumber($taxes_port_total); ?></td>
                        </tr>
                        <?php
                        //CVarDumper::dump($promotionCode, 10, true);

                        if (isset($promotionCode)) { //Promotion code
                            ?>
                            <tr>
                                <td COLSPAN=<?php echo $col_span; ?>  class="title"><?php echo Yii::t('booking', 'Promotion Offer'); ?></td>
                                <td class="title"></td>
                            </tr>
                            <tr>
                                <td class="normal">* <?php echo Yii::t('booking', 'Promotion Code'); ?> <br/> <?php echo $promotionCode->promotion_code; ?></td>
                                <?php
                                //$port_expenses = Yii::app()->format->unformatNumber($model->port_expenses);


                                $promotionCode_type = $promotionCode->type;

                                $promotionCode_array = Yii::app()->format->definePromotionCode($promotionCode->type);
                                for ($i = 1; $i <= $others['total_guest']; $i++) {
	                                $price = ($i <= 2) ? $roomModelData->fare_guest1_2 : $roomModelData->fare_guest3_4;
	                                $price_withoutNCFF = $price;
	                                if ($promotionCode_type == 'flexible-discount'){

										$promotionCode_ccf_discount_type = '';
										$promotionCode_ccf_discount = 0;
										$promotionCode_nccf_discount_type = '';
										$promotionCode_nccf_discount = 0;
										switch ($i) {
											case 1:
												$promotionCode_ccf_discount_type = $promotionCode->ccf_discount_1_type;
												$promotionCode_ccf_discount = $promotionCode->flexible_discount_ccf_1;
												$promotionCode_nccf_discount_type = $promotionCode->nccf_discount_1_type;
												$promotionCode_nccf_discount = $promotionCode->flexible_discount_nccf_1;
												break;
											case 2:
												$promotionCode_ccf_discount_type = $promotionCode->ccf_discount_2_type;
												$promotionCode_ccf_discount = $promotionCode->flexible_discount_ccf_2;
												$promotionCode_nccf_discount_type = $promotionCode->nccf_discount_2_type;
												$promotionCode_nccf_discount = $promotionCode->flexible_discount_nccf_2;
												break;
											case 3:
												$promotionCode_ccf_discount_type = $promotionCode->ccf_discount_3_type;
												$promotionCode_ccf_discount = $promotionCode->flexible_discount_ccf_3;
												$promotionCode_nccf_discount_type = $promotionCode->nccf_discount_3_type;
												$promotionCode_nccf_discount = $promotionCode->flexible_discount_nccf_3;
												break;
											case 4:
												$promotionCode_ccf_discount_type = $promotionCode->ccf_discount_4_type;
												$promotionCode_ccf_discount = $promotionCode->flexible_discount_ccf_4;
												$promotionCode_nccf_discount_type = $promotionCode->nccf_discount_4_type;
												$promotionCode_nccf_discount = $promotionCode->flexible_discount_nccf_4;
												break;
										}
										/*
										echo $promotionCode_ccf_discount_type;
										echo '<br>';
										echo $promotionCode_ccf_discount;
										echo '<br>';
										echo $promotionCode_nccf_discount_type;
										echo '<br>';
										echo $promotionCode_nccf_discount;
										echo '<br>';
										echo $price_withoutNCFF;
										echo '<br>';
										echo $itineraryModel__NCFF_Unformated;
										echo '<br>';
										echo ($promotionCode_ccf_discount/100.0);
										echo '<br>';
										echo $price;
										echo '<br>';
										*/
										if ($promotionCode_ccf_discount_type == '$') {
											$price = $promotionCode_ccf_discount * -1;
										}
										else {
											$price = $price_withoutNCFF * $promotionCode_ccf_discount / 100.0 * -1;
										}

										if ($promotionCode_ccf_discount_type == '$') {
											$price = $price - $promotionCode_nccf_discount;
										}
										else {
											$price = $price - $itineraryModel__NCFF_Unformated * $promotionCode_nccf_discount / 100.0;
										}
	                               	}
	                               	else {

                                        if ($promotionCode_array[0] != "others")
                                        {
                                            $price = $price + $itineraryModel__NCFF_Unformated;
    	                                    if ($i <= 2) {

    	                                        if ($promotionCode_array[1] == 'all' || $promotionCode_array[1] == 'onetwo' && $i <= 2 || $promotionCode_array[1] === 'two' && $i == 2) {

    	                                            $price = Yii::app()->format->promotionOperator($promotionCode_array, $price, $promotionCode->figure_per_guest);
    	                                        } else {
    	                                            $price = 0;
    	                                        }
    	                                    } else {

    	                                        if ($promotionCode_array[1] == 'all' || $promotionCode_array[1] == 'threefour') {

    	                                            $price = Yii::app()->format->promotionOperator($promotionCode_array, $price, $promotionCode->figure_per_guest);
    	                                        } else {
    	                                            $price = 0;
    	                                        }
    	                                    }
                                        }
                                        else
                                        {
                                            $price = 0;
                                        }
	                                }

	                                $promotion_total = $promotion_total + $price;
	                                $guest_price[$i] = $guest_price[$i] + $price;
                                    ?>

                                    <td><?php
                                        if ($price == 0) {

                                            echo '--';
                                        } else {

                                            echo Yii::app()->format->formatNumber($price);
                                        }
                                        ?></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo Yii::app()->format->formatNumber($promotion_total); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td class="total"><?php echo Yii::t('booking', 'TOTAL'); ?></td>
                            <?php
                            for ($i = 1; $i <= $others['total_guest']; $i++) {
                                $total = $total + $guest_price[$i];
                                ?>
                                <td><?php echo Yii::app()->format->formatNumber($guest_price[$i]); ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo Yii::app()->format->formatNumber($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row total"><?php echo Yii::t('booking', 'Balance Due'); ?>$<?php echo Yii::app()->format->formatNumber($total); ?></div>


            <div class="row remarks">
                <b><?php echo Yii::t('booking', 'Payment Terms'); ?>:</b>
                <div><?php echo Yii::t('booking', 'Full payment will be charged when you book this sailing (except for Quantum of the Seas Free Air Promotion).'); ?></div>
                <div><?php echo Yii::t('booking', 'Cancellation Charges'); ?>:</div>
                <div><?php echo Yii::t('booking', "45 – 30 days prior to sailing = 50% of total Cruise Fare"); ?></div>
                <div><?php echo Yii::t('booking', "29 – 8 days prior to sailing = 70% of total Cruise Fare"); ?></div>
                <div><?php echo Yii::t('booking', "7 – 0 days prior to sailing = No refund"); ?></div>
                <div><?php echo Yii::t('booking', "All taxes, fees and port expenses will be refunded if cancel sailing."); ?></div>
                <br/>
                <!-- <div>NCFF: HK$ <?php //echo $model->ncff;                                      ?></div>
                <div>Port Fees and Taxes: HK$ <?php //echo $model->taxes_fee;                                      ?></div>
                <div>Prepaid Gratuties: HK$ <?php //echo $model->prepaid_gratuties;                                      ?></div>-->
            </div>

            <div class="row bottom">
                <?php
                if (isset($promotionCode)) {
                    ?>
                    <h3><?php echo Yii::t('booking', 'Promotion Offer'); ?></h3>
                    <div class="row">
                        <div class="title">
                            <?php
                            if (!empty($promotionCode)) {
                                ?>
                                <div>-
                                    <?php
                                    //echo str_replace('X', $promotionCode->figure_per_guest, Yii::app()->format->promotionType($promotionCode->type));
                                    if ($isnt_EN) {
                                        echo $promotionCode->promotion_name;
                                    } else {
                                        echo $promotionCode->promotion_name_tc;
                                    }
                                    ?>

                                </div>
                                <?php
                            }
                            ?>

                            <br/>
                        </div>
                        <!--
						<div class="notes">
                            <?php //echo Yii::t('booking', 'Note 1: the above offer should be able to applied to selective stateroom category OR to all categories'); ?>
                            <br/>
                            <?php // echo Yii::t('booking', 'Note 2: the above % discount offer only applied to cruise fare, guests have to pay respective NCCF, taxes, fees, prot expenses and gratuities '); ?>
                        </div>
						-->
                    </div>
                    <?php
                }
                ?>
                <div class="row">
                    <div class="title">
                        <?php echo Yii::t('booking', 'Accept Terms & Conditions'); ?>
                    </div>
                    <!--
                    No cancellations, refunds or modifications are allowed, and payment is charged at the time of purchase. No-shows will be charged in full.<br/>
                    -->
                    <div id="tandc" style="position: relative;border: 1px solid;padding: 17px;">
                        <!--
                        <div class="content"
                             style="
                             font-size: 9px; margin-left: -20px;  margin-top: -10px; -webkit-transform: scale(0.9); overflow: hidden; width: 120%; height: 250px;
                             ">
                        -->
                        <div class="content"
                             style="
                             margin-top: -10px; overflow: hidden; width: 120%; height: 250px;
                             ">
                            <!-- #include virtual="/convert-pdf-to-html/includes/pdf-to-word-body-tag-02242014.htm" -->
                            <div id="page_1">
                                <p class="p0 ft0">Cruise/Cruisetour Ticket Contract</p>
                                <p class="p1 ft1">IMPORTANT NOTICE TO GUESTS</p>
                                <p class="p2 ft2">YOUR CRUISE/CRUISETOUR TICKET CONTRACT CONTAINS IMPORTANT LIMITATIONS ON THE RIGHTS OF PASSENGERS. IT IS IMPORTANT THAT YOU CAREFULLY READ ALL TERMS OF THIS CONTRACT, PAYING PARTICULAR ATTENTION TO SECTION 3 AND SECTIONS 9 THROUGH 11, WHICH LIMIT OUR LIABILITY AND YOUR RIGHT TO SUE, AND RETAIN IT FOR FUTURE REFERENCE.</p>
                                <p class="p3 ft3">THIS AGREEMENT REQUIRES THE USE OF ARBITRATION FOR CERTAIN DISPUTES AND WAIVES ANY RIGHT TO TRIAL BY JURY TO RESOLVE THOSE DISPUTES. PLEASE READ SECTION 10 BELOW.</p>
                                <p class="p4 ft3">1. INTRODUCTION</p>
                                <p class="p5 ft5">This Cruise/CruiseTour Ticket Contract (the “<span class="ft4">Ticket Contract</span>” or this “<span class="ft4">Agreement</span>”) describes the terms and conditions that will apply to the relationship between the Passenger (as defined in Section 2.g below) and the Carrier (as defined in Section 2.b below) of the Vessel with respect to the Cruise or Cruise Tour covered by this Agreement. Except as otherwise expressly provided herein, this Agreement supersedes any other written or oral representations or agreements relating to the subject matter of this Agreement or the Cruise or the Cruise Tour, but excluding the terms of the Cruise Lines International Association (“<span class="ft4">CLIA</span>”) Passenger Bill of Rights that the Vessel’s Operator has adopted as a requirement of being a member of CLIA (the “<span class="ft4">CLIA Passenger Bill of Rights</span>”). In the event of a direct conflict between a provision of this Ticket Contract and a provision of the CLIA Passenger Bill of Rights in effect at the time of booking (the “CLIA Passenger Bill of Rights”), the CLIA Passenger Bill of Rights controls.</p>
                                <p class="p6 ft7">Purchase or use of this Ticket Contract, whether or not signed by the Passenger, shall constitute the agreement by Passenger, on behalf of himself and all other persons traveling under this Ticket Contract (including any accompanying minors or other persons for whom the Ticket Contract was purchased), to be bound by the terms and conditions of this Ticket Contract. This Ticket Contract cannot be modified except in a writing signed by a corporate officer of Carrier. In addition, Passenger acknowledges the availability of and Passenger agrees to abide by the terms and conditions, including but not limited to certain payment terms such as minimum deposit requirements and payment due dates, which appear in the applicable Carrier brochure or online at <a href="http://www.royalcaribbean.com/"><span class="ft6">www.royalcaribbean.com </span></a>or, where applicable, as advised by your travel agent. In the event of any conflict between such other brochure or website materials and this Ticket Contract, the terms of this Ticket Contract shall prevail.</p>
                                <p class="p7 ft3">2. DEFINITIONS</p>
                                <p class="p8 ft8">a. “<span class="ft3">Agreement</span>” or “<span class="ft3">Contract</span>” means the terms and conditions set forth in this Ticket Contract together with the Cruise Fare or CruiseTour Fare due for Your Cruise or CruiseTour. Together,</p>
                            </div>
                            <!-- #include virtual="/convert-pdf-to-html/includes/pdf-to-word-body-tag-between-content.htm" --><div id="page_2">


                                <p class="p9 ft8">the items described in the preceding sentence shall constitute an agreement between Passenger and Carrier for the Cruise or CruiseTour.</p>
                                <p class="p10 ft7">b. "<span class="ft9">Carrier</span>" shall include: (i) the Vessel, or any substituted ship; (ii) the Vessel's Carrier as more particularly detailed at Section 19); and (iii) with respect to the Land Tour portion of any CruiseTour, the operator of that Land Tour (“<span class="ft9">LTO</span>”) together with the owners, managers, charterers, affiliates, successors and assigns of the entities identified in subsections (i), (ii) and (iii) of this sentence. Carrier also shall include the officers, directors, employees, representatives, crew or pilots of the entities identified in the preceding sentence. The exclusions or limitations of liability of Carrier set forth in the provisions of this Ticket Contract, as well as all rights, defenses or immunities set forth herein, shall also apply to and be for the benefit of representatives, independent contractors, concessionaires and suppliers of Carrier, as well as owners and Carriers of all shoreside properties at which the Vessel or the Transport may call, as well as owners, designers, installers, suppliers and manufacturers of the Vessel or Transport, or any component parts of either, together with the employees and servants of each of the foregoing, and/or any launches, craft or facilities of any kind belonging to or provided by any of the parties identified in this paragraph.</p>
                                <p class="p11 ft11"><span class="ft8">c.</span><span class="ft10">“</span><span class="ft2">Cruise</span>” means the specific cruise covered by this Guest Ticket Contract, as the same may be modified and shall include those periods during which the Passenger is embarking or disembarking the Vessel and those periods when the Passenger is on land while the Vessel is in port.</p>
                                <p class="p12 ft8"><span class="ft8">d.</span><span class="ft12">“</span><span class="ft3">Cruise Fare</span>” or <span class="ft3">“CruiseTour Fare</span>” includes the amount due for the Cruise or CruiseTour,</p>
                                <p class="p13 ft7">whether such amounts are owing and/or have been paid by the Passenger, but does not include amounts due for other products or services such as air transportation, photographs, gratuities, telephone calls, or medical services which can be purchased separately, nor does it include government or <nobr>quasi-governmental</nobr> taxes and fees, whether assessed on a per Passenger, per vessel, per berth or per ton basis, nor any fuel surcharges, security surcharges or similar assessments made by airlines, trains, buses, hotels or other third parties which are subject to change and are due and payable by Passenger upon request. For CruiseTours that include air travel, airfare is included in the CruiseTour Fare. Carrier reserves the right to impose a supplemental charge relating to unanticipated occurrences including, but not limited to, increases in the price of fuel. Any such supplement charges may apply, at Carrier's sole discretion, to both existing and new bookings (regardless of whether such bookings have been paid in full). Such supplements are not included in the Cruise Fare or CruiseTour Fare.</p>
                                <p class="p14 ft8">e. “<span class="ft3">CruiseTour</span>” shall mean the combined vacation package officially published and offered by Carrier, which includes the applicable Cruise and associated Land Tour.</p>
                                <p class="p15 ft8">f. “<span class="ft3">Carrier</span>” means the entity identified in Section 19 below.</p>
                                <p class="p16 ft7">g. “<span class="ft9">Passenger</span>” or “<span class="ft9">Your</span>” means all persons traveling under this Ticket Contract and persons in their care, together with their respective heirs and representatives. "<span class="ft9">Passenger</span>" shall include the plural and the use of the masculine shall include the feminine. h. “<span class="ft9">Land Tour</span>” shall mean the land tour component of a Cruise Tour to be provided either prior to the initial embarkation on the Cruise or after the final debarkation from the Cruise.</p>
                                <p class="p17 ft8">i. “<span class="ft3">Transport</span>” means the railcars, buses and other modes of transportation or accommodation provided by LTO in connection with a Land Tour.</p>
                            </div>
                            <div id="page_3">


                                <div id="id_1">
                                    <p class="p18 ft8">j. "<span class="ft3">Vessel</span>" means the ship owned or chartered or operated by Carrier on which Passenger may be traveling or against which Passenger may assert a claim, as well as any substituted ship used in the performance of this Ticket Contract.</p>
                                    <p class="p19 ft3">3. BAGGAGE, PROPERTY AND LIMITATIONS OF LIABILITY</p>
                                    <p class="p16 ft7"><span class="ft8">a.</span><span class="ft13">Baggage Limits and Prohibited Items. Each adult Passenger is permitted to carry onboard the Vessel or </span><nobr>check-in</nobr> only the wearing apparel and personal effects reasonably necessary for the Cruise or Cruise Tour, including suitcases, trunks, valises, satchels, bags, hangers containing clothing, toiletries and similar items. In no event shall any Passenger bring on board the Vessel or Transport or <nobr>check-in,</nobr> or in connection with the Cruise Tour, any illegal controlled substances, fireworks, live animals (except under the terms of Section 12.e below), weapons, firearms, explosives or other hazardous materials, or any other items prohibited by applicable law or Carrier policy. Carrier reserves the right to refuse to permit any Passenger to take on board the Vessel or on any mode of Transport any item Carrier deems inappropriate.</p>
                                    <p class="p20 ft11"><span class="ft8">b.</span><span class="ft14">Liability for Loss of or Damage to Baggage. Unless negligent, Carrier is neither responsible nor liable for any loss of or damage to Passenger's property, whether contained in luggage or otherwise. Liability for loss of or damage to Passenger's property in connection with any air or ground transportation shall be the sole responsibility of the provider of the service and in accordance with applicable limitations.</span></p>
                                    <p class="p21 ft7"><span class="ft8">c.</span><span class="ft13">Limitation of Liability for Lost or Damaged Property. Notwithstanding any other provision of law or this Agreement, Carrier's liability for loss or damage to property during the Land Tour portion of a CruiseTour is limited to US$300.00 per Passenger. Notwithstanding any other provision of law or this Ticket Contract, Carrier's liability for loss or damage to property for the Cruise (or for the Cruise only portion of a CruiseTour) is limited to US$300.00 per Passenger, unless Passenger declares the true value of such property in writing and pays Carrier within 10 days of final payment for the cruise, a fee of five percent (5%) of the amount that such value exceeds US$300.00. In such event, Carrier's liability shall be limited to its true declared value, but not exceeding US$5,000.</span></p>
                                    <p class="p22 ft7"><span class="ft8">d.</span><span class="ft15">Limited Carriage. Carrier does not undertake to carry as baggage any tools of trade, household goods (including but not limited to appliances and furniture), fragile or valuable items, precious metals, jewelry, documents, negotiable instruments or other valuables, including but not limited to those specified in Title 46 of the United States Code, Appendix Section 181. Each Passenger warrants that no such item will be presented to Carrier within any receptacle or container as baggage, and hereby releases Carrier from any liability whatsoever for loss of or damage to such items when presented to Carrier in breach of this warranty. In no event shall Carrier be liable for normal wear or tear of luggage or property, or loss of or damage to jewelry, cash, negotiable paper, photographic/electronic, medical or recreational equipment, dental hardware, eyewear, medications or other valuables unless they are deposited with Carrier on the Vessel for safekeeping against receipt (LTOs do not accept valuables for deposit). Carrier's liability, if any, for loss of or damage to valuables so deposited shall not exceed the amounts indicated in Section 3.c above.</span></p>
                                </div>
                                <div id="id_2">
                                    <p class="p23 ft3">4. MEDICAL CARE AND OTHER PERSONAL SERVICES</p>
                                </div>
                            </div>
                            <div id="page_4">


                                <p class="p24 ft11"><span class="ft8">a.</span><span class="ft16">Availability of Medical Care. Due to the nature of travel by sea and the ports visited, the availability of medical care onboard the Vessel and in ports of call may be limited or delayed and medical evacuation may not be possible from the Vessel while at sea or from every location to which the Vessel sails.</span></p>
                                <p class="p22 ft7"><span class="ft8">b.</span><span class="ft17">Relationship with Service Providers. To the extent Passengers retain the services of medical personnel or independent contractors on or off the Vessel, Passengers do so at their sole risk. Any medical personnel attending to a Passenger on or off the Vessel, if arranged by Carrier, are provided solely for the convenience of the Passenger, work directly for the Passenger, and shall not be deemed to be acting under the control or supervision of the Carrier, as Carrier is not a medical provider. Likewise, any onboard concessions (including but not limited to the gift shops, spas, beauty salon, art program, photography and formalwear concessions) are either operated by or are independent contractors on board the Vessel, on Transport or elsewhere and are provided solely for the convenience of Passenger. Even though the Carrier shall be entitled to charge a fee and earn a profit for arranging such services, all such persons or entities shall be deemed independent contractors and not acting as agents or representatives of Carrier. Carrier assumes no liability whatsoever for any treatment, failure to treat, diagnosis, misdiagnosis, actual or alleged malpractice, advice, examination or other services provided by such persons or entities. Passenger acknowledges that the Vessel's hair dresser, manicurist, art auctioneer, gift shop personnel, spa personnel, wedding planners and other providers of merchandise and personal services are employees of independent contractors and that Carrier is not responsible for their actions.</span></p>
                                <p class="p25 ft7"><span class="ft8">c.</span><span class="ft13">Payment for Medical or Personal Care Services. Passenger shall pay for all medical care or other personal services requested or required, whether onboard or ashore, including the cost of any emergency medical care or transportation incurred by Carrier and any costs associated with the provision of medical services as provided in the CLIA Passenger Bill of Rights. If Passenger is unable to pay and the Carrier pays for such expenses, then Passenger shall reimburse Carrier for those expenses.</span></p>
                                <p class="p19 ft3">5. SHORE EXCURSIONS, TOURS, FACILITIES OR OTHER TRANSPORTATION</p>
                                <p class="p26 ft5">All arrangements made for or by Passenger for transportation (other than on the Vessel) before, during or after the Cruise or CruiseTour of any kind whatsoever, as well as air arrangements, shore excursions, tours, hotels, restaurants, attractions and other similar activities or services, including all related conveyances, products or facilities, are made solely for Passenger's convenience and are undertaken at Passenger's risk. The providers and owners and carriers of such services, conveyances, products and facilities are independent contractors and are not acting as representatives of Carrier. Even though Carrier may collect a fee for, or otherwise profit from, making such arrangements and offers for sale shore excursions, tours, hotels, restaurants, attractions, the Land Tour and other similar activities or services taking place off the Vessel for a profit, it does not undertake to supervise or control such independent contractors or their employees, nor maintain their conveyances or facilities, and makes no representation, whether express or implied, regarding their suitability or safety. In no event shall Carrier be liable for any loss, delay, disappointment, damage, injury, death or other harm whatsoever to Passenger which occurs on or off the Vessel or the Transport as a result of any acts, omissions or negligence of any independent contractors.</p>
                            </div>
                            <div id="page_5">


                                <p class="p23 ft3">6. CANCELLATION, DEVIATION OR SUBSTITUTION BY CARRIER</p>
                                <p class="p27 ft7"><span class="ft8">a.</span><span class="ft13">Carrier may for any reason at any time and without prior notice, cancel, advance, postpone or deviate from any scheduled sailing, port of call, destination, lodging or any activity on or off the Vessel, or substitute another vessel or port of call, destination, lodging or activity. Except as provided in Section 6.e below, Carrier shall not be liable for any claim whatsoever by Passenger, including but not limited to loss, compensation or refund, by reason of such cancellation, advancement, postponement, substitution or deviation.</span></p>
                                <p class="p28 ft7"><span class="ft8">b.</span><span class="ft17">In connection with a CruiseTour, Carrier has the same right to cancel, advance, postpone or deviate from any scheduled activity, departure or destination, or substitute another railcar, bus, destination or lodging or other component of the CruiseTour. Except as provided in Section 6.e below, Carrier shall not be liable for any claim by Passenger whatsoever, including but not limited to loss, compensation or refund, by reason of such cancellation, advancement, postponement, substitution or deviation.</span></p>
                                <p class="p29 ft7"><span class="ft8">c.</span><span class="ft18">By way of example, and without limiting the generality of the foregoing, Carrier may, without liability (except as provided in Section 6.e with respect to mechanical failures only) , deviate from any scheduled sailing and may otherwise land Passenger and her property at any port if Carrier believes that the voyage or any Passenger or property may be hindered or adversely affected as a result of hostilities, blockages, prevailing weather conditions, labor conflicts, strikes onboard or ashore, breakdown of Vessel, congestion, docking difficulties, medical or </span><nobr>life-saving</nobr> emergencies or any other cause whatsoever.</p>
                                <p class="p30 ft11"><span class="ft8">d.</span><span class="ft16">Carrier shall have the right to comply with any orders, recommendations, or directions whatsoever given by any governmental entity or by persons purporting to act with such authority and such compliance shall not be deemed a breach of the terms under this Agreement entitling the Passenger to assert any claim for liability, compensation or refund.</span></p>
                                <p class="p22 ft7"><span class="ft8">e.</span><span class="ft18">In the event that the Cruise (or the Cruise component of a CruiseTour) is cancelled or terminated early due to mechanical failures: (i) Passenger shall have a right to a full refund of the Cruise Fare if the Cruise is cancelled in full, or a partial refund if the Cruise is terminated early; (ii) Carrier may cover or reimburse Passenger for additional costs (e.g. airline change fees) as deemed appropriate by the Carrier; (iii) if Passenger has travelled to the Vessel, Passenger shall have a right to transportation (by means selected by the Carrier) to the Vessel’s scheduled port of disembarkation or the Passenger’s home city; and (iv) Passenger shall have a right to lodging (selected by the Carrier) if disembarkation and an overnight stay in an unscheduled port are required due to the Cruise or Cruise component of a CruiseTour being cancelled or terminated early because of such mechanical failures.</span></p>
                                <p class="p4 ft3">7. CANCELLATION OR EARLY DISEMBARKATION BY PASSENGER</p>
                                <p class="p16 ft7">Your Cruise Fare or CruiseTour Fares, including but not limited to any fuel or other supplemental charges, government taxes and fees and other charges are established by your travel representative that took your booking and not the Carrier. Similarly, the payment schedule for your Cruise Fare or CruiseTour Fares is established by your booking office that took your booking and not the Carrier. In addition, all cancellation and refund policies for your Cruise Fare or CruiseTour fares are established by your booking office that took your booking and not the Carrier.</p>
                            </div>
                            <div id="page_6">


                                <p class="p24 ft7">Any refund due to Passenger as a result of cancellation by the Passenger both prior to or after the Cruise or CruiseTour has begun shall be established and determined by the travel representative that handled your booking who shall have sole liability for any refunds, where applicable. In the event of cancellation by the Passenger prior to the Cruise or CruiseTour, or early disembarkation of the Passenger for any reason, including pursuant to any provision of this Ticket Contract, such disembarkation shall be without refund, compensation, or liability on the part of the Carrier whatsoever.</p>
                                <p class="p30 ft11">Any payments of the Cruise Fare or CruiseTour Fares shall be made to the third party reseller and not the Carrier. If Carrier received payment via credit card, the refund will be made to that credit card. If Carrier received payment from your travel representative, the refund will be provided back to that travel representative.</p>
                                <p class="p22 ft7">Passenger acknowledges that for certain voyages, such as a <nobr>round-trip</nobr> voyage commencing in a United States port, the Passenger must complete the entire voyage and that failure to do so may result in a fine or other penalty being assessed by one or more governmental agencies. Passenger hereby agrees to pay any such fine or penalty imposed because Passenger failed to complete the entire voyage and to reimburse Carrier in the event it is required to pay, or has paid, such fine or penalty.</p>
                                <p class="p19 ft3">8. PASSENGER'S OBLIGATION TO COMPLY WITH TICKET CONTRACT,</p>
                                <p class="p31 ft3">APPLICABLE LAWS, AND RULES OF CARRIER; QUARANTINE; INDEMNIFICATION</p>
                                <p class="p16 ft7"><span class="ft8">a.</span><span class="ft17">Compliance Obligation Generally. Passenger shall at all times comply with the provisions of this Ticket Contract, all applicable laws, rules, policies and regulations of the Carrier, the Vessel and the Transport (as the same may be changed from time to time with or without notice). Passenger agrees not to enter any areas of the Vessel designated for crew only, including crew quarters, under any circumstances whatsoever. Passenger further agrees that Carrier may prohibit or restrict Passenger from bringing any alcoholic beverages for consumption onboard the Vessel and agrees to comply with any Carrier policy covering such matters. Nothing in this Agreement shall grant to Passenger any right to sell products to or provide services to other Passengers onboard the Cruise or CruiseTour and Passenger shall be prohibited from doing so.</span></p>
                                <p class="p32 ft7"><span class="ft8">b.</span><span class="ft17">Passengers are solely responsible for maintaining in their possession all passports, visas and other travel documents required for embarkation, travel and disembarkation at all ports of call. Passengers assume full responsibility to determine through their travel representative or the appropriate government authority the necessary documents. Passenger agrees to provide to Carrier (at Carrier's reasonable request) any travel documents. Carrier shall return such travel documents to Passenger by no later than the end of the Cruise or CruiseTour.</span></p>
                                <p class="p33 ft8"><span class="ft8">c.</span><span class="ft19">Passenger understands and agrees that Carrier has a zero tolerance policy for illegal activity and shall report such activity to the appropriate authorities.</span></p>
                                <p class="p34 ft8"><span class="ft8">d.</span><span class="ft20">Each adult Passenger undertakes and agrees to supervise at all times any accompanying minors to ensure compliance with the provisions of this Section 8.</span></p>
                                <p class="p35 ft11"><span class="ft8">e.</span><span class="ft10">Carrier may also change accommodation, alter or cancel any activities of, deny service of alcohol to, confine to a stateroom or quarantine, search the stateroom, property or baggage of any Passenger, change a Passenger's Land Tour, disembark or refuse to embark the Passenger and/or any Passenger responsible for any minor Passenger, or restrain any Passenger at any</span></p>
                            </div>
                            <div id="page_7">


                                <div id="id_1">
                                    <p class="p36 ft7">time, without liability, at the risk and expense of the Passenger, when in the sole opinion of Carrier, captain of the Vessel or the operator of any Transport (as the case may be) the Passenger's conduct or presence, or that of any minor for whom the Passenger is responsible, is believed to present a possible danger, security risk or be detrimental to himself or the health, welfare, comfort or enjoyment of others, or is in violation of any provision of this Ticket Contract.</p>
                                    <p class="p37 ft22"><span class="ft8">f.</span><span class="ft21">Passenger, or if a minor, his parent or guardian, shall be liable for and indemnify Carrier, the Vessel and the Transport from any civil liability, fines, penalties, costs or expenses incurred by or imposed on the Vessel, the Transport or Carrier arising from or related to Passenger's conduct or failure to comply with any provisions of this Section 8, including but not limited to:</span></p>
                                    <p class="p38 ft11">(i) any purchases by or credit extended to the Passenger; (ii) requirements relating to immigration, customs or excise; or (iii) any personal injury, death or damage to persons or property caused directly or indirectly, in whole or in part, by any willful or negligent act or omission on the part of the Passenger.</p>
                                    <p class="p12 ft5"><span class="ft8">g.</span><span class="ft23">Carrier shall not be required to refund any portion of the Cruise Fare or CruiseTour Fare paid by any Passenger who fails for any reason to be onboard the Vessel or Transport by the embarkation </span><nobr>cut-off</nobr> time applicable to the specific Cruise or Cruisetour or the boarding <nobr>cut-off</nobr> time applicable at any port of call or destination or point of departure as the case may be, and shall not be responsible for lodging, meals, transportation or other expenses incurred by Passenger as a result thereof. Embarkation <nobr>cut-off</nobr> times for cruises are available at www.royalcaribbean.com. Boarding <nobr>cut-off</nobr> times for any port of call or destination or point of departure are as announced on the applicable Cruise or CruiseTour. Carrier shall have no obligation to any Passenger to deviate from any scheduled sailing or port of call or destination.</p>
                                    <p class="p12 ft5"><span class="ft8">h.</span><span class="ft24">Carrier may refuse to transport any Passenger, and may remove any Passenger from the Vessel or Transport at any time, for any of the following reasons: (i) whenever such action is necessary to comply with any government regulations, directives or instructions or court orders; (ii) when a Passenger refuses to permit search of his person or property for explosives, weapons, dangerous materials or other stolen, illegal or prohibited items; (iii) when a Passenger refuses upon request to produce positive identification; or (iv) for failure to comply with Carrier's rules and procedures, including, for example, Carrier's Guest Conduct Policy or</span></p>
                                    <p class="p39 ft8">Carrier's policies against fraternization with crew; or (v) Passenger's passage is denied by Carrier pursuant to its Refusal to Transport Policy. Carrier’s Guest Conduct Policy and</p>
                                    <p class="p38 ft8">Refusal to Transport Policy are available online at the following websites, respectively: http://www.royalcaribbean.com/content/en_US/pdf/Guest_Conduct_Policy.pdf and http://www.royalcaribbean.com/content/en_US/pdf/Refusal_To_Transport.pdf.</p>
                                    <p class="p40 ft25"><span class="ft25">i.</span><span class="ft26">In the interests of safety and security, Passengers and their baggage are subject to inspection or monitoring electronically with or without the Passenger's consent or knowledge.</span></p>
                                    <p class="p41 ft11"><span class="ft8">j.</span><span class="ft16">If Carrier exercises its rights under this Section 8, Passenger shall have no claim against Carrier whatsoever and Carrier shall have no liability for refund, compensation loss or damages of Passenger, including but not limited to any expenses incurred by Passenger for accommodation or repatriation.</span></p>
                                </div>
                                <div id="id_2">
                                    <p class="p23 ft3">9. FORUM SELECTION CLAUSE FOR ALL LAWSUITS; CLASS ACTION WAIVER</p>
                                </div>
                            </div>
                            <div id="page_8">


                                <p class="p24 ft28"><span class="ft8">a.</span><span class="ft27">EXCEPT AS PROVIDED IN SECTION 10.b WITH REGARD TO CLAIMS OTHER THAN FOR PERSONAL INJURY, ILLNESS OR DEATH OF A PASSENGER, IT IS AGREED BY AND BETWEEN PASSENGER AND CARRIER THAT ALL DISPUTES AND MATTERS WHATSOEVER ARISING UNDER, IN CONNECTION WITH OR INCIDENT TO THIS TICKET CONTRACT, PASSENGER'S CRUISE, CRUISETOUR, LAND TOUR OR TRANSPORT, SHALL BE LITIGATED, IF AT ALL, IN AND BEFORE THE UNITED STATES DISTRICT COURT FOR THE SOUTHERN DISTRICT OF FLORIDA LOCATED IN </span><nobr>MIAMI-DADE</nobr> COUNTY, FLORIDA, U.S.A. (OR AS TO THOSE LAWSUITS TO WHICH THE FEDERAL COURTS OF THE UNITED STATES LACK SUBJECT MATTER JURISDICTION, BEFORE A COURT LOCATED IN <nobr>MIAMI-DADE</nobr> COUNTY, FLORIDA, U.S.A.), TO THE EXCLUSION OF THE COURTS OF ANY OTHER STATE, TERRITORY OR COUNTRY. PASSENGER HEREBY CONSENTS TO JURISDICTION AND WAIVES ANY VENUE OR OTHER OBJECTION THAT HE MAY HAVE TO ANY SUCH ACTION OR PROCEEDING BEING BROUGHT IN THE APPLICABLE COURT LOCATED IN <nobr>MIAMI-DADE</nobr> COUNTY, FLORIDA.</p>
                                <p class="p42 ft28"><span class="ft8">b.</span><span class="ft29">CLASS ACTION RELIEF WAIVER. PASSENGER HEREBY AGREES THAT EXCEPT AS PROVIDED IN THE LAST SENTENCE OF THIS PARAGRAPH, PASSENGER MAY BRING CLAIMS AGAINST CARRIER ONLY IN PASSENGER'S INDIVIDUAL CAPACITY. EXCEPT WHERE APPLICABLE LAW PROVIDES OTHERWISE, PASSENGER AGREES THAT ANY ARBITRATION OR LAWSUIT AGAINST CARRIER, VESSEL OR TRANSPORT WHATSOEVER SHALL BE LITIGATED BY PASSENGER INDIVIDUALLY AND NOT AS A MEMBER OF ANY CLASS OR AS PART OF A CLASS OR REPRESENTATIVE ACTION, AND PASSENGER EXPRESSLY AGREES TO WAIVE ANY LAW ENTITLING PASSENGER TO PARTICIPATE IN A CLASS ACTION. IF YOUR CLAIM IS SUBJECT TO ARBITRATION AS PROVIDED IN SECTION 10 BELOW, THE ARBITRATOR SHALL HAVE NO AUTHORITY TO ARBITRATE CLAIMS ON A CLASS ACTION BASIS. YOU AGREE THAT THIS SECTION SHALL NOT BE SEVERABLE UNDER ANY CIRCUMSTANCES FROM THE ARBITRATION CLAUSE SET FORTH IN SECTION 10.b BELOW, AND IF FOR ANY REASON THIS CLASS ACTION WAIVER IS UNENFORCEABLE AS TO ANY PARTICULAR CLAIM, THEN AND ONLY THEN SUCH CLAIM SHALL NOT BE SUBJECT TO ARBITRATION.</span></p>
                                <p class="p43 ft3">10. NOTICE OF CLAIMS AND COMMENCEMENT OF SUIT OR ARBITRATION;</p>
                                <p class="p44 ft3">SECURITY</p>
                                <p class="p45 ft7">a. TIME LIMITS FOR PERSONAL INJURY/ILLNESS/DEATH CLAIMS: NO SUIT SHALL BE MAINTAINABLE AGAINST CARRIER, THE VESSEL OR THE TRANSPORT FOR PERSONAL INJURY, ILLNESS OR DEATH OF ANY PASSENGER UNLESS WRITTEN NOTICE OF THE CLAIM, WITH FULL PARTICULARS, SHALL BE DELIVERED TO CARRIER AT ITS PRINCIPAL OFFICE WITHIN SIX (6) MONTHS FROM THE DATE OF THE INJURY, ILLNESS OR DEATH AND SUIT IS COMMENCED (FILED) WITHIN ONE (1) YEAR FROM THE DATE OF SUCH INJURY, ILLNESS OR DEATH AND PROCESS SERVED WITHIN 120 DAYS AFTER FILING, NOTWITHSTANDING ANY PROVISION OF LAW OF ANY STATE OR COUNTRY TO THE CONTRARY.</p>
                            </div>
                            <div id="page_9">


                                <p class="p46 ft7">b. ARBITRATION OF ALL OTHER CLAIMS: ANY AND ALL OTHER DISPUTES, CLAIMS, OR CONTROVERSIES WHATSOEVER, EXCEPT FOR PERSONAL INJURY, ILLNESS OR DEATH OF A PASSENGER, WHETHER BASED ON CONTRACT, TORT, STATUTORY, CONSTITUTIONAL OR OTHER LEGAL RIGHTS, INCLUDING BUT NOT LIMITED TO ALLEGED VIOLATION OF CIVIL RIGHTS, DISCRIMINATION, CONSUMER OR PRIVACY LAWS, OR FOR ANY LOSSES, DAMAGES OR EXPENSES, RELATING TO OR IN ANY WAY ARISING OUT OF OR CONNECTED WITH THIS CONTRACT OR PASSENGER'S CRUISE, NO MATTER HOW DESCRIBED, PLEADED OR STYLED, SHALL BE REFERRED TO AND RESOLVED EXCLUSIVELY BY BINDING ARBITRATION PURSUANT TO THE UNITED NATIONS CONVENTION ON THE RECOGNITION AND ENFORCEMENT OF FOREIGN ARBITRAL AWARDS (NEW YORK 1958), 21 U.S.T. 2517, 330 U.N.T.S. 3, 1970 U.S.T. LEXIS 115, 9 U.S.C. §§ <nobr>202-208</nobr> (THE “CONVENTION”) AND THE FEDERAL ARBITRATION ACT, 9 U.S.C. §§ 1, ET SEQ., (“FAA”) SOLELY IN MIAMI, FLORIDA, U.S.A. TO THE EXCLUSION</p>
                                <p class="p47 ft28">OF ANY OTHER FORUM. THE ARBITRATION SHALL BE ADMINISTERED BY THE AMERICAN ARBITRATION ASSOCIATION UNDER ITS COMMERCIAL DISPUTE RESOLUTION RULES AND PROCEDURES, WHICH ARE DEEMED TO BE INCORPORATED HEREIN BY REFERENCE. ANY QUESTION ABOUT THE ARBITRATION ADMINISTRATORS MENTIONED ABOVE MAY BE DIRECTED TO THEM AS FOLLOWS: AMERICAN ARBITRATION ASSOCIATION, BANK OF AMERICA TOWER, 100 SOUTHEAST 2ND STREET, STE. 2300, MIAMI, FL 33131 (305) <nobr>358-7777.</nobr> NEITHER PARTY WILL HAVE THE RIGHT TO A JURY TRIAL NOR TO ENGAGE IN <nobr>PRE-ARBITRATION</nobr> DISCOVERY EXCEPT AS PROVIDED IN THE APPLICABLE ARBITRATION RULES AND HEREIN, OR OTHERWISE TO LITIGATE THE CLAIM IN ANY COURT. THE ARBITRATOR'S DECISION WILL BE FINAL AND BINDING. OTHER RIGHTS THAT PASSENGER OR CARRIER WOULD HAVE IN COURT ALSO MAY NOT BE AVAILABLE IN ARBITRATION. AN AWARD RENDERED BY AN ARBITRATOR MAY BE ENTERED IN ANY COURT HAVING JURISDICTION UNDER THE CONVENTION OR FAA. PASSENGER AND CARRIER FURTHER AGREE TO PERMIT THE TAKING OF A DEPOSITION UNDER OATH OF THE PASSENGER ASSERTING THE CLAIM, OR FOR WHOSE BENEFIT THE CLAIM IS ASSERTED, IN ANY SUCH ARBITRATION. IN THE EVENT THIS PROVISION IS DEEMED UNENFORCEABLE BY AN ARBITRATOR OR COURT OF COMPETENT JURISDICTION FOR ANY REASON, THEN AND ONLY THEN THE PROVISIONS OF SECTION 9 ABOVE GOVERNING VENUE AND JURISDICTION SHALL EXCLUSIVELY APPLY TO ANY LAWSUIT INVOLVING CLAIMS DESCRIBED IN THIS SECTION 10(b).</p>
                                <p class="p48 ft7">c. TIME LIMITS FOR <nobr>NON-INJURY/ILLNESS</nobr> OR DEATH CLAIMS: NO PROCEEDING DESCRIBED IN SECTION 10(b) MAY BE BROUGHT AGAINST CARRIER, VESSEL OR TRANSPORT UNLESS WRITTEN NOTICE OF THE CLAIM, WITH FULL PARTICULARS, SHALL BE DELIVERED TO CARRIER AT ITS PRINCIPAL OFFICE WITHIN THIRTY (30) DAYS AFTER TERMINATION OF THE CRUISE OR CRUISETOUR (WHICHEVER IS LATER) TO WHICH THIS TICKET CONTRACT RELATES. IN NO EVENT SHALL ANY SUCH PROCEEDING DESCRIBED IN SECTION 10(b) BE MAINTAINABLE UNLESS SUCH PROCEEDING SHALL BE COMMENCED (FILED) WITHIN SIX (6) MONTHS AFTER THE TERMINATION OF THE CRUISE OR CRUISETOUR (WHICHEVER IS LATER) TO WHICH</p>
                            </div>
                            <div id="page_10">


                                <p class="p18 ft11">THIS TICKET CONTRACT RELATES AND VALID NOTICE OR SERVICE OF SUCH PROCEEDING IS EFFECTED WITHIN SIXTY (60) DAYS AFTER FILING, NOTWITHSTANDING ANY PROVISION OF LAW OF ANY STATE OR COUNTRY TO THE CONTRARY.</p>
                                <p class="p49 ft7">d. IN THE EVENT OF AN IN REM PROCEEDING AGAINST THE VESSEL, PASSENGER HEREBY IRREVOCABLY AGREES THAT THE POSTING OF A LETTER OF UNDERTAKING FROM ANY OF CARRIER'S INSURERS SHALL CONSTITUTE AN ADEQUATE AND APPROPRIATE FORM OF SECURITY FOR THE IMMEDIATE RELEASE OF THE VESSEL IN LIEU OF ARREST.</p>
                                <p class="p50 ft3">11. LIMITATIONS OF LIABILITY</p>
                                <p class="p16 ft7"><span class="ft8">a.</span><span class="ft30">EXCEPT AS OTHERWISE EXPRESSLY PROVIDED IN SECTION 6.e, CARRIER SHALL NOT BE LIABLE FOR INJURY, DEATH, ILLNESS, DAMAGE, DELAY OR OTHER LOSS TO PERSON OR PROPERTY, OR ANY OTHER CLAIM BY ANY PASSENGER CAUSED BY ACT OF GOD, WAR, TERRORISM, CIVIL COMMOTION, LABOR TROUBLE, GOVERNMENT INTERFERENCE, PERILS OF THE SEA, FIRE, THEFTS OR ANY OTHER CAUSE BEYOND CARRIER'S REASONABLE CONTROL, OR ANY ACT NOT SHOWN TO BE CAUSED BY CARRIER'S NEGLIGENCE.</span></p>
                                <p class="p30 ft7"><span class="ft8">b.</span><span class="ft13">PASSENGER AGREES TO SOLELY ASSUME THE RISK OF INJURY, DEATH, ILLNESS OR OTHER LOSS, AND CARRIER IS NOT RESPONSIBLE FOR PASSENGER'S USE OF ANY ATHLETIC OR RECREATIONAL EQUIPMENT; OR FOR THE NEGLIGENCE OR WRONGDOING OF ANY INDEPENDENT CONTRACTORS, INCLUDING BUT NOT LIMITED TO PHOTOGRAPHERS, SPA PERSONNEL OR ENTERTAINERS; OR FOR EVENTS TAKING PLACE OFF THE CARRIER'S VESSELS, LAUNCHES OR TRANSPORTS, OR AS PART OF ANY SHORE EXCURSION, TOUR OR ACTIVITY.</span></p>
                                <p class="p28 ft7"><span class="ft8">c.</span><span class="ft30">CARRIER HEREBY DISCLAIMS ALL LIABILITY TO THE PASSENGER FOR DAMAGES FOR EMOTIONAL DISTRESS, MENTAL SUFFERING OR PSYCHOLOGICAL INJURY OF ANY KIND UNDER ANY CIRCUMSTANCES, WHEN SUCH DAMAGES WERE NEITHER THE RESULT OF A PHYSICAL INJURY TO THE PASSENGER, NOR THE RESULT OF PASSENGER HAVING BEEN AT ACTUAL RISK OF PHYSICAL INJURY, NOR WERE INTENTIONALLY INFLICTED BY THE CARRIER. WITHOUT LIMITING THE PRECEDING SENTENCE, IN NO EVENT WILL CARRIER BE LIABLE TO PASSENGER FOR ANY CONSEQUENTIAL, INCIDENTAL, EXEMPLARY OR PUNITIVE DAMAGES.</span></p>
                                <p class="p51 ft8"><span class="ft8">d.</span><span class="ft19">ON CRUISES WHICH NEITHER EMBARK, DISEMBARK NOR CALL AT ANY PORT IN THE UNITED STATES, CARRIER SHALL BE ENTITLED TO ANY AND ALL LIABILITY</span></p>
                                <p class="p15 ft8">LIMITATIONS, IMMUNITIES AND RIGHTS APPLICABLE TO IT UNDER THE “ATHENS</p>
                                <p class="p44 ft8">CONVENTION RELATING TO THE CARRIAGE OF PASSENGERS AND THEIR LUGGAGE</p>
                                <p class="p16 ft7">BY SEA” OF 1974, AS WELL AS THE “PROTOCOL TO THE ATHENS CONVENTION RELATING TO THE CARRIAGE OF PASSENGERS AND THEIR LUGGAGE BY SEA” OF 1976 (“ATHENS CONVENTION”). THE ATHENS CONVENTION LIMITS THE CARRIER'S LIABILITY FOR DEATH OR PERSONAL INJURY TO A PASSENGER TO NO MORE THAN 46,666 SPECIAL DRAWING RIGHTS AS DEFINED THEREIN (APPROXIMATELY U.S. $70,000, WHICH AMOUNT FLUCTUATES, DEPENDING ON DAILY EXCHANGE RATE AS PRINTED IN THE WALL STREET JOURNAL). IN ADDITION, AND ON ALL OTHER</p>
                            </div>
                            <div id="page_11">


                                <p class="p18 ft8">CRUISES, ALL THE EXEMPTIONS FROM AND LIMITATIONS OF LIABILITY PROVIDED IN OR AUTHORIZED BY THE LAWS OF THE UNITED STATES (INCLUDING TITLE 46, UNITED STATES CODE SECTIONS 30501 THROUGH 30509 AND 30511) WILL APPLY.</p>
                                <p class="p4 ft3">12. FITNESS TO TRAVEL; DENIAL OF BOARDING; MINORS</p>
                                <p class="p27 ft8"><span class="ft8">a.</span><span class="ft20">Passenger warrants that he and those traveling with him are fit for travel and that such travel will not endanger themselves or others</span></p>
                                <p class="p30 ft8"><span class="ft8">b.</span><span class="ft19">Minors. Any Passenger under the age of 18 shall be considered a minor and must travel with a parent or guardian or such other person as may be permitted by Carrier's policies.</span></p>
                                <p class="p28 ft7"><span class="ft8">c.</span><span class="ft15">Minimum Age. No Passenger under the age of </span><nobr>twenty-one</nobr> (21) will be booked in a stateroom unless accompanied by an adult <nobr>twenty-one</nobr> (21) years of age or older, except for minors sailing with their parents or guardians in adjacent staterooms, or for <nobr>under-aged</nobr> married couples (proof of marriage is required). Carrier reserves the right to request proof of age at any time and Passenger's age on the date of commencement of Cruise or CruiseTour determines his or her status for the entire Cruise or CruiseTour.</p>
                                <p class="p28 ft7"><span class="ft8">d.</span><span class="ft13">Pregnancy and Infants. Any Passenger who will enter the 24th week of pregnancy by the beginning of, or at any time during their Cruise or CruiseTour agrees not to book the cruise or board the Vessel or Transport under any circumstances. No infants under a specific age (at least six (6) months for most cruises but twelve (12) months for other cruises) shall be booked on a Cruise or CruiseTour, nor brought onboard the Vessel or Transport by any Passenger under any circumstances. The most current minimum age requirements are available online at </span><a href="http://www.royalcaribbean.com/">www.royalcaribbean.com.</a></p>
                                <p class="p52 ft7"><span class="ft8">e.</span><span class="ft17">Special Needs. Any Passenger with mobility, communication or other impairments, or other special or medical needs that may require medical care or special accommodation or transport during the Cruise or CruiseTour, including but not limited to the use of any service animal, must notify the Carrier of any such condition at the time of booking. Passenger agrees to accept responsibility and reimburse Carrier for any loss, damage or expense whatsoever related to the presence of any service animal brought on board the Vessel or Transport. Passengers acknowledge and understand that certain international safety requirements, shipbuilding standards, and/or applicable regulations involving design, construction or operation of the Vessel may restrict access to facilities or activities for persons with mobility, communication or other impairments or special needs. Passengers requiring the use of a wheelchair must provide their own wheelchair (that must be of a size and type that can be accommodated on the Vessel) as wheelchairs carried on board are for emergency use only.</span></p>
                                <p class="p21 ft7"><span class="ft8">f.</span><span class="ft17">Carrier shall have the right to deny boarding for violations of any of the policies set forth in this Section. If Carrier exercises its rights under this Section 12, Passenger shall have no claim against Carrier whatsoever and Carrier shall have no liability for refund, compensation loss or damages of Passenger, including but not limited to any expenses incurred by Passenger for accommodation or repatriation.</span></p>
                                <p class="p53 ft3">13. USE OF PHOTOS, VIDEOS OR RECORDINGS</p>
                                <p class="p13 ft22">Passenger hereby grants to Carrier (and its successors, assignees and licensees) the exclusive right throughout the universe and in perpetuity to include photographic, video, audio and other visual or audio portrayals of Passenger taken during or in connection with the Cruise or</p>
                            </div>
                            <div id="page_12">


                                <div id="id_1">
                                    <p class="p24 ft7">CruiseTour (including any images, likenesses or voices) in any medium of any nature whatsoever (including the right to edit, combine with other materials or create any type of derivative thereof) for the purpose of trade, advertising, sales, publicity, promotional, training or otherwise, without compensation to the Passenger. Such grant shall include the unrestricted right to copy, revise, distribute, display and sell photographs, images, films, tapes, drawings or recordings in any type of media (including but not limited to the Internet). Passenger hereby agrees that all rights, title and interest therein (including all worldwide copyrights therein) shall be Carrier's sole property, free from any claims by Passenger or any person deriving any rights or interest from Passenger.</p>
                                    <p class="p22 ft7">Passenger hereby agrees that any recording (whether audio or video or otherwise) or photograph of or made by Passenger, other Passengers, crew or third parties onboard the Vessel or depicting the Vessel, its design, equipment or otherwise shall not be used for any commercial purpose, in any media broadcast or for any other <nobr>non-private</nobr> use without the express written consent of Carrier. The Carrier shall be entitled to take any reasonable measures to enforce this provision.</p>
                                    <p class="p19 ft3">14. YOUR TRAVEL REPRESENTATIVE</p>
                                    <p class="p54 ft7">Passenger acknowledges and confirms that any travel representative utilized by Passenger in connection with the issuance of this Ticket Contract is, for all purposes, Passenger's representative and Carrier shall not be liable for any representation made by said travel representative. Passenger shall remain liable at all times to Carrier for the price of passage. Passenger understands and agrees that the date of receipt of this Ticket Contract or any other information or notices by Passenger's travel representative shall be deemed the date of receipt of this Ticket Contract or such information or notices by the Passenger. Passenger acknowledges that Carrier is not responsible for the financial condition or integrity of any travel Representative.</p>
                                    <p class="p55 ft3">15. SEVERABILITY</p>
                                    <p class="p16 ft8">Any provision of this Ticket Contract that is determined in any jurisdiction to be unenforceable for any reason shall be deemed severed from this Ticket Contract in that jurisdiction only and all remaining provisions shall remain in full force and effect.</p>
                                    <p class="p4 ft3">16. TRANSFERS AND ASSIGNMENTS</p>
                                    <p class="p16 ft11">This Ticket Contract is <nobr>non-transferable.</nobr> Among other things, this means that the Passenger cannot sell or transfer this Ticket Contract to someone else, and Carrier shall not be liable to the Passenger or any other person in possession of a Ticket Contract for honoring or refunding such Ticket Contract when presented by such other person.</p>
                                    <p class="p55 ft3">17. RELATIONSHIP TO OTHER PURCHASES</p>
                                    <p class="p16 ft8">To the extent permitted or required by law, this Ticket Contract also covers Carrier's CruiseCare® products, shore excursions, land and hotel packages.</p>
                                </div>
                                <div id="id_2">
                                    <p class="p23 ft3">18. APPLICABLE LAW</p>
                                </div>
                            </div>
                            <div id="page_13">


                                <p class="p24 ft8">This Guest Ticket Contract shall be governed by and construed in accordance with the laws of the State of Florida, United States including, where relevant, applicable maritime laws of the United States.</p>
                                <p class="p4 ft3">19. CARRIER</p>
                                <p class="p27 ft8">Depending upon your actual sailing, the operator for a Royal Caribbean International sailing may be one of the following entities:</p>
                                <p class="p56 ft8">Royal Caribbean Cruises Ltd., 1050 Caribbean Way, Miami, FL 33130</p>
                                <p class="p44 ft8">RCL Cruises Ltd., 3 The Heights, Brooklands, Weybridge, Surrey KT13 0NY.</p>
                            </div>
                        </div>




                    </div>
                    <br/>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="agree_terms" type="checkbox" name="agree_terms" >
                                </td>
                                <td>
                                    <?php echo Yii::t('booking', "I acknowledge that I have read and accept the Terms of the above Cruise / Cruisetour Ticket Contract."); ?>
                                    <br/>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
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
					if ($isnt_EN) {
						echo GxHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/steptwo'));
					} else {
						echo GxHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/icons/btn_next_tc.png'), Yii::app()->createUrl('booking/steptwo'));
					}
					?>
                    <?php
//echo GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png');
//echo GxHtml::link(GxHtml::imageButton(Yii::app()->request->baseUrl . '/images/icons/btn_next.png'), Yii::app()->createUrl('booking/steptwo'));
                    ?>
                    <div style="font-size: 9px; -webkit-transform: scale(0.9); ">
                        <?php //echo Yii::t('booking', 'Clicking the Next button will lock the room for 20 minutes.'); ?>
                    </div>
                </span>
            </div>
        </div><!-- form -->
    </div>


    <div class="col_right">
        <div class="box">
            <h2><?php echo Yii::t('booking', 'YOUR CRUISE'); ?></h2>
            <hr/>
            <?php //echo $itineraryModel->getAttributeLabel('port_of_departure');
			echo Yii::t('booking', 'Port of Departure');
			?>: <br/>
            <b><?php
                //CVarDumper::dump($model, 10, true);
				if ($isnt_EN) {

					echo $itineraryModel->port_of_departure;
				} else {

					echo $itineraryModel->port_of_departure_tc;
				}
                ?>
				</b>
            <hr/>
            <!--
            <?php //echo $itineraryModel->getAttributeLabel('ports_of_calls');  ?>: <br/>
            <b>
            <?php
            //echo $itineraryModel->ports_of_calls;
            ?>
            </b>
            <hr/> -->
            <?php echo Yii::t('booking', 'Itinerary'); ?>:<br/>
            <b><?php
				if ($isnt_EN) {

					echo $itineraryModel->itinerary_name;
				} else {

					echo $itineraryModel->itinerary_name_tc;
				}
				?>
			</b>
            <hr/>
            <?php echo Yii::t('booking', 'Sailing Date'); ?>:<br/>
            <?php
//echo $model->start_date .'<br/>';
//echo $model->end_date .'<br/><br/>';
//echo CDateTimeParser::parse($model->start_date, Yii::app()->params->dateFormat['long']) .'<br/>';
//echo Yii::app()->getDateFormatter()->format(Yii::app()->params->dateFormat['display_StepLong'], CDateTimeParser::parse($itineraryModel->start_date, Yii::app()->params->dateFormat['long']));
            ?>
            <b><?php echo Yii::app()->getDateFormatter()->format($date_format, CDateTimeParser::parse($itineraryModel->start_date, 'dd/MM/yyyy')); ?></b> - <br/>
            <b><?php echo Yii::app()->getDateFormatter()->format($date_format, CDateTimeParser::parse($itineraryModel->end_date, 'dd/MM/yyyy')); ?></b>
            <br/>
            <?php
            if ($isnt_EN) {

                echo $itineraryModel->days_nights_full_desc;
            } else {

                echo $itineraryModel->days_nights_full_desc_tc;
            }
            ?>
            <hr/>
            <?php echo Yii::t('booking', 'Total No. of Guests'); ?>:<br/>
            <?php echo Yii::t('booking', 'Adults'); ?>: <span id="dynamic_adults" class="dynamic_contant"><?php echo $_GET['Others']['adults']; ?></span><br/>
            <?php echo Yii::t('booking', 'Children'); ?>: <span id="dynamic_child" class="dynamic_contant"><?php echo $_GET['Others']['child']; ?></span>
            <hr/>
            <?php echo Yii::t('booking', 'Ship'); ?>:<br/>
            <b>
			<?php
				if ($isnt_EN) {

					echo $itineraryModel['cruise']->cruise_name;
				} else {

					echo $itineraryModel['cruise']->cruise_name_tc;
				}
				?>
			</b>
            <hr/>
            <?php echo Yii::t('booking', 'Stateroom Category'); ?>:<br/>
            <span id="dynamic_stateroom" class="dynamic_contant"><?php
			//echo $roomModelData['rt']->rt_name;
			      if ($isnt_EN) {
						echo $roomModelData['rt']->rt_name;
					} else {

						echo $roomModelData['rt']->rt_name_tc;
					}
			?></span>
            <hr/>
            <h3><?php echo Yii::t('booking', 'Total'); ?>:</h3>
            <span style="
                  font-size: 12px;
                  "><?php echo Yii::t('booking', '(include taxes, fees and port expenses)'); ?>
            </span>
            <div class="price">
                <b>$</b> <h2 id="totalPrice"><?php echo Yii::app()->format->formatNumber($total); ?></h2> <b> HKD</b>
            </div>
            <div class="remark">
                <!--View Summary of Charges,<br/>
                Special requests amound<br/> maybe altered.-->
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
