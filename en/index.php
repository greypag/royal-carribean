﻿<?php include 'pageHead.php'; ?>
<!--popup message box-->
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script defer src="/js/flexslider/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="/js/flexslider/flexslider.css">
<script>
$(document).ready(function ($) {
	// flexslider
	$('.flexslider').flexslider({
		pauseOnAction: false,
        start: function(slider){
					$('.flexslider').css('background','none');
        }
    });

	var url = "popup/msg.php";
	$.get(url)
		.done(function() {

			$.fancybox({
				'width': 500,
				'height': 350,
				'href': url,
				'type': 'iframe',
				'fitToView': false,
				'autoSize': false
			});

		})

	$("a#popup_1").fancybox();

	$("a#video").fancybox();
});
</script>

<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 0en - Homepage (EN)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/en/index.php
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt0e0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt0e0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<div style="height:80px; width:962px; margin:auto; position:relative">
<?php include 'pageMenuHome.php'; ?>
</div>
<div class="page_contentbox" style='width:962px'>


			<div style="position:relative;margin-top:-102px;width:962px;height:450px;">

				<div class="flexslider">
                  <ul class="slides">
										<li>
												<a href="http://www.royalcaribbean.com.hk/en/result.php"><img u="image"  src="../images/Website-Banner_Fathers-Day_ENG.jpg" /></a>
										</li>
										<li>
												<a href="http://bit.ly/RCIHK3rdBirthday"><img u="image"  src="../images/Website-Banner_Database-Collection_ENG.jpg" /></a>
										</li>
										<li>
												<a href="http://www.royalcaribbean.com.hk/en/result.php"><img u="image"  src="../images/RCI-2017-Website-Banner-May-VY-Music-Eng-1.jpg" /></a>
										</li>
										<li>
												<a href="http://www.royalcaribbean.com.hk/en/result.php"><img u="image"  src="../images/RCI-2017-Website-Banner-May-VY-Panda-Eng-1.jpg" /></a>
										</li>
									<li>
												<a href="http://www.royalcaribbean.com.hk/en/result.php"><img u="image"  src="../images/RCI 2017 Website Banner(May17)VY-Eng-op.jpg" /></a>
										</li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/en/order-a-brochure.php"><img u="image"  src="../images/Royal-Cruise_Web-Eng_v2.jpg" /></a>
                      </li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/royalsuite2016"><img u="image" src="../images/royalsuite2016-en.jpg" /></a>
                      </li>
                  </ul>
				</div>

				<div style="position:absolute;left:0;bottom:60px;width:100%;height:5px;background:#f9b934"></div>
				<div style="position:absolute;left:0;bottom:55px;width:100%;height:5px;background:#0d1b59"></div>

			</div>

			<div class="descBox">
				<h1 class="descBox__title descBox__title--white">Welcome to Royal Caribbean Hong Kong</h1>
				<div class="descBox__desc">Royal Caribbean International is an award winning global cruise brand with a 46-year legacy of innovation and introducing industry “firsts” never before seen at sea. Enjoy a Hong Kong extraordinary homeport cruise experience from any of our fleet, including Voyager of the Seas, Quantum of the Seas, Oasis of the Seas, Harmony of the Seas, and our newest Ovation of the Seas. Originating from our worldwide ports, all of our ships feature an exclusive and unmatched array of features and amenities. The jaw-dropping Broadway-style entertainment and industry-acclaimed programming are sure to appeal to families and adventurous vacationers alike. Onboard, guests are catered to with the cruise line’s world-renowned friendly and engaging Gold Anchor Service by every staff and crew member. Royal Caribbean has been voted “Best Cruise Line Overall” for 13 consecutive years in the Travel Weekly Readers Choice Awards.</div>
			</div>
<style>
.flex-viewport {
    width:100%;
}
.flexslider img {
	display:block;
}
.flex-control-nav {
    text-align:left;
    bottom:30px;
}
.flex-control-paging li a {
    width:16px;
    height:16px;
    background:white;
	box-shadow:none;
}
.flex-control-paging li a:hover {
	background:#ebc463;
}
.flex-control-paging li a.flex-active {
    background:#ebc463;
}
.flex-direction-nav a {
    width:40px;
    height:40px;
}
.flex-direction-nav .flex-prev, .flex-direction-nav .flex-next {
    opacity:0;
}
</style>

<div class="inner searchCruise">
<div class="page_left">
<div class="page_left01" style="height:auto; background:none; margin:10px auto auto 0;">

<div style="position:relative; float:left; width:716px; left:0;height:300px;margin-top: 30px;">
    <div style="height:200px;position:absolute; float:left; ">
        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px;text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">WOW DEALS</h3>
            <!--
			<a href="/pdf/promotions/bogo.jpg" target="_blank">
                <img src="../newimages/index/bogo-sq.jpg" />
            </a>
			-->
			<!--
			<a id="popup_1" href="/pdf/promotions/RC_A4_Booking_Flyer_Eng.jpg"><img src="../newimages/index/booking-sq-eng.jpg" alt=""/></a>
			-->
			<a href="promotions.php">
                <img src="../newimages/index/quantum.jpg" />
            </a>
		</div>

        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px; text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">OV @ HK</h3>
            <div style="width:225px; text-align:center;">
				<a id="video" class="fancybox.iframe" href="http://www.youtube.com/embed/50jZhxEPjsk?autoplay=1" >
					<img src="../newimages/index/video-split.jpg" />
				</a>
            </div>
        </div>

        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px;text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">SELECTED SAILINGS</h3>
            <a href="get-royal-deals.php">
                <img src="../newimages/index/wow_deals.jpg" />
            </a>
        </div>
    </div>
</div>

</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>

<?php
$localSlideshowScript = true;
include 'pageFoot.php'; ?>
