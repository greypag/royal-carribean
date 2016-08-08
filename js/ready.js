function writeMainMenu() {
	current_row = mapMenuID(document.body.className);
	buildMenuMaster();
    $(".my400").css('display', 'none');
	// Main Nav Drop Downs
	$("ul.dropdown li").hover(function () {
		$('ul:first', this).css('visibility', 'visible');
	},
	function () {
		$('ul:first', this).css('visibility', 'hidden');
	});
	$("ul.dropdown li ul li a").hover(function () {
		$('ul:first', this).css('visibility', 'visible');
	},
	function () {
		$('ul:first', this).css('visibility','hidden');
	});

	
	/*$("#top_menu_06").unbind();
	$("ul.dropdown li ul li").hover(function () {
		//$(this).addClass("yellow_hover");
	},
	function () {
	   // $(this).removeClass("yellow_hover");
	});
	
	// Necessary for IE 6 Main Nav Hovers to Work
	$("ul.dropdown #top_menu_01").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(0, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(0, "", "px"));
	});

	$("ul.dropdown #top_menu_02").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(1, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(1, "", "px"));
	});

	$("ul.dropdown #top_menu_03").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(2, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(2, "", "px"));
	});

	$("ul.dropdown #top_menu_04").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(3, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(3, "", "px"));
	});

	$("ul.dropdown #top_menu_05").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(4, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(4, "", "px"));
	});

	$("ul.dropdown #top_menu_06").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(5, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(5, "", "px"));
	});

	$("ul.dropdown #top_menu_07").hover(function () {
		$(this).css('background-position', getBackgroundMenuPosition(6, "hover", "px"));
	},
	function () {
		$(this).css('background-position', getBackgroundMenuPosition(6, "", "px"));
	});
	*/
	
	/*$.get('/interface/CheckLogin.ashx?ts=' + new Date().getTime(), function (data) {
		var username = $(data).find('UserName').text();
		if (username != "") {
			$("#function_bar").html('欢迎您，' + username + '！ <a href="/myrccl.aspx"><b>个人中心</b></a> | <a href="/Logout.aspx"><b>退出</b></a> | <a href="http://www.royalcaribbean.com/">国际官网</a><img src="images/arrow.gif" width="17" height="20" align="absmiddle" />');
			s.events = s.events == "" || s.events == null ? "event5" : s.events + ",event5";
		}
	});*/
}


//$(document).ready(function () {
//	$(document).pngFix();
//});