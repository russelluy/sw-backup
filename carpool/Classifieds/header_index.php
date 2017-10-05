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
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/slimbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/mootools.v1.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/slimbox.js"></script>


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
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?>
 <?php if ( get_option('ptthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css">
<?php } ?>
</head>
<body <?php body_class(); ?>>

<div id="topnav">
	<div id="topnav-in">
<?php 
global $user_identity;
get_currentuserinfo(); ?>

<?php 
if (is_user_logged_in()){ ; ?>
	<p >  <span class="user"><?php _e(WELCOME_TEXT);?>, <a href="<?php echo get_settings('home'); ?>/?page=profile"><?php  echo"$user_identity"; ?></a>. </span> 
     <span><a href="<?php echo get_settings('home'); ?>/?page=login&action=logout"><strong><?php _e(LOGOUT_TEXT);?></strong></a> </span>      
    <span> <a href="<?php echo get_settings('home'); ?>/?page=dashboard"><?php _e(DASHBOARD_TEXT);?></a> </span> 
       </p> 
    
    <ul>
   	 <?php wp_list_pages('title_li=&depth=1&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
     <li><a href="<?php echo get_settings('home'); ?>/?page=blog">Blog</a></li>
    </ul>
    
    <?php }
else {?>
		<p><?php _e(WELCOME_GUEST_TEXT);?>  <a href="<?php echo get_settings('home'); ?>/?page=login"><strong><?php _e(LOGIN_TEXT);?></strong></a> /  
		<a href="<?php echo get_settings('home'); ?>/?page=register"><strong>register</strong></a> <?php _e(FREE_ACCOUNT_TEXT);?>
        &nbsp; 
        </p>
        
         <ul>  
        <?php wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
        <li><a href="<?php echo get_settings('home'); ?>/?page=blog">Blog</a></li>
    </ul>

<?php }; ?>
 
 </div>
</div>

<div id="header" class="clearfix">
  <div id="header-in" >
 
 
 			<div class="header_logo_index1">
      <?php if ( get_option('ptthemes_show_blog_title') ) { ?>
                    <div class="logo-text"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> </div>
                <p class="blog-description">
                  <?php bloginfo('description'); ?>
                </p>
                
                <?php } else { ?>
                <a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) { echo get_option('ptthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>"   /></a>  
                 <p class="blog-description">
                  <?php bloginfo('description'); ?>
                </p>           
                <?php } ?>
          </div>    <!-- header index #end -->   
               
    
  </div>
  <!--header in end -->
</div>
<!--header end -->


 