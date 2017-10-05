<?php

function sw_function() {
if(!is_admin()){
	wp_enqueue_script( 'jquery' );
	
//Dropdown Blk
wp_enqueue_script('tab', '/wp-content/themes/safewaytheme/js/tab.js', array('jquery'));
//fancybox
//wp_enqueue_script( 'jquerymin', '/wp-content/themes/safewaytheme/fancybox/jquery.min.js', array('jquery'));
wp_enqueue_script( 'mousewheel', '/wp-content/themes/safewaytheme/fancybox/jquery.mousewheel-3.0.4.pack.js', array('jquery')); 
wp_enqueue_script( 'fancybox', '/wp-content/themes/safewaytheme/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'));
//wp_enqueue_script( 'exampz', '/wp-content/themes/safewaytheme/fancybox/exampz.js', array('jquery'));
wp_enqueue_style('fancyboxstylea', get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.css'); 

//Shadowbox Vid
wp_enqueue_script( 'shadowboxa', '/wp-content/themes/safewaytheme/shadowbox/shadowbox.js', array('jquery'));
wp_enqueue_script( 'flvstarta', '/wp-content/themes/safewaytheme/shadowbox/flvstart.js', array('jquery'));
wp_enqueue_style('fancyboxstyleb', get_template_directory_uri() . '/shadowbox/shadowbox.css'); 

//Nivo Slider
wp_enqueue_script( 'nivoslider', '/wp-content/themes/safewaytheme/js/jquery.nivo.slider.pack.js', array('jquery'));
wp_enqueue_script( 'nivostart', '/wp-content/themes/safewaytheme/js/nivostart.js', array('jquery'));
wp_enqueue_script( 'greeting', '/wp-content/themes/safewaytheme/greeting/sfygreeting.js', array('jquery'));
wp_enqueue_script('empgateway', get_template_directory_uri() . '/notices/notices.js', array('jquery', 'fancybox' ), '2.0', true);
}    
}
 add_action('init', 'sw_function');
 

$inc_path = (TEMPLATEPATH.'/include/');

require_once ($inc_path.'theme-options.php');
require_once ($inc_path.'theme-functions.php');
require_once ($inc_path.'theme-widgets.php');
require_once ($inc_path.'metabox.php');
require_once ($inc_path.'admin-interface.php');

function mytheme_add_admin() {
	global $themename, $shortname, $options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
				header("Location: themes.php?page=functions.php&saved=true");
				die;
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] ); }
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
	}
	add_menu_page($themename." Options", $themename, 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

add_action('admin_menu', 'mytheme_add_admin');

add_editor_style();

?>