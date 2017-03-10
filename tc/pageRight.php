<div class="page_right">
	<div class="page_right02_tc" style="position: relative; z-index: 310;">
		<!--
		<div class="page_right03_2" style="z-index: 10; position: relative;">
			<a onClick="s_toggle('date')" id="s_date_box">2015年</a>
			<div id="s_date_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s">
				<div class="right08s_2">
					<ul>
						<li><a onClick="Start_Select('time','2015','2015')">2015年</a></li>
					</ul>
				</div>
				<div style="width: 216px; height: 9px; float: left;">
					<img src="../newimages/r_80.png" />
				</div>
			</div>

			<br class="clearboth"/>
		</div>
			-->
		<div class="page_right03_ym">
			<div class="page_right03_1" style="z-index: 10; position: relative;">
				<a onClick="s_toggle('year')" id="s_year_box">年份</a>
				<div id="s_year_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s_1">
					<div class="right08s_1">
						<ul>
							<li><a onClick="Start_Select('year','2017','2017')">2017</a></li>
						</ul>
					</div>
					<div style="width: 80px; height: 9px; float: left;">
						<img src="../newimages/r_80ss.png" />
					</div>
				</div>
			</div>

			<div class="page_right03_1" style="z-index: 10; position: relative;">
				<a onClick="s_toggle('month')" id="s_month_box">月份</a>
				<div id="s_month_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s_1">
					<div class="right08s_1">
						<ul>
							<li><a onClick="Start_Select('month','01','1月')">1月</a></li>
							<li><a onClick="Start_Select('month','02','2月')">2月</a></li>
							<li><a onClick="Start_Select('month','03','3月')">3月</a></li>
							<li><a onClick="Start_Select('month','04','4月')">4月</a></li>
							<li><a onClick="Start_Select('month','05','5月')">5月</a></li>
							<li><a onClick="Start_Select('month','06','6月')">6月</a></li>
							<li><a onClick="Start_Select('month','07','7月')">7月</a></li>
							<li><a onClick="Start_Select('month','08','8月')">8月</a></li>
							<li><a onClick="Start_Select('month','09','9月')">9月</a></li>
							<li><a onClick="Start_Select('month','10','10月')">10月</a></li>
							<li><a onClick="Start_Select('month','11','11月')">11月</a></li>
							<li><a onClick="Start_Select('month','12','12月')">12月</a></li>
						</ul>
					</div>
					<div style="width: 80px; height: 9px; float: left;">
						<img src="../newimages/r_80ss.png" />
					</div>
				</div>
			</div>
			<br class="clearboth"/>
		</div>
		<div class="page_right03_2" style="z-index: 8; position: relative;">
			<a onClick="s_toggle('port');" id="s_port_box">出發港口</a>
				<div id="s_port_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s">
				<div class="right08s_2">
					<ul>
						<li><a onClick="Start_Select('port','香港')">香港</a></li>
						<li><a onClick="Start_Select('port','羅馬')">羅馬</a></li>
						<li><a onClick="Start_Select('port','西雅圖')">西雅圖</a></li>
						<li><a onClick="Start_Select('port','修咸頓')">修咸頓</a></li>
						<li><a onClick="Start_Select('port','哈裡奇')">哈裡奇</a></li>
					</ul>
				</div>
				<div style="width: 216px; height: 9px; float: left;"><img src="../newimages/r_80.png" /></div>
			</div>
		</div>
		<div class="page_right03_2">
			<a onClick="s_toggle('ship');" id="s_ship_box">遊輪船隊</a>
			<div id="s_ship_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s">
				<div class="right08s_2">
					<ul>
						<li><a onClick="Start_Select('ship','海洋航行者號')">海洋航行者號</a></li>
						<li><a onClick="Start_Select('ship','海洋魅麗號')">海洋魅麗號</a></li>
						<li><a onClick="Start_Select('ship','海洋聖歌號')">海洋聖歌號</a></li>
						<li><a onClick="Start_Select('ship','海洋光輝號')">海洋光輝號</a></li>
						<li><a onClick="Start_Select('ship','海洋珠寶號')">海洋珠寶號</a></li>
					</ul>
				</div>
				<div style="width: 216px; height: 9px; float: left;">
					<img src="../newimages/r_80.png" />
				</div>
			</div>
		</div>
		<div class="page_right04"> <a id="s_search" href="result.php"><img src="../newimages/r_70.jpg"  style="cursor: pointer;" /></a></div>
	</div>
</div>
<script>
function s_toggle( id ) {
	var id = "#s_"+id+"_list", o = $( id ).css( 'display' );
	$("#s_year_list,#s_month_list,#s_ship_list,#s_port_list").hide();
	if (o === "none") $( id ).show();
}
function s_update_search() {
	var result = 'result.php?';
	$("#s_year_box,#s_month_box,#s_ship_box,#s_port_box").each( function ( i, e ) { e;
		if(typeof($(e).data('value'))!= 'undefined'){
			result += e.id.match( /s_(\w+)_box/ )[1] + '=' + $(e).data('value') + '&';
		}
	});
	$('#s_search').prop( 'href', result );
}
function Start_Select(s_type, s_value, s_text ) {
	var box = $("#s_" + s_type + "_box");
	if ( s_text === undefined ) s_text = s_value;
	if ( box.length <= 0 || s_value === box.data( 'value' ) ) return;
	box.html( s_text ).data( 'value', s_value );
	//$("#s_date_list,#s_port_list,#s_ship_list").hide();
	$("#s_year_list,#s_month_list,#s_ship_list,#s_port_list").hide();
	if ( s_type === 'port' ) {
		Start_Select( 'ship', {'香港':'海洋航行者號','羅馬':'海洋魅麗號','修咸頓':'海洋聖歌號','哈裡奇':'海洋光輝號','西雅圖':'海洋珠寶號'}[ s_value ] );
	} else if ( s_type === 'ship' ) {
		Start_Select( 'port', {'海洋航行者號':'香港','海洋魅麗號':'羅馬','海洋聖歌號':'修咸頓','海洋光輝號':'哈裡奇','海洋珠寶號':'西雅圖'}[ s_value ] );
	}
	s_update_search();
}

$("#s_date_box,#s_port_box,#s_ship_box").each( function ( i, e ) { $(e).data( 'value', e.textContent); } );
s_update_search();
</script>
