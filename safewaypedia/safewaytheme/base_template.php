<?php
/*
Template Name: Safeway Pagez Template
*/
?>
            
 <?php get_header();?>
						
				               	<!-- BEGIN HEADER -->
		                 <div class="bottom-header-bg2">
						                <div id="bottom-header">
									                    
					                 		
					                 		</div>     
			                </div>
	                
            <div class="contentbodywrap_none">	
            <!-- BEGIN CONTENT -->
               		<div id="content1b">
                  			<div class="maincontent_b">
                  	
		                       
						            	 <div id="page-title">  
								             <?php if (have_posts()) : ?>        
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
							  		 
							 	       
							  				<!-- BEGIN CONTENT -->
										               <div id="content-inner">
											              <?php while (have_posts()) : the_post();?>            
												               	<div id="content-left">
													                 <div class="maincontent">
													                  <?php the_content();?>
													                 </div>
												               </div>
											               <?php endwhile;?> 
											               <?php endif;?>   
											                                 
											            </div>                   
								           
								            <!-- END OF CONTENT -->
							  		       
                    			</div>
                    
			                    <div id="content2">
					                   <div class="maincontent_c">
					                   			
					                   </div>
			                 	</div>
			                 	<div class="clear"></div>
                 </div>
                 <div id="content3b">                 		
			                  <div class="maincontent_d">
			                    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar_b')) { ?>
			            	     <?php } ?>			            	     
			            	      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Video')) { ?>
			            	     <?php } ?>
			                  </div>	 
					             <div id="content3b_fold">                     
			                  	</div>	  
			                  	<div class="clear"></div>                
                 </div>
                 <div class="clear"></div>
	
			
        <?php get_footer();?>