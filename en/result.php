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
        //padding-left:0px;
        padding: 10px 0px;
    }
    table.dataTable thead th.center{

        text-align: center;
    }
    .dataTable td{
        font-size: 12px;
    }
    .dataTable td.center{

        text-align: center;
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

    $(document).ready(function () {

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

					/*
					console.log(mydate);
					console.log(mydate.getTime());
					console.log(Date.now);
					console.log('=========================');
					*/

					if( mydate < Date.now ){
						 return;
					}

                    if (tmp_this.pdf == '') {
                        pdf = '<td>' + tmp_this.itinerary_name + '</td>';
                    } else {
                        pdf = '<td><a target="_blank" href="' + tmp_this.pdf + '"><img src="../images/pdf_icon.png" title="" alt=""/>' + tmp_this.itinerary_name + '</a></td>';
                    }

                    //book_btn = '<td><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008.png" alt="" title="" width="85px" /></a></td>'
                    if (tmp_this.status == 'bookable') {
                        book_btn = '<td><a href="' + site_url + '/booking/stepone?id=' + tmp_this.itinerary_id + '&lang=en" target="_blank"><img src="../newimages/enquiry/btn_booknow.png" alt="" title="" width="85px" /></a></td>'
                    } else {
                        book_btn = '<td><a target="_blank" href="enquiry.php"><img src="../newimages/enquiry/btn_enquirynow2008.png" alt="" title="" width="85px" /></a></td>'
                    }


                    result += '<tr> <td>' + tmp_this.start_date + '</td><td class="center">' + tmp_this.cruise.cruise_name + '</td><td class="center">' + tmp_this.port_of_departure + '</td>'
                            + pdf
                            + '<td class="center">' + tmp_this.days_nights_full_desc + '</td>'
                            + '<td>$' + tmp_this.minimum_cruise_fares + ' up</td>'
                            + book_btn + '</tr>';

                    //console.log(result);
                });

                $('#schedule').find('tbody').html(result);
                $('#schedule').slideToggle();
                init();
            },
			error: function (jqXHR, exception) {
				alert(site_url + "/itinerary/ServiceGetItineraries");
			}
        });


        function init() {

            query_year = getParameterByName('year');
            query_month = getParameterByName('month');
            query_ship = getParameterByName('ship');
            query_port = getParameterByName('port');

            var oTable = $('#schedule').DataTable({
                "iDisplayLength": 1000,
                "bPaginate": false,
                "bSort": false,
                "bInfo": false
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
                	//console.log(preg_quote($(select2).val()));
                    oTable.column(2).search('^' + preg_quote($(select2).val()) + '$', true, false).draw();
                } else {
                    select2.val("");
                    oTable.column(2).search("").draw();
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
    }
    );

</script>

<body style='background: url(../newimages/bodyBG.jpg) top center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;'><!--class="fleet" -->
<?php include 'tracking_tag.php'; ?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: SLT 1en - Cruise Search (EN)
URL of the webpage where the tag is expected to be placed: http://www.royalcaribbean.com.hk/en/result.php
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 02/27/2017
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt1e0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6589353.fls.doubleclick.net/activityi;src=6589353;type=visit0;cat=slt1e0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

    <div style='height:92px; width:962px; margin:auto; position:relative' >
        <?php include 'pageMenu.php'; ?>
        <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; <a href="result.php">Plan a Cruise</a></div>
    </div>
    <div class="page_contentbox" style='width:962px;display:block;'>

        <!--<div style="width: 962px; float: left; position: relative; background:#fff url(../newimages/banner/plan-a-cruise.jpg) no-repeat">-->
          <div style="width: 962px; float: left; position: relative; background:#fff url(../newimages/banner/RCI-2017-launch-ad_962x341_newVersion_Eng_v4.jpg) no-repeat">
			<div class="descBox banner-margin-top margin-20-30 marineBlue">
				<h1 class="descBox__title">Plan a Cruise: Check Out Our Many Cruises Departing from Hong Kong or Many More Worldwide Ports</h1>
				<div class="descBox__desc">Plan your next trip with the Royal Caribbean cruise planner. Check any of our upcoming cruise information, deals and destinations. Start by identifying a cruise ship and your ideal departure date. There are plenty of vessels to choose from such as the Voyager of the Seas, Quantum of the Seas, Ovation of the Seas, Harmony of the Seas and more. For specific Hong Kong cruise itinerary, you may download flyers to find out more information. There's a ship and destination for everyone. We are looking forward to having you aboard!</div>
			</div>
            <div style="width: 962px;float: left; background: url(../newimages/filter_en.jpg) 20px 0px no-repeat;">
                <div style="width: 962px;float: left; margin: 20px 10px 10px 10px; ">
                    <div style="padding: 40px 40px 20px;">
                        <span>Filter:<span>
                                <!--
                                        <select id="departureDate" style="width:80px">
                                                <option value="">Departure Date</option>
                                        </select>
                                -->
                                <select id="departure_year" style="width:80px">
                                    <option value="">YYYY</option>
                                   <!-- <option value="2015">2015</option> -->
                                </select>
                                <select id="departure_month" style="width:80px">
                                    <option value="">MM</option>
                                    <option value="01">JAN</option>
                                    <option value="02">FEB</option>
                                    <option value="03">MAR</option>
                                    <option value="04">APR</option>
                                    <option value="05">MAY</option>
                                    <option value="06">JUN</option>
                                    <option value="07">JUL</option>
                                    <option value="08">AUG</option>
                                    <option value="09">SEP</option>
                                    <option value="10">OCT</option>
                                    <option value="11">NOV</option>
                                    <option value="12">DEC</option>
                                </select>
                                <select id="cruises" style="width:180px">
                                    <option value="">Ship</option>
                                </select>
                                <select id="portOfDeparture" style="width:180px">
                                    <option value="">Port of Departure</option>
                                </select>
                                <select id="duration" style="width:170px">
                                    <option value="">Days/Nights</option>
                                </select>
                                <button id="filterSchedule" >Search</button>
                                <button id="Reset" >Reset</button>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div style="width: 962px; float: left; position: relative;background:#fff; padding-top: 20px;">
                                    <table id="schedule" width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="display: none;">
                                        <thead>
                                            <tr>
                                                <th width="10%" height="19">Departure Date</th>
                                                <th width="12%" height="19" class="center">Ship</th>
                                                <th width="12%" height="19" class="center">Port of Departure</th>
                                                <th width="18%" height="19">Itinerary</th>
                                                <th width="12%" height="19" class="center">Days/Nights</th>
                                                <th width="8%" height="19">Cruise Fares</th>
                                                <th width="6%" height="19"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <br/>

                                    <div style="overflow: hidden;line-height: 20px;margin-bottom: 20px;">
                                        <div style="margin-left:30px; float: left;"><br/><br/>
                                            Terms and Conditions<br/>
                                            1. Cruise fares include NCCF, accommodation, complimentary meals, snacks and drinks in selected dining venues.<br/>
                                            2. Cruise fares exclude service charges and gratuities, taxes, fees and port expenses.<br/>
                                            3. Cruise fares are quoted per adult on twin-sharing basis in Hong Kong dollars.<br/>
                                            4. Cruise fares are subject to change and will be confirmed at the time of booking.<br/>
                                            5. All itineraries are subject to change without prior notice.<br/>
                                            6. Other terms and conditions, please refer <a href="terms-conditions.php" target="_blank">here<a/>
                                        </div>
                                    </div>
                                </div>
                                </div>

<style>
.descBox.banner-margin-top {
    margin-top: 360px;
}
</style>

                                <?php include 'pageFoot.php'; ?>
