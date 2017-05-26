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
<script src='https://www.google.com/recaptcha/api.js?hl=zh-HK'></script>
</head>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
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
  <br>
  <!--<a href="../pdf/Fare_list_sample.pdf"><img src="../newimages/WoW_news_tc.gif" alt="" title=""/></a>-->
  <br><br>
</div>
*必須提供<br><br>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="RegRoyal">
<div class="float">
  <div class="left" style="padding-right: 4px;">
    <label>*稱謂: <br>
      <select name="title" required>
      <option value="">稱謂</option>
      <option value="mr">先生</option>
      <option value="mrs">女士</option>
      <option value="ms">小姐</option>
      </select></label>
  </div>
  <div class="left" style="padding-right: 4px;">
    <label>*姓:<br>
      <input type="text" name="lastname" class="contact" autocomplete="given-name" required autofocus></label>
  </div>
  <div class="left">
    <label>*名: <br>
      <input type="text" name="firstname" class="contact" autocomplete="family-name" required></label>
  </div>
</div>
<p>出生日期:<br>
  <select id="dob_year" name="dob_year">
    <option value="">年</option>
    <?php for($i = date('Y')-2, $j = date('Y')-120; $i >= $j; $i--) {
      echo "<option value='$i'>$i</option>";
    } ?>
  </select>
  <select id="dob_day" name="dob_day">
    <option value="">日</option>
    <?php for($i = 1; $i <= 9; $i++) {
      echo "<option value='$i'>0$i</option>";
    } ?>
    <?php for($i = 10; $i <= 31; $i++) {
      echo "<option value='$i'>$i</option>";
    } ?>
  </select>
  <select id="dob_month" name="dob_month">
    <option value="">月</option>
    <?php for($i = 1; $i <= 12; $i++) {
      echo "<option value='$i'>$monthText[$i]月</option>";
    } ?>
  </select>
</p>
<p><label>手機:<br>
  <input type="tel" name="mobile" class="contact"></label>
</p>
<p><label>*電子郵箱: <br>
  <input type="email" name="email" class="contact" required></label>
</p>
<br>
<b>您的郵輪假期喜好</b><br><br>
<span style="color: #0073bb"><b>您有沒有乘搭郵輪的經驗?</b></span><br>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="RCI" class="left"><div class="choice-item left">我已乘搭過皇家加勒比遊輪</div></label></div>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="Other" class="left"><div class="choice-item left">我已乘搭過郵輪，但不是皇家加勒比遊輪</div></label></div>
<div class="radio-wrap float"><label><input type="radio" name="experience" value="None"  class="left"><div class="choice-item left">我從沒乘搭過郵輪</div></label></div>
<br>
<span style="color: #0073bb"><b>您未來的旅遊行程會想到那一個地方?</b></span><br>
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
<br>
<span style="color: #0073bb"><b>您下次的同行旅伴是誰?</b></span><br>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Spouse"    class="left"><div class="choice-item left">配偶/伴侶</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Parents"   class="left"><div class="choice-item left">父母</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Children"  class="left"><div class="choice-item left">子女</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Friends"   class="left"><div class="choice-item left">朋友</div></label></div>
<div class="checkbox-wrap float"><label><input type="checkbox" name="companion[]" value="Relatives" class="left"><div class="choice-item left">親人</div></label></div>
<br>
<br>
<div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div>
<br>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b>收集個人資料聲明:</b><br>
    <input type="checkbox" name="PICS" class="" required> 我們重視閣下的私隱權,並竭力維護閣下個人資料得到保密。我們將收集到的個人資料,均依據香港法例&lt;個人資料(私隱)條例&gt;規定處理。
    </span>
</div>
<br>
<p> <input type="image" src="../newimages/img_but_send_tc.gif"/>
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
  //     return alert( "日期錯誤" );
  //  }
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
