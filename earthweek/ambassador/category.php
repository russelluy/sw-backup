<?php get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>

<div id="content" class="no-slideshow">
	
	<div class="wrapper">
	
		<div class="hermes-column wide">
			
			<div class="widget">

				<h2 class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php single_cat_title(); ?></h2>
				
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