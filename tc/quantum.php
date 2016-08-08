<?php $pageName = "quantum";?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇家遊輪船隊 &gt; <a href="quantum.php">海洋量子號</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
	<div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
		<!-- Slides Container -->
		<div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 962px; height: 365px;">
			<div>
				<img u="image"  src="../newimages/quantum/slideshow/slideshow_01.jpg"  />
				<img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_01.jpg"  />
			</div>
			<div>
				<img u="image"  src="../newimages/quantum/slideshow/slideshow_02.jpg"  />
				<img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_02.jpg"  />
			</div>
			<div>
				<img u="image"  src="../newimages/quantum/slideshow/slideshow_03.jpg"  />
				<img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_03.jpg"  />
			</div>
			<div>
				<img u="image"  src="../newimages/quantum/slideshow/slideshow_04.jpg"  />
				<img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_04.jpg"  />
			</div>
		</div>
		<!-- Arrow Navigator Skin Begin -->
		<style>
		/* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l              (normal)
            .jssora05r              (normal)
            .jssora05l:hover        (normal mouseover)
            .jssora05r:hover        (normal mouseover)
            .jssora05ldn            (mousedown)
            .jssora05rdn            (mousedown)
            */
            .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
            	background: url(../jssor/images/a17.png) no-repeat;
            	overflow:hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05ldn { background-position: -250px -40px; }
            .jssora05rdn { background-position: -310px -40px; }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 130px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 130px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->


            <!-- ThumbnailNavigator Skin Begin -->
            <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 962px; height: 80px; left:0px; bottom: 0px;">
            	<div style="background-color: #000; filter:alpha(opacity=80); opacity:.8; width: 100%; height:100%;"></div>

            	<!-- Thumbnail Item Skin Begin -->
            	<style>
            	/* jssor slider thumbnail navigator skin 03 css */
	        /*
	        .jssort03 .p            (normal)
	        .jssort03 .p:hover      (normal mouseover)
	        .jssort03 .pav          (active)
	        .jssort03 .pav:hover    (active mouseover)
	        .jssort03 .pdn          (mousedown)
	        */
	        .jssort03 .w, .jssort03 .pav:hover .w
	        {
	        	position: absolute;
	        	width: 103px;
	        	height: 50px;
	        	border: white 3px solid;
	        }
	        * html .jssort03 .w
	        {
	        	width: 103px;
	        	height: 50px;
	        }
	        .jssort03 .pdn .w, .jssort03 .pav .w { border-style: solid; }
	        .jssort03 .c
	        {
	        	width: 108px;
	        	height: 55px;
	        	filter:  alpha(opacity=45);
	        	opacity: .45;
	        	
	        	transition: opacity .6s;
	        	-moz-transition: opacity .6s;
	        	-webkit-transition: opacity .6s;
	        	-o-transition: opacity .6s;
	        }
	        .jssort03 .p:hover .c, .jssort03 .pav .c
	        {
	        	filter:  alpha(opacity=0);
	        	opacity: 0;
	        }
	        .jssort03 .p:hover .c
	        {
	        	transition: none;
	        	-moz-transition: none;
	        	-webkit-transition: none;
	        	-o-transition: none;
	        }
	        .shipsTo {
	        	width: 192px;
				float: left;
				border: 1px solid #dddddd;
				background: white;
				-webkit-box-shadow: 0px 0px 5px #cccccc;
				margin: 20px 0 31px 5px;
				padding: 8px;
	        }
	        .shipsToWrapper {
	        	background: #f7f7f7;
				padding: 25px 8px 8px 8px;
	        }
	        .shipsTo h4 {
	        	background: url("../newimages/quantum/bg_divider_repeat.png") repeat-x scroll left bottom transparent;
				font-size: 17px;
				line-height: 16px;
				padding-bottom: 20px;
				text-transform: uppercase;
				margin-bottom: 16px;
				font-weight: bold;
				color: #061556;
				margin-top: 0;
	        }
	        .dataStats {
	        	text-align: right;
	        }
	        .left {
	        	float: left;
	        }
	        .float {
	        	overflow: hidden;
	        }
	        .quantum-bottom-item-left {
	        	margin-right: 10px;
	        }
	        .quantum-bottom-item-right {
	        	width: 330px;
	        }
	        .quantum-bottom-item-right-title {
	        	color: #006ab7;
				font-weight: bold;
	        }
	        .quantum-bottom-item-right-content {
	        	text-align: justify;
	        	line-height: 150%;
	        }
	        .quantum-bottom-item {
	        	padding-bottom: 18px;
	        	width: 100%;
	        }
	        #quantum-find-more {
	        	padding-bottom: 30px;
	        	font-size: 14px;
	        	text-align: right;
	        }
			#quantum-find-more a{
	        	color: #000f57;
	        	font-weight: bold;
	        	font-size: 12px;
	        }
	        </style>
	        <div u="slides" style="cursor: move;left: 21px;">
	        	<div u="prototype" class="p" style="POSITION: absolute; WIDTH: 108px; HEIGHT: 55px; TOP: 0; LEFT: 0;">
	        		<div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
	        		<div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0"></div>
	        	</div>
	        </div>
	        <!-- Thumbnail Item Skin End -->
	    </div>
	    <!-- ThumbnailNavigator Skin End -->
	</div>

	<div style="width: 962px;float: left;margin: -50px 0 0 0;background: #fff;">
		<div class="page_left">
			<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
                    <br/>
                    <ul class="wider-190"  style="width: 650px;">
                        <li class="page_hover-190">海洋量子號</li>
                        <li class=""><a href="videos_quantum.php">影片廊</a></li>
                    </ul>
				<div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:800px;">
					<div id="quantum-top" class="float">
						<h3 style="margin-left: 0; margin-bottom: 10px;">海洋量子號</h3>
						<p>量子系列遊輪是全球遊輪史上的一次重大飛躍，更多“首次海上體驗”的娛樂革新被引入其中，例如讓遊客在300英尺的高度體驗360度景觀的北極星SM驚在甲板上的首個模擬高空跳傘；海上最大的室內運動及娛樂綜合性場館則配備了碰碰車和滾軸溜冰場等設施；還有迄今為止最大且最先進的遊輪客房，這該系列旗下的海洋量子號每個客房都可觀景。
						<br/><br/>這不是一艘簡單的新船，它已經超越了人類的想像力，這是一座讓你入海和上天的海上國際大都市，在這裡，童年的懷舊與明日的科技相逢。海洋量子號，皇家加勒比量子船系的第一艘遊輪，將永遠改變你游輪巡遊的視野。
					</div>
					<div id="quantum-bottom" class="float">
						<br/>
						<div style="margin-left: 0; margin-bottom: 10px;font-size: 16px; color: #195f9b;font-weight: bold; ">首次海上體驗</div>
						<div class="quantum-bottom-item float">
							<div class="quantum-bottom-item-wrapper">
								<div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_01.jpg" alt="RipCord by iFLY®" title="RipCord by iFLY®"/></div>
								<div class="quantum-bottom-item-right left">
									<div class="quantum-bottom-item-right-title">模擬高空跳傘 RipCord by iFLY®</div>
									<div class="quantum-bottom-item-right-content">
										海洋量子號給你帶來皇家加勒比另一首創: <br/>甲板跳傘，讓你體驗在遊輪上空飛翔的刺激。
									</div>
								</div>
							</div>
						</div>
						<div class="quantum-bottom-item float">
							<div class="quantum-bottom-item-wrapper">
								<div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_02.jpg" alt="" title=""/></div>
								<div class="quantum-bottom-item-right left">
									<div class="quantum-bottom-item-right-title">北極星 North Star<sup>SM</sup></div>
									<div class="quantum-bottom-item-right-content">
										登臨海拔300英尺的高空，在360度旋轉中屏吸靜氣，俯瞰遊輪、大海和目的地。
									</div>
								</div>
							</div>
						</div>
						<div class="quantum-bottom-item float">
							<div class="quantum-bottom-item-wrapper">
								<div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_03.jpg" alt="" title=""/></div>
								<div class="quantum-bottom-item-right left">
									<div class="quantum-bottom-item-right-title">270度<sup>SM</sup></div>
									<div class="quantum-bottom-item-right-content">
										高科技與娛樂的無縫融合，碩大高挑的空間伴隨你日夜變遷的海上旅程。
									</div>
								</div>
							</div>
						</div>
						<div class="quantum-bottom-item float">
							<div class="quantum-bottom-item-wrapper">
								<div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_04.jpg" alt="" title=""/></div>
								<div class="quantum-bottom-item-right left">
									<div class="quantum-bottom-item-right-title">從裡到外最舒適的客房</div>
									<div class="quantum-bottom-item-right-content">
										無論是住在套房還是內艙房，你都會發現更多的空間，智能的客房設計讓你的旅程更為舒適。例如,巧妙靈活的衣帽間，能放置更多的衣物和行李，家庭相連艙房為你提供三種不同的客房選擇，供三代同堂家庭或親朋好友盡享天倫之樂。還有,在海洋量子號上所有的內艙房均設虛擬陽台，自上而下的落地屏幕為你呈現大海或目的地的實景。
									</div>
								</div>
							</div>
						</div>
						<div class="quantum-bottom-item float">
							<div class="quantum-bottom-item-wrapper">
								<div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_05.jpg" alt="" title=""/></div>
								<div class="quantum-bottom-item-right left">
									<div class="quantum-bottom-item-right-title">都會尚膳</div>
									<div class="quantum-bottom-item-right-content">
										富麗堂皇的用餐環境，豐富多彩的美味旅程，親切周到的餐廳服務，可24小時享用美食! 
									</div>
								</div>
							</div>
						</div>
						<div id="quantum-find-more" class="float">
							<!--<a href="http://www.royalcaribbean.com/quantumoftheseas/quantum-experiences/">了解更多</a>-->
						</div>
					</div>

				</div>
			</div>

		</div>
		<?php include 'pageRight.php'; ?>
			
			<div style="float:right;width:210px;margin:20px 30px 0 0;">
			<p style="font-size:16px;color:#195f9b;font-weight:bold;text-align:left;padding:0;margin:0 0 10px 0">遊輪介紹</p>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=QN&br=R">海洋量子號 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=OV&br=R">海洋贊禮號 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=AN&br=R">海洋聖歌號 <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			
	</div>
</div>
<?php include 'pageFoot.php'; ?>

