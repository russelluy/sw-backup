<?php /* Template name: Page: No Sidebar */ 
get_header(); 
?>
	<div id="primary" class="row">

		<div id="content" class="span12" role="main">

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

	</div><!-- #primary .content-area -->
<?php get_footer(); ?>