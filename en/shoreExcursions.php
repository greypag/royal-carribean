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

	<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Plan A Cruise &gt; <a href="shoreExcursions.php">Shore Excursions</a>
	</div>
</div>

<div class="page_contentbox" style='width:962px;'>
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

				<div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:800px;">
					<p style="margin-top:20px">
					 * Should you require English speaking tours, please visit <a style="text-decoration:underline !important" href="http://www.royalcaribbean.com/findacruise/ports/group/home.do">Royal Caribbean International</a>
					</p>
					
					
					<p align="justify">
						<img src="../newimages/shore-excursions/korea.jpg" width="300px" align="left" style="padding:10px;padding-left:0px;"/>
						<span class="brdefydq">Korea</span>
						<span style="display:block;font-weight:bold;">Jeju</span>
						Just off the southern coast of the Korean peninsula lies an idyllic isle that just may remind you of Hawaii. Jeju island (Cheju-do in Korean) is a volcanic island dominated by Halla mountain and replete with spectacular waterfalls, sandy beaches, lava formations, citrus groves and warm tropical water. What more could you ask of Korea's favored destination for honeymooners?
						<span  style="display:block;">&nbsp;</span>
						<span  style="display:block;">&nbsp;</span>
						<span style="display:block;font-weight:bold;">Incheon (Seoul)</span>
						Incheon is South Korea's third-largest metropolis and the largest seaport on the west coast. It's also a port city that offers memorable experiences such as watching the sun set over the ocean from a bench, wiggling your toes in fine, silver sand, sitting on the rocks along the shore sport fishing for the day and being dazzled by red and blue silk-covered lanterns lighting up the trees at night. Explore Incheon, the home of active and passionate people, the place where the Korea-U.S. Treaty was signed and a city exuding an energetic and determined spirit.
					</p>
					<br/>
					<p align="justify">
						<img src="../newimages/shore-excursions/japan.jpg" width="300px" align="left" style="padding:10px;padding-left:0px;"/>
						<span class="brdefydq">Japan</span>
						
						<span style="display:block;font-weight:bold;">Kobe</span>
						Located in southern Hyogo and on the northern coast of the Osaka Bay, Mt. Rokko is known as the best sightseeing and health resort in the Hanshin (Osaka-Kobe) district. The peak of the mountain is approximately 931 meters above sea level. The view of Kobe from the mountain is breathtaking and has gained the title, “the Million Dollar Night View.”
						<span  style="display:block;">&nbsp;</span>
						<span  style="display:block;">&nbsp;</span>
						<span  style="display:block;">&nbsp;</span>
						<span style="display:block;font-weight:bold;">Nagasaki</span>
						Many people in Japan consider Nagasaki to be one of the country's most beautiful cities. And it is also, perhaps, Japan's most cosmopolitan city, with a unique blend of outside cultures interwoven with its history, architecture, food, and festivals. The port of Nagasaki resembles an amphitheater looking out to the sea. Its matsuri (festivals) are famed throughout Japan for their exuberance and authenticity. These festivals can feature everything from dragon boat races to lantern festivals to kite fights and usually have elaborate parades with brightly colored floats.
						<span  style="display:block;">&nbsp;</span>
						
						<span style="display:block;font-weight:bold;">Okinawa</span>
						Naha, the capital and largest city of Okinawa Prefecture, boasts a unique Japanese culture. As the region's transportation hub, Naha connects travelers with other parts of Okinawa, Japan and Asia; consequently, Okinawans have grown accustomed to openly sharing their distinctive customs with visitors from all over the world - right down to their very own dialect, Uchinaguchi.
						<span  style="display:block;">&nbsp;</span>
						
						<span style="display:block;font-weight:bold;">Beppu</span>
						Beppu is located in the central part of Oita, on the coast of Beppu Bay faces the sea, with Mt. Tsurumi and the rest of the Tsurumi Volcanoes in the rear. Hot water gushes at many spots in the city. The Beppu-onsen Spa consists of eight hot spring areas, which are collectively called "Beppu Hatto". On the outskirts of Beppu, Takasaki Shizen-dobutsu-en(Mt. Takasaki Monkey Land Natural Park) featuring a specifies of monkey native of Japan designated as a Natural Monument and Lake Shidaka-ko amid Mt. Tsurumi-dake, Mt. Yufu-dake and other mountains.
					</p>
					<br/>
					<p align="justify">
						<img src="../newimages/shore-excursions/taiwan.jpg" width="300px" align="left" style="padding:10px;padding-left:0px;"/>
						<span class="brdefydq">Taiwan</span>
						
						<span style="display:block;font-weight:bold;">Keelung (Taipei)</span>
						Taipei is a city of opposites. There are ancient temples and neon-laden clubs. The world's tallest building and tiniest markets. The bustle of millions of people and the peace of botanical gardens. And if you are a gourmet, Taipei offers the greatest variety of Chinese food in the world. This capital of the Republic of China and Taiwan's largest city is one destination that will leave you feeling a more fulfilled person.
						<span  style="display:block;">&nbsp;</span>
						<span  style="display:block;">&nbsp;</span>
						<span style="display:block;font-weight:bold;">Kaohsiung</span>
						Kaohsiung (say "gow-shung") is a little off-the-beaten-path, but a gem of a destination for the lucky ones who go. Originally a fishing village, it's now the largest shipping port on Taiwan and full of surprises. Explore the old city on one side of the river, the new downtown on the other side, the park area of Shoushan (Mount Shou) where indigenous monkeys roam free, or the Lotus Lake district where Buddist temples, pavilions and pagodas stand ever tranquil.</p>
						<br/>
						<p align="justify">
							<img src="../newimages/shore-excursions/vietnam.jpg" width="300px" align="left" style="padding:10px;padding-left:0px;"/>
							<span class="brdefydq">Vietnam</span>
							<span style="display:block;font-weight:bold;">Nha Trang</span>
							Situated upon perhaps the most scenic coastline in Vietnam is the city of Nha Trang. With its crystal-clear turquoise waters and pristine beaches, this city is fast becoming a favorite among snorkelers, scuba divers and sunbathers. In fact, Nha Trang Bay is considered to be one of the most beautiful bays in the world.
							<span  style="display:block;">&nbsp;</span>
							<span  style="display:block;">&nbsp;</span>
							<span  style="display:block;">&nbsp;</span>
							<span style="display:block;font-weight:bold;">Chan May</span>
							Centrally located between historic cities, the working port of Chan May is the gateway to Danang, Hoi An and Hue, Vietnam. Danang is home to the famous China Beach and charming Hoi An is an ancient trading town with shops, art galleries and restaurants.
							<span  style="display:block;">&nbsp;</span>
						</p>
						</div>
					</div>
				</div>
				<?php include 'pageRight.php'; ?>
			</div>
		</div>
	</div>
	<?php include 'pageFoot.php'; ?>