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

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 客務專區 &gt; <a href="rccl_xjp.php">停泊港口</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/asia-ports-of-departure.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>停泊港口</h3>

<ul class="wider-190" style="width: 890px;" id="tab_hongkong">
    <li class="page_hover-190">香港</li>
    <li class="wider-190"><a href="javascript:tab('others')">其他</a></li>
</ul>
<ul class="wider-190" style="width: 890px; display:none" id="tab_others">
    <li class="wider-190"><a href="javascript:tab('hongkong')">香港</a></li>
    <li class="page_hover-190">其他</li>
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
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">港口</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">啟德郵輪碼頭</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">地址</td>
			    <td style="padding-left:10px;" align="left" valign="top">九龍承豐路33號 (入口位於祥業街)</td>
		      </tr>
			  <tr>
			    <td width="26%" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >語言</td>
			    <td align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >英語、粵語、國語</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">氣候</td>
			    <td style="padding-left:10px;" align="left" valign="top">香港屬亞熱帶氣候，全年的氣溫較高，年平均溫度為22.8°C。<br />
		        夏天炎熱且潮濕，冬天涼爽而乾燥。<br />
		        五月至九月間多雨，平均全年雨量2,214.3毫米。<br />
		        夏秋之間，時有颱風吹襲，七月至九月是香港的颱風較多的季節。</td>
		      </tr>
			  <tr>
			    <td width="26%" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >衣著</td>
			    <td align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >在香港旅遊，一般以穿輕鬆休閒的服飾為適宜。<br />
			    	可根據季節和氣溫變化選擇適合的服裝。</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">貨幣</td>
			    <td style="padding-left:10px;" align="left" valign="top">港幣</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">&nbsp;</td>
			    <td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top"><h2>交通 </h2></td>
			    <td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">小巴</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">綠色專線小巴86號 </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#FFFFFF">路線</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#FFFFFF">往返郵輪碼頭至九龍灣港鐵站（德福花園） </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">服務時間</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">每日早上7 時 – 晚上11時 </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#FFFFFF">收費</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#FFFFFF">每程 $5.5</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">車程</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">約為12至30分鐘</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">&nbsp;</td>
			    <td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">巴士</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">九巴5R</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">路線</td>
			    <td style="padding-left:10px;" align="left" valign="top">穿梭行走郵輪碼頭、牛頭角及觀塘港鐵站</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">服務時間</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">於周六、日及假期，早上11時 – 晚上7時提供服務 </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">收費</td>
			    <td style="padding-left:10px;" align="left" valign="top">每程 $6.7 </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">車程</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">約為30分鐘</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">&nbsp;</td>
			    <td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">渡輪</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">除陸路交通外，旅客亦可於港島的北角碼頭或西灣河碼頭，<br />
		        乘搭渡輪暢遊維港，抵達觀塘碼頭後轉乘的士，便可到達郵輪碼頭。 </td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">的士</td>
			    <td style="padding-left:10px;" align="left" valign="top">郵輪碼頭前設有的士上落客區，方便旅客往返。</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">私家車</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">郵輪碼頭提供120個時租車位。</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">收費</td>
			    <td style="padding-left:10px;" align="left" valign="top">星期一至四 每小時 $8
		  / 星期五至日 每小時 $12 / <br />
		  車位有限，建議乘搭公共交通工具</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">旅遊巴士</td>
			    <td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">泊船日旅遊巴士</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;" width="26%" align="left" valign="top">入閘費為</td>
			    <td style="padding-left:10px;" align="left" valign="top">$125– 9至28座， $250– 29座以上
			  先到先得，<br />
			  等候時間上限20分鐘
		  旅遊巴泊位只共上/落客，不設停泊。</td>
		      </tr>
			  <tr>
			    <td style="padding-left:10px;"  align="left" valign="top">&nbsp;</td>
			    <td style="padding-left:10px;" align="left" valign="top">&nbsp;</td>
		      </tr>
			  <tr>
			    <td colspan="2" align="left" valign="top" style="padding-left:10px;" ><h2>四處走走</h2></td>
		      </tr>
			  <tr>
			    <td colspan="2" align="left" valign="top" style="padding-left:10px;" >- 主要市區地點均在10公里範圍內。</td>
		      </tr>
			  <tr>
			    <td colspan="2" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >- 距離香港國際機場約42公里。</td>
		      </tr>
			  <tr>
			    <td colspan="2" align="left" valign="top" style="padding-left:10px;" >- 前往九龍機鐵站辦理登機手續只有10公里路程。</td>
		      </tr>
			  <tr>
			    <td colspan="2" align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >- 
			      
			      紅磡火車站相距約5公里路程，提供前赴深圳、廣洲、上海、北京及內地其他城市的火車服務。</td>
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
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">別府</td>
		<td width="74%"align="left" valign="top" bgcolor="#EEEEEE" style="padding-left:10px;" >
		Beppu Ishigaki No.4 Wharf
		</br>
		2002, Kita-Ishigaki, Oaza, Beppu City Japan
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">廣島</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Hiroshima Itsukaichi Public Berth
		</br>
		8, 3-chome, Itsukaichi cho, Saeki-Ku, Hiroshima, Japan
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">高知</td>
		<td style="padding-left:10px;" bgcolor="#EEEEEE" align="left" valign="top">
		Kochi Misatochiku No.7-3 wharf  
		</br>
		4706-6, Niida, Kochi-City,Japan
		</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" style="padding-left:10px;" >沖繩</td>
		<td align="left" valign="top" style="padding-left:10px;" >
		Naha New Port Tomari Wharf No.8
		</br>
		1-28 Wakasa Naha-City, Okinawa, Japan
		</td>
	</tr>
	<tr>
		<td width="26%" align="left" valign="top" style="padding-left:10px;" bgcolor="#EEEEEE">沖繩</td>
		<td align="left" valign="top" style="padding-left:10px;" bgcolor="#EEEEEE">
		Naha International Container Terminal No.9/No.10 Wharf
		</br>
		1-27-1, Minato-Machi, Naha City, Okinawa-Ken
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">長崎</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Nagasaki Matsugae Wharf
		</br>
		7-1, Matsugae-Machi, Nagasaki-City, Japan
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">高雄</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		高雄港 8,9,10號碼頭
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">台北</td>
		<td style="padding-left:10px;" align="left" valign="top">
		基隆港 東2號碼頭 / 基隆市中正路1號 (VY0827)
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">台北</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		基隆港 西16號碼頭 (VY0723 & VY0929)
		</td>
	</tr>	
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">花蓮</td>
		<td style="padding-left:10px;" align="left" valign="top">
		花蓮市海岸路66號
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">順化/峴港</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		Loc Vinh Commune, Phu Loc District, Thua Thien Hue Province, Vietnam
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">芽莊</td>
		<td style="padding-left:10px;" align="left" valign="top">
		05 Tran Phu Street, Nha Trang City, Vietnam
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">三亞</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		International Cruise Terminal
		</br>
		 三亞鳳凰島
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top">廈門</td>
		<td style="padding-left:10px;" align="left" valign="top">
		Xiamen International Cruise Terminal
		</br>
		廈門湖里區東港路2
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px;" width="26%" align="left" valign="top" bgcolor="#EEEEEE">釜山</td>
		<td style="padding-left:10px;" align="left" valign="top" bgcolor="#EEEEEE">
		Busan Gamman Container Terminal (Berth No.3~4)
		</br>
		 #147 Bukhangro, Nam-Gu, Busan, Korea  
		</td>
	</tr>
</table>

<p>&nbsp;</p>
<p class="remark">
註:
所有停泊港口僅供參考，個別航次如有任何更改，將以船上更新資料作準。
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