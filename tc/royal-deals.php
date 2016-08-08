<?php
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
form select {
  height: 36px;
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

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; <a href="royal-deals.php">立即登記</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/banner/get-royal-deals-tc.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>立即登記</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div id="intro_wrap">
<div id="royal-deals-intro">立即登記皇家加勒比遊輪至WOW訊息，以獲取最新優惠及郵輪訊息。</div>
  <ul>
    <li>最後召集郵輪優惠</li>
    <li>第一手限時優惠通知</li>
    <li>取得至WOW新訊息: 最新目的地, 新船及航线等等</li>
  </ul>
  <br/>
  <!--<a href="../pdf/Fare_list_sample.pdf"><img src="../newimages/WoW_news_tc.gif" alt="" title=""/></a>-->
  <br/><br/>
</div>
*必須提供<br/><br/>
<form action="royal-deals-write.php" method="post" name="frmContact" id="frmContact">
<div class="float">
  <div class="left" style="padding-right: 4px;">
    *稱謂: <br />
    <select name="title" id="title">
    <option value="">稱謂</option>
    <option value="mr">先生</option>
    <option value="mrs">女士</option>
    <option value="ms">小姐</option>
    </select>
  </div>
  <div class="left" style="padding-right: 4px;">
    *姓:<br />
    <label for="last-name"></label>
      <input type="text" name="last-name" id="last-name" class="contact"/>
  </div>
  <div class="left">
    *名: <br />
    <label for="first-name"></label>
      <input type="text" name="first-name" id="first-name"  class="contact"/>
  </div>
</div>
<p>*出生日期:<br />
<label for="birthday"></label>
   <select name="day" id="day">
    <option value="">日</option>
    <?php for($i = 1; $i <= 31; $i++) {?>
      <option value="<?php echo date('d', mktime(0, 0, 0, 0, $i)); ?>"><?php echo date('d', mktime(0, 0, 0, 0, $i)); ?></option>
    <?php } ?>
  </select>
  <select name="month" id="month">
    <option value="">月</option>
    <?php for($i = 1; $i <= 12; $i++) { 
      $ori = $i;
      $i = strlen($i) < 2 ? "0{$i}" : $i; ?>
      <option value="<?php echo $i; ?>"><?php echo $monthText[$ori]; ?>月</option>
    <?php } ?>
  </select>
</p>
<p>手機:<br />
<label for="mobile"></label>
   <input type="text" name="mobile" id="mobile" class="contact"/>
</p>
<p>*電子郵箱: <br />
  <label for="email"></label>
  <input type="text" name="email" id="email" class="contact"/>
</p>
<br/>
<b>您的郵輪假期喜好</b><br/><br/>
<span style="color: #0073bb"><b>您有沒有乘搭郵輪的經驗?</b></span><br/>
<div class="radio-wrap float"><input type="radio" name="history" value="1" class="left"><div class="choice-item left">我已乘搭過皇家加勒比遊輪</div></div>
<div class="radio-wrap float"><input type="radio" name="history" value="2" class="left"><div class="choice-item left">我已乘搭過郵輪，但不是皇家加勒比遊輪</div></div>
<div class="radio-wrap float"><input type="radio" name="history" value="3" class="left"><div class="choice-item left">我從沒乘搭過郵輪</div></div>
<br/>
<span style="color: #0073bb"><b>您未來的旅遊行程會想到那一個地方?</b></span><br/>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="0" class="left"><div class="choice-item left">中國</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="1" class="left"><div class="choice-item left">韓國</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="2" class="left"><div class="choice-item left">日本</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="3" class="left"><div class="choice-item left">新加坡</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="4" class="left"><div class="choice-item left">台灣</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="5" class="left"><div class="choice-item left">越南</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="6" class="left"><div class="choice-item left">北歐</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="7" class="left"><div class="choice-item left">地中海</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="8" class="left"><div class="choice-item left">加勒比海</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="9" class="left"><div class="choice-item left">阿拉斯加</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-dest[]" value="10" class="left"><div class="choice-item left">其他</div></div>
<br/>
<span style="color: #0073bb"><b>您下次的同行旅伴是誰?</b></span><br/>
<div class="checkbox-wrap float"><input type="checkbox" name="next-travel-mate[]" value="0" class="left"><div class="choice-item left">配偶/伴侶</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-travel-mate[]" value="1" class="left"><div class="choice-item left">父母</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-travel-mate[]" value="2" class="left"><div class="choice-item left">子女</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-travel-mate[]" value="3" class="left"><div class="choice-item left">朋友</div></div>
<div class="checkbox-wrap float"><input type="checkbox" name="next-travel-mate[]" value="4" class="left"><div class="choice-item left">親人</div></div>
<br/>
<br/>
<span style="color: #0073bb"><b>驗證碼 :</b></span><br/>
<div style="overflow: hidden;margin-top: 5px;">
  <input type="text" name="key" id="key" class="contact"/>
  <div id="captcha" style="float: left; margin-left: 10px;">
    <div id="captcha_gen">
      <label align="center" id="randomfield"></label>
    </div>
    <!--
    <a onClick="getCaptcha();" style="cursor: pointer;">Refresh</a>-->
  </div>
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
  if ($('#title').val()===''){
    isValid = false;
    $('#title').css('border', '2px inset red');
  }else{
    $('#title').removeAttr('style');
  }
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
/*
  if (!$('input[name=gender]:checked').val()){
     isValid = false;
    $('#gender-wrap').css('color', 'red');
  }else{
    $('#gender-wrap').css('color', '#666666');
  }
*/
  $('#day, #month').css('border', '1px solid #aaa');
  if ($('#day').val() == "" || $('#month').val() == ""){
    isValid = false;
    if ($('#day').val() == ""){
      $('#day').css('border', '2px inset red');
    }
    if ($('#month').val() == ""){
      $('#month').css('border', '2px inset red');
    }
  }else{
     $('#day, #month').css('border', '2px inset red');
  }

  if ($('#key').val()===''){
     isValid = false;
    $('#key').css('border-color', 'red');
  }else{
    if (captchastring === $('#key').val()){
      $('#key').removeAttr('style');
    }else{
      isValid = false;
      $('#key').css('border-color', 'red');
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