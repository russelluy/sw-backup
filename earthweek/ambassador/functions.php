<?php			

if ( ! isset( $content_width ) ) $content_width = 940;

/* Disable PHP error reporting for notices, leave only the important ones 
================================== */

error_reporting(E_ERROR | E_PARSE);

/* Add javascripts and CSS used by the theme 
================================== */

function hermes_js_scripts() {

	if (! is_admin()) {

		wp_enqueue_script(
			'init',
			get_template_directory_uri() . '/js/init.js',
			array('jquery'),
			null
		);
		wp_enqueue_script(
			'flexslider',
			get_template_directory_uri() . '/js/jquery.flexslider-min.js',
			array('jquery'),
			null
		);

		wp_enqueue_script('thickbox', null,  array('jquery'), null);
		wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, null);
	}

}
add_action('wp_enqueue_scripts', 'hermes_js_scripts');

/*for graph software*/

/*for graph software*/

/* Register Thumbnails Size 
================================== */

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'thumb-hermes-slideshow', 1400, 400, true );
	add_image_size( 'thumb-attraction', 290, 180, true );
	add_image_size( 'thumb-featured-page', 250, 155, true );
	add_image_size( 'thumb-loop-main', 130, 80, true );
	add_image_size( 'thumb-recent-posts', 60, 40, true );
}

/* 	Register Custom Menu 
==================================== */

register_nav_menu('primary', 'Main Menu');
register_nav_menu('secondary', 'Secondary Menu');

/* Add support for Localization
==================================== */

load_theme_textdomain( 'hermes_textdomain', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);

/* Add support for Custom Background 
==================================== */

add_theme_support( 'custom-background' );

/* Add support for post and comment RSS feed links in <head>
==================================== */

add_theme_support( 'automatic-feed-links' ); 

/* Enable Excerpts for Static Pages
==================================== */

add_action( 'init', 'hermes_excerpts_for_pages' );

function hermes_excerpts_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}

/* Custom Excerpt Length
==================================== */

function new_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* Replace invalid ellipsis from excerpts
==================================== */

function hermes_excerpt($text)
{
   return str_replace(' [...]', '...', $text); // if there is a space before ellipsis
   return str_replace('[...]', '...', $text);
}
add_filter('the_excerpt', 'hermes_excerpt');

/* Reset [gallery] shortcode styles						
==================================== */

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

/* Comments Custom Template						
==================================== */

function hermes_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
				
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 50 ); ?>

						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div><!-- .reply -->

					</div><!-- .comment-author .vcard -->
	
					<div class="comment-body">
	
						<?php printf( __( '%s', 'hermes_textdomain' ), sprintf( '<cite class="comment-author-name">%s</cite>', get_comment_author_link() ) ); ?>
						<span class="comment-bullet">&#8226;</span>
						<span class="comment-timestamp"><?php printf( __('%s at %s', 'hermes_textdomain'), get_comment_date(), get_comment_time()); ?></span><?php edit_comment_link( __( 'Edit', 'hermes_textdomain' ), ' <span class="comment-bullet">&#8226;</span> ' ); ?>
	
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'hermes_textdomain' ); ?></p>
						<?php endif; ?>
	
						<?php comment_text(); ?>

					</div><!-- .comment-body -->
	
					<div class="cleaner">&nbsp;</div>
				
				</div><!-- #comment-<?php comment_ID(); ?> -->
		
			</li><!-- #li-comment-<?php comment_ID(); ?> -->
		
			<?php
		break;

		case 'pingback'  :
		case 'trackback' :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'hermes_textdomain' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'hermes_textdomain' ), ' ' ); ?></p>
			</li>
			<?php
		break;
	
	endswitch;
}

/* Include WordPress Theme Customizer
================================== */

require_once('hermes-admin/hermes-customizer.php');

/* Include Additional Options and Components
================================== */

require_once('hermes-admin/components/get-the-image.php');
require_once('hermes-admin/components/wpml.php'); // enables support for WPML plug-in
require_once('hermes-admin/custom-post-types.php'); // important to load this before post-options.php
require_once('hermes-admin/post-options.php');
require_once('hermes-admin/sidebars.php');
require_once('hermes-admin/widgets/child-pages.php');
require_once('hermes-admin/widgets/connections.php');
require_once('hermes-admin/widgets/facebook-like-box.php');
require_once('hermes-admin/widgets/gallery.php');
require_once('hermes-admin/widgets/recent-comments.php');
require_once('hermes-admin/widgets/recent-posts.php');
require_once('hermes-admin/widgets/testimonials.php');
require_once('hermes-admin/widgets/twitter.php');


/* Include Theme Options Page for Admin
================================== */

//require only in admin!
if(is_admin()){	
	require_once('hermes-admin/hermes-theme-settings.php');
}

/**
 * Collects our theme options
 *
 * @return array
 */
function hermes_get_global_options(){
	
	$hermes_option = array();

	// collect option names as declared in hermes_get_settings()
	$hermes_option_name = 'hermes_options';

	// loop for get_option
	if (get_option($hermes_option_name)!= FALSE) {
		$option = get_option($hermes_option_name);
		
		// now merge in main $hermes_option array!
		$hermes_option = array_merge($hermes_option, $option);
	}

	
return $hermes_option;
}

/**
 * Call the function and collect in variable
 *
 * Should be used in template files like this:
 * echo $hermes_option['hermes_txt_input'];
 *
 * Note: Should you notice that the variable ($hermes_option) is empty when used in certain templates such as header.php, sidebar.php and footer.php
 * you will need to call the function (copy the line below and paste it) at the top of those documents (within php tags)!
 */ 
$hermes_option = hermes_get_global_options();
?>
