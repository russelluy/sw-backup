<?php get_header();?>
<div class="new_pagewrap">
		<div class="new_pagewrap_wrap">
			<!-- BEGIN HEADER -->
            <div id="header">
            	<div id="top-header">
            		<div class="top-header_lft">
	                	<div class="logo">
	    							 <a href="index.php"><img src="wp-content/themes/safewayhealth/images/logo.jpg" alt="Safeway Health" border="0"></a>							
	                  </div>
	                	 
	                    <div class="clear"></div>
                    </div>
                    
                    <div class="top-header_rt">
                    	<div class="top-header_rt_nav">
                    		<ul id="nav"> 
							   <li class="menuLink"><a href="index.php"><img src="wp-content/themes/safewayhealth/images/TopTab1.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab1_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab1.gif'" alt="Home" border="0"></a></li> 
							   <li class="menuLink"><a href="who-we-are"><img src="wp-content/themes/safewayhealth/images/TopTab2.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab2_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab2.gif'" alt="Who We Are" border="0"></a></li> 
							   <li class="menuLink"><a href="what-we-do" class="hotspot"></a>
							   <img src="wp-content/themes/safewayhealth/images/TopTab3.gif" alt="What We Do" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab3_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab3.gif'" border="0">
							   <script type="text/javascript" language="javascript">
								//<![CDATA[
								$(window).load (function () { 
     								 $('#temphide').removeClass('hidden_div')
  								});;
								//]]>
								</script> 
							   

							   <ul id="temphide" class="hidden_div">
									<li ><a class="hotspot_per" href="what-we-do">What We Do</a></li>
									<li ><a class="hotspot_per" href="market-priced-drug-program">Market Priced Drug Program</a></li>
									<li><a class="hotspot_per" href="behavior-incentives">Behavior Incentives</a></li>									
									<li><a class="hotspot_per" href="integrating-health-and-fitness">Integrating Health and Fitness </a></li>
									<li ><a class="hotspot_per" href="engaging-beneficiaries">Engaging Beneficiaries</a></li>
								</ul>
							   </li> 
							   <li class="menuLink"><a href="our-model"><img src="wp-content/themes/safewayhealth/images/TopTab4.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab4_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab4.gif'" alt="Creating Value" border="0"></a></li> 
							   <li class="menuLink"><a href="our-results"><img src="wp-content/themes/safewayhealth/images/TopTab5.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab5_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab5.gif'" alt="Our Results" border="0"></a></li> 
								<!--<li class="menuLink"><a href="http://safewayhealthdv.safeway.com/"><img src="wp-content/themes/safewayhealth/images/TopTab6.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab6_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab6.gif'" alt="Our Results" border="0"></a></li>--> 
							 </ul>	                    		
                    		<div class="clear"></div>
                    	</div>
	                    
                    </div>
                </div>
	        </div>
	       </div>
	       <div class="clear"></div>
	      </div>
	    <div class="new_pagewrap_wrap_stretch">     
	    </div>
	    
	    <div class="new_menuwrap">
			<div class="new_menuwrap_wrap">
            
            <!-- BEGIN PAGE TITLE -->
             <div id="page-title">
                <div class="title"><!-- your title page -->
                  <h1><?php echo __('Search Results for ','safewayhealth');?> "<?php echo $s;?>"</h1>
                </div>
      	  		</div>            
            <!-- END OF PAGE TITLE -->
            
            <!-- BEGIN CONTENT -->
            <div id="content-inner">
               	<div id="content-left">
                     <div class="maincontent">
                        <?php if ( have_posts() ) :?>
                        <?php while ( have_posts() ) : the_post(); ?>                     
                          <div class="blog-post">
                          <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>  
                            <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=134&amp;w=134&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft" />
            <?php } else { ?>
                    <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo bloginfo('template_directory');?>/images/blank-images/nothumbnail-blog.jpg&amp;h=134&amp;w=134&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft" />               
                  <?php } ?>
                          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                          <div class="blog-posted">
                          <?php the_time('F d, Y');?>&nbsp; | &nbsp; <?php echo __('Posted by ');?>: <?php the_author_posts_link();?>&nbsp; | &nbsp; <?php the_category(',');?> &nbsp; | &nbsp;  <?php comments_popup_link(__('0 Comment','safewayhealth'),__('1 Comment','safewayhealth'),__('% Comments','safewayhealth'));?>&raquo;
                          </div>
                          <p><?php excerpt(40);?></p>       
                          <div class="clear"></div>                   
                          </div>
                          <?php endwhile;?>
                          <?php else : ?>
                          <h2><?php echo __('Nothing Found!','safewayhealth');?></h2>
                          <h4><?php echo __('try different search?','safewayhealth');?></h4>
                          <?php get_search_form();?>
                          <?php endif;?>
                          <div class="blog-pagination"><!-- page pagination -->                                       	     			
                          <?php 
                				  if (function_exists('wp_pagenavi')) :
                				    wp_pagenavi();
                				  else : 
                				?>
                      		<div class="navigation">
                      			<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Entries','safewayhealth')) ?></div>
                      			<div class="alignright"><?php previous_posts_link(__('Next Entries &raquo;','safewayhealth')) ?></div>
                      			<div class="clear"></div>
                      		</div>
                        <?php endif;?>                           
                          </div>                                  
                     </div>
                 </div>   
                 <?php wp_reset_query();?>
                 <?php get_sidebar();?>                      
            </div> 
            <!-- END OF CONTENT -->
            
            <?php get_footer();?>