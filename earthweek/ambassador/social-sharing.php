<p class="title-xs title-center title-caps title-ornament title-widget type-custom"><?php _e('Share This','hermes_textdomain'); ?></p>

<div class="hermes-post-share">

	<span class="hermes-share-button">
		<div class="fb-like" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
	</span>
	<span class="hermes-share-button">
		<a href="http://twitter.com/share" data-url="<?php the_permalink(); ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</span>
	<span class="hermes-share-button">
		<g:plusone size="medium"></g:plusone>
	</span>
	<span class="hermes-share-button">
		<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="IN/Share" data-counter="right"></script>
	</span>
	<span class="hermes-share-button">
		<?php
		$featured_image = wp_get_attachment_image_src ( get_post_thumbnail_id( $post->ID ), 'full' ); 
		?>
		<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo urlencode($featured_image[0]); ?>&description=" class="pin-it-button" count-layout="horizontal">
			<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
		</a>
	</span>

</div><!-- end .hermes-post-share -->