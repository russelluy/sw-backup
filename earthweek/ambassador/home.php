<?php get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>
<div id="sshow" >
<?php get_template_part('slideshow', 'home'); ?>
</div>
<div id="content" >
	
	<div class="wrapper">
			
		<div class="bcard1">
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pre-Footer: 2/3 Column') ) : ?> <?php endif;
			?>
			<div class="cleaner">&nbsp;</div>
		</div>
		

		<div class="cleaner">&nbsp;</div>
		
		<?php if (is_active_sidebar('prefooter-wide') || is_active_sidebar('prefooter-narrow') || is_active_sidebar('prefooter-full')) { ?>
		

		<div id="prefooter">
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('prefooter-full') ) : ?> <?php endif;
			?>
		</div><!-- end #prefooter -->

		<?php } ?>

		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper-->

</div><!-- end #content -->
	
<?php get_footer(); ?>
