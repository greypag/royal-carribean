<?php include 'pageHead.php'; ?>


<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<link href="../jquery.Datatable/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dataTables_filter {
  display: none;
}
.dataTable th{
  font-size: 12px;

}
table.dataTable thead th{
  text-align: left;
  padding-left:0px;
}
.dataTable td{
  font-size: 12px;
}
table.dataTable.no-footer{
  border-bottom: 0px;
}
table.dataTable tbody th, table.dataTable tbody td {
  padding: 8px 0px;
}
#schedule img {
  padding-right: 5px;
}
#schedule a {
  color: #2E5FA7;
}
</style>
<script type="text/javascript" src="../jquery.Datatable/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {


		if (!window.location.origin) {
		  window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
		}
        site_url = window.location.origin + "/booking/index.php/";
		if(Date.now){
			Date.now = Date.now() ;
		}else{

			Date.now =  new Date;
		}


        $.ajax({
            url: site_url + "/itinerary/ServiceGetItineraries",
            type: 'GET',
            contentType: "application/json",
            dataType: 'jsonp',
            jsonpCallback: 'callback',
            success: function (value) {

                //console.log(value);

                var result = '';
                $.each(value.data, function (index, element) {

                    var pdf = '';
                    var book_btn = '';
                    var tmp_this = $(this)[0];

                    var arr = tmp_this.start_date.split("/");
                    var mydate = new Date(arr[2], arr[1] - 1, arr[0]);

					if( mydate < Date.now ){
						 return;
					}

                    if (tmp_this.pdf == '') {
                        pdf = '<td>' + tmp_this.itinerary_name_tc + '</td>';
                    } else {
                        pdf = '<td><a target="_blank" href="' + tmp_this.pdf + '"><img src="../images/pdf_icon.png" title="" alt=""/>' + tmp_this.itinerary_name_tc + '</a></td>';
                    }

                    //book_btn = '<td><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008_tc.png" alt="" title="" width="85px" /></a></td>'
                    if (tmp_this.status == 'bookable') {
                        book_btn = '<td><a href="' + site_url + '/booking/stepone?id=' + tmp_this.itinerary_id + '&lang=tc" target="_blank"><img src="../newimages/enquiry/btn_booknow_tc.png" alt="" title="" width="85px" /></a></td>'
                    } else {
                        book_btn = '<td><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008_tc.png" alt="" title="" width="85px" /></a></td>'
                    }


                    result += '<tr> <td>' + tmp_this.start_date + '</td><td class="center">' + tmp_this.cruise.cruise_name_tc + '</td><td class="center">' + tmp_this.port_of_departure_tc + '</td>'
                            + pdf
                            + '<td class="center">' + tmp_this.days_nights_full_desc_tc + '</td>'
                            + '<td>$' + tmp_this.minimum_cruise_fares + ' 起</td>'
                            + book_btn + '</tr>';

                    //console.log(result);
                });
                $('#schedule').find('tbody').html(result);
                $('#schedule').slideToggle();
                init();
            }
        });
		/*
  var oTable = $('#schedule').DataTable({
    "iDisplayLength" : 1000,
    "bPaginate": false,
    "bSort": false,
    "bInfo": false,
    "oLanguage": {
      "sZeroRecords": "沒有符合的行程"
    }
  });

  function sorter_uk_date(a,b) {
    var ukDatea = a.split('/');
    var ukDateb = b.split('/');

    var x = (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
    var y = (ukDateb[2] + ukDateb[1] + ukDateb[0]) * 1;

    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
  };

  function sorter_num(a,b) {
     var x = parseFloat( a.replace( '\\', '.' ).replace( /[^0-9]+/g, '' ) );
     var y = parseFloat( b.replace( '\\', '.' ).replace( /[^0-9]+/g, '' ) );
     return ((x < y) ? -1 : ((x > y) ?  1 : 0));
  }

  function sorter_top( top ) {
     return function(x,y){
       if ( x === top ) return -1;
       if ( y === top ) return 1;
       return ((x < y) ? -1 : ((x > y) ?  1 : 0));
     };
  }

  var sorters = [
    sorter_uk_date, // Departure Date
    ,//sorter_top( '香港' ), // Port of Departure
    , // Itinerary
    sorter_num, // Days/Nights
    ,//sorter_top( '海洋航行者號' ), // Cruises
    sorter_num // Cruise Fares
  ];

  var filter_box = [
    '#departureDate',
    '#portOfDeparture',
    ,
    '#duration',
    '#cruises',
  ];

  $("#schedule thead th").each( function ( i ) {
    if ( ! filter_box[i] ) return;
    var select = $( filter_box[i] );
    oTable.column( i ).data().unique().sort( sorters[i] ).each( function ( d, j ) {
      select.append( '<option value="'+d+'">'+d+'</option>' );
    });
  });

  $("#filterSchedule").click(function (){
    var boxes = $.each( filter_box, function ( i, e ) {
      if ( ! e ) return;
      var sel = $( e );
      if ( sel.val() ){
        oTable.column( i ).search( '^'+ sel.val()+'$', true, false ).draw();
      }else{
        oTable.column( i ).search("").draw();
      }
    });
  });

  function fnResetAllFilters() {
   $("#schedule thead th").each( function ( i ) {
    oTable.column( i ).search("").draw();
  });
   $("#schedule thead th select").val("");
 }

  if ( location.search ) {
    $.each( [
      ,
      'port',
      ,
      ,
      'ship',
    ], function ( i, e ) {
       if ( ! e ) return;
       var input = location.search.match( RegExp('[?&]' + e + '=([^&]*)') );
       if ( input ) input = decodeURIComponent( input[1] );
       $( filter_box[i] ).val( input );
       $("#filterSchedule").trigger('click');
    });
  }
  */
          function init() {

            query_year = getParameterByName('year');
            query_month = getParameterByName('month');
            query_ship = getParameterByName('ship');
            query_port = getParameterByName('port');

            var oTable = $('#schedule').DataTable({
                "iDisplayLength": 1000,
                "bPaginate": false,
                "bSort": false,
                "bInfo": false,
				"oLanguage": {
				  "sZeroRecords": "沒有符合的行程"
				}
            });

            jQuery.fn.dataTableExt.oSort['uk_date-asc'] = function (a, b) {
                var ukDatea = a.split('/');
                var ukDateb = b.split('/');
                var x = (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
                var y = (ukDateb[2] + ukDateb[1] + ukDateb[0]) * 1;
                return ((x < y) ? -1 : ((x > y) ? 1 : 0));
            };
            $("#schedule thead th").each(function (i) {
                //if (i != 2) {
                var select;
                if (i == 0) {
                    select = $('#departureDate');
                } else if (i == 1) {
                    select = $('#cruises');
                } else if (i == 2) {
                    select = $('#portOfDeparture');
                } else if (i == 4) {
                    select = $('#duration');
                }
                if (i == 0) {
                    oTable.column(i).data().unique().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                        if ($("#departure_year option[value='"+ d.substr(6,4) +"']").length <= 0) {
                        	$("#departure_year").append('<option value="' + d.substr(6,4) + '">' + d.substr(6,4) + '</option>');
                        }
                    });
                } else {
                    if (select != undefined) {
                        oTable.column(i).data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    }
                }
                //}
            });

            $("#Reset").click(function () {
            	var select_year = $('#departure_year');
                var select_month = $('#departure_month');
                var select1 = $('#cruises');
                var select2 = $('#portOfDeparture');
                var select3 = $('#duration');
                select_year.val("");
                select_month.val("");
                select1.val("");
                select2.val("");
                select3.val("");
                oTable.column(0).search("").draw();
                oTable.column(1).search("").draw();
                oTable.column(2).search("").draw();
                oTable.column(4).search("").draw();
            });

            $("#filterSchedule").click(function () {
                //var select0 = $('#departureDate');
                //departure_month
                var select_year = $('#departure_year');
                var select_month = $('#departure_month');
                var select1 = $('#cruises');
                var select2 = $('#portOfDeparture');
                var select3 = $('#duration');

                if (select_year.val() != "" || select_month.val() != "") {

                    if (select_month.val() != "" && select_year.val() != "") {

                        //console.log($(select_month).val() + '/' + $(select_year).val() + '$');
                        oTable.column(0).search($(select_month).val() + '/' + $(select_year).val() + '$', true, false).draw();

                    } else if (select_month.val() != "") {

                        oTable.column(0).search('/' + $(select_month).val() + '/', true, false).draw();
                    } else if (select_year.val() != "") {

                        oTable.column(0).search($(select_year).val() + '$', true, false).draw();
                    }
                } else {
                    select_month.val("");
                    select_year.val("");
                    oTable.column(0).search("").draw();
                }
                if (select1.val() != "") {
                    oTable.column(1).search('^' + preg_quote($(select1).val()) + '$', true, false).draw();
                } else {
                    select1.val("");
                    oTable.column(1).search("").draw();
                }
                if (select2.val() != "") {
                    oTable.column(2).search('^' + preg_quote($(select2).val()) + '$', true, false).draw();
                } else {
                    select2.val("");
                    oTable.column(3).search("").draw();
                }
                if (select3.val() != "") {
                    oTable.column(4).search('^' + $(select3).val() + '$', true, false).draw();
                } else {
                    select3.val("");
                    oTable.column(4).search("").draw();
                }

            });
            function fnResetAllFilters() {
                $("#schedule thead th").each(function (i) {
                    oTable.column(i).search("").draw();
                });
                $("#schedule thead th select").val("");
            }


			function preg_quote( str ) {
			    return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
			}

            $('#departure_year').val(query_year);
            $('#departure_month').val(query_month);
            if ($("#cruises option[value='" + query_ship + "']").length > 0) {
                $('#cruises').val(query_ship);
            }
            if ($("#portOfDeparture option[value='" + query_port + "']").length > 0) {
                $('#portOfDeparture').val(query_port);
            }


            $('#filterSchedule').click();
        }

        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
});

