<?php
/**
 * Template Name: Room Type
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
		
		<div id="main" class="hermes-column wide">
			
			<div class="post-meta">
				<h1 class="title-l"><?php the_title(); ?></h1>
				<?php edit_post_link( __('Edit page', 'hermes_textdomain'), '<p class="postmeta">', '</p>'); ?>
				<div class="divider">&nbsp;</div>
			</div><!-- end .post-meta -->
			
			<div class="post-single">

				<?php the_content(); ?>
				
				<div class="cleaner">&nbsp;</div>

				<?php
				$room_meta = get_post_custom($post->ID);
				$room_rate = $room_meta['hermes_room_rate'][0]; 
				$room_quantity = $room_meta['hermes_room_quantity'][0]; 
				$room_occupancy = $room_meta['hermes_room_occupancy'][0]; 
				$room_size = $room_meta['hermes_room_size'][0]; 
				$room_breakfast = $room_meta['hermes_room_breakfast'][0]; 
				?>
				
				<?php if ($room_rate) { ?><p class="title-xs title-center title-caps title-ornament title-widget type-custom"><span class="value price"><?php echo $room_rate; ?></span></p><?php } ?>

				<ul class="hermes-rooms-meta">
					<?php if ($room_quantity) { ?><li class="hermes-room-meta"><span class="label"><?php _e('Rooms of this type','hermes_textdomain'); ?>:</span> <span class="value"><?php echo $room_quantity; ?></span></li><?php } ?>
					<?php if ($room_occupancy) { ?><li class="hermes-room-meta"><span class="label"><?php _e('Maximum occupancy','hermes_textdomain'); ?>:</span> <span class="value"><?php echo $room_occupancy; ?></span></li><?php } ?>
					<?php if ($room_size) { ?><li class="hermes-room-meta"><span class="label"><?php _e('Room size','hermes_textdomain'); ?>:</span> <span class="value"><?php echo $room_size; ?></span></li><?php } ?>
					<?php if ($room_breakfast == 'on') { ?><li class="hermes-room-meta"><span class="label"><?php _e('Breakfast included','hermes_textdomain'); ?>:</span> <span class="value"><?php _e('Yes','hermes_textdomain'); ?></span></li><?php } ?>
				</ul><!-- end .hermes-rooms-meta -->
				
				<?php wp_link_pages(array('before' => '<p class="page-navigation"><strong>'.__('Pages', 'hermes_textdomain').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div><!-- end .post-single -->

			<?php if ($hermes_options['hermes_social_sharing_pages'] == 1) { ?>
			
				<?php get_template_part('social-sharing', 'page'); ?>
			
			<?php } ?>
			
			<?php if ($hermes_options['hermes_page_comments'] == 1) { ?>
			
			<div id="hermes-comments">
				<?php comments_template(); ?>  
			</div><!-- end #comments -->

			<?php } ?>
			
		</div><!-- end .hermes-column.wide -->
		
		<aside class="hermes-column last">
		
			<?php get_template_part('related-pages'); ?>

			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> <?php endif;
			?>

			<div class="cleaner">&nbsp;</div>
			
		</aside><!-- end .hermes-column.last -->
		
		<div class="cleaner">&nbsp;</div>
		
		<?php if (is_active_sidebar('prefooter-wide') || is_active_sidebar('prefooter-narrow')) { ?>
		
		<div class="divider divider-main">&nbsp;</div>
	
		<div class="hermes-column wide">
			
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pre-Footer: 2/3 Column') ) : ?> <?php endif;
			?>
			
		</div><!-- end .hermes-column.wide -->
		
		<div class="hermes-column last">
		
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Pre-Footer: 1/3 Column') ) : ?> <?php endif;
			?>
			
			<div class="cleaner">&nbsp;</div>
			
		</div><!-- end .hermes-column.last -->
		
		<div class="cleaner">&nbsp;</div>
		
		<?php } ?>

	</div><!-- end .wrapper-->

</div><!-- end #content -->
	
<?php endwhile; ?>
	
<?php get_footer(); ?>