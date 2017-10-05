<?php
/**
 * The template for displaying any single page.
 *
 */
$layout = of_get_option('side_bar');
$layout = (empty($layout)) ? 'right_side' : $layout;
get_header(); 
?>
	<div id="primary" class="row">

		<?php if($layout == 'left_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>	

		<div id="content" class="<?php echo ($layout == 'single') ? 'span12' : 'span9'; ?>" role="main">
		
			<?php if(have_posts()){ 
			
				while ( have_posts() ) : the_post(); 
				?>
				<article class="type-page">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="the-content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div><!-- the-content -->
				</article>
				<?php if(!of_get_option('disable_footer_page')){ ?>
				<footer class="entry-meta clearfix">
					<?php get_template_part( 'inc/meta-bottom' ); ?>
				</footer><!-- .entry-meta -->					
				<?php } ?>

				<?php endwhile; ?>

			<?php }else{ ?>
				
				<article class="type-page">
					<h1 class="404"><?php _e('Page not found', 'swblog'); ?></h1>
				</article>

			<?php } ?>

		</div><!-- #content .site-content -->

		<?php if($layout == 'right_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>		
			
	</div><!-- #primary .content-area -->
<?php get_footer(); ?>