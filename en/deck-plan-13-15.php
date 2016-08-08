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
        <option value="5">Deck 5</option>
        <option value="6">Deck 6</option>
        <option value="7">Deck 7</option>
        <option value="8">Deck 8</option>
        <option value="9">Deck 9</option>
        <option value="10">Deck 10</option>
        <option value="11">Deck 11</option>
        <option value="12">Deck 12</option>
        <option selected="selected" value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_13.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">PUBLIC AREAS</span><br>
      <br>
      <span class="bold">Deck 15</span><br>
      <br>
      <span class="bold">Skylight Chapel</span><br>
      Our wedding chapel, which can accommodate 40 people, is located on top of the Viking Crown Lounge (the highest point on the ship), and is the perfect place to say "I do."
      <br><br><br>
      <span class="bold">Deck 14</span><br>
      <br>
      <span class="bold">Izumi Japanese Cuisine</span><br>
     The traditional japanese dishes at Izumi will impress you with their pure, delicate flavors, freshness of ingredients and impeccable presentation. Diners can choose from popular sushi rolls, sashimi, our Hot Rock (Ishiyaki) Plates, sukiyaki and more.
      <br><br>
      <span class="bold">Diamond Club</span><br>
      Diamond, Diamond Plus, and Pinnacle Club Crown & Anchor® Society members enjoy access to this lounge, created to serve these loyal guests with concierge access, complimentary continental breakfast, and evening drinks.
       <br><br>
      <span class="bold">Viking Crown Lounge®</span><br>
      A Royal Caribbean signature. Perched high above the ocean, this comfortable lounge offers spectacular vistas by day and turns into a lively dance club at night.
      <br>
      <br>
      <br>
      <span class="bold">Deck 13</span><br>
      <br>
      <span class="bold">Rock-Climbing Wall</span><br>
      Our signature rock climbing walls are our most popular feature and are available on all Royal Caribbean cruise ships. Whether it's your first time on a rock wall or you're a seasoned climber, there are challenges for all levels of experience. We'll provide all of the equipment, including shoes, helmets and harnesses. All you need to do is bring a pair of socks and, of course, your sense of adventure.
      <br>
      <br>
      <span class="bold">Sports Court</span><br>
      An outdoor activity court for sports, including basketball and volleyball.
      <br>
      <br>
      <span class="bold">Voyager Dunes Golf Course</span><br>
      Our 9-hole miniature-golf course will entertain adults and children alike.
      <br>
      <br>
      <span class="bold">Flowrider<sup><font size="-3">®</font></sup></span><br>
      Your friends are never going to believe you surfed onboard a ship! Even the best beaches have bad days, but on the FlowRider®, surf?s always up. Plus, whether you?re boogie boarding or surfing, the FlowRider® is great fun for all ages and all skill levels.
      <br>
      <br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1367" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-13.jpg">
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

