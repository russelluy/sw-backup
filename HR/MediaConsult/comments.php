<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?><!--wordpress needs all of the code above do not delete but you can edit the sentence-->

<!-- You can start editing here. -->
<!--if there is one comment-->
<?php if ( have_comments() ) : ?><!--you need the id comments for the links to the comments-->
	<h3 class="heading" id="comments"><?php comments_number('', 'One Response', '% Responses' );?></h3>

	<ol class="commentlist"><!--one comment-->
	<?php wp_list_comments('avatar_size=50'); ?>
	<!--end of one comment if you would like to seperate comments and pings please search for english tutorials-->
	</ol>
<!--comments navigation -->
<div class="comment_nav">
	<div class="comment_prev advancedlink"><?php previous_comments_link("Older Comments") ?></div>
	<div class="comment_next advancedlink"><?php next_comments_link("Newer Comments") ?></div>
</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
<span class="meta" id="comments"><?php comments_number('', 'One Response', '% Responses' );?></span>    
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<span class="meta">Comments are closed.</span>

	<?php endif; ?>
<?php endif; ?><!--end of comments-->

<!--beginn of the comments form-->
<?php if ('open' == $post->comment_status) : ?>

<div id="respond"><!--you need div id response for threaded comments-->

<?php comment_form_title( '<h3>Leave a Reply</h3>', '<h3>Leave a Reply to %s</h3>' ); ?>


<!--if registration is required-->
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<!--begin of the comment form read and understand -->
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<fieldset class="blog-comment-fieldset">
<ul>
<?php if ( $user_ID ) : ?>

<li>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
</li>
<?php else : ?>

<li><input type="text" name="author" class="bc-input" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"  />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></li>

<li><input type="text" name="email" class="bc-input" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></li>

<li><input type="text" name="url" class="bc-input" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></li>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<li><textarea name="comment" class="bc-textarea" id="comment" cols="54" rows="10" tabindex="4"></textarea></li>

<li><input name="submit" class="bc-submit" type="submit" id="submit" tabindex="5" value="Submit" /><?php cancel_comment_reply_link("Cancel Reply"); ?><!--to cancel the comment link or not-->
<?php comment_id_fields(); ?><!--this is necessary because wp must know which comment to which article-->

<?php do_action('comment_form', $post->ID); ?><!--some plugins needs this hook--></li>

</ul>
</fieldset>
</form>
</div>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>