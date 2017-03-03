<?php
// control content
$topcountCount = 1;
$schedule_header_text = array('Day' => '日程', 'Port' => '港口', 'Arrive' => '抵達', 'Depart' => '出發');
$schedule_header = array('Day', 'Port', 'Arrive', 'Depart');
$schedule_json_file = file_get_contents("top-destinations.json");
$schedule_data = json_decode($schedule_json_file, true);
$top_country_bottom = array(
						"back_to_top"=> "返回頁頂",
						"order_now"=> "快速預訂"
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
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 航線行程 &gt; <a href="top-10-destinations.php">全球十大航綫</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff;">
		<div id="top-destination-banner" class="float">
			<a name="page-top"><img src="../newimages/banner/top-10-destinations.jpg" border="0" width="962" height="365" orgWidth="962" orgHeight="365" usemap="#image-maps" alt="" /></a>
		</div>
		<map name="image-maps">
			<area  alt="希臘" title="希臘" href="#8-day-7-night-greek-isles" shape="rect" coords="475,103,535,123" style="outline:none;" target="_self"     />
			<area  alt="亞洲" title="亞洲" href="#5-day-4-night-port-klang-and-phuket" shape="rect" coords="657,118,716,136" style="outline:none;" target="_self"     />
			<area  alt="澳洲" title="澳洲" href="#11-day-10-night-south-pacific" shape="rect" coords="703,224,764,243" style="outline:none;" target="_self"     />
			<area  alt="北歐" title="北歐" href="#8-day-7-night-scandinavia-and-russia" shape="rect" coords="461,56,521,74" style="outline:none;" target="_self"     />
			<area  alt="地中海" title="地中海" href="#8-day-7-night-western-mediterranean" shape="rect" coords="433,80,494,98" style="outline:none;" target="_self"     />
			<area  alt="加勒比海" title="加勒比海" href="#8-day-7-night-western-caribean" shape="rect" coords="291,133,351,151" style="outline:none;" target="_self"     />
			<area  alt="北極" title="北極" href="#12-day-11-night-artic-cicle" shape="rect" coords="304,15,364,33" style="outline:none;" target="_self"     />
			<area  alt="阿拉斯加" title="阿拉斯加" href="#8-day-7-night-alaska-sawyer-glacier" shape="rect" coords="206,53,267,71" style="outline:none;" target="_self"/>
		</map>
		<div style="margin-top:0;" class="inner">
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
											<div class="top-country-schedule-<?=strtolower($schedule_header_value)?> left"><?=$schedule_header_text[$schedule_header_value]?></div>
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
													<div class="top-country-schedule-day left">第<?=$schedule_data_detail["day"]?>天</div>
												<?php } else { ?>
													<div class="top-country-schedule-day left">第<?=$daycount?>天</div>
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
									<div class="top-country-date-title">出發日期: </div>
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
												<div class="top-country-date-year left"><?=$schedule_date_year?>年</div>
												<div class="top-country-date-month left">
											<?php 	foreach ($top_destination_value["dates"][$schedule_date_year] as $schedule_date_month => $schedule_date_day) {  ?>
													<div class="top-country-date-item top-country-date-month-col-<?=$monthColNum?> left">
														<?php
														$monthstring = "";
														$monthexplode = explode(",", $schedule_date_day);
														foreach ($monthexplode as $monthval) {
															if (strpos($monthval, "*") > -1){
																$monthstring .= str_replace("*", "*,", $monthval);
															}else{
																$monthstring .= $monthval.",";
															}
														}
														$monthstring = substr($monthstring, 0, -1)."日";
														if (strpos($monthval, "*") > -1){
															$monthstring = str_replace("*日", "日*,", $monthstring);
															$monthstring = substr($monthstring, 0, -1);
														}
														echo $schedule_date_month."月".$monthstring;
														?>
													</div>
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
										<div class="float" style="width: 100%; padding-top: 10px;">*停靠港口次序與上述不同</div>
									<?php }	?>
									</div>

								</div>
								<!-- country date list start -->
							</div>
						</div>
						<!-- country schedule end -->
						<!-- country image start -->
						<div class="top-country-bottom-right left">
							<div class="float"><?=$top_destination_value["imageHTML"]?></div>
							<!-- country back to top/order now start -->
							<div class="top-country-bottom-link float">
								<a href="#page-top">
									<?=$top_country_bottom["back_to_top"]?></a>
									<a href="enquiry.php"><img src="../newimages/enquiry/btn_enquiry_tc.gif" alt="" title=""/></a>
							</div>
							<!-- country back to top/order now end -->
						</div>
						<!-- country image end -->
					</div>
					<!-- country bottom section end -->
				</div>
			<?php $topcountCount++; }?>
			<div class="bottom-caption">以上圖片謹供參考，個别航線行程如有任何更改，恕不另行通知。</div>
		</div>
	</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
