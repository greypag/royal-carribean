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
      <span class="bold">Ocean View</span>
      <br>
      <br>
      <span id="icon-g">&nbsp;G&nbsp;</span>&nbsp;<span id="icon-i">&nbsp;&nbsp;I&nbsp;&nbsp;</span> <a href="../newimages/deck-plan/Ocean_View_Stateroom.jpg" id="ocean" class="icon-bar" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Ocean View Stateroom</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, sitting area , vanity area, and a private bathroom.
(160 sq. ft.) <br>
      <br> <br>
      <span class="bold">Interior</span>
      <br>
      <br>
      <span id="icon-q">&nbsp;Q&nbsp;</span>&nbsp;<a href="../newimages/deck-plan/Interior_Stateroom.jpg" id="ocean" class="icon-bar" rel="shadowbox;height=400;width=480;bgcolor=#FFF;"><u>Interior Stateroom</u></a>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, sitting area, vanity area and a private bathroom.
(150 sq. ft.) <br>
      <br>
      <span class="bold">PUBLIC AREAS</span><br>
      <br>
      <span class="bold">La Scala Theater</span><br>
      Our theatre - five stories from orchestra pit to domed ceiling - features contemporary musical stage productions.
      <br><br>
      <span class="bold">Studio B</span><br>
      A multipurpose studio complex filled with activity all day long, from ice-skating to cooking demonstrations.
      <br><br>
      <span class="bold">Focus</span><br>
      Check out the moments that our ship photographers have captured onboard in our photo gallery. A great memento for families and couples.
      <br><br>
      <span class="bold">Sapphire Dining Room</span><br>
      Our three-tier dining room features a wide variety of menu items and impeccable service.
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
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-3.gif">
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
