<?php $script_name = @$_SERVER['SCRIPT_NAME'];
   $tab1 = preg_match( '~\/onboard-experience\.php$~', $script_name )
      ? '<li class="page_hover_wider">船上特色</li>'
      : '<li class="wider"><a href="onboard-experience.php">船上特色</a></li>';

   $tab2 = preg_match( '~\/videos\.php$~', $script_name )
      ? '<li class="page_hover_wider">影片廊</li>'
      : '<li class="wider"><a href="videos.php">影片廊</a></li>';

   $tab3 = preg_match( '~\/deck-plan-\d+(-\d+)?\.php$~', $script_name )
      ? '<li class="page_hover_wider">甲板圖</li>'
      : '<li class="wider"><a href="deck-plan-2.php">甲板圖</a></li>';

   $tab4 = preg_match( '~\/voyager\.php$~', $script_name )
      ? '<li class="page_hover_wider">郵輪規格</li>'
      : '<li class="wider"><a href="voyager.php">郵輪規格</a></li>';
?>
<ul class="wider"><?php echo "$tab1\n$tab2\n$tab3\n$tab4"?></ul>