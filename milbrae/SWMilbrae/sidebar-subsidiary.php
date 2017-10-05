<?php
/**
 * Subsidiary Sidebar Template
 *
 */

if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_subsidiary' ); // SWMilbrae_before_sidebar_subsidiary ?>

	<div id="sidebar-subsidiary" class="sidebar">

		<?php do_atomic( 'open_sidebar_subsidiary' ); // SWMilbrae_open_sidebar_subsidiary ?>

		<?php dynamic_sidebar( 'subsidiary' ); ?>

		<?php do_atomic( 'close_sidebar_subsidiary' ); // SWMilbrae_close_sidebar_subsidiary ?>

	</div><!-- #sidebar-subsidiary .aside -->

	<?php do_atomic( 'after_sidebar_subsidiary' ); // SWMilbrae_after_sidebar_subsidiary ?>

<?php endif; ?>