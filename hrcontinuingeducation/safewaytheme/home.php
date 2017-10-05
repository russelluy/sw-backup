	<?php get_header(); ?>
	
		                 <div class="bottom-header-bg2">
						                <div id="bottom-header">
									                    <div class="zlide">
								                        		<?php 
														if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slideshow')) {
						                    						} 

														/*if (function_exists("easing_slider")){ easing_slider(); };*/ 
													?>
								                 		</div>
					                 					<div class="clear"></div>
					                 		</div>     
			                </div>
	                </div>
		        </div> 
		        
            <div class="contentbodywrap">	
            <!-- BEGIN CONTENT -->
               	<div id="content1b">
                  	<div class="maincontent_b">
                  		<!--<a href="wp-content/themes/safewaytheme/images/footbrand_01.gif" id="example1">Pic</a>-->
                      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Content Area')) { ?>
            	     <?php } ?>
                    </div>
                    <div id="content2">
		                   <div class="maincontent_c">
		                   			<div class="maincontent_c_box1">
		                   				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Box #1')) { ?>
            	     					<?php } ?>
		                  			 </div>
		                  			 <div class="maincontent_c_box2">
		                  			 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Box #2')) { ?>
            	     					<?php } ?>
		                  			 </div>
		                   </div>
                 	</div>
                 	<div class="clear"></div>
                 </div>
                 <div id="content3b">                 		
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