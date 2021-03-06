<?php

/* Load the core theme framework. */

function sw_function() {
    wp_enqueue_script( 'jquery' );

//Nivo Slider
wp_enqueue_script( 'nivoslider', '/wp-content/themes/NorcalTheme/js/jquery.nivo.slider.pack.js', array('jquery'));
wp_enqueue_script( 'nivostart', '/wp-content/themes/NorcalTheme/js/nivostart.js', array('jquery'));

}    
 add_action('init', 'sw_function');



require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'NorcalTheme_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 */
function NorcalTheme_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-menus', array( 'primary', 'secondary', 'subsidiary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'secondary', 'subsidiary', 'Slideshow', 'after-singular', 'header' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-meta-box-footer' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-drop-downs' );
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Add theme support for framework extensions. */
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'cleaner-gallery' );
	add_theme_support( 'breadcrumb-trail' );

	/* Add theme support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );

	/* Embed width/height defaults. */
	add_filter( 'embed_defaults', 'NorcalTheme_embed_defaults' );

	/* Filter the sidebar widgets. */
	add_filter( 'sidebars_widgets', 'NorcalTheme_disable_sidebars' );
        
	/* Image sizes */
	add_action( 'init', 'NorcalTheme_image_sizes' );

	/* Excerpt ending */
	add_filter( 'excerpt_more', 'NorcalTheme_excerpt_more' );
 
	/* Custom excerpt length */
	add_filter( 'excerpt_length', 'NorcalTheme_excerpt_length' );    
        
	/* Filter the pagination trail arguments. */
	add_filter( 'loop_pagination_args', 'NorcalTheme_pagination_args' );
        
	/* Remove links from entry titles (shortcodes) for singular */
	add_filter( "{$prefix}_entry_title", 'NorcalTheme_entry_title_shortcode' );
	
	/* Filter the comments arguments */
	add_filter( "{$prefix}_list_comments_args", 'NorcalTheme_comments_args' );	
	
	/* Filter the commentform arguments */
	add_filter( 'comment_form_defaults', 'NorcalTheme_commentform_args', 11, 1 );
	
	/* Enqueue scripts (and related stylesheets) */
	add_action( 'wp_enqueue_scripts', 'NorcalTheme_scripts' );
	
	/* Enqueue Google fonts */
	add_action( 'wp_enqueue_scripts', 'NorcalTheme_google_fonts' );
	
	/* Style settings */
	add_action( 'wp_head', 'NorcalTheme_style_settings' );	
	
	/* Add the breadcrumb trail just after the container is open. */
	add_action( "{$prefix}_open_content", 'breadcrumb_trail' );
	
	/* Breadcrumb trail arguments. */
	add_filter( 'breadcrumb_trail_args', 'NorcalTheme_breadcrumb_trail_args' );
	
	/* Add support for custom backgrounds */
	add_custom_background();
	
	/* Add theme settings */
	if ( is_admin() )
	    require_once( trailingslashit( TEMPLATEPATH ) . 'admin/functions-admin.php' );
	    
	/* Default footer settings */
	add_filter( "{$prefix}_default_theme_settings", 'NorcalTheme_default_footer_settings' );
	
	/* Metaboxes */
	add_action( 'add_meta_boxes', 'NorcalTheme_create_metabox' );
	add_action( 'save_post', 'NorcalTheme_save_meta', 1, 2 );
	
	/* Slider settings */
	add_action( 'wp_footer', 'NorcalTheme_slider_settings' );
	
}

/**
 * Disables sidebars if viewing a one-column page.
 *
 */
function NorcalTheme_disable_sidebars( $sidebars_widgets ) {
	
	global $wp_query;
	
	    if ( is_page_template( 'page-template-fullwidth.php' ) ) {
		    $sidebars_widgets['primary'] = false;
			$sidebars_widgets['secondary'] = false;
	    }

	return $sidebars_widgets;
}

/**
 * Overwrites the default widths for embeds.  This is especially useful for making sure videos properly
 * expand the full width on video pages.  This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 */
function NorcalTheme_embed_defaults( $args ) {
	
	$args['width'] = 470;
		
	if ( is_page_template( 'page-template-fullwidth.php' ) )
		$args['width'] = 940;

	return $args;
}

/**
 * Excerpt ending 
 *
 */
function NorcalTheme_excerpt_more( $more ) {	
	return '...';
}

/**
 *  Custom excerpt lengths 
 *
 */
function NorcalTheme_excerpt_length( $length ) {
	return 25;
}

