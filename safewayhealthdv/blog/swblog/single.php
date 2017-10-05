<?php
/**
 * The template for displaying any single post.
 *
 */
$layout = of_get_option('side_bar');
$layout = (empty($layout)) ? 'right_side' : $layout;
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row">

		<?php if($layout == 'left_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>	

		<div id="content" class="span9" role="main">

			<?php if ( have_posts() ){
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'inc/post-format/single', get_post_format() ); ?>

					<div class="single-pagination box clearfix">
						<span class="nav-previous" style="float:left;"><?php previous_post_link( '%link', '<span><i class="icon-left-open"></i>'.__('Older', 'swblog').'</span><br/><div class="post-title hidden-tablet hidden-phone">%title</div>' ); ?></span>
						<span class="nav-next" style="float:right;"><?php next_post_link( '%link', '<span>'.__('Newer', 'swblog').'<i class="icon-right-open"></i></span><br/><div class="post-title hidden-tablet hidden-phone">%title</div>' ); ?></span>
					</div>

					<?php 
					// show related posts by tag
					if(!of_get_option('disable_related_posts')){ 
					 	get_template_part( 'inc/related-posts' );
					} 
					endwhile; // OK, let's stop the post loop once we've displayed it 

					// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				
				 }else{ // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404"><?php _e('Page not found', 'swblog'); ?></h1>
				</article>

			<?php } // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div><!-- #content .site-content -->
		<?php if($layout == 'right_side'){ ?>
		<aside id="side-bar" class="span3">
				<?php get_sidebar(); ?>
		</aside>
		<?php } ?>		
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
