<div class="widget">

<?php 
global $hermes_options;
$child_of = $post->ID;

$template = strtolower(get_post_meta($post->ID, 'hermes_rooms_template', true));
if ($template != 'list' && $template != 'grid') {
	$template = 'grid';
}

$loop = new WP_Query( array( 'post_parent' => $child_of, 'post_type' => 'page', 'nopaging' => 1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );

if ($loop->have_posts()) {
	$i = 0;
	?>

		<ul class="hermes-rooms hermes-rooms-<?php echo $template; ?>">
		
		<?php while ( $loop->have_posts() ) : $loop->the_post(); $i++; 

			$room_meta = get_post_custom($post->ID);
			$room_rate = $room_meta['hermes_room_rate'][0];  
			?>
			<li class="hermes-post hermes-room<?php if ($i % 3 == 0) {echo ' hermes-room-last';} ?>">
	
				<?php
				get_the_image( array( 'size' => 'thumb-attraction', 'width' => 290, 'height' => 180, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
				?>
				
				<div class="post-excerpt">
					<h2 class="title-post title-center title-m"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ($room_rate) { ?><p class="title-xs title-center title-caps title-ornament title-widget type-custom"><span class="value price"><?php echo $room_rate; ?></span></p><?php } ?>
					<?php if ($template == 'list') { the_excerpt(); } ?>
				</div><!-- end .post-excerpt -->
				<div class="cleaner">&nbsp;</div>
				
			</li><!-- end .hermes-room -->
		<?php endwhile; ?>
		
		</ul><!-- end .hermes-rooms -->
	<?php 
	} // if there are pages
	wp_reset_query();
	?>
	
	<div class="cleaner">&nbsp;</div>
</div><!-- end .widget -->