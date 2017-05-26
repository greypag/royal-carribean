<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;">
   <a href="index.php">首頁</a> &gt; 表格
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/enquiry/banner-enquiry-tc.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

<h3><!--處理中。--></h3>
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
   $cc = 'mng@rcclapac.com, JacksonYeung@rcclapac.com';
   $email_debug = "ivan@ophubsolutions.com";
   $cc_debug = 'scarlett@ophubsolutions.com,mng@rcclapac.com';

   $lang = 'zh';
   $err1 = "資料庫故障。請直接<a href='contact.php'><u>電郵或致電我們</u></a>。"; // Exception, usually database error
   $err2 = "系統故障。請直接<a href='contact.php'><u>電郵或致電我們</u></a>。"; // Email failure
   $err3 = "驗證錯誤。<br>請勿重覆投寄，並請返回上一步勺選\"我不是自動程式\"。<br>如無此項，請啓用 JavaScript。";
   $err_data = "資料不正確。請清除瀏覽器快取，返回上一步，確保資料正確然後重試。";
   $debug = $_SERVER['HTTP_HOST'] === 'localhost' || strpos( $_SERVER['HTTP_HOST'], '.ophubsolutions.com' );

   // Captcha checking
   if ( $debug ) {
      $db_user = 'rcidev';
      $db_name = 'rcidev_db1';
      $db_password = 'R!c@123456';
      $email_sales = $email_enquiry = $email_debug;
      $cc = $cc_debug;
   } else {
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
            if ( empty( $data['country'] ) || empty( $data['city'] ) ) return $err_data;
            $title = "預訂小冊子: $data[lastname] $data[firstname] - $data[city]";
            $thankyou = '<script>location.href="order-a-brochure-thankyou.php";</script>';
            $email = $email_enquiry;
            break;
         case 'Contact':
            if ( empty( $data['mobile'] ) ) return $err_data;
            $title = "聯絡: $data[lastname] $data[firstname] $data[mobile]";
            $thankyou = '<script>location.href="contact_complete.php";</script>';
            $email = $email_enquiry;
            break;
         case 'FastBook':
            $title = "快速預訂: $data[lastname] $data[firstname]";
            if ( isset( $data['depart_year'] ) )
               $title .= " $data[depart_month]/$data[depart_year]";
            $thankyou = '<script>location.href="enquiry-thankyou.php";</script>';
            $email = $email_sales;
            break;
         case 'RegRoyal':
            $title = "登記 皇家禮遇: $data[lastname] $data[firstname]";
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
         'lang' => '語言',
         'title' => '稱謂',
         'firstname' => '名',
         'lastname' => '姓',
         'address1' => '地址1',
         'address2' => '地址2',
         'city' => '城市',
         'country' => '國家',
         'mobile' => '手機',
         'email' => '電郵',
         'opt-in' => '獲取最新資訊',
         'data-collection' => '收集個人資料',
         'dob' => '生日',
         'depart' => '出發',
         'adult' => '成人',
         'children' => '小童',
         'planning' => '想去的地方',
         'book_exp' => '有否預訂RCI',
         'experience' => '郵輪經驗',
         'crown' => '皇冠金錨會員',
         'companion' => '預期的同行者',
         'next_cruise' => '預期何時出發',
         'long_vacation' => '能否長期旅遊',
         'activity' => '感興趣的活動',
         'remarks' => '留言',
      );

      // Send email
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "From: $email_name <$email>\r\n";
      if ( $cc )
         $headers .= "Cc: $cc\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      $message = '<!DOCTYPE html><html><body>';
      $message .= '<h3>'.htmlspecialchars( $title ).'</h3><table>';
      foreach ( $label as $field => $txt ) {
         if ( ! array_key_exists( $field, $data ) ) continue;
         $input = $data[$field];
         if ( $field === 'lang' ) $input = $input === 'en' ? '英文' : '中文';
         $message .= '<tr><th valign=top align=right>'.htmlspecialchars( $txt );
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
