<?php
/*
Template Name: financial Analytic Pages Template
*/
?>
            
 <?php get_header();?>
						
				               	<div id="content1b2">
				               		<?php breadcrumb_trail(); ?>
				               		
				                  	<div class="maincontent_b">
						                      <!-- BEGIN PAGE TITLE -->
				             <div id="page-title">                
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
				            <!-- END OF PAGE TITLE -->
				            
				            <!-- BEGIN CONTENT -->
				            <div id="content-inner-full">
				              <?php if (have_posts()) { ?>
				              <?php while (have_posts()) : the_post();?>
				               <div class="maincontent">
				                <?php the_content();?>
				               </div>
				               <?php endwhile;?>
				                 <?php } ?> 
				                                
				            </div>
				            <!-- END OF CONTENT -->
                    </div>
                    
                 </div>
                 <div id="content3b2">                 		
			                  <div class="maincontent_d">
			                    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('financialanalytic Sidebar')) { ?>
			            	     <?php } ?>			            	     
			            	     
			                  </div>	 
			             <div id="content3b_fold">                     
	                  	</div>	  
	                  	<div class="clear"></div>                
                 </div>
                 <div class="clear"></div>
                 <!-- BEGIN BOTTOM BOX -->
			<script type="text/javascript">
	jQuery(document).ready(function($) {
		//alert('here');
		$( "#tabs" ).tabs();
	});
	</script>
			
			
        <?php get_footer();?>