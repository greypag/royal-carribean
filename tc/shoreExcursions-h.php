<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) center center fixed; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

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
				<div style="padding:10px 20px;">
				<p style="color:#195f9b; font-weight:bold; font-size:16px;">岸上觀光團</p>			
				<p style="float:left;width:calc(100% - 275px);">
				皇家加勒比國際遊輪提供不同類型的岸上觀光團，旅客可按照個人喜好及需要報名參與。請聯絡為您預訂航程的旅行社代辦報名手續或於登船後到有關服務檯進行預訂。
				</p>
				<img src="../newimages/shoreExcursions-01.jpg" style="width:250px;height:auto;float:right">
				</div>
			
				<ul id="cat" class="wider-190"  style="width: 890px;">
   					<li id="vietnam" class="w130 active">越南</li>
					<li id="japan" class="w130">日本</li>
					<li id="taiwan" class="w130">台灣</li>
					<li id="china" class="w130">中國</li>
					<!--
					<li id="korea" class="w130">韓國</li>
					-->
				</ul>
				<div id="subcat">
				<ul id="china-s" class="subcat">
					<li>三亞</li>
					<li>廈門</li>
				</ul>
				<ul id="japan-s" class="subcat">
					<li>長崎</li>
					<li>沖繩</li>
					<li>別府</li>
					<li>宮崎</li>
					<li>廣島</li>
					<li>高知</li>
				</ul>
				<ul id="korea-s" class="subcat">
					<li>濟州</li>
					<li>首爾</li>
					<li>釜山</li>
				</ul>
				<ul id="taiwan-s" class="subcat">
					<li>高雄</li>
					<li>台北</li>
					<li>花蓮</li>
				</ul>
				<ul id="vietnam-s" class="subcat active">
					<li>峴港/順化(真美)</li>
					<li>芽莊</li>
					<li>胡志明市</li>
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
