<?php include 'pageHead.php'; ?>
<script>
$(document).ready(function() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('#ocean_1, #ocean_2, #stateroom_balcony_1, #stateroom_balcony_2, #stateroom_1, #stateroom_2, #promenade, #suite_deluxe_1, #suite_deluxe_2').attr('target', '_self');
        $('#ocean_1, #ocean_2, #stateroom_balcony_1, #stateroom_balcony_2, #stateroom_1, #stateroom_2, #promenade, #suite_deluxe_1, #suite_deluxe_2').attr('rel', '');
        $('#ocean_1, #ocean_2').attr('href', 'deck-plan-image.php?type=ocean');
        $('#stateroom_balcony_1, #stateroom_balcony_2').attr('href', 'deck-plan-image.php?type=ocean');
        $('#stateroom_1, #stateroom_2').attr('href', 'deck-plan-image.php?type=stateroom');
        $('#suite_deluxe_1, #suite_deluxe_2').attr('href', 'deck-plan-image.php?type=suite_deluxe');
        $('#promenade').attr('href', 'deck-plan-image.php?type=promenade');
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
        <option selected="selected" value="9">Deck 9</option>
        <option value="10">Deck 10</option>
        <option value="11">Deck 11</option>
        <option value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_9.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">標準套房</span>
      <br>
      <br>
      <span id="icon-fs">&nbsp;FS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Suite_Deluxe.jpg" class="icon-bar" id="suite_deluxe_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>皇家陽台家庭套房</u></a>
      <br>
      兩間臥室（其中一間可加第三、第四人床），每間臥室兩張單人床（可改成大床）、私人陽台、起居間（帶雙人沙發床）、兩間私人浴室和專屬禮賓服務。 <br>(561平方尺、陽台246平方尺)
      <br>
      <br>
      <span id="icon-js">&nbsp;JS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Suite_Deluxe.jpg" class="icon-bar" id="suite_deluxe_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>標準陽台套房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。 <br>(264平方尺、陽台75平方尺)
      <br>
      <br>
      <span class="bold">陽台房</span>
      <br>
      <br>
      <span id="icon-d1">&nbsp;D1&nbsp;</span>&nbsp; <span id="icon-d2">&nbsp;D2&nbsp;</span>&nbsp;<a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>標準陽台房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。各層甲板的房費不同。 <br>(179平方尺、陽台52平方尺)
      <br>
      <br>
      <span id="icon-e1">&nbsp;E1&nbsp;</span>&nbsp; <a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>高級陽台房</u></a>
      <br>
      兩張單人床（可改成大床）、私人陽台、起居間（有些帶沙發床）、私人浴室。各層甲板的房費不同。 <br>(164平方尺、陽台51平方尺)
      <br>
      <br>
      <span class="bold">景觀房</span>
      <br>
      <br>
      <span id="icon-fo">&nbsp;FO&nbsp;</span>&nbsp;<a href="../newimages/deck-plan/Ocean_View_Stateroom.jpg" class="icon-bar" id="ocean_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>家庭海景房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆（帶淋浴）。 （262平方尺）
      <br><br>
      <span id="icon-f">&nbsp;F&nbsp;</span>&nbsp;<a class="icon-bar" href="../newimages/deck-plan/Stateroom.jpg" id="stateroom_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>大海景房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 （178平方尺）
      <br>
      <br>
      <span id="icon-g">&nbsp;G&nbsp;</span>&nbsp;<a class="icon-bar" href="../newimages/deck-plan/Ocean_View_Stateroom.jpg" id="ocean_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>海景房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 （160平方尺）
      <br>
      <br>
      <span class="bold">內艙房</span>
      <br>
	  <span id="icon-j" style="color: #000;">&nbsp;J&nbsp;</span>&nbsp;虛擬陽台房
      <br>
      <br>
      <span id="icon-k">&nbsp;K&nbsp;</span>&nbsp;<span id="icon-m">&nbsp;M&nbsp;</span>&nbsp;<u>無障礙內艙房</u>
      <br>
      兩張單人床（可改成大床），開放式床架，更寬闊的門口及空間，無障礙淋浴間連扶手。 （256平方尺）
      <br>
      <br>
      <span id="icon-k">&nbsp;K&nbsp;</span>&nbsp;<span id="icon-l">&nbsp;L&nbsp;</span>&nbsp;<span id="icon-m">&nbsp;M&nbsp;</span>&nbsp;<a href="../newimages/deck-plan/Stateroom.jpg" class="icon-bar" id="stateroom_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>內艙房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 (150平方尺)
      <br>
      <br>
      <span class="bold">公共地方</span>
      <br>
      <br>
      禮賓部
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
      <br/>
      <br/>
      <br/>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/tc/Deck-9.gif">
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

