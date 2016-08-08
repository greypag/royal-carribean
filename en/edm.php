<?php
$imagepath = "http://royalcaribbean-hongkong.com/_staging0/newimages/edm/";
$email_from_name = "Royal Caribbean Hong Kong";
$email_from_email = "enquiry@royalcaribbean.com.hk";

  $message = '<html>';
  $message .= '<body>';
  $message .= '<table style="width: 700px;margin: 0 auto;font-family: arial;" cellpadding="0" cellspacing="0">';
  //$message .= '<tr>';
  //$message .= '<td colspan="3" style="font-size: 12px;padding-left: 14px;"><a href="http://www.royalcaribbean-hongkong.com" style="color: #0b64be;">Browser View</a> | <a href="http://www.royalcaribbean-hongkong.com" style="color: #0b64be;">Mobile View</a></td>';
  //$message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td colspan="3" height="755px" style="background: url('.$imagepath.'RCI_Welcome_EM_HongKong_full.jpg); text-align: center;font-size: 16px;color: #1d1d41;vertical-align: middle;">';
  $message .= '<br/><br/><br/><br/>';
  $message .= 'A place where a new hour means a new adventure.<br/>';
  $message .= 'Where butterfiles turn into daredevils.<br/>';
  $message .= 'And the horizon never ends.<br/><br/>';
  $message .= '<strong>EXPECT MORE WOW:</strong><br/>';
  $message .= '<a href="http://www.royalcaribbean-hongkong.com/en/food.php" style="text-decoration: underline;color: #1d1d41;">Dining</a>&nbsp;&#8226;&nbsp;<a href="http://www.royalcaribbean-hongkong.com/en/entertainment.php" style="text-decoration: underline;color: #1d1d41;">Entertainment</a>&nbsp;&#8226;&nbsp;<a href="http://www.royalcaribbean-hongkong.com/en/sports.php" style="text-decoration: underline;color: #1d1d41;">Activities</a><br/><br/>';
  $message .= '<a href="http://www.royalcaribbean-hongkong.com"><img src="'.$imagepath.'but_start_planning_now.png" title="" alt=""/></a>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td colspan="3" style="background: #0044A7; height: 45px;text-align: center;font-size: 16px;color: #1d1d41;vertical-align: middle;color: #FFFFFF;border-bottom: 3px solid #ffffff;">';
  $message .= 'It\'s time to elevate the idea of cruising.&nbsp;&nbsp;<a href="http://www.royalcaribbean-hongkong.com"><img src="'.$imagepath.'but_start_now.png" title="" alt="" style="vertical-align:middle"/></a>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td style="background: url('.$imagepath.'line.gif) no-repeat #080D45 center right;color: #ffffff;text-align: center;vertical-align: middle;height: 97px;font-size: 14px;text-transform: uppercase;width: 239px;">';
  $message .= 'Call us<br/>';
  $message .= '(852) 3189-3200<br/>';
  $message .= '<a href="http://www.royalcaribbean-hongkong.com"><img src="'.$imagepath.'but_start_planning_now2.png" title="" alt="" style="padding-top: 7px;"/></a>';
  $message .= '</td>';
  $message .= '<td style="background: url('.$imagepath.'line.gif) no-repeat #080D45 center right;color: #ffffff;text-align: center;vertical-align: middle;height: 97px;font-size: 14px;text-transform: uppercase;width: 225px;">';
  $message .= 'Enquire now<br/>';
  $message .= '<span style="text-decoration: underline;font-size: 11px;">What would you like to know?</span><br/>';
  $message .= '<a href="http://www.royalcaribbean-hongkong.com/en/royal-deals.php"><img src="'.$imagepath.'but_enquire_now.png" title="" alt="" style="padding-top: 7px;"/></a>';
  $message .= '</td>';
  $message .= '<td style="background: #080D45;color: #ffffff;text-align: center;vertical-align: middle;height: 97px;font-size: 14px;text-transform: uppercase;">';
  $message .= 'Forward<br/>';
  $message .= 'To a friend<br/>';
  $message .= '<a href="mailto:"><img src="'.$imagepath.'but_email_now.png" title="" alt="" style="padding-top: 7px;"/></a>';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '<tr>';
  $message .= '<td colspan="3" style="font-size: 10px;color: #1d1d41;padding-top: 18px;font-family: verdana;">';
  $message .= '&copy;2014 Royal Caribbean Cruises Hong Kong Limited<br/>';
  $message .= 'Suite 2001, 20/F, Tower 1, The Gateway,<br/>';
  $message .= 'Harbour City, Tsim Sha Tsui<br/>Hong Kong';
  $message .= '</td>';
  $message .= '</tr>';
  $message .= '</table>';
  $message .= '</body>';
  $message .= '</html>';

//$to = 'joice_sarah@hotmail.com';

$subject = 'EDM testing';

$headers = "From: ".$email_from_name." <".strip_tags($email_from_email).">"."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

echo $message;
//$sent = mail($to, $subject, $message, $headers);
//$sent = mail($to, $subject, "testing");

if ($sent){
	echo "sent";
}
?>
