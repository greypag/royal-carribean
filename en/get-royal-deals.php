<?php
$royaldeals_json_file = file_get_contents("get-royal-deals.json");
$royaldeals_data = json_decode($royaldeals_json_file, true);

include 'pageHead.php';
?>
<style type="text/css">
    .left {
        float: left;
    }
    .float {
        overflow: hidden;
    }
    h3 {
        line-height: 34px;
        font-size: 24px;
        font-weight: normal;
        color: #000f57;
        margin: 20px 0 0 31px;
        height: 34px;
        font-family: arial;
    }
    .getRoyalDealsSubtitle {
        font-size: 14px;
        color: #515050;
        margin-bottom: 11px;
    }
    .getRoyalDealsTitle {
        font-size: 16px;
        color: #515050;
        border-bottom: 1px solid #cccccc;
        margin-bottom: 5px;
        padding-bottom: 15px;
        height: 36px;
        font-weight: bold;
    }
    .getRoyalDealsGrid {
        background-color: #eeeeee;
        width: 181px;
        padding: 15px;
    }
    .getRoyalDealsThumbnail {
        padding-bottom: 6px;
        border-bottom: 2px solid #cccccc;
    }
    .getRoyalDealsButton{
        text-align:  center;
        padding-top: 10px;
    }
    .getRoyalDealsRow {
        margin-bottom: 20px;
    }
    #getRoyalDealsWrap {
        margin-left: 31px;
        margin-top: 20px;
        font-family: arial;
        width: 871px;
    }
    .col1, .col2, .col3 {
        margin-right: 9px;
    }
    #getRoyalDealsWrapTop {
        border-bottom: 1px solid #cccccc;
    }
    .getRoyalDealsAgentGrid {
        width: 25%;
    }
    .getRoyalDealsAgentRow {
        margin-bottom: 34px;
    }
    #getRoyalDealsWrapBottom {
        padding-top: 18px;
    }
    .getRoyalDealsAgentImg {
        margin-bottom: 10px;
    }
    form select {
        height: 36px;
    }
</style>

<script type="text/javascript">

    $(document).ready(function () {

		if (!window.location.origin) {
		  window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
		}
        site_url = window.location.origin + "/booking/index.php/";
		
		if(Date.now){
			Date.now = Date.now() ; 
		}else{
			
			Date.now =  function() { return +new Date.getTime(); }; 
		}
        $.ajax({
            url: site_url + "/itinerary/ServiceGetItineraries",
            type: 'GET',
            contentType: "application/json",
            dataType: 'jsonp',
            jsonpCallback: 'callback',
            success: function (value) {

                //console.log(value);
                var result = '';
                var rowPerCol = 4;
                var colNumber = 1;
                var colNumber_current = 1;
                var monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
				


                $.each(value.data, function (index, element) {

                    var tmp_this = $(this)[0];
                    var book_btn = '';
                    var isNewRow = (colNumber_current == 1 || colNumber_current % parseInt(rowPerCol+1) === 0) ? true : false;

					

                    var arr = tmp_this.start_date.split("/");
                    var mydate = new Date(arr[2], arr[1] - 1, arr[0]);
                    //var mydate = new Date(tmp_this.start_date);
                    var str = mydate.getDate() + ' ' + monthNames[mydate.getMonth()];
					
					if( mydate < Date.now ){
						return;
					}
					
                    if (isNewRow) {
                        colNumber = 1;
						colNumber_current = 1;
                        result += '<div class="getRoyalDealsRow float">';
                    }

                    if (tmp_this.status == 'bookable') {
                        book_btn = '<div class="getRoyalDealsButton"><a target="_blank" href="' + site_url + '/booking/stepone?id=' + tmp_this.itinerary_id + '&lang=en"><img src="../newimages/enquiry/btn_booknow.png" title="" alt="" width="110px"/></a></div>';
                    } else {
                        book_btn = '<div class="getRoyalDealsButton"><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008.png" title="" alt="" width="110px"/></a></div>';
                        //book_btn = '<div class="getRoyalDealsButton" style="visibility: hidden;"><a target="_blank" href=""><img src="../newimages/enquiry/btn_enquiry_en.gif" title="" alt=""/></a></div>';
                    }

                    result += '<div class="getRoyalDealsGrid left col' + colNumber + '">';
                    result += '<div class="getRoyalDealsSubtitle">' + str + ' (' + tmp_this.days_nights_full_desc + ')</div>';
                    result += '<div class="getRoyalDealsTitle">' + tmp_this.ports_of_calls + '</div>';
                    result += '<div class="getRoyalDealsThumbnail">';
                    if (tmp_this.pdf) {
                        result += '<a href="' + tmp_this.pdf + '" target="_blank"><img src="' + tmp_this.image + '" width="180"  height="145" /></a>';
                    } else {
                        result += '<img src="' + tmp_this.image + '" width="180"  height="145" />';
                    }
					
                    result += '</div>' + book_btn + '</div>';

                    if (colNumber == index) {
                       // result += '</div>';
                    }
                    //if (colNumber == rowPerCol) {
                    if (colNumber_current % parseInt(rowPerCol) === 0) {
						
                        result += '</div>';
                    }
                    colNumber++;
					colNumber_current++;

                    // console.log(result);
                });
                $('#getRoyalDealsWrapTop').html(result);
                // $('#getRoyalDealsWrapTop').slideToggle();
            }
        });

    }
    );

