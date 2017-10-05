 <?php get_header();?>

	<div id="page-container2">
    	<div class="new_post_wrap2">
											
				            
				            <!-- BEGIN CONTENT -->
 
               	<div id="content-left2">
               							<!-- BEGIN PAGE TITLE -->
									             <div id="page-title">
									                <div class="title"><!-- your title page -->
									                  <h1><?php echo __('Search Results for ','safewaytheme');?> "<?php echo $s;?>"</h1>
									                </div>
									      	  		</div>            
								            <!-- END OF PAGE TITLE -->
                     <div class="maincontent">
                        <?php if ( have_posts() ) :?>
                        <?php while ( have_posts() ) : the_post(); ?>                    
                          <div class="blog-post">
		                          <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>  
		                            <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=134&amp;w=134&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft" />
		            				<?php } else { ?>
		                   			             
		                  			<?php } ?>

									<?php $count++;
									echo '<a href = "#" class="postpopup" rel="'.  site_url().'/index.php/ajax/?id='.$post->ID.'">'; 
									echo '<div class="acro_name2">';
									the_title(); 
							                echo '</div>';
									echo '</a>';
									?>

                          			<p><?php excerpt(40);?></p>       
                         			 <div class="clear"></div>                   
                          </div>
			                          <?php endwhile;?>
			                          <?php else : ?>
			                          <h4><?php echo __('Nothing Found!','safewaytheme');?></h4>
			                          <h4><?php echo __('Try a different search?','safewaytheme');?></h4>
			                          <?php get_search_form();?>
			                          <?php endif;?>
                          <div class="blog-pagination"><!-- page pagination -->                                       	     			
			                          <?php 
			                				  if (function_exists('wp_pagenavi')) :
			                				    wp_pagenavi();
			                				  else : 
			                				?>
		                      		<div class="navigation">
		                      			<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Entries','safewaytheme')) ?></div>
		                      			<div class="alignright"><?php previous_posts_link(__('Next Entries &raquo;','safewaytheme')) ?></div>
		                      			<div class="clear"></div>
		                      		</div>
                       				 <?php endif;?>                           
                          </div>                                  
                     </div>
                 </div>   
                 <?php wp_reset_query();?>
                 <!--<?php get_sidebar();?> -->                     

            <!-- END OF CONTENT -->
</div>
</div>





<?php get_footer();?>

 
 
 