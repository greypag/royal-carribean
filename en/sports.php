<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style='background: url(../newimages/bodyBG.jpg) center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;'><!--class="fleet" -->
<form method="post" action="voyager.php" id="form1">

<!--头部框架<script language="javascript" type="text/javascript">RCCLHeader('bg/4.jpg')</script>-->


<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>
<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; All About Cruising &gt; <a href="sports.php">Sports</a></div>
</div>
<div class="page_contentbox" style='width:962px'>
<div style="width: 962px; float: left; position: relative; background:#fff url(../newimages/banner/sports.jpg) no-repeat">
    

<!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
<div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
  <!-- Slides Container -->
  <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 962px; height: 365px;">
    <div>
      <img u="image"  src="../newimages/sports/slideshow/slide_show_01.jpg"  />
      <img u="thumb"  src="../newimages/sports/slideshow/thumbnail_01.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/sports/slideshow/slide_show_02.jpg"  />
      <img u="thumb"  src="../newimages/sports/slideshow/thumbnail_02.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/sports/slideshow/slide_show_03.jpg"  />
      <img u="thumb"  src="../newimages/sports/slideshow/thumbnail_03.gif"  />
    </div>
    <div>
            <img u="image"  src="../newimages/sports/slideshow/slide_show_04.jpg"  />
            <img u="thumb"  src="../newimages/sports/slideshow/thumbnail_04.gif"  />
   </div>
    </div>
  <!-- Arrow Navigator Skin Begin -->
     <style>
            /* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l              (normal)
            .jssora05r              (normal)
            .jssora05l:hover        (normal mouseover)
            .jssora05r:hover        (normal mouseover)
            .jssora05ldn            (mousedown)
            .jssora05rdn            (mousedown)
            */
            .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
            {
              position: absolute;
              cursor: pointer;
              display: block;
                background: url(../jssor/images/a17.png) no-repeat;
                overflow:hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05ldn { background-position: -250px -40px; }
            .jssora05rdn { background-position: -310px -40px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 130px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 130px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->


        <!-- ThumbnailNavigator Skin Begin -->
        <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 962px; height: 80px; left:0px; bottom: 0px;">
          <div style="background-color: #000; filter:alpha(opacity=80); opacity:.8; width: 100%; height:100%;"></div>

          <!-- Thumbnail Item Skin Begin -->
          <style>
          /* jssor slider thumbnail navigator skin 03 css */
          /*
          .jssort03 .p            (normal)
          .jssort03 .p:hover      (normal mouseover)
          .jssort03 .pav          (active)
          .jssort03 .pav:hover    (active mouseover)
          .jssort03 .pdn          (mousedown)
          */
          .jssort03 .w, .jssort03 .pav:hover .w
          {
            position: absolute;
            width: 103px;
            height: 50px;
            border: white 3px solid;
          }
          * html .jssort03 .w
          {
            width: 103px;
            height: 50px;
          }
          .jssort03 .pdn .w, .jssort03 .pav .w { border-style: solid; }
          .jssort03 .c
          {
            width: 108px;
            height: 55px;
            filter:  alpha(opacity=45);
            opacity: .45;
            
            transition: opacity .6s;
            -moz-transition: opacity .6s;
            -webkit-transition: opacity .6s;
            -o-transition: opacity .6s;
          }
          .jssort03 .p:hover .c, .jssort03 .pav .c
          {
            filter:  alpha(opacity=0);
            opacity: 0;
          }
          .jssort03 .p:hover .c
          {
            transition: none;
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
          }
          </style>
          <div u="slides" style="cursor: move;left: 21px;">
            <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 108px; HEIGHT: 55px; TOP: 0; LEFT: 0;">
              <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
              <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0"></div>
            </div>
          </div>
          <!-- Thumbnail Item Skin End -->
      </div>
      <!-- ThumbnailNavigator Skin End -->
  </div>

  <div style="width: 962px;float: left;margin: -50px 0 0 0;background: #fff;">
<div class="page_left">
<div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

 <div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:1800px;">
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_01.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">FlowRider&reg;</span>Only Royal Caribbean gives you the chance to catch a wave right onboard. Grab a board and hang ten on our 40-foot-long surf simulator. Give it a go!
  </p>
  <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_04.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">RockWall&reg;</span>Rise to the occasion and take on our signature rock wall. From beginners to speed climbers, everyone can enjoy an unparalleled view from 40 feet above deck.
  </p>
  <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_05.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Pool Deck</span>Soak up the sun or savor the shade on expanded pool decks, featuring complimentary loungers, live music, and the opportunity for a frosty cocktail.
  </p>

  <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_06.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Mini Golf</span>Hit the links on the high seas! Refine your mini-golf game on a green that overlooks a sea of blue.
  </p>

    <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_07.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Sports Court</span>Whether it's a game of one-on-one or an all-out tournament to fuel your competitive fire, our sports court is just the spot for basketball and volleyball action
  </p>

    <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_15.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Jogging Track</span>Hit the lanes of the top-deck jogging track for a sunrise stroll or morning mile, with 360-degree views along the way.
  </p>

    <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_17.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">In-Line Skating Track</span>Gear up and let the good times roll at the inline skating track, where a smooth course and padded barriers let you zip around the sports deck.
  </p>

      <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_18.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Fitness Centre</span>Get in ship shape at a state-of-the art fitness center, fully loaded with the latest weight systems and cardio equipment – plus sweeping ocean views while you work up a sweat.
  </p>
 <br/>
  <p align="justify" style="height:160px;">
    <img src="../newimages/sports_20.jpg" width="300px" align="left" style="padding:0px 10px;" />
    <span class="brdefydq" style="display:block;">Ice-Skating</span>Put your vacation on ice with a spin on the ice rink, an onboard feature exclusive to Royal Caribbean. We provide the skates, you show off the moves.
  </p>
  <p>&nbsp;</p>
</div>
</div>
</div>
<?php include 'pageRight.php'; ?>
</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
<script>
jQuery(document).ready(function ($) {
    var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                    //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 1000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                           //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 2,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: true                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 962));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
</script>