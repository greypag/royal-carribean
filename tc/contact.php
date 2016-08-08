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
<h3>聯絡我們</h3>

<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div><br/>* 必須提供</div>
<form action="contact_complete.php" method="post" name="frmContact" id="frmContact" enctype="multipart/form-data">

<p>*姓名<br />
<label for="name"></label>
  <input type="text" name="name" id="name"  class="contact"/>
</p>
<p>*聯絡電話<br />
<label for="tel"></label>
  <input type="text" name="tel" id="tel" class="contact"/></p>
<p>*電郵地址<br />
<label for="email"></label>
  <input type="text" name="email" id="email" class="contact"/></p>
<p>*留言<br />
  <label for="message"></label>
  <textarea name="message" id="message" cols="45" rows="5" class="contact"></textarea>
</p>
<p> 
<br/>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b style="height: auto;">收集個人資料聲明:</b><br/>
    我們重視閣下的私隱權,並竭力維護閣下個人資料得到保密。我們將收集到的個人資料,均依據香港法例<個人資料(私隱)條例>規定處理。
    </span>
</div>
<br/>
<a href="javascript:;" onclick="submitForm();"><img src="../newimages/img_but_send_tc.gif"/></a> <a href="javascript:;" onclick="frmContact.reset();"><img src="../newimages/img_but_clear_tc.gif"/></a></p>
</form>

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
  
  if ($('#name').val()===''){
    isValid = false;
    $('#name').css('border-color', 'red');
  }else{
    $('#name').removeAttr('style');
  }


  if ($('#tel').val()===''){
    isValid = false;
    $('#tel').css('border-color', 'red');
  }else{
    if (validateField("mobile", $('#tel').val())){
      $('#tel').removeAttr('style');
    }else{
      isValid = false;
      $('#tel').css('border-color', 'red');
    }
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

  if ($('#message').val()===''){
     isValid = false;
    $('#message').css('border','2px inset red');
  }else{
    $('#message').removeAttr('style');
  }
/*
  if($("#privacy").is(':checked')){
    $("#privacytext").css("color", "#000");
  }else{
    isValid = false;
    $("#privacytext").css("color", "red");
  }
*/

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
