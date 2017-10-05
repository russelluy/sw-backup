 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Safeway Health Blog</title>
<meta name="description" content="<?php echo get_bloginfo( 'description') ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!--[if IE]>
        <link href="<?php echo get_template_directory_uri(); ?>/assets/css/all-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php

	$css_options = array(
		'background_color' 		=> of_get_option('background_color'),
		'header_color' 			=> of_get_option('header_color'),
		'post_header_color' 	=> of_get_option('post_header_color'),
		'widget_header_color' 	=> of_get_option('widget_header_color'),
		'footer_color' 			=> of_get_option('footer_color'),
		);


//render google tracking code if present
$google_analytics = of_get_option('google_analytics', false);
if($google_analytics){
	echo (strpos($google_analytics, '<script') === false) ? '<script>'.of_get_option('google_analytics').'</script>' : of_get_option('google_analytics');
}

if(!empty($css_options)){ ?>
<style type="text/css">
	<?php 
		echo (!empty($css_options['background_color'])) ? 'body{ background: '.$css_options['background_color']. '; } ' : '';
		echo (!empty($css_options['post_header_color'])) ? 'header.entry-header{ background: '.$css_options['post_header_color']. '; } ' : '';

		// Header Color
		if(!empty($css_options['header_color'])){

			echo 'header#masthead{ background: '.$css_options['header_color']. '!important; } ';
			echo '.navbar-inverse .navbar-inner{ background: '.$css_options['header_color']. '!important; } ';

			// determin if dark or light
			$hex = str_replace('#', '', $css_options['header_color']);
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
			
			if($r + $g + $b > 300){ //bright background, use dark font
			    echo 'div.navbar-inverse .nav-collapse .nav > li > a, .navbar-inverse .nav-collapse .dropdown-menu a{color:#444444;text-shadow: 0 -1px 0 rgba(255, 255, 255, 0.25);} ';
			    echo 'div.navbar .nav > li.active, div.navbar .nav > li:hover{background: rgba(0, 0, 0, 0.02);} ';
			}else{ //dark background, use bright font
			    echo 'div.navbar-inverse .nav-collapse .nav > li > a, .navbar-inverse .nav-collapse .dropdown-menu a{color:#EFEFEF} ';
			}
		}

		// Widget Header Color
		if(!empty($css_options['widget_header_color'])){

			echo 'aside#side-bar .widget-head{ background: '.$css_options['widget_header_color']. '; } ';

			// determin if dark or light
			$hex = str_replace('#', '', $css_options['widget_header_color']);
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));

			if($r + $g + $b > 300){ //bright background, use dark font
			    echo 'aside#side-bar .widget-head{color:#444;text-shadow: 0 1px 0 rgba(255,255,255,0.3);} ';
			}else{ //dark background, use bright font
			    echo 'aside#side-bar .widget-head{color:#FFFFFF;} ';
			}
		}

		// Footer Color
		if(!empty($css_options['footer_color'])){

			echo 'footer.site-footer{ background: '.$css_options['footer_color']. '; } ';
		}
?>
</style>
<?php } ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php if(!of_get_option('disable_fixed_header')){ ?>
	<script type="text/javascript">

		jQuery(function(){
			if(jQuery('.above_header').length > 0){

				var height = jQuery('.above_header').height();
			}else{
				var height = 0;
			}
			jQuery('#masthead').affix({offset: height});
		});

	</script>
<?php } ?>
<?php 

	// Facebook Javascript SDK
	if(of_get_option('facebook_app_id')){ ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo of_get_option('facebook_app_id'); ?>";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php }	


	// background image or pattern
	switch (of_get_option('background_mode')) {
		case 'image':
			if(of_get_option('background_image')){

				echo '<div class="bl_background">'.(of_get_option('show_stripe') ? '<div id="stripe"></div>' : ''). '<img src="'.of_get_option('background_image').'"></div>';
			}
		break;
		case 'pattern':
			if( of_get_option('background_pattern_custom') ){

				echo '<div style="background-image: url(\''.of_get_option('background_pattern_custom').'\')" id="background_pattern"></div>';
			
			}elseif (of_get_option('background_pattern')) {

				echo '<div style="background-image: url(\''.get_template_directory_uri() . '/assets/img/pattern/large/'.of_get_option('background_pattern').'\')" id="background_pattern"></div>';
			}
		break;
	}
?>
<?php
	// Advert above header
	$ad_header_mode = of_get_option('ad_header_mode', 'none');

	if($ad_header_mode != 'none'){
		echo '<div class="above_header">';
			if($ad_header_mode == 'image'){
				echo '<a href="'.of_get_option('ad_header_image_link').'" target="_blank"><img src="'.of_get_option('ad_header_image').'"></a>';
			}elseif($ad_header_mode == 'html'){
				echo of_get_option('ad_header_code');
			}
		echo '</div>';
	}
?>
<div id="page" class="site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" role="banner">
			<div class="head_logo">
						<div class="top-header_rt_nav">
                    		<ul id="nav"> 
							   <li class="menuLink"><a href="http://safewayhealthdv.safeway.com/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab1.gif" onMouseOver="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab1_over.gif'" onMouseOut="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab1.gif'" alt="Who We Are" border="0"></a></li> 
							   <li class="menuLink"><a href="http://safewayhealthdv.safeway.com/who-we-are"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab2.gif" onMouseOver="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab2_over.gif'" onMouseOut="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab2.gif'" alt="Who We Are" border="0"></a></li> 
							   <li class="menuLink"><a href="http://safewayhealthdv.safeway.com/what-we-do"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab3.gif" onMouseOver="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab3_over.gif'" onMouseOut="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab3.gif'" alt="Who We Are" border="0"></a></li> 
							   
							   <li class="menuLink"><a href="http://safewayhealthdv.safeway.com/our-model"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab4.gif" onMouseOver="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab4_over.gif'" onMouseOut="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab4.gif'" alt="Creating Value" border="0"></a></li> 
							   <li class="menuLink"><a href="http://safewayhealthdv.safeway.com/our-results"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab5.gif" onMouseOver="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab5_over.gif'" onMouseOut="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/TopTab5.gif'" alt="Our Results" border="0"></a></li> 
								<li class="menuLink"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/TopTab6_over.gif" alt="Home" border="0"></li> 
							 </ul> 	                    		
                    		<div class="clear"></div>
                    	</div>

		<div class="container">
			
			<div class="navbar navbar-inverse">
					<!-- navbar was here -->
			</div>
			
		</div>
		
		</div>
		
	</header><!-- #masthead .site-header -->
	
	<div id="main" class="container">
		<div class="headbox_lft"></div>