<?php
date_default_timezone_set('Asia/Hong_Kong');

function connect() {
   $debug = strpos( $_SERVER['HTTP_HOST'], '.ophubsolutions.com' );
   $db_host = 'localhost';
   if ( ! $debug ) {
      $db_user = 'rcidirect_db1';
      $db_name = 'rcidirect_db1';
      $db_password = 'R!c@200101';
   } else {
      $db_user = 'rcidev';
      $db_name = 'rcidev_db1';
      $db_password = 'R!c@123456';
   }

   mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
   $mysqli = new mysqli( $db_host, $db_user, $db_password, $db_name );
   $mysqli->set_charset( 'utf8' );
   return $mysqli;
}

function check_login ( ) {
   if ( ! empty( $_SESSION['form_download_login'] ) ) return true;
   if ( @$_POST['user'] !== 'administrator' || @$_POST['pass'] !== 'RCI#691588' ) return false;
   $_SESSION['form_download_login'] = true;
}

session_start();
check_login();
session_write_close();

if ( ! empty( $_POST['year'] ) && ! empty( $_POST['form'] ) ) {
   export();
   die;
}

include 'pageHead.php';
?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style="height:92px; width:962px; margin:auto; position:relative">
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;">
   <a href="index.php">首頁</a> &gt; 數據後台
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width:962px; float:left; position:relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

<h3>數據後台</h3>
<div style="position:relative; float:left; width:640px; left:30px;min-height:600px;">
<?php

function show_login () { ?>
   <form method="POST">
      <p><label>用戶 <br>
        <input type="text" name="user" class="contact" autocomplete="username" required autofocus></label>
      </p>
      <p><label>密碼 <br>
        <input type="password" name="pass" class="contact" required></label>
      </p>
      <p> <input type="submit" value="登入"> </p>
   </form>
<?php }

function show_form () {
   try {
      $mysqli = connect();
?>
      <form method="POST">
      <p>年分<br>
<?php
      $res = $mysqli->query( "SELECT DISTINCT YEAR( submit_time ) FROM www_form_submit ORDER BY YEAR( submit_time ) DESC" );
      while ($row = $res->fetch_row()) {
         $checked = $row[0] === date("Y") ? 'checked' : '';
         echo "<label><input type='checkbox' name='year[]' value='$row[0]' $checked> $row[0]</label><br>";
      }
      $res->free();
?>
      <p>表格<br>
      <label><input type='radio' name='form' value='Contact'  required> 聯絡我們</label><br>
      <label><input type='radio' name='form' value='FastBook' > 快速預訂</label><br>
      <label><input type='radio' name='form' value='RegRoyal' > 皇家登記</label><br>
      <label><input type='radio' name='form' value='Brochure' > 預訂小冊子</label><br>
      </p>

      <p>分隔符<br>
      <label><input type='radio' name='delimiter' value=',' checked> 逗號</label> &nbsp;
      <label><input type='radio' name='delimiter' value=';'> 分號</label> &nbsp;
      <label><input type='radio' name='delimiter' value='&#9;'> 制表符</label><br>
      Excel 的表格分隔符<a href='http://my-fish-it.blogspot.hk/2013/05/ss-office-2010-excel-csv.html'><u>因視窗設定而異</u></a>。如果資料擠在一起，請試用其他分隔符。<br>
      非 Excel 用途（例如 Google Docs）請使用逗號。
      </p>

      <script>( function() {
         var inputs = [].slice.call( document.querySelectorAll( 'input[name=delimiter]' ) );
         inputs.forEach( function( input ) {
            input.addEventListener( 'click', function() {
               localStorage.setItem( 'Excel_Delimiter', input.value );
            });
            if ( input.value === localStorage.getItem( 'Excel_Delimiter' ) )
               input.checked = true;
         } );
      })()</script>

      <p> <input type="submit" value="提取"> </p>
<?php
   } catch ( Exception $ex ) {
      echo "資料庫故障。";
   }
}

