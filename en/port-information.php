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

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Before You Board &gt; <a href="rccl_xjp.php">Port Information</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/asia-ports-of-departure.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Port Information</h3>

<ul class="wider-190" style="width: 890px;" id="tab_hongkong">
    <li class="page_hover-190">Hong Kong</li>
    <li class="wider-190"><a href="javascript:tab('others')">Others</a></li>
</ul>
<ul class="wider-190" style="width: 890px; display:none" id="tab_others">
    <li class="wider-190"><a href="javascript:tab('hongkong')">Hong Kong</a></li>
    <li class="page_hover-190">Others</li>
</ul>

<script>
function tab(id) {	
	if (id == "others") {
		document.getElementById('hongkong').style.display = "none";
		document.getElementById('tab_hongkong').style.display = "none";
		document.getElementById('others').style.display = "block";
		document.getElementById('tab_others').style.display = "block";
	} else {
		document.getElementById('hongkong').style.display = "block";
		document.getElementById('tab_hongkong').style.display = "block";
		document.getElementById('others').style.display = "none";
		document.getElementById('tab_others').style.display = "none";
	}
}
</script>

<div id="hongkong" style="position:relative; float:left; width:640px; left:30px; top:10px; min-height:600px;">
<table width="95%" border="0" align="left" cellpadding="3" cellspacing="0">
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Port</td>
		<td width="74%"align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >Kai Tak Cruise Terminal</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Address</td>
		<td style="padding-left:10px;" align="left" valign="top"> 33 Shing Fung Road, Kowloon, Hong Kong</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >Language</td>
		<td align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >English / Cantonese / Mandarine</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Climate</td>
		<td style="padding-left:10px;" align="left" valign="top">Hong Kong has a subtropical climate, high temperatures throughout the year, the annual average temperature is 22.8 ℃. Hot and humid in summer; cool and dry in the winter. Between May and September are rainy seasion, with an average annual rainfall 2,214.3 mm. Between summer and fall, July to September, is typhoon season in Hong Kong.</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >Clothing</td>
		<td align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >In Hong Kong, casual clothing is most appropriate. You can select the appropriate clothing depending on the season and temperature changes. </td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Currency</td>
		<td style="padding-left:10px;" align="left" valign="top">HK Dollars</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">&nbsp;</td>
		<td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" style="padding-left:10px;" ><h2>Getting Here </h2></td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Minibus</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">Green minibus No. 86 operates between the cruise terminal and Kowloon Bay MTR Station (Telford Gardens) from 7am to 11pm daily with a fare charged at $5.5. The headway of the minibus route service will be approximately 12 to 30 minutes.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Bus</td>
		<td style="padding-left:10px;" align="left" valign="top">KMB bus route 5R provides weekday service between the cruise terminal, Ngau Tau Kok and Kwun Tong MTR station from 11am-4pm. Saturday, Sunday, and holiday service from 11am-7pm with a fare charged at $6.7. The headway of the bus route service will be approximately 30 minutes. <a style='color:#2E5FA7' href='http://www.kmb.hk/en/services/search.html?busno=5R'>Click here for more details</a>.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Ferry</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">In addition to land based transportation, the terminal can be accessed from the Hong Kong Island via a scenic ferry ride from North Point or Sai Wan Ho pier to Kwun Tong pier, and then changing to a taxi.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Taxi</td>
		<td style="padding-left:10px;" align="left" valign="top">Pick up and drop off area in front of terminal.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Private Car Parking</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">120 hourly parking spaces are available during opening hours. Rates are HK$8/hour Mon-Thu, and HK$12/hour Fri-Sun. As spaces do fill up quickly, we do not recommend trying to park at the Kai Tak Cruise Terminal before embarking on a cruise journey.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Private Coach</td>
		<td style="padding-left:10px;" align="left" valign="top">Gate fees will be charged on port call days– $125 for 9-28 seats, $250 for 29 or more seats. Coach bays are available on a first-come-first-served basis, for a maximum of 20 minutes, for letting passengers board / alight only, no parking.</td>
	</tr>
	<tr>
		<td style="padding-left:10px;"  align="left" valign="top">&nbsp;</td>
		<td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" style="padding-left:10px;" ><h2>Getting Around (Distance in Kilometers/ Miles)
		</h2></td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" style="padding-left:10px;" >- All major metro areas within 10 km (6 mi).</td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >- 42 km (25 mi) by road to Hong Kong International Airport.</td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" style="padding-left:10px;" >- 10 km (6 mi) by road to Kowloon Station Airport Express Line and airline check-in.</td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >- 
			
			5 km (3 mi) by road to Hung Hom train station, with rail connections to Shenzhen, Guangzhou, Shanghai, Beijing and other Chinese cities.</td>
		</tr>
		<tr>
			<td style="padding-left:10px;"  align="left" valign="top">&nbsp;</td>
			<td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		</tr>
