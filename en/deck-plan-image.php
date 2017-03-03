<?php
$type = $_GET["type"];
$showimage = "";
if (isset($type) && !empty($type)){
  switch ($type) {
    case "grand":
        $showimage = "Grand_Suite_with_Balcony";
        break;
    case "ocean":
        $showimage = "Ocean_View_Stateroom";
        break;
    case "owner":
        $showimage = "Owner_Suite_with_Balcony";
        break;
    case "promenade":
        $showimage = "Promenade_Stateroom";
        break;
    case "royal":
        $showimage = "Royal_Suite_with_Balcony";
        break;
    case "stateroom":
        $showimage = "Stateroom";
        break;
    case "stateroom_balcony":
        $showimage = "Stateroom_with_Balcony";
        break;
    case "suite_deluxe":
        $showimage = "Suite_Deluxe";
        break;
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=0.7; maximum-scale=1.0; user-scalable=0;" />
<title>Royal Caribbean International- Quantum Odyssey 海洋量子號</title>
</head>
<body>
  <?php include 'tracking_tag.php'; ?>
<script>
  $(document).ready(function() {
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          $('.back-button').css('display','block');
      }
  });
  </script>
  <div>
    <a class="back-button" onclick="history.go(-1)" style="position: fixed;font-size: 30px;background: #ccc;z-index: 999;margin-top: 10px;padding: 5px;">Back</a>
    <img src="../newimages/deck-plan/<?=$showimage?>.jpg" alt="" title=""/>
  </div>
</body>
</html>
