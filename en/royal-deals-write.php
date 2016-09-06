<?php include 'pageHead.php'; ?>
<?php
date_default_timezone_set('Asia/Hong_Kong');

mb_language('uni');
mb_internal_encoding('UTF-8');


if (isset($_POST) && count($_POST) > 0){
  // config variable
  /* live */
  $db_host = "localhost";
  $db_user = "royalcarib_db1";
  $db_password = "R!o@211995";
  $db_database = "royalcarib_db1";
  $db_table = "royaldeals";
  $redirect_url = "royal-deals-thankyou.php";

  /* staging */
  /*$db_host = "localhost";
  $db_user = "royalcaribbean";
  $db_password = "bmgtest";
  $db_database = "royal_caribbean";
  $db_table = "royaldeals";
  $redirect_url = "royal-deals-thankyou.php";*/ // thank you page

  $temp_q2_array = array();
  $temp_q3_array = array();

  // EDM message starts
  $imagepath = "http://royalcaribbean.com.hk/newimages/edm/";
  $email_from_name = "Royal Caribbean Hong Kong";
  $email_from_email = "enquiry@royalcaribbean.com.hk";
  $subject = 'Get Royal Deals';

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
  $message .= '<a href="mailto:Enter%20an%20email"><img src="'.$imagepath.'but_email_now.png" title="" alt="" style="padding-top: 7px;"/></a>';
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

  //$to = strip_tags($_POST["email"]);
  //$to = $email_from_email;
  $to = "enquiry@royalcaribbean.com.hk, ivan@ophubsolutions.com";
  $headers = "From: ".$email_from_name." <".strip_tags($email_from_email).">"."\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  // EDM message ends

  $q1_array = array(
                "1" => "I've cruised with Royal Caribbean",
                "2" => "I've cruised but not with Royal Caribbean",
                "3" => "I've never cruised"
              );

  $q2_array = array("China", "Korea", "Japan", "Singapore", "Taiwan", "Vietnam", "Northern Europe", "Mediterranean", "Caribbean", "Alaska", "Others");
  $q3_array = array("Spouse / Partner", "Parents", "Children", "Friends", "Relatives");


  // connect to db
  $db_connect = mysqli_connect($db_host, $db_user, $db_password, $db_database);
  if (mysqli_connect_errno()) {
      die('Could not connect: ' . mysqli_error($db_connect));
  }

  if (isset($_POST["next-dest"]) && count($_POST["next-dest"]) > 0){
    foreach ($_POST["next-dest"] as $dest_key => $dest_value) {
      $temp_q2_array[] = $q2_array[$dest_value];
    }
  }
  if (isset($_POST["next-travel-mate"]) && count($_POST["next-travel-mate"]) > 0){
    foreach ($_POST["next-travel-mate"] as $travel_mate_key => $travel_mate_value) {
      $temp_q3_array[] = $q3_array[$travel_mate_value];
    }
  }
  $sql_query = "INSERT INTO ".$db_table." SET ";
  if (isset($_POST["first-name"]) && !empty($_POST["first-name"])){
    $sql_query .= "firstName = '".mysqli_real_escape_string($db_connect, $_POST['first-name'])."', ";
  }
  if (isset($_POST["last-name"]) && !empty($_POST["last-name"])){
    $sql_query .= "lastName = '".mysqli_real_escape_string($db_connect, $_POST['last-name'])."', ";
  }
  if (isset($_POST["title"]) && !empty($_POST["title"])){
    $sql_query .= "title = '".mysqli_real_escape_string($db_connect, $_POST['title'])."', ";
  }
  if ((isset($_POST["day"]) && !empty($_POST["day"])) && (isset($_POST["month"]) && !empty($_POST["month"]))){
    $data_birthday = $_POST['day']."/".$_POST['month'];
    $sql_query .= "birthday = '".mysqli_real_escape_string($db_connect, $data_birthday)."', ";
  }
  if (isset($_POST["mobile"]) && !empty($_POST["mobile"])){
    $sql_query .= "mobile = '".mysqli_real_escape_string($db_connect, $_POST['mobile'])."', ";
  }
  if (isset($_POST["email"]) && !empty($_POST["email"])){
    $sql_query .= "email = '".mysqli_real_escape_string($db_connect, $_POST['email'])."', ";
  }
  if (isset($_POST["history"]) && !empty($_POST["history"])){
    $sql_query .= "q1 = '".mysqli_real_escape_string($db_connect,  $q1_array[$_POST["history"]])."', ";
  }
  if (isset($_POST["next-dest"]) && count($temp_q2_array) > 0){
    $sql_query .= "q2 = '".mysqli_real_escape_string($db_connect, implode(",",$temp_q2_array))."', ";
  }
  if (isset($_POST["next-travel-mate"]) && count($temp_q3_array) > 0){
    $sql_query .= "q3 = '".mysqli_real_escape_string($db_connect, implode(",",$temp_q3_array))."', ";
  }


  // write to db
  $sql_query .= "submittedDate = '".date("Y-m-d H:i:s")."' ,";
  $sql_query = substr($sql_query, 0, -2);

  mysqli_query($db_connect, "SET character_set_client=utf8");
  mysqli_query($db_connect, "SET character_set_connection=utf8");
  mysqli_query($db_connect, $sql_query);

  // send email to user
  $sent = mail($to, $subject, $message, $headers);

  // redirect to thank you page
  if ($sent){
    header('Location: '.$redirect_url);
  }else{
    header('Location: royal-deals.php');
  }
  exit;
}else{
  // redirect to get royal deal page
  header('Location: royal-deals.php');
  exit;
}
?>