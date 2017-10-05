<?php
/**
 * Header Template
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=IE8" />	
	<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<?php if ( hybrid_get_setting( 'NorcalTheme_favicon_url' ) ) { ?>
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo hybrid_get_setting( 'NorcalTheme_favicon_url' ); ?>" />
	<?php } ?>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon" />
	<!-- Title -->
	<title><?php hybrid_document_title(); ?></title>
	
	<!-- Stylesheet -->	
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!-- WP Head -->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_enqueue_script("jquery-ui-core"); ?>
	<?php wp_head(); ?>

</head>

<body class="<?php hybrid_body_class(); ?> no-js">
		<?php do_atomic( 'open_body' ); // NorcalTheme_open_body ?>


		<div class="wrap">
											<?php do_atomic( 'before_header' ); // NorcalTheme_before_header ?>
			
							<div id="header">
											<?php do_atomic( 'open_header' ); // NorcalTheme_open_header ?>
												
												<div id="logo_bar">
															<img src="<?php bloginfo('template_directory');?>/images/logo_bar.jpg" />
												</div>
												
									<div id="branding">
												<a href="<?php echo home_url(); ?>/" title="<?php echo bloginfo( 'name' ); ?>" rel="Home">
													<img class="logo" src="<?php bloginfo('template_directory');?>/images/norcal_logo.jpg" alt="<?php echo bloginfo( 'name' ); ?>" />
												</a>
												<?php hybrid_site_description(); ?>
												
									</div><!-- #branding -->
									
									
									<div class="top-left">
											<a href="<?php echo home_url(); ?>/" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','<?php bloginfo('template_directory');?>/images/icons_01_over.gif',1)"><img src="<?php bloginfo('template_directory');?>/images/icons_01.gif" name="Image1" width="37" height="30" border="0" id="Image1" /></a>

<a href="search" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','<?php bloginfo('template_directory');?>/images/icons_02_over.gif',1)"><img src="<?php bloginfo('template_directory');?>/images/icons_02.gif" name="Image2" width="33" height="30" border="0" id="Image2" /></a><a href="contact" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','<?php bloginfo('template_directory');?>/images/icons_03_over.gif',1)"><img src="<?php bloginfo('template_directory');?>/images/icons_03.gif" name="Image3" width="29" height="30" border="0" id="Image3" /></a>
							         </div>
											<?php get_sidebar( 'header' ); // Loads the sidebar-header.php template. ?>
											<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>				
											<?php do_atomic( 'header' ); // NorcalTheme_header ?>
											<?php do_atomic( 'close_header' ); // NorcalTheme_close_header ?>
							</div><!-- #header -->
				
											<?php do_atomic( 'after_header' ); // NorcalTheme_after_header ?>	
											<?php do_atomic( 'before_main' ); // NorcalTheme_before_main ?>
											<?php do_atomic( 'open_main' ); // NorcalTheme_open_main ?>
				

				
				