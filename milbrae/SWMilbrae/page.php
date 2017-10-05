<?php
/**
 * Page Template
 *
 */

get_header(); // Loads the header.php template. ?>
<div class="dividerbar">
</div>
<div class="midsection">
	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		
	
	</div>
			<div class="zlide_wrap">
					<div class="zlideb">
							
							<div class="entry-header">
										
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
										<div id="contentb">
												<div class="hfeed">
													<?php if ( have_posts() ) : ?>
									
													<?php while ( have_posts() ) : the_post(); ?>
									
									
									
														<?php do_atomic( 'before_entry' ); // SWMilbrae_before_entry ?>
									
															<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
									
															<?php do_atomic( 'open_entry' ); // SWMilbrae_open_entry ?>
															
									
									
																<div class="entry-summary">
																
																
																<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'SWMilbrae' ) ); ?>
																
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
							
		
							</div>
							<div class="zlide_bottomb"></div>	
					</div>
						
			</div>
			
				
	</div><!-- #midsection -->
	
	<?php do_atomic( 'before_content' ); // SWMilbrae_before_content ?>
	
	<div class="content-wrap2">
		
		

	
		<?php do_atomic( 'after_content' ); // SWMilbrae_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>