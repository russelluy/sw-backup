<?php
/**
 * Primary Sidebar Template
 *
 */

//get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.

if ( is_active_sidebar( 'primary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_primary' ); // NorcalTheme_before_sidebar_primary ?>

	<div id="sidebar-primary" class="sidebar">

		<?php do_atomic( 'open_sidebar_primary' ); // NorcalTheme_open_sidebar_primary ?>
		
		<?php dynamic_sidebar( 'primary' ); ?>

		<?php do_atomic( 'close_sidebar_primary' ); // NorcalTheme_close_sidebar_primary ?>

	</div><!-- #sidebar-primary .aside -->

	<?php do_atomic( 'after_sidebar_primary' ); // NorcalTheme_after_sidebar_primary ?>

<?php endif; ?>