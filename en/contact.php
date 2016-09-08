<?php include 'pageHead.php'; ?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.left {
  float: left;
}
.float {
  overflow: hidden;
}
.page_left01 b {
  width: 100%;
  margin: 0;
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
<div style="width:962px; float:left; position:relative; margin-top:-35px;background: #fff url(../newimages/banner/contact.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Contact Us</h3>

<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div><br>* Required Information</div>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="Contact">
<p><label>*Firstname: <br>
  <input type="text" name="firstname" class="contact" autocomplete="given-name" required autofocus></label>
</p>
<p><label>*Lastname:<br>
  <input type="text" name="lastname" class="contact" autocomplete="family-name" required></label>
</p>
<p><label>*Tel: <br />
  <input type="text" name="mobile" id="mobile" class="contact" required></label>
</p>
<p><label>*Email: <br />
  <input type="text" name="email" id="email" class="contact" required></label>
</p>
<p><label>*Message:<br />
  <textarea name="remarks" id="remarks" cols="45" rows="5" class="contact" required></textarea></label>
</p>
<div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div>
<br>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b style="height: auto;">Personal Information Collection Statement:</b>
    We shall keep your personal data confidential at all times. All personal data collected will be in accordance with the Personal Data (Privacy) Ordinance under the law of Hong Kong.
    </span>
</div>

<br>
<p> <input type="image" src="../newimages/img_but_send_en.gif"></p>

<script>

function check( event ) {
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