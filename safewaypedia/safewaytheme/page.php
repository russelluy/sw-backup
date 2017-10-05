	<?php get_header(); ?>
	
<div class="content_margin2">
	<div class="new_post_wrap">
											
										               <div id="content-inner">
										               		<?php if (have_posts()) : ?>
												                  <?php $data = get_post_meta($post->ID, '_short_desc', true ); ?>
												                  <?php if ($data) : ?>
																                  <div class="desc"><!-- description about your page -->
																                  <?php echo $data;?>
																                  </div>
												                  <?php endif;?>
										               		<div class="title"><!-- your title page -->
										                  	 <h1><?php the_title();?></h1>
										                  </div>
											              <?php while (have_posts()) : the_post();?>            
												               	<div id="content-left">
													                 <div class="maincontent">
																		<?php the_content();?>
													                 </div>
												               </div>
											               <?php endwhile;?> 
											               <?php endif;?>   
											              <?php get_sidebar();?>                    
											            </div>                   
								            
                 	</div>             
                 </div>
              

<?php get_footer();?>

