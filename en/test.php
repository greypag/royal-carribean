<!-- Add jQuery library -->
<script type="text/javascript" src="/js/fancybox/lib/jquery-1.10.1.min.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	
<style>
html, body {background:grey}
</style>

<script>
$(document).ready(function ($) {
	var url = "popup/msg.php";
	$.get(url)
		.done(function() { 
			
			$.fancybox({
				'height': '50%',
				'width': '50%',
				href: url,
				type: 'iframe'
			});
			
		})	
});
</script>