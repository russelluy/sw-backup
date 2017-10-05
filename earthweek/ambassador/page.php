<?php get_header(); ?>

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


	<div class="wrapper">
		
		<div id="main" class="hermes-column wide">
			
			<div class="post-meta">
				<h1 class="title-l"><?php the_title(); ?></h1>
				<?php edit_post_link( __('Edit page', 'hermes_textdomain'), '<p class="postmeta">', '</p>'); ?>
				<div class="divider">&nbsp;</div>
			</div><!-- end .post-meta -->
			
			<div class="post-single">

				<?php the_content(); ?>
				
				<div class="cleaner">&nbsp;</div>
				
				<?php wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'hermes_textdomain').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div><!-- end .post-single -->

			<?php if ($hermes_options['hermes_social_sharing_pages'] == 1) { ?>
			
				<?php get_template_part('social-sharing', 'post'); ?>
			
			<?php } ?>

			<?php if ($hermes_options['hermes_page_comments'] == 1) { ?>
			
			<div id="hermes-comments">
				<?php comments_template(); ?>  
			</div><!-- end #comments -->

			<?php } ?>
			
		</div><!-- end .hermes-column.wide -->
		

			
		</aside><!-- end .hermes-column.last -->
		
		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper-->

</div><!-- end #content -->

<?php endwhile; ?>
	
<?php get_footer(); ?>