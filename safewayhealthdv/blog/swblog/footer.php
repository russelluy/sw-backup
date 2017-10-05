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
					<span>
						<a href="http://safewayhealth.com/contact-us">Contact Us</a> | <a href="http://safewayhealth.com/careers">Careers</a><br />
						<h5>© 2013 Safeway Health Inc. All rights reserved.</h5>
					</span> 
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
</body>
</html>