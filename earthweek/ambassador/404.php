<?php get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>

<div id="content" class="no-slideshow">
	
	<div class="wrapper">
		
		<div class="hermes-column wide">
			
			<div class="post-meta">
				<h1 class="title-l"><?php _e('Page not found', 'hermes_textdomain'); ?></h1>
				<p><?php _e( 'Apologies, but the requested page cannot be found. Perhaps searching will help find a related page.', 'hermes_textdomain' ); ?></p>
			</div><!-- end .post-meta -->
			
			<div class="post-single">

				<p class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php _e( 'Search for missing page', 'hermes_textdomain' ); ?></p>
				<?php get_search_form(); ?>

				<div class="cleaner">&nbsp;</div>
				
				<p class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php _e( 'Browse Categories', 'hermes_textdomain' ); ?></p>
				<ul>
					<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
				</ul>
			
				<p class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php _e( 'Monthly Archives', 'hermes_textdomain' ); ?></p>
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
				</ul>

			</div><!-- end .post-single -->

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