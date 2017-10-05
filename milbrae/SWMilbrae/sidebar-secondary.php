<?php
/**
 * Secondary Sidebar Template
 *
 */

if ( is_active_sidebar( 'secondary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_secondary' ); // SWMilbrae_before_sidebar_secondary ?>

	<div id="sidebar-secondary" class="sidebar">

		<?php do_atomic( 'open_sidebar_secondary' ); // SWMilbrae_open_sidebar_secondary ?>

		<?php dynamic_sidebar( 'secondary' ); ?>

		<?php do_atomic( 'close_sidebar_secondary' ); // SWMilbrae_close_sidebar_secondary ?>

	</div><!-- #sidebar-secondary .aside -->

	<?php do_atomic( 'after_sidebar_secondary' ); // SWMilbrae_after_sidebar_secondary ?>

<?php endif; ?>