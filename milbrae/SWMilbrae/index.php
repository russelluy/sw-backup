<?php
/**
 * Index Template
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
	
							<?php if ( current_theme_supports( 'get-the-image' ) ) {
											
								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'archive-thumbnail', 'image_class' => 'featured', 'width' => 470, 'height' => 140, 'default_image' => get_template_directory_uri() . '/images/archive-thumbnail-placeholder.gif' ) );							
									
							} ?>
	
							<div class="entry-header">
										
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
								
								<?php echo apply_atomic_shortcode( 'byline_date', '<div class="byline byline-date">' . __( '[entry-published]', 'SWMilbrae' ) . '</div>' ); ?>
			
								<?php echo apply_atomic_shortcode( 'byline_author', '<div class="byline byline-author">' . __( 'by [entry-author]', 'SWMilbrae' ) . '</div>' ); ?>
			
								<?php echo apply_atomic_shortcode( 'byline_edit', '<div class="byline byline-edit">' . __( '[entry-edit-link]', 'SWMilbrae' ) . '</div>' ); ?>
		
							</div>

							<?php echo apply_atomic_shortcode( 'byline_category', '<div class="byline byline-cat">' . __( '[entry-terms taxonomy="category" before=""]', 'SWMilbrae' ) . '</div>' ); ?>
							
							<div class="entry-summary">
								
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'SWMilbrae' ), 'after' => '</p>' ) ); ?>
								
							</div>
								
							<a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'SWMilbrae' ); ?> &rarr;</a>
	
							<?php do_atomic( 'close_entry' ); // SWMilbrae_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // SWMilbrae_after_entry ?>
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // SWMilbrae_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // SWMilbrae_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>