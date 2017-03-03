<?php $pageName = "quantum"; ?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;">
<?php include 'tracking_tag.php'; ?>
    <div style='height:92px; width:962px; margin:auto; position:relative' >
        <?php include 'pageMenu.php'; ?>

        <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Find a Ship &gt; <a href="quantum.php">Quantum of the Seas</a>
        </div>
    </div>

    <div class="page_contentbox" style='width:962px'>
        <!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
        <div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 2px; top: 0px; width: 962px; height: 365px;">
                <div>
                    <img u="image"  src="../newimages/quantum/slideshow/slideshow_01.jpg"  />
                    <img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_01.jpg"  />
                </div>
                <div>
                    <img u="image"  src="../newimages/quantum/slideshow/slideshow_02.jpg"  />
                    <img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_02.jpg"  />
                </div>
                <div>
                    <img u="image"  src="../newimages/quantum/slideshow/slideshow_03.jpg"  />
                    <img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_03.jpg"  />
                </div>
                <div>
                    <img u="image"  src="../newimages/quantum/slideshow/slideshow_04.jpg"  />
                    <img u="thumb"  src="../newimages/quantum/slideshow/thumbnail_04.jpg"  />
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
                    .shipsTo {
                        width: 192px;
                        float: left;
                        border: 1px solid #dddddd;
                        background: white;
                        -webkit-box-shadow: 0px 0px 5px #cccccc;
                        margin: 20px 0 31px 5px;
                        padding: 8px;
                    }
                    .shipsToWrapper {
                        background: #f7f7f7;
                        padding: 25px 8px 8px 8px;
                    }
                    .shipsTo h4 {
                        background: url("../newimages/quantum/bg_divider_repeat.png") repeat-x scroll left bottom transparent;
                        font-size: 17px;
                        line-height: 16px;
                        padding-bottom: 20px;
                        text-transform: uppercase;
                        margin-bottom: 16px;
                        font-weight: bold;
                        color: #061556;
                        margin-top: 0;
                    }
                    .dataStats {
                        text-align: right;
                    }
                    .left {
                        float: left;
                    }
                    .float {
                        overflow: hidden;
                    }
                    .quantum-bottom-item-left {
                        margin-right: 10px;
                    }
                    .quantum-bottom-item-right {
                        width: 330px;
                    }
                    .quantum-bottom-item-right-title {
                        color: #006ab7;
                        font-weight: bold;
                    }
                    .quantum-bottom-item-right-content {
                        text-align: justify;
                        line-height: 150%;
                    }
                    .quantum-bottom-item {
                        padding-bottom: 18px;
                        width: 100%;
                    }
                    #quantum-find-more {
                        padding-bottom: 30px;
                        font-size: 14px;
                        text-align: right;
                    }
                    #quantum-find-more a{
                        color: #000f57;
                        font-weight: bold;
                        font-size: 12px;
                    }
                    sup {
                        font-size: 8px;
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
                    <br/>
                    <ul class="wider-190"  style="width: 650px;">
                        <li class="page_hover-190">Quantum of the Seas</li>
                        <li class=""><a href="videos_quantum.php">Videos</a></li>
                    </ul>

                    <div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:800px;">
                        <div id="quantum-top" class="float">
                            <h3 style="margin-left: 0; margin-bottom: 10px;">Quantum of the Seas</h3>
                            <p>There's only one word that can possibly sum up our newest class, Quantum class: WOW! With this addition, Royal Caribbean International in Hong Kong have just reached a whole new level. Newly designed staterooms, game-changing technology, groundbreaking venues and the best dining ever are just the start of what you'll find onboard. Plus, we've enlisted celebrity experts in fields such as design, sports & fitness, entertainment and others to be part our QuantumSM Experience Advisor program to work hand-in-hand to provide their expertise to help shape interior design, key amenities and activities. By taking a quantum leap forward with the first ship in our Quantum class, we're holding ourselves up to the promise of building ships that take you to new heights. Plan a trip on the Quantum of the Seas or Ovation of the Seas and cruise from Hong Kong with style.</p>
                        </div>
                        <div id="quantum-bottom" class="float">
                            <br/>
                            <div style="margin-left: 0; margin-bottom: 10px;font-size: 16px; color: #195f9b;font-weight: bold; ">First-at-Sea-Experiences</div>
                            <div class="quantum-bottom-item float">
                                <div class="quantum-bottom-item-wrapper">
                                    <div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_01.jpg" alt="RipCord by iFLY®" title="RipCord by iFLY®"/></div>
                                    <div class="quantum-bottom-item-right left">
                                        <div class="quantum-bottom-item-right-title">RipCord by iFLY®</div>
                                        <div class="quantum-bottom-item-right-content">
                                            Introducing the first ever sky-diving simulator at sea! Experience the sheer thrill and exhilaration of flying in an air machine that lets you soar in a safe, controlled environment.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quantum-bottom-item float">
                                <div class="quantum-bottom-item-wrapper">
                                    <div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_02.jpg" alt="" title=""/></div>
                                    <div class="quantum-bottom-item-right left">
                                        <div class="quantum-bottom-item-right-title">North Star<sup>SM</sup></div>
                                        <div class="quantum-bottom-item-right-content">
                                            Take yourself to new heights with the jewel-shaped capsule that gently ascends over 300 feet above sea level. Breathtaking 360° views of the sea and our destinations make the North Star one of the most anticipated features on this ship.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quantum-bottom-item float">
                                <div class="quantum-bottom-item-wrapper">
                                    <div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_03.jpg" alt="" title=""/></div>
                                    <div class="quantum-bottom-item-right left">
                                        <div class="quantum-bottom-item-right-title">Introducing Two70°<sup>SM</sup></div>
                                        <div class="quantum-bottom-item-right-content">
                                            Experience completely revolutionary spaces that transform from day to night. Play basketball, go roller skating and ride bumper cars at the Seaplex<sup>SM</sup>. Relax with a book at Two70°<sup>SM</sup> and come back at night for a spectacular aerial show.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quantum-bottom-item float">
                                <div class="quantum-bottom-item-wrapper">
                                    <div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_04.jpg" alt="" title=""/></div>
                                    <div class="quantum-bottom-item-right left">
                                        <div class="quantum-bottom-item-right-title">Newly Designed Staterooms</div>
                                        <div class="quantum-bottom-item-right-content">
                                            Say hello to your home on the high seas – now with more family-friendly modular staterooms that interconnect and the first virtual balconies at sea.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quantum-bottom-item float">
                                <div class="quantum-bottom-item-wrapper">
                                    <div class="quantum-bottom-item-left left"><img src="../newimages/quantum/pic_05.jpg" alt="" title=""/></div>
                                    <div class="quantum-bottom-item-right left">
                                        <div class="quantum-bottom-item-right-title">Cosmopolitan Dining</div>
                                        <div class="quantum-bottom-item-right-content">
                                            A magnificent dining experience, a new world of culinary exploration, friendly and attentive service, 24 hours dining at sea!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="quantum-find-more" class="float">
                                <!--<a href="http://www.royalcaribbean.com/quantumoftheseas/quantum-experiences/">FIND OUT MORE</a>-->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <?php include 'pageRight.php'; ?>

			<div style="float:right;width:210px;margin:20px 30px 0 0;">
			<p style="font-size:16px;color:#195f9b;font-weight:bold;text-align:left;padding:0;margin:0 0 10px 0">SHIPS FROM THE QUANTUM CLASS</p>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=QN&br=R">QUANTUM OF THE SEAS <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=OV&br=R">OVATION OF THE SEAS <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a style="display:block;margin-bottom:5px;" href="http://www.royalcaribbean.com/findacruise/ships/class/ship/home.do?shipClassCode=QN&shipCode=AN&br=R">AUTHEM OF THE SEAS <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>

        </div>
    </div>
    <?php include 'pageFoot.php'; ?>
