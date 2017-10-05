<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 * @return array
 */
function hermes_options_page_sections() {
	
	$sections = array();
	$sections['general_section'] 	= __('General Settings', 'hermes_textdomain');
	$sections['homepage_section'] 	= __('Homepage Settings', 'hermes_textdomain');
	$sections['social_section'] 	= __('Social Media', 'hermes_textdomain');
	$sections['misc_section'] 		= __('Miscellaneous', 'hermes_textdomain');
	// $sections['banners_section']	= __('Banners', 'hermes_textdomain');
	$sections['debug_section'] 		= __('Debug Information', 'hermes_textdomain');
	
	return $sections;	
} 

/**
 * Define our form fields (settings) 
 *
 * @return array
 */
function hermes_options_page_fields() {

    // Load categories and static pages in two separate arrays
	$categories =  get_categories('hide_empty=0'); // load list of categories
    $pages =  get_pages(''); // load list of categories
	$options_categories = array();
	$options_pages = array();
    
    // Create associative arrays with:
    // key = category/page ID
    // value = category/page Name
    
	foreach ($categories as $category) {
    	$options_categories[] = $category->name . "|" .$category->term_id;
	}
	
	foreach ($pages as $page) {
    	$options_pages[] = $page->post_title . "|" .$page->ID; 
	}
	
	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_color_style",
		"title"   => __( 'Color Style', 'hermes_textdomain' ),
		"desc"    => __( 'Select the color style that you would like to use on your website.', 'hermes_textdomain' ),
		"type"    => "select",
		"std"    => "Default",
		"choices" => array( "Default", "Black", "Blue", "Blue2", "Blue3", "Gold", "Gold2", "Green", "Grey", "Minimal", "Pink", "Purple", "Red")
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_footer_sidebars_display",
		"title"   => __( 'Display Footer Widget Columns', 'hermes_textdomain' ),
		"desc"    => __( 'Check if you want to display the 4 footer widget columns (sidebars).', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_page_comments",
		"title"   => __( 'Display Comments for Pages', 'hermes_textdomain' ),
		"desc"    => __( 'Check this box if you want to display comments and submit comment form inside pages.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_post_comments",
		"title"   => __( 'Display Comments for Posts', 'hermes_textdomain' ),
		"desc"    => __( 'Check this box if you want to display comments and submit comment form inside posts.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contacts_display",
		"title"   => __( 'Header Contact Info', 'hermes_textdomain' ),
		"desc"    => __( 'Check if you want to display additional contaction information in the header.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_footer_contacts_display",
		"title"   => __( 'Footer Contact Info', 'hermes_textdomain' ),
		"desc"    => __( 'Check if you want to display additional contaction information in the footer.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_telephone_value",
		"title"   => __( 'Your Telephone', 'hermes_textdomain' ),
		"desc"    => __( 'Set your telephone number.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('1-800-123-4567','hermes_textdomain')
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_address_value",
		"title"   => __( 'Your Address', 'hermes_textdomain' ),
		"desc"    => __( 'Set your full address.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('34, Chestnut Road, London','hermes_textdomain')
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_email_value",
		"title"   => __( 'Your E-mail', 'hermes_textdomain' ),
		"desc"    => __( 'Set your e-mail address.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => "",
		"class"   => "email"
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_map_value",
		"title"   => __( 'URL to Page with Map', 'hermes_textdomain' ),
		"desc"    => __( 'Set the URL (absolute path) to a static page containing your map with directions. <br />This can also be the path to an image file.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => "",
		"class"   => "url"
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_telephone_label",
		"title"   => __( 'Text Before Telephone', 'hermes_textdomain' ),
		"desc"    => __( 'Line #1: what text should appear before the telephone number?', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('Make a reservation by phone:','hermes_textdomain')
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_map_label",
		"title"   => __( 'Map Link Text', 'hermes_textdomain' ),
		"desc"    => __( 'Line #2: what text should appear for map link?', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('View on Map','hermes_textdomain')
	);

	$options[] = array(
		"section" => "general_section",
		"id"      => HERMES_SHORTNAME . "_header_contact_email_label",
		"title"   => __( 'Text Before E-mail', 'hermes_textdomain' ),
		"desc"    => __( 'Line #3: what text should appear before the e-mail address?', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('Make a reservation by e-mail:','hermes_textdomain')
	);

	$options[] = array(
		"section" => "general_section",
		"id"   => 6,
		"title"   => '',
		"desc"    => '',
		"type"    => "divider",
		"std"     => '' // 0 for off
	);


	// Homepage Options 

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_gallery_page",
		"title"   => __( 'Slideshow Page', 'hermes_textdomain' ),
		"desc"    => __( 'Select a static page that contains the images to be used for the homepage slideshow. <br>These images will be shown in the slideshow on the Homepage and Archive Pages.', 'hermes_textdomain' ),
		"type"    => "select2",
		"std"    => "",
		"choices" => $options_pages
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_gallery_page_num",
		"title"   => __( 'Number of Photos to Display', 'hermes_textdomain' ),
		"desc"    => __( 'How many photos to display in the slideshow.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => 5,
		"class"   => "numeric"
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"   => 10,
		"title"   => '',
		"desc"    => '',
		"type"    => "divider",
		"std"     => '' // 0 for off
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_featured_pages_display",
		"title"   => __( 'Display Featured Pages', 'hermes_textdomain' ),
		"desc"    => __( 'Check this box if you want to display 3 Featured Pages on Homepage, at the top of the page.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_featured_page_1",
		"title"   => __( 'Featured Page #1', 'hermes_textdomain' ),
		"desc"    => __( 'Select a static page to appear in the Featured Pages block.', 'hermes_textdomain' ),
		"type"    => "select2",
		"std"    => "",
		"choices" => $options_pages
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_featured_page_2",
		"title"   => __( 'Featured Page #2', 'hermes_textdomain' ),
		"desc"    => __( 'Select a static page to appear in the Featured Pages block.', 'hermes_textdomain' ),
		"type"    => "select2",
		"std"    => "",
		"choices" => $options_pages
	);

	$options[] = array(
		"section" => "homepage_section",
		"id"      => HERMES_SHORTNAME . "_featured_page_3",
		"title"   => __( 'Featured Page #3', 'hermes_textdomain' ),
		"desc"    => __( 'Select a static page to appear in the Featured Pages block.', 'hermes_textdomain' ),
		"type"    => "select2",
		"std"    => "",
		"choices" => $options_pages
	);

	/*
	$options[] = array(
		"section" => "banners_section",
		"id"      => HERMES_SHORTNAME . "_banner_sidebar",
		"title"   => __( 'Sidebar Banner', 'hermes_textdomain' ),
		"desc"    => __( 'Insert your complete HTML code for a sidebar banner.', 'hermes_textdomain' ),
		"type"    => "textarea",
		"std"     => __('','hermes_textdomain')
	);
	*/
	
	$options[] = array(
		"section" => "social_section",
		"id"      => HERMES_SHORTNAME . "_social_sharing_posts",
		"title"   => __( 'Social Sharing: Posts', 'hermes_textdomain' ),
		"desc"    => __( 'Check this box if you want to display social sharing buttons (Facebook, Twitter, etc.) for Posts.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "social_section",
		"id"      => HERMES_SHORTNAME . "_social_sharing_pages",
		"title"   => __( 'Social Sharing: Pages', 'hermes_textdomain' ),
		"desc"    => __( 'Check this box if you want to display social sharing buttons (Facebook, Twitter, etc.) for Pages.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

/*

	$options[] = array(
		"section" => "social_section",
		"id"      => HERMES_SHORTNAME . "_social_facebook",
		"title"   => __( 'Facebook URL', 'hermes_textdomain' ),
		"desc"    => __( 'Provide a full link to your Facebook page.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('http://www.facebook.com/hermesthemes','hermes_textdomain'),
		"class"   => "url"
	);

	$options[] = array(
		"section" => "social_section",
		"id"      => HERMES_SHORTNAME . "_social_twitter",
		"title"   => __( 'Twitter URL', 'hermes_textdomain' ),
		"desc"    => __( 'Provide a full link to your Twitter account.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('http://twitter.com/hermesthemes','hermes_textdomain'),
		"class"   => "url"
	);

	$options[] = array(
		"section" => "social_section",
		"id"      => HERMES_SHORTNAME . "_social_linkedin",
		"title"   => __( 'LinkedIn URL', 'hermes_textdomain' ),
		"desc"    => __( 'Provide a full link to your LinkedIn page.', 'hermes_textdomain' ),
		"type"    => "text",
		"std"     => __('http://www.linkedin.com/hermesthemes','hermes_textdomain'),
		"class"   => "url"
	);

*/

	$options[] = array(
		"section" => "misc_section",
		"id"      => HERMES_SHORTNAME . "_script_header",
		"title"   => __( 'Custom Code Before &lt;/head&gt;', 'hermes_textdomain' ),
		"desc"    => __( 'Here you can add HTML/JS code that will be added right before &lt;/head&gt;. <br />For example here you can add the tracking code provided by Google Analytics.', 'hermes_textdomain' ),
		"type"    => "textarea",
		"std"     => '',
		"class"   => 'allowall'
	);

	$options[] = array(
		"section" => "misc_section",
		"id"      => HERMES_SHORTNAME . "_script_footer",
		"title"   => __( 'Custom Code Before &lt;/body&gt;', 'hermes_textdomain' ),
		"desc"    => __( 'Here you can add HTML/JS code that will be added right before &lt;/body&gt;.', 'hermes_textdomain' ),
		"type"    => "textarea",
		"std"     => '',
		"class"   => 'allowall'
	);

	$options[] = array(
		"section" => "misc_section",
		"id"      => HERMES_SHORTNAME . "_misc_credit",
		"title"   => __( 'Credit HermesThemes in Footer', 'hermes_textdomain' ),
		"desc"    => __( 'Leave this box checked if you want to keep "Designed by HermesThemes" in the footer. Keeping this box checked will make us very happy.', 'hermes_textdomain' ),
		"type"    => "checkbox",
		"std"     => 1 // 0 for off
	);

	$options[] = array(
		"section" => "debug_section",
		"id"      => HERMES_SHORTNAME . "_debug",
		"title"   => __( 'Debugging information', 'hermes_textdomain' ),
		"desc"    => __( '', 'hermes_textdomain' ),
		"type"    => "debug"
	);
	
	return $options;	
}

/**
 * Contextual Help
 */
function hermes_options_page_contextual_help() {
	
	$text 	= "<h3>" . __('Hermes Theme Options - Contextual Help','hermes_textdomain') . "</h3>";
	$text 	.= "<p>" . __('If you are experiencing problems with our theme, please consult our <a href="http://www.hermesthemes.com/support/">Support Section</a>.','hermes_textdomain') . "</p>";
	
	// must return text! NOT echo
	return $text;
} ?>