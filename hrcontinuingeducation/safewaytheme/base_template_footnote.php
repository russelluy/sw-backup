<?php
/*
Template Name: Safeway Pages with Footnote
*/
?>
            
 <?php get_header();?>
						
				               	<div id="content1b2">
				                  	<div class="maincontent_b">
						                      <!-- BEGIN PAGE TITLE -->
				             <div id="page-title">                
				                  <div class="title"><!-- your title page -->
				                  	 <h1><?php the_title();?></h1>
				                  </div>
				                  <?php $data = get_post_meta($post->ID, '_short_desc', true ); ?>
				                  <?php if ($data) : ?>
				                  <div class="desc"><!-- description about your page -->
				                  <?php echo $data;?>
				                  </div>
				                  <?php endif;?>
					  		       </div>            
				            <!-- END OF PAGE TITLE -->
				            
				            <!-- BEGIN CONTENT -->
				            <div id="content-inner-full">
				              <?php if (have_posts()) { ?>
				              <?php while (have_posts()) : the_post();?>
				               <div class="maincontent">
				                <?php the_content();?>
				               </div>
				               <?php endwhile;?>
				                 <?php } ?> 
				                                
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
			
			<div class="footnote">
					<span>"For questions about your pay and benefits"</span><br />
					 US - Employee Service Center (ESC) 1-888-255-2269 <br />
					 Canada - Canada Employee Service Center (CESC) 1-888-310-1318
			</div>
        <?php get_footer();?>