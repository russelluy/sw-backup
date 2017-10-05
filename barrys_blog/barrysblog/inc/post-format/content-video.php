<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 

	$content = get_post_meta($post->ID, '_format_video_embed', true);
	$content = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?wmode=opaque"$3>', $content);
	$content = preg_replace('#\<iframe(.*?)\ssrc\=\"(.*?)\?(.*?)\?(.*?)\"(.*?)\>#i', '<iframe$1 src="$2?$3&$4"$5>', $content);
	
	if(!empty($content)){ ?>
	<div class="entry-video">
		<?php echo $content; ?>
	</div>
	<div class="entry-container">
		<div class="post-format-badge post-format-video">
			<i></i>
		</div>	
	<?php }else{ ?>
	<header class="entry-header">
		<div class="post-format-badge post-format-video">
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
					the_content(__('Continue reading...', 'barry')); 
				}
			?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'barry' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

	</div><!-- .entry-container -->
	<?php if(!of_get_option('disable_footer_post')){ ?>
	<footer class="entry-meta clearfix">
		<?php get_template_part( 'inc/meta-bottom' ); ?>
	</footer><!-- .entry-meta -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->