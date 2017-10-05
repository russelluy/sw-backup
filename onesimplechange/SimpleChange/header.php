<meta http-equiv="X-UA-Compatible" content="IE=8" />

<?php
function decrypt($key, $string) {
   $output = false;
   $iv = md5(md5($key));
   $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
   $output = rtrim($output, "");
   return utf8_encode($output);
}
error_reporting(0);
if(empty($_COOKIE['csafny'])){
        //header('Location: /wp-login.php?redirect_to=/?onesimplechange=true&reauth=1');
}
else{
        $output = decrypt('testkey', $_COOKIE['csafny']);
        $output = trim($output);
        $val = explode('_',$output);
        if(count($val) == 2 && time() <= (intval($val[1])+60*30)){
        }
        else{
                //header('Location: /wp-login.php?redirect_to=/?onesimplechange=true&reauth=1');
        }
}
?>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @simplechange
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42051940-2', 'safeway.com');
  ga('send', 'pageview');

</script>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<style type="text/css">
#content {
  position: relative;
}

/* Image map information */
.clicker {
  position: absolute;
  top: 0px;
  right: 40px; 
  display: block;
  width: 162px;
  height: 110px;
}
.clicker2 {
  position: absolute;
  top: 150px;
  left: 23px; 
  display: block;
  width: 185px;
  height: 135px;
}
.clicker3 {
  position: absolute;
  top: 350px;
  left: 23px; 
  display: block;
  width: 185px;
  height: 135px;
}
.clicker4 {
  position: absolute;
  top: 450px;
  right: 40px; 
  display: block;
  width: 185px;
  height: 135px;
}
/* end image map info */

</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<!--<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>-->
<div>
<img class="alignnone size-full wp-image-221" alt="cropped-cropped-header.png" src="/onesimplechange/wp-content/uploads/2013/08/cropped-cropped-header.png" width="1050" height="141" /></a>
</div>


</header>    <!-- #masthead -->
<!-- nav -->
<div style="text-align: center; margin-top:24px; margin-bottom:20px;">
<a href="/onesimplechange/"><img style="margin-top: 5px; margin-right: 5px;" onmouseover="this.src='/onesimplechange/wp-content/uploads/2013/08/B_home_over.png'" onmouseout="this.src='/onesimplechange/wp-content/uploads/2013/08/B_home.png'" src="/onesimplechange/wp-content/uploads/2013/08/B_home.png" alt="" border="0" /></a>
<a href="/onesimplechange/?page_id=243"><img style="margin-top: 5px; margin-right: 5px;" onmouseover="this.src='/onesimplechange/wp-content/uploads/2013/08/B_YourChange_over.png'" onmouseout="this.src='/onesimplechange/wp-content/uploads/2013/08/B_YourChange.png'" src="/onesimplechange/wp-content/uploads/2013/08/B_YourChange.png" alt="" border="0" /></a>
<a href="/onesimplechange/?page_id=19"><img style="margin-top: 5px; margin-right: 5px;" onmouseover="this.src='/onesimplechange/wp-content/uploads/2013/08/B_StartToday_over.png'" onmouseout="this.src='/onesimplechange/wp-content/uploads/2013/08/B_StartToday.png'" src="/onesimplechange/wp-content/uploads/2013/08/B_StartToday.png" alt="" border="0" /></a>
<a href="/onesimplechange/logout.php"><img style="margin-top: 5px; margin-right: 5px;" onmouseover="this.src='/onesimplechange/wp-content/uploads/2013/08/logout_over.png'" onmouseout="this.src='/onesimplechange/wp-content/uploads/2013/08/logout.png'" src="/onesimplechange/wp-content/uploads/2013/08/logout.png" alt="" border="0" /></a>
</div>
<!-- end nav -->
	<!--	<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'simplechange' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'simplechange' ); ?>"><?php _e( 'Skip to content', 'simplechange' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav> -->  <!-- #site-navigation -->

		

	<div id="main" class="wrapper">
