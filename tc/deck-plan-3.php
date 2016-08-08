<?php include 'pageHead.php'; ?>
<script>
$(document).ready(function() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('#ocean').attr('target', '_self');
        $('#ocean').attr('rel', '');
        $('#ocean').attr('href', 'deck-plan-image.php?type=ocean');
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
        <option selected="selected" value="3">Deck 3</option>
        <option value="4">Deck 4</option>
        <option value="5">Deck 5</option>
        <option value="6">Deck 6</option>
        <option value="7">Deck 7</option>
        <option value="8">Deck 8</option>
        <option value="9">Deck 9</option>
        <option value="10">Deck 10</option>
        <option value="11">Deck 11</option>
        <option value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_3.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">海景房</span>
      <br>
      <br>
      <span id="icon-g">&nbsp;G&nbsp;</span> <a href="../newimages/deck-plan/Ocean_View_Stateroom.jpg" id="ocean" class="icon-bar" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>海景房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 （160平方尺）<br>
      <br>
      <br>
      <span class="bold">內艙房</span>
      <br>
      <br>
      <span id="icon-q">&nbsp;Q&nbsp;</span> <a href="../newimages/deck-plan/Interior_Stateroom.jpg" id="ocean" class="icon-bar" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>內艙房</u></a>
      <br>
      兩張單人床（可改成大床）、起居間（有些帶沙發床）、私人浴室和洗臉盆。 (150平方尺)  <br>
      <br>
      <span class="bold">公共地方</span><br>
      <br>
      珊瑚大劇院<br><br>
      Studio B真冰溜冰場<br><br>
      Focus 照相館<br><br>
      藍寶石主餐廳
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
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/tc/Deck-3.gif">
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

