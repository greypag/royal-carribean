﻿var o_channel = "";
var o_pagename = "";
function $print(s) {
    if (s == null || s == "") return;
    document.write(s);
}
function $import(path, type) {
    if (type == "css") {
        $print("<" + "link href=\"" + path + "\" rel=\"stylesheet\" type=\"text/css\"></" + "link>");
    } else {
        $print("<" + "script type=\"text/javascript\" src=\"" + path + "\"></" + "script>");
    }
}
function getAbsOffsetTop(obj) {
    var y = obj.offsetTop;
    while (obj = obj.offsetParent) y += obj.offsetTop;
    return y;
}

function getAbsOffsetLeft(obj) {
    var x = obj.offsetLeft;
    while (obj = obj.offsetParent) x += obj.offsetLeft;
    return x;
}

$import("../js/s_code.js", "js");
function getCookie(objName) {//获取指定名称的cookie的值
    var arrStr = document.cookie.split("; ");
    for (var i = 0; i < arrStr.length; i++) {
        var temp = arrStr[i].split("=");
        if (temp[0] == objName) return unescape(temp[1]);
    }
}
function RCCLHeader(bg, height) {
    /*$print('<script type="text/javascript">');
    $print('var _gaq = _gaq || [];');
    $print('_gaq.push(["_setAccount", "UA-11157213-1"]);');
    $print('_gaq.push(["_trackPageview"]);');
    $print('(function() {');
    $print('var ga = document.createElement("script"); ga.type ="text/javascript"; ga.async = true;');
    $print('ga.src = ("https:" == document.location.protocol ?"https://ssl" :"http://www/") + ".google-analytics.com/ga.js";');
    $print('var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);');
    $print('})();');
    $print('</script>');*/

    /*//$print('<script type="text/javascript" charset="UTF-8">');
    //$print('var _AvazuRunid = "NzgwaWVyX2ZnKzQ=";');
    //$print('var _AvazuRadvid = "MjA4MG1lX3QrNGlr";');
    //$print('(function () {');
    //$print('var avazu = document.createElement("script"); avazu.type ="text/javascript"; avazu.async = true;');
    //$print('avazu.src = "http://adserving.avazudsp.net/dspJS.js";');
    //$print('var avazujs = document.getElementsByTagName("script")[0]; avazujs.parentNode.insertBefore(avazu, avazujs);');
    //$print('})(); ');
    //$print('</script>');*/


    $print('<div class="top_box01">');
    $print('<div class="top_box02">');
    $print('<div class="top_box03">');
    $print('<div class="logo" style="z-index: 12;">');
    $print('<a href="index.php"><img src="../newimages/r_03.png" width="239" height="181" /></a></div>');
    $print('<div class="top_right">');
    $print('<div class="top_right02">');
    $print('<div class="kf">');
    $print('<b>');
    $print('<img src="../newimages/r_04.png" /></b><span><a href="OnlineCheckin.php">在线客服</a></span></div>');
    $print('<div class="yd">');
    $print('<b>');
    $print('<img src="../newimages/r_05.png" /></b><span>预订咨询热线：</span><i><img src="../newimages/r_07.png" /></i></div>');
    $print('<div class="kf">');
    $print('<b>');
    $print('<img src="../newimages/r_06.png" /></b><span><a href="http://www.royalcaribbean.com/" target="_blank">国际官网</a></span></div>');
    $print('</div>');
    $print('<div class="top_right03">');
	$print('<u><a id="login" href="contactUs.php">联系我们</a></u>');
    
	/*if (getCookie("global_user") != null && getCookie("global_user") != "") {
        $print('<span><u><a href="/interface/logout.ashx?t=' + new Date().getTime() + '">登出</a></u><u><a href="/myrccl.aspx">会员中心</a></u><u><a style="text-decoration:none;">欢迎您,' + getCookie("global_user") + '</a></u></span>');
    } else {*/
        $print('<span><a href="memregister.php">会员注册</a></span>');
		$print('<u><a id="login" href="#" onclick="location.href=\'unitememberlogin.php?back_url=' + location.href + '\'; return false;">会员登录</a></u>');
    //}
	
	$print('</div>');
    $print('<div class="menu">');
	$print('<ul class="dropdown">');

    $print('<li id="top_menu_02"><a href="javascript:;">Find A Ship</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_02"></ul>');
    $print('</li>');

    $print('<li id="top_menu_01"><a href="javascript:;">Plan A Cruise</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_01"></ul>');
    $print('</li>');
	
	$print('<li id="top_menu_03"><a href="javascript:;">All About Cruising</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_03"></ul>');
    $print('</li>');
	
	
	$print('<li id="top_menu_04"><a href="javascript:;">Before You Board</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_04"></ul>');
    $print('</li>');

    $print('<li id="top_menu_05"><a href="javascript:;">Crown & Anchor Society</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_05"></ul>');
    $print('</li>');

    $print('</ul>');


    $print('</div>');
	 /*$print('<div class="menu">');


    $print('<ul class="dropdown">');
    $print('<li id="top_menu_01"><a href="javascript:;">Find A Ship</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_01"></ul>');
    $print('</li>');

    $print('<li id="top_menu_02"><a href="javascript:;">Plan A Cruise</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_02"></ul>');
    $print('</li>');

    $print('<li id="top_menu_03"><a href="javascript:;">All About Cruising</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_03"></ul>');
    $print('</li>');

    $print('<li><a href="javascript:;" id="top_menu_04">Crown & Anchor Society</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_04"></ul>');
    $print('</li>');

    $print('<li><a href="javascript:;" id="top_menu_05">客服专区</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_05"></ul>');
    $print('</li>');
    $print('<li style="background:none;" id="top_menu_06"><a href="javascript:;">公司介绍</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_06"></ul>');
    $print('</li>');
    $print('</ul>');


    $print('</div>');*/
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('<div class="content">');

}
function RCCLFooter() {
    $print('<div class="bottom_box03">');
    $print('<div class="bottom_box04">');
    $print('<div class="bottom_box05">');
    $print('<div class=" copyright01" ></div>');
    // $print('<b>');
    // $print('<img src="../newimages/r_11.png" width="25" height="23" /></b><span>預訂服務</span></div>');
    $print('<div class="copyright02">');
//    $print('<div class="copyright03">');
//    $print('<span>網站預訂</span><u><a href="quickorder.php">立即預定</a></u></div>');
//    $print('<div class="copyright03">');
//    $print('<span>旅行社預訂</span><u><a href="travelAgency.php">查找旅行社</a></u></div>');
    $print('<div class="copyright04" style="width:650px;margin-left:120px;">');
    $print('');
    $print('<span><i><img src="../newimages/r_12.png" width="16" height="18" /></i>Booking Hotline：<b><div style="width:650px;font-size:16px; line-height:200%; color:#ffde00;"><strong>+852 3189 3200</strong> | <a href="mailto:enquiry@royalcaribbean.com.hk" style="color:#ffde00; text-decoration:none; font-weight:normal;">enquiry@royalcaribbean.com.hk</a></div></span></div>');
    $print('<div class="copyright05"  style="display:none;">');
    $print(' <div style="width: 80px; height: 84px; float: left;left:0px; position: absolute; top: 10px;">');
    $print('<img src="../newimages/r_14.png" width="80" height="84" border="0" usemap="#Map" />');
    $print('<map name="Map" id="Map">');
    $print('<area shape="rect" coords="2,4,77,63" href="../pdf/2013VacationBooklet.pdf"  target="_blank" />');
    $print('</map>');
    $print('</div>');
    $print('<div class="copyright06">');
    $print('<img src="../newimages/r_15.jpg" width="74" height="58" /></div>');
    $print('<div class="copyright07">');
    $print('<ul>');
    $print('<li><i><a href="#">');
    $print('<img src="../newimages/r_16.jpg" width="18" height="23" /></a></i><span><a  target="_blank" href="../pdf/2013VacationBooklet.pdf">皇家加勒比遊輪<br />');
    $print('2013年度假手册</a></span></li>');
    /*$print('<li><i><a href="#">');
    $print('<img src="newimages/r_16.jpg" width="18" height="23" /></a></i><span><a href="#">海洋水手号<br />');
    $print('2013年手册</a></span></li>');*/
    $print('</ul>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
	$print('<div style="width:100%; background:#fff">');
    $print('<div id="seo_footer">');
    $print('</div>');
    $print('<div id="global_footer">');
		$print('<!--Footer-->');
		
		$print('<div id="footer_menu">');
		$print('<ul style="width: 890px;margin: 0 auto;overflow: hidden;">');
		
			$print('<li id="footer_menu_01">Plan A Cruise');
				$print('<ul class="sub_menu" id="footer_sub_menu_01">');
					$print('<li><a style="position: relative;" href="result.php">Plan A Cruise</a></li>');	
					$print('<li><a style="position: relative;" href="shoreExcursions.php">Shore Excursions</a></li>');
					$print('<li><a style="position: relative;" href="departure-port-hong-kong.php">Asia Ports of Departure</a></li>');
                    $print('<li><a style="position: relative;" href="top-10-destinations.php">Top 10 Destinations</a></li>');
				$print('</ul>');
			$print('</li>');	
		
			$print('<li id="footer_menu_02">Find a Ship');
				$print('<ul class="sub_menu" id="footer_sub_menu_02">');
					$print('<li><a style="position: relative;" href="voyager.php">Voyager of the Seas</a></li>');
                    $print('<li><a style="position: relative;" href="quantum.php">Quantum of the Seas</a></li>');
                    $print('<li><a style="position: relative;" href="royal-fleet.php">Royal Fleet</a></li>');
				$print('</ul>');
			$print('</li>');	

            $print('<li id="footer_menu_03">Get Royal Deals');
                $print('<ul class="sub_menu" id="footer_sub_menu_03">');
                    $print('<li><a style="position: relative;" href="get-royal-deals.php">Get Royal Deals</a></li>');
                $print('</ul>');
            $print('</li>');
		
			$print('<li id="footer_menu_04">All About Cruising');
				$print('<ul class="sub_menu" id="footer_sub_menu_04">');
					$print('<li><a style="position: relative;" href="dreams.php">WOW Channel</a></li>');
					$print('<li><a style="position: relative;" href="stay-connected.php">Stay Connected</a></li>')
					$print('<li><a style="position: relative;" href="cabin.php">Staterooms</a></li>');
					$print('<li><a style="position: relative;" href="food.php">Wine & Dine</a></li>');
					$print('<li><a style="position: relative;" href="entertainment.php">Entertainment</a></li>');
                    $print('<li><a style="position: relative;" href="sports.php">Sports</a></li>');
					$print('<li><a style="position: relative;" href="parentChild.php">Family</a></li>');
					//$print('<li><a style="position: relative;" href="shopping2.php">免税购物</a></li>');
					$print('<li><a style="position: relative;" href="mice.php">MICE</a></li>');
					$print('<li><a style="position: relative;" href="passion.php">Passion</a></li>')
				$print('</ul>');
			$print('</li>');
		
			$print('<li id="footer_menu_05">Before You Board');
				$print('<ul class="sub_menu" id="footer_sub_menu_05">');
					$print('<li><a style="position: relative;" href="notice.php">Before You Board</a></li>');
					$print('<li><a style="position: relative;" href="port-information.php">Port Information</a></li>');
					$print('<li><a style="position: relative;" href="qa.php">FAQ</a></li>');
					$print('<li><a style="position: relative;" href="terms-conditions.php">Terms & Conditions</a></li>');
				$print('</ul>');
			$print('</li>');   
	   
			$print('<li id="footer_menu_06">Crown & Anchor Society');
				$print('<ul class="sub_menu" id="footer_sub_menu_06">');
					$print('<li><a style="position: relative;" href="crown-and-anchor-society-about.php">About the Program</a></li>');
					$print('<li><a style="position: relative;" href="crown-and-anchor-society-benefits.php">Member Benefits</a></li>');
				$print('</ul>');
			$print('</li>');
		 
		$print('</ul>'); 
		$print('</div>');
		
		$print('<div class="clear">');
		$print('</div>');
    $print('</div>');
	/*
    $print('<div style="color: #888; width: 980px; margin: 0 auto; padding-left: 65px; line-height: 18px;">船只关键词：<a style="color: #888;" href="voyager.php">海洋航行者号</a> ');
	$print('| 航线关键词：<a style="color: #888;" href="shanghaiyoulun.php">上海游轮</a> ');
    $print('<a style="color: #888;" href="tianjinyoulun.php">天津游轮</a> ');
	$print('<a style="color: #888;" href="rihanyoulun.php">日韩游轮航线</a><br>');
    $print('热门关键字：<a style="color: #888;" href="index.html">邮轮</a> ');
	$print('<a style="color: #888;" href="index.html">豪华游轮</a> ');
	$print('<a style="color: #888;" href="index.html">邮轮旅游</a> ');
	$print('<a style="color: #888;" href="index.html">豪华邮轮</a> ');
	$print('<a style="color: #888;" href="index.html">游轮旅游</a> ');
	$print('<a href="http://fullbaobao.xd55.cn/"></a> ');
	$print('<a style="color: #888;" href="index.html">游轮旅行</a> ');
	$print('<a style="color: #888;" href="MyAlbum.php">游轮图片</a> ');
	$print('<a style="color: #888;" href="index.html">皇家加勒比国际游轮</a> ');
	$print('<a style="color: #888;" href="TravelsList.php">邮轮旅游攻略</a> ');
	$print('<a style="color: #888;" href="TravelsList.php">游轮旅游线路</a> ');
	$print('<a style="color: #888;" href="TravelsList.php">邮轮航线</a> ');
	$print('<a style="color: #888;" href="Result.php">游轮预订</a>');
    $print('</div>');
	*/
	$print('<div id="footer_wrap" style="height: 80px; color: #888; width: 980px; margin: auto; line-height: 15px;padding-top: 5px; padding-left: 5px;">');
	$print('<div style="float: left; width: 100%;">');
	$print('<div style="float: left; width: 181px; height: 58px; margin: 5px 15px 0 0"><img src="../newimages/img_bottom_logo.png"/></div><div style="float: left; height: 58px; margin: 24px 0 0 0;"><img src="../newimages/header/rccl-crest.png"/><span style="line-height: 28px;font-weight: normal;font-family: arial;color: #000000;margin-left: 7px;">Copyright © 2014 Royal Caribbean International Limited. All right reserved.</span></div>');
    $print('<div style="float: right; height: 58px; margin: 16px 15px 0 0;font-weight: normal;font-family: arial;color: #3d94cb;"><a href="privacypolicy.php" style="color: #3d94cb;font-weight: normal;line-height: 45px;">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="copyrights.php" style="color: #3d94cb;font-weight: normal;">Copyrights</a><a href="http://www.azamaraclubcruises.com" target="_blank" style="margin-left: 15px;"><img src="../newimages/footer/AZA_Logo.png"/></a></div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
	$print('</div>');
    writeMainMenu();
}
function RCCLFooterSEO() {
    //empty
}