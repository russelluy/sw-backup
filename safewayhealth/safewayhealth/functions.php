<?php
function eg_function() {
if(!is_admin()){
	wp_enqueue_script( 'jquery' );
	
	//Dropdown Menu
	wp_enqueue_style('dropstyle', get_template_directory_uri() . '/css/style.css'); 
	wp_enqueue_script('dropmenu', get_template_directory_uri() . '/js/jquery-latest.min.js', array('jquery'));
	wp_enqueue_script('strtdropmenu', get_template_directory_uri() . '/js/strtdrop.js', array('jquery'));
	//Fancybox
	wp_enqueue_script('jqueryjcarousel', get_template_directory_uri() . '/lib/jquery.jcarousel.min.js"', array('jquery'));
	wp_enqueue_script('mousewheel', get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.4.pack.js"', array('jquery'));
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.pack.js"', array('jquery'));
	wp_enqueue_style('fancyboxstyle', get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.css'); 

	}
}    

 add_action('init', 'eg_function');
 
 
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


?>