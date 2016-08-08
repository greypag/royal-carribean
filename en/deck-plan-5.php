<?php include 'pageHead.php'; ?>


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
        <option selected="selected" value="5">Deck 5</option>
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
      <img src="../newimages/deck-plan/deck_2s_5.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">PUBLIC AREAS</span><br>
      <br>
       <span class="bold">The Golden Room</span><br>
      An elite, invitation only lounge reserved for our VIP Casino Royale® guests.
      <br><br>
       <span class="bold">Café Promenade</span><br>
      This café on the Royal Promenade offers specialty coffees, snacks and pastries in the morning and sandwiches and cookies throughout the day and night.
      <br><br>
       <span class="bold">Pig & Whistle Pub</span><br>
      An English-themed pub that serves various imported beers and ales.
      <br><br>
       <span class="bold">Royal Promenade and Shops</span><br>
      This mall, a naturally lighted four-story area lined with bars and shops, is the heartbeat of the ship. Distinctive storefronts offer an array of merchandise ranging from logo items, perfume and jewelry to liquor and cruise wear.
      <br><br>
       <span class="bold">Shore Excursions</span><br>
      Explore and have fun ashore in every port of call! Visit the Shore Excursion desk for more details and to book.
      <br><br>
       <span class="bold">Guest Services</span><br>
      Questions or concerns? Stop by the Guest Services desk, where our knowledgeable staff is available to assist with general ship information, reporting lost or damaged goods, exchange money, cash traveler?s checks and more.
      <br><br>
       <span class="bold">R Bar</span><br>
      Experience a 1960s vibe at the all-new R Bar, featuring iconic furnishings and classic cocktails ? gimlet, martini, gin, whiskeys and more ? all served by the ship?s resident mixologist. And be sure to try the drink specials, specially created to complement the Centrum?s nightly theme and aerial performance.
      <br><br>
       <span class="bold">Sapphire Dining Room</span><br>
      Our three-tier dining room features a wide variety of menu items and impeccable service.
      <br>
      <br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-5.gif">
    <br><br><br>
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

