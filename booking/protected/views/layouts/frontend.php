<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/select/dist/css/select2.min.css">
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/scrollbar/css/perfect-scrollbar.min.css">-->

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.11.2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/select/dist/js/select2.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/scrollbar/jquery.slimscroll.min.js"></script>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/main.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>


    </head>

    <body>
        <div style="height:92px; width:962px; margin:auto; position:relative">

            <div style="display: block; width: 600px; height: 75px; position: absolute; margin-top:15px; margin-left:-4px; z-index:50;">
                <a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('index.php'); ?>" title="Royal Caribbean International"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/logo.png"/></a></div>

            <div class="toolsContainer">
                <!--
                <a href="<?php echo Yii::app()->request->requestUri; ?>&language=en" title="English Version"><span>ENGLISH</span></a>&nbsp;|&nbsp;
                <a href="<?php echo Yii::app()->request->requestUri; ?>&language=zh_tw" title="中文版"><span>中文</span></a><br/><br/>
                -->
                <?php $this->widget('ext.LangPick.ELangPick', array()); ?>
                <span style="line-height: 23px;">
                    <a href="https://www.facebook.com/RoyalCaribbeanHongKong" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/header/icon_facebook.png" alt="" title=""/></a>&nbsp;|&nbsp;<a href="/en/contact.php" title="CONTACT U">Contact Us</a>
                </span>
            </div>

        </div>
        <div style="height:15px; width:962px;position:relative; margin:auto;"></div>
        <div style='<?php echo (!empty($thispage) && $thispage == "enquiry") ? "height:66px" : "height:102px" ?>; width:962px; position: relative; margin:auto; background: #fff url(<?php echo Yii::app()->request->baseUrl; ?>/images/header/bg_breadcrumb.png) left bottom repeat-x' >

            <div class='mainMenu' style="z-index:999999;">
                <ul>
                    <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('index.php'); ?>" title="Royal Caribbean International" >HOME</a></li>
                    <li>
                        <a>PLAN A CRUISE</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/result.php'); ?>">Plan a Cruise</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/shoreExcursions.php'); ?>">Shore Excursions</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/departure-port-hong-kong.php'); ?>">Asia Ports of Departure</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/top-10-destinations.php'); ?>">Top 10 Destinations</a></li>
                        </ul>

                    </li>
                    <li>
                        <a>FIND A SHIP</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/voyager.php'); ?>">Voyager of the Seas</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/quantum.php'); ?>">Quantum of the Seas</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/royal-fleet.php'); ?>">Royal Fleet</a></li>
                        </ul>
                    </li>
                    <li class="col2">
                        <a>GET ROYAL DEALS</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/get-royal-deals.php'); ?>">Selected Sailing</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/promotions.php'); ?>">Promotions</a></li>                  
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/royal-deals.php'); ?>">Sign Up Now</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>ALL ABOUT CRUISING</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/dreams.php'); ?>">WOW Channel</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/cabin.php'); ?>">Staterooms</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/food.php'); ?>">Wine & Dine</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/entertainment.php'); ?>">Entertainment</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/sports.php'); ?>">Sports</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/parentChild.php'); ?>">Family</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/mice.php'); ?>">MICE</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/passion.php'); ?>">Passion</a></li>
                        </ul>
                    </li>
                    <li class="col4">
                        <a>BEFORE YOU BOARD</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/notice.php'); ?>">Before you Board</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/qa.php'); ?>">FAQ</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/departure-port-hong-kong.php'); ?>" >Hong Kong Port of Departure</a></li>
                        </ul>
                    </li>
                    <li class="col5">
                        <a>CROWN AND <br/>ANCHOR SOCIETY</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/crown-and-anchor-society-about.php'); ?>">About the Program</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/crown-and-anchor-society-benefits.php'); ?>">Member Benefits</a></li>
                        </ul>
                    </li>

                    <li style="display:none;">
                        <a>CROWN & ANCHOR SOCIETY</a>
                        <ul>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/memclub.php'); ?>">About CAS</a></li>
                            <li><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/member.php'); ?>">Become a Member</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/index.php'); ?>">Home</a> &gt; <a href="#">Booking</a>
            </div>
        </div>

        <div class="page_contentbox" style='width:962px'>
            <div style="width:962px; float:left; position:relative; background: #fff url(<?php echo Yii::app()->request->baseUrl; ?>/images/get-royal-deals/get-royal-deals-banner.jpg) no-repeat;">

                <div style="margin-top:250px;" class="inner">
                    <div class="main-container" style="height:auto; background-repeat:no-repeat; ">

                        <?php
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="bottom_box03">
            <div class="bottom_box04">
                <div class="bottom_box05">
                    <div class=" copyright01">

                    </div>

                    <div class="copyright02">
                        <div class="copyright04" style="width:650px;margin-left:120px;">
                            <span>
                                <i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/r_12.png" width="16" height="18"></i>
                                Booking Hotline：<b>
                                    <div style="width:650px;font-size:16px; line-height:200%; color:#ffde00;">
                                        <strong>+852 3189 3200</strong> | <a href="mailto:enquiry@royalcaribbean.com.hk" style="color:#ffde00; text-decoration:none; font-weight:normal;">enquiry@royalcaribbean.com.hk</a>
                                    </div></b></span></div><div class="copyright05" style="display:none;">

                            <b>
                                <div style="width: 80px; height: 84px; float: left;left:0px; position: absolute; top: 10px;">

                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/r_14.png" width="80" height="84" border="0" usemap="#Map">
                                    <map name="Map" id="Map"><area shape="rect" coords="2,4,77,63" href="../pdf/2013VacationBooklet.pdf" target="_blank"></map>
                                </div>

                                <div class="copyright06"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/r_15.jpg" width="74" height="58"></div>
                                <div class="copyright07">
                                    <ul>
                                        <li>
                                            <i><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/r_16.jpg" width="18" height="23"></a></i>
                                            <span><a target="_blank" href="../pdf/2013VacationBooklet.pdf">皇家加勒比遊輪<br>2013年度假手册</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </b>
                        </div>
                    </div>
                </div>

                <div style="width:100%; background:#fff">
                    <div id="seo_footer"></div>
                    <div id="global_footer">

                        <!--Footer-->
                        <div id="footer_menu">
                            <ul style="width: 890px;margin: 0 auto;overflow: hidden;">
                                <li id="footer_menu_01">
                                    <b>Plan A Cruise
                                        <ul class="sub_menu" id="footer_sub_menu_01">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/result.php'); ?>">Plan A Cruise</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/shoreExcursions.php'); ?>">Shore Excursions</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/departure-port-hong-kong.php'); ?>">Asia Ports of Departure</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/top-10-destinations.php'); ?>">Top 10 Destinations</a></li>
                                        </ul>
                                    </b>
                                </li>

                                <li id="footer_menu_02">
                                    <b>Find a Ship
                                        <ul class="sub_menu" id="footer_sub_menu_02">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/voyager.php'); ?>">Voyager of the Seas</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/quantum.php'); ?>">Quantum of the Seas</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/royal-fleet.php'); ?>">Royal Fleet</a></li>
                                        </ul>
                                    </b>
                                </li>

                                <li id="footer_menu_03">
                                    <b>Get Royal Deals<ul class="sub_menu" id="footer_sub_menu_03">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/royal-deals.php'); ?>">Get Royal Deals</a></li>
                                        </ul>
                                    </b>
                                </li>

                                <li id="footer_menu_04"><b>All About Cruising
                                        <ul class="sub_menu" id="footer_sub_menu_04">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/dreams.php'); ?>">WOW Channel</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/cabin.php'); ?>">Staterooms</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/food.php'); ?>">Wine &amp; Dine</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/entertainment.php'); ?>">Entertainment</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/sports.php'); ?>">Sports</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/parentChild.php'); ?>">Family</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/mice.php'); ?>">MICE</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/passion.php'); ?>">Passion</a></li>
                                        </ul>
                                    </b>
                                </li>

                                <li id="footer_menu_05">
                                    <b>Before You Board
                                        <ul class="sub_menu" id="footer_sub_menu_05">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/notice.php'); ?>">Before You Board</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/qa.php'); ?>">FAQ</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/departure-port-hong-kong.php'); ?>">Hong Kong Port of Departure</a></li>
                                        </ul>
                                    </b>

                                </li>

                                <li id="footer_menu_06">
                                    <b>Crown &amp; Anchor Society
                                        <ul class="sub_menu" id="footer_sub_menu_06">
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/crown-and-anchor-society-about.php'); ?>">About the Program</a></li>
                                            <li><a style="position: relative;" href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/crown-and-anchor-society-benefits.php'); ?>">Member Benefits</a></li>
                                        </ul>
                                    </b>
                                </li>
                            </ul>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div id="footer_wrap" style="height: 80px; color: #888; width: 980px; margin: auto; line-height: 15px;padding-top: 5px; padding-left: 5px;">
                        <div style="float: left; width: 100%;">
                            <div style="float: left; width: 181px; height: 58px; margin: 5px 15px 0 0">
                                <b><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img_bottom_logo.png"></b></div>
                            <div style="float: left; height: 58px; margin: 24px 0 0 0;">
                                <b><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/header/rccl-crest.png">
                                    <span style="line-height: 28px;font-weight: normal;font-family: arial;color: #000000;margin-left: 7px;">Copyright © 2014 Royal Caribbean International Limited. All right reserved.</span></b>
                            </div>

                            <div style="float: right; height: 58px; margin: 16px 15px 0 0;font-weight: normal;font-family: arial;color: #3d94cb;">
                                <b>
                                    <a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/privacypolicy.php'); ?>" style="color: #3d94cb;font-weight: normal;line-height: 45px;">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="<?php Yii::app()->royalCaribbeanHelper->echoBooking_menu_link('en/copyrights.php'); ?>" style="color: #3d94cb;font-weight: normal;">Copyrights</a>
                                    <a href="http://www.azamaraclubcruises.com" target="_blank" style="margin-left: 15px;">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/AZA_Logo.png"></a>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5JP44D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5JP44D');</script>
<!-- End Google Tag Manager -->
    </body>
</html>
