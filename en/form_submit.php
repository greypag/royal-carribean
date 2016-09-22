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
   $cc = 'mng@rcclapac.com';
   $email_debug = "ivan@ophubsolutions.com";
   $cc_debug = '';

   $lang = 'en';
   $err1 = "Database error. Please <a href='contact.php'><u>email or phone us</u></a> directly."; // Exception, usually database error
   $err2 = "System error. Please <a href='contact.php'><u>email or phone us</u></a> directly."; // Email failure
   $err3 = "Captcha error.<br>Please do not re-submit, and please go back to check \"I'm not a robot\".<br>If the checkbox is missing, please enable JavaScript.";
   $err_data = "Incorrect data. Please delete browser cache, go back, make sure info is correct, and try again.";
   $debug = $_SERVER['HTTP_HOST'] === 'localhost' || strpos( $_SERVER['HTTP_HOST'], '.ophubsolutions.com' );

   // Captcha checking
   if ( $debug ) {
      $db_user = 'rcidev';
      $db_name = 'rcidev_db1';
      $db_password = 'R!c@123456';
      $email_sales = $email_enquiry = $email_debug;
      $cc = $cc_debug;
   } else {
      $cc = '';
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
      if ( empty( $_POST['lang'] ) ) $_POST['lang'] = $lang;
      $insert = '';
      foreach ( $fields as $field ) {
         $key = $field->name;
         if ( !array_key_exists( $key, $_POST ) ) continue;
         if ( $insert )
            $insert .= ',';
         switch ( $field->type ) {
            case MYSQLI_TYPE_BIT:
               if ( $_POST[$key] ) {
                  $data[ $key ] = 'Yes';
                  $insert .= '1';
               } else {
                  $data[ $key ] = 'No';
                  $insert .= '0';
               }
               break;
            case MYSQLI_TYPE_TINY:
            case MYSQLI_TYPE_SHORT:
               $insert .= $data[ $key ] = abs( (int) $_POST[ $key ] );
               break;
            case MYSQLI_TYPE_VAR_STRING:
               if ( is_array( $_POST[ $key ] ) )
                  $_POST[ $key ] = implode( ",", array_map( 'trim', $_POST[ $key ] ) );
            default:
               if ( !is_string( $_POST[ $key ] ) ) return $err_data;
               $txt = $data[ $key ] = trim( $_POST[ $key ] );
               $insert .= "'".$mysqli->escape_string( $txt )."'";
               break;
         }
      }

      // Validation
      if ( ! filter_var( @$data['email'], FILTER_VALIDATE_EMAIL ) )
         return $err_data;
      if ( ! empty( $data['id'] ) || ! empty( $data['from_ip'] ) || ! empty( $data['submit_time'] ) )
         return $err_data;
      if ( empty( $data['firstname'] ) || empty( $data['lastname'] ) )
         return $err_data;
      if ( isset( $data['dob_year'] ) || isset( $data['dob_month'] ) || isset( $data['dob_day'] ) ) {
         if ( empty( $data['dob_year'] ) || empty( $data['dob_month'] ) || empty( $data['dob_day'] ) )
            return $err_data;
         $dob = mktime( 0, 0, 0, $data['dob_month'], $data['dob_day'], $data['dob_year'] );
         if ( $data['dob_month'] !== (int)date( 'n', $dob ) )
            return $err_data;
      }
      if ( isset( $data['depart_year'] ) || isset( $data['depart_month'] ) ) {
         if ( empty( $data['depart_year'] ) || empty( $data['depart_month'] ) )
            return $err_data;
         $depart = mktime( 0, 0, 0, $data['depart_month'], 1, $data['depart_year'] );
      }
      switch ( @$data['form'] ) {
         case 'Brochure':
            if ( empty( $data['country'] ) ) return $err_data;
            $title = "Brochure Request: $data[lastname] $data[firstname] $data[country]";
            $thankyou = '<script>location.href="international-sailing-itinerary-thankyou.php";</script>';
            $email = $email_enquiry;
            break;
         case 'Contact':
            if ( empty( $data['mobile'] ) ) return $err_data;
            $title = "Contact: $data[lastname] $data[firstname]";
            $thankyou = '<script>location.href="contact_complete.php";</script>';
            $email = $email_enquiry;
            break;
         case 'FastBook':
            $title = "Reservation: $data[firstname] $data[lastname]";
            if ( isset( $data['depart_year'] ) )
               $title .= " $data[depart_month]/$data[depart_year]";
            $thankyou = '<script>location.href="enquiry-thankyou.php";</script>';
            $email = $email_sales;
            break;
         case 'RegRoyal':
            $title = "Register Royal Deals: $data[firstname] $data[lastname]";
            $thankyou = '<script>location.href="royal-deals-thankyou.php";</script>';
            $email = $email_enquiry;
            break;
         default:
            return $err_data;
      }

      // Fill in fixed data and insert
      $data['from_ip'] = $_SERVER['REMOTE_ADDR'];
      $insert .= ",'" . $mysqli->escape_string( $data['from_ip'] ) . "'";

      $insert = 'INSERT INTO www_form_submit (`'
              . implode( '`,`', array_map( array( $mysqli, 'escape_string' ), array_keys( $data ) ) )
              . '`) VALUES (' . $insert . ')';

//      echo $insert;
      $mysqli->autocommit( false );
      $res = $mysqli->query( $insert );

      // Format email
      unset( $data['form'] );
      unset( $data['from_ip'] );
      if ( isset( $data['dob_year'] ) ) {
         $data['dob'] = date( 'Y M d', $dob );
         unset( $data['dob_year'] );
         unset( $data['dob_month'] );
         unset( $data['dob_day'] );
      }
      if ( isset( $data['depart_year'] ) ) {
         $data['depart'] = date( 'Y M', $depart );
         unset( $data['depart_month'] );
         unset( $data['depart_year'] );
      }
      $label = array(
         'lang' => 'Language',
         'title' => 'Title',
         'firstname' => 'Firstname',
         'lastname' => 'Lastname',
         'address1' => 'Address1',
         'address2' => 'Adderss2',
         'city' => 'City',
         'country' => 'Country',
         'mobile' => 'Mobile',
         'email' => 'Email',
         'opt-in' => 'Want News',
         'dob' => 'Birthday',
         'depart' => 'Birthday',
         'adult' => 'Adult',
         'children' => 'Children',
         'planning' => 'Preference',
         'book_exp' => 'Booking Experience',
         'experience' => 'Cruised Experience',
         'crown' => 'Crown Anchor',
         'companion' => 'Companion',
         'next_cruise' => 'Next Plan',
         'long_vacation' => 'Long Vacation',
         'activity' => 'Activity',
         'remarks' => 'Message',
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
         if ( $field === 'lang' ) $input = $field === 'en' ? 'English' : 'Chinese';
         $message .= '<tr><th valign=top>'.htmlspecialchars( isset( $label[$field] ) ? $label[$field] : $field );
         $message .= '<td>'.str_replace( "\n", '<br>', htmlspecialchars( $input ) );
      }
      $message .= '</table></body></html>';

      if ( mail( $email, $title, $message, $headers ) ) {
         $mysqli->commit();
         return $thankyou;
      } else {
         return $err2;
      }

   } catch ( Exception $ex ) {
      if ( $debug )
         echo $mysqli->error;
      return $err1;
   }
}

