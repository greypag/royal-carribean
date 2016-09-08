<?php $thispage = "enquiry";?>
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
#pax input {
  width: 100px;
}
</style>
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
</head>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-en.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Book Now</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div id="intro_wrap">
  <div id="royal-deals-intro">Please fill in the following form, our customer service officer will contact you shortly.</div>
  <br>
</div>
* Required Information<br>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="FastBook">
<label><p>*Firstname: <br>
  <input type="text" name="firstname" class="contact" required></label>
</p>
<label><p>*Lastname: <br>
  <input type="text" name="lastname" class="contact" required></label>
</p>
<label><p>*Mobile:<br>
   <input type="tel" name="mobile" id="mobile" class="contact" required></label>
</p>
<label><p>*Email: <br>
  <input type="email" name="email" id="email" class="contact" required></label>
</p>
<br>
<span style="color: #0073bb"><b>Your Preferred Sailing:</b></span><br>
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
#Multiple answers
<br><br>
<div style="margin-top: 5px;"><span style="color: #0073bb"><b>Your Preferred Departure Date:</b></span></div>
<select name="depart_year" id="depart_year">
  <option value="">Year</option>
  <option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>
  <option value="<?php echo date("Y", strtotime('+1 year'))?>"><?php echo date("Y", strtotime('+1 year'))?></option>
  <option value="<?php echo date("Y", strtotime('+2 year'))?>"><?php echo date("Y", strtotime('+2 year'))?></option>
</select>
<select name="depart_month" id="depart_month">
  <option value="">Month</option>
  <?php for($i = 1; $i <= 12; $i++) { ?>
    <option value="<?php echo $i; ?>"><?php echo strtoupper(date('M', mktime(0, 0, 0, $i, 1))); ?></option>
  <?php } ?>
</select>
<br><br>
<span style="color: #0073bb"><b>How many pax will you travel with?</b></span><br>
<div class="float" style="margin-top: 5px;" id="pax">
  <div style="margin-right: 5px;margin-bottom: 5px;"><label><input type="number" name="adult" class="contact" min="0"> Adults </label></div>
  <div><label><input type="number" name="children" class="contact" min="0"> Children (age 11 or below)</label></div>
</div>
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
   var month = ~~document.querySelector('#depart_month').value-1;
   var year = ~~document.querySelector('#depart_year').value;
   var today = new Date();
   if ( month >= 0 || year > 0 ) {
      if ( ( year === today.getYear()+1900 && month <= today.getMonth()+1 ) || month < 0 || year <= 0 ) {
         event.preventDefault();
         return alert( "Wrong date" );
      }
   }
   if ( ! location.href.match( /:\/\/localhost\// ) && ! grecaptcha.getResponse() ) {
      event.preventDefault();
      document.querySelector('.g-recaptcha').scrollIntoView();
      return alert( 'Please chec "I\'m not a robot."' );
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