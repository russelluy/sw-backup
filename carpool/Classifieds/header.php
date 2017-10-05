<?php error_reporting(E_ERROR);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php if (is_home () ) { bloginfo('name'); }
elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
elseif (is_single() ) { single_post_title();}
elseif (is_page() ) { single_post_title();}
else { wp_title('',true); } ?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
global $options;
foreach ($options as $value) {
		global $$value['id'];
        if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" type"text/css"  href="<?php bloginfo('template_directory'); ?>/library/css/print.css" media="print">
<?php if ( get_option('ptthemes_favicon') <> "" ) { ?>
<link rel="shortcut icon" type="image/png" href="<?php echo get_option('ptthemes_favicon'); ?>" />
<?php } ?>
<?php if(is_home() && $_REQUEST['page']=='ads'){ get_location_map_javascripts();}?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?>
<?php if ( get_option('ptthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
</head>
<body>

<div id="topnav">
  <div id="topnav-in">
    <?php 
global $user_identity;
global $current_user;
get_currentuserinfo(); ?>
    <?php 
if (is_user_logged_in()){ ; ?>
    <p > <span class="user">
      <?php _e(WELCOME_TEXT);?>
      ,</span> <span><a href="<?php echo get_settings('home'); ?>/?page=profile">
      <?php  echo"$user_identity"; ?>
      </a>. </span> <span><a class="newlogin" href="<?php echo get_settings('home'); ?>/?page=login&action=logout"><strong>
      <?php _e(LOGOUT_TEXT);?>
      </strong></a> </span> <span> <a class="newlogin3" href="<?php echo get_settings('home'); ?>/?page=dashboard">
      <?php _e(DASHBOARD_TEXT);?>
      </a> </span> </p>
  
    <?php }
else {?>
    <p>
     
      <a class="newlogin2" href="<?php echo get_settings('home'); ?>/?page=login"><strong>
      <?php _e(LOGIN_TEXT);
	  if ( get_option('users_can_register') ){?>
      </strong></a> / <a href="<?php echo get_settings('home'); ?>/?page=register"><strong>register</strong></a>
      <?php _e(FREE_ACCOUNT_TEXT);?>
      &nbsp; </p>
    <?php } }; ?>
    
     <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Navigation Menu') ){}else{  ?>	
    <ul >
      <?php wp_list_pages('title_li=&depth=1&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
      <li><a href="<?php echo get_settings('home'); ?>/?page=blog">
        <?php _e(BLOG_TEXT);?>
        </a></li>
    </ul>
    <?php }?>
  </div>
</div>


<div id="header" class="clearfix">
  <div id="header-in" >
    <div class="h_left">
      <?php if ( get_option('ptthemes_show_blog_title') ) { ?>
      <div class="logoin-text"><a href="<?php echo get_option('home'); ?>/">
        <?php bloginfo('name'); ?>
        </a> </div>
      <p class="blog-description">
        <?php bloginfo('description'); ?>
      </p>
      <?php } else { ?>
      <a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) { echo get_option('ptthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo2.png'; } ?>" alt="<?php bloginfo('name'); ?>"  /></a>
      <p class="blog-description">
        <?php bloginfo('description'); ?>
      </p>
      <?php } ?>
    </div>
    <!--hleft end -->
    <div id="search">
      <form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
        <input type="text" value="<?php _e(SEARCH_HERE_TEXT);?>" name="s" class="s" onfocus="if (this.value == '<?php _e(SEARCH_HERE_TEXT);?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e(SEARCH_HERE_TEXT);?>';}"/>
        <input type="image" src="<?php bloginfo('template_url'); ?>/images/none.png" alt="" class="sgo"  />
      </form>
    </div>
    <div class="b_classified"><a href="<?php echo get_settings('home'); ?>/?page=ads" >
     
      Post a Carpool
      </a> </div>
	<div class="b_classified"><a href="<?php echo get_settings('home'); ?>/wp-admin/admin.php?page=s2" >
     
      Subscribe
      </a> </div>
    <?php

if($_REQUEST['page']=='profile')
{
	$myprofile_link = ' &raquo; <a href="'.get_option('siteurl').'/?page=dashboard">'.PROFILE_TEXT.'</a>';
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('', $myprofile_link.' &raquo; '.__(EDIT_PROFILE_PAGE_TITLE)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
else
if($_REQUEST['page']=='blog')
{
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(BLOG_TEXT)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
else
if($_REQUEST['page']=='dashboard')
{
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(DASHBOARD_TEXT)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
else
if($_REQUEST['page']=='ads')
{
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(POST_CLASSIFIED_PAGE_TITLE)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
else
if($_REQUEST['page']=='latest')
{
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(LATEST_LISTING_TITLE)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}else
if($_REQUEST['page']=='delete')
{
	?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.__(DELETE_ADS_PAGE_TITLE)); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
else
{
?>
    <div class="breadcrumb2 ">
      <?php if ( get_option( 'ptthemes_breadcrumbs' ))  { yoast_breadcrumb('',''); } ?>
    </div>
    <!-- breadcrumbs #end -->
    <?php	
}
?>
  </div>
  <!--header in end -->
</div>
<!--header end -->
