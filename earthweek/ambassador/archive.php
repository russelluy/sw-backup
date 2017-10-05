<?php get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>

<div id="content" class="no-slideshow">
	
	<div class="wrapper">
	
		<div class="hermes-column wide">
			
			<div class="widget">

				<h2 class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php /* tag archive */ if( is_tag() ) { ?><?php _e('Post Tagged with:', 'hermes_textdomain'); ?> "<?php single_tag_title(); ?>"
				<?php /* daily archive */ } elseif (is_day()) { ?><?php _e('Archive for', 'hermes_textdomain'); ?> <?php the_time('F jS, Y'); ?>
				<?php /* search archive */ } elseif (is_month()) { ?><?php _e('Archive for', 'hermes_textdomain'); ?> <?php the_time('F, Y'); ?>
				<?php /* yearly archive */ } elseif (is_year()) { ?><?php _e('Archive for', 'hermes_textdomain'); ?> <?php the_time('Y'); ?>
				<?php } ?></h2>
				
				<?php get_template_part('loop'); ?>

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

	</div><!-- end .wrapper-->

</div><!-- end #content -->
	
<?php get_footer(); ?>