<?php get_header(); ?>
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
                 		
                 		</div>     
	                </div>
	                </div>
		        </div>    
            <div class="contentbodywrap">	
               	<div id="content1b">
                  	<div class="maincontent_b">
                      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Content Area')) { ?>
            	     <?php } ?>
					
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

        
        