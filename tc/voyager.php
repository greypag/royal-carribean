<?php include 'pageHead.php'; ?>
<script>
$(document).ready(function() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('#ship_img').attr('target', '_self').attr('rel', '');
        $('#ship_img').attr('href', 'voyager-image.php');
    }
});
</script>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇家遊輪船隊 &gt; <a href="voyager.php">海洋航行者號</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/voyager.jpg) no-repeat;">

<div style="width: 962px;float: left;margin: 250px 0 0 0;background: 10px 168px no-repeat;">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

<ul class="wider">
<li class="wider"><a href="onboard-experience.php">船上特色</a></li>
<li class=""><a href="videos.php">影片廊</a></li>
<li class="wider"><a href="deck-plan-2.php">甲板圖</a></li>
<li class="page_hover_wider">郵輪規格</li>
<li class="wider" style="display:none;"><a href="virtual-tour.php">360&deg;展示</a></li>
</ul>

<div style="position:relative; float:left; width:640px; left:30px;min-height:550px;">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">註冊地</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">巴哈馬• 建於芬蘭圖爾庫 <br />
      Kvaerner Masa-Yards 造船廠</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">首航時間</td>
    <td width="75%" align="left" valign="top">1999年11月21日</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">翻新日期</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">2014年11月</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">全新項目</td>
    <td width="75%" align="left" valign="top">甲板衝浪、星空影院、Izumi 日式餐廳、Giovanni's Table 意大利餐廳、Chops Grille</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">教母</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">Katarina Witt</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">噸位</td>
    <td width="75%" align="left" valign="top">13.8萬噸</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">最大載客量</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">3,840人</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">船長</td>
    <td width="75%" align="left" valign="top">310米</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">船寬</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">48米</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">甲板樓層</td>
    <td width="75%" align="left" valign="top">15層</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">平均航速</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">22海里</td>
  </tr>

  <tr>
    <td colspan="2">
      <a href="../newimages/voyager-of-the-seas/ship_image_bigger.jpg" class="icon-bar" id="ship_img" rel="shadowbox;height=400;width=720;bgcolor=#FFF;">
        <img src="../newimages/voyager-of-the-seas/ship_image_small.jpg" alt="" title=""/>
      </a>
    </td>
  </tr>
<?php
/*
  <tr>
    <td width="25%" align="left" valign="top">首航時間</td>
    <td width="75%" align="left" valign="top">1999年11月</td>
  </tr>
*/
  ?>
</table>


</div>


</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
