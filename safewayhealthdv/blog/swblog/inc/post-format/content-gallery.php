<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
	<div class="entry-image entry-slider">
		<div class="entry-slides<?php echo ((count($images) > 1) ? ' nivo-slider' : '') ?>">
			<?php foreach( $images as $image ) :  ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'swblog'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php echo wp_get_attachment_image($image->ID, 'gallery-large'); ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="entry-container">
		<div class="post-format-badge post-format-image">
			<i></i>
		</div>
	<?php }else{ ?>
	<header class="entry-header">
		<div class="post-format-badge post-format-image">
			<i></i>
		</div>
	</header><!-- .entry-header -->
	<div class="entry-container">
	<?php } ?>

		<div class="entry-content">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="post-meta">
				<?php get_template_part( 'inc/meta-top' ); ?>
			</div>
			<?php 
				if(of_get_option('enable_excerpt')){
					the_excerpt();
				}else{
					echo str_replace(']]>', ']]&gt;', apply_filters('the_content', preg_replace('#<img[^>]*>#i', '', get_the_content(__('Continue reading...', 'swblog')))));
				}
			?>						
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'swblog' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->
	<?php if(!of_get_option('disable_footer_post')){ ?>
	<footer class="entry-meta clearfix">
		<?php get_template_part( 'inc/meta-bottom' ); ?>
	</footer><!-- .entry-meta -->
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
