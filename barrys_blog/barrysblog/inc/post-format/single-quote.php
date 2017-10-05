<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="entry-image">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'barry'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			<?php the_post_thumbnail('standard'); ?>
		</a>
	</div>
	<div class="entry-container">
		<div class="post-format-badge post-format-quote">
			<i></i>
		</div>	
	<?php }else{ ?>
	<header class="entry-header">
		<div class="post-format-badge post-format-quote">
			<i></i>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-container">
	<?php } ?>
		<div class="entry-content">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_content() ?></a></h1>
			<a href="<?php echo get_post_meta($post->ID, '_format_quote_source_url', true); ?>" target="_blank">- <?php echo get_post_meta($post->ID, '_format_quote_source_name', true); ?></a>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->
	<?php if(!of_get_option('disable_footer_post')){ ?>
	<footer class="entry-meta clearfix">
		<?php get_template_part( 'inc/meta-bottom' ); ?>
	</footer><!-- .entry-meta -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->