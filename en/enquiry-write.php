<?php include 'pageHead.php'; ?>
<?php
date_default_timezone_set('Asia/Hong_Kong');

mb_language('uni');
mb_internal_encoding('UTF-8');


if (isset($_POST) && count($_POST) > 0){


  $temp_q1_array = array();
  $q1_array = array("China", "Korea", "Japan", "Singapore", "Taiwan", "Vietnam", "Northern Europe", "Mediterranean", "Caribbean", "Alaska", "Others");

  if (isset($_POST["next-dest"]) && count($_POST["next-dest"]) > 0){
    foreach ($_POST["next-dest"] as $dest_key => $dest_value) {
      $temp_q1_array[] = $q1_array[$dest_value];
    }
  }


  // Email message starts
  $email_from_name = "Royal Caribbean Hong Kong";
  $email_from_email = "sales@royalcaribbean.com.hk";
  $subject = 'Book request from Royal Caribbean Hong Kong site';

  $message = 'Enquiry details: <br/><br/>';
  /*$message .= 'First name: '.$_POST["first-name"]."<br/>";
  $message .= 'Last name: '.$_POST["last-name"]."<br/>";*/
  $message .= 'Name: '.$_POST["name"]."<br/>";
  $message .= 'Mobile: '.$_POST["mobile"]."<br/>";
  $message .= 'Email: '.$_POST["email"]."<br/>";
  if (count($temp_q1_array) > 0){
    $message .= 'Preferred Sailing: '.implode(",",$temp_q1_array)."<br/>";
  }
  if ($_POST["month"] != "" && $_POST["year"] != ""){
    $message .= 'Preferred Departure Date: '.$_POST["month"]."/".$_POST["year"]."<br/>";
  }
  if ($_POST["adults"] != "" || $_POST["children"] != ""){
    $message .= 'How many pax will you travel with?<br/>';
  }
  if ($_POST["adults"] != ""){
    $message .= 'Adults: '.$_POST["adults"]."<br/>";
  }
  if ($_POST["children"] != ""){
    $message .= 'Children: '.$_POST["children"]."<br/>";
  }

  $message .= '<br/>Sent Date: '.date("Y-m-d H:i:s")."<br/>";


  $to = "sales@royalcaribbean.com.hk";
  //$to = "wleung@bmgww.com";

  $headers = "From: ".$email_from_name." <".strip_tags($email_from_email).">"."\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  // Email message ends

  // send email to sales
  $sent = mail($to, $subject, $message, $headers);

  $redirect_url = "enquiry-thankyou.php";

  // redirect to thank you page
  if ($sent){
    header('Location: '.$redirect_url);
  }else{
    header('Location: enquiry.php');
  }
  exit;
}else{
  // redirect to enquiry page
  header('Location: enquiry.php');
  exit;
}
?>