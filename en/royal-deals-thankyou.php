<?php include 'pageHead.php'; ?>

<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; <a href="royal-deals.php">Get Royal Deals</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/banner/get-royal-deals-en.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>Sign up now!</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
  <br/>Thank you for subscribing Royal Caribbean WOW News.<br/><br/>
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
  if ($('#mobile').val()!=''){
     if (!validateField("mobile", $('#mobile').val())){
        isValid = false;
        $('#mobile').css('border-color', 'red');
     }
  }

  if (!$('input[name=gender]:checked').val()){
     isValid = false;
    $('#gender-wrap').css('color', 'red');
  }else{
    $('#gender-wrap').css('color', '#666666');
  }

  if ($('#birthday').val()===''){
     isValid = false;
    $('#birthday').css('border-color', 'red');
  }else{
      $('#birthday').removeAttr('style');
  }


  if ( isValid){
    frmContact.submit();
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