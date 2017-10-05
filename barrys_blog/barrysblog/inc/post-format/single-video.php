<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-video">
		<?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
	</div>

	<div class="entry-container">

		<div class="post-format-badge post-format-video">
			<i></i>
		</div>
		<div class="entry-content">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="post-meta">
				<?php get_template_part( 'inc/meta-top' ); ?>
			</div>			
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'barry' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->
	<?php if(!of_get_option('disable_footer_post')){ ?>
	<footer class="entry-meta clearfix">
		<?php get_template_part( 'inc/meta-bottom' ); ?>
	</footer><!-- .entry-meta -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->