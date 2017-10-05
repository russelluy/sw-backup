<?php
/**
 * 404 Template
 *
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); // Loads the header.php template. ?>



<div id="main">
	<div class="midsection">
			<div class="aside">
				<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
				<?php get_sidebar( 'primary' ); // Loads the sidebar-secondary.php template. ?>
			</div>
			<div class="zlide_wrap">
							<div id="contentb">
	
			<?php do_atomic( 'open_content' ); // NorcalTheme_open_content ?>
	
			<div class="hfeed">
	
				<div id="post-0" class="<?php hybrid_entry_class(); ?>">
	
					<h1 class="error-404-title entry-title"><?php _e( 'Not Found', 'NorcalTheme' ); ?></h1>
	
					<div class="entry-content">
	
						<p>
						<?php printf( __( 'You tried going to %1$s, and it doesn\'t exist. All is not lost! You can search for what you\'re looking for.', 'NorcalTheme' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
						</p>
	
						<?php get_search_form(); // Loads the searchform.php template. ?>
	
					</div><!-- .entry-content -->
	
				</div><!-- .hentry -->
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // NorcalTheme_close_content ?>
	
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