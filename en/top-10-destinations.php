<?php
// control content
$topcountCount = 1;
$schedule_header = array('Day', 'Port', 'Arrive', 'Depart');
$schedule_json_file = file_get_contents("top-destinations.json");
$schedule_data = json_decode($schedule_json_file, true);
$top_country_bottom = array(
						"back_to_top"=> "Back To Top",
						"order_now"=> "Book Now"
					);
?>
<?php include 'pageHead.php'; ?>
<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />
<link href="../css/top-destinations.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Plan A Cruise &gt; <a href="top-10-destinations.php">Top 10 Destinations</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff;">
		<div id="top-destination-banner" class="float">
			<a name="page-top"><img src="../newimages/banner/top-10-destinations-en.jpg" border="0" width="962" height="365" orgWidth="962" orgHeight="365" usemap="#image-maps" alt="" /></a>
		</div>
		<map name="image-maps">
			<area  alt="Greek Isles" title="Greek Isles" href="#8-day-7-night-greek-isles" shape="rect" coords="469,103,550,123" style="outline:none;" target="_self"     />
			<area  alt="Asia" title="Asia" href="#5-day-4-night-port-klang-and-phuket" shape="rect" coords="669,118,709,137" style="outline:none;" target="_self"     />
			<area  alt="Australia" title="Australia" href="#11-day-10-night-south-pacific" shape="rect" coords="704,224,764,243" style="outline:none;" target="_self"     />
			<area  alt="Northern Europe" title="Northern Europe" href="#8-day-7-night-scandinavia-and-russia" shape="rect" coords="448,56,558,74" style="outline:none;" target="_self"     />
			<area  alt="Mediterranean" title="Mediterranean" href="#8-day-7-night-western-mediterranean" shape="rect" coords="416,80,510,98" style="outline:none;" target="_self"     />
			<area  alt="Caribbean" title="Caribbean" href="#8-day-7-night-western-caribean" shape="rect" coords="289,133,359,152" style="outline:none;" target="_self"     />
			<area  alt="Arctic Circle" title="Arctic Circle" href="#12-day-11-night-artic-cicle" shape="rect" coords="293,14,375,33" style="outline:none;" target="_self"     />
			<area  alt="Alaska" title="Alaska" href="#8-day-7-night-alaska-sawyer-glacier" shape="rect" coords="216,52,268,72" style="outline:none;" target="_self"/>
		</map>
		<div class="descBox margin-20-30 marineBlue">
			<div class="descBox__desc">The cruise line sails 24 of the world’s most innovative cruise ships to the most popular destinations in Bermuda and the Caribbean, Europe, Canada and New England, Alaska, South America, Asia, and Australia and New Zealand.</div>
		</div>		
		<div class="inner underDescBox">
			<?php foreach ($schedule_data as $top_destination_key => $top_destination_value) { ?>
				<div class="top-country-wrapper float" style="<?=($topcountCount==count($schedule_data)? "border-bottom: none;" : "")?>">
					<!-- country title section start -->
					<div class="top-country-top float">
						<div class="top-country-title">
							<span class="top-country-blue-title"><a name="<?=$top_destination_key?>"><?=$top_destination_value["title"]?></a></span>
							<span class="top-country-grey-title"><?=$top_destination_value["cruise"]?></span>
						</div>
						<div class="<?=empty($top_destination_value["caption"])? "" : "top-country-caption"?>"><?=$top_destination_value["caption"]?></div>
					</div>
					<!-- country title section end -->
					<!-- country bottom section start -->
					<div class="top-country-bottom float">
						<!-- country schedule start -->
						<div class="top-country-bottom-left left">
							<div class="top-country-schedule-wrapper float">
								<!-- country schedule header start -->
								<div class="top-country-schedule-header float">
								<?php 	foreach ($schedule_header as $schedule_header_value) { ?>
											<div class="top-country-schedule-<?=strtolower($schedule_header_value)?> left"><?=$schedule_header_value?></div>
								<?php 	}	?>
									
								</div>
								<!-- country schedule header end -->
								<!-- country schedule content start -->
								<div class="top-country-schedule-content float">
									<?php 	
									$daycount = 1;
									foreach ($top_destination_value["details"] as $schedule_data_detail) { ?>
										<div class="top-country-schedule-row float">
												<?php if ($top_destination_value["duplicateDay"]) { ?>
													<div class="top-country-schedule-day left">Day <?=$schedule_data_detail["day"]?></div>
												<?php } else { ?>
													<div class="top-country-schedule-day left">Day <?=$daycount?></div>
												<?php } ?>
												<div class="top-country-schedule-port left"><?=$schedule_data_detail["port"]?></div>
												<div class="top-country-schedule-arrive left"><?=empty($schedule_data_detail["arrive"])? "&ndash;" : $schedule_data_detail["arrive"]?></div>
												<div class="top-country-schedule-depart left"><?=empty($schedule_data_detail["depart"])? "&ndash;" : $schedule_data_detail["depart"]?></div>
										</div>
									<?php 	
										$daycount++;
									}	?>
								</div>
								<!-- country schedule content start -->
								<!-- country date list start -->
								<div class="top-country-date-wrapper float">
									<div class="top-country-date-title">Departure Dates: </div>
									<?php 	
									$daycount = 1;
									$yearCount = 1;
									$monthRowNum = $top_destination_value["monthRowNum"];
									$monthColNum = $top_destination_value["monthColNum"];
									$thisYear = "";
									foreach ($top_destination_value["dates"] as $schedule_date_year=>$schedule_date) { 
										if (!empty($thisYear) && $thisYear != $schedule_date_year){	?>
											</div>
								<?php 	}	
										$thisYear = $schedule_date_year;
										$monthRowCountNum = 1;
								?>
										<div class="top-country-data-row-<?=$yearCount?> float">
												<div class="top-country-date-year left"><?=$schedule_date_year?></div>
												<div class="top-country-date-month left">
											<?php 	foreach ($top_destination_value["dates"][$schedule_date_year] as $schedule_date_month => $schedule_date_day) {  ?>
													<div class="top-country-date-item top-country-date-month-col-<?=$monthColNum?> left"><?=date("F", mktime(0, 0, 0, $schedule_date_month, 1, 2000))." ".$schedule_date_day?></div>
													<?php
													$monthRowCountNum++;
													if ($monthRowCountNum > $monthRowNum){
														$monthRowCountNum = 1;
													}
												 } ?>
												</div>

									<?php 	
										$daycount++;
										$yearCount++;
									}	?>
									<?php
									if ($top_destination_value["portcaption"] == 1){ ?>
										<div class="float" style="width: 100%; padding-top: 10px;">*Ports of call sequence is different from the above</div>
									<?php }	?>
									</div>

								</div>
								<!-- country date list start -->
							</div>
						</div>
						<!-- country schedule end -->
						<div class="top-country-bottom-right left">
							<div class="float"><?=$top_destination_value["imageHTML"]?></div>
							<!-- country back to top/order now start -->
							<div class="top-country-bottom-link float">
								<a href="#page-top"><?=$top_country_bottom["back_to_top"]?></a> 
								<a href="enquiry.php"><img src="../newimages/enquiry/btn_enquiry_en.gif" alt="" title=""/></a>
							</div>
							<!-- country back to top/order now end -->
						</div>
					</div>
					<!-- country bottom section end -->
				</div>
			<?php $topcountCount++; }?>
			<div class="bottom-caption">Above photos are for reference only, itineraries are subject to change without prior notice.</div>
		</div>
	</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>