<?php
/*
Template Name: Safeway No Columns Template
*/
?>	

        <?php get_header();?>
				               	<div id="content1b3">
				                  	<div class="maincontent">
                      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 1')) { ?>
                      <?php
                      $welcome_message = get_option('Ag_welcome_message');
                      $site_desc = get_option('Ag_site_desc');
                      ?>
                     <h2><span class="orange"><?php if ($welcome_message) echo stripslashes($welcome_message); else echo __('Welcome to ','safewaytheme');?><?php bloginfo('blogname');?></span></h2>
                     <?php if ($site_desc) { echo stripslashes($site_desc); } else {?> 
                   	 <p>Place holder short description about your site, iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                     <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consec. </p>
                     <ul class="content-list">
                       	<li><a href="#">Doloremque laudantium, totam rem aperiam</a></li>
                        <li><a href="#">Inventore veritatis et quasi architecto</a></li>
                     </ul>                     
                     <?php } ?>
            	     <?php } ?>
                    </div>
                 </div>
                 <div id="content1b3">
                    <div class="maincontent">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 2')) {
                      $portfolio_cid = get_option('Ag_portfolio_cid');
                      $portfolio_cat = get_cat_ID($portfolio_cid);                      
                      safewaytheme_featuredproject($portfolio_cat,3,"<h2>".__('Featured Message','safewaytheme')."</h2>");
                    } ?>
                    </div>
                 </div>
                 <div id="content1b3">
                  <div class="maincontent">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 3')) {
                      $services_page = get_option('Ag_services_pid');
                      safewaytheme_serviceslist($services_page,"<h2>".__('Our Services','safewaytheme')."</h2>");
                    } ?>
                  </div>
				            </div>
				            <!-- END OF CONTENT -->
                    </div>
                 
        <?php get_footer();?>
        