echo save_form();

/*

DROP TABLE IF EXISTS `www_form_submit`;

CREATE TABLE `www_form_submit` (
  `id` int(10) UNSIGNED NOT NULL,
  `form` char(8) CHARACTER SET ascii NOT NULL,
  `from_ip` varchar(45) CHARACTER SET ascii NOT NULL,
  `lang` char(2) CHARACTER SET ascii NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` char(3) CHARACTER SET ascii DEFAULT NULL,
  `firstname` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `depart_year` smallint(4) UNSIGNED DEFAULT NULL,
  `depart_month` tinyint(2) UNSIGNED DEFAULT NULL,
  `adult` smallint(5) UNSIGNED DEFAULT NULL,
  `children` smallint(5) UNSIGNED DEFAULT NULL,
  `dob_year` smallint(4) UNSIGNED DEFAULT NULL,
  `dob_month` tinyint(2) UNSIGNED DEFAULT NULL,
  `dob_day` tinyint(2) UNSIGNED DEFAULT NULL,
  `mobile` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` char(5) CHARACTER SET ascii DEFAULT NULL,
  `planning` varchar(300) CHARACTER SET ascii DEFAULT NULL,
  `companion` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `next_cruise` varchar(12) CHARACTER SET ascii DEFAULT NULL,
  `book_exp` bit(1) DEFAULT NULL,
  `crown` bit(1) DEFAULT NULL,
  `long_vacation` bit(1) DEFAULT NULL,
  `opt-in` bit(1) DEFAULT NULL,
  `remarks` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
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