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
          $('body').removeClass('loading');
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

<div style="height:80px; width:962px; margin:auto; position:relative">
<?php include 'pageMenuHome.php'; ?>
</div>
<div class="page_contentbox" style='width:962px'>


			<div style="position:relative;margin-top:-102px;width:962px;height:450px;">

				<div class="flexslider">
                  <ul class="slides">
                      <li>
                         <a href="promotions.php"><img u="image" src="../images/RCI_Caribbean_Autumn_Promotion_Website_Banner.jpg" /></a>
                      </li>
                      <li>
                         <a href="../pdf/promotions/Royal Caribbean Summer 2016.pdf"><img u="image" src="../images/ACF_Banner_zh.jpg" /></a>
                      </li>
                      <li>
                           <a href="result.php"><img u="image"  src="../images/BannerOne-tc.jpg" /></a>
                      </li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/harmonyoftheseas"><img u="image"  src="../images/Harmony-cn.jpg" /></a>
                      </li>
                      <li>
                          <a href="http://www.royalcaribbean.com.hk/royalsuite2016/hk"><img u="image" src="../images/royalsuite2016-cn.jpg" /></a>
                      </li>
                  </ul>	
				</div>
				
				<div style="position:absolute;left:0;bottom:65px;width:100%;height:5px;background:#f9b934"></div>
				<div style="position:absolute;left:0;bottom:60px;width:100%;height:5px;background:#0d1b59"></div>
				
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



<div style="margin-top:-100px;" class="inner">
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
            <h3 style="width:225px; text-algin:left;padding:0px; margin:0px;text-transform:uppercase;color:#fff;font-size:18px;font-weight:bold">量子@香港</h3>
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