<?php
/**
 * Comment Template
 *
 */

	global $post, $comment;
?>

	<li id="comment-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">

		<?php do_atomic( 'before_comment' ); // SWMilbrae_before_comment ?>

		<div class="comment-wrap">

			<?php do_atomic( 'open_comment' ); // SWMilbrae_open_comment ?>

			<?php echo hybrid_avatar(); ?>

			<?php echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta">[comment-author] [comment-published] [comment-edit-link before="&middot; "] &middot; [comment-reply-link before="" after=" &rarr;"]</div>' ); ?>

			<div class="comment-content comment-text">
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
				
					<?php echo apply_atomic_shortcode( 'comment_moderation', '<p class="alert moderation">' . __( 'Your comment is awaiting moderation.', 'SWMilbrae' ) . '</p>' ); ?>
					
				<?php endif; ?>

				<?php comment_text( $comment->comment_ID ); ?>
			</div><!-- .comment-content .comment-text -->

			<?php do_atomic( 'close_comment' ); // SWMilbrae_close_comment ?>

		</div><!-- .comment-wrap -->

		<?php do_atomic( 'after_comment' ); // SWMilbrae_after_comment ?>

	<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>