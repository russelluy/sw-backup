<div class="up_arrow"></div>
<div class="pull-left author-meta">
	<?php echo get_avatar( get_the_author_meta( 'ID' ) , 55 ); ?>
	<h4 class="bl_popover"  data-placement="top" data-trigger="hover" data-title="<?php echo esc_html( get_the_author() ) ?>" data-content="<?php echo get_the_author_meta('description', get_the_author_meta('ID')); ?>">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a>
	</h4>
</div>
<?php 

	if(!of_get_option('disable_share_story')){

	$share_title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
	$share_url = urlencode(get_permalink());
?>
<div class="pull-right share-story-container">
	<small class="muted pull-left"><?php _e('Share story', 'swblog'); ?></small>
	<ul class="share-story">
		<li><a class="tips" data-title="Facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $share_url; ?>&t=<?php echo $share_title; ?>"><i class="icon-facebook"></i></a></li>
		<li><a class="tips" data-title="Google+" target="_blank" href="https://plus.google.com/share?url=<?php echo $share_url; ?>"><i class="icon-gplus"></i></a></li>
		<li><a class="tips" data-title="Twitter" target="_blank" href="http://twitter.com/intent/tweet?url=<?php echo $share_url; ?>"><i class="icon-twitter-1"></i></a></li>
		<li><a class="tips" data-title="Reddit" target="_blank" href="http://www.reddit.com/submit?url=<?php echo $share_url; ?>&amp;title=<?php echo $share_title ?>"><i class="icon-reddit"></i></a></li>
		<li><a class="tips" data-title="Linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>"><i class="icon-linkedin-1"></i></a></li>
		<li><a class="tips" data-title="Delicious" target="_blank" href="http://www.delicious.com/post?v=2&amp;url=<?php echo $share_url; ?>&amp;notes=&amp;tags=&amp;title=<?php echo $share_title; ?>"><i class="icon-delicious"></i></a></li>
		<li><a class="tips" data-title="Email" target="_blank" href="mailto:?subject=<?php echo $share_title;?>&amp;body=<?php echo $share_url ?>"><i class="icon-mail"></i></a></li>
	</ul>
</div>
<?php } ?>