</script>

<body style='background: url(../newimages/bodyBG.jpg) top center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;'><!--class="fleet" -->
<?php include 'tracking_tag.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 1tc - Cruise Search (TC)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/tc/result.php
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt1t0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt1t0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<div style='height:92px; width:962px; margin:auto; position:relative' >
	<?php include 'pageMenu.php'; ?>
  <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; <a href="result.php">航線行程</a></div>
</div>
<div class="page_contentbox" style='width:962px;display:block;'>

  <!--<div style="width: 962px; float: left; position: relative; background:#fff url(../newimages/banner/plan-a-cruise.jpg) no-repeat">-->
<div style="width: 962px; float: left; position: relative; background:#fff url(../newimages/banner/RCI-2017-launch-ad_962x341_newVersion_Chi_v4.jpg) no-repeat">
    <div style="width: 962px;float: left;margin: 310px 0 0 0; background: url(../newimages/filter_tc.jpg) 20px 50px no-repeat;">
      <div style="width: 962px;float: left; margin: 50px 10px 10px 10px; ">
        <div style="padding: 60px 40px 20px;">
          <span>篩選:<span>
			<select id="departure_year" style="width:80px">
				<option value="">年份</option>
				<!--<option value="2015">2015</option>-->
			</select>
			<select id="departure_month" style="width:80px">
				<option value="">月份</option>
				<option value="01">1月</option>
				<option value="02">2月</option>
				<option value="03">3月</option>
				<option value="04">4月</option>
				<option value="05">5月</option>
				<option value="06">6月</option>
				<option value="07">7月</option>
				<option value="08">8月</option>
				<option value="09">9月</option>
				<option value="10">10月</option>
				<option value="11">11月</option>
				<option value="12">12月</option>
			</select>
			<select id="cruises" style="width:180px">
				<option value="">乘搭郵輪</option>
			</select>
			<select id="portOfDeparture" style="width:180px">
				<option value="">出發港口</option>
			</select>
			<select id="duration" style="width:170px">
				<option value="">日/夜</option>
			</select>
           <button id="filterSchedule" >搜索</button>
           <button id="Reset" >重設</button>
         </div>
       </div>
     </div>
	 <!--
     <div style="margin: 5px 36.5px;text-align: right;overflow: hidden;width: 92%;">
        <a href="enquiry.php" style="margin-top: 10px;display: block;"><img src="../newimages/enquiry/btn_enquiry_tc.gif" alt="" title=""/></a>
      </div>
	  -->
   </div>
   <div style="width: 962px; float: left; position: relative;background:#fff;">
      <table id="schedule" width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="display: none;">
      <thead>

		<tr role="row">
			<th width="10%" height="19">出發日期</th>
			<th width="12%" height="19" class="center">乘搭郵輪</th>
			<th width="12%" height="19" class="center">出發港口</th>
			<th width="18%" height="19">行程</th>
			<th width="12%" height="19" class="center">日/夜</th>
			<th width="8%" height="19">船票</th>
			<th width="6%" height="19"></th>
		</tr>
      </thead>
		<tbody>

		</tbody>
    </table>
      <br/>
      <div style="overflow: hidden;line-height: 20px;margin-bottom: 20px;">
          <div style="padding-right: 54px;">
		  <!--
          <a href="enquiry.php"><img src="../newimages/enquiry/btn_enquiry_tc.gif" alt="" title=""/></a></div>
          -->
		  <div style="margin-left:30px; float: left;">*往返香港啟德郵輪碼頭<br/><br/><br/>
            條款及細則<br/>
            1. 以上價錢包括NCCF、郵輪艙房住宿、指定餐廳內之三餐、小吃及飲料。<br/>
            2. 以上價錢不包括船上收取之服務小費、港口費及碼頭稅。<br/>
            3. 以上價錢為每位成人佔用雙人船房以港幣計算。<br/>
            4. 以上價錢只作參考並以報名時作準。<br/>
            5. 所有航線行程如有任何更改，恕不另行通知。<br/>
            6. 其他條款及細則請聯絡您的旅行社。

          </div>
      </div>
  </div>
</div>

<?php include 'pageFoot.php'; ?>
