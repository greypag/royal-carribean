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
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
</head>
<body style="background: url(../newimages/bodyBG.jpg) center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

	<div style='height:92px; width:962px; margin:auto; position:relative' >
		<?php include 'pageMenu.php'; ?>

		<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Plan A Cruise &gt; <a href="rccl_xjp.php">International Sailing Itinerary</a>
		</div>
	</div>

	<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/international-sailing-itinerary.jpg) no-repeat;">

	<div style="margin-top:250px;" class="inner">
	<div class="page_left">
	<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
		<h3>ORDER A BROCHURE</h3>

		<div style="position:relative; float:left; width:640px; left:30px;min-height:800px;">
			<p>
			<span class="brdefydq">Come Seek your next adventure</span>
			</p><p>
			Nothing makes planning your vacation easier than flipping through our new brochure. From quick escapes to long getaways, there are adventures for every style. Start dreaming now and discover every corner of the globe on the best ships at sea.
			</p><p>
			Want to check out the brochure right now? Click on our e-brochure links below. Still want to hold and flip through real pages? Go ahead and fill out form below so we can mail one right away. Don't forget to check the box so we can email you special offers too.
			</p>
			<table style="width:100%">
				<tr>
					<td style="width:25%;vertical-align:middle;text-align:center"></td>
					<td style="width:50%;vertical-align:middle;text-align:center">
						<img src="../newimages/usa_cover.jpg" style="width:210px;height:auto;margin:15px 0;">
						<div style="display:inline-block;text-align:left;">
						View our 2017-2018 ebrochures for:
						</br>
						<a href="http://viewer.zmags.com/publication/8820e33d" target="_blank" style="color:#0073BB;">Caribbean</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8801a76b" target="_blank" style="color:#0073BB;">Alaska</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8821a339" target="_blank" style="color:#0073BB;">Europe</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8821a72b" target="_blank" style="color:#0073BB;">Australia/NZ/Asia</a>
						</br>
						<a href="http://viewer.zmags.com/publication/8801a76b" target="_blank" style="color:#0073BB;">Alaska & Canada Cruisetours</a>
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
						<td colspan="2" align="right">* Required Information</td>
					</tr>
					<tr>
						<td colspan="2" style="height:4px;padding:0;background:#ebf5ff;border-top:1px solid #000f57"></td>
					</tr>
					<tr>
						<td align="right"><label for="firstname">* First Name or Forename: </label></td>
						<td ><input type="text" name="firstname" id="firstname" size="15" autocomplete="given-name" required autofocus></td>
					</tr>
					<tr>
						<td align="right"><label for="lastname">* Last Name or Surname: </label></td>
						<td ><input type="text" name="lastname" id="lastname" size="15" autocomplete="family-name" required></td>
					</tr>
					<tr>
						<td align="right"><label for="address1">* Mailing Address 1: </label></td>
						<td ><input type="text" name="address1" id="address1" size="15"></td>
					</tr>
					<tr>
						<td align="right"><label for="address2">Mailing Address 2: </label></td>
						<td ><input type="text" name="address2" id="address2" size="15"></td>
					</tr>
					<tr>
						<td align="right"><label for="city">* City or Town: </label></td>
						<td ><input type="text" name="city" id="city" size="15"></td>
					</tr>
					<tr>
						<td align="right"><label for="country">* Country: </label></td>
						<td>
							<select name="country" id="country" required>
								<option value="Hong Kong" selected>Hong Kong</option>
							</select>
						</td>
					</tr>

					<tr>
						<td align="right"><label for="mobile">Daytime Phone Number: </label></td>
						<td>
							<input type="tel" name="mobile" id="mobile">
						</td>
					</tr>

					<tr>
						<td align="right"><label for="email">* E-mail Address: </label></td>
						<td><input type="email" name="email" size="15">
					</tr>

					<tr>
						<td align="right" valign="top">Royal Caribbean Email: </td>
						<td>
							<label><input type="checkbox" name="opt-in" checked="true" value="1" />
							&nbsp;E-mail me with news and promotions.</label>
						</td>
					</tr>

					<tr>
						<td colspan="2" style="height:4px;padding:0;background:white;border-bottom:1px solid #000f57"></td>
					</tr>
				</table>
				<p>
				Please help us serve you better by answering the following optional questions:
				</p>
				<table class="t2" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td colspan="2" style="height:4px;padding:0;background:#ebf5ff;border-top:1px solid #000f57"></td>
					</tr>

					<tr class="t2-odd">
						<td>What is your future destination preference?</td>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Alaska"> Alaska</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Dubai/Emirates"> Dubai/Emirates</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Portugal & Canary Island"> Portugal & Canary Island</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Asia"> Asia</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Eastern Mediterranean"> Eastern Mediterranean</label></td>
									<td><label><input type="checkbox" name="planning[]" value="South America"> South America</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Australia & New Zealand"> Australia & New Zealand</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Europe"> Europe</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Transatlantic"> Transatlantic</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Bahamas"> Bahamas</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Hawaii"> Hawaii</label></td>
									<td><label><input type="checkbox" name="planning[]" value="West Indies/Caribbean"> West Indies/Caribbean</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Bermuda"> Bermuda</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Northern Europe, Scandinavia & Russia"> Northern Europe, Scandinavia & Russia</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Western Mediterranean"> Western Mediterranean</label></td>
									<td><label><input type="checkbox" name="planning[]" value="Canada/New England"> Canada/New England</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="planning[]" value="Panama Canal"> Panama Canal</label></td>
								</tr>
							</table>
						</td>
						<tr>
							<td>Do you currently have a Royal Caribbean cruise reserved?</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="book_exp" value="1"> Yes</label></td>
									<td><label><input type="radio" name="book_exp" value="0"> No</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Please indicate your cruise experience: </td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="experience" value="None"> New to cruising</label></td>
									<td><label><input type="radio" name="experience" value="Other"> Cruised before, but not with Royal Caribbean</label></td>
								</tr>
								<tr>
									<td><label><input type="radio" name="experience" value="RCI"> Have taken a Royal Caribbean cruise</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Are you a member of the Crown & Anchor Society?</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="crown" value="1"> Yes</label></td>
									<td><label><input type="radio" name="crown" value="0"> No</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>When do you plan on taking your next cruise vacation?</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value="<= 3 months"> Less than 3 months</label></td>
									<td><label><input type="checkbox" name="next_cruise[]" value="4-6 months"> 4-6 months</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value="7-9 months"> 7-9 months</label></td>
									<td><label><input type="checkbox" name="next_cruise[]" value="10-12 months"> 10-12 months</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="next_cruise[]" value=">= 12 months"> More than 12 months</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Are you usually able to travel in 45 days or less?</td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="long_vacation" value="1"> Yes</label></td>
									<td><label><input type="radio" name="long_vacation" value="0"> No</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Which activities are most important when you travel? (You can select more than one.): </td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="checkbox" name="activity[]" value="Family"> Family enjoyment</label></td>
									<td><label><input type="checkbox" name="activity[]" value="Relaxation"> Relaxation and rejuvenation</label></td>
								</tr>
								<tr>
									<td><label><input type="checkbox" name="activity[]" value="Fitness"> Health and fitness</label></td>
									<td><label><input type="checkbox" name="activity[]" value="Exploration"> Exploring new cultures or places</label></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>What language would you prefer Royal Caribbean to communicate with you? </td>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><label><input type="radio" name="lang" value="en" checked> English</label></td>
									<td><label><input type="radio" name="lang" value="zh"> Chinese</label></td>
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
					<button type="submit" id="submit">SUBMIT</button>
				</div>
				<script>

function check( event ) {
   if ( ! location.href.match( /:\/\/localhost\/|\.ophubsolutions\.com\// ) && ! grecaptcha.getResponse() ) {
      event.preventDefault();
      document.querySelector('.g-recaptcha').scrollIntoView();
      return alert( 'Please check "I\'m not a robot".' );
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