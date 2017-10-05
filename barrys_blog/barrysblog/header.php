<meta http-equiv="X-UA-Compatible" content="IE=8" />

<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<META content="IE=edge" http-equiv="X-UA-Compatible">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="X-UA-Compatible" content="IE=IE9" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon" />
<!--[if IE]>
        <link href="<?php echo get_template_directory_uri(); ?>/assets/css/all-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'barry' ), max( $paged, $page ) );

	?></title>
<meta name="description" content="<?php echo get_bloginfo( 'description') ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
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

	<div id="main" class="container">
		<div class="headbox">
				<div class="headbox_lft">
					
				</div>
				
			
		</div>
		<header id="masthead" role="banner">
		
			
		<div class="container">

			<div class="navbar navbar-inverse">
			  <div class="navbar-inner">
			    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
			    <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"><i class="icon-menu"></i></button>
				<?php 
				$logo = of_get_option('logo', '' );
				if ( !empty( $logo ) ) { 

				?>
					<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
				
						
				<?php } ?>

				<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 
							'container' => 'div',
							'container_class' => 'nav-collapse collapse',
							'theme_location' => 'primary',
							'menu_class' => 'nav',
							'walker' => new Bootstrap_Walker(),									
							) );
					}
				?>
				<?php if(of_get_option('show_search_header')){ ?>
				<div class="bl_search nav-collapse collapse">
					<?php echo get_search_form(); ?>
				</div>
				<?php } ?>
			  </div><!-- /.navbar-inner -->
			</div>

		</div>

	</header><!-- #masthead .site-header -->
					