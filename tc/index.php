<?php include 'pageHead.php'; ?>
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
Activity name of this tag: SLT 0tc - Homepage (TC)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/tc/index.php
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt0t0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt0t0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
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
												<a href="http://www.royalcaribbean.com.hk/tc/result.php"><img u="image"  src="../images/Website-Banner_Fathers-Day_CHI.jpg" /></a>
										</li>
										<li>
												<a href="http://bit.ly/RCIHK3rdBirthday"><img u="image"  src="../images/Website-Banner_Database-Collection_CHI.jpg" /></a>
										</li>
										<li>
												<a href="http://www.royalcaribbean.com.hk/tc/result.php"><img u="image"  src="../images/RCI-2017-Website-Banner-May-VY-Music-Chi-4.jpg" /></a>
										</li>
										<li>
												<a href="http://www.royalcaribbean.com.hk/tc/result.php"><img u="image"  src="../images/RCI-2017-Website-Banner-May-VY-Panda-Chi-5.jpg" /></a>
										</li>
									<li>
												<a href="http://www.royalcaribbean.com.hk/tc/result.php"><img u="image"  src="../images/RCI 2017 Website Banner(May17)VY-Chi-op.jpg" /></a>
										</li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/tc/order-a-brochure.php"><img u="image"  src="../images/Royal-Cruise_Web-CN_v2.jpg" /></a>
                      </li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/royalsuite2016/hk"><img u="image" src="../images/royalsuite2016-cn.jpg" /></a>
                      </li>
                  </ul>
				</div>

				<div style="position:absolute;left:0;bottom:60px;width:100%;height:5px;background:#f9b934"></div>
				<div style="position:absolute;left:0;bottom:55px;width:100%;height:5px;background:#0d1b59"></div>

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



<div style="margin-top:-50px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background:none; margin:10px auto auto 0;">

<div style="position:relative; float:left; width:716px; left:0;height:300px;margin-top: 30px;">
    <div style="height:200px;position:absolute; float:left; ">
        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px;text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">最新優惠</h3>
            <!--
			<a href="/pdf/promotions/bogo.jpg" target="_blank">
                <img src="../newimages/index/bogo-sq.jpg" />
            </a>
			-->
			<!--
			<a id="popup_1" href="../pdf/promotions/RC_A4_Booking_Flyer.jpg"><img src="../newimages/index/booking-sq.jpg" alt=""/></a>
			-->
			<a href="promotions.php">
                <img src="../newimages/index/quantum.jpg" />
            </a>
		</div>

        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px; text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">贊禮@香港</h3>
            <div style="width:225px; text-align:center;">
            <a id="video" class="fancybox.iframe" href="http://www.youtube.com/embed/50jZhxEPjsk?autoplay=1" >
			<img src="../newimages/index/video-split.jpg" />
			</a>
            </div>
        </div>

        <div style="width:225px; position:relative; float:left; text-align:left; margin:5px;text-align:center;">
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">精選航線</h3>
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
