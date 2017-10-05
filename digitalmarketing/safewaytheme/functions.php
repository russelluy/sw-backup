<?php
$role = get_role('editor'); 
$role->add_cap('edit_theme_options');

function custom_admin_menu() {

    $user = new WP_User(get_current_user_id());     
    if (!empty( $user->roles) && is_array($user->roles)) {
        foreach ($user->roles as $role)
            $role = $role;
    }

    if($role == "editor") { 
       remove_submenu_page( 'themes.php', 'themes.php' );
       remove_submenu_page( 'themes.php', 'widgets.php' ); 
    }       
}

add_action('admin_menu', 'custom_admin_menu');


function sw_function() {
if(!is_admin()){
	//wp_enqueue_script( 'jquery' );
	
//Dropdown Blk
wp_enqueue_script('tab', '/wp-content/themes/safewaytheme/js/tab.js', array('jquery'));

//fancybox
//wp_enqueue_script( 'jquerymin', '/wp-content/themes/safewaytheme/fancybox/jquery.min.js', array('jquery'));
wp_enqueue_script( 'mousewheel', '/wp-content/themes/safewaytheme/fancybox/jquery.mousewheel-3.0.4.pack.js', array('jquery')); 
wp_enqueue_script( 'fancybox', '/wp-content/themes/safewaytheme/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'));
//wp_enqueue_script( 'exampz', '/wp-content/themes/safewaytheme/fancybox/exampz.js', array('jquery'));
wp_enqueue_style('fancyboxstylea', get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.css'); 

//wp_enqueue_script('hr', get_template_directory_uri() . '/stratsource/stratsource.js', array('jquery', 'fancybox' ), '2.0', true);

//Nivo Slider
wp_enqueue_script( 'nivoslider', '/wp-content/themes/safewaytheme/js/jquery.nivo.slider.pack.js', array('jquery'));
wp_enqueue_script( 'nivostart', '/wp-content/themes/safewaytheme/js/nivostart.js', array('jquery'));

//Tabz
wp_enqueue_style('tabzstyle', get_template_directory_uri() . '/tabz/css/jquery.ui.all.css'); 
wp_enqueue_style('tabzdemos', get_template_directory_uri() . '/tabz/css/demos.css'); 
wp_enqueue_script( 'tabzjqcore','/wp-content/themes/safewaytheme/tabz/js/jquery.ui.core.js', array('jquery'));
wp_enqueue_script( 'tabzjqwidget','/wp-content/themes/safewaytheme/tabz/js/jquery.ui.widget.js', array('jquery'));
wp_enqueue_script( 'tabzjqtabs','/wp-content/themes/safewaytheme/tabz/js/jquery.ui.tabs.js', array('jquery', 'tabzjqcore', 'tabzjqwidget')); 

//fading slideshow mini
wp_enqueue_script( 'fadeslideshow', '/wp-content/themes/safewaytheme/js/fadeslideshow.js', array('jquery'));
wp_enqueue_script( 'fadeslideshowstart', '/wp-content/themes/safewaytheme/js/fadeslideshowstart.js', array('jquery'));


//Video Carousel
wp_enqueue_script( 'carouvid', '/wp-content/themes/safewaytheme/js/compressed.js', array('jquery'));

wp_enqueue_script( 'greeting', '/wp-content/themes/safewaytheme/greeting/sfygreeting.js', array('jquery'));
wp_enqueue_script( 'strategicsourcing', '/wp-content/themes/safewaytheme/strategicsourcing/strategicsourcing.js', array('jquery'));
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