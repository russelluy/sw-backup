<?php
/**
 * Footer Template
 *
 */
?>

		<div id="footer_wrap">
					<div id="footer">
						 	<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>	
					</div>
		</div><!-- #footer -->

						<?php do_atomic( 'footer' ); // NorcalTheme_footer ?>
						<?php do_atomic( 'close_footer' ); // NorcalTheme_close_footer ?>
						<?php do_atomic( 'after_footer' ); // NorcalTheme_after_footer ?>
						<?php do_atomic( 'close_body' ); // NorcalTheme_close_body ?>
						<?php wp_footer(); // wp_footer ?>

</body>
</html>