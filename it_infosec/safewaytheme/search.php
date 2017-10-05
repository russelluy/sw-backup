 <?php get_header();?>
				               	<div id="content1b2">
				                  	<div class="maincontent_b">
						                      <!-- BEGIN PAGE TITLE -->
									             <div id="page-title">
									                <div class="title"><!-- your title page -->
									                  <h1><?php echo __('Search Results for ','safewaytheme');?> "<?php echo $s;?>"</h1>
									                </div>
									      	  		</div>            
								            <!-- END OF PAGE TITLE -->
				            
				            <!-- BEGIN CONTENT -->
            <div id="content-inner">
               	<div id="content-left">
                     <div class="maincontent">
                      <h3 style="font-weight: bold; margin-bottom: 1.5em;">Your search query was found on the following pages:</h3>
                        <?php if ( have_posts() ) :?>
                        <?php while ( have_posts() ) : the_post(); ?>                     
                          <div class="blog-post">
                          <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>  
                            <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=134&amp;w=134&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft" />
            <?php } else { ?>
                    <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo bloginfo('template_directory');?>/images/blank-images/nothumbnail-blog.jpg&amp;h=134&amp;w=134&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft" />               
                  <?php } ?>
                          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                          <div class="blog-posted" style="display: none;">
                          <?php the_time('F d, Y');?>&nbsp; | &nbsp; <?php echo __('Posted by ');?>: <?php the_author_posts_link();?>&nbsp; | &nbsp; <?php the_category(',');?> &nbsp; | &nbsp;  <?php comments_popup_link(__('0 Comment','safewaytheme'),__('1 Comment','safewaytheme'),__('% Comments','safewaytheme'));?>&raquo;
                          </div>
		        <p><strong>Full text of page is below - use your browser's search function by pressing CTRL-F to find your search term in the page text.</strong><p>
                          <p style="height: 100px; overflow: scroll;"><?php excerpt(40);?></p>       
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
            </div> 
            <!-- END OF CONTENT -->
                    </div>
                    
                 </div>
                 <div id="content3b2">                 		
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