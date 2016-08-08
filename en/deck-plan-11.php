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
        <option selected="selected" value="11">Deck 11</option>
        <option value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_11.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">PUBLIC AREAS</span><br>
      <br>
      <span class="bold">Vitality<sup><font size="-3">SM</font></sup> at Sea Spa and Fitness Center</span><br>
      Our seaside fitness center features modern exercise equipment. And our full-service spa offers a beauty salon and spa treatments, including massage, manicures and seaweed body wraps.
      <br><br>
      <span class="bold">Solarium</span><br>
      The indoor/outdoor pool and lounge are can be covered during inclement weather by a huge glass roof.
      <br><br>
      <span class="bold">Pool Deck</span><br>
      Warm up in one of our relaxing whirlpools.
      <br><br>
      <span class="bold">Outdoor Movie Screen</span><br>
      Watch first-run movies and big time sporting events the way they were meant to be seen - poolside, under the stars. A screen hoisted above the main pool area will showcase all the larger-than-life action.
      <br><br>
      <span class="bold">Sea Treck Dive Shop</span><br>
      Visit the SreaTreck emplorium for water gear and souvenirs.
      <br><br>
      <span class="bold">Chops Grille<sup><font size="-3">SM</font></sup></span><br>
      If magnificent Italian cuisine with an intimate atmosphere and an upscale flavor is your style, then Portofino is where you should be. Portofino is one of our specialty restaurants and offers a luxurious dining experience you won't soon forget.
      <br><br>
      <span class="bold">Windjammer</span><br>
      This seaside café offers buffet-style breakfasts and lunches. In the evenings, the café's casual atmosphere is complemented by a changing menu and restaurant-style service.
      <br><br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-11.gif">
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

