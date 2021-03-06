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
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Find a Ship &gt; <a href="voyager.php">Voyager of the Seas</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/voyager.jpg) no-repeat;">

<div style="margin-top:250px;" class="inner">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">
<?php include( 'ship_tabs.php' ) ?>

<div style="position:relative; float:left; width:640px; left:30px;min-height:550px;"><br />
  <div class="deck-plan-title">Deck Plan</div>
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
      <span class="bold">Suite/Deluxe</span>
      <br>
      <br>
      <span id="icon-rs">&nbsp;RS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Royal_Suite_with_Balcony.jpg" class="icon-bar" id="royal_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Royal Suite with Balcony</u></a>
      <br>
      Separate bedroom with king-size bed, private balcony with hot tub, whirlpool bathtub, living room with queen-size sofa bed, baby grand piano, and concierge service.
      <br>(1,087 sq. ft., balcony 217 sq. ft.)
      <br>
      <br>
      <span id="icon-os">&nbsp;OS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Owner_Suite_with_Balcony.jpg" class="icon-bar" id="owner" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Owner's Suite with Balcony</u></a>
      <br>
      Queen-size bed, private balcony, separate living area with queen-size sofa bed, private bathroom with bathtub, separate shower and bidet, and concierge service.
      <br>(559 sq. ft., balcony 90 sq. ft.)
      <br>
      <br>
      <span id="icon-gs">&nbsp;GS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Grand_Suite_with_Balcony.jpg" class="icon-bar" id="grand_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Grand Suite with Balcony</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, private balcony, sitting area (some with sofa bed) and concierge service.
      <br>(349 sq. ft., balcony 100 sq. ft.)
      <br>
      <br>
      <span id="icon-js">&nbsp;JS&nbsp;</span>&nbsp; <u>Accessible Junior Suite with Balcony</u>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long with open bed frames, wider entry door, turning spaces, private balcony, sitting area with lowered vanity, closet rods, and safe, and a private bathroom with a wider door, roll-in shower, grab bars, fold-down shower bench, hand-held shower head, raised toilet, and a lowered sink.
      <br>(276 sq. ft., balcony 69 sq. ft.)
      <br>
      <br>
      <span id="icon-js">&nbsp;JS&nbsp;</span>&nbsp; <a href="../newimages/deck-plan/Suite_Deluxe.jpg" class="icon-bar" id="suite_deluxe" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Junior Suite with Balcony</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, private balcony, sitting area (some with sofa bed) and private batroom.
      <br>(264 sq. ft., balcony 75 sq. ft.)
      <br>
      <br>
      <span class="bold">Balcony</span>
      <br>
      <br>
      <span id="icon-d1">&nbsp;D1&nbsp;</span>&nbsp; <a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Superior Ocean View Stateroom with Balcony</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, private balcony, sitting area and a private bathroom. Rates vary from deck to deck.
      <br>(179 sq. ft., balcony 52 sq. ft.) <br>
      <br>
      <span id="icon-e1">&nbsp;E1&nbsp;</span>&nbsp; <a class="icon-bar" href="../newimages/deck-plan/Stateroom_with_Balcony.jpg" id="stateroom_balcony_2" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Deluxe Ocean View Stateroom with Balcony</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, private balcony, sitting area with sofa, and a private bathroom. Rates vary from deck to deck.
      <br>(164 sq. ft., balcony 51 sq. ft.)
      <br>
      <br>
      <span class="bold">Interior</span>
	  <br>
	  <span id="icon-j" style="color: #000;" >&nbsp;J&nbsp;</span>&nbsp;Accesible Interior Virtual Bal
	  <br>
	  <span id="icon-j" style="color: #000;" >&nbsp;J&nbsp;</span>&nbsp;Interior Strm W/Virtual Balc
      <br>
      <br>
	  <!--
      <span id="icon-l">&nbsp;L&nbsp;</span>&nbsp;<u>Accessible Inside Stateroom</u><br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long with open bed frames, wider entry door, turning spaces, sitting area with lowered vanity, closet rods, and safe, and a private bathroom with a wider door, roll-in shower, grab bars, fold-down shower bench, hand-held shower head, raised toilet, and a lowered sink. Following inside staterooms have a Promenade view: 7297.
      <br><br>
	  -->
      <span id="icon-k" style="color: #000;" >&nbsp;K&nbsp;</span>&nbsp;<span id="icon-m" style="color: #000;" >&nbsp;M&nbsp;</span>&nbsp;<a class="icon-bar" href="../newimages/deck-plan/Stateroom.jpg" id="stateroom_1" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Interior Stateroom</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, sitting area, vanity area and a private bathroom.
      <br>(150 sq. ft.)
      <br>
      <br>
      <br>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_15.jpg">
        Stateroom with sofa bed.
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_16.jpg">
        Stateroom has third Pullman bed available.
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_17.jpg">
        Stateroom has third and fourth Pullman beds available.
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_18.jpg">
        Connecting staterooms.
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_19.jpg">
        Indicates accessible staterooms.
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_20.jpg">
        Stateroom with sofa bed and third Pullman bed available. <i>(For sofa bed configuration call your Travel Agent or Royal Caribbean International. )</i>
      </div>
      <div style="line-height: 20px;">
        <img style="vertical-align: middle;" src="../newimages/deck-plan/legend_21.jpg">
        Stateroom has four additional Pullman beds available.
      </div>
      <br>
      <br>
      <br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-10.gif">
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
