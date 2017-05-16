<div class="page_right">
	<div class="page_right02" style="position: relative; z-index: 310;">

		<div class="page_right03_ym">
			<div class="page_right03_1" style="z-index: 10; position: relative;">
				<a onClick="s_toggle('year')" id="s_year_box">YYYY</a>
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
				<a onClick="s_toggle('month')" id="s_month_box">MM</a>
				<div id="s_month_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s_1">
					<div class="right08s_1">
						<ul>
							<li><a onClick="Start_Select('month','01','JAN')">JAN</a></li>
							<li><a onClick="Start_Select('month','02','FEB')">FEB</a></li>
							<li><a onClick="Start_Select('month','03','MAR')">MAR</a></li>
							<li><a onClick="Start_Select('month','04','APR')">APR</a></li>
							<li><a onClick="Start_Select('month','05','MAY')">MAY</a></li>
							<li><a onClick="Start_Select('month','06','JUN')">JUN</a></li>
							<li><a onClick="Start_Select('month','07','JUL')">JUL</a></li>
							<li><a onClick="Start_Select('month','08','AUG')">AUG</a></li>
							<li><a onClick="Start_Select('month','09','SEP')">SEP</a></li>
							<li><a onClick="Start_Select('month','10','OCT')">OCT</a></li>
							<li><a onClick="Start_Select('month','11','NOV')">NOV</a></li>
							<li><a onClick="Start_Select('month','12','DEC')">DEC</a></li>
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
			<a onClick="s_toggle('port');" id="s_port_box">Hong Kong</a>
			<div id="s_port_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s">
				<div class="right08s_2">
					<ul>
						<li><a onClick="Start_Select('port','Hong Kong')">Hong Kong</a></li>
						<li><a onClick="Start_Select('port','Rome')">Rome</a></li>
						<li><a onClick="Start_Select('port','Seattle')">Seattle</a></li>
						<li><a onClick="Start_Select('port','Southampton')">Southampton</a></li>
						<li><a onClick="Start_Select('port','Harwich')">Harwich</a></li>
					</ul>
				</div>
				<div style="width: 216px; height: 9px; float: left;"><img src="../newimages/r_80.png" /></div>
			</div>
		</div>
			<!---->
		<div class="page_right03_2">
			<a onClick="s_toggle('ship');" id="s_ship_box">Voyager of the Seas</a>
			<div id="s_ship_list" style="position: absolute; display: none; z-index: 12; top: 25px; left: 0px;" class="right07s">
				<div class="right08s_2">
					<ul>
						<li><a onClick="Start_Select('ship','Voyager of the Seas')">Voyager of the Seas</a></li>
						<li><a onClick="Start_Select('ship','Ovation of the Seas')">Ovation of the Seas</a></li>
						<li><a onClick="Start_Select('ship','Allure of the Seas')">Allure of the Seas</a></li>
						<li><a onClick="Start_Select('ship','Anthem of the Seas')">Anthem of the Seas</a></li>
						<li><a onClick="Start_Select('ship','Brilliance of the Seas')">Brilliance of the Seas</a></li>
						<li><a onClick="Start_Select('ship','Jewel of the Seas')">Jewel of the Seas</a></li>
					</ul>
				</div>
				<div style="width: 216px; height: 9px; float: left;">
					<img src="../newimages/r_80.png" />
				</div>
			</div>
		</div>
		<div class="page_right04"> <a id="s_search" href="result.php"><img src="../newimages/r_70_en.jpg"  style="cursor: pointer;" /></a> </div>
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
	$("#s_year_list,#s_month_list,#s_ship_list,#s_port_list").hide();
	if ( s_type === 'port' ) {
		Start_Select( 'ship', {
			'Hong Kong':'Voyager of the Seas','Hong Kong':'Ovation of the Seas','Rome':'Allure of the Seas',
			'Southampton':'Anthem of the Seas','Harwich':'Brilliance of the Seas','Seattle':'Jewel of the Seas'
		}[ s_value ] );
	} else if ( s_type === 'ship' ) {
		 Start_Select( 'port', {
			'Voyager of the Seas':'Hong Kong','Ovation of the Seas':'Hong Kong','Allure of the Seas':'Rome',
			'Anthem of the Seas':'Southampton','Brilliance of the Seas':'Harwich','Jewel of the Seas':'Seattle'
		}[ s_value ] );
	}
	s_update_search();
}
$("#s_date_box,#s_port_box,#s_ship_box").each( function ( i, e ) { $(e).data('value', e.textContent); } );
s_update_search();
</script>
