<?php $pageName = "quantum"; ?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<?php include 'pageHead.php'; ?>
<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;">

    <div style='height:92px; width:962px; margin:auto; position:relative' >
        <?php include 'pageMenu.php'; ?>

        <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇家遊輪船隊 &gt; <a href="quantum.php">海洋量子號</a>
        </div>
    </div>

    <div class="page_contentbox" style='width:962px'>
        <!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
        <div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 962px; height: 365px;">
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
                        <li class="wider-190"><a href="quantum.php">海洋量子號</a></li>
                        <li class="page_hover">影片廊</li>
                    </ul>
                    <div style="position:relative; float:left; width:640px; left:30px; top:10px;min-height:800px;">

                        <p>&nbsp;</p>

                        <!-- Smartship - Innovation -->
                        <iframe width="620" height="349" src="//www.youtube.com/embed/HhszvKlblWM?rel=0" frameborder="0" allowfullscreen></iframe>

                        <p>&nbsp;</p>

                        <!-- Smartship - Gourmet -->
                        <iframe width="620" height="349" src="//www.youtube.com/embed/5cF9nlVQq5c?rel=0" frameborder="0" allowfullscreen></iframe>

                        <p>&nbsp;</p>

                        <!-- Smartship - Luxury -->
                        <iframe width="620" height="349" src="//www.youtube.com/embed/zZgRLRmqZ6g?rel=0" frameborder="0" allowfullscreen></iframe>

                        <p>&nbsp;</p>

                    </div>
                </div>

            </div>
            <?php include 'pageRight.php'; ?>
        </div>
    </div>
    <?php include 'pageFoot.php'; ?>

