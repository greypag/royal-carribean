<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style='background: url(../newimages/bodyBG.jpg) center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;'><!--class="fleet" -->
<?php include 'tracking_tag.php'; ?>
<form method="post" action="voyager.php" id="form1">

  <!--头部框架<script language="javascript" type="text/javascript">RCCLHeader('bg/4.jpg')</script>-->


  <div style='height:92px; width:962px; margin:auto; position:relative' >
   <?php include 'pageMenu.php'; ?>
   <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 遊輪體驗 &gt; <a href="entertainment.php">娛樂活動</a></div>
 </div>
 <div class="page_contentbox" style='width:962px'>
  <?php include 'entertainment-slideshow.php'; ?>
  <div style="width: 962px;float: left;margin: -50px 0 0 0;background: #fff;">
    <div class="page_left">
      <div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

        <ul style="width:660px;">
          <li class="page_hover">皇家節目</li>
          <li><a href="entertainment-casino.php">皇家賭場<sup>&reg;</sup></a></li>
          <li><a href="entertainment-duty-free.php">免稅店</a></li>
          <li><a href="entertainment-spa.php">水療中心</a></li>
        </ul>
        <div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:800px;">
          <p align="justify" style="height:160px;">
            <img src="../newimages/enterenment_01.jpg" width="300px" align="left" style="padding:0px 10px;" />
            <span class="brdefydq" style="display:block;">珊瑚大劇院</span>融合2類主要演出:一類是船上的16名專業藝員表演的百老匯風格歌舞；另外一類是由外聘的著名表演藝術家演繹㨂篤笑、器樂等。
          </p>
          <br/>
          <p align="justify" style="height:160px;">
            <img src="../newimages/enterenment_04.jpg" width="300px" align="left" style="padding:0px 10px;" />
            <span class="brdefydq" style="display:block;">冰上表演</span>來自世界各地的專業冰上舞者，加上先進的音響和照明系統，帶來無與倫比的美妙感受。
          </p>
          <br/>
          <p align="justify" style="height:160px;">
            <img src="../newimages/enterenment_05.jpg" width="300px" align="left" style="padding:0px 10px;" />
            <span class="brdefydq" style="display:block;">星空影院</span>在海上最大的銀幕上看電影，同時還有水柱射上33呎高空的音樂噴泉助興，相當震撼。
          </p>

          <br><br>
          <p>註:</p>
          <ul class="llist">
            <li>以上娛樂設施為海洋航行者號資料，圖片謹供參考，如有任何更改，恕不另行通知。
            <li>部分娛樂設施需額外收費，詳情請向船上有關職員查詢。
            <li>開放時間以當日船上 Compass 作準
          </ul>

        </div>
      </div>
    </div>

    <?php include 'pageRight.php'; ?>
  </div>
</div>
</div>

<style>
ul.llist, ul.llist ul {
	width: auto;
	height: auto;
	overflow: hidden;
	float: none;
	margin: 0px;
	padding: 0px;
	list-style:inherit !important;
}
ul.llist li, ul.llist li li {
	list-style: inherit !important;
	width: auto;
	height: auto;
	margin: 0 0 0 15px;;
	font-weight: normal;
	float: none;
}
ul.llist ul {
	margin: 0;
}
</style>

<?php include 'pageFoot.php'; ?>
