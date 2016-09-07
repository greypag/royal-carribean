<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

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
   $cc = 'ivan@ophubsolutions.com';
   $lang = '中文';
   $err1 = "資料庫故障。請直接<a href='contact.php'>電郵或致電我們</a>。"; // Exception, usually database error
   $err2 = "系統故障。請直接電郵或致電我們。"; // Email failure
   $err3 = "驗證錯誤。<br>請勿重覆投寄，並請返回上一步勺選\"我不是自動程式\"。<br>如無此項，請啓用 JavaScript。";
   $nodata = "資料不正確。請清除瀏覽器快取，然後返回上一步重試。";

   // Captcha checking
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

   try {
      mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
      $mysqli = new mysqli( $db_host, $db_user, $db_password, $db_name );
      $mysqli->set_charset( 'utf8' );

      $res = $mysqli->query( "SELECT * FROM www_form_submit LIMIT 0" );
      $fields = $res->fetch_fields();
      $res->free();

      // Form input
      $data = array();
      $insert = '';
      foreach ( $fields as $field ) {
         $key = $field->name;
         if ( empty( $_POST[ $key ] ) ) continue;
         if ( $insert ) $insert .= ',';
         switch ( $field->type ) {
            case MYSQLI_TYPE_BIT:
               $data[ $key ] = 'Yes';
               $insert .= '1';
               break;
            case MYSQLI_TYPE_TINY:
            case MYSQLI_TYPE_SHORT:
               $insert .= $data[ $key ] = (int) $_POST[ $key ];
               break;
            default:
               $insert .= "'".$mysqli->escape_string( $data[ $key ] = $_POST[ $key ] )."'";
               break;
         }
      }

      // Validation
      switch ( @$data['form'] ) {
         case 'Enquiry':
            $title = '查詢';
            $email = $email_sales;
            break;
         case 'FastBook':
            $title = '快速預訂';
            $email = $email_sales;
            break;
         case 'RegRoyal':
            $title = '登記 皇家禮遇';
            $thankyou = '<script>location.href="royal-deals-thankyou.php";</script>';
            $email = $email_enquiry;
            break;
         default:
            return $nodata;
      }
      if ( ! filter_var( @$data['email'], FILTER_VALIDATE_EMAIL ) )
         return $nodata;
      if ( ! empty( $data['id'] ) || ! empty( $data['from_ip'] ) || ! empty( $data['submit_time'] ) )
         return $nodata;
      if ( empty( $data['fullname'] ) && ( empty( $data['firstname'] ) || empty( $data['lastname'] ) ) )
         return $nodata;
      if ( isset( $data['dob_month'] ) || isset( $data['dob_day'] ) ) {
         if ( empty( $data['dob_month'] ) || empty( $data['dob_day'] ) )
            return $nodata;
         $dob = mktime( 0, 0, 0, $data['dob_month'], $data['dob_day'], 2016 );
         if ( $data['dob_month'] !== (int)date( 'n', $dob ) )
            return $nodata;
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
         'title' => '稱謂',
         'firstname' => '名',
         'lastname' => '姓',
         'mobile' => '手機',
         'email' => '電郵',
         'dob' => '生日',
         'experience' => '郵輪經驗',
      );

      // Send email
     $headers = "MIME-Version: 1.0\r\n";
     $headers .= "From: $email_name <$email>\r\n";
     if ( $cc )
        $headers .= "Cc: $cc\r\n";
     $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

     $message = '<!DOCTYPE html><html><body>';
     $message .= '<h1>'.htmlspecialchars( $title ).'</h1><table>';
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

?>
</div>

</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>