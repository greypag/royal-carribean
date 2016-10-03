<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	//$metaKeyWordsPrefix = '<meta name="keywords" content="';
	//$metaKeyWordsSuffix = '" />';
    $metaInformation = array(
		"metaIndex"=>array(
			"metaKeyWords" => "royal caribbean, royal caribbean hk, royal caribbean hong kong, top cruise line in hong kong, hong kong cruise excursions, royal caribbean international, cruise from hong kong, cruise departures from Hong Kong, top cruise line in hong kong, hong kong cruise excursions, voyager of the seas, quantum of the seas, oasis of the seas, harmony of the seas, ovation of the seas",
			"metaPageTitle" => "Royal Caribbean International | Top Cruise Line in Hong Kong",
			"metaDescription" => "Royal Caribbean is the top cruise line in Hong Kong. Cruise from Hong Kong to Asia, Europe, the Mediterranean and more. Plan your extraordinary vacation today!"
		),
		"metaResult"=>array(
			"metaKeyWords" => "hong kong cruise package, cruises departing from hong kong, cruise deals from hong kong, royal caribbean cruise planner, hong kong cruise itinerary, hong kong cruise information",
			"metaPageTitle" => "Cruise packages | Royal Caribbean Hong Kong",
			"metaDescription" => "Welcome to the Royal Caribbean cruise planner. Look through many Hong Kong cruise itineraries for cruise information, deals and packages."
		),
		"metaVoyager"=>array(
			"metaKeyWords" => "voyager of the seas, royal caribbean international, hong kong cruise vacation, cruise ships in hong kong",
			"metaPageTitle" => "Voyager of the Seas | Royal Caribbean Hong Kong",
			"metaDescription" => "Go for a Hong Kong homeport cruise vacation on the Voyager of the Seas. Royal Caribbean International boasts some of the most extraordinary cruise ships in Hong Kong."
		),
		"metaQuantum"=>array(
			"metaKeyWords" => "quantum of the seas, royal caribbean cruise, royal caribbean cruises in hong kong, cruise from hong kong",
			"metaPageTitle" => "Quantum of the Seas | Royal Caribbean Hong Kong",
			"metaDescription" => "Cruise on the first smartship - Quantum of the Seas. Royal Caribbean cruises have their interiors, amenities and activities designed by technology advanced experts."
		),
		"metaRoyalDeal"=>array(
			"metaKeyWords" => "cruise destination from hong kong, royal caribbean holiday cruise, hong kong cruise excursions",
			"metaPageTitle" => "Royal Deals | Cruise Destinations from Hong Kong and Many Other Worldwide Ports",
			"metaDescription" => "Enjoy a Royal Caribbean cruise vacation to a Top 10 Destination. Mediterranean, Greek Isles, Caribbean, Australia, Singapore, Alaska and more! Plan a Hong Kong cruise vacation today!"
		)			
	);
	if(basename(__DIR__)=="en"){
		if(basename($_SERVER['REQUEST_URI'])=="index.php"){
			$pageLevelMeta = $metaInformation["metaIndex"];
		}else if(basename($_SERVER['REQUEST_URI'])=="result.php"){
			$pageLevelMeta = $metaInformation["metaResult"];
		}else if(basename($_SERVER['REQUEST_URI'])=="onboard-experience.php" || basename($_SERVER['REQUEST_URI'])=="voyager.php"){
			$pageLevelMeta = $metaInformation["metaVoyager"];
		}else if(basename($_SERVER['REQUEST_URI'])=="quantum.php"){
			$pageLevelMeta = $metaInformation["metaQuantum"];
		}else if(basename($_SERVER['REQUEST_URI'])=="get-royal-deals.php"){
			$pageLevelMeta = $metaInformation["metaRoyalDeal"];
		}else{
			$pageLevelMeta["metaPageTitle"] = "Royal Caribbean International";
			$pageLevelMeta["metaDescription"] = "Royal Caribbean International offers amazing cruise deals to some of the most sought-after destinations in the world. Explore Europe, experience Australia, bask in the sun on a Caribbean cruise, and much more. Start planning your cruise vacation now.";
		}
	}
	//var_dump($pageLevelMeta);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head id="Head1">
<title><?php echo $pageLevelMeta["metaPageTitle"]; ?></title>

<meta http-equiv="Description" content="<?php echo $pageLevelMeta["metaDescription"]; ?>" />
<meta name="title" content="<?php echo $pageLevelMeta["metaPageTitle"]; ?>">
<meta name="keywords" content="<?php echo $pageLevelMeta["metaKeyWords"]; ?>">
<meta property="wb:webmaster" content="efbcfb01b689d2f5" />
<link href="../newimages/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="../css/rcclchina.css" rel="stylesheet" type="text/css" />
<link href="../css/home.css" rel="stylesheet" type="text/css" />
<link href="../css/slidebox.css" rel="stylesheet" type="text/css" />
<style type="text/css">body { background-color: #fff !important; }</style>
<link href="../css/base.css" rel="stylesheet" />
<link href="../css/content.css?20161003" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.4.min.js" type="text/javascript"></script>
<script src="../js/rccl_en.js?20150825" type="text/javascript"></script>
<script src="../js/menu.js" type="text/javascript"></script>
<script src="../js/ready.js" type="text/javascript"></script>
<script src="../js/jquery.pngFix.js" type="text/javascript"></script>
<script src="../js/home.js" type="text/javascript"></script>
<link href="../css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-flash.js"></script>

<script type="text/javascript" src="../jssor/jssor.core.js"></script>
<script type="text/javascript" src="../jssor/jssor.utils.js"></script>
<script type="text/javascript" src="../jssor/jssor.slider.js"></script>

<!--<script type="text/javascript">
	var _smq = _smq || [];
	_smq.push(['_setAccount', '233407d', new Date()]);
	_smq.push(['pageview']);
	(function () {
		var sm = document.createElement('script'); sm.type = 'text/javascript'; sm.async = true;
		sm.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdnmaster.com/sitemaster/sm.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sm, s);
	})();
</script>-->
<link rel="stylesheet" type="text/css" href="../shadowbox/shadowbox.css">
<script type="text/javascript" src="../shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>









