<?php
function encrypt($key, $string) {
   $output = false;
   $iv = md5(md5($key));
   //echo 'In encrypt<br />'.$iv.'<br />';
   $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
   //echo $output.'<br />';
   $output = base64_encode($output);
   //echo $output.'<br />encrypt done.<br />';
   return $output;
}

$current_user = wp_get_current_user();
$content = $current_user->ID.'_'.time();
//echo '  content: '.var_export($content, true).'<br />';
//echo '   time: '.(time()+60*30).'<br />';
//echo wp_salt().'<br /><br />';
if(empty($_COOKIE['csafny'])){
//	echo 'cookies empty<br />';	
}
else{
//	echo 'expiring old cookies<br />';	
	setcookie('csafny', '', (time()-3600));
}
//echo 'test<br />';
//echo 'Encrypted val: '.encrypt('testkey', $content).'<br />';
//$scook = setcookie('csafny', encrypt(wp_salt(), $content),(time()+60*30), '/', 'safeway.com', true, false);
$scook = setcookie('csafny', encrypt('testkey', $content),(time()+60*30), '/', 'safeway.com', true, false);
if($_GET['canada'] === 'true'){
	header('Location: /canada');
}else if($_GET['onesimplechange'] === 'true'){
	header('Location: /onesimplechange');
}else if($_GET['dominicks'] === 'true'){
        header('Location: /dominicks');
}

//$scook = setcookie('csafny', $content,(time()+60*30), '/', 'safeway.com', true, false);
//echo "Set cookie: ".$scook.'<br />';
?>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
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
		echo ' | ' . sprintf( __( 'Page %s', 'employeecontheme' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php
if ($current_user->ID != 0) {	
    $country = get_user_meta($current_user->ID, 'country'); 
    $country[0] = 'CA';
    if($country[0] === 'CA' || $country[0] === "CA"){
        $randnum = rand(1000, 9999);
	 $user_meta = get_user_meta( $current_user->ID, TOKEN_CACHE);
	 if(!empty($user_meta)){
		$chunks = split('\+\+\+', $user_meta[0]);
		//var_dump($chunks);
		if(count($chunks) == 2 && (time()+10) < $chunks[1]){ //buffer 10 seconds
			$token = $chunks[0];	
		}
	 }
	 if(empty($token)){
		$cutOff = time() + 120; // current time + 60 seconds
		$token = base64_encode($current_user->ID.''.rand(rand(1, 99), rand(10000, 99999999)).''.$cutoff);
	 	delete_user_meta( $current_user->ID, TOKEN_CACHE);		
		add_user_meta( $current_user->ID, TOKEN_CACHE, $token.'+++'.$cutOff);
	 }		
        ?>
            <script type="text/javascript">
            jQuery(document).ready(function(){				               
               jQuery('a[href="http://www.safewaytravel.ca"]').live('click', function(event){
                   jQuery('#travel').submit();				   
                   event.preventDefault();
                   return false;
               }); 
				jQuery('.nivo-slice').live('click', function(event){
					var bg = jQuery(this).css('background-image');
					//alert(bg);			
					bg = bg.replace('url(','').replace(')','').replace('"', '').replace('"', '');
					var fileNameIndex = bg.lastIndexOf("/") + 1;
					var filename = bg.substr(fileNameIndex);
					if(filename == 'MySafeway_Banner323.jpg'){
							jQuery('#travel').submit();
							event.preventDefault();
							return false;
					}
               });
			   jQuery('.nivo-slice').live('hover', function(event){
					var bg = jQuery(this).css('background-image');
					//alert(bg);			
					bg = bg.replace('url(','').replace(')','').replace('"', '').replace('"', '');
					var fileNameIndex = bg.lastIndexOf("/") + 1;
					var filename = bg.substr(fileNameIndex);
					if(filename == 'MySafeway_Banner323.jpg'){
							jQuery(this).css('cursor', 'pointer');
							jQuery(this).css('cursor', 'hand');
					}
               });
            });
            </script>            
                <form id="travel" method="post" action="https://www.safewaytravel.ca/members/login/employee">
                    <input type="hidden" name="SafewayToken" value="<?php echo $token; ?>" />
                </form>
        <?php
    }
    else{
        ?>
		<script type="text/javascript">
            jQuery(document).ready(function(){			   
               jQuery('a[href="http://www.safewaytravel.ca"]').live('click', function(event){
                   event.preventDefault();
                   return false;
               });   
            });
        </script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-42051940-3', 'safeway.com');
  ga('send', 'pageview');
 
</script>        
        <?php        
    }
}
?>

<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				
					
				</<?php echo $heading_tag; ?>>
				<!-- <div id="site-description"><?php bloginfo( 'description' ); ?></div> -->

				<img src="<?php bloginfo('template_directory');?>/images/head.png" />

			</div><!-- #branding -->

			<div id="access_wrap">
				<div id="access" role="navigation">
				  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'employeecontheme' ); ?>"><?php _e( 'Skip to content', 'employeecontheme' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php 
					if ($current_user->ID != 0) {
						$country = get_user_meta($current_user->ID, 'country');  
							if($country[0] === 'CA'){
								wp_nav_menu( array('menu' => 'Canada Menu', 'container_class' => 'menu-header', 'theme_location' => 'primary' ));
							}
							else{
								wp_nav_menu( array('menu' => 'US Menu', 'container_class' => 'menu-header', 'theme_location' => 'primary' ));
							}
					}
					else{
						wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); 
					}?>
				</div><!-- #access -->
				<!--<div id="search">
					<span>SEARCH </span><?php get_search_form(); ?>
				</div>	-->		</div><!-- #access_wrap -->
		</div><!-- #masthead -->
	</div><!-- #header -->


