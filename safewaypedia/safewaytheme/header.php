<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta content="max-age=0" http-equiv="cache-control">
<meta content="no-cache" http-equiv="cache-control">
<meta content="0" http-equiv="expires">
<meta content="Sat, 01 Dec 2001 00:00:00 GMT" http-equiv="Expires">
<meta content="no-cache" http-equiv="pragma">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<?php wp_enqueue_script("jquery"); ?>
<?php wp_enqueue_script("jquery-ui-core"); ?>
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
<script type="text/javascript">
jQuery(document).ready(function(){
<?php
function full_url(){
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
	$uri = $protocol . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$segments = explode('?', $uri, 2);
	$url = $segments[0];
	return $url;
}
if(empty($_GET['s']) && empty($_GET['snap']) && $_GET['snap'] != '0'){
	if(home_url().'/' === full_url()){		
		$newurl = home_url().'/?snap=A';		
	}
}
else if(!empty($_GET['s'])){
	
}
?>
	var newurl = '<?php echo $newurl; ?>';
	if(newurl != ''){
		window.location.href = newurl;
	}
	else{
		jQuery('body').show();	
	}
	var mainList = new Array();
	var numList = new Array();
	var spList = new Array();
	jQuery.each(jQuery('ol.snap_nav li'), function(index, value){
		if(isNaN(jQuery(value).text()) == false){
			numList.push(value);	
		}
		else if(jQuery(value).text().indexOf('#') === 0){
			spList.push(value);
		}
		else{
			mainList.push(value);
		}
	});
	var newList = mainList.concat(spList).concat(numList);
	jQuery('ol.snap_nav li').remove();
	jQuery.each(newList, function(index, value){
		jQuery('ol.snap_nav').append(value);
	});
});
</script>


<!--<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body style="display: none;">
				<?php 
				$headerFile = "/var/www/assets/header/header.html";
				$fh = fopen($headerFile, 'r');
				$data = fread($fh, filesize($headerFile));
				fclose($fh);
				echo $data;
				?>	
				

	<div id="page-container">
    	<div class="page-container-inner">
            <div class="frame">
              <div class="bottom-header-bgb">
              		<div class="search">
              			<?php get_search_form();?>
              		</div>
	                <div id="bottom-header">
	                	<div id="nav-menu">
	                    <?php
	                      if (function_exists('wp_nav_menu')) { 
	                        wp_nav_menu( array('container_id'=>'','menu_id'=>'', 'menu_class' => 'sf-menu', 'theme_location' => 'topnav','fallback_cb'=>'safewaytheme_topmenu_pages','sort_column' => 'menu_order', 'depth' =>3 ) );
	                      } else {  
	                        safewaytheme_topmenu_pages();
	                      } ?>          
	                              
	                    </div>
	                     
                 		
                 		</div>     
	                </div>
	                </div>
		        </div>
            <div class="contentbodywrap_none">	
            <!-- BEGIN CONTENT -->
            <?php if (is_home()) echo '<div id="content">';
            