<?php 
global $hermes_options;

$args = array(
	'order'          => 'ASC',
	'orderby'          => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'image',
	'post_status'    => null,
	'numberposts'    => -1
);
$attachments = get_posts($args);

$i = 0;

if (count($attachments) > 0) { ?>

<div class="hermes-column full last">

	<div class="widget">

			<ul class="hermes-attractions">
			
			<?php foreach ($attachments as $attachment) { 
				$i++;
				$image_data = wp_get_attachment_image_src( $attachment->ID, 'full' ); 
				?>
				<li class="hermes-attraction<?php if ($i % 3 == 0) { echo ' last'; } elseif ($i % 3 == 1) { echo ' first'; } ?>">
		
					<div class="post-cover">
						<a href="<?php echo $image_data[0]; ?>" class="thickbox" title="<?php echo apply_filters( 'the_title', $attachment->post_title ); ?>"><?php echo wp_get_attachment_image( $attachment->ID, 'thumb-attraction' ); ?></a>
					</div><!-- end .post-cover -->
					
					<div class="post-excerpt">
						<p><?php echo apply_filters( 'the_title', $attachment->post_title ); ?></p>
					</div><!-- end .post-excerpt -->
					<div class="cleaner">&nbsp;</div>
					
				</li><!-- end .hermes-attraction -->
			<?php } // foreach ?>
			
			</ul><!-- end .hermes-attractions -->
		
		<div class="cleaner">&nbsp;</div>
	</div><!-- end .widget -->
	
</div><!-- end .hermes-column.last -->

<?php 
wp_reset_query();
} // if there are attachments
?>