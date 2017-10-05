<?php wp_reset_query(); ?>

<ul class="hermes-posts">
	
	<?php while (have_posts()) : the_post(); unset($prev); $m++; ?>
	<li <?php post_class('hermes-post'); ?>>

		<?php
		get_the_image( array( 'size' => 'thumb-loop-main', 'width' => 130, 'height' => 80, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
		?>
		
		<div class="post-excerpt">
			<h2 class="title-post title-s"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
			<p class="postmeta"><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php printf( __('%s', 'hermes_textdomain'), the_time(get_option('date_format'))); ?></time> / <span class="category"><?php the_category(', '); ?></span></p>
			<?php the_excerpt(); ?>
			<span class="more"><a href="<?php the_permalink(); ?>" rel="nofollow"><?php _e('Continue reading', 'hermes_textdomain'); ?></a></span>
		</div><!-- end .post-excerpt -->
		<div class="cleaner">&nbsp;</div>
		
	</li><!-- end .hermes-post -->
	<?php endwhile; ?>
	
</ul><!-- end .hermes-posts -->

<?php get_template_part( 'pagination'); ?>