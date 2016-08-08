<?php $script_name = @$_SERVER['SCRIPT_NAME'];
   $tab1 = preg_match( '~\/onboard-experience\.php$~', $script_name )
      ? '<li class="page_hover-190">Onboard Experience</li>'
      : '<li class="wider-190"><a href="onboard-experience.php">Onboard Experience</a></li>';

   $tab2 = preg_match( '~\/videos\.php$~', $script_name )
      ? '<li class="page_hover">Videos</li>'
      : '<li><a href="videos.php">Videos</a></li>';

   $tab3 = preg_match( '~\/deck-plan-\d+(-\d+)?\.php$~', $script_name )
      ? '<li class="page_hover">Deck Plan</li>'
      : '<li><a href="deck-plan-2.php">Deck Plan</a></li>';

   $tab4 = preg_match( '~\/voyager\.php$~', $script_name )
      ? '<li class="page_hover-190">Specifications</li>'
      : '<li class="wider-190"><a href="voyager.php">Specifications</a></li>';
?>
<ul class="wider-190" style="width: 650px;"><?php echo "$tab1\n$tab2\n$tab3\n$tab4"?></ul>