<?php
/**
 * Template Name: Bookmarks
 *
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>

	<?php do_atomic( 'before_content' ); // SWMilbrae_before_content ?>
	
	<div class="content-wrap">	

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // SWMilbrae_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // SWMilbrae_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
	
							<?php do_atomic( 'open_entry' ); // SWMilbrae_open_entry ?>
	
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
	
							<div class="entry-content">
								
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'SWMilbrae' ) ); ?>
	
								<?php $args = array(
									'title_li' => false,
									'title_before' => '<h2>',
									'title_after' => '</h2>',
									'category_before' => false,
									'category_after' => false,
									'categorize' => true,
									'show_description' => true,
									'between' => '<br />',
									'show_images' => false,
									'show_rating' => false,
								); ?>
								<?php wp_list_bookmarks( $args ); ?>
	
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'SWMilbrae' ), 'after' => '</p>' ) ); ?>
								
							</div><!-- .entry-content -->
	
							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
	
							<?php do_atomic( 'close_entry' ); // SWMilbrae_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // SWMilbrae_after_entry ?>
	
						<?php do_atomic( 'after_singular' ); // SWMilbrae_after_singular ?>
	
					<?php endwhile; ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // SWMilbrae_close_content ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // SWMilbrae_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>