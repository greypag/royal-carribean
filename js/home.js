function s_time() {
    var o = document.getElementById("s_time").style.display;
    if (o == "none") {
        $("#s_time").css("display", "block");
        $("#port").css("display", "none");
        $("#ship").css("display", "none");
    } else {
        $("#s_time").css("display", "none");
    }
}
function s_port() {
    var o = document.getElementById("port").style.display;
    if (o == "none") {
        $("#port").css("display", "block");
        $("#s_time").css("display", "none");
        $("#ship").css("display", "none");
    } else {
        $("#port").css("display", "none");
    }
}
function s_ship() {
    var o = document.getElementById("ship").style.display;
    if (o == "none") {
        $("#ship").css("display", "block");
        $("#port").css("display", "none");
        $("#s_time").css("display", "none");
    } else {
        $("#ship").css("display", "none");
    }
}
function Start_Select(s_value_control, s_type, s_value, s_text) {
    document.getElementById(s_value_control).value = s_value;
    $("#" + s_type).css("display", "none");
    $("#" + s_type + "1").html(s_text);
}
function search_line() {
    var dr1 = document.getElementById('s_time_value');
    var dr2 = document.getElementById('s_port_value');
    var ship = document.getElementById('s_ship_value');
    location.href = '/Result.aspx?month=' + escape(dr1.value) + '&ship=' + escape(ship.value) + '&port=' + escape(dr2.value);
}
function ChangeDiv(show_div, hiden_div) {
    //$("div[id^='topsubmenu_']").hide();
    $("#" + show_div).show();
    $("#" + hiden_div).hide();
}
var C_index = 0; //播放kv的索引值
var really_index = 0;

var kv_datas = [
{ pic: "newimages/kv_02.jpg", link: "/experience" },
{ pic: "newimages/kv_08.jpg", link: "/quantum" },
{ pic: "newimages/kv_03.jpg", link: "/2014MA" },
{ pic: " newimages/kv_07.jpg", link: "http://www.iqiyi.com/marketing/rcclchina.html" },
{ pic: "newimages/kv_01.jpg", link: "http://www.rcclchina.com.cn/row/" }
]
$(document).ready(function () {

    $("#main_content").css("background", " url(" + kv_datas[0]["pic"] + ") no-repeat center top");
    $("#kvlink").attr("href", kv_datas[0]["link"]);

    var list_panel = $("div.my_test div"); //列表的容器
    var c_total_count = $("div.my_test div.latter").children().length;

    var single_width = $("div.my_test div").children(0).width(); //单个列表的高度
    var total_width = 0;
    for (var i = 0; i < c_total_count; i++) {
        total_width += $("div.my_test div").children(i).width();
    }
    var list_panel_width = 0;
    if (list_panel.css("left"))
        list_panel_width = parseInt(list_panel.css("left").replace("px", ""));
    if (isNaN(list_panel_width)) {
        list_panel_width = 0;
    }
    $("#previous_").click(function () {
        if (list_panel_width < 0) {
            list_panel_width += single_width;
            list_panel.animate({ left: list_panel_width }, 800);
        }
    });
    $("#next_").click(function () {
        var iftj = parseInt($("div.my_test").width() - total_width);
        if (list_panel_width >= iftj) {
            list_panel_width -= single_width;
            list_panel.animate({ left: list_panel_width }, 800);
        }
    });
    for (var i = 0; i < kv_datas.length; i++) {
        $("#kv_btn").append("<li><a id=\"pbtn" + i + "\" href=\"javascript:;\" onclick=\"switchKV(" + i + ")\" onmouseover=\"stopPlay();\" onmouseout=\"startPlay();\"></a></li>");
    }
    $("#pbtn0").css("background", "url(newimages/r_22.png) repeat scroll 0 0 transparent");
});
var press_kv = 0;
var timer = null;
function stopPlay() {
    window.clearInterval(timer);
}
function startPlay() {
    timer = window.setInterval(PlayKV, 5000);
}
function switchKV(current_index) {
    if (press_kv != current_index) {
        for (var i = 0; i < kv_datas.length; i++) {
            $("#pbtn" + i).css("background", "url(newimages/r_21.png) repeat scroll 0 0 transparent");
        }
        really_index = current_index;
        $("#pbtn" + current_index).css("background", "url(newimages/r_22.png) repeat scroll 0 0 transparent");
        $("#main_content").animate({ opacity: "0.3" }, 1000, function () {
            $("#main_content").css("background", " url(" + kv_datas[current_index]["pic"] + ") no-repeat center top");
            $("#main_content").animate({ opacity: "1" }, 1000);
        });
        press_kv = current_index;
    }
}
function PlayKV() {
    if (C_index == kv_datas.length - 1) {
        C_index = 0;
    } else {
        C_index = C_index + 1;
    }
    really_index = C_index;
    press_kv = C_index;
    for (var i = 0; i < kv_datas.length; i++) {
        $("#pbtn" + i).css("background", "url(newimages/r_21.png) repeat scroll 0 0 transparent");
    }
    $("#pbtn" + C_index).css("background", "url(newimages/r_22.png) repeat scroll 0 0 transparent");
    $("#main_content").animate({ opacity: "0.3" }, 1000, function () {

        $("#main_content").css("background", " url(" + kv_datas[C_index]["pic"] + ") no-repeat center top");
        $("#main_content").animate({ opacity: "1" }, 1000);
    });
}
function link() {
    var c = really_index;
    $("#kvlink").attr("href", kv_datas[really_index]["link"]);
    if (kv_datas[really_index]["link"] == "#" || kv_datas[really_index]["link"] == "") {
    } else {
        document.getElementById("kvlink").click();
    }
}
timer = window.setInterval(PlayKV, 5000);
function change_zindex(y) {
    if (y == 1) {
        $("#Div1").css("z-index", "3");
    } else {
        $("#Div1").css("z-index", "5");
    }
}
