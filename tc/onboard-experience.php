<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<style>
.right-box{
	padding:10px;
	color:#fff;
	position:absolute;
	float:left;
	width:200px;
	height:346px;
	top:0px;
	right:0px;
	background:#000;
	-moz-opacity: 0.65;
	opacity:.65;
	filter: alpha(opacity=65);
}

ul.items{
	list-style-type: disc;
	list-style-position: outside;
	list-style-image: none;
}
ul.items li {
	list-style-type: disc;
	vertical-align: top;
	padding: 0px;
	margin-bottom:-20px;
	clear: both;
	color:#FFF;
	font-size: 12px;
	font-weight: 100;
	width:200px;
}
ul.items li.title {
	list-style-type: none;
	vertical-align: top;
	padding: 0px;
	margin-left: -15px;
	margin-bottom:-20px;
	clear: both;
	font-weight: bold;
}

ul.items li.find-more {
	list-style-type: none;
	padding: 0px;
	clear: both;
}

ul.items li.find-more a{
	position: absolute;
	bottom: 10px;
	display:block;
	padding:0px;
	background: none;
	border: 2px solid #FFF;
	height:30px;
}

ul.items li.find-more a:hover{
	background: #FFF;
	color:#000;
}
</style>

<body style="background: url(../newimages/bodyBG.jpg) center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇家遊輪船隊 &gt; <a href="voyager.php">海洋航行者號</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/voyager.jpg) no-repeat;">

<div style="width: 962px;float: left;margin: 250px 0 0 0;background: 10px 168px no-repeat;">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

<?php include( 'ship_tabs.php' ) ?>

	<div style="position:relative; float:left; width:640px; left:30px;">

						<div style="position:relative; width:600px; height:366px; margin-bottom:20px; margin-top:20px;">
				<a href="cabin.php"><img src="../newimages/onboard-experience/panoramic-ocean-view.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">豪華客房</li>
						<li>環迴海景房 (新)</li>
						<li>虛擬陽台房 (新)</li>
						<li>內艙房</li>
						<li>皇家大道景觀房</li>
						<li>海景房</li>
						<li>陽台房</li>
						<li>套房</li>
						<li class="find-more"><a href="cabin.php">更多</a></li>
					</ul>
				</div>
			</div>

			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="food.php"><img src="../newimages/onboard-experience/food.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">環宇美食</li>
						<li>帆船自助餐廳</li>
						<li>藍寶石主餐廳</li>
						<li>Izumi 日式餐廳</li>
						<li>Giovanni's Table 意大利餐廳</li>
						<li>Chops Grille 美式扒房</li>
						<li>「思古諾」鋼琴吧</li>
						<li>全新 R 吧</li>
						<li>天際吧</li>
						<li>Starbucks咖啡店</li>
						<li>Ben & Jerry雪糕店</li>
						<li class="find-more"><a href="food.php">更多</a></li>
					</ul>
				</div>
			</div>

			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="entertainment.php"><img src="../newimages/onboard-experience/entertainment.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">娛樂活動</li>
						<li>珊瑚大劇院</li>
						<li>冰上表演*</li>
						<li>星空影院</li>
						<li>皇家賭場<sup>&reg;</sup>*</li>
						<li>皇家大道商店街*</li>
						<li>水療中心*</li>
						<li class="find-more"><a href="entertainment.php">更多</a></li>
					</ul>
				</div>
			</div>

			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="sports.php"><img src="../newimages/onboard-experience/sports.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">船上運動</li>
						<li>FlowRider<sup>&reg;</sup> 人工滑浪</li>
						<li>Rock Wall<sup>&reg;</sup> 攀石牆</li>
						<li>泳池</li>
						<li>迷你高爾夫球</li>
						<li class="find-more"><a href="sports.php">更多</a></li>
					</ul>
				</div>
			</div>


			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="parentChild.php"><img src="../newimages/onboard-experience/kids.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">親子樂園</li>
						<li>海上歷奇青少年活動中心</li>
						<li>夢工場<sup>&reg;</sup>體驗*</li>
						<li class="find-more"><a href="parentChild.php">更多</a></li>
					</ul>
				</div>
			</div>


			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="mice.php"><img src="../newimages/onboard-experience/mice.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">商旅公務</li>
						<li>大劇院*</li>
						<li>放映室*</li>
						<li>董事會議室*</li>
						<li class="find-more"><a href="mice.php">更多</a></li>
					</ul>
				</div>
			</div>


			<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
				<a href="passion.php"><img src="../newimages/onboard-experience/passion.jpg" width="600"/></a>
				<div class="right-box">
					<ul class="items">
						<li class="title">海上浪漫</li>
						<li>星光教堂*</li>
						<li>燭光晚餐*</li>
						<li class="find-more"><a href="passion.php">更多</a></li>
					</ul>
				</div>
			</div>

			<p>* 需額外收費</p>
		</div>
	</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
