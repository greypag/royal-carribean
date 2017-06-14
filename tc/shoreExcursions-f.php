			</div>

<div style="padding:0 0 0 30px">

<!--
<p>• 以上價錢並不包括給予導遊及司機的服務小費, 服務小費則可隨心打賞。</p>
<p>• 已參加之行程不能更改或取消, 如出發當日缺席，一切所繳費用既不退還。</p>
<p>• 以上價錢只作參考並以報名時作準。</p>
<p>• 其他條款及細則，請前往遊輪上之岸上觀光專櫃查詢。</p>
<p>• 所有岸上觀光行程將以普通話進行，如須英文導遊，請參閱<a style="text-decoration:underline !important" href="http://www.royalcaribbean.com/findacruise/ports/group/home.do">皇家加勒比國際遊輪專頁</a></p>
<p>• All shore excursions are conducted in Mandarin Chinese, should you require English speaking tours,
</br><span style="color:white">• </span>please visit <a style="text-decoration:underline !important" href="http://www.royalcaribbean.com/findacruise/ports/group/home.do">Royal Caribbean International</a></p>
-->

<p>岸上觀光注意事</p>
<ol>
<li>可於出發前最少3天前聯絡你的旅行社或致電報名熱線31893200 (按2) 預訂；如未能預先訂購，請前往船上岸上觀光專櫃選購。</li>
<li>岸上觀光具體行程、時間、價格或有機會調整，景點遊覽次序會根據出行實際狀況進行調整，以實際接待為準。</li>
<li>本小冊子中的所有岸上觀光以普通話進行及以美金計算並不包括給予導遊及司機的服務小費，服務小費則可隨心打賞。</li>
<li>已參加之行程不能更改或取消，如出發當日缺席，一切已繳交的費用一概不能退還。</li>
<li>私人定制岸上觀光團敬請前往船上的岸上觀光專櫃查詢或與我們聯絡。</li>
</ol>

<div style="text-align:right;margin-bottom:20px;cursor:pointer" class="backtotop">返回頁頂</div>
</div>


<script>
$(document).ready(function() {
	var p0 = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
	var p1 = p0.split(".");
	var p2 = p1[0].split("-");
	var page = p2[1];
	var tab = p2[2];

	$("#cat li").removeClass("w130 active");
	$("#cat li").addClass("w130");
	$("#"+page).addClass("active");
	$("#subcat ul").removeClass("subcat active");
	$("#subcat ul").addClass("subcat");
	$("#"+page+"-s").addClass("active");

    $("#cat li").click(function() {
		window.location.href = "shoreExcursions-"+this.id+"-0.php";
    });
	$("#subcat ul li").click(function() {
		window.location.href = "shoreExcursions-"+page+"-"+$(this).prevAll().length+".php";
	});

	$('.backtotop').click(function(){
		$('html, body').animate({scrollTop : 500},500);
		return false;
	});
});
</script>
<style>
ol {
	padding-left: 15px;
}
ol li {
	list-style-type: number;
	margin-bottom: 5px;
	line-height: 1.5;
}
.page_left01 li.w130 {
	width: 130px;
	float: left;
	height: 32px;
	text-align: center;
	padding: 14px 0px 0px;
	line-height: 32px;
	background: url("../newimages/w130.png") no-repeat;
	font-size: 14px;
	color: white;
	cursor:pointer;
}

.page_left01 li.w130.active, .page_left01 li.w130:hover {
	background: url("../newimages/w130a.png") no-repeat;
	color:#0084C4;
}

.page_left01 ul.subcat {
	display:none;
}
.page_left01 ul.subcat.active {
	display:block;
}
.page_left01 ul.subcat {
	width:670px;
	height:auto;
}
.page_left01 ul.subcat li {
	width:auto;
	height:auto;
	padding: 0 0 0 10px;
}
.page_left01 ul.subcat li:hover {
	color:#006AB7;
	cursor:pointer;
}
.page_left01 ul.subcat li:after {
	content:"|";
	padding-left:10px;
}
.page_left01 ul.subcat li:last-child:after {
	content:"";
}
#content {
	clear:both;
	padding:20px 0 10px 30px;
}

#content h1 {
	font-size:14px;
	color:#0084C4;
	text-align:center;
}
#content h2 {
	font-size:13px;
}
#content p {
	width:100%;
	text-align:left;
}
</style>

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

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 1000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
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
