<?php
/**
 * Archive Template
 *
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>
	
	<div class="content-wrap">
		
		<?php do_atomic( 'before_content' ); // NorcalTheme_before_content ?>

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // NorcalTheme_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // NorcalTheme_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
	
							<?php do_atomic( 'open_entry' ); // NorcalTheme_open_entry ?>
	
							<?php if ( current_theme_supports( 'get-the-image' ) ) {
											
								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'archive-thumbnail', 'image_class' => 'featured', 'attachment' => false, 'width' => 470, 'height' => 140, 'default_image' => get_template_directory_uri() . '/images/archive-thumbnail-placeholder.gif' ) );							
									
							} ?>
	
							<div class="entry-header">
										
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
									
								<?php echo apply_atomic_shortcode( 'byline_date', '<div class="byline byline-date">' . __( '[entry-published]', 'NorcalTheme' ) . '</div>' ); ?>
				
								<?php echo apply_atomic_shortcode( 'byline_author', '<div class="byline byline-author">' . __( 'by [entry-author]', 'NorcalTheme' ) . '</div>' ); ?>
				
								<?php echo apply_atomic_shortcode( 'byline_edit', '<div class="byline byline-edit">' . __( '[entry-edit-link]', 'NorcalTheme' ) . '</div>' ); ?>
			
							</div>
	
							<?php echo apply_atomic_shortcode( 'byline_category', '<div class="byline byline-cat">' . __( '[entry-terms taxonomy="category" before=""]', 'NorcalTheme' ) . '</div>' ); ?>
								
							<div class="entry-summary">
								
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'NorcalTheme' ), 'after' => '</p>' ) ); ?>
								
							</div>
								
							<a class="read-more" href="<?php the_permalink(); ?>">Read Article &rarr;</a>
	
							<?php do_atomic( 'close_entry' ); // NorcalTheme_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // NorcalTheme_after_entry ?>
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // NorcalTheme_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // NorcalTheme_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>