	<?php get_header(); ?>
	<!--<div id="page-container">
    	<div class="page-container-inner">
            <div class="frame">-->
            <!-- BEGIN HEADER -->
		                 <div class="bottom-header-bg">
						                <div id="bottom-header">
									                	<div id="nav-menu">
									                    <?php
									                      if (function_exists('wp_nav_menu')) { 
									                        wp_nav_menu( array('container_id'=>'','menu_id'=>'', 'menu_class' => 'sf-menu', 'theme_location' => 'topnav','fallback_cb'=>'safewaytheme_topmenu_pages','sort_column' => 'menu_order', 'depth' =>3 ) );
									                      } else {  
									                        safewaytheme_topmenu_pages();
									                      } ?>                     
									                    </div>
						                     
									                    <div class="zlide">
											                        		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slideshow')) {
						                    } ?>	
														               	
														             
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

        
        