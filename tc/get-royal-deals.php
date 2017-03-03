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
}
.getRoyalDealsSubtitle {
  font-size: 16px;
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
                var monthNames = ["1月", "2月", "3月", "4月", "5月", "6月",
                    "7月", "8月", "9月", "10月", "11月", "12月"
                ];



                $.each(value.data, function (index, element) {

                    var tmp_this = $(this)[0];
                    var book_btn = '';
                    var isNewRow = (colNumber_current == 1 || colNumber_current % parseInt(rowPerCol+1) === 0) ? true : false;



                    var arr = tmp_this.start_date.split("/");
                    var mydate = new Date(arr[2], arr[1] - 1, arr[0]);
                    //var mydate = new Date(tmp_this.start_date);
                    var str =  monthNames[mydate.getMonth()] + mydate.getDate() + ' 日';

					if( mydate < Date.now ){
						return;
					}


                    if (isNewRow) {
                        colNumber = 1;
						colNumber_current = 1;
                        result += '<div class="getRoyalDealsRow float">';
                    }

                    if (tmp_this.status == 'bookable') {
                        book_btn = '<div class="getRoyalDealsButton"><a target="_blank" href="' + site_url + '/booking/stepone?id=' + tmp_this.itinerary_id + '&lang=tc"><img src="../newimages/enquiry/btn_booknow_tc.png" title="" alt="" width="110px"/></a></div>';
                    } else {
                        book_btn = '<div class="getRoyalDealsButton"><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008_tc.png" title="" alt="" width="110px"/></a></div>';
                        //book_btn = '<div class="getRoyalDealsButton" style="visibility: hidden;"><a target="_blank" href=""><img src="../newimages/enquiry/btn_enquiry_en.gif" title="" alt=""/></a></div>';
                    }

                    result += '<div class="getRoyalDealsGrid left col' + colNumber + '">';
                    result += '<div class="getRoyalDealsSubtitle">' + str + ' (' + tmp_this.days_nights_full_desc_tc + ')</div>';
                    result += '<div class="getRoyalDealsTitle">' + tmp_this.ports_of_calls_tc + '</div>';
                    result += '<div class="getRoyalDealsThumbnail">';
                    if (tmp_this.pdf) {
                        result += '<a href="' + tmp_this.pdf + '" target="_blank"><img src="' + tmp_this.image + '" width="180"  height="145" /></a>';
                    } else {
                        result += '<img src="' + tmp_this.image + '" width="180"  height="145" />';
                    }

                    result += '</div>' + book_btn + '</div>';

                    if (colNumber == index) {
                        //result += '</div>';
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
<?php include 'tracking_tag.php'; ?>
<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; <a href="get-royal-deals.php">皇家禮遇</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/get-royal-deals/get-royal-deals-banner.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">

<div class="page_left">

<div class="page_left01" style='height:auto; width: 910px; background: url("../newimages/r_56_890.png") no-repeat scroll 0% 0% transparent; margin:0px auto auto 15px;'>
<h3 style="float:left">皇家禮遇</h3>

<div style="clear:both"></div>
<ul class="wider-190"  style="width: 890px;">
<li class="page_hover-190">精選航線</li>
<!--
<li class="wider-190"><a href="rest-of-world.php">環球航線</a></li>
-->
<li class="wider-190"><a href="promotions.php">最新優惠</a></li>
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
</div>
</div>
<script>(function(){ 'use strict';
/** Tracker is required to track events */
function create_tracker() {
  if ( window.ga ) {
    ga('create','UA-54974446-1','auto');
    $( '#getRoyalDealsWrap' ).on( 'click', '.getRoyalDealsThumbnail a', function event_track() {
      var code = $( this ).closest( '.getRoyalDealsGrid' ).find( '.getRoyalDealsSubtitle' ).text();
      if ( code ) ga('send', 'event', 'deal', 'click', code );
      else if ( console ) console.warn( 'Cannot find deal code ' + this.href );
    });
    $( '#getRoyalDealsWrap' ).on( 'click', '.getRoyalDealsAgentImg a', function event_track() {
      var agent = this.href.match( /^https?:\/\/(?:www\.)?([^\/]+)\// )[1];
      if ( agent ) ga('send', 'event', 'agent', 'click', agent );
      else if ( console ) console.warn( 'Cannot find agent domain ' + this.href );
    });
  } else
    setTimeout( create_tracker, 200 );
}
create_tracker();
})();</script>
<?php include 'pageFoot.php'; ?>
