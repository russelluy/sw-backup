<?php
	/*  Loads the Options Panel  */
	if ( !function_exists( 'optionsframework_init' ) ) {

		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/theme-options/' );
		require_once dirname( __FILE__ ) . '/theme-options/options-framework.php';

		/*  Add custom script to theme options  */
		add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
	}
		
	function optionsframework_custom_scripts(){ 
		echo '<script type="text/javascript" src="'.OPTIONS_FRAMEWORK_DIRECTORY.'js/theme-options.js"></script>';
		echo '<link rel="stylesheet" type="text/css" href="'.OPTIONS_FRAMEWORK_DIRECTORY.'css/theme-options.css">';
	}
	/* 
	 * This is an example of how to override a default filter
	 * for 'textarea' sanitization and $allowedposttags + embed and script.
	 */
	add_action('admin_init','optionscheck_change_santiziation', 100);
	 
	function optionscheck_change_santiziation() {
	    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
	    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
	}
	 
	function custom_sanitize_textarea($input) {
	    global $allowedposttags;
	    $custom_allowedtags["embed"] = array(
	      "src" => array(),
	      "type" => array(),
	      "allowfullscreen" => array(),
	      "allowscriptaccess" => array(),
	      "height" => array(),
	      "width" => array()
	    );
	    $custom_allowedtags["script"] = array(	      
	    	"id" => array(),
	    	"src" => array(),
	      	"type" => array()
	    );
	    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	    $output = wp_kses( $input, $custom_allowedtags);
	    return $output;
	}
?>