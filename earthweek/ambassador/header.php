<?php 
// Load saved values in Hermes Theme Options
$hermes_options = hermes_get_global_options(); 

global $wpdb;

$count_energy = $wpdb->get_var("select count(ENERGY) from IDEA_BADGE where ENERGY=1");
$count_reuse = $wpdb->get_var("select count(REUSE) from IDEA_BADGE where REUSE=1");
$count_water = $wpdb->get_var("select count(WATER) from IDEA_BADGE where WATER=1");
$count_volunteer = $wpdb->get_var("select count(VOLUNTEER) from IDEA_BADGE where VOLUNTEER=1");
$count_food = $wpdb->get_var("select count(FOOD) from IDEA_BADGE where FOOD=1");
$count_recycling = $wpdb->get_var("select count(RECYCLING) from IDEA_BADGE where RECYCLING=1");

?>
<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<meta http-equiv="X-UA-Compatible" content="IE=8" />-->
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<title><?php wp_title(''); ?></title>
	<!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/styles/ie8.css" /><html class="ie8"> <![endif]--> 
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<?php if ($hermes_options['hermes_color_style'] != 'Default') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/styles/<?php echo strtolower($hermes_options['hermes_color_style']); ?>.css" />
	<?php } ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var line1 = [['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Energy<br /><img src="/earthweek/wp-content/themes/ambassador/images/energy.png" width="80px" /></div>', <?php echo $count_energy;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Reuse<br /><img src="/earthweek/wp-content/themes/ambassador/images/reuse.png" width="80px" /></div>', <?php echo $count_reuse;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Water<br /><img src="/earthweek/wp-content/themes/ambassador/images/water.png" width="80px" /></div>', <?php echo $count_water;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Volunteer<br /><img src="/earthweek/wp-content/themes/ambassador/images/volunteer.png" width="80px" /></div>', <?php echo $count_volunteer;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Food<br /><img src="/earthweek/wp-content/themes/ambassador/images/food.png" width="80px" /></div>', <?php echo $count_food;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Recycling<br /><img src="/earthweek/wp-content/themes/ambassador/images/recycling.png" width="80px" /></div>', <?php echo $count_recycling;?>]]; 
    $('#chart2').jqplot([line1], {
//        title:'Bar Chart with Custom Colors',
        // Provide a custom seriesColors array to override the default colors.
        seriesColors:['#A9FF00', '#FED501', '#0166FF', '#BA01FF', '#FF003A', '#89756A'],
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
	     shadowAngle: 135,
	     pointLabels: { show: true, location: 'e', edgeTolerance: 10 },
            rendererOptions: {
                // Set varyBarColor to tru to use the custom colors on the bars.
                varyBarColor: true,
//		  barDirection: 'horizontal',
		  barMargin: 70
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/styles/jquery.jqplot.min.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/styles/jquery-ui.css" />
	 <script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
	
	<?php
	/*
	This block refers to the functionality of the Appearance > Customize screen.
	*/
	
	$hermes_font_main = get_theme_mod( 'hermes_font_main' );
	$hermes_font_widget = get_theme_mod( 'hermes_font_widget' );
	$hermes_color_body = get_theme_mod( 'hermes_color_body' );
	$hermes_color_link = get_theme_mod( 'hermes_color_link' );
	$hermes_color_link_hover = get_theme_mod( 'hermes_color_link_hover' );
	
	if( $hermes_font_main != '' || $hermes_font_widget != '' || $hermes_color_body != '' || $hermes_color_link != '' || $hermes_color_link_hover != '') {
		echo '<style type="text/css">';
		if (($hermes_font_main != '') && ($hermes_font_main != 'default')) {
			echo 'body { font-family: '.$hermes_font_main.'; } ';
		}
		if ($hermes_color_body != '') {
			echo 'body { color: '.$hermes_color_body.'; } ';
		}
		if ($hermes_color_link != '') {
			echo 'a, .featured-pages h2 a { color: '.$hermes_color_link.'; } ';
		}
		if ($hermes_color_link_hover != '') {
			echo 'a:hover, .featured-pages h2 a:hover { color: '.$hermes_color_link_hover.'; } ';
		}
		if (($hermes_font_widget != '') && ($hermes_font_widget != 'default')) {
			echo '.widget .title-widget { font-family: '.$hermes_font_widget.'; } ';
		}

		echo '</style>';
	}
	?>

	<?php print(stripslashes($hermes_options['hermes_script_header'])); ?>

</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
$(document).ready(function(){
$(".trigger").click(function(){
    var divToToggle = $( $(this).find("a").attr('href') );
    $(".toggle:visible").not(divToToggle).hide();
    divToToggle.slideToggle("slow");
  });
});
</script>

<div id="container">

	<header>
	
		<div class="wrapper wrapper-logo">
		
			<div id="logo">
				<?php $default_logo = get_template_directory_uri() . '/images/logo.png'; ?>
				<a href="<?php echo home_url(); ?>/index.php" title="<?php bloginfo('description'); ?>"><img src="<?php if (get_theme_mod('hermes_logo_upload') != '') { echo get_theme_mod('hermes_logo_upload'); } else { echo $default_logo; } ?>" alt="<?php bloginfo('name'); ?>" /></a>
			</div><!-- end #logo -->
			
			<?php if (has_nav_menu( 'secondary' )) { ?> 

			<nav id="menu-top">

				<?php wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => '', 'menu_id' => '', 'sort_column' => 'menu_order', 'depth' => '1', 'theme_location' => 'secondary') ); ?>

			</nav><!-- end #menu-top -->

			<?php }	?>
			
			<?php if ($hermes_options['hermes_header_contacts_display'] == 1) { ?>
			<div class="header-additional">
				<ul class="header-contact">
					<li class="hermes-contact telephone"><span class="label"><?php echo $hermes_options['hermes_header_contact_telephone_label']; ?></span> <span class="value"><?php echo $hermes_options['hermes_header_contact_telephone_value']; ?></span></li>
					<li class="hermes-contact address"><span class="label"><?php echo $hermes_options['hermes_header_contact_address_value']; ?></span><?php if ($hermes_options['hermes_header_contact_map_value']) { ?> <span class="value"><a href="<?php echo $hermes_options['hermes_header_contact_map_value']; ?>"><?php echo $hermes_options['hermes_header_contact_map_label']; ?></a></span><?php } ?></li>
					<?php if (isset($hermes_options['hermes_header_contact_email_value'])) { ?><li class="hermes-contact email"><span class="label"><?php echo $hermes_options['hermes_header_contact_email_label']; ?></span> <span class="value"><a href="mailto:<?php echo $hermes_options['hermes_header_contact_email_value']; ?>"><?php echo $hermes_options['hermes_header_contact_email_value']; ?></a></span></li><?php } ?>
				</ul><!-- end .header-contact -->
			</div><!-- end .header-additional -->
			<?php } ?>

			<div class="cleaner">&nbsp;</div>
			
		</div><!-- end .wrapper -->
		
		<nav id="menu-main">
			<div class="wrapper">
				
				<a class="toggle_mobile_menu" id="hermes-toggle" href="#"></a>
				
				<?php if (has_nav_menu( 'primary' )) { 
					wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'dropdown', 'menu_id' => 'menu-main-menu', 'sort_column' => 'menu_order', 'theme_location' => 'primary','items_wrap' => '<ul id="menu-main-menu" class="dropdown sf-js-enabled mobile-menu">%3$s'.'<li class="cleaner">&nbsp;</li>'.'</ul>' ) );
				}
				else
				{
					echo '<p class="hermes-notice">Please set your Main Menu on the <a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a> page. For more information please <a href="http://www.hermesthemes.com/documentation/ambassador/">read the documentation</a></p>';
				}
				?>
			</div><!-- end .wrapper -->
		</nav><!-- end #menu-main -->
	
	</header>