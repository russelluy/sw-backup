<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<?php $style = get_option('highlight_color');?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.php?style=<?php echo $style;?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/menu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/typeface-0.14.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/juni_regular.typeface.js"></script>
<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/ie.css" type="text/css" media="screen" />
<![endif]-->
<style>
#logo {
<?php
 $margin = get_option('margin_top');
 if (!empty($margin) && $margin==0) { ?>
	margin-top: <?php echo $margin;?>px;
 <?php } else { ?>
	margin-top: 50px;
<?php } ?>
}
</style>
</head>

<body>			

<div id="wrapper">

<div id="header">
<?php if(get_option('logo_pic')) { ?>
<div id="logo">
<a href="/" title="home"><img src="<?php bloginfo('template_directory'); ?>/images/logos/<?php echo get_option('logo_pic');?>"></a>
</div>
<?php } else { ?>
<div id="logoname" class="typeface-js">
<a href="/" title=""><?php bloginfo('name'); ?></a>
</div>
<?php } ?>
<div class="navigation">	
<?php
$exclude = get_option('pages_exclude');
?> 
				<div class="menuwrap">
                 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Menu')) { ?>
              <?php } ?>
              <div class="clear"></div>
              </div>
              

</div>
    </div>
        </div>
</div>