<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->

<?php
$page = $_SERVER['QUERY_STRING'];
// // travel_destid
// $destid = trim($page, "/booking/index.php/booking/stepone/id/");


// startdate

// enddate

// travel_pagetype
$page_type = '';

  if($page == '/tc/index.php'){
    $page_type = 'home';
  }elseif ($page == '/tc/result.php') {
    $page_type = 'searchresults';
  }else {
    $page_type = 'other';
  }

// totalvalue

?>

<script type="text/javascript">
var google_tag_params = {
 travel_pagetype: <?php echo $page_type ?>,
};
</script>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 859299683;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/859299683/?guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Yahoo Search -->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5565747"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5565747&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
<img src="//bat.bing.com/action/0?ti=5565747&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" />

<!-- Yahoo Native Ad -->
<script type="application/javascript">(function(w,d,t,r,u){w[u]=w[u]||[];w[u].push({'projectId':'10000','properties':{'pixelId':'413616'}});var s=d.createElement(t);s.src=r;s.async=true;s.onload=s.onreadystatechange=function(){var y,rs=this.readyState,c=w[u];if(rs&&rs!="complete"&&rs!="loaded"){return}try{y=YAHOO.ywa.I13N.fireBeacon;w[u]=[];w[u].push=function(p){y([p])};y(c)}catch(e){}};var scr=d.getElementsByTagName(t)[0],par=scr.parentNode;par.insertBefore(s,scr)})(window,document,"script","https://s.yimg.com/wi/ytc.js","dotq");</script>
<img src="https://sp.analytics.yahoo.com/spp.pl?a=10000&.yp=413616"/>
