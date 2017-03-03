<?php
$royaldeals_json_file = file_get_contents("promotions.json");
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
  padding-left: 31px;
}
.getRoyalDealsAgentImg {
  margin-bottom: 10px;
}
form select {
  height: 36px;
}
</style>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; <a href="get-royal-deals.php">Promotions</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/get-royal-deals/get-royal-deals-banner.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">

<div class="page_left">

<div class="page_left01" style='height:auto; width: 910px; background: url("../newimages/r_56_890.png") no-repeat scroll 0% 0% transparent; margin:0px auto auto 15px;'>
<h3 style="float:left">Promotions</h3>
<a href="enquiry.php">
<img src="/newimages/enquiry/btn_enquiry_en.gif" style="float:right;margin:22px 20px 0px 0px">
</a>
<div style="clear:both"></div>

<ul class="wider-190"  style="width: 890px;">
<li class="wider-190"><a href="get-royal-deals.php">Selected Sailing</a></li>
<!--
<li class="wider-190"><a href="rest-of-world.php">International Sailing</a></li>
-->
<li class="page_hover-190">Promotions</li>
</ul>

<div style="height:auto; background-repeat:no-repeat; margin:75px 0 0 -10px;width: 100%;background: none;">

  <div id="getRoyalDealsWrap">

        <div id="getRoyalDealsWrapTop">
    <?php
    $getRoyalDealRowCount = 0;
      for ($i=0; $i<count($royaldeals_data["fares"]); $i++){ ?>
        <?php
          if ($getRoyalDealRowCount == 0){ ?>
            <div class="getRoyalDealsRow float">
   <?php  }  ?>
        <div class="getRoyalDealsGrid left col<?php echo $getRoyalDealRowCount+1?>">
           <!--
		   <div class="getRoyalDealsSubtitle"><?php echo $royaldeals_data["fares"][$i]["submitTitle"]?></div>
           <div class="getRoyalDealsTitle"><?php echo strtoupper($royaldeals_data["fares"][$i]["title"])?></div>
		   -->
           <div class="getRoyalDealsThumbnail">
           <?php if ($royaldeals_data["fares"][$i]["file"] != ""){ ?>
            <a href="../pdf/promotions/<?php echo $royaldeals_data["fares"][$i]["file"]?>" target="_blank"><img src="../newimages/promotions/<?php echo $royaldeals_data["fares"][$i]["image"]?>"/></a>
           <?php }else{ ?>
            <img src="../newimages/promotions/<?php echo $royaldeals_data["fares"][$i]["image"]?>"/>
           <?php } ?>

           </div>
        </div>
    <?php
        $getRoyalDealRowCount++;
        if ($getRoyalDealRowCount > 3){ ?>
          </div>
    <?php
        $getRoyalDealRowCount = 0;
        }
      }
      if ($getRoyalDealRowCount < 3){ ?>
        </div>
<?php }

    ?>

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
<style>
.getRoyalDealsThumbnail {
    padding-bottom:0;
    border-bottom:none;
}
</style>
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
