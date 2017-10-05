<?php
/**
 * Template Name: Rooms List
 */

get_header(); ?>

<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 
?>

<?php 
while (have_posts()) : the_post();

$post_meta = get_post_custom($post->ID);
$display_featured = $post_meta['hermes_post_display_featured'][0];
$display_slideshow = $post_meta['hermes_post_display_slideshow'][0];
$slideshow_autoplay = $post_meta['hermes_post_display_slideshow_autoplay'][0];
$slideshow_speed = $post_meta['hermes_post_display_slideshow_speed'][0];
if (!$slideshow_speed) {
	$slideshow_speed = 4000;
}
?>

<div id="content"<?php if ($display_featured == 'No' || !$display_featured) { echo ' class="no-slideshow"'; } ?>> 
	
	<?php 
	if ($display_featured == 'Yes') {
	
		get_template_part('slideshow');
	
	}
	?>

	<div class="wrapper">
		
		<div class="post-meta">
			<h1 class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php the_title(); ?></h1>
			<?php edit_post_link( __('Edit page', 'hermes_textdomain'), '<p class="postmeta">', '</p>'); ?>
		</div><!-- end .post-meta -->
		
		<div class="post-single">

			<?php the_content(); ?>
			
			<div class="cleaner">&nbsp;</div>
			
			<?php wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'hermes_textdomain').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		</div><!-- end .post-single -->

		<?php get_template_part('loop-rooms'); ?>

		<?php if ($hermes_options['hermes_social_sharing_pages'] == 1) { ?>
		
			<?php get_template_part('social-sharing', 'page'); ?>
		
		<?php } ?>

		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper-->

</div><!-- end #content -->

<?php endwhile; ?>
	
<?php get_footer(); ?>