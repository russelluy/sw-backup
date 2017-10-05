<?php
/**
 * Loop Nav Template
 *
 */
?>

	<?php if ( is_attachment() ) : ?>

		<div class="loop-nav">
			<?php previous_post_link( '%link', '<span class="previous">' . __( '&larr; Return to entry', 'SWMilbrae' ) . '</span>' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( is_singular( 'post' ) ) : ?>

		<div class="loop-nav">
			<?php previous_post_link( '<div class="previous">' . __( '%link', 'SWMilbrae' ) . '</div>', '&larr; %title' ); ?>
			<?php next_post_link( '<div class="next">' . __( '%link', 'SWMilbrae' ) . '</div>', '%title &rarr;' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination(); ?>

	<?php elseif ( !is_singular() && $nav = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<span class="previous">' . __( '&larr; Previous', 'SWMilbrae' ) . '</span>', 'nxtlabel' => '<span class="next">' . __( 'Next &rarr;', 'SWMilbrae' ) . '</span>' ) ) ) : ?>

		<div class="loop-nav">
			<?php echo $nav; ?>
		</div><!-- .loop-nav -->

	<?php endif; ?>