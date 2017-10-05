<?php

	// load language
	load_theme_textdomain( 'barry', get_template_directory() . '/inc/lang' );

	// Define the version so we can easily replace it throughout the theme
	define( 'barrysblog_VERSION', 1.42 );


	/*  Set the content width based on the theme's design and stylesheet  */
	if ( ! isset( $content_width ) ){
		$content_width = 740; /* pixels */
	}

	/*  Add Rss feed support to Head section  */
	add_theme_support( 'automatic-feed-links' );

	/*  Register main menu for Wordpress use  */
	add_action( 'after_setup_theme', 'barry_register_nav_menu' );
	function barry_register_nav_menu() {
		register_nav_menus( 
			array(
				'primary'	=>	'Primary Menu', // Register the Primary menu
				// Copy and paste the line above right here if you want to make another menu, 
				// just change the 'primary' to another name
			)
		);
	}
		/*  Add support for the multiple Post Formats  */
	add_theme_support( 'post-formats', array('gallery', 'image', 'link', 'quote', 'audio', 'video')); 


	/*  Widgets  */
	include_once('inc/widgets/widgets.php');   // Register widget
	include_once "inc/widgets/bl_tabs.php"; // Tabs: (Recent posts, Recent comments, Tags)
	include_once "inc/widgets/bl_socialbox.php"; // Social network links
	include_once "inc/widgets/bl_tweets.php"; // Display recent tweets
	include_once "inc/widgets/bl_instagram.php"; // Display recent instagram images
	include_once "inc/widgets/bl_newsletter.php"; // Display recent instagram images
	include_once "inc/widgets/bl_likebox.php"; // Display a facebook likebox
	include_once "inc/widgets/bl_flickr.php"; // Display a recent flickr images
	include_once "inc/widgets/bl_html.php"; // Display HTML

	include_once('inc/shortcodes.php'); // Load Shortcodes
	include_once('inc/theme-options.php'); // Load Theme Options Panel
	
	/* Include the TGM_Plugin_Activation class  */
	include_once('inc/class-tgm-plugin-activation.php');
	add_action('tgmpa_register', 'barry_register_required_plugins');

	/* Bootstrap type menu  */
	include_once('inc/bootstrap-walker.php');


	/*  Register required plugins  */
	function barry_register_required_plugins() {
		$plugins = array(
			array(
				'name'     				=> 'CF-Post-Formats', // The plugin name
				'slug'     				=> 'wp-post-formats-master', // The plugin slug (typically the folder name)
				'source'   				=> 'https://github.com/crowdfavorite/wp-post-formats/archive/master.zip', //get_template_directory_uri() . '/inc/plugins/cf-post-formats.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> 'https://github.com/crowdfavorite/wp-post-formats/archive/master.zip', // If set, overrides default API URL and points to an external URL
			),
			// array(
			// 	'name'     				=> 'W3-Total-Cache', // The plugin name
			// 	'slug'     				=> 'w3-total-cache', // The plugin slug (typically the folder name)
			// 	'source'   				=> 'http://downloads.wordpress.org/plugin/w3-total-cache.0.9.2.11.zip', //get_template_directory_uri() . '/inc/plugins/w3-total-cache.0.9.2.11.zip', // The plugin source
			// 	'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			// 	'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			// 	'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			// 	'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			// 	'external_url' 			=> 'http://downloads.wordpress.org/plugin/w3-total-cache.0.9.2.11.zip', // If set, overrides default API URL and points to an external URL
			// ),
		);
	
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> 'barry',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', 'barry' ),
				'menu_title'                       			=> __( 'Install Plugins', 'barry' ),
				'installing'                       			=> __( 'Installing Plugin: %s', 'barry' ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', 'barry' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'barry' ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'barry' ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'barry' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
		tgmpa($plugins, $config);
	}

	/* Enqueue Styles and Scripts  */
	function barrysblog_assets()  { 

		$protocol 			= is_ssl() ? 'https' : 'http';
		$disable_responsive = of_get_option('disable_responsive', false);
		$heading_font 		= of_get_option('heading_font', false);
		$text_font 			= of_get_option('text_font', false);

		// add theme css
		wp_enqueue_style( 'barrysblog-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'barrysblog-style', get_template_directory_uri() . '/style.css' );
		// if disable responsive
		if(!$disable_responsive){
			wp_enqueue_style( 'barrysblog-responsive', get_template_directory_uri() . '/assets/css/style-responsive.css' );
		}
		wp_enqueue_style( 'barrysblog-fontello', get_template_directory_uri() . '/assets/css/fontello.css' );
		wp_enqueue_style( 'barrysblog-nivo', get_template_directory_uri() . '/assets/css/nivo-slider.css' );
		wp_enqueue_style( 'barrysblog-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
		wp_enqueue_style( 'barrysblog-snippet', get_template_directory_uri() . '/assets/css/jquery.snippet.min.css' );

			
		// add theme scripts
		wp_enqueue_script( 'barrysblog-jquery-ui', $protocol.'://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('jquery'), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-snippet', get_template_directory_uri() . '/assets/js/jquery.snippet.min.js', array('jquery'), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-theme', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery'), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-nivo', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.pack.js', array(), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-timeago', get_template_directory_uri() . '/assets/js/jquery.timeago.js', array('jquery'), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), barrysblog_VERSION, true );
		wp_enqueue_script( 'barrysblog-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), barrysblog_VERSION, true );

		// add fonts
		$heading_subset = array();
		$text_subset = '';
		$subset_array = array();

		if(!$heading_font){
			$heading_font = 'Crete+Round:400,400italic';
		}else{
			$selected_heading_font = explode('&subset=', $heading_font);

			$heading_font = $selected_heading_font[0];

			if(count($selected_heading_font) > 1){
				$heading_subset = explode(',', $selected_heading_font[1]);
				array_fill_keys($heading_subset, $heading_subset);
				$subset_array = $heading_subset;
			}
		}


		if(!$text_font){
			$text_font = 'Lato:400,700,400italic';
		}else{
			$selected_text_font = explode('&subset=', $text_font);

			$text_font = $selected_text_font[0];

			if(count($selected_text_font) > 1){
				$text_subset = explode(',', $selected_text_font[1]);
				array_fill_keys($text_subset, $text_subset);
				$subset_array = array_merge($text_subset, $heading_subset);
			}
		}

		array_unique($subset_array);

		wp_enqueue_style( 'barrysblog-googlefonts', $protocol.'://fonts.googleapis.com/css?family='.$text_font.'|'.$heading_font. (!empty($subset_array) ? '&subset='.implode(',', $subset_array) : '')  );	

	    if ( is_singular() && get_option( 'thread_comments' ) )
	        wp_enqueue_script( 'comment-reply' );			
	}
	add_action( 'wp_enqueue_scripts', 'barrysblog_assets' ); // Register this fxn and allow Wordpress to call it automatcally in the header


	/* 
	 * Outputs the selected option panel styles inline into the <head>
	 */
	 
	function options_typography_styles() {

		$output = '';
		$heading_font 		= of_get_option('heading_font', false);
		$text_font 			= of_get_option('text_font', false);

		if($heading_font){
			$selected_font = explode(':', $heading_font);
			$output .= 'h1,h2,h3,h4,h5{font-family: "'.str_replace('+', ' ', $selected_font[0]).'",serif!important;} .widget_calendar table > caption{font-family: "'.str_replace('+', ' ', $selected_font[0]).'",serif!important;} ';
		}

		if($text_font){
			$selected_font = explode(':', $text_font);
			$output .= 'body{font-family: "'.str_replace('+', ' ', $selected_font[0]).'",Helvetica,sans-serif!important;} ';
		}

	     if ( $output != '' ) {
			$output = "\n<style>\n" . $output . "</style>\n";
			echo $output;
	     }
	}
	add_action('wp_head', 'options_typography_styles');




	/*  Attach a class to linked images' parent anchors  */
	function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
	  $classes = 'lightbox'; // separated by spaces, e.g. 'img image-link'

	  // check if there are already classes assigned to the anchor
	  if ( preg_match('/<a.*? class=".*?">/', $html) ) {
	    $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
	  } else {
	    $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
	  }
	  return $html;
	}
	add_filter('image_send_to_editor','give_linked_images_class',10,8);


	/*  Custom Pagination ( thanks to kriesi.at )  */
	function kriesi_pagination($pages = '', $range = 2)
	{  
	     $showitems = ($range * 2)+1;  

	     global $paged;
	     if(empty($paged)) $paged = 1;

	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }   

	     if(1 != $pages)
	     {
	         echo "<div class='pagination'>";
			echo get_previous_posts_link( '<i class="icon-left-open"></i> '.__('Previous Page', 'barry') );
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='box' href='".get_pagenum_link(1)."'>&laquo;</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a class='box' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<span class='current box'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive box' >".$i."</a>";
	             }
	         }

	         if ($paged < $pages && $showitems < $pages) echo "<a class='box' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='box' href='".get_pagenum_link($pages)."'>&raquo;</a>";
			echo get_next_posts_link( __('Next Page', 'barry').' <i class="icon-right-open"></i>' );
	        echo "</div>\n";
	     }
	}

	/*  Add open graph meta tags  */
	function add_open_graph_tags() {
		if (is_single()) { 
		global $post; 
		// $image = get_post_meta($post->ID, 'thumbnail', $single = true); 
		$images = get_children(array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image' ));
		if(!empty($images)){
			$image = current($images);
			$image = wp_get_attachment_image_src($image->ID, 'gallery-large');
			echo '<meta property="og:image" content="'.(is_array($image) ? $image[0] : $image).'" />';
		}
		?>	
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
		<?php }
	}
	add_action('wp_head', 'add_open_graph_tags',99); 


	/*  Post Thumbnails  */
	if ( function_exists( 'add_image_size' ) ) {

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'gallery-large', 870, 400, true );		// Large Blog Image
		add_image_size( 'standard', 700, 300, true );			// Standard Blog Image
		add_image_size( 'small', 194, 150, true ); 				// Related posts image
		add_image_size( 'mini', 60, 60, true ); 				// sidebar widget image
	}


	/**
	 * Template for comments and pingbacks.
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	if ( !function_exists( 'barrysblog_comment' ) ){
		function barrysblog_comment( $comment, $args, $depth ) {
		    $GLOBALS['comment'] = $comment;
		    switch ( $comment->comment_type ) :
		        case 'pingback' :
		        case 'trackback' :
		    ?>
		    <li class="post pingback">
		        <p><?php _e( 'Pingback:', 'barry' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'barry' ), ' ' ); ?></p>
		    <?php
		            break;
		        default :
		    ?>
		    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		        <article id="comment-<?php comment_ID(); ?>" class="comment">
		            <div>
		                <div class="comment-author">
		                    <?php echo get_avatar( $comment, 45 ); ?>
		                    <?php printf( __( '%s', 'barry' ), sprintf( '<cite class="commenter">%s</cite>', get_comment_author_link() ) ); ?>
		                	<small class="muted">&nbsp;&nbsp;•&nbsp;&nbsp;<time class="timeago" datetime="<?php comment_time( 'c' ); ?>"></time></small>
		                	<?php if ($comment->user_id == get_queried_object()->post_author){ ?>
		                	&nbsp;&nbsp;<span class="label label-success"><?php _e('Author', 'barry'); ?></span>
		                	<?php } ?>
		                </div><!-- .comment-author .vcard -->
		                <?php if ( $comment->comment_approved == '0' ) : ?>
		                    <em><?php _e( 'Your comment is awaiting moderation.', 'barry' ); ?></em>
		                    <br />
		                <?php endif; ?>
		            </div>
		 
		            <div class="comment-content"><?php comment_text(); ?></div>
		 
		            <div class="reply">
		                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		                <?php edit_comment_link( __( '(Edit)', 'barry' ), '&nbsp;&nbsp;' ); ?>
		            </div><!-- .reply -->
		        </article><!-- #comment-## -->
		 
		    <?php
		            break;
		    endswitch;
		}
	};

	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'the_content', 'wpautop' , 12);

	// add span tag around categories post count
	function cat_count_span($links) {
		return str_replace(array('</a> (',')'), array('</a> <span class="badge">','</span>'), $links);
	}
	add_filter('wp_list_categories', 'cat_count_span');

	// add span tag around archives post count
	function archive_count_no_brackets($links) {
	  	return str_replace(array('</a>&nbsp;(',')'), array('</a> <span class="badge">','</span>'), $links);
	}
	add_filter('get_archives_link', 'archive_count_no_brackets');

	// Excerpt read more link
	function excerpt_read_more_link($output) {
	 global $post;
	 return $output . '<p><a class="more-link" href="'. get_permalink($post->ID) . '"> '.__('Continue reading...', 'barry').'</a></p>';
	}
	add_filter('the_excerpt', 'excerpt_read_more_link');

	// Excerpt length
	function new_excerpt_length($length) {
		return of_get_option('excerpt_length', '55');
	}
	add_filter('excerpt_length', 'new_excerpt_length');