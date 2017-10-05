<?php

?>
<script type="text/javascript">
				jQuery(window).load(function(){
					jQuery('.nivo-controlNav a').trigger('click');
			});
</script>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fourth-footer-widget-area')) { ?>
							<?php } ?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</div><!-- #main -->
</body>
</html>