function export () {
   if ( !check_login() ) die();
   try {
      $mysqli = connect();
      $form = "'".$mysqli->escape_string( $_POST['form'] )."'";
      $years = '0';
      foreach ( $_POST['year'] as $yr ) $years .= ",".(int)$yr;
      $delimiter = empty( $_POST['delimiter'] ) ? "\t" : $_POST['delimiter'];
      $label = array(
         'form' => '表格',
         'from_ip' => '電腦地址',
         'date' => '日期',
         'time' => '時間',
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
         'opt-in' => '最新資訊',
         'adult' => '成人',
         'children' => '小童',
         'planning' => '想去',
         'book_exp' => '預訂經驗',
         'experience' => '郵輪經驗',
         'crown' => '皇冠',
         'companion' => '同行',
         'next_cruise' => '下次預期',
         'long_vacation' => '長旅行',
         'activity' => '活動',
         'remarks' => '留言',
         'dob_year' => '出生年',
         'dob_month' => '出生月',
         'dob_day' => '出生日',
         'depart_year' => '出發年',
         'depart_month' => '出發月',
      );
      switch ( $form ) {
         case "'Contact'":
            $fields = array( 'from_ip', 'date', 'time', 'lang', 'firstname', 'lastname', 'mobile', 'email', 'remarks' );
            break;
         case "'FastBook'":
            $fields = array( 'from_ip', 'date', 'time', 'lang', 'firstname', 'lastname', 'mobile', 'email', 'planning', 'depart_year', 'depart_month', 'adult', 'children' );
            break;
         case "'RegRoyal'":
            $fields = array( 'from_ip', 'date', 'time', 'lang', 'title', 'firstname', 'lastname', 'mobile', 'email', 'dob_year', 'dob_month', 'dob_day', 'experience', 'planning', 'companion' );
            break;
         case "'Brochure'":
            $fields = array( 'from_ip', 'date', 'time', 'lang', 'firstname', 'lastname', 'address1', 'address2', 'country', 'city', 'mobile', 'email', 'opt-in', 'planning', 'book_exp', 'experience', 'crown', 'next_cruise', 'long_vacation', 'activity' );
            break;
         default:
            $fields = array_keys( $label );
      }

      $res = $mysqli->query( "SELECT *, DATE( submit_time ) AS date, TIME( submit_time ) AS time FROM www_form_submit WHERE YEAR( submit_time ) IN ($years) AND form = $form ORDER BY submit_time DESC" );
      $f = tmpfile();
      $headers = array();
      foreach ( $fields as $field ) $headers[] = $label[$field];
      fputcsv( $f, $headers, $delimiter );
      $meta = array();
      foreach ( $res->fetch_fields() as $def )
         $meta[ $def->name ] = $def;

      while ( $row = $res->fetch_assoc() ) {
         $data = array();
         foreach ( $fields as $key ) {
            if ( $key === 'lang' )
               $val = $row[$key] === 'en' ? '英文' : '中文';
            else if ( $key === 'mobile' )
               $val .= "\t"; // Prevent phone from parsed as integer by Excel
            else if ( isset( $meta[ $key ] ) && $meta[$key]->type === MYSQLI_TYPE_BIT )
               $val = $row[$key] === null ? '' : ( $row[$key] ? 'Yes' : 'No' );
            else
               $val = $row[$key] === null ? '' : $row[$key];
            $data[] = strtr( $val, "\r\n", "  " );
         }
         fputcsv( $f, $data, $delimiter );
      }

      header("Content-type: text/csv");
      header("Cache-Control: no-store, no-cache");
      header('Content-Disposition: attachment; filename="rci_'.substr( $form, 1, -1 ).'.csv"');
      fseek( $f, 0 );
      echo "\xEF\xBB\xBF"; // UTF-8 BOM
//      echo "sep=,\n"; // Tell Excel this is *comma* separated csv for God's sake - but not compatible with BOM!!!
//      echo chr(255).chr(254).mb_convert_encoding( "sep=,\n$txt", 'UTF-16LE', 'UTF-8'); // UTF-16 does not work either
      $txt = stream_get_contents( $f );
      fclose( $f );

      $txt = str_replace( "\\'", "'", $txt );
      $txt = str_replace( "\\\"", '""', $txt );
      echo $txt;

   } catch ( Exception $ex ) {
      echo "資料庫故障。";
   }
}

if ( ! check_login() )
   show_login();
else
   show_form();

?>
</div>

</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>