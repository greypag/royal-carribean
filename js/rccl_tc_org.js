var o_channel = "";
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

$import("js/s_code.js", "js");
function getCookie(objName) {//获取指定名称的cookie的值
    var arrStr = document.cookie.split("; ");
    for (var i = 0; i < arrStr.length; i++) {
        var temp = arrStr[i].split("=");
        if (temp[0] == objName) return unescape(temp[1]);
    }
}
function RCCLHeader(bg, height) {
    $print('<script type="text/javascript">');
    $print('var _gaq = _gaq || [];');
    $print('_gaq.push(["_setAccount", "UA-11157213-1"]);');
    $print('_gaq.push(["_trackPageview"]);');
    $print('(function() {');
    $print('var ga = document.createElement("script"); ga.type ="text/javascript"; ga.async = true;');
    $print('ga.src = ("https:" == document.location.protocol ?"https://ssl" :"http://www/") + ".google-analytics.com/ga.js";');
    $print('var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);');
    $print('})();');
    $print('</script>');

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
    $print('<a href="../index.php"><img src="../newimages/r_03.png" width="239" height="181" /></a></div>');
    $print('<div class="top_right">');
    $print('<div class="top_right02">');
    $print('<div class="kf">');
    $print('<b>');
    $print('<img src="../newimages/r_04.png" /></b><span><a href="../OnlineCheckin.php">在线客服</a></span></div>');
    $print('<div class="yd">');
    $print('<b>');
    $print('<img src="../newimages/r_05.png" /></b><span>预订咨询热线：</span><i><img src="../newimages/r_07.png" /></i></div>');
    $print('<div class="kf">');
    $print('<b>');
    $print('<img src="../newimages/r_06.png" /></b><span><a href="http://www.royalcaribbean.com/" target="_blank">国际官网</a></span></div>');
    $print('</div>');
    $print('<div class="top_right03">');
    if (getCookie("global_user") != null && getCookie("global_user") != "") {
        $print('<span><u><a href="../interface/logout.ashx?t=' + new Date().getTime() + '">登出</a></u><u><a href="../myrccl.php">会员中心</a></u><u><a style="text-decoration:none;">欢迎您,' + getCookie("global_user") + '</a></u></span></div>');
    } else {
        $print('<span><a href="../memregister.php">免费注册</a></span><u><a id="login" href="#" onclick="location.href=\'../unitememberlogin.php?back_url=' + location.href + '\'; return false;">会员登录</a></u></div>');
    }

    $print('<div class="menu">');
	$print('<ul class="dropdown">');
    
	/*$print('<li id="top_menu_01"><a href="javascript:;">皇家游轮船队</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_01"></ul>');
    $print('</li>');

    $print('<li id="top_menu_02"><a href="javascript:;">航线行程</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_02"></ul>');
    $print('</li>');

    $print('<li id="top_menu_03"><a href="javascript:;">游轮体验</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_03"></ul>');
    $print('</li>');

    $print('<li><a href="javascript:;" id="top_menu_04">皇冠金锚俱乐部</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_04"></ul>');
    $print('</li>');

    $print('<li><a href="javascript:;" id="top_menu_05">客服专区</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_05"></ul>');
    $print('</li>');
    $print('<li style="background:none;" id="top_menu_06"><a href="javascript:;">公司介绍</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_06"></ul>');
    $print('</li>');*/
	
	 $print('<li id="top_menu_02"><a href="javascript:;">航线行程</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_01"></ul>');
    $print('</li>');
	
    $print('<li id="top_menu_01"><a href="javascript:;">皇家游轮船队</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_02"></ul>');
    $print('</li>');
	
	$print('<li id="top_menu_03"><a href="javascript:;">游轮体验</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_03"></ul>');
    $print('</li>');
	
	
	$print('<li id="top_menu_03"><a href="javascript:;">行前须知</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_04"></ul>');
    $print('</li>');

    $print('<li><a href="javascript:;" id="top_menu_05">皇冠金锚俱乐部</a>');
    $print('<ul class="sub_menu" id="top_sub_menu_05"></ul>');
    $print('</li>');
	
	
    $print('</ul>');
	$print('</div>');
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
    $print('<div class=" copyright01">');
    $print('<b>');
    $print('<img src="../newimages/r_11.png" width="25" height="23" /></b><span>预订服务</span></div>');
    $print('<div class="copyright02">');
    $print('<div class="copyright03">');
    $print('<span>网站预订</span><u><a href="../quickorder.php">立即预定</a></u></div>');
    $print('<div class="copyright03">');
    $print('<span>旅行社预订</span><u><a href="../TravelAgency.php">查找旅行社</a></u></div>');
    $print('<div class="copyright04">');
    $print('<i>');
    $print('<img src="../newimages/r_12.jpg" width="16" height="18" /></i><span>预订咨询热线：</span><b><img src="../newimages/r_13.jpg" width="239" height="28" /></b></div>');
    $print('<div class="copyright05">');
    $print(' <div style="width: 80px; height: 84px; float: left;left:0px; position: absolute; top: 10px;">');
    $print('<img src="../newimages/r_14.png" width="80" height="84" border="0" usemap="#Map" />');
    $print('<map name="Map" id="Map">');
    $print('<area shape="rect" coords="2,4,77,63" href="../pdf/2013%c3%a5%c2%b9%c2%b4%c3%a5%c2%ba%c2%a6%c3%a5%c2%81%c2%87%c3%a6%c2%89%c2%8b%c3%a5%c2%86%c2%8c.html" />');
    $print('</map>');
    $print('</div>');
    $print('<div class="copyright06">');
    $print('<img src="../newimages/r_15.jpg" width="74" height="58" /></div>');
    $print('<div class="copyright07">');
    $print('<ul>');
    $print('<li><i><a href="#">');
    $print('<img src="../newimages/r_16.jpg" width="18" height="23" /></a></i><span><a href="../pdf/2013%c3%a5%c2%b9%c2%b4%c3%a5%c2%ba%c2%a6%c3%a5%c2%81%c2%87%c3%a6%c2%89%c2%8b%c3%a5%c2%86%c2%8c.html">皇家加勒比游轮<br />');
    $print('2013年度假手册</a></span></li>');
    /*$print('<li><i><a href="#">');
    $print('<img src="/newimages/r_16.jpg" width="18" height="23" /></a></i><span><a href="#">海洋水手号<br />');
    $print('2013年手册</a></span></li>');*/
    $print('</ul>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    $print('<div id="seo_footer">');
    $print('<h1>');
    $print('<span style="color: #ff9600;">*</span> 豪华游轮旅行尽在皇家加勒比国际游轮');
    $print('</h1>');
    $print('<span style="color: #ff9600;">*</span> 皇家加勒比国际游轮带您畅游全世界，航线遍及亚洲、欧洲、美国、阿拉斯加及地中海的秀丽风光，享受惬意的海上假期。<br>');
    $print('<span style="color: #ff9600;">*</span>“大有可玩”的海洋航行者，以中国为母港，从上海、天津启航，让中国游客不出国门就能享受国际游轮假期。');
    $print('</div>');
    $print('<div id="global_footer">');
    $print('<!--Footer-->');
    $print('<div id="footer_menu">');
    $print('<ul>');
    $print('<li id="footer_menu_01">皇家加勒比游轮船队');
    $print('<ul class="sub_menu" id="footer_sub_menu_01">');
    $print('<li><a style="position: relative;" href="../voyager.php">海洋航行者号</a></li><li><a style="position: relative;" href="../mariner.php">');
    $print('海洋水手号</a></li><li><a style="position: relative;" href="../Fleet.php">全球船队介绍</a></li></ul>');
    $print('</li>');
    $print('<li id="footer_menu_02">航线行程');
    $print('<ul class="sub_menu" id="footer_sub_menu_02">');
    $print('<li><a style="position: relative;" href="../AllInfo.php">行程列表</a></li><li><a style="position: relative;"');
    $print(' href="../shoreExcursions.php">岸上观光</a></li><li><a style="position: relative;" href="../Travel.php?t=0">');
    $print('亚洲出发</a></li><li><a style="position: relative;" href="../overseas/index.html">全球十大航线</a></li><li>');
    $print('<a style="position: relative;" href="../TravelAgency.php">旅行社信息</a></li><li><a style="position: relative;"');
    $print(' href="../portinfo.php">出发港信息</a></li></ul>');
    $print('</li>');
    $print('<li id="footer_menu_03">游轮体验');
    $print('<ul class="sub_menu" id="footer_sub_menu_03">');
    $print('<li><a style="position: relative;" href="../Dreams.php">梦想频道</a></li><li><a style="position: relative;" href="../cabin.php">豪华客房</a></li><li><a style="position: relative;"');
    $print(' href="../food4.php">寰宇美食</a></li><li><a style="position: relative;" href="../dwa2.php">');
    $print('玩趣娱乐</a></li><li><a style="position: relative;" href="../parentchild.php">亲子乐园</a></li><li>');
    $print('<a style="position: relative; display:none;" href="../celebration.php">婚礼蜜月</a></li><li><a style="position: relative;"');
    $print(' href="../shopping2.php">免税购物</a></li><li><a style="position: relative;" href="../mice/index.html">');
    $print('商务会奖</a></li><li><a style="position: relative;" href="../experience/index.html">游轮体验分享</a></li></ul>');
    $print('<li id="footer_menu_04">皇冠铁锚俱乐部');
    $print('<ul class="sub_menu" id="footer_sub_menu_04">');
    $print('<li><a style="position: relative;" href="../memclub.php">关于俱乐部</a></li><li><a style="position: relative;"');
    $print(' href="../membenifit.php">会员权益</a></li><li><a style="position: relative;" href="../luckydraw.php">');
    $print('会员活动</a></li><li><a style="position: relative;" href="../memregister.php">客户注册</a></li></ul>');
    $print('</li>');
    $print('<li id="footer_menu_05">客服专区');
    $print('<ul class="sub_menu" id="footer_sub_menu_05">');
    $print('<li><a style="position: relative;" href="../Notice.php">行前须知</a></li><li><a style="position: relative;"');
    $print(' href="../QA.php">常见问题</a></li><li><a style="position: relative;" href="../OnlineCheckin.php">');
    $print('在线Check-in</a></li><li><a '); //onclick="window.open(\"http://chat16.live800.com/live800/chatClient/chatbox.jsp?companyID=118734&amp;jid=3568248520&amp;enterurl=http://www.rcclchina.com.cn/&amp;tm=1274867316053\", \"chatbox105517\",  \"toolbar=0,scrollbars=0,location=0,menubar=0,resizable=1,width=570,height=424\");return false;"
    $print(' href="#">在线客服</a></li></ul>');
    $print('</li>');
    $print('<li id="footer_menu_06">公司介绍');
    $print('<ul class="sub_menu" id="footer_sub_menu_06">');
    $print('<li><a style="position: relative;" href="../AboutUs.php">关于我们</a></li><li><a style="position: relative;"');
    $print('href="../newscenter">新闻中心</a></li><li><a style="position: relative;" href="../notify.php">通知中心</a></li><li><a style="position: relative;" href="../zhaopin.php">');
    $print('公司招聘</a></li><li><a style="position: relative;" href="../shiboardjob.php">');
    $print(' 游轮招聘</a></li><li><a style="position: relative;" href="../Honor.php">荣誉奖项</a></li><li>');
    $print('<a style="position: relative;" href="../ContactUs.php">联系我们</a></li><li><a style="position: relative;"');
    $print(' href="../Safety.php">安全和保障</a></li></ul>');
    $print('</li>');
    $print('</ul>');
    $print('</div>');
    $print('<div class="clear">');
    $print('</div>');
    $print('</div>');
    $print('<div style="color: #888; width: 980px; margin: 0 auto; padding-left: 65px; line-height: 18px;">');
    $print('船只关键词：<a style="color: #888;" href="../voyager.php">海洋航行者号</a> <a style="color: #888;"');
    $print('href="../voyager.php">航行者号</a> | 航线关键词：<a style="color: #888;" href="../shanghaiyoulun.php">上海游轮</a>');
    $print('<a style="color: #888;" href="../tianjinyoulun.php">天津游轮</a> <a style="color: #888;"');
    $print(' href="../rihanyoulun.php">日韩游轮航线</a><br>');
    $print('热门关键字：<a style="color: #888;" href="index.html">邮轮</a> <a style="color: #888;"');
    $print(' href="index.html">豪华游轮</a> <a style="color: #888;" href="index.html">邮轮旅游</a> <a style="color: #888;"');
    $print(' href="index.html">豪华邮轮</a> <a style="color: #888;" href="index.html">游轮旅游</a><a href="http://fullbaobao.xd55.cn/"></a>');
    $print(' <a style="color: #888;" href="index.html">游轮旅行</a> <a style="color: #888;" href="../MyAlbum.php">');
    $print('游轮图片</a> <a style="color: #888;" href="index.html">皇家加勒比国际游轮</a> <a style="color: #888;" href="../TravelsList.php">');
    $print('邮轮旅游攻略</a> <a style="color: #888;" href="../TravelsList.php">游轮旅游线路</a> <a style="color: #888;"');
    $print(' href="../TravelsList.php">邮轮航线</a> <a style="color: #888;" href="../Result.php">游轮预订</a>');
    $print('</div>');
    $print('<div style="height: 80px; color: #888; width: 980px; margin: auto; line-height: 25px;padding-top: 20px; padding-left: 65px;">');
    $print('<div style="float: left; width: 600px;">');
    $print('<div style="color: #888; line-height: 20px; height: 20px;">');
    $print('皇家加勒比游轮船务（中国）有限公司版权所有 | <a style="color: #888;" target="_blank" href="http://www.miibeian.gov.cn/publish/query/indexFirst.action">');
    $print('沪ICP备09065404号</a></div>');
    $print('<div style="color: #888; line-height: 20px; height: 20px;">');
    $print('<a style="color: #888;" href="../aboutus.php">公司简介</a>&nbsp;|&nbsp;<a style="color: #888;"');
    $print(' href="../agencyinfo.php">合作伙伴</a>&nbsp;|&nbsp;<a style="color: #888;" href="http://www.royalcareersatsea.com/">游轮招聘</a>&nbsp;|&nbsp;<a');
    $print(' style="color: #888;" href="../qa.php">常见问题解答</a>&nbsp;|&nbsp;<a style="color: #888;"');
    $print(' href="http://www.royalcaribbean.com/legal.do">法律与隐私声明</a>&nbsp;|&nbsp;<a style="color: #888;"');
    $print(' href="../billofrights.php">邮轮业乘客权利法案</a></div>');
    $print('</div>');
    $print('<div style="float: right; width: 181px; height: 58px; margin: 5px 59px 0 0">');
    $print('<img src="../newimages/r_18.jpg" width="181" height="58" /></div>');
    $print('</div>');
    $print('</div>');
    $print('</div>');
    writeMainMenu();
}
function RCCLFooterSEO() {
    //empty
}