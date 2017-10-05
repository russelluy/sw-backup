<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

$layout = of_get_option('side_bar');
$layout = (empty($layout)) ? 'right_side' : $layout;
$ad_posts_mode = of_get_option('ad_posts_mode', 'none');
$ad_posts_frequency = of_get_option('ad_posts_frequency', 'none');
$ad_posts_box = of_get_option('ad_posts_box', true);
get_header(); ?>

	<div id="primary" class="row">
		
		<?php if($layout == 'left_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>	

		<div id="content" class="<?php echo ($layout == 'single') ? 'span12' : 'span9'; ?>" role="main">
		<?php 

			if( have_posts() ){ 

				$i = 1;
				while ( have_posts() ){

					the_post(); 
					get_template_part( 'inc/post-format/content', get_post_format() );

					// advertising between posts
					if($ad_posts_mode != 'none'){

						// take into account ad frequency
						if (($i % $ad_posts_frequency) == 0){

							switch ($ad_posts_mode) {
								case 'image':
									echo '<div class="'.(($ad_posts_box) ? 'box' : '').' between_posts"><a target="_blank" href="'.of_get_option('ad_posts_image_link').'"><img src="'.of_get_option('ad_posts_image').'"></a></div>';
								break;
								case 'html':
									echo '<div class="'.(($ad_posts_box) ? 'box' : '').' between_posts">'.of_get_option('ad_posts_code').'</div>';
								break;
							}
						}
					}
					$i++;
				}

			}else{ ?>
				<article class="type-page">
					<h1 class="404"><?php _e('Post not found', 'swblog'); ?></h1>
				</article>
			<?php } 

			kriesi_pagination(); 

			?> 
		</div><!-- #content -->
		<?php if($layout == 'right_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>		
	</div><!-- #primary -->
<?php get_footer(); ?>