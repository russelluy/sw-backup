<?php 
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'safewaytheme'));
if (function_exists('post_password_required')) 
	{
	if ( post_password_required() ) 
		{ ?>
		<p class="nocomments"><?php __('This post is password protected. Enter the password to view comments.', 'safewaytheme');?></p>
		<?php 
		return;
		}
	} else 
	{
	if (!empty($post->post_password)) 
		{ // if there's a password
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) 
			{  // and it doesn't match the cookie  ?>
				<p class="nocomments"><?php __('This post is password protected. Enter the password to view comments.', 'safewaytheme');?></p>
				<?php return;
			}
		}
	}
if (function_exists('wp_list_comments')):

if ( have_comments() ) : ?>

	<?php if ( ! empty($comments_by_type['comment']) ) :
	$count = count($comments_by_type['comment']);
	($count !== 1) ? $txt = __('Comments for this entry', 'safewaytheme') : $txt = __('Comment for this entry', 'safewaytheme'); ?>
  	<h2><?php echo $count . " " . $txt; ?></h2>
  	<ul id="listcomment">
  		<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
  	</ul>
	<?php endif; ?>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
		<div class="cleared"></div>
	</div>

	<?php if ( ! empty($comments_by_type['pings']) ) :
	$countp = count($comments_by_type['pings']);
	($countp !== 1) ? $txtp = __('Trackbacks / Pingbacks for this entry ', 'safewaytheme') : $txtp = __('Trackback or Pingback for this entry', 'safewaytheme'); ?>
	<h1 id="titlecomment"><?php echo $countp . " " . $txtp; ?></h1>
	<ul id="listcomment">
		  <?php wp_list_comments('type=pings&callback=mytheme_ping'); ?>
	</ul>
	<?php endif; ?>


<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) :
		// If comments are open, but there are no comments.
	else : ?><p class="nocomments"><?php echo __('Comments are closed.', 'safewaytheme');?></p>
	<?php endif;
endif;
endif;
?>
<?php if ('open' == $post->comment_status) : ?>
<div class="related-comment-title"><h2><?php echo __('', 'safewaytheme');?></h2></div><br />
<div id="commentFormArea">                           
<?php if (function_exists('cancel_comment_reply_link')) { 
//2.7 comment loop code ?>
<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link();?></small>
</div>
<?php } ?>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php echo __('logged in');?></a> <?php echo __('to post a comment.');?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="cForm">
<fieldset>
<?php if ( $user_ID ) : ?>

<?php else : ?>
			<label for="author"><?php echo __('Name ', 'safewaytheme');?><?php if ($req) echo "<span>(required)</span>"; ?></label>
			<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"  tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="input-comment" /><br /><br />
			<label for="email"><?php echo __('Mail', 'safewaytheme');?> <?php if ($req) echo "<span>(required)</span>"; ?></label>
			<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="input-comment" /><br /><br />
      <label for="url"><?php echo __('Website', 'safewaytheme');?></label>
      <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>"  tabindex="3" class="input-comment" /><br /><br />
  <?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
			<label for="comment" style="width:0px;margin-left: -15px;"><?php echo __('', 'safewaytheme');?> <span><?php echo __('');?></span></label>
			<textarea name="comment" id="comment" cols="80" rows="10" tabindex="4" class="textarea-comment" ></textarea><br /><br />
			
      <input name="submit" type="submit" id="submit" tabindex="5" value=""  class="input-submit-comment"  />
    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    <?php if (function_exists('cancel_comment_reply_link')) { 
    //2.7 comment loop code ?>
     <?php comment_id_fields(); ?>
    <?php } ?>
  <?php do_action('comment_form', $post->ID); ?>
  </fieldset>
</form>
</div>
<?php endif; // If registration required and not logged in ?>
 
<?php endif; 

