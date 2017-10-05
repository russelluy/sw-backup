<?php
/*
Template Name: Generic Template with Nav
*/
?>
<?php include(TEMPLATEPATH . '/header2.php'); ?>

<div class="new_menuwrap">
			<div class="new_menuwrap_wrap">
<div class="bottom-header-bg">
  <div id="bottom-header">
    <div id="nav-menu">
      <?php	
               if (function_exists('wp_nav_menu')) { 
	                        wp_nav_menu( array('container_id'=>'','menu_id'=>'', 'menu_class' => 'sf-menu', 'theme_location' => 'topnav','fallback_cb'=>'agivee_topmenu_pages','sort_column' => 'menu_order', 'depth' =>3 ) );
	                      } else {  
	                        agivee_topmenu_pages();
	                      } ?>
    </div>
    <div id="sw_ticker">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Stock Tracker')) {
							  $services_page = get_option('Ag_services_pid');
							  agivee_serviceslist($services_page,"<h2>".__('Our Services','agivee')."</h2>");
									} ?>
    </div>
    <a href="https://itwl.safeway.com/index.html" id="all_stocks"><img src="<?php bloginfo('template_directory');?>/images/flag_more.jpg" alt="More Stocks Info" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/flag_more_over.jpg'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/flag_more.jpg'" border="0"></a> </div>
</div>
</div>
</div>
<div class="clear"></div>
</div>
<div class="new_bodywrap">
  <div class="new_bodywrap_wrap">
    <div class="content_wrap2">
      <div id="content1">
      
        
		
		
		
      <div id="content2">
        <div>
         <!-- start of Feature Focus -->
          <div style="width:980px">
            
            <div class="ffocus_slidebox2" style="width:980px;background:#fff;"> 
              <div style="min-height: 300px;">
               
               
             
            <div class="generic_wrap">
				<div class="generic_wrap_lft">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Generic Menu')) {
							  $services_page = get_option('Ag_services_pid');
							  agivee_serviceslist($services_page,"<h2>".__('Our Services','agivee')."</h2>");
									} ?>
				</div>
				<div class="generic_wrap_rt">
						<!-- BEGIN CONTENT -->
						<div id="content-inner-full3">
						  <?php if (have_posts()) { ?>
						  <?php while (have_posts()) : the_post();?>
						   <div class="maincontent" id="maincontent2">
							<?php the_content();?>
							<div class="clear"></div>
						   </div>
						   <?php endwhile;?>
							 <?php } ?> 
							 
							 <?php get_sidebar();?>                    
						</div>
						<!-- END OF CONTENT -->
				  </div>
			  </div>
               
               
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <!-- end of Feature Focus -->
          
          
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<?php get_footer();?>












	








