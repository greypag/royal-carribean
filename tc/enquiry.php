<?php
$thispage = "enquiry";
$monthText = array(
                "1" => "一", 
                "2" => "二", 
                "3" => "三", 
                "4" => "四", 
                "5" => "五", 
                "6" => "六", 
                "7" => "七", 
                "8" => "八", 
                "9" => "九", 
                "10" => "十", 
                "11" => "十一", 
                "12" => "十二"
                );
?>
<?php include 'pageHead.php'; ?>
<script src="../js/date.js"></script>
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
<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-tc.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>快速預訂</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div id="intro_wrap">
  <div id="royal-deals-intro">請填寫以下表格，我們的客戶服務主任會盡快與您聯絡。</div>
  <br/>
</div>
*必須提供<br/>
<form action="enquiry-write.php" method="post" name="frmContact" id="frmContact">
<p>*姓名 :<br />
<label for="name"></label>
  <input type="text" name="name" id="name"  class="contact"/>
</p>
<p>*手機 :<br />
<label for="mobile"></label>
   <input type="text" name="mobile" id="mobile" class="contact"/>
</p>
<p>*電子郵箱 :<br />
  <label for="email"></label>
  <input type="text" name="email" id="email" class="contact"/>
</p>
<br/>
<span style="color: #0073bb"><b>您對以下哪航線有興趣？</b></span><br/>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="0" class="left"><div class="choice-item left">中國</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="1" class="left"><div class="choice-item left">韓國</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="2" class="left"><div class="choice-item left">日本</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="3" class="left"><div class="choice-item left">新加坡</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="4" class="left"><div class="choice-item left">台灣</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="5" class="left"><div class="choice-item left">越南</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="6" class="left"><div class="choice-item left">北歐</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="7" class="left"><div class="choice-item left">地中海 </div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="8" class="left"><div class="choice-item left">加勒比海 </div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="9" class="left"><div class="choice-item left">阿拉斯加</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="10" class="left"><div class="choice-item left">其他</div></div>
#可選多項
<br/><br/>
<div style="margin-top: 5px;"><span style="color: #0073bb"><b>您想何時出發？</b></span></div>
<select name="year" id="year">
  <option value="">年</option>
  <option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>
  <option value="<?php echo date("Y", strtotime('+1 year'))?>"><?php echo date("Y", strtotime('+1 year'))?></option>
  <option value="<?php echo date("Y", strtotime('+2 year'))?>"><?php echo date("Y", strtotime('+2 year'))?></option>
</select>
<select name="month" id="month">
  <option value="">月</option>
  <?php for($i = 1; $i <= 12; $i++) { 
    $ori = $i;
    $i = strlen($i) < 2 ? "0{$i}" : $i; ?>
    <option value="<?php echo $i; ?>"><?php echo $monthText[$ori]; ?>月</option>
  <?php } ?>
</select>
<br/><br/>
<span style="color: #0073bb"><b>您與多少人同行？</b></span><br />
<div class="float" style="margin-top: 5px;" id="pax">
  <div style="margin-right: 5px;margin-bottom: 5px;"><input type="text" name="adults" id="adults" class="contact"/> 大 </div>
  <div><input type="text" name="children" id="children" class="contact"/> 小 (11歲或以下)</div>
</div>
<br/>

<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b>收集個人資料聲明:</b><br/>
    我們重視閣下的私隱權,並竭力維護閣下個人資料得到保密。我們將收集到的個人資料,均依據香港法例<個人資料(私隱)條例>規定處理。
    </span>
</div>
<br/>
<p> <a href="javascript:;" onclick="submitForm();"><img src="../newimages/img_but_send_tc.gif"/></a>
<br/><br/><br/>
</p>
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
  $('#mobile, #year, #month').removeAttr('style');
  if ($('#name').val()===''){
     isValid = false;
    $('#name').css('border-color', 'red');
  }else{
    $('#name').removeAttr('style');
  }
  /*if ($('#first-name').val()===''){
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
  }*/

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
  
  if ($('#mobile').val()==''){
      isValid = false;
      $('#mobile').css('border-color', 'red');
  }else{
     if (!validateField("mobile", $('#mobile').val())){
        isValid = false;
        $('#mobile').css('border-color', 'red');
     }
  }
  if (($('#year').val() == "" && $('#month').val() != "") || ($('#month').val() == "" && $('#year').val() != "")){
    if ($('#year').val() ==''){
      isValid = false;
      $('#year').css('border-color', 'red');
    }
    if ($('#month').val() ==''){
      isValid = false;
      $('#month').css('border-color', 'red');
    }

  }
  if ($('#adults').val() != ""){
    if (isNaN($('#adults').val())){
      isValid = false;
      $('#adults').css('border-color', 'red');
    }else{
      $('#adults').removeAttr('style');
    }
  }

  if ($('#children').val() != ""){
    if (isNaN($('#children').val())){
      isValid = false;
      $('#children').css('border-color', 'red');
    }else{
      $('#children').removeAttr('style');
    }
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