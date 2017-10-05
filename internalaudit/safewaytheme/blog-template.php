<?php
/*
Template Name: Safeway Blog Template
*/
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]>
        <link href="<?php bloginfo('template_directory');?>/css/all-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<!--[if IE 7]>
		<link href="<?php bloginfo('template_directory');?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>    
	<link href="<?php bloginfo('template_directory');?>/css/ie6.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/DD_belatedPNG.js"></script>
	<script type="text/javascript"> 
	   DD_belatedPNG.fix('.page-container-inner');
     DD_belatedPNG.fix('#slideshow-navigation a');
     DD_belatedPNG.fix('#slideshow-navigation .activeSlide');
	   DD_belatedPNG.fix('img');	       
	</script>	
<![endif]-->

    
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>

<body style="color: #666666;font-family: verdana;font-size: 11px;line-height: 14px;background:#eee;width:100%;">
<div class="blog_wrap">
<div class="doninator_banner"><img src="wp-content/themes/safewaytheme/images/banner_don.jpg" alt="Doninator Den" /></div>
				               	<div id="content1b2">
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
			                    	
			                    	<div class="maincontent">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 2')) {
                      $portfolio_cid = get_option('Ag_portfolio_cid');
                      $portfolio_cat = get_cat_ID($portfolio_cid);                      
                      safewaytheme_featuredproject($portfolio_cat,3,"<h2>".__('Featured Message','safewaytheme')."</h2>");
                    } ?>
			                    	
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
  <?php 
  $ga_code = get_option('Ag_ga_code');
  if ($ga_code) echo stripslashes($ga_code);
  ?>      
</body>
</html>