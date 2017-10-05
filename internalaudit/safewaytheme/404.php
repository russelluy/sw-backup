<?php get_header();?>
				               	<div id="content1b2">
				                  	<div class="maincontent_b">
						                      <!-- BEGIN PAGE TITLE -->
									             <div id="page-title">                
									                  <div class="title"><!-- your title page -->
									                  	 <h1><?php echo __('Page Not Found!','safewaytheme');?></h1>
									                  </div>
										  		       </div>            
									            <!-- END OF PAGE TITLE -->
				            
				             <!-- BEGIN CONTENT -->
						            <div id="content-inner">            
						               	<div id="content-left">
						                 <div class="maincontent">
						                  <?php
						                    $_404_text = (get_option('Ag_404_text')) ? get_option('Ag_404_text') : __('Apologies, but the page you requested could not be found.','safewaytheme');
						                  ?>
						                  <h4><?php echo $_404_text;?></h4>
						                  <h4><?php echo __('Try a different search?','safewaytheme');?></h4>         
						                  <?php get_search_form();?>         
						                 </div>
						               </div>                 
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