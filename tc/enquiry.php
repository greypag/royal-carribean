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
<script src='https://www.google.com/recaptcha/api.js?hl=zh-HK'></script>
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
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-tc.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>快速預訂</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div id="intro_wrap">
  <div id="royal-deals-intro">請填寫以下表格，我們的客戶服務主任會盡快與您聯絡。</div>
  <br>
</div>
*必須提供<br>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="FastBook">
<p><label>*姓:<br>
  <input type="text" name="lastname" class="contact" autocomplete="family-name" required autofocus></label>
</p>
<p><label>*名: <br>
  <input type="text" name="firstname" class="contact" autocomplete="given-name" required></label>
</p>
<p><label>*手機 :<br />
   <input type="tel" name="mobile" id="mobile" class="contact" required></label>
</p>
<p><label>*電子郵箱 :<br />
  <input type="email" name="email" id="email" class="contact" required></label>
</p>
<br>
<span style="color: #0073bb"><b>*您對以下哪航線有興趣？</b></span><br>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="China" class="left"><div class="choice-item left">中國</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Korea" class="left"><div class="choice-item left">韓國</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Japan" class="left"><div class="choice-item left">日本</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Singapore" class="left"><div class="choice-item left">新加坡</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Taiwan" class="left"><div class="choice-item left">台灣</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Vietnam" class="left"><div class="choice-item left">越南</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Northern Europe" class="left"><div class="choice-item left">北歐</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Mediterranean" class="left"><div class="choice-item left">地中海</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Caribbean" class="left"><div class="choice-item left">加勒比海</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Alaska" class="left"><div class="choice-item left">阿拉斯加</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="planning[]" value="Others" class="left"><div class="choice-item left">其他</div></label></div>
#可選多項
<br><br>
<div style="margin-top: 5px;"><span style="color: #0073bb"><b>您想何時出發？</b></span></div>
<select name="depart_year" id="depart_year">
  <option value="">年</option>
  <option value="<?php echo date("Y")?>"><?php echo date("Y")?></option>
  <option value="<?php echo date("Y", strtotime('+1 year'))?>"><?php echo date("Y", strtotime('+1 year'))?></option>
  <option value="<?php echo date("Y", strtotime('+2 year'))?>"><?php echo date("Y", strtotime('+2 year'))?></option>
</select>
<select name="depart_month" id="depart_month">
  <option value="">月</option>
  <?php for($i = 1; $i <= 12; $i++) { ?>
    <option value="<?php echo $i; ?>"><?php echo $monthText[$i]; ?>月</option>
  <?php } ?>
</select>
<br><br>
<span style="color: #0073bb"><b>您與多少人同行？</b></span><br />
<div class="float" style="margin-top: 5px;" id="pax">
  <div style="margin-right: 5px;margin-bottom: 5px;"><label><input type="number" name="adult" class="contact" min="0"> 大 </label></div>
  <div><label><input type="number" name="children" class="contact" min="0"> 小 (11歲或以下)</label></div>
</div>
<br>
<div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div>
<br>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b>收集個人資料聲明:</b><br>
    我們重視閣下的私隱權,並竭力維護閣下個人資料得到保密。我們將收集到的個人資料,均依據香港法例<個人資料(私隱)條例>規定處理。
    </span>
</div>
<br>
<p> <input type="image" src="../newimages/img_but_send_tc.gif"/>
<br><br><br>
</p>

<script>

function check( event ) {
   var month = ~~document.querySelector('#depart_month').value-1;
   var year = ~~document.querySelector('#depart_year').value;
   var today = new Date();
   if ( month >= 0 || year > 0 ) {
      if ( ( year === today.getYear()+1900 && month < today.getMonth() ) || month < 0 || year <= 0 ) {
         event.preventDefault();
         return alert( "日期錯誤" );
      }
   }
   if ( ! location.href.match( /:\/\/localhost\// ) && ! grecaptcha.getResponse() ) {
      event.preventDefault();
      document.querySelector('.g-recaptcha').scrollIntoView();
      return alert( '請勾選"我不是自動程式"。' );
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