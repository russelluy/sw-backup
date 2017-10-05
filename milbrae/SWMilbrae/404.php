<?php
/**
 * 404 Template
 *
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

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
	
				<div id="post-0" class="<?php hybrid_entry_class(); ?>">
	
					<h1 class="error-404-title entry-title"><?php _e( 'Not Found', 'SWMilbrae' ); ?></h1>
	
					<div class="entry-content">
	
						<p>
						<?php printf( __( 'You tried going to %1$s, and it doesn\'t exist. All is not lost! You can search for what you\'re looking for.', 'SWMilbrae' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
						</p>
	
						<?php get_search_form(); // Loads the searchform.php template. ?>
	
					</div><!-- .entry-content -->
	
				</div><!-- .hentry -->
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // SWMilbrae_close_content ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // SWMilbrae_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>