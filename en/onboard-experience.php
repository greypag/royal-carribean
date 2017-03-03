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

<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
	<?php include 'pageMenu.php'; ?>

	<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Find a Ship &gt; <a href="voyager.php">Voyager of the Seas</a>
	</div>
</div>

<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/voyager.jpg) no-repeat;">
		<div class="descBox margin-20-30 banner-margin-top marineBlue">
			<h1 class="descBox__title">Take a Hong Kong Cruise Vacation on the Voyager of the Seas</h1>
			<div class="descBox__desc">
				The legendary Voyager of the Seas® invites Hong Kong's enthusiastic travelers to step aboard and experience innovative adventures and excitement never before experienced on a cruise holiday!<br/><br/>
				After gaining fans around the world through its iconic on-board experiences, including a rock climbing wall, ice skating rink, mini-golf course, and basketball court, Voyager of the Seas® sets sail from Hong Kong with groundbreaking new exciting offerings to share, including the FlowRider® surf simulator, outdoor movie screen, and new specialty dining attractions.<br/><br/>
				Voyager of the Seas® is one of a few cruise ships in Hong Kong with an ice skating rink. For those who don’t fancy the cold, they can opt to gear up and let the good times roll at the inline skating track, located on the deck with the warm sun and ocean breeze.
				<br/><br/>
				In Hong Kong cruise vacations, children from 6 months to 17 years old are invited to join the many Adventure Ocean® youth programs, and to visit the spectacular parade of famous DreamWorks characters on show at the Royal Promenade.
				<br/><br/>
				What are you waiting for? Check out our many cruise packages today!
			</div>
		</div>
		<div style="width: 962px;float: left;background: 10px 168px no-repeat;">
			<div class="page_left">
				<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
					<?php include( 'ship_tabs.php' ) ?>

					<div style="position:relative; float:left; width:640px; left:30px;">

						<div style="position:relative; width:600px; height:366px; margin-bottom:20px; margin-top:20px;">
							<a href="cabin.php"><img src="../newimages/onboard-experience/panoramic-ocean-view.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Staterooms</li>
									<li>Panoramic Ocean View (NEW!)</li>
									<li>Virtual Balcony (NEW!)</li>
									<li>Interior</li>
									<li>Promenade View</li>
									<li>Ocean View</li>
									<li>Balcony</li>
									<li>Suites</li>
									<li class="find-more"><a href="cabin.php">Find out more</a></li>
								</ul>
							</div>
						</div>

						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="food.php"><img src="../newimages/onboard-experience/food.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Wine & Dine</li>
									<li>Windjammer Buffet</li>
									<li>Sapphire Main Dining Room</li>
									<li>Izumi Japanese Specialty Dining</li>
									<li>Giovanni's Table Specialty Dining</li>
									<li>Chops Grille Specialty Dining</li>
									<li>Schooner Bar</li>
									<li>New R Bar</li>
									<li>Sky Bar</li>
									<li>Starbucks Coffee Shop</li>
									<li>Ben & Jerry</li>
									<li class="find-more"><a href="food.php">Find out more</a></li>
								</ul>
							</div>
						</div>

						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="entertainment.php"><img src="../newimages/onboard-experience/entertainment.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Entertainment</li>
									<li>Coral Theatre</li>
									<li>Ice-Skating Show*</li>
									<li>Outdoor Movie Screen</li>
									<li>Casino Royale<sup>&reg;</sup>*</li>
									<li>Shopping at Royal Promenade*</li>
									<li>Vitality<sup>&#8480;</sup> Spa*</li>
									<li class="find-more"><a href="entertainment.php">Find out more</a></li>
								</ul>
							</div>
						</div>

						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="sports.php"><img src="../newimages/onboard-experience/sports.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Sports</li>
									<li>Flow Rider<sup>&reg;</sup></li>
									<li>Rock Wall<sup>&reg;</sup></li>
									<li>Pool Deck</li>
									<li>Mini Golf</li>
									<li class="find-more"><a href="sports.php">Find out more</a></li>
								</ul>
							</div>
						</div>


						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="parentChild.php"><img src="../newimages/onboard-experience/kids.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Family</li>
									<li>Adventure Ocean<sup>&reg;</sup></li>
									<li>DreamWorks<sup>&reg;</sup> Experience*</li>
									<li class="find-more"><a href="parentChild.php">Find out more</a></li>
								</ul>
							</div>
						</div>


						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="mice.php"><img src="../newimages/onboard-experience/mice.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">MICE</li>
									<li>Theatre*</li>
									<li>Screening Room*</li>
									<li>Boardroom*</li>
									<li class="find-more"><a href="mice.php">Find out more</a></li>
								</ul>
							</div>
						</div>


						<div style="position:relative; width:600px; height:366px; margin-bottom:20px;">
							<a href="passion.php"><img src="../newimages/onboard-experience/passion.jpg" width="600"/></a>
							<div class="right-box">
								<ul class="items">
									<li class="title">Passion</li>
									<li>Skylight Chapel*</li>
									<li>Candlelight dinner*</li>
									<li class="find-more"><a href="passion.php">Find out more</a></li>
								</ul>
							</div>
						</div>

						<p>* Extra charge applies</p>
					</div>
				</div>
			</div>
			<?php include 'pageRight.php'; ?>
		</div>
	</div>
</div>
<?php include 'pageFoot.php'; ?>
