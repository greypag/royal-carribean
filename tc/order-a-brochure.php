<?php include 'pageHead.php'; ?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<style>
/* The client wanted to copy the style from USA site, regardless of consistency... */
#orderbrochure table.t1 {

}
#orderbrochure table.t1 tr {
	border-bottom:1px solid #bed0e6;
}
#orderbrochure table.t1 td {
	padding:10px;
	width:50%;
	border-bottom:1px solid #bed0e6;
	background:white;
}
#orderbrochure table.t1 tr:nth-child(even) td {
	background:#ebf5ff;
}
#orderbrochure table.t1 tr td:nth-child(odd) {
	/*font-weight:bold;*/
}
#orderbrochure table.t1 tr:nth-child(1) td {
	background:white;
}
#orderbrochure table.t1 input[type=text] {
	width:220px;
	padding:2px;
}
#orderbrochure table.t1 select {
	width:226px;
	padding:2px;
}
#orderbrochure table.t1 select option {
	padding:2px;
}
#orderbrochure table.t1 input.shortinput {
	width:60px;
	margin-right:10px;
}

#orderbrochure table.t2 {

}
#orderbrochure table.t2 tr {

}
#orderbrochure table.t2 td {
	padding:10px;
	vertical-align:center;
	background:white;
	border-bottom:1px solid #bed0e6;
}
#orderbrochure table.t2 td:first-child {
	width:33.3333%;
	text-align:right;
}
#orderbrochure table.t2 td:last-child {
	width:66.6666%;
}
#orderbrochure table.t2 tr:nth-child(even) td {
	background:#ebf5ff;
}


#orderbrochure table.t2 table {
	width:100%;
}
#orderbrochure table.t2 table tr td {
	padding:5px;
	vertical-align:top;
}
#orderbrochure table.t2 table tr td:first-child,
#orderbrochure table.t2 table tr td:last-child {
	width:50%;
}
#orderbrochure table.t2 td table tr td {
	border-bottom:none;
}
#orderbrochure table.t2 td table tr td:first-child {
	text-align:left;
}

#orderbrochure button {
	background:#ebf5ff;
	border:1px solid #bed0e6;
	padding:4px 8px;
	border-radius:8px;
	font-weight:bold;
	color:#515050;
	cursor:pointer;
}

