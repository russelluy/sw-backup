<?php 
/* load javascript files in theme's header */
function goldenworks_load_scripts() {
	if(!is_admin()){
		wp_enqueue_script( 'custom-js', GOLDENWORKS_JS .'/custom.js', array('jquery'));
		wp_enqueue_script( 'slidemenu-js', GOLDENWORKS_JS .'/jqueryslidemenu.js', array('jquery'));	
		wp_enqueue_script( 'cufon-yui', GOLDENWORKS_JS .'/cufon-yui.js', array('jquery'));
		wp_enqueue_script( 'liberation-sans', GOLDENWORKS_JS .'/Liberation_Sans_400.font.js', array('jquery'));
	}
}

add_action('wp_print_scripts', 'goldenworks_load_scripts');
add_action('wp_print_styles', 'goldenworks_load_scripts');

?>