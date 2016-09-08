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
<div style="width:962px; float:left; position:relative; margin-top:-35px;background: #fff url(../newimages/banner/contact.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
  <div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<h3>聯絡我們</h3>

<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<div><br>* 必須提供</div>
<form action="form_submit.php" method="post" onsubmit="check(event)">
  <input type="hidden" name="form" value="Contact">
<p><label>*姓:<br>
  <input type="text" name="lastname" class="contact" autocomplete="family-name" required autofocus></label>
</p>
<p><label>*名: <br>
  <input type="text" name="firstname" class="contact" autocomplete="given-name" required></label>
</p>
<p><label>*聯絡電話<br />
  <input type="tel" name="mobile" class="contact" required></label>
</p>
<p><label>*電郵地址<br />
  <input type="email" name="email" class="contact" required></label>
</p>
<p><label>*留言<br />
  <textarea name="remarks" cols="45" rows="5" class="contact" required></textarea></label>
</p>
<div class="g-recaptcha" data-sitekey="6LfTbykTAAAAAHFSMY8rlrpnhMPcLopcO5rROeBB"></div>
<br>
<div class="float" style="margin-top: 10px;color: #666666">
    <span id="privacytext">
    <b style="height: auto;">收集個人資料聲明:</b><br>
    我們重視閣下的私隱權,並竭力維護閣下個人資料得到保密。我們將收集到的個人資料,均依據香港法例<個人資料(私隱)條例>規定處理。
    </span>
</div>
<br>
<p> <input type="image" src="../newimages/img_but_send_tc.gif"></p>

<script>

function check( event ) {
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