<?php 
global $hermes_options;

// If it is a post or page, retrieve all attached images to it.

if ( is_single() || is_page() || is_page_template() ) {

	$args = array(
		'order'          => 'ASC',
		'orderby'          => 'menu_order',
		'post_parent'    => $post->ID,
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1
	);
	
	$attachments = get_posts($args);
	$attachments_num = count($attachments);
	
	if ($attachments_num == 0) {
	
		if ( has_post_thumbnail( $post->ID ) ) {
			$featured_image_id = get_post_thumbnail_id($post->ID);

			unset($attachments,$attachments_num);
			
			$args = array(
				'p'    => $featured_image_id,
				'post_type'      => 'attachment',
				'post_mime_type' => 'image'
			);
			
			$attachments = get_posts($args);
			$attachments_num = count($attachments);

		}
	}

} 

// If there are no attachments yet 

if ($attachments_num == 0) {

	unset($attachments,$attachments_num);
	
	$args = array(
		'order'          => 'ASC',
		'orderby'          => 'menu_order',
		'post_parent'    => $hermes_options['hermes_gallery_page'],
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => $hermes_options['hermes_gallery_page_num']
	);
	
	$attachments = get_posts($args);
	$attachments_num = count($attachments);

}

$i = 0;

if ( $attachments_num > 0 ) { ?>

<div id="hermes-gallery" class="flexslider">
	<div class="hermes-gallery-wrapper">

	
		<ul class="hermes-slides">
	
			<?php
			foreach ($attachments as $attachment) { 
			$i++;

			$large_image_url = wp_get_attachment_image_src( $attachment->ID, 'thumb-hermes-slideshow');
 
 			$style = ' style="background-image:url(\'' . $large_image_url[0] . '\'); background-position: center center;"' ;

			?>
			<li class="hermes-gallery-slide"<?php echo $style; ?>>

				<div class="wrapper wrapper-teaser">
					<p><?php echo $attachment->post_title; ?></p>
				</div><!-- end .wrapper .wrapper-booking -->
			
			</li>
			<?php 
			} // foreach
			?>
		</ul>
	
	</div><!-- end .hermes-gallery-wrapper -->
	
</div><!-- end #hermes-gallery -->

<script type="text/javascript">
jQuery(document).ready(function() {
	
	jQuery("#hermes-gallery").flexslider({
        selector: ".hermes-slides > .hermes-gallery-slide",
		animationLoop: true,
        slideshow: true,
        initDelay: 1000,
		smoothHeight: true,
		slideshowSpeed: 7000,
		pauseOnAction: true,
        controlNav: false,
		directionNav: true,
		useCSS: true,
		touch: false,
        animationSpeed: 500
    });	 

});
</script>
<?php 
} // if there are attachments
?>