<?php
$location = 'smart-tips-at-the-pier.php';
if (headers_sent())
   echo "<script>top.location='".addcslashes($location, "'&\r\n\\")."';</script>
   <noscript><h1><a href='".htmlspecialchars($location)."'>".htmlspecialchars($location)."</a></h1></noscript>";
else
   header( "Location: $location" );
?>