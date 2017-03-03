<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
    <?php include 'pageMenu.php'; ?>

    <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 航線行程 &gt; <a href="shoreExcursions.php">岸上觀光</a>
    </div>
</div>

<div class="page_contentbox" style='width:962px'>
    <!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
    <div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
       <!-- Slides Container -->
       <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 962px; height: 365px;">
          <div>
             <img u="image"  src="../newimages/shore-excursions/slideshow/slide_show_01.jpg"  />
             <img u="thumb"  src="../newimages/shore-excursions/slideshow/thumbnail_01.gif"  />
         </div>
         <div>
             <img u="image"  src="../newimages/shore-excursions/slideshow/slide_show_02.jpg"  />
             <img u="thumb"  src="../newimages/shore-excursions/slideshow/thumbnail_02.gif"  />
         </div>
         <div>
             <img u="image"  src="../newimages/shore-excursions/slideshow/slide_show_03.jpg"  />
             <img u="thumb"  src="../newimages/shore-excursions/slideshow/thumbnail_03.gif"  />
         </div>
         <div>
             <img u="image"  src="../newimages/shore-excursions/slideshow/slide_show_04.jpg"  />
             <img u="thumb"  src="../newimages/shore-excursions/slideshow/thumbnail_04.gif"  />
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

			<div style="width:100%;height:50px;padding:10px 0;">
				<ul id="cat" class="wider-190"  style="width: 890px;">
   					<li id="vietnam" class="w130 active">越南</li>
					<li id="japan" class="w130">日本</li>
					<li id="taiwan" class="w130">台灣</li>
					<li id="china" class="w130">中國</li>
					<li id="korea" class="w130">韓國</li>
				</ul>
				<div id="subcat">
				<ul id="china-s" class="subcat">
					<li>三亞</li>
					<li>廈門</li>
				</ul>
				<ul id="japan-s" class="subcat">
					<li>福岡</li>
					<li>長崎</li>
					<li>沖繩</li>
					<li>別府</li>
					<li>熊本</li>
					<li>宮崎</li>
					<li>奈良/大阪/神戶/京都</li>
					<li>境港</li>
					<li>東京</li>
					<li>室蘭</li>
					<li>京都</li>
				</ul>
				<ul id="korea-s" class="subcat">
					<li>濟州</li>
					<li>首爾</li>
					<li>釜山</li>
				</ul>
				<ul id="taiwan-s" class="subcat">
					<li>高雄</li>
					<li>台北</li>
				</ul>
				<ul id="vietnam-s" class="subcat active">
					<li>芽莊</li>
					<li>峴港</li>
				</ul>
				</div>
			</div>


			<div id="content">
<!--
<h1>三亞・中國</h1>
<h2>三亞風光半日遊</h2>
<p>
從碼頭乘車至【天涯海角】風景區。【天涯海角】位於以美麗迷人見稱的三亞，因有著熱帶海濱的自然風光、悠久獨特的歷史文化而馳名中外。這裡海水澄藍,煙波浩瀚,帆影處處,椰林婆娑,奇石林立,水天一色。海灣沙灘上有過百大小不一的石塊，“天涯石”、“海角石”、“日月石”和“南天一柱”聳立其中, 仰天昂首,崢嶸壯觀。在此享受休閒時光後，將乘車返回碼頭。
</p>
<p>
需時:3.5 小時
</p>
<p>
費用:62美元/人
</p>
<p>&nbsp;</p>
<h2>三亞千古情半日遊</h2>
<p>
從碼頭乘車前往【三亞千古情】景區。在這裡，你可以到訪星羅棋布的海南非物質文化遺產手工作坊、閒逛特色工藝品市集、品嚐海南特色小食，更可以在南海女神廣場、崖州古城、科技遊樂館、三亞千古情大劇院、黎村和苗寨等六大主題遊玩區歡度愉快的時光。在三亞千古情大劇院上演的大型歌舞《三亞千古情》，濃縮了三亞萬年的歷史文化與傳奇,當中會看到鹿回頭的美麗傳說,鑑真東渡時的驚濤駭浪,聽到落筆洞的萬年迴聲,還有巾幗英雄冼夫人蕩氣迴腸的故事。遊覽結束後，將乘車返回碼頭。
</p>
<p>
需時:4 小時
</p>
<p>
費用:77美元/人
</p>
-->
			</div>
