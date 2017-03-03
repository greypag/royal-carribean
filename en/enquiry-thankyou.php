<?php $thispage = "enquiry"; ?>
<?php include 'pageHead.php'; ?>
<script src="../js/date.js"></script>
<script src="../js/CAPTCHA.js"></script>
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
</style>
<script type="text/javascript">
var captchastring = '';
function getCaptcha() {
    var chars = "0Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Ii9Jj0Kk1Ll2Mm3Nn4Oo5Pp6Qq7Rr8Ss9Tt0Uu1Vv2Ww3Xx4Yy5Zz";
    var string_length = 5;

    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        captchastring += chars.substring(rnum,rnum+1);
    }
    document.getElementById("randomfield").innerHTML = captchastring;
}
$(function () {
  getCaptcha();
});
</script>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-en.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Book Now</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<br/>Thank you for your enquiry, our customer service officer will contact you shortly.<br/><br/>
Continue to browse the site, click <a href="index.php" style="text-decoration: underline !important;">here</a>.
</div>


</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
<script>

function submitForm() {
  var isValid = true;
  if ($('#first-name').val()===''){
    isValid = false;
    $('#first-name').css('border-color', 'red');
  }else{
    $('#first-name').removeAttr('style');
  }

  if ($('#last-name').val()===''){
     isValid = false;
    $('#last-name').css('border-color', 'red');
  }else{
    $('#last-name').removeAttr('style');
  }

  if ($('#email').val()===''){
    isValid = false;
    $('#email').css('border-color', 'red');
  }else{
    if (validateField("email", $('#email').val())){
      $('#email').removeAttr('style');
    }else{
      isValid = false;
      $('#email').css('border-color', 'red');
    }
  }
  $('#mobile').removeAttr('style');
  if ($('#mobile').val()==''){
      isValid = false;
      $('#mobile').css('border-color', 'red');
  }else{
     if (!validateField("mobile", $('#mobile').val())){
        isValid = false;
        $('#mobile').css('border-color', 'red');
     }
  }

  if ($('#adults').val() != ""){
    if (isNaN($('#adults').val())){
      $('#adults').css('border-color', 'red');
    }else{
      $('#adults').removeAttr('style');
    }
  }

  if ($('#children').val() != ""){
    if (isNaN($('#children').val())){
      $('#children').css('border-color', 'red');
    }else{
      $('#children').removeAttr('style');
    }
  }

  if ( isValid){
    frmContact.submit();
  }else{
    $("html, body").animate({ scrollTop: $(".page_left01").offset().top});
  }
};

function validateField(type, value) {
  if (type == "email"){
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  }else if (type == "mobile"){
    var pattern = /[0-9 -()+]+$/;
  }else if (type == "birthday"){
    var pattern = /^((0\d)|(1[012]))\/(([012]\d)|3[01])$/;
  }
  return pattern.test(value);
}
</script>
