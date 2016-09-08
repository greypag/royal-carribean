<?php include 'pageHead.php'; ?>

<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) center center fixed;
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
<div style="position:relative; float:left; width:640px; left:30px;min-height:400px;">
  <h3 style="margin-left:-8px;"></h3>
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
    $subject = "Contact Us From ". $name;
    $body .= "Name:". $name ."\r\n" ;
    //$body = "First Name:". $firstName ."\r\n" ;
    //$body .= "Last Name:". $lastName ."\r\n" ;
    $body .= "Email:". $email ."\r\n" ;
    $body .= "Tel:". $tel ."\r\n" ;
    $body .= "Message:\r\n". $message ."\r\n" ;
    $headers = "From: enquiry@royalcaribbean.com.hk\r\n";
    //$headers .= 'Bcc: rwong@bmgww.com' . '\r\n';
    if ( mail($to, $subject, $body, $headers) )
       echo "Thank you! Our customer service officer will contact you shortly.";
    else
       echo "Sorry, system failure.  Please email or call us instead.";
  }
}
?>
    <br/><br/>
    Continue to browse the site, click <a href="index.php" style="text-decoration: underline !important;">here</a>.
  </p>
</div>
</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>