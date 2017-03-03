<?php include 'pageHead.php'; ?>
<script>
$(document).ready(function() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('#ship_img').attr('target', '_self').attr('rel', '');
        $('#ship_img').attr('href', 'voyager-image.php');
    }
});
</script>
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
<ul class="wider-190"  style="width: 650px;">
<li class="wider-190"><a href="onboard-experience.php">Onboard Experience</a></li>
<li class=""><a href="videos.php">Videos</a></li>
<li class=""><a href="deck-plan-2.php">Deck Plan</a></li>
<li class="page_hover-190">Specifications</li>
<li class="wider-190" style="display:none;"><a href="virtual-tour.php">360&deg; Virutal Tour</a></li>
</ul>


<div style="position:relative; float:left; width:640px; left:30px;min-height:550px;"><br />

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Registry</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">Registry: Bahamas • Built in Turku shipyard Kvaerner Masa-Yards
</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">Maiden voyage</td>
    <td width="75%" align="left" valign="top">November 21, 1999 </td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Revitalization Date</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">November 2014</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">New Facilities</td>
    <td width="75%" align="left" valign="top">FlowRider, Outdoor Movie Screen, Izumi Japanese Giovanni's Table and Chops Grille specialty dining options</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Godmother</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">Katarina Witt</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">Tonnage</td>
    <td width="75%" align="left" valign="top">138,000 tons</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Maximum capacity</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">3,840 people</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">Length</td>
    <td width="75%" align="left" valign="top">310 m</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Width</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">48 m</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top">Deck Floor</td>
    <td width="75%" align="left" valign="top">15 floors</td>
  </tr>
  <tr>
    <td width="25%" align="left" valign="top" bgcolor="#F2F2F2">Cruising speed</td>
    <td width="75%" align="left" valign="top" bgcolor="#F2F2F2">22 knots</td>
  </tr>
  <tr>
    <td colspan="2">
      <a href="../newimages/voyager-of-the-seas/ship_image_bigger.jpg" class="icon-bar" id="ship_img" rel="shadowbox;height=400;width=720;bgcolor=#FFF;">
        <img src="../newimages/voyager-of-the-seas/ship_image_small.jpg" alt="" title=""/>
      </a>
    </td>
  </tr>
  <?php
  /*
  <tr>
    <td width="25%" align="left" valign="top">First flight</td>
    <td width="75%" align="left" valign="top">November 1999</td>
  </tr>*/
  ?>
</table>

</div>


</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
