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
	
	<?php if ( hybrid_get_setting( 'SWMilbrae_favicon_url' ) ) { ?>
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo hybrid_get_setting( 'SWMilbrae_favicon_url' ); ?>" />
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

	<?php do_atomic( 'open_body' ); // SWMilbrae_open_body ?>

	<div id="container">
		
		<div class="wrap">

			<?php do_atomic( 'before_header' ); // SWMilbrae_before_header ?>
			
	
			<div id="header">
	
				<?php do_atomic( 'open_header' ); // SWMilbrae_open_header ?>
	
					<div id="branding">
							
								<a href="<?php echo home_url(); ?>/" title="<?php echo bloginfo( 'name' ); ?>" rel="Home">
									<img class="logo" src="<?php bloginfo('template_directory');?>/images/swm_logo.jpg" alt="<?php echo bloginfo( 'name' ); ?>" />
								</a>
					
						<?php hybrid_site_description(); ?>
						
					</div><!-- #branding -->
					<div class="top-right">
						
						<div class="searching">
			                 <?php get_search_form(); ?>
			              </div>
			         </div>
					
					<?php get_sidebar( 'header' ); // Loads the sidebar-header.php template. ?>
					
					<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>					
	
					<?php do_atomic( 'header' ); // SWMilbrae_header ?>
	
				<?php do_atomic( 'close_header' ); // SWMilbrae_close_header ?>
	
				
			</div><!-- #header -->

			<?php do_atomic( 'after_header' ); // SWMilbrae_after_header ?>
	
			<?php do_atomic( 'before_main' ); // SWMilbrae_before_main ?>
			
			
			<div id="main">
	
				<?php do_atomic( 'open_main' ); // SWMilbrae_open_main ?>
				
				
				
				
				