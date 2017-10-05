<?php
	//get theme options
	$footer_text = of_get_option('footer_text', '' );
	$footer_color = of_get_option('footer_color', '' );
	$footer_class = '';

	// Footer Color
	if(!empty($footer_color)){

		// determin if dark or light
		$hex = str_replace('#', '', $footer_color);
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));

		if($r + $g + $b > 255){ //bright background, use dark font
		    $footer_class = ' light_theme';
		}
	}
?>
	</div><!-- #main .site-main -->
	<footer id="colophon" class="site-footer<?php echo $footer_class; ?>" role="contentinfo">
		<div class="clearfix" id="top-color">
			<div style="background: none repeat scroll 0% 0% #F69087;"></div>
			<div style="background: none repeat scroll 0% 0% #85CCB1;"></div>
			<div style="background: none repeat scroll 0% 0% #85A9B3;"></div>
			<div style="background: none repeat scroll 0% 0% #B0CB7A;"></div>
		</div>
		
		<?php if(!empty($footer_text)){?>
		<div class="row-fluid" id="footer-bottom">
			© 2013 Safeway Inc. All rights reserved.
		</div>	
		<?php } ?>
		<div class="container">
			<ul id="footer-body">
				<?php dynamic_sidebar('footer-widgets'); ?>
			</ul>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page -->
<?php wp_footer(); ?>

<!-- Piwik --> 
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.safeway.com/piwik/" : "http://piwik.safeway.com/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 12);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="https://piwik.safeway.com/piwik/piwik.php?idsite=12" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
</body>
</html>