</script>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;">

    <div style="height:92px; width:962px; margin:auto; position:relative">
        <?php include 'pageMenu.php'; ?>
        <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; <a href="get-royal-deals.php">Get Royal Deals</a>
        </div>
    </div>

    <div class="page_contentbox" style='width:962px'>
        <div style="width:962px; float:left; position:relative; background: #fff url(../newimages/get-royal-deals/get-royal-deals-banner.jpg) no-repeat;">

			<div class="descBox margin-20-30 banner-margin-top marineBlue">
				<h1 class="descBox__title">Get Royal Deals on Cruise Destinations from Hong Kong</h1>
				<div class="descBox__desc">Royal Caribbean Royal Deals offer amazing packages to Asia’s top destinations. With cruise destinations from Hong Kong, plan a trip to travel in style to Taiwan, Vietnam, China, Japan and more at amazing prices. Enjoy all the culture, sights and food that this world has to offer while boarding with us. Click on any of our deals below to check out our deals on Hong Kong cruise excursions.<br/><br/>
				If you’re looking for more, you can check out our promotions page by clicking the promotions tab. Once you’re in the promotions section you can find great deals like an offer to fly roundtrip to our different ports for free!
				</div>
			</div>
			
            <div class="underDescBox inner">
                <div class="page_left">
                    <div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;width: 100%;background: none;margin-top: 35px;">
                        <h3>Get Royal Deals</h3>
						<div style="clear:both"></div>
						
                        <ul class="wider-190"  style="width: 890px;">
                            <li class="page_hover-190">Selected Sailing</li>
                            <!--
							<li class="wider-190"><a href="rest-of-world.php">International Sailing</a></li>
                            -->
							<li class="wider-190"><a href="promotions.php">Promotions</a></li>
                        </ul>
						<div style="height:auto; background-repeat:no-repeat; margin:75px 0 0 -10px;width: 100%;background: none">
							<div id="getRoyalDealsWrap">

								<div id="getRoyalDealsWrapTop">

								</div>
							
							
								
								<div id="getRoyalDealsWrapBottom">
									<?php include("agents.php"); ?>
								</div>
								
								
							</div>

						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>(function () {
            'use strict';
            /** Tracker is required to track events */
            function create_tracker() {
                if (window.ga) {
                    ga('create', 'UA-54974446-1', 'auto');
                    $('#getRoyalDealsWrap').on('click', '.getRoyalDealsThumbnail a', function event_track() {
                        var code = $(this).closest('.getRoyalDealsGrid').find('.getRoyalDealsSubtitle').text();
                        if (code)
                            ga('send', 'event', 'deal', 'click', code);
                        else if (console)
                            console.warn('Cannot find deal code ' + this.href);
                    });
                    $('#getRoyalDealsWrap').on('click', '.getRoyalDealsAgentImg a', function event_track() {
                        var agent = this.href.match(/^https?:\/\/(?:www\.)?([^\/]+)\//)[1];
                        if (agent)
                            ga('send', 'event', 'agent', 'click', agent);
                        else if (console)
                            console.warn('Cannot find agent domain ' + this.href);
                    });
                } else
                    setTimeout(create_tracker, 200);
            }
            create_tracker();
        })();</script>
    <?php include 'pageFoot.php'; ?>