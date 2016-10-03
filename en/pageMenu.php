<style type="text/css">
.mainMenu{
	display: block;
	width: 1018px;
	height: 73px;
	background: url(../newimages/header/bg_primary_nav.gif);
	position: absolute;
	top: 5px;
	left: -16px;
	z-index:5
}
.mainMenu > ul{
	display:inline-block;
	height: 73px;
}
.mainMenu > ul > li{
	float:left;
	height:61px;
	display: inline;
	padding:0px 2px 0px 0px;
	background:url(../newimages/header/bg_nav_divide.gif) right top no-repeat;
	overflow:visible;
	position:relative;
}
.mainMenu > ul > li > a{
	padding: 0px 18px;
	display: block;
	height: 61px;
	line-height: 61px;
	font-size: 12px;
	color: #111217;
	cursor: pointer;
	letter-spacing: 0px;
	text-shadow: 0px 0px 3px white;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	font-weight: 700;
}
.mainMenu > ul > li.hover> a{
	background: url(../newimages/header/bg_nav_hover.gif);
	text-decoration:none;
}
.mainMenu > ul > li > ul{
	border:#f9c324 5px solid;
	border-top: none;
	display:none;
	background:#fff3c5;
	z-index:5;
	padding:9px 20px;
	position:absolute;
	top:100%;
	left:0px
}
.mainMenu > ul > li.hover> ul{
	display:inline-block;
		min-width:130px;
}
.mainMenu > ul > li.hover> ul > li{
	font-size:12px;
	line-height:28px;
	cursor:pointer;
	min-width:150px;

}
@media only screen and (min-width: 760px) {
	.mainMenu > ul > li.hover > ul > li:not(:last-child){
		border-bottom:#bca866 1px dotted;
	}
	.mainMenu > ul > li.hover > ul > li.hover > a{
		text-decoration:underline !important;
		color:#000
	}
}
.mainMenu > ul > li.col4 > ul>li{
	width: 180px;
}
.mainMenu > ul > li.col5 > a{
	line-height: 16px;
	padding-top: 15px;
	height: 45px;
	text-align: center;
}
</style>
<script type="text/javascript">
$(document).ready(function (){

	$('.mainMenu li').mouseover(function (){
		$('.mainMenu li').removeClass('hover');
		$(this).addClass('hover');
	});

	$('.mainMenu li').mouseout(function (){
		$(this).removeClass('hover');
	});
	if (navigator.userAgent.indexOf('iPhone') != -1 || navigator.userAgent.indexOf('iPad') != -1) {
		$('.mainMenu a').mouseover(function (){
			if ( $(this).attr('href'))
				window.location = $(this).attr('href');
		});
	}

});
</script>


<div style="display: block; width: 600px; height: 75px; position: absolute; margin-top:15px; margin-left:-4px; z-index:50;">
	<a class="f_left" href="index.php" title="Royal Caribbean International"><img src="../newimages/header/logo.png"/></a>
	<a class="f_left" href="http://www.travelweekly.com/Travel-News/Travel-Agent-Issues/Travel-Weekly-honors-winners-of-2014-Readers-Choice-Awards" title="Travel Weekly 最佳郵輪航線 2003-2014"><img src="../newimages/header/logo-best-cruise.png" height=66/></a>
</div>

<div class="toolsContainer">
<a href="../en/<?php echo(basename($_SERVER['PHP_SELF'])); ?>" title="English Version"><span>ENGLISH</span></a>&nbsp;|&nbsp;
<a href="../tc/<?php echo(basename($_SERVER['PHP_SELF'])); ?>" title="中文版"><span>中文</span></a><br/><br/>
<span style="line-height: 23px;">
   <a href="order-a-brochure.php"><img src="../newimages/header/order_brochure_en.png" alt="Order Brochure" /></a>
   <a href="https://www.facebook.com/RoyalCaribbeanHongKong" target="_blank"><img src="../newimages/header/icon_facebook.png" alt="Facebook" /></a>&nbsp;|&nbsp;<a href="contact.php" title="CONTACT U">Contact Us</a>
</span>
</div>

</div>
<div style="height:15px; width:962px;position:relative; margin:auto;"></div>
<div style='<?php echo (!empty($thispage) && $thispage == "enquiry")? "height:66px" : "height:102px"?>; width:962px; position: relative; margin:auto; background: #fff url(../newimages/header/bg_breadcrumb.png) left bottom repeat-x' >
<div class='mainMenu' style="z-index:999999;">
 		<ul>
 			<li><a href="index.php" title="Royal Caribbean International" >HOME</a></li>
			<li>
            	<a>PLAN A CRUISE</a>
                <ul>
                	<li><a href="result.php">Book a Cruise</a></li>
					<li><a href="order-a-brochure.php">Order A Brochure</a></li>
					<li><a href="shoreExcursions.php">Shore Excursions</a></li>
					<li><a href="departure-port-hong-kong.php">Hong Kong Homeport</a></li>
					<li><a href="top-10-destinations.php">Top 10 Destinations</a></li>
                </ul>

            </li>
			<li>
            	<a>FIND A SHIP</a>
                <ul>
                	<li><a href="onboard-experience.php">Voyager of the Seas</a></li>
                	<li><a href="quantum.php">Quantum of the Seas</a></li>
					<li><a href="royal-fleet.php">Royal Fleet</a></li>
                </ul>
            </li>
            <li class="col2">
            	<a>GET ROYAL DEALS</a>
            	<ul>
                	<li><a href="get-royal-deals.php">GET ROYAL DEALS</a></li>
                	<li><a href="royal-deals.php">SIGN UP NOW</a></li>
                </ul>
            </li>
            <li>
            	<a>ALL ABOUT CRUISING</a>
                <ul>
                	<li><a href="dreams.php">WOW Channel</a></li>
					<li><a href="stay-connected.php">Stay Connected</a></li>
					<li><a href="cabin.php">Staterooms</a></li>
					<li><a href="food.php">Wine & Dine</a></li>
					<li><a href="entertainment.php">Entertainment</a></li>
                    <li><a href="sports.php">Sports</a></li>
					<li><a href="parentChild.php">Family</a></li>
					<li><a href="mice.php">MICE</a></li>
					<li><a href="passion.php">Passion</a></li>
                </ul>
            </li>
			<li class="col4">
            	<a>BEFORE YOU BOARD</a>
                <ul>
                	<li><a href="notice.php">Before you Board</a></li>
					<li><a href="port-information.php">Port Information</a></li>
                    <li><a href="qa.php">FAQ</a></li>
                    <li><a href="terms-conditions.php" >Terms & Conditions</a></li>
                </ul>
            </li>
            <li class="col5">
            	<a>CROWN AND <br/>ANCHOR SOCIETY</a>
            	<ul>
                	<li><a href="crown-and-anchor-society-about.php">About the Program</a></li>
                    <li><a href="crown-and-anchor-society-benefits.php">Member Benefits</a></li>
                </ul>
            </li>

			<li style="display:none;">
            	<a>CROWN & ANCHOR SOCIETY</a>
                <ul>
                	<li><a href="memclub.php">About CAS</a></li>
                    <li><a href="member.php">Become a Member</a></li>
                </ul>
            </li>
		</ul>
	</div>