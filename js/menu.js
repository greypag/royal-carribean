var current_row = 0;
var current_col = 0;
var arrMenuId = ["top_sub_menu_01", "top_sub_menu_02", "top_sub_menu_03", "top_sub_menu_04", "top_sub_menu_05"];
var arrFooterMenuId = ["footer_sub_menu_01", "footer_sub_menu_02", "footer_sub_menu_03", "footer_sub_menu_04", "footer_sub_menu_05"];

var arrWidth = [175, 137, 147, 200, 141, 144];

var arrSubMenuConfig = [
	[
			["itinerary_list", "航线行程", "result.php", "1", "2"],
			["shoreExcursions", "岸上观光", "shoreExcursions.php", "1", "3"],
			["asia_departure", "亚洲出发", "rccl_xjp.php", "1", "4"],
			["overseas_departure", "十大航线", "overseas.php", "1", "5"],
			["travelAgency", "旅行社预订", "travelAgency.php", "1", "6"]
	],
	[
            ["voyager_of_the_seas", "海洋航行者号", "voyager.php", "2", "1"]
	],	
	[
			["dreams", "梦想频道", "dreams.php", "3", "1"],
            ["carbin", "豪华客房", "cabin.php", "3", "2"],
			["food", "寰宇美食", "food4.php", "3", "3"],
			["dwa", "玩趣娱乐", "dwa2.php", "3", "4"],
			["parentChild", "亲子乐园", "parentChild.php", "3", "5"],
			["shopping", "免税购物", "shopping2.php", "3", "6"],
			["mice", "商务会奖", "mice.php", "3", "7"],
			["experience", "游轮体验中心", "experience.php", "3", "8"]

	],
	[
			["notice", "行前须知", "notice.php", "4", "1"],
			["qa", "常见问题", "qa.php", "4", "2"]
	],
	[
			["memclub", "关于俱乐部", "memclub.php", "5", "1"]
	]
];



var arrTrdMenuConfig = [
	/*[
		["sea_life", "honeymoon", "婚礼蜜月", "/LangManWenXin.aspx", "1"],
		["sea_life", "older", "夕阳无限", "/XiYangWuXian.aspx", "2"],
		["sea_life", "teen", "青少年活动", "/TianLunZhiLe.aspx", "3"]
	],
	[
		["royal_e", "dreamworks", "梦工厂之旅", "/dwa/", "1"],
		["royal_e", "casino", "皇家娱乐体验", "/BuQiErYu.aspx", "3"]
	],
	[
		["food_service", "wine", "拉菲美酒体验", "/lafite.aspx", "1"],
		["food_service", "multi_r", "中西餐饮", "/maindining.aspx", "2"],
		["food_service", "beer_festival", "盛夏啤酒节", "/beer_festival.aspx", "3"]
	]*/
];

function mapMenuID(menuName) {
    if (menuName == "fleet") {
        return 1;
    }
    if (menuName == "journey") {
        return 2;
    }
    if (menuName == "experience") {
        return 3;
    }
    if (menuName == "member") {
        return 4;
    }
    if (menuName == "customer_support") {
        return 5;
    }
    if (menuName == "about_us") {
        return 6;
    }
}

var o_channels = ["home", "rccl_ships", "itinerary", "onboard_experience", "member_forum", "customer_support", "crown_and_anchor_society", "rccl_introduce"];
//生成二级菜单的
function buildSubMenu(menuId, subMenuId, name, href, pnav, snav) {
    var subMenuListEl = document.createElement("li");
    subMenuListEl.setAttribute("id", subMenuId);
    subMenuListEl.innerHTML = getSubMenuRef(name, href);
    var menu = document.getElementById(menuId);
    if (menu != null)
        menu.appendChild(subMenuListEl);
    if (pnav == current_row && snav == current_col) {
        //Highlight this element
        if (o_pagename == null)
            var o_pagename = subMenuId;
        //subMenuListEl.style.background = '#AFA177';
    }
}
//生成三级菜单的
function buildTrdMenu() {
    for (var i = 0; i < arrTrdMenuConfig.length; i++) {
        var _menu_name;
        var _ul = document.createElement("ul");
        _ul.setAttribute("class", "three");
        for (var j = 0; j < arrTrdMenuConfig[i].length; j++) {
            var _li = document.createElement("li");
            _li.innerHTML = "<a href=\"" + arrTrdMenuConfig[i][j][3] + "\">" + arrTrdMenuConfig[i][j][2] + "</a>";
            _menu_name = arrTrdMenuConfig[i][j][0];
            _ul.appendChild(_li);
        }
        var _menu = document.getElementById(_menu_name);
        $("#" + _menu_name + " > a").css("position", "relative");
        $("#" + _menu_name + " > a").append(_ul);
    }
}

function buildFooterSubMenu(menuId, subMenuId, name, href, pnav, snav) {
    var subMenuListEl = document.createElement("li");
    //subMenuListEl.setAttribute("id", subMenuId);
    subMenuListEl.innerHTML = getSubMenuRef(name, href);
    var menu = document.getElementById(menuId);
    menu.appendChild(subMenuListEl);
}

function getSubMenuRef(name, href) {
    if (name == "在线客服") {
        return "<a href=\"#\" onclick=\"window.open('http://chat16.live800.com/live800/chatClient/chatbox.jsp?companyID=118734&jid=3568248520&enterurl=" + location.href + "&tm=1274867316053', 'chatbox105517',  'toolbar=0,scrollbars=0,location=0,menubar=0,resizable=1,width=570,height=424');return false;\">在线客服></a>";
    } else {
        if (href == "false") {
            return "<a href=\"" + href + "\" onclick=\"return false;\">" + name + "</a>";
        } else {
            return "<a href=\"" + href + "\">" + name + "</a>";
        }
    }
}

function buildMenuMaster() {
    for (var i = 0; i < arrMenuId.length; i++) {
        for (var j = 0; j < arrSubMenuConfig[i].length; j++) {
            buildSubMenu(arrMenuId[i], arrSubMenuConfig[i][j][0], arrSubMenuConfig[i][j][1], arrSubMenuConfig[i][j][2], arrSubMenuConfig[i][j][3], arrSubMenuConfig[i][j][4]);
        }
    }
	buildTrdMenu();
}

function getPosition(menuPos) {
    var pos = 0;
    for (var i = 0; i < menuPos; i++) {
        pos += arrWidth[i];
    }
    return pos;
}

function getBackgroundMenuPosition(menuPos, type, isPx) {
    var pos = getPosition(menuPos);
    if (arrSubMenuConfig[menuPos][0][3] == current_row) {
        if (type == "hover") {
            return "-" + pos + isPx + " -61" + isPx;
        } else {
            return "-" + pos + isPx + " -122" + isPx;
        }
    } else {
        if (type == "hover") {
            return "-" + pos + isPx + " -61" + isPx;
        } else {
            return "-" + pos + isPx + " 0" + isPx;
        }
    }
}
