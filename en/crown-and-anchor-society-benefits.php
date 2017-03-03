<?php
$crown_json_file = file_get_contents("member-benefits.json");
$crown_benefits_data = json_decode($crown_json_file, true);
?>
<?php $crownPage = "benefits";?>
<?php include 'pageHead.php'; ?>
<link href="../css/crown.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'tracking_tag.php'; ?>
<div style='height:92px; width:962px; margin:auto; position:relative' >
<?php include 'pageMenu.php'; ?>

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">Home</a> &gt; Crown & Anchor Society &gt; <a href="crown-and-anchor-society-benefits.php">Member Benefits</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff;">
		<div style="background: url(../newimages/banner/crown_en.png) no-repeat top center; height: 142px; width: 962px;">
			<a href="https://secure.royalcaribbean.com/cas/enroll/home.do"><img src="../newimages/crown/btn_enroll_en.png" alt="" title="" style="margin: 17px 0 0 28px;"/></a>
		</div>
		<?php /*
		<div id="crown-left" class="left"><?php include 'crown-and-anchor-society-menu.php'; ?></div>
		*/
		?>
		<div id="crown-right">
			<div class="title crown-large-title" class="left">Member Benefits</div>
			<div class="crown-content">
				<div id="crown-member-content-top" class="float">
					<div class="crown-content-left left">
						<span class="title crown-subtitle">HOW TO EARN POINTS</span><br/><br/>
						The members-only area is where you'll discover upcoming Royal Caribbean International® adventures exclusively for Crown & Anchor® Society members. Re-live the excitement of past cruises. For every sailing night, you will receive 1 point. If you are staying with us in our suite, points will be mutiplied. <br/><br/>
						<a href="https://secure.royalcaribbean.com/cas/enroll/home.do"><img src="../newimages/crown/btn_enroll_en.png" alt="" title=""/></a><br/><br/>
						Thank you for your support to Royal Caribbean! We look forward in your next visit. We wish you a lovely journey!
					</div>
					<div class="crown-content-right left">
						<div id="grid-gold" class="crown-benefits-grid left">Gold</div>
						<div id="grid-platium" class="crown-benefits-grid left">Platinum</div>
						<div id="grid-emerald" class="crown-benefits-grid left">Emerald</div>
						<div id="grid-diamond" class="crown-benefits-grid left">Diamond</div>
						<div id="grid-diamondplus" class="crown-benefits-grid left">Diamond Plus</div>
						<div id="grid-pinnacle" class="crown-benefits-grid left">Pinnacle Club</div>
					</div>
				</div>
				<div id="crown-member-content-bottom" class="float">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class="onboard-title-header-grid">Onboard Benefits</td>
							<td class="crown-header-grid onboard-gold-header-grid">3</td>
							<td class="crown-header-grid onboard-platinum-header-grid">30</td>
							<td class="crown-header-grid onboard-emerald-header-grid">55</td>
							<td class="crown-header-grid onboard-diamond-header-grid">80</td>
							<td class="crown-header-grid onboard-diamond-plus-header-grid">175</td>
							<td class="crown-header-grid onboard-pinnacle-club-header-grid">700</td>
						</tr>
					<?php foreach ($crown_benefits_data as $crown_benefits_key => $crown_benefits_value) { ?>
							<tr>
						<?php if ($crown_benefits_value["header"] == 1){ ?>
							 <td colspan="7" class="onboard-title-header-grid"><?=$crown_benefits_value["title"];?></td>
						<?php }else{	?>
									<td class="crown-grid-title"><?=$crown_benefits_value["title"];?></td>
									<td class="crown-grid onboard-gold-grid"><?=($crown_benefits_value["gold"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>
									<td class="crown-grid onboard-platinum-grid"><?=($crown_benefits_value["platinum"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>
									<td class="crown-grid onboard-emerald-grid"><?=($crown_benefits_value["emerald"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>
									<td class="crown-grid onboard-diamond-grid"><?=($crown_benefits_value["diamond"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>
									<td class="crown-grid onboard-diamond-plus-grid"><?=($crown_benefits_value["diamond-plus"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>
									<td class="crown-grid onboard-pinnacle-club-grid"><?=($crown_benefits_value["pinnacle-club"] == 1)? "<img src='../newimages/crown/all-benefits-anchor.png' alt='' title=''/>" : ""?></td>

			<?php 				} ?>
							</tr>
			<?php		}	?>
					</table>
				</div>
				<div>
					General Terms & Conditions:<br/>
					Offers are subject to availability, Royal Caribbean Cruises Ltd. has the right to terminate the Crown & Anchor Society® Program or to change the Terms and Conditions of participation and benefits, in whole or in part; at any time without notice.
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
