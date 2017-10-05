<?php
$orig_post = $post;
global $post;
	$tags = wp_get_post_tags($post->ID);

if($tags){
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$my_query = new wp_query( array(
	    'tag__in' => $tag_ids,
	    'post__not_in' => array($post->ID),
	    'posts_per_page'=>4,
		'tax_query' => array(
	        array(
	            'taxonomy' => 'post_format',
	            'field' => 'slug',
	            'terms' => array( 'post-format-link','post-format-quote' ),
	            'operator' => 'NOT IN'
	        )
	    )
    ));

if($my_query->have_posts()){

    echo '<div id="related-posts" class="row-fluid">';

    while($my_query->have_posts()){

    $my_query->the_post(); 
    $post_format = get_post_format();

	$heading = '<h4><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h4>';

	echo '<div class="span3 box related-'.(empty($post_format) ? 'standard' : $post_format).'">';
	switch ($post_format) {

		case 'video':
			echo '<div class="related-header">';
			echo get_post_meta($post->ID, '_format_video_embed', true);
			echo '</div>';
			echo '<div class="related-content">';
			echo $heading;
		break;
		case 'audio':
			echo '<div class="related-header">';
			echo get_post_meta($post->ID, '_format_audio_embed', true);
			echo '</div>';
			echo '<div class="related-content">';
			echo $heading;
		break;
		case 'gallery':
		default:
			if($images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ 
			
			$image = current($images);
				echo '<div class="related-header">';
				echo '<a class="related-image" href="'.get_permalink().'" rel="bookmark">'.wp_get_attachment_image($image->ID, 'small').'</a>';
				echo '</div>';
				echo '<div class="related-content">';
				echo $heading;
			}else{

				echo '<div class="related-content">';
				echo $heading;
	    	 	$exerpt = get_the_excerpt(); 
	    	 	if(strlen($exerpt) > 255){
	    	 		echo '<p>'.substr($exerpt, 0, 255).'...</p>';
	    	 	}else{
	    	 		echo '<p>'.$exerpt.'</p>';
	    	 	}
			} 
			
		break;
	}
	?>
	    </div>
	    <div class="related-footer">
		    <i class="icon-clock"></i>&nbsp;<?php the_time('M j, Y') ?>
	    </div>
	</div>
    <? }
    echo '</div>';
}
}
$post = $orig_post;
wp_reset_query();