</table>
</div> 
						
<div id="others" style="position:relative; float:left; width:640px; left:30px; top:10px; min-height:600px; display:none">
<table width="95%" border="0" align="left" cellpadding="3" cellspacing="0">
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Beppu</td>
		<td width="74%"align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >
		Beppu Ishigaki No.4 Wharf
		</br>
		2002, Kita-Ishigaki, Oaza, Beppu City Japan
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Hiroshima</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Hiroshima Itsukaichi Public Berth
		</br>
		8, 3-chome, Itsukaichi cho, Saeki-Ku, Hiroshima, Japan
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Kochi</td>
		<td style="padding-left:10px;" bgcolor="#EEEEEE" align="left" valign="top">
		Kochi Misatochiku No.7-3 wharf  
		</br>
		4706-6, Niida, Kochi-City,Japan
		</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" style="padding-left:10px;" >Okinawa</td>
		<td align="left" valign="top" style="padding-left:10px;" >
		Naha New Port Tomari Wharf No.8
		</br>
		1-28 Wakasa Naha-City, Okinawa, Japan
		</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" style="padding-left:10px;" bgcolor="#EEEEEE">Okinawa</td>
		<td align="left" valign="top" style="padding-left:10px;" bgcolor="#EEEEEE">
		Naha International Container Terminal No.9/No.10 Wharf
		</br>
		1-27-1, Minato-Machi, Naha City, Okinawa-Ken
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Nagasaki</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Nagasaki Matsugae Wharf
		</br>
		7-1, Matsugae-Machi, Nagasaki-City, Japan
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Kaohsiung</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		Pier No. 8,9,10, Kaohsiung Harbour
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Taipei</td>
		<td style="padding-left:10px;" align="left" valign="top">
		基隆港 東2號碼頭 / 基隆市中正路1號 (VY0827)
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Taipei</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		基隆港 西16號碼頭 (VY0723 & VY0929)
		</td>
	</tr>	
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Hualien</td>
		<td style="padding-left:10px;" align="left" valign="top">
		No.66, Hai-an Rd., Hualien City, Hualien County 970, Taiwan (R.O.C.)
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Chan May/ Danang</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		Loc Vinh Commune, Phu Loc District, Thua Thien Hue Province, Vietnam
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Nha Trang</td>
		<td style="padding-left:10px;" align="left" valign="top">
		05 Tran Phu Street, Nha Trang City, Vietnam
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Sanya</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		International Cruise Terminal
		</br>
		 Sanya Phoenix Island 
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">Xiamen</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Xiamen International Cruise Terminal
		</br>
		No.2 Dongang Road, Huili District,Xiamen
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">Busan</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		Busan Gamman Container Terminal (Berth No.3~4)
		</br>
		 #147 Bukhangro, Nam-Gu, Busan, Korea  
		</td>
	</tr>
</table>

<p>&nbsp;</p>
<p class="remark">
Notes: 
Port information is for reference only.
Each port may differ subject to sailing and will be final according to ship’s update. 
</p>

</div>


</div>
</div>

<style>
.page_left01 strong {
    width: auto;
    height: auto;
    float: none;
    margin: 0;
}
table tr td {
	padding:6px 0;
}
table tr td p {
	padding:0;
	margin:0;
}
table tr td p:first-child {
	margin:0 0 5px 0;
}
</style>

<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>