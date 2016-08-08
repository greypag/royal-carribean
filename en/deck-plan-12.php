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
        <option selected="selected" value="12">Deck 12</option>
        <option value="13-15">Deck 13-15</option>
      </select>
    </div>
    <div style="padding: 6px 0px;">
      <img src="../newimages/deck-plan/deck_2s_12.jpg">
    </div>
    <div style="line-height: 20px;">
      <br>
      <span class="bold">Balcony</span>
      <br>
      <br>
      <span id="icon-e3">&nbsp;E3&nbsp;</span>&nbsp; <u>Deluxe Ocean View Stateroom with Balcony</u>
      <br>
      Two twin beds that convert to a Royal King, measuring 72.5 inches wide by 82 inches long, private balcony, sitting area with sofa, and a private bathroom. Rates vary from deck to deck.
		<br>(164 sq. ft., balcony 51 sq. ft.) <br>
      <br>
      <br>
      <span class="bold">Ocean View</span>
      <br>
      <br>
      <span id="icon-pf">&nbsp;PF&nbsp;</span>&nbsp; <u>Family Panoramic Ocean View</u>
      <br>
      Two lower twin beds that convert to Royal King, measuring 72.5 inches wide by 82 inches long. Curtained section with bunk beds. Living area with double sofa bed, vanity and sitting area. One and a half baths with shower. Floor to ceiling wrap around panoramic windows, 76 inches high by 321 inches wide.
		<br>(406 sq. ft.)
		<br>
      <br>
      <span id="icon-p1">&nbsp;P1&nbsp;</span>&nbsp; <u>Larger Panoramic Ocean View Stateroom</u>
      <br>
      Two lower twin beds that convert to Royal King, measuring 72.5 inches wide by 82 inches long. Double sofa bed. Vanity with sitting area. Private bathroom with shower. Floor to ceiling wrap around panoramic window, 76 inches high by 253 inches wide.
	  <br>(283 sq. ft.)
      <br>
      <br>
	  <span id="icon-p2">&nbsp;P2&nbsp;</span>&nbsp;<u>Panoramic Ocean View Stateroom</u>
      <br>
      Two lower twin beds convert to Royal King, measuring 72.5 inches wide by 82 inches long. Double sofa bed for quad staterooms. Vanity with sitting area, Private bathroom with shower. Floor to Ceiling wrap around panoramic window, 76 inches high by 103 inches wide.
	  <br>(Staterooms size varies from 191 to 215 sq. ft.)
	  <br>
	  <br>
	  <br>
      <span class="bold">PUBLIC AREAS</span><br>
      <br>
      <span class="bold">Vitality<sup><font size="-3">SM</font></sup> at Sea Spa and Fitness Center</span><br>
      Our seaside fitness center features modern exercise equipment; our full-service spa offers a beauty salon and spa treatments including massage, manicures and seaweed body wraps.
      <br><br>
      <span class="bold">Video Arcade</span><br>
      Blips, bleeps, clangs and cheers. Play to win in a classic arcade atmosphere with timeless games like Pacman and table hockey, plus the latest - Guitar Hero, Fast and Furious Drift and more.
      <br><br>
      <span class="bold">Optix Teen Disco</span><br>
      Parties where teens can gather, dance, and enjoy the music.
      <br><br>
      <span class="bold">Adventure Ocean<sup><font size="-3">®</font></sup></span><br>
      A play area with specially designed activities for kids from 3-17. Run by exceptional, energetic and college-educated staff.
      <br><br>
      <span class="bold">Johnny Rockets<sup><font size="-3">®</font></sup></span><br>
      Step into our '50s diner, which features red naugahyde booths, formica counters, a jukebox, burgers, fries and, of course, good old-fashioned malted milk shakes.
      <br><br>
    </div>
  </div>
  <div style="float: left;">
    <img height="1266" width="260" id="deckimg" name="deckimg" src="../newimages/deck-plan/deck-plan/en/Deck-12.gif">
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