<div style="padding:0 0 0 30px">

<p>• 以上價錢並不包括給予導遊及司機的服務小費, 服務小費則可隨心打賞。</p>
<p>• 已參加之行程不能更改或取消, 如出發當日缺席，一切所繳費用既不退還。</p>
<p>• 以上價錢只作參考並以報名時作準。</p>
<p>• 其他條款及細則，請前往遊輪上之岸上觀光專櫃查詢。</p>
<p>• 所有岸上觀光行程將以普通話進行，如須英文導遊，請參閱<a style="text-decoration:underline !important" href="http://www.royalcaribbean.com/findacruise/ports/group/home.do">皇家加勒比國際遊輪專頁</a></p>
<p>• All shore excursions are conducted in Mandarin Chinese, should you require English speaking tours,
</br><span style="color:white">• </span>please visit <a style="text-decoration:underline !important" href="http://www.royalcaribbean.com/findacruise/ports/group/home.do">Royal Caribbean International</a></p>

<div style="text-align:right;margin-bottom:20px;cursor:pointer" class="backtotop">返回頁頂</div>
</div>


<script>
$(document).ready(function() {
	var p0 = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
	var p1 = p0.split(".");
	var p2 = p1[0].split("-");
	var page = p2[1];
	var tab = p2[2];

	$.ajax({url: "storeExcursions/"+page+"-s"+tab+".html?nocache="+Math.random(), success: function(result){
		$("#content").html(result);

		$("#cat li").removeClass("w130 active");
		$("#cat li").addClass("w130");
		$("#"+page).addClass("active");
		$("#subcat ul").removeClass("subcat active");
		$("#subcat ul").addClass("subcat");
		$("#"+page+"-s").addClass("active");
	}});

    $("#cat li").click(function() {
		window.location.href = "shoreExcursions-"+this.id+"-0.php";
    });
	$("#subcat ul li").click(function() {
		//alert($(this).prevAll().length);
		//$.ajax({url: "storeExcursions/"+$(this).closest("ul").attr("id")+$(this).prevAll().length+".html?nocache="+Math.random(), success: function(result){
		//	$("#content").html(result);
		//}});
		//alert($(this).closest("ul").attr("id"));
		window.location.href = "shoreExcursions-"+page+"-"+$(this).prevAll().length+".php";
	});

	$('.backtotop').click(function(){
		$('html, body').animate({scrollTop : 500},500);
		return false;
	});
});
</script>
<style>
.page_left01 li.w130 {
	width: 130px;
	float: left;
	height: 32px;
	text-align: center;
	padding: 14px 0px 0px;
	line-height: 32px;
	background: url("../newimages/w130.png") no-repeat;
	font-size: 14px;
	color: white;
	cursor:pointer;
}

.page_left01 li.w130.active, .page_left01 li.w130:hover {
	background: url("../newimages/w130a.png") no-repeat;
	color:#0084C4;
}

.page_left01 ul.subcat {
	display:none;
}
.page_left01 ul.subcat.active {
	display:block;
}
.page_left01 ul.subcat {
	width:670px;
	height:auto;
}
.page_left01 ul.subcat li {
	width:auto;
	height:auto;
	padding: 0 0 0 10px;
}
.page_left01 ul.subcat li:hover {
	color:#006AB7;
	cursor:pointer;
}
.page_left01 ul.subcat li:after {
	content:"|";
	padding-left:10px;
}
.page_left01 ul.subcat li:last-child:after {
	content:"";
}
#content {
	clear:both;
	padding:20px 0 10px 30px;
}

#content h1 {
	font-size:14px;
	color:#0084C4;
	text-align:center;
}
#content h2 {
	font-size:13px;
}
#content p {
	width:100%;
}
</style>

                    </div>
                </div>
                <?php include 'pageRight.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'pageFoot.php'; ?>

    <script>
    jQuery(document).ready(function ($) {
        var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 1000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 2,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: true                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 962));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
</script>
