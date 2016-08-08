<!--调用尾部js-->
<?php include 'slideshow-script.php'; ?>
<script type="text/javascript">RCCLFooterSEO();</script>
<script type="text/javascript" charset="UTF-8">RCCLFooter();</script><!--</form>-->
<style type="text/css">
	#warning { width: 320px; height: 240px; position: fixed; z-index: 999; left: 50%; top: 50%; margin: -127px 0 0 -167px; background: rgb(1,25,99); color: #fff; padding: 10px; border: 4px #fff solid}
	#closeWarning { position: absolute; right: 5px; top: 5px; cursor: pointer}
</style>
<script type="text/javascript">
	$('#closeWarning').click(function (e) {
		$('#warning').hide();
	});
	if ($.browser.msie) {
		//$('#homeKVBtn').css('z-index', 6);
		//$('#smain').css('z-index', 5);
	} 
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQ6R39"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script> // Force insertion into body head to pass Google Tag assistant
var s = document.createElement('script'), body = document.body;
s.innerHTML = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});"
+"var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googleta"
+"gmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-"+"5JP44D');";
body.insertBefore( s, body.children[0] );
</script>
<!-- End Google Tag Manager -->
</body>
</html>