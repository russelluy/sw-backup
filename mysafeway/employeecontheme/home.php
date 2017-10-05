<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
<!--Anthony's Edits <script type="text/javascript">
            jQuery(document).ready(function(){			   
               jQuery(window).resize(function(){
			adjustHeight();
               });
		jQuery(window).load(function(){
			adjustHeight();
               });   
            });

function adjustHeight(){
	var height = jQuery(window).height();
			if(height < 700){								
				jQuery('.wrapper_wrap').css('height', '67%');
				jQuery('.wrapper_wrap').css('min-height', '410px');
			}
			else{
				jQuery('.wrapper_wrap').css('height', '81%');
			}
}
</script>-->

<div class="wrapper_wrap">
  <div id="main">
    <div id="container">
      <div class="zlide">
        <div class="zlide_lft">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('secondary-widget-area')) { ?>
          <?php } ?>
        </div>
        <div class="zlide_rt"> 
          <!--<div id="home_1"><a href="http://direct2hr.safeway.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/home_1.png"/></a></div>
          <div id="home_1"><a href="http://corporate.safeway.com/safeway/feedback/feedback1.asp" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/home_2.png"/></a></div>
          <div id="home_1"><a href="http://www.careersatsafeway.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/home_5.png"/></a></div>
          <div id="home_1"><a href="https://employeedv.safeway.com/index.php/contacts/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/home_4.png"/></a></div>
          <div id="home_1"><a href="http://www.safeway.com/ShopStores/Offers-Landing-IMG.page?" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/home_6.png"/></a></div>--> 
          <!--<div class="zlide_rt_top">-->
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-top-bucket')) { ?>
          <?php } ?>
          <!--<div class="clear"></div>
						</div>--> 
          
          <!--<div class="zlide_rt_bot">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-bot-bucket')) { ?>
							<?php } ?>
		
						</div>-->
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <!-- Bottom Section Temporarily Taken Out -->
      <div class="container_bodywrap" style="display:none;">
        <div id="container_lft">
          <?php get_sidebar(); ?>
        </div>
        <!-- #container_lft -->
        <div id="container_rt">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-pic')) { ?>
          <?php } ?>
        </div>
        <!-- #container rt-->
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="footerwrap">
    <?php get_footer(); ?>
  </div>
</div>
</div>
