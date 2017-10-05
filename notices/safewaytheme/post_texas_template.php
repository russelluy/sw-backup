<?php
/*
Template Name: Safeway Post Texas Template
*/
?>
            
 <?php get_header();?>
						
				               	<div id="content1b2">
				                  	<div class="maincontent_b">
						                      
				            
				            <!-- BEGIN CONTENT -->
				            <?php
								global $more;
								$more = 0;
								 
								  $post_per_page = 10; // -1 shows all posts
								  $args=array('category_name' => 'Texas', 'posts_per_page' => $post_per_page);
								?>
								 
								<?php query_posts($args); ?>
									<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								 
										<div class="post" id="post-<?php the_ID(); ?>">
											<!-- <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>-->
											<?php the_content('read more ...'); ?>
										</div>
								 
									<?php endwhile; ?>
								<?php endif; ?>
				                                
				            </div>
				            <!-- END OF CONTENT -->
                    </div>
                    
                 </div>
                 <!--<div id="content3b2">                 		-->
			                  <div class="maincontent_d">
			                    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) { ?>
			            	     <?php } ?>			            	     
			            	      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Video')) { ?>
			            	     <?php } ?>
			                  </div>	 
			             <div id="content3b_fold">                     
	                  	</div>	  
	                  	<div class="clear"></div>                
                 </div>
                 <div class="clear"></div>
                 <!-- BEGIN BOTTOM BOX -->
			
			
        <?php get_footer();?>