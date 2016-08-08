<?php include 'pageHead.php'; ?>
<script>
$(document).ready(function() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $('#royal_1, #owner, #grand_1, #ocean_1, #ocean_2, #stateroom_balcony_1, #stateroom_balcony_2, #stateroom_1, #stateroom_2, #promenade, #suite_deluxe').attr('target', '_self');
      $('#royal_1, #owner, #grand_1, #ocean_1, #ocean_2, #stateroom_balcony_1, #stateroom_balcony_2, #stateroom_1, #stateroom_2, #promenade, #suite_deluxe').attr('rel', '');
      $('#ocean_1, #ocean_2').attr('href', 'deck-plan-image.php?type=ocean');
      $('#stateroom_balcony_1, #stateroom_balcony_2').attr('href', 'deck-plan-image.php?type=ocean');
      $('#stateroom_1, #stateroom_2').attr('href', 'deck-plan-image.php?type=stateroom');
      $('#suite_deluxe').attr('href', 'deck-plan-image.php?type=suite_deluxe');
      $('#promenade').attr('href', 'deck-plan-image.php?type=promenade');
      $('#royal_1').attr('href', 'deck-plan-image.php?type=royal');
      $('#grand_1').attr('href', 'deck-plan-image.php?type=grand');
      $('#owner').attr('href', 'deck-plan-image.php?type=owner');
    }
});
</script>

<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

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
        <option selected="selected" value="10">Deck 10</option>
        <option value="11">Deck 11</option>
        <option value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_10.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">標準套房</span>
      <br>
      <br>
      <span id="icon-rs">&nbsp;RS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Royal_Suite_with_Balcony.jpg" class="icon-bar" id="royal_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>皇家陽台套房</u></a>
      <br>
      獨立的臥室、大床、私人陽台帶浴缸、按摩浴缸，起居室帶大沙發床，小三角鋼琴，禮賓服務。 <br/>（1,087平方尺，陽台217平方尺）
      <br>
      <br>
      <span id="icon-os">&nbsp;OS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Owner_Suite_with_Balcony.jpg" class="icon-bar" id="owner" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>主人陽台套房</u></a>
      <br>
      大床、私人陽台、起居室帶大沙發床、私人浴室（帶浴缸）、單獨的淋浴和浴盆、禮賓服務。 <br/>（559平方尺，陽台90平方尺）
      <br>
      <br>
      <span id="icon-gs">&nbsp;GS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Grand_Suite_with_Balcony.jpg" class="icon-bar" id="grand_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>豪華陽台套房</u></a>
      <br>
      兩張單人床，可改成大床、私人陽台、起居室帶沙發床、禮賓服務。 <br/>（349平方尺，陽台100平方尺）
      <br>
      <br>
      <span id="icon-js">&nbsp;JS&nbsp;</span>&nbsp; <u>無障礙標準陽台套房</u>
      <br>
      兩張單人床（可改成大床），開放式床架，更寬闊的門口及空間，無障礙淋浴間連扶手。 <br/>（276平方尺、陽台69平方尺）
      <br>
      <br>
      <span id="icon-js">&nbsp;JS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Suite_Deluxe.jpg" class="icon-bar" id="suite_deluxe" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>標準陽台套房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。 (264平方尺、陽台75平方尺)
      <br>
      <br>
      <span class="bold">陽台房</span>
      <br>
      <br>
      <span id="icon-d1">&nbsp;D1&nbsp;</span>&nbsp; <a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>標準陽台房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。各層甲板的房費不同。 <br/>(179平方尺、陽台52平方尺)<br>
      <br>
      <span id="icon-e1">&nbsp;E1&nbsp;</span>&nbsp; <a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>高級陽台房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。各層甲板的房費不同。 <br/>(164平方尺、陽台51平方尺)
      <br>
      <br>
      <span class="bold">內艙房</span>
	  <br>
	  <span id="icon-j" style="color: #000;" >&nbsp;J&nbsp;</span>&nbsp;無障礙虛擬陽台房
	  <br>
	  <span id="icon-j" style="color: #000;" >&nbsp;J&nbsp;</span>&nbsp; 虛擬陽台房
      <br>
      <br>
      <span id="icon-k" style="color: #000;" >&nbsp;K&nbsp;</span>&nbsp;<span id="icon-m" style="color: #000;" >&nbsp;M&nbsp;</span>&nbsp;<a class="icon-bar" href="../newimages/deck-plan/Stateroom.jpg" id="stateroom_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;">
	  <u>內艙房</u><br/>
	  兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 (150平方尺) </u></a>
      <br>
      <br>
      <br>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_15.jpg">
        艙房配有沙發床
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_16.jpg">
        艙房配有第三張折疊床
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_17.jpg">
        艙房配有第三及第四張折疊床
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_18.jpg">
        聯接式艙房
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_19.jpg">
        無障礙艙房
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_20.jpg">
        艙房配有沙發床及第三張折疊床
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_21.jpg">
        艙房配有額外四張折疊床
      </div>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/tc/Deck-10.gif">
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