span.feedback-failed {
	background:red;
	color:white;
	padding:2px;
}
</style>
<script src='https://www.google.com/recaptcha/api.js?hl=zh-HK'></script>
</head>
<body style="background: url(../newimages/bodyBG.jpg) center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

	<div style='height:92px; width:962px; margin:auto; position:relative' >
		<?php include 'pageMenu.php'; ?>

		<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 航線行程 &gt; <a href="rccl_xjp.php">國際航線行程</a>
		</div>
	</div>

	<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/international-sailing-itinerary.jpg) no-repeat;">

	<div style="margin-top:250px;" class="inner">
	<div class="page_left">
	<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
		<h3>預訂國際航線行程小冊子</h3>

		<div style="position:relative; float:left; width:640px; left:30px;min-height:800px;">
			<p>
			<span class="brdefydq">率先瀏覽 2017 年國際航線行程小冊子，計劃您的非凡旅程！</span>
			</p><p>
			皇家加勒比國際遊輪，多達 270 條航線，無論是短途旅程或悠長假期都能滿足您的各種喜好。
			</p><p>
			請點擊以下電子手冊連結或填寫表格，以便我們將精美小冊子書本裝郵寄給您。
			</br>
			*小冊子將為英文版本
			</p>
			<table style="width:100%">
				<tr>
					<td style="width:25%;vertical-align:middle;text-align:center"></td>
					<td style="width:50%;vertical-align:middle;text-align:center">
						<img src="../newimages/usa_cover.jpg" style="width:210px;height:auto;margin:15px 0;">
						<div style="display:inline-block;text-align:left;">
						立即瀏覽 2017 – 2018 電子小冊子:
						</br>
						<a href="http://viewer.zmags.com/publication/8820e33d" target="_blank" style="color:#0073BB;">加勒比海</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8801a76b" target="_blank" style="color:#0073BB;">阿拉斯加</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8821a339" target="_blank" style="color:#0073BB;">歐洲</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8821a72b" target="_blank" style="color:#0073BB;">澳洲/紐西蘭/亞洲</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8801a76b" target="_blank" style="color:#0073BB;">阿拉斯加及加拿大</a>
						</div>
					</td>
					<td style="width:25%;vertical-align:middle;text-align:center"></td>
				</tr>
			</table>

			<p>&nbsp;</p>
			<form id="orderbrochure" action="form_submit.php" method="POST" onsubmit="check(event)">
				<input type="hidden" name="form" value="Brochure">
				<table class="t1" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td colspan="2" align="right">* 必須填寫部分</td>
					</tr>
					<tr>
						<td colspan="2" style="height:4px;padding:0;background:#ebf5ff;border-top:1px solid #000f57"></td>
					</tr>
					<tr>
						<td align="right"><label for="firstname">* 姓: </label></td>
						<td ><input type="text" name="lastname" id="lastname" size="15" autocomplete="family-name" required></td>
					</tr>
					<tr>
						<td align="right"><label for="lastname">* 名: </label></td>
						<td ><input type="text" name="firstname" id="firstname" size="15" autocomplete="given-name" required></td>
					</tr>
					<tr>
						<td align="right"><label for="address1">* 郵寄地址 1: </label></td>
						<td ><input type="text" name="address1" id="address1" size="15"></td>
					</tr>
					<tr>
						<td align="right"><label for="address2">郵寄地址 2: </label></td>
						<td ><input type="text" name="address2" id="address2" size="15"></td>
					</tr>
					<tr>
						<td align="right"><label for="city">* 城市: </label></td>
						<td ><input type="text" name="city" id="city" size="15" required></td>
					</tr>
					<tr>
						<td align="right"><label for="country">* 國家: </label></td>
						<td>
							<select name="country" id="country" required>
								<option value="Hong Kong" selected>香港</option>
							</select>
						</td>
					</tr>

					<tr>
						<td align="right"><label for="mobile">日間聯絡電話: </label></td>
						<td>
							<input type="tel" name="mobile" id="mobile">
						</td>
					</tr>

					<tr>
						<td align="right"><label for="email">* 電郵地址: </label></td>
						<td><input type="email" name="email" id="email" size="15" required>
					</tr>

					<tr>
						<td align="right" valign="top">皇家加勒比電郵快訊: </td>
						<td>
							<label><input type="checkbox" name="opt-in" checked="true" value="1" />
							&nbsp;透過電郵取得最新資訊及優惠</label>
						</td>
					</tr>

					<tr>
						<td colspan="2" style="height:4px;padding:0;background:white;border-bottom:1px solid #000f57"></td>
					</tr>
				</table>
				<p>
				請回答下列問題，助我們進一步優化服務質素：
				</p>
				<table class="t2" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td colspan="2" style="height:4px;padding:0;background:#ebf5ff;border-top:1px solid #000f57"></td>
					</tr>

					<tr class="t2-odd">
						<td>哪一個是您未來最想到訪的目的地？</td>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Alaska"> 阿拉斯加</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Dubai/Emirates"> 杜拜/阿聯酋</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Portugal & Canary Island"> 葡萄牙及加那利群島</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Asia"> 亞洲</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Eastern Mediterranean"> 東地中海</label></td>
									<td><label><input type="checkbox" name="planning[]" value="South America"> 南美洲</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Australia & New Zealand"> 澳洲及紐西蘭</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Europe"> 歐洲</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Transatlantic"> 大西洋</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Bahamas"> 巴哈馬</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Hawaii"> 夏威夷</label></td>
									<td><label><input type="checkbox" name="planning[]" value="West Indies/Caribbean"> 西印度群島/加勒比海</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Bermuda"> 百慕達</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Northern Europe, Scandinavia & Russia"> 北歐、斯堪的納維亞及俄羅斯</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Western Mediterranean"> 地中海</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Canada/New England"> 加拿大/新英倫</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Panama Canal"> 巴拿馬運河</label></td>
								</tr>
							</table>
						</td>
						<tr>
							<td>您現在有預訂皇家加勒比的遊輪假期嗎？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="book_exp" value="1"> 有</label></td>
									<td><label><input type="radio" name="book_exp" value="0"> 沒有</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>你曾否乘搭郵輪？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="experience" value="None"> 沒有</label></td>
									<td><label><input type="radio" name="experience" value="Other"> 曾乘搭其他品牌的郵輪，但沒有乘搭皇家加勒比</label></td>
								</tr>
								<tr>
									<td><label><input type="radio" name="experience" value="RCI"> 曾乘搭皇家加勒比</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>閣下是皇冠金錨俱樂部之會員嗎？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="crown" value="1"> 是</label></td>
									<td><label><input type="radio" name="crown" value="0"> 不是</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>您計劃何時再體驗下一次遊輪假期？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value="&lt; 3 months"> 未來3 個月內</label></td>
									<td><label><input type="checkbox" name="next_cruise[]" value="4-6 months"> 未來4 - 6 個月內</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value="7-9 months"> 未來7 - 9 個月內</label></td>
									<td><label><input type="checkbox" name="next_cruise[]" value="10-12 months"> 未來10 - 12 個月內</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value="&gt; 12 months"> 12 個月後或以上</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>您時間上允許參加 45 天或以下出發的旅程嗎？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="long_vacation" value="1"> 可以</label></td>
									<td><label><input type="radio" name="long_vacation" value="0"> 不可以</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>當您選擇旅遊行程時，下列哪一項活動您最為重視？（可選擇多個答案） </td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="activity[]" value="Family"> 合家歡活動</label></td>
									<td><label><input type="checkbox" name="activity[]" value="Relaxation"> 放鬆及消閒</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="activity[]" value="Fitness"> 健康及體育</label></td>
									<td><label><input type="checkbox" name="activity[]" value="Exploration"> 發掘新地方及文化</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>你希望以哪一種語言收取皇家加勒比的資訊？</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="lang" value="en"> 英文</label></td>
									<td><label><input type="radio" name="lang" value="zh" checked> 中文</label></td>
								</tr>
							</table>
							</td>
						</tr>
					</tr>

					<tr>
						<td></td>
						<td colspan="2"><div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div></td>
					</tr>

					<tr>
						<td colspan="2" style="height:4px;padding:0;background:white;border-bottom:1px solid #000f57"></td>
					</tr>


				</table>
				<div style="margin-top:10px;text-align:right">
					<button type="submit" id="submit">遞交</button>
				</div>

				<script>

function check( event ) {
   if ( ! location.href.match( /:\/\/localhost\/|\.ophubsolutions\.com\// ) && ! grecaptcha.getResponse() ) {
      event.preventDefault();
      document.querySelector('.g-recaptcha').scrollIntoView();
      return alert( '請勾選"我不是自動程式"。' );
   }
}

				</script>

			</form>
			<div id="feedback"></div>
			<p>&nbsp;</p>

		</div>

	</div>
	</div>
	<?php include 'pageRight.php'; ?>
	</div>
	</div>
	</div>
<?php include 'pageFoot.php'; ?>