<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

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

<?php include( 'ship_tabs.php' ) ?>

<div style="position:relative; float:left; width:640px; left:30px;min-height:550px;"><br />
  <div class="deck-plan-title">甲板圖</div>
  <div style="float: left; width: 300px;">
    <div>
      <select onchange="location='deck-plan-'+this.options[this.selectedIndex].value+'.php';" name="deck" id="deck">
        <option value="2">Deck 2</option>
        <option value="3">Deck 3</option>
        <option value="4">Deck 4</option>
        <option value="5">Deck 5</option>
        <option value="6">Deck 6</option>
        <option value="7">Deck 7</option>
        <option value="8">Deck 8</option>
        <option value="9">Deck 9</option>
        <option value="10">Deck 10</option>
        <option value="11">Deck 11</option>
        <option selected="selected" value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_12.jpg">
    </div>
    <div style="line-height: 20px;">
	<br>
      <span class="bold">陽台房 </span>
      <br>
      <br>
      <span id="icon-e3">&nbsp;E3&nbsp;</span>&nbsp; <u>高級陽台海景房 </u>
      <br>
      兩張單人床（可改成大床）、起居間（帶沙發）、私人浴室和洗臉盆。各層甲板的房費不同。  <br>（164平方尺、陽台51平方尺）  <br>
      <br>
      <br>
      <span class="bold">景觀房</span>
      <br>
      <br>
      <span id="icon-pf">&nbsp;PF&nbsp;</span>&nbsp; <u>環迴家庭海景房 </u>
      <br>
      兩張單人床（可改成大床）、兩張開放式床架、起居間帶雙人沙發床、私人浴室（帶淋浴）和洗臉盆。設有高76”x 闊321” 的環迴落地觀景窗。
		<br>(406平方尺)
		<br>
      <br>
      <span id="icon-p1">&nbsp;P1&nbsp;</span>&nbsp; <u>高級環迴海景房 </u>
      <br>
      兩張單人床（可改成大床）、雙人沙發床、起居間、私人浴室（帶淋浴）和洗臉盆。設有高76”x 闊253” 的環迴落地觀景窗。
	  <br>(283平方尺)
      <br>
      <br>
	  <span id="icon-p2">&nbsp;P2&nbsp;</span>&nbsp;<u>環迴海景房 </u>
      <br>
      兩張單人床（可改成大床）、四人房帶雙人沙發床、起居間、私人浴室（帶淋浴）和洗臉盆。設有高76”x 闊103” 的環迴落地觀景窗。
	  <br>(191-215平方尺)
	  <br>
	  <br>
       <br>
      <span class="bold">公共地方</span><br>
      <br>
      Vitality 水療及健身中心<br><br>
      電子游戲中心<br><br>
      青少年的士高<br><br>
      海上歷奇®青少年活動中心<br><br>
      尊尼火箭美式餐廳
      <br><br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/tc/Deck-12.gif">
    <br><br><br><br>
  </div>
  <div style="clear: both;"></div>


</div>


</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
