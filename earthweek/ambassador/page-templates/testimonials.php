<?php
/**
 * Template Name: Testimonials List
 */

get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>

<div id="content" class="no-slideshow">
	
	<div class="wrapper">
		
		<?php while (have_posts()) : the_post(); ?>

		<div class="hermes-column wide">
			
			<div class="post-meta">
				<h1 class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php the_title(); ?></h1>
				<?php edit_post_link( __('Edit page', 'hermes_textdomain'), '<p class="postmeta">', '</p>'); ?>
			</div><!-- end .post-meta -->
			
			<div class="post-single">

				<?php the_content(); ?>
				
				<div class="cleaner">&nbsp;</div>
				
				<?php wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'hermes_textdomain').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div><!-- end .post-single -->

			<?php get_template_part('loop-testimonials', 'all'); ?>

			<?php if ($hermes_options['hermes_social_sharing_pages'] == 1) { ?>
			
				<?php get_template_part('social-sharing', 'page'); ?>
			
			<?php } ?>

		</div><!-- end .hermes-column.wide -->
		
		<?php endwhile; ?>
		
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