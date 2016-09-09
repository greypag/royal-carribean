<?php
date_default_timezone_set('Asia/Hong_Kong');

function connect() {
   $db_host = 'localhost';
   $db_user = 'rcidirect_db1';
   $db_name = 'rcidirect_db1';
   $db_password = 'R!c@200101';

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
      <label><input type='checkbox' name='form[]' value='Contact'  checked> 聯絡我們</label><br>
      <label><input type='checkbox' name='form[]' value='FastBook' checked> 快速預訂</label><br>
      <label><input type='checkbox' name='form[]' value='RegRoyal' checked> 皇家登記</label><br>
      </p>

      <p>分隔符<br>
      <label><input type='radio' name='delimiter' value=',' checked> 逗號</label> &nbsp;
      <label><input type='radio' name='delimiter' value=';'> 分號</label> &nbsp;
      <label><input type='radio' name='delimiter' value='&#9;'> 制表符</label><br>
      Excel 的表格分隔符<a href='http://my-fish-it.blogspot.hk/2013/05/ss-office-2010-excel-csv.html'><u>因視窗設定而異</u></a>。如果資料擠在一起，請選擇其他分隔符。<br>
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
      $years = '0';
      $forms = "''";
      foreach ( $_POST['year'] as $yr ) $years .= ",".(int)$yr;
      foreach ( $_POST['form'] as $fr ) $forms .= ",'".$mysqli->escape_string( $fr )."'";
      $label = array(
         'form' => '表格',
         'from_ip' => '電腦地址',
         'submit_time' => '時間',
         'lang' => '語言',
         'title' => '稱謂',
         'firstname' => '名',
         'lastname' => '姓',
         'mobile' => '手機',
         'email' => '電郵',
         'dob_month' => '出生月',
         'dob_day' => '出生日',
         'depart_year' => '出發年',
         'depart_month' => '出發月',
         'adult' => '成人',
         'children' => '小童',
         'experience' => '郵輪經驗',
         'planning' => '想去',
         'companion' => '同行',
         'remarks' => '留言',
      );
      $delimiter = empty( $_POST['delimiter'] ) ? "\t" : $_POST['delimiter'];

      $res = $mysqli->query( "SELECT * FROM www_form_submit WHERE YEAR( submit_time ) IN ($years) AND form IN ($forms) ORDER BY submit_time DESC" );
      $f = tmpfile();
      fputcsv( $f, array_values( $label ), $delimiter );
      while ( $row = $res->fetch_assoc() ) {
         $data = array();
         foreach ( $label as $key => $title )
            $data[] = $row[$key];
         fputcsv( $f, $data, $delimiter );
      }

      header("Content-type: text/csv");
      header("Cache-Control: no-store, no-cache");
      header('Content-Disposition: attachment; filename="rci_form_data.csv"');
      fseek( $f, 0 );
      echo "\xEF\xBB\xBF"; // UTF-8 BOM
//      echo "sep=,\n"; // Tell Excel this is *comma* separated csv for God's sake - but not compatible with BOM!!!
//      echo chr(255).chr(254).mb_convert_encoding( "sep=,\n$txt", 'UTF-16LE', 'UTF-8'); // UTF-16 does not work either
      $txt = stream_get_contents( $f );
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