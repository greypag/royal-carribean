<?php include 'pageHead.php'; ?>

<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

  <?php include 'tracking_tag.php'; ?>

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; margin-top:-35px;background: #fff url(../newimages/banner/contact.jpg) no-repeat;">

<div style="width: 962px;float: left;margin: 260px 0 0 0;background: 10px 168px no-repeat;">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<div style="position:relative; float:left; width:640px; left:30px;min-height:400px;">
  <h3 style="margin-left:-8px;width:640px;"></h3>
    <p>
<?php
if (isset($_POST)) {
  /*$firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];*/
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $to = "enquiry@royalcaribbean.com.hk";
  //$to = "wleung@bmgww.com";
  //$to = "ivan@ophubsolutions.com";
  if($name && $email ){
    $subject = "意見來自". $name ;
    $body = "姓名:". $name ."\r\n" ;
    //$body .= "姓氏:". $lastName ."\r\n" ;
    $body .= "電郵地址:". $email ."\r\n" ;
    $body .= "聯絡電話:". $tel ."\r\n" ;
    $body .= "留言:\r\n". $message ."\r\n" ;
    $headers = "From: enquiry@royalcaribbean.com.hk\r\n";
    //$headers .= 'Bcc: rwong@bmgww.com' . '\r\n';
    if ( mail($to, $subject, $body, $headers) )
       echo "謝謝！我們的客戶服務主任會盡快與您聯絡。";
    else
       echo "抱歉系統故障。請用電郵或致電我們。";
  }
}
?>
    <br/><br/>
    如要繼續瀏覽，請按<a href="index.php" style="text-decoration: underline !important;">這裡</a>。
  </p>
</div>
</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
