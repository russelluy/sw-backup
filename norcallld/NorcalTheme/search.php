<?php
/**
 * Search Template
 *
 */

get_header(); // Loads the header.php template. ?>


<div id="main">
	<div class="midsection">
			<div class="aside">
				<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
				<?php get_sidebar( 'primary' ); // Loads the sidebar-secondary.php template. ?>
			</div>
			<div class="zlide_wrap">
			
					<h1 class="search_h">Search Results</h1>
					<div id="contentb">
												<div class="hfeed">
												
													
													<?php if ( have_posts() ) : ?>
													
									
													<?php while ( have_posts() ) : the_post(); ?>
									
									
									
														<?php do_atomic( 'before_entry' ); // NorcalTheme_before_entry ?>
									
															<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
									
															<?php do_atomic( 'open_entry' ); // NorcalTheme_open_entry ?>
															
									
									
																<div class="entry-summary">
																<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
																
																<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'NorcalTheme' ) ); ?>
																
																<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'NorcalTheme' ), 'after' => '</p>' ) ); ?>
																
															</div>
															
															
																
															<a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read Article', 'NorcalTheme' ); ?> &rarr;</a>
									
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
					<div class="message">
							<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>
					</div>
			</div>
	
					<?php do_atomic( 'before_content' ); // NorcalTheme_before_content ?>
	
					<div class="content-wrap">
								
								<?php do_atomic( 'after_content' ); // NorcalTheme_after_content ?>
					</div><!-- .content-wrap -->
								<?php do_atomic( 'close_main' ); // NorcalTheme_close_main ?>
								<?php do_atomic( 'after_main' ); // NorcalTheme_after_main ?>
								
		</div><!-- #midsection -->	
</div><!-- #main -->
		<?php do_atomic( 'before_footer' ); // NorcalTheme_before_footer ?>
		<?php get_footer(); // Loads the footer.php template. ?>