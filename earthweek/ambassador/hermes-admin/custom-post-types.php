<?php
 
// Styling for the custom post type icon
add_action( 'admin_head', 'wp_testimonials_icon' );
 
function wp_testimonials_icon() {
    ?>
    <style type="text/css" media="screen">
 		#icon-edit.icon32-posts-testimonial {background: url(<?php echo get_template_directory_uri(); ?>/images/icons/post-type-testimonials-32.png) no-repeat;}
 		#adminmenu .wp-menu-image img {opacity:0.8; }
    </style>
<?php }

/* Custom Posts Types for Testimonials  */
add_action('init', 'hermes_testimonials_register');

function hermes_testimonials_register() {
	$labels = array(
		'name' => _x('Testimonials', 'post type general name', 'hermes_textdomain'),
		'singular_name' => _x('Testimonial', 'post type singular name', 'hermes_textdomain'),
		'add_new' => _x('Add a New Testimonial', 'slideshow item', 'hermes_textdomain'),
		'add_new_item' => __('Add New Testimonial','hermes_textdomain'),
		'edit_item' => __('Edit Testimonial','hermes_textdomain'),
		'new_item' => __('New Testimonial','hermes_textdomain'),
		'view_item' => __('View Testimonial','hermes_textdomain'),
		'search_items' => __('Search Testimonials','hermes_textdomain'),
		'not_found' =>  __('Nothing found','hermes_textdomain'),
		'not_found_in_trash' => __('Nothing found in Trash','hermes_textdomain'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => array(
 			'slug' => 'testimonial',
 			'with_front' => false
		 ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon' => get_template_directory_uri() .'/images/icons/post-type-testimonials.png', // 16px16
		'supports' => array('title','editor','thumbnail','excerpt', 'custom-fields')
	  ); 
 
	register_post_type( 'testimonial' , $args );
}

// Styling for the custom post type icon
// add_action( 'admin_head', 'wp_slideshow_icon' );
 
function wp_slideshow_icon() {
    ?>
    <style type="text/css" media="screen">
 		#icon-edit.icon32-posts-slideshow {background: url(<?php echo get_template_directory_uri(); ?>/images/icons/post-type-slideshow-32.png) no-repeat;}
 		#adminmenu .wp-menu-image img {opacity:0.8; }
    </style>
<?php }

/* Custom Posts Types for Slideshow 
add_action('init', 'slideshow_register');

function slideshow_register() {
	$labels = array(
		'name' => _x('Slideshow', 'post type general name'),
		'singular_name' => _x('Slideshow Item', 'post type singular name'),
		'add_new' => _x('Add a New Slide', 'slideshow item'),
		'add_new_item' => __('Add New Slideshow Item','hermes_textdomain'),
		'edit_item' => __('Edit Slideshow Item','hermes_textdomain'),
		'new_item' => __('New Slideshow Item','hermes_textdomain'),
		'view_item' => __('View Slideshow Item','hermes_textdomain'),
		'search_items' => __('Search Slideshow','hermes_textdomain'),
		'not_found' =>  __('Nothing found','hermes_textdomain'),
		'not_found_in_trash' => __('Nothing found in Trash','hermes_textdomain'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon' => get_template_directory_uri() .'/images/icons/post-type-slideshow.png', // 16px16
		'supports' => array('title','editor','thumbnail', 'excerpt', 'custom-fields')
	  ); 
 
	register_post_type( 'slideshow' , $args );
}

*/

?>