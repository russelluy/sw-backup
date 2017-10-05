<?php
/*
Template Name: Safeway Calendar Template
*/
?>
            
 <?php get_header();?>
	
               	<div id="content1">
                  <div class="maincontent">
                      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 1')) { ?>
                      
            	     <?php } ?>
                    </div>
                 </div>
                 <div id="content2">
                    <div class="maincontent">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 2')) {
                      $portfolio_cid = get_option('Ag_portfolio_cid');
                      $portfolio_cat = get_cat_ID($portfolio_cid);                      
                      safewaytheme_featuredproject($portfolio_cat,3,"<h2>".__('Featured Message','safewaytheme')."</h2>");
                    } ?>
                    </div>
                 </div>
                 <div id="content3">
                  <div class="maincontent">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 3')) {
                      $services_page = get_option('Ag_services_pid');
                      safewaytheme_serviceslist($services_page,"<h2>".__('Our Services','safewaytheme')."</h2>");
                    } ?>
                  </div>
                 </div>
                 
                 <!-- BEGIN BOTTOM BOX -->
                 
                 
        <?php get_footer();?>