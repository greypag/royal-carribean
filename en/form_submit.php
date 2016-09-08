<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;">
   <a href="index.php">Home</a> &gt; Form
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-en.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

<h3><!--Processing--></h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<?php

function save_form ( ) {

   $db_host = 'localhost';
   $db_user = 'rcidirect_db1';
   $db_name = 'rcidirect_db1';
   $db_password = 'R!c@200101';
   $recaptcha_secret = '6LfTbykTAAAAABHu_x1gKItwbnLAMSOhexWWrYZS';
   date_default_timezone_set('Asia/Hong_Kong');

   $email_name = "Royal Caribbean Hong Kong";
   $email_sales = "sales@royalcaribbean.com.hk";
   $email_enquiry = "enquiry@royalcaribbean.com.hk";
   $cc = 'ivan@ophubsolutions.com';
   $lang = 'English';
   $err1 = "Database error. Please directly <a href='contact.php'>email or phone us</a>."; // Exception, usually database error
   $err2 = "System error. Please directly <a href='contact.php'>email or phone us</a>."; // Email failure
   $err3 = "Captcha error.<br>Please do not re-submit, and please go back to check \"I'm not a robot\".<br>If the checkbox is missing, please enable JavaScript.";
   $err_data = "Incorrect data. Please delete browser cache, go back, make sure info is correct, and try again.";

   // Captcha checking
   if ( $_SERVER['HTTP_HOST'] !== 'localhost' ) {
      if ( empty( $_POST['g-recaptcha-response'] ) )
         return $err3;
      $context = stream_context_create( array( 'http' => array(
         'method'  => 'POST',
         'header'  => 'Content-type: application/x-www-form-urlencoded',
         'content' => http_build_query( array(
            'secret' => $recaptcha_secret,
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR'],
            ) )
         ) ) );
      $result = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify', false, $context );
      $result = json_decode( $result );
      if ( ! $result || ! $result->success )
         return $err3;
   }

   try {
      mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
      $mysqli = new mysqli( $db_host, $db_user, $db_password, $db_name );
      $mysqli->set_charset( 'utf8' );

      $res = $mysqli->query( "SELECT * FROM www_form_submit LIMIT 0" );
      $fields = $res->fetch_fields();
      $res->free();

      // Form input
      $data = array('lang'=>$lang);
      $insert = "'en'";
      foreach ( $fields as $field ) {
         $key = $field->name;
         if ( empty( $_POST[ $key ] ) ) continue;
         $insert .= ',';
         switch ( $field->type ) {
            case MYSQLI_TYPE_BIT:
               $data[ $key ] = 'Yes';
               $insert .= '1';
               break;
            case MYSQLI_TYPE_TINY:
            case MYSQLI_TYPE_SHORT:
               $insert .= $data[ $key ] = (int) $_POST[ $key ];
               break;
            case MYSQLI_TYPE_VAR_STRING:
               if ( is_array( $_POST[ $key ] ) )
                  $_POST[ $key ] = implode( ",", $_POST[ $key ] );
            default:
               if ( !is_string( $_POST[ $key ] ) ) return $err_data;
               $insert .= "'".$mysqli->escape_string( $data[ $key ] = $_POST[ $key ] )."'";
               break;
         }
      }

      // Validation
      switch ( @$data['form'] ) {
         case 'Enquiry':
            $title = 'Enquiry';
            $email = $email_sales;
            break;
         case 'FastBook':
            $title = 'Book Now';
            $email = $email_sales;
            break;
         case 'RegRoyal':
            $title = 'Register Royal Deals';
            $thankyou = '<script>location.href="royal-deals-thankyou.php";</script>';
            $email = $email_enquiry;
            break;
         default:
            return $err_data;
      }
      if ( ! filter_var( @$data['email'], FILTER_VALIDATE_EMAIL ) )
         return $err_data;
      if ( ! empty( $data['id'] ) || ! empty( $data['from_ip'] ) || ! empty( $data['submit_time'] ) )
         return $err_data;
      if ( empty( $data['firstname'] ) || empty( $data['lastname'] ) )
         return $err_data;
      if ( isset( $data['dob_month'] ) || isset( $data['dob_day'] ) ) {
         if ( empty( $data['dob_month'] ) || empty( $data['dob_day'] ) )
            return $err_data;
         $dob = mktime( 0, 0, 0, $data['dob_month'], $data['dob_day'], 2016 );
         if ( $data['dob_month'] !== (int)date( 'n', $dob ) )
            return $err_data;
      }
      $title .= ": $data[firstname] $data[lastname]";

      // Fill in fixed data and insert
      $data['from_ip'] = $_SERVER['REMOTE_ADDR'];
      $insert .= ",'" . $mysqli->escape_string( $data['from_ip'] ) . "'";

      $insert = 'INSERT INTO www_form_submit (`'
              . implode( '`,`', array_map( array( $mysqli, 'escape_string' ), array_keys( $data ) ) )
              . '`) VALUES (' . $insert . ')';

      $mysqli->autocommit( false );
      $res = $mysqli->query( $insert );

      // Format email
      unset( $data['form'] );
      unset( $data['from_ip'] );
      if ( isset( $data['dob_month'] ) ) {
         $data['dob'] = date( 'M d', $dob );
         unset( $data['dob_month'] );
         unset( $data['dob_day'] );
      }
      $label = array(
         'lang' => 'Language',
         'title' => 'Title',
         'firstname' => 'Firstname',
         'lastname' => 'Lastname',
         'mobile' => 'Mobile',
         'email' => 'Email',
         'dob' => 'Birthday',
         'experience' => 'Cruised Before?',
         'planning' => 'Preference',
         'companion' => 'Companion',
      );

      // Send email
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "From: $email_name <$email>\r\n";
      if ( $cc )
         $headers .= "Cc: $cc\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      $message = '<!DOCTYPE html><html><body>';
      $message .= '<h3>'.htmlspecialchars( $title ).'</h3><table>';
      foreach ( $data as $field => $input ) {
         $message .= '<tr><th>'.htmlspecialchars( isset( $label[$field] ) ? $label[$field] : $field );
         $message .= '<td>'.htmlspecialchars( $input );
      }
      $message .= '</table></body></html>';

      if ( mail( $email, $title, $message, $headers ) ) {
         $mysqli->commit();
         echo $thankyou;
      } else {
         echo $err2;
      }

   } catch ( Exception $ex ) {
      echo $err1;
   }
}

echo save_form();

/*

DROP TABLE IF EXISTS `www_form_submit`;

CREATE TABLE `www_form_submit` (
  `id` int(10) UNSIGNED NOT NULL,
  `form` char(8) CHARACTER SET ascii NOT NULL,
  `from_ip` varchar(45) CHARACTER SET ascii NOT NULL,
  `lang` varchar(2) CHARACTER SET ascii NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` char(3) CHARACTER SET ascii DEFAULT NULL,
  `firstname` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `depart_year` smallint(4) UNSIGNED DEFAULT NULL,
  `depart_month` tinyint(2) UNSIGNED DEFAULT NULL,
  `adult` smallint(5) UNSIGNED DEFAULT NULL,
  `children` smallint(5) UNSIGNED DEFAULT NULL,
  `dob_month` tinyint(2) UNSIGNED DEFAULT NULL,
  `dob_day` tinyint(2) UNSIGNED DEFAULT NULL,
  `mobile` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` char(5) CHARACTER SET ascii NULL,
  `planning` varchar(200) CHARACTER SET ascii DEFAULT NULL,
  `companion` varchar(100) CHARACTER SET ascii DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `www_form_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submit_time` (`submit_time`);

ALTER TABLE `www_form_submit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

*/
?>
</div>

</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>