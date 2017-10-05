<?php 
global $hermes_options;
?>
<ul class="featured-pages">
	
	<?php
	
	$i = 0; // active node
	$m = 3; // max number of nodes
	
	while ($i < $m) {
	
		$i++;
		
		$optionid = 'hermes_featured_page_' . $i;
		$pagid = $hermes_options[$optionid];
		$pagid = hermes_wpml_pageid($pagid); // make it WPML-friendly 

		if ($pagid > 0)
		{

			$loop = new WP_Query( array( 'page_id' => $pagid ) );
							
				if ($loop->have_posts()) {
				//The Loop
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
				<li class="featured-page<?php if ($i == 3) {echo ' last';} ?>">
					<div class="outer-frame">
						<div class="frame">
							
							<?php
							get_the_image( array( 'size' => 'thumb-featured-page', 'width' => 250, 'height' => 155, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
							?>

							<div class="post-excerpt">

								<h2 class="title-m title-center"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								
								<?php the_excerpt(); ?>
								<!--<span class="more"><a href="<?php the_permalink(); ?>" rel="nofollow"><?php _e('Continue reading', 'hermes_textdomain'); ?></a></span>-->
							</div><!-- end .post-excerpt -->
							
							<div class="cleaner">&nbsp;</div>
							
						</div><!-- end .frame -->
					</div><!-- end .outer-frame -->
				</li><!-- end .featured-page -->
			
				<?php endwhile;
			}
		} // if page is set 
	} // while ?>

	<li class="cleaner">&nbsp;</li>
	
</ul><!-- end .featured-pages -->