<style type="text/css">
.menuContainer{
	position: absolute;
	width: 100%;
	float: left;
	top: 20px;
	z-index: 2001;
}
.mainMenu{
	display: block;
	width: 920px;
	height: 61px;
	background: url(../images/menu_bg.gif);
	top: 5px;
	z-index:2001;
	margin: 0 auto;
}
/*.mainMenu > ul {
	display:inline-block;
	height: 61px;
}*/
.mainMenu > ul > li{
	font: bold 22px/24px "Arial Narrow", sans-serif;
	float:left;
	height:61px;
	display: inline;
	padding:0px 2px 0px 0px;
	background:url(../images/menu_line.gif) right top no-repeat;
	overflow:visible;
	position:relative;
	font-size:12px;
	font-family: sans-serif;
}
.mainMenu > ul > li > a{
	color: #061556;
	text-transform: uppercase;
	text-align: center;
	display:block;
	/*height:61px;*/
	/**line-height:61px;**/
	color: #061556;
	cursor:pointer;
	width: 90px;
	margin: 0 auto;
	text-decoration:none;
	padding: 18px 27px;
	font: bold 20px/22px "Arial Narrow", sans-serif;
	vertical-align: middle;
	font-stretch: condensed;
}
.mainMenu > ul > li.hover{
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
.mainMenu > ul > li.hover > ul{
	display:inline-block;
	min-width:130px;
}
.mainMenu > ul > li.hover > ul > li{
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
.mainMenu>ul>li.crest{
	position: absolute;
	top: -4px;
	left: 450px;
	background: url(../images/menu_logo.gif) 0 0 no-repeat;
	width: 69px;
	height: 70px;
	z-index: 2002;
}

.mainMenu>ul>li.col1{
	width: 141px;
}
.mainMenu>ul>li.col2{
	width: 141px;
}
.mainMenu > ul > li.col2 > a{
	width: 90px;
	/*margin-left: 10px;*/
}
.mainMenu>ul>li.col3{
	width: 141px;
}
.mainMenu > ul > li.col3 > a{
	width: 88px;
	/*margin-left: 12px;*/
}
.mainMenu>ul>li.col4{
	width: 135px;
	margin-left: 69px;
}
.mainMenu > ul > li.col4 > ul>li{
	width: 180px;
}

.mainMenu > ul > li.col4 > a{
	width: auto;
	padding: 18px;
}

.mainMenu>ul>li.col5{
	width: 135px;
}
.mainMenu > ul > li.col5 > ul>li{
	width: 180px;
}

.mainMenu > ul > li.col5 > a{
	width: auto;
	padding: 18px;
}

.mainMenu>ul>li.col6{
	width: 146px;
}
.mainMenu > ul > li.col6 > ul>li{
	width: 180px;
}

.mainMenu > ul > li.col6 > a{
	width: auto;
	padding: 9px;
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
<a href="../tc/<?php echo(basename($_SERVER['PHP_SELF'])); ?>" title="中文版"<span>中文</span></a><br/><br/>
<span style="line-height: 23px;">
	<a href="https://www.facebook.com/RoyalCaribbeanHongKong" target="_blank"><img src="../newimages/header/icon_facebook.png" alt="" title=""/></a>&nbsp;|&nbsp;<a href="contact.php" title="聯絡我們">聯絡我們</a>
</span>
</div>

</div>
<div style="height:15px; width:962px;position:relative; margin:auto;"></div>
<div style="height:102px; width:962px; position: relative; margin:auto; background: #fff url(../newimages/header/bg_breadcrumb.png) left bottom repeat-x">
<div class="menuContainer">
<div class='mainMenu'>
 		<ul>
			<li class="col1">
            	<a>航線行程</a>
                <ul>
                	<li><a href="result.php">航線行程</a></li>
					<li><a href="shoreExcursions.php">岸上觀光</a></li>
					<li><a href="departure-port-hong-kong.php">亞洲出發</a></li>
					<li><a href="top-10-destinations.php">全球十大航綫</a></li>
                </ul>

            </li>
			<li class="col2">
            	<a>皇家船隊</a>
                <ul>
                	<li><a href="onboard-experience.php">海洋航行者號</a></li>
                	<li><a href="quantum.php">海洋量子號</a></li>
					<li><a href="royal-fleet.php">皇家全球船隊</a></li>
                </ul>
            </li>
            <li class="col3">
				<a>皇家禮遇</a>
				<ul>
                	<li><a href="get-royal-deals.php">皇家禮遇</a></li>
                	<li><a href="royal-deals.php">立即登記</a></li>
                </ul>
			</li>
            <li class="col4">
            	<a>遊輪體驗</a>
                <ul>
                	<li><a href="dreams.php">WOW頻道</a></li>
					<li><a href="stay-connected.php">保持聯繫</a></li>
					<li><a href="cabin.php">豪華客房</a></li>
					<li><a href="food.php">環宇美食</a></li>
					<li><a href="entertainment.php">娛樂活動</a></li>
                    <li><a href="sports.php">船上運動</a></li>
					<li><a href="parentChild.php">親子樂園</a></li>
					<li><a href="mice.php">商旅公務</a></li>
					<li><a href="passion.php">海上浪漫</a></li>
                </ul>
            </li>
			<li class="col5">
            	<a>行前須知</a>
                <ul>
                	<li><a href="notice.php">行前須知</a></li>
                    <li><a href="port-information.php">停泊港口</a></li>
                    <li><a href="qa.php">常見問題</a></li>
                    <li><a href="terms-conditions.php" >條款及細則</a></li>
                </ul>
            </li>
            <li class="col6">
            	<a>皇冠金錨<br/>俱樂部</a>
            	<ul>
                	<li><a href="crown-and-anchor-society-about.php">關於俱樂部</a></li>
                    <li><a href="crown-and-anchor-society-benefits.php">會員權益</a></li>
                </ul>
            </li>
			<li class="crest"><img src="../images/menu_logo.gif"/></li>
		</ul>
	</div>
</div>