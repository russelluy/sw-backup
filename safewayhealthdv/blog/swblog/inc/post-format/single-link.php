<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="entry-image">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'swblog'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			<?php the_post_thumbnail('standard'); ?>
		</a>
	</div>
	<div class="entry-container">
		<div class="post-format-badge post-format-link">
			<i></i>
		</div>	
	<?php }else{ ?>
	<header class="entry-header">
		<div class="post-format-badge post-format-link">
			<i></i>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-container">
	<?php } ?>

		<div class="entry-content">
			<h1 class="entry-title"><a href="<?php echo esc_attr(get_post_meta($post->ID, '_format_link_url', true)); ?>" target="_blank" rel="nofollow"><?php the_title(); ?></a></h1>
			<div class="post-meta">
				<?php get_template_part( 'inc/meta-top' ); ?>
			</div>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'swblog' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->
	<?php if(!of_get_option('disable_footer_post')){ ?>
	<footer class="entry-meta clearfix">
		<?php get_template_part( 'inc/meta-bottom' ); ?>
	</footer><!-- .entry-meta -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->