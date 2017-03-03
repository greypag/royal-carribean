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
        <option selected="selected" value="4">Deck 4</option>
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
      <img src="../newimages/deck-plan/deck_2s_4.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
       <span class="bold">PUBLIC AREAS</span><br>
      <br>
      <br>
      <span class="bold">La Scala Theater</span><br>
      Our theatre - five stories from orchestra pit to domed ceiling - features contemporary musical stage productions.
      <br>
      <br>
      <span class="bold">Giovanni's Table</span><br>
      A casual Italian trattoria with indoor and al fresco seating, Giovanni?s Table offers rustic dishes with a contemporary flair, including toasted herb focaccia, pastas, braised meat dishes and stews, served family-style.
      <br>
      <br>
      <span class="bold">Schooner Bar</span><br>
      This nautically themed bar is the perfect spot to enjoy a drink with friends.
      <br>
      <br>
      <span class="bold">Casino Royale®</span><br>
      Our glittering casino features electronic Slot Machines, Video Poker, Blackjack, Craps, Roulette and Caribbean Stud Poker.
      <br>
      <br>
      <span class="bold">The Centrum</span><br>
      The Centrum, a seven-story atrium surrounded by bars, lounges and unique shops, is best compared to the lobby of a grand hotel.
      <br>
      <br>
      <span class="bold">Art Gallery</span><br>
      Original art is displayed in the onboard art gallery as well as throughout the ship. To purchase something for your own collection, visit an onboard art auction.
      <br>
	  <br>
      <span class="bold">Sapphire Dining Room</span><br>
      Our three-tier dining room features a wide variety of menu items and impeccable service.
      <br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-4.gif">
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
