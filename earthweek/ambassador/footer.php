<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>
	<footer>
	
		<div class="wrapper">

			<?php if ($hermes_options['hermes_footer_sidebars_display'] == 1) { ?>

			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 1') ) : ?> <?php endif; ?>
				<div class="cleaner">&nbsp;</div>
			</div><!-- end .column -->
			
			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 2') ) : ?> <?php endif; ?>
				<div class="cleaner">&nbsp;</div>
			</div><!-- end .column -->
			
			<div class="column">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 3') ) : ?> <?php endif; ?>
				<div class="cleaner">&nbsp;</div>
			</div><!-- end .column -->

			<div class="column column-wide column-last">
				
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Column 4') ) : ?> <?php endif; ?>

				<div class="cleaner">&nbsp;</div>

			</div><!-- end .column .column-wide -->
			
			<div class="cleaner">&nbsp;</div>
			<div class="divider"></div>
			
			<?php } ?>

			<a href="http://cc.safeway.com/forms/volunteer/index.html" target="_blank"><img src="<?php bloginfo('template_directory') ?>/images/footer.png" alt="" /></a>
		</div><!-- end .wrapper -->
	
	</footer>

</div><!-- end #container -->

<?php 
wp_footer(); 
wp_reset_query();
if (is_singular()) { ?>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	<?php } ?>
	
	<?php print(stripslashes($hermes_options['hermes_script_footer'])); ?>
</body>
</html>