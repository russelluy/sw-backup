<?php
/*
Template Name: New Items Template
*/
?>
            
<?php get_header();?>
						
				               	<div id="content1b2b">
				               		
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
				            <div id="content-inner-full2">
				              <?php if (have_posts()) { ?>
				              <?php while (have_posts()) : the_post();?>
				               <div class="maincontent">
				                <?php the_content();?>
				               </div>
				               <?php endwhile;?>
				                 <?php } ?> 
				                              
				            </div>
							<div class="clear"></div>  
				            <!-- END OF CONTENT -->
                    </div>
                    
                 </div>
                 
                 <div class="clear"></div>
                 
	
			
        <?php get_footer();?>
