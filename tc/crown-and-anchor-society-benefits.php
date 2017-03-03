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

<div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇冠金錨俱樂部 &gt; <a href="crown-and-anchor-society-benefits.php">會員權益</a>
</div>
</div>

<div class="page_contentbox" style='width:962px'>
	<div style="width: 962px; float: left; position: relative; background: #fff;">
		<div style="background: url(../newimages/banner/crown_tc.png) no-repeat top center; height: 142px; width: 962px;">
			<a href="https://secure.royalcaribbean.com/cas/enroll/home.do"><img src="../newimages/crown/btn_enroll_tc.png" alt="" title="" style="margin: 17px 0 0 28px;"/></a>
		</div>
		<?php /*
		<div id="crown-left" class="left"><?php include 'crown-and-anchor-society-menu.php'; ?></div>
		*/
		?>
		<div id="crown-right">
			<div class="title crown-large-title" class="left">會員權益</div>
			<div class="crown-content">
				<div id="crown-member-content-top" class="float">
					<div class="crown-content-left left">
						<span class="title crown-subtitle">如何獲得積分</span><br/><br/>
						在預定您的每個航次時，確保您預先辦理網上登記或在您的航行期間親身填妥表格。在航行結束後就會自動累計積分。每航行一晚，就擁有1分，如您是入住套房，則積分翻倍。<br/><br/>
						<a href="https://secure.royalcaribbean.com/cas/enroll/home.do"><img src="../newimages/crown/btn_enroll_tc.png" alt="" title=""/></a><br/><br/>
						感謝您對皇家加勒比遊輪一如既往的支持，期待與您再次相見！祝您有個愉快的海上假期！

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
							<td class="onboard-title-header-grid">船上權益</td>
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
					條款及細則:<br/>
					有關優惠按供應情況而定，<br/>
					皇家加勒比遊輪保留一切最終決定權，<br/>
					如有任何更改，將不予事前通知。
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include 'pageFoot.php'; ?>