/**
 * Enqueue scripts (and related stylesheets)
 *
 */
function NorcalTheme_scripts() {
	
	if ( !is_admin() ) {
		
		/* Enqueue Scripts */	
		wp_enqueue_script( 'NorcalTheme_imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.js', array( 'jquery' ), '1.0', true );	
		wp_enqueue_script( 'NorcalTheme_masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ), '1.0', true );	
		wp_enqueue_script( 'NorcalTheme_cycle', get_template_directory_uri() . '/js/cycle/jquery.cycle.min.js', array( 'jquery' ), '1.0', true );		
		wp_enqueue_script( 'NorcalTheme_fitvids', get_template_directory_uri() . '/js/fitvids/jquery.fitvids.js', array( 'jquery' ), '1.0', true );	
		wp_enqueue_script( 'NorcalTheme_footer_scripts', get_template_directory_uri() . '/js/footer-scripts.js', array( 'jquery', 'NorcalTheme_imagesloaded', 'NorcalTheme_masonry', 'NorcalTheme_cycle', 'NorcalTheme_fancybox', 'NorcalTheme_fitvids' ), '1.0', true );
		
		/* Enqueue Fancybox if enabled. */	
		if ( hybrid_get_setting( 'NorcalTheme_fancybox_enable' ) ) {
			wp_enqueue_script( 'NorcalTheme_fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_style( 'fancybox-stylesheet', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css', false, 1.0, 'screen' );
			wp_enqueue_script( 'NorcalTheme_footer_scripts', get_template_directory_uri() . '/js/footer-scripts.js', array( 'jquery', 'NorcalTheme_imagesloaded', 'NorcalTheme_masonry', 'NorcalTheme_cycle', 'NorcalTheme_fancybox', 'NorcalTheme_fitvids' ), '1.0', true );
		} else {
			wp_enqueue_script( 'NorcalTheme_footer_scripts_light', get_template_directory_uri() . '/js/footer-scripts-light.js', array( 'jquery', 'NorcalTheme_imagesloaded', 'NorcalTheme_masonry', 'NorcalTheme_cycle', 'NorcalTheme_fitvids' ), '1.0', true );
		}
				
	}
}

/**
 * Pagination args 
 *
 */
function NorcalTheme_pagination_args( $args ) {
	
	$args['prev_text'] = __( '&larr; Previous', 'NorcalTheme' );
	$args['next_text'] = __( 'Next &rarr;', 'NorcalTheme' );

	return $args;
}


/**
 * Remove links from entry titles (shortcodes) 
 *
 */
function NorcalTheme_entry_title_shortcode( $title ) {
	
	global $post;

	if ( is_front_page() && !is_home() ) {   
		$title = the_title( '<h2 class="' . esc_attr( $post->post_type ) . '-title entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>', false );	
	} elseif ( is_singular() ) {
		$title = the_title( '<h1 class="' . esc_attr( $post->post_type ) . '-title entry-title">', '</h1>', false );
	} elseif ( 'link_category' == get_query_var( 'taxonomy' ) ) {
		$title = false;	
	} else {
		$title = the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>', false );
	}
	
	/* If there's no post title, return a clickable '(Untitled)'. */
	if ( empty( $title ) && !is_singular() && 'link_category' !== get_query_var( 'taxonomy' ) )
		$title = '<h2 class="entry-title no-entry-title"><a href="' . get_permalink() . '" rel="bookmark">' . __( '(Untitled)', 'origin' ) . '</a></h2>';		
	
	return $title;
}

/**
 *  Image sizes
 *
 */
function NorcalTheme_image_sizes() {
	
	add_image_size( 'archive-thumbnail', 470, 140, true );
	add_image_size( 'single-thumbnail', 470, 260, true );
	add_image_size( 'featured-thumbnail', 750, 380, true );
	add_image_size( 'slider-nav-thumbnail', 110, 70, true );
}

/**
 *  Unregister Hybrid widgets
 *
 */
function NorcalTheme_unregister_widgets() {
	
	unregister_widget( 'Hybrid_Widget_Search' );
	register_widget( 'WP_Widget_Search' );	
}

/**
 * Custom comments arguments
 * 
 */
function NorcalTheme_comments_args( $args ) {
	
	$args['avatar_size'] = 40;
	return $args;
}

/**
 *  Custom comment form arguments
 * 
 */
function NorcalTheme_commentform_args( $args ) {
	
	global $user_identity;

	/* Get the current commenter. */
	$commenter = wp_get_current_commenter();

	/* Create the required <span> and <input> element class. */
	$req = ( ( get_option( 'require_name_email' ) ) ? ' <span class="required">' . __( '*', 'NorcalTheme' ) . '</span> ' : '' );
	$input_class = ( ( get_option( 'require_name_email' ) ) ? ' req' : '' );
	
	
	$fields = array(
		'author' => '<p class="form-author' . $input_class . '"><input type="text" class="text-input" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" /><label for="author">' . __( 'Name', 'NorcalTheme' ) . $req . '</label></p>',
		'email' => '<p class="form-email' . $input_class . '"><input type="text" class="text-input" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" /><label for="email">' . __( 'Email', 'NorcalTheme' ) . $req . '</label></p>',
		'url' => '<p class="form-url"><input type="text" class="text-input" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="40" /><label for="url">' . __( 'Website', 'NorcalTheme' ) . '</label></p>'
	);
	
	$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<p class="form-textarea req"><!--<label for="comment">' . __( 'Comment', 'NorcalTheme' ) . '</label>--><textarea name="comment" id="comment" cols="60" rows="10"></textarea></p>',
		'must_log_in' => '<p class="alert">' . sprintf( __( 'You must be <a href="%1$s" title="Log in">logged in</a> to post a comment.', 'NorcalTheme' ), wp_login_url( get_permalink() ) ) . '</p><!-- .alert -->',
		'logged_in_as' => '<p class="log-in-out">' . sprintf( __( 'Logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'NorcalTheme' ), admin_url( 'profile.php' ), esc_attr( $user_identity ) ) . ' <a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_attr__( 'Log out of this account', 'NorcalTheme' ) . '">' . __( 'Log out &rarr;', 'NorcalTheme' ) . '</a></p><!-- .log-in-out -->',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'commentform',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply', 'NorcalTheme' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'NorcalTheme' ),
		'cancel_reply_link' => __( 'Click here to cancel reply.', 'NorcalTheme' ),
		'label_submit' => __( 'Post Comment &rarr;', 'NorcalTheme' ),
	);
	
	return $args;
}

/**
 * Breadcrumb trail arguments.
 *
 */
function NorcalTheme_breadcrumb_trail_args( $args ) {

	$args['before'] = '';
	$args['separator'] = '&nbsp; / &nbsp;';
	$args['front_page'] = false;
	
	return $args;
}

/**
 * Default footer settings
 *
 */
function NorcalTheme_default_footer_settings( $settings ) {
    
    $settings['footer_insert'] = '<p class="copyright">' . '</p>';
    
    return $settings;
}

/**
 * Metaboxes
 *
 */
function NorcalTheme_create_metabox() {
    add_meta_box( 'NorcalTheme_metabox', __( 'Location', 'NorcalTheme' ), 'NorcalTheme_metabox', 'post', 'side', 'low' );            
}
             
function NorcalTheme_metabox() {
	
	global $post;
	
	/* Retrieve metadata values if they already exist. */
	$NorcalTheme_post_location = get_post_meta( $post->ID, '_NorcalTheme_post_location', true ); ?>	
	
	<p><label><input type="radio" name="NorcalTheme_post_location" value="featured" <?php echo esc_attr( $NorcalTheme_post_location ) == 'featured' ? 'checked="checked"' : '' ?> /> <?php echo __( 'Featured', 'NorcalTheme' ) ?></label></p>
	<p><label><input type="radio" name="NorcalTheme_post_location" value="primary" <?php echo esc_attr( $NorcalTheme_post_location ) == 'primary' ? 'checked="checked"' : '' ?> /> <?php echo __( 'Primary', 'NorcalTheme' ) ?></label></p>
	<p><label><input type="radio" name="NorcalTheme_post_location" value="secondary" <?php echo esc_attr( $NorcalTheme_post_location ) == 'secondary' ? 'checked="checked"' : '' ?> /> <?php echo __( 'Secondary', 'NorcalTheme' ) ?></label></p>
	<p><label><input type="radio" name="NorcalTheme_post_location" value="no-display" <?php echo esc_attr( $NorcalTheme_post_location ) == 'no-display' ? 'checked="checked"' : '' ?> /> <?php echo __( 'Do not display', 'NorcalTheme' ) ?></label></p>	
		
	<span class="description"><?php _e( 'Post location on the home page', 'NorcalTheme' ); ?>
	<?php           
}

/* Save post metadata. */
function NorcalTheme_save_meta( $post_id, $post ) {
	if ( isset( $_POST['NorcalTheme_post_location'] ) ) {
		update_post_meta( $post_id, '_NorcalTheme_post_location', strip_tags( $_POST['NorcalTheme_post_location'] ) );
	}
}

/**
 * Google fonts
 *
 */
function NorcalTheme_google_fonts() {
	
	if ( hybrid_get_setting( 'NorcalTheme_font_family' ) ) {
		
		switch ( hybrid_get_setting( 'NorcalTheme_font_family' ) ) {
			case 'Abel':
				wp_enqueue_style( 'font-abel', 'http://fonts.googleapis.com/css?family=Abel', false, 1.0, 'screen' );
				break;
			case 'Oswald':
				wp_enqueue_style( 'font-oswald', 'http://fonts.googleapis.com/css?family=Oswald', false, 1.0, 'screen' );
				break;
			case 'Terminal Dosis':
				wp_enqueue_style( 'font-terminal-dosis', 'http://fonts.googleapis.com/css?family=Terminal+Dosis', false, 1.0, 'screen' );
				break;
			case 'Droid Serif':
				wp_enqueue_style( 'font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', false, 1.0, 'screen' );
				break;			
			case 'Istok Web':
				wp_enqueue_style( 'font-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web', false, 1.0, 'screen' );
				break;
			case 'Droid Sans':
				wp_enqueue_style( 'font-droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans', false, 1.0, 'screen' );
				break;				
			case 'Bitter':
				wp_enqueue_style( 'font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen' );
				break;
		}
	} else {
		wp_enqueue_style( 'font-abel', 'http://fonts.googleapis.com/css?family=Abel', false, 1.0, 'screen' );
	}	
}

/**
 * Style settings
 *
 */
function NorcalTheme_style_settings() {
	
	echo "\n<!-- Style settings -->\n";
	echo "<style type=\"text/css\" media=\"all\">\n";
	
	if ( hybrid_get_setting( 'NorcalTheme_font_size' ) )
		echo 'html { font-size: ' . hybrid_get_setting( 'NorcalTheme_font_size' ) . "px; }\n";
	
	if ( hybrid_get_setting( 'NorcalTheme_font_family' ) )
		echo 'h1, h2, h3, h4, h5, h6, dl dt, blockquote, blockquote blockquote blockquote, #site-title, #menu-primary li a { font-family: ' . hybrid_get_setting( 'NorcalTheme_font_family' ) . ", sans-serif; }\n";
	
	if ( hybrid_get_setting( 'NorcalTheme_link_color' ) ) {
		echo 'a, a:visited, .page-template-front .hfeed-more .hentry .entry-title a:hover, .entry-title a, .entry-title a:visited { color: ' . hybrid_get_setting( 'NorcalTheme_link_color' ) . "; }\n";
		echo 'a:hover, .comment-meta a, .comment-meta a:visited, .page-template-front .hentry .entry-title a:hover, .archive .hentry .entry-title a:hover, .search .hentry .entry-title a:hover { border-color: ' . hybrid_get_setting( 'NorcalTheme_link_color' ) . "; }\n";
		echo '.read-more, .read-more:visited, .pagination a:hover, .comment-navigation a:hover, #respond #submit, .button, a.button, #subscribe #subbutton, .wpcf7-submit, #loginform .button-primary { background-color: ' . hybrid_get_setting( 'NorcalTheme_link_color' ) . "; }\n";		
		echo "a:hover, a:focus { color: #000; }\n";
		echo ".read-more:hover, #respond #submit:hover, .button:hover, a.button:hover, #subscribe #subbutton:hover, .wpcf7-submit:hover, #loginform .button-primary:hover { background-color: #111; }\n";		
	}	
	if ( hybrid_get_setting( 'NorcalTheme_custom_css' ) )
		echo hybrid_get_setting( 'NorcalTheme_custom_css' ) . "\n";
	
	echo "</style>\n";

}

/**
 * Slider settings
 *
 */
function NorcalTheme_slider_settings() {
	
	$timeout = hybrid_get_setting( 'NorcalTheme_slider_timeout' ) ? hybrid_get_setting( 'NorcalTheme_slider_timeout' ) : '6000';
	$settings = array( 'timeout' => $timeout );
	wp_localize_script( 'NorcalTheme_footer_scripts', 'slider_settings', $settings );
	wp_localize_script( 'NorcalTheme_footer_scripts_light', 'slider_settings', $settings );
}

?>