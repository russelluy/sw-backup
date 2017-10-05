<?php
/**
 * Index Template
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
					<div class="zlide">
								
					</div>
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
