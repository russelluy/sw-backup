<?php
global $gw_options; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if (is_home()) {bloginfo('name'); ?><?php } elseif (is_category() || is_page() ||is_single()) { ?> <?php } ?><?php wp_title(''); ?></title>

<meta name="keywords" content="<?php echo $gw_options['general']['seo_keywords']; ?>" />
<meta name="description" content="<?php echo $gw_options['general']['seo_description']; ?>" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


<?php if($gw_options['general']['cssswitch'] == 8){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/krem/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 7){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/red_brown/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 6){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/dark_brown/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 5){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/dark_orange/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 4){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/dark_redblue/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 3){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/white_green/styles.css" type="text/css" media="screen" />
<?php } else if($gw_options['general']['cssswitch'] == 2){ ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/white_blue/styles.css" type="text/css" media="screen" />
<?php } else {?> 
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/white_orange/styles.css" type="text/css" media="screen" />
<?php }

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

if ( ( is_single() || is_page() || is_home() ) && ( !is_paged() ) ) {
        echo '<meta name="robots" content="index, follow" />' . "\n";
} else {
        echo '<meta name="robots" content="noindex, follow" />' . "\n";
}

wp_head(); ?>


<script type="text/javascript">
	jQuery.noConflict();
	Cufon.replace('h1, h2, h3, h4', {hover: true});
	
	jQuery(document).ready(function(){  
		jQuery("#contactform").validate();  
		 
		/* homepage slider parameters */				   
		jQuery('#home-slider').cycle({ 
		fx:     'fade', 
		speed:  2000, 
		timeout: <?php if ($gw_options['homepage']['slide_duration']) { echo $gw_options['homepage']['slide_duration'];} else echo "4000"; ?>, 
		pager:  '#nav' 
		});		 
	});  					   	
</script>


<!--[if IE 6]>
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/ie6.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php echo get_bloginfo('template_url'); ?>/js/dd_belated_png.js'></script>
<script>DD_belatedPNG.fix('#logo a img, .h-box-1 img, .h-box-2 img, .widget_mc_brochure img, .slide-txt');</script>
<![endif]-->
<?php if ($gw_options['general']['custom_css']) {?>
<style type="text/css">
	<?php echo $gw_options['general']['custom_css']; ?>
</style>
<?php }?>

</head>

<body>
<div id="body-wrapper">
    <div class="clearfix">
        <div id="logo">
            <a href="<?php echo get_settings('home'); ?>/">
            	<img src="<?php echo bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" />
            </a>
            <?php 
			if($gw_options['general']['lt_option'] == 1) { ?>
            <p class='logo-desc'>
            <?php 
				if ($gw_options['general']['logo_tagline']) {
					echo $gw_options['general']['logo_tagline'];
				}
				else {
            		echo "your attractive and simple slogan";
				}
			?>
            </p>
            <?php } ?> 
        </div>
        <?php
		if($gw_options['general']['search_option'] == 1) {
        	get_search_form();
        }
		?>
    </div>	
    
    <div class="main-menu-wrapper">

		<?php wp_nav_menu(array('theme_location' => 'header-menu', 'depth' => '0', 'container_class' => 'jqueryslidemenu', 'container_id' => 'myslidemenu')); ?>        
    </div>
