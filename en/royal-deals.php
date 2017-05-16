<?php include 'pageHead.php'; ?>
<link href="../css/date.css" rel="stylesheet" type="text/css">
<style type="text/css">
.left {
  float: left;
}
.float {
  overflow: hidden;
}
.radio-wrap, .checkbox-wrap {
  margin-right: 15px;
}
.choice-item {
  line-height: 22px;
}
.radio-wrap input, .checkbox-wrap input{
  height: 22px;
  line-height: 22px;
  margin-right: 5px;
}
.page_left01 ul {
  float: none;
  height: auto;
  margin: 0;
  width: auto;
}
.page_left01 ul li {
  float: none;
  font-weight: normal;
  width: auto;
  height: auto;
  list-style-type: disc;
  list-style-position: inside;
}
#royal-deals-intro {
  margin: 10px 0;
}

.page_left01 b {
  width: auto;
  height: auto;
  margin: 0;
  float: none;
}
#intro_wrap {
  position: relative;
  font-size: 12px;
}
#download_pdf {
  position: absolute;
  right: 0;
  bottom: 0;
}
#captcha {
  height:38px;
  width: 100px;
}
#captcha_gen {
  font-size:25px;
  font-weight:bold;
  text-align:center;
  background-image:url(../newimages/captcha.jpg);
}
#key {
  float: left;
}
form select {
  height: 36px;
}
</style>
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; <a href="royal-deals.php">Sign up now!</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/banner/get-royal-deals-en.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Sign up now!</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div id="intro_wrap">
  <div id="royal-deals-intro">Look no further for the best cruise deals and insider WOW news from Royal Caribbean Hong Kong. Sign up for exclusive e-mails which include:</div>
  <ul>
    <li>Last-minute cruise deals</li>
    <li>Advance notice of limited-time offers</li>
    <li>Insider updates on new destinations, ships, itneraries and more</li>
  </ul>
  <br>
  <!--<a href="../pdf/Fare_list_sample.pdf"><img src="../newimages/WoW_news_en.gif" alt="" title=""/></a>-->
  <br><br>
</div>
* Required Information<br><br>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="RegRoyal">
<div class="float">
  <div class="left" style="padding-right: 4px;">
    <label>*Title: <br>
      <select name="title" required>
      <option value="">Title</option>
      <option value="mr">Mr</option>
      <option value="mrs">Mrs</option>
      <option value="ms">Ms</option>
      </select></label>
  </div>
  <div class="left" style="padding-right: 4px;">
    <label>*First Name: <br>
      <input type="text" name="firstname" class="contact" autocomplete="given-name" required autofocus></label>
  </div>
  <div class="left">
    <label>*Last Name: <br>
      <input type="text" name="lastname" class="contact" autocomplete="family-name" required></label>
  </div>
</div>
<p>Birthday:<br>
  <select id="dob_day" name="dob_day">
    <option value="">Day</option>
    <?php for($i = 1; $i <= 9; $i++) {
      echo "<option value='$i'>0$i</option>";
    } ?>
    <?php for($i = 10; $i <= 31; $i++) {
      echo "<option value='$i'>$i</option>";
    } ?>
  </select>
  <select id="dob_month" name="dob_month">
    <option value="">Month</option>
    <?php for($i = 1; $i <= 12; $i++) {
      echo "<option value='$i'>".strtoupper(date('M', mktime(0, 0, 0, $i, 1)))."</option>";
    } ?>
  </select>
  <select id="dob_year" name="dob_year">
    <option value="">Year</option>
    <?php for($i = date('Y')-2, $j = date('Y')-120; $i >= $j; $i--) {
      echo "<option value='$i'>$i</option>";
    } ?>
  </select>
</p>
<p><label>Mobile: <br>
  <input type="tel" name="mobile" class="contact"></label>
</p>
<p><label>*Email: <br>
  <input type="email" name="email" class="contact" required></label>
</p>
<br>
<b>Your Cruising Preferences</b><br><br>
<span style="color: #0073bb"><b>What's your cruise history?</b></span><br>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="RCI" class="left"><div class="choice-item left">I've cruised with Royal Caribbean</div></label></div>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="Other" class="left"><div class="choice-item left">I've cruised but not with Royal Caribbean</div></label></div>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="None" class="left"><div class="choice-item left">I've never cruised</div></label></div>
<br>
<span style="color: #0073bb"><b>What is your future destination preference?</b></span><br>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="China" class="left"><div class="choice-item left">China</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Korea" class="left"><div class="choice-item left">Korea</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Japan" class="left"><div class="choice-item left">Japan</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Singapore" class="left"><div class="choice-item left">Singapore</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Taiwan" class="left"><div class="choice-item left">Taiwan</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Vietnam" class="left"><div class="choice-item left">Vietnam</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Northern Europe" class="left"><div class="choice-item left">Northern Europe</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Mediterranean" class="left"><div class="choice-item left">Mediterranean</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Caribbean" class="left"><div class="choice-item left">Caribbean</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Alaska" class="left"><div class="choice-item left">Alaska</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Others" class="left"><div class="choice-item left">Others</div></label></div>
<br>
<span style="color: #0073bb"><b>Who will you travel with on your next trip?</b></span><br>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Spouse" class="left"><div class="choice-item left">Spouse / Partner</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Parents" class="left"><div class="choice-item left">Parents</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Children" class="left"><div class="choice-item left">Children</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Friends" class="left"><div class="choice-item left">Friends</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Relatives" class="left"><div class="choice-item left">Relatives</div></label></div>
<br>
<br>
<div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div>
<br>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b>Personal Information Collection Statement:</b><br>
    We shall keep your personal data confidential at all times. All personal data collected will be in accordance with the Personal Data (Privacy) Ordinance under the law of Hong Kong.
    </span>
</div>
<br>
<p> <input type="image" src="../newimages/img_but_send_en.gif"/>
<br><br><br>
</p>

<script>

function check( event ) {
  // leon remove DOB check
  //  var year = ~~document.querySelector('#dob_year').value;
  //  var month = ~~document.querySelector('#dob_month').value-1;
  //  var day = ~~document.querySelector('#dob_day').value;
  //  var date = new Date( year, month, day );
  //  if ( date.getMonth() !== month || date.getDate() !== day ) {
  //     event.preventDefault();
  //     return alert( "Wrong date" );
  //  }
   if ( ! location.href.match( /:\/\/localhost\// ) && ! grecaptcha.getResponse() ) {
      event.preventDefault();
      document.querySelector('.g-recaptcha').scrollIntoView();
      return alert( 'Please check "I\'m not a robot".' );
   }
}

</script>

</form>

</div>


</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
