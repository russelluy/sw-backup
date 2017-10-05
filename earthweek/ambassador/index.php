<?php get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>
<div id="background"><img src="<?php bloginfo('template_directory') ?>/images/bg.png" class="stretch" alt="" />
<div id="content">
	
	<?php get_template_part('slideshow', 'home'); ?>
	
	<div class="wrapper">
	
		<?php
		if ($hermes_options['hermes_featured_pages_display'] == 1 && is_home() && $paged < 2) {
			get_template_part('featured-pages');
		} 
		?>
		
		<div class="hermes-column wide">
			
			<div class="widget">

				<h2 class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php _e('Recent News','hermes_textdomain'); ?></h2>
				
				<?php get_template_part('loop', 'index'); ?>

				<div class="cleaner">&nbsp;</div>
			</div><!-- end .widget -->
			
		</div><!-- end .hermes-column.wide -->
		
		<aside class="hermes-column last">
		
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> <?php endif;
			?>

			<div class="cleaner">&nbsp;</div>
			
		</aside><!-- end .hermes-column.last -->
		
		<div class="cleaner">&nbsp;</div>
		
		<?php if (is_active_sidebar('prefooter-wide') || is_active_sidebar('prefooter-narrow') || is_active_sidebar('prefooter-full')) { ?>
		
		<div class="divider divider-main">&nbsp;</div>
	
		<div class="hermes-column wide">
			
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pre-Footer: 2/3 Column') ) : ?> <?php endif;
			?>
			<div class="cleaner">&nbsp;</div>
			
		</div><!-- end .hermes-column.wide -->
		
		<div class="hermes-column last">
		
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pre-Footer: 1/3 Column') ) : ?> <?php endif;
			?>
			
			<div class="cleaner">&nbsp;</div>
			
		</div><!-- end .hermes-column.last -->
		
		<div class="cleaner">&nbsp;</div>
		
		<div class="divider divider-blank">&nbsp;</div>

		<div id="prefooter">
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('prefooter-full') ) : ?> <?php endif;
			?>
		</div><!-- end #prefooter -->

		<?php } ?>

		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper-->

</div><!-- end #content -->
	</div><!-- #background -->
<?php get_footer(); ?>