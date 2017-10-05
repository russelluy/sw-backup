<div class="hermes-column full last">

	<div class="widget">

	<?php 
	global $hermes_options;
	
	$child_of = $post->ID;
	
	$loop = new WP_Query( array( 'post_parent' => $child_of, 'post_type' => 'page', 'nopaging' => 1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
	
	if ($loop->have_posts()) {
		$i = 0;
		?>

			<ul class="hermes-attractions">
			
			<?php while ( $loop->have_posts() ) : $loop->the_post(); $i++; 
			$attraction_distance = get_post_meta($post->ID, 'hermes_attraction_distance', true);
			?>
				<li class="hermes-attraction<?php if ($i % 3 == 0) { echo ' last'; } elseif ($i % 3 == 1) { echo ' first'; } ?>">
		
					<?php
					get_the_image( array( 'size' => 'thumb-attraction', 'width' => 290, 'height' => 180, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
					?>
					
					<div class="post-excerpt">
						<h2 class="title-post title-s title-center"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php if ($attraction_distance) { ?><p class="postmeta"><?php _e('Distance from Hotel','hermes_textdomain'); ?>: <?php echo $attraction_distance; ?></p><?php } ?>
					</div><!-- end .post-excerpt -->
					<div class="cleaner">&nbsp;</div>
					
				</li><!-- end .hermes-attraction -->
			<?php endwhile; ?>
			
			</ul><!-- end .hermes-attractions -->
		<?php 
		} // if there are pages
		wp_reset_query();
		?>
		
		<div class="cleaner">&nbsp;</div>
	</div><!-- end .widget -->
	
</div><!-- end .hermes-column.last -->