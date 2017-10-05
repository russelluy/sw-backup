<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {


	$background_mode = array(
		'image' => __('Image', 'options_framework_theme'),
		'pattern' => __('Pattern', 'options_framework_theme'),
		'color' => __('Solid Color', 'options_framework_theme')
	);


	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/assets/img/';

	$options = array();


	$options[] = array(
		'name' => __('Theme Options', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Background', 'options_framework_theme'),
		'desc' => __('What kind of background do you want?', 'options_framework_theme'),
		'id' => 'background_mode',
		'std' => 'image',
		'type' => 'radio',
		'options' => $background_mode);

	$options[] = array(
		'name' => __('Background Image', 'options_framework_theme'),
		'desc' => __('Upload your background image here.', 'options_framework_theme'),
		'id' => 'background_image',
		'std' => get_template_directory_uri() . '/assets/img/bg.jpg',
		'class' => 'background_image',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Show stripe overlay', 'options_framework_theme'),
		'desc' => __('Uncheck this to remove the stripe overlay that covers the background image', 'options_framework_theme'),
		'id' => 'show_stripe',
		'std' => '1',
		'class' => 'background_image',
		'type' => 'checkbox');

	$options[] = array(
		'name' => "Select a background pattern",
		'desc' => "Select a background pattern from the list or upload your own below.",
		'id' => "background_pattern",
		'std' => "brick_wall.jpg",
		'type' => "images",
		'class' => "hide background_pattern",
		'options' => array(
			'az_subtle.png' => $imagepath . '/pattern/sample/az_subtle_50.png',
			'cloth_alike.png' => $imagepath . '/pattern/sample/cloth_alike_50.png',
			'cream_pixels.png' => $imagepath . '/pattern/sample/cream_pixels_50.png',
			'gray_jean.png' => $imagepath . '/pattern/sample/gray_jean_50.png',
			'grid.png' => $imagepath . '/pattern/sample/grid_50.png',
			'light_noise_diagonal.png' => $imagepath . '/pattern/sample/light_noise_diagonal_50.png',
			'light_paper.png' => $imagepath . '/pattern/sample/light_paper_50.png',
			'noise_lines.png' => $imagepath . '/pattern/sample/noise_lines_50.png',
			'pw_pattern.png' => $imagepath . '/pattern/sample/pw_pattern_50.png',
			'shattered.png' => $imagepath . '/pattern/sample/shattered_50.png',
			'squairy_light.png' => $imagepath . '/pattern/sample/squairy_light_50.png',
			'striped_lens.png' => $imagepath . '/pattern/sample/striped_lens_50.png',
			'textured_paper.png' => $imagepath .'/pattern/sample/textured_paper_50.png')
	);

	$options[] = array(
		'name' => __('Upload Pattern', 'options_framework_theme'),
		'desc' => __('Upload a new pattern here. If this feature is used it will overwrite the selection above.', 'options_framework_theme'),
		'id' => 'background_pattern_custom',
		'class' => 'background_pattern',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Background Color', 'options_framework_theme'),
		'desc' => __('Select the background color', 'options_framework_theme'),
		'id' => 'background_color',
		'std' => '#E9F0F4',
		'class' => "hide background_color",
		'type' => 'color' );

	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('Upload your logo here. Remove the image to show the name of the website in text instead.', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Facebook App Id', 'options_framework_theme'),
		'desc' => __('Insert you Facebook app id here. If you don\'t have one for your webpage you can create it <a target="_blank" href="https://developers.facebook.com/apps">here</a>', 'options_framework_theme'),
		'id' => 'facebook_app_id',
		'type' => 'text');

	$options[] = array(
		'name' => __('Enable Facebook comments for posts'),
		'desc' => __('Check this to use Facebook comments instead of regular wordpress comments for posts. Requires a Facebook app id in the field above.', 'options_framework_theme'),
		'id' => 'facebook_comments',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable posts excerpt (post summary)', 'options_framework_theme'),
		'desc' => __('Check this to only show the post excerpt or the summary of a post in the browse page. The default behavior is to show the whole post but you can provide a cut-off point by adding the <a href="http://codex.wordpress.org/Customizing_the_Read_More" target="_blank">More</a> tag.', 'options_framework_theme'),
		'id' => 'enable_excerpt',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Exerpt Length', 'options_framework_theme'),
		'desc' => __('How many words would you like to show in the post summary. Default: 55 words', 'options_framework_theme'),
		'id' => 'excerpt_length',
		'std' => '55',
		'class' => 'hide',
		'type' => 'text');

	$options[] = array(
		'name' => __('Show search in header', 'options_framework_theme'),
		'desc' => __('Uncheck this to remove the search input from the header', 'options_framework_theme'),
		'id' => 'show_search_header',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Disable Sticky Header', 'options_framework_theme'),
		'desc' => __('Check this to disable the sticky header feature. (The header won\'t stay fixed at the top of the window when you scroll down)', 'options_framework_theme'),
		'id' => 'disable_fixed_header',
		'std' => '0',
		'type' => 'checkbox');


	$options[] = array(
		'name' => __('Disable Related Posts', 'options_framework_theme'),
		'desc' => __('Related articles are show below each post when you view it. Check this to disable that feature.', 'options_framework_theme'),
		'id' => 'disable_related_posts',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Disable Responsive CSS', 'options_framework_theme'),
		'desc' => __('Check this to disable responsive css. Responsive css enable the webpage to adapt to every screen size allowing mobile users to browse the website more easily.', 'options_framework_theme'),
		'id' => 'disable_responsive',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Disable the meta footer for posts', 'options_framework_theme'),
		'desc' => __('Check this to remove the footer with the author image and share buttons from all posts', 'options_framework_theme'),
		'id' => 'disable_footer_post',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Disable the meta footer for pages', 'options_framework_theme'),
		'desc' => __('Check this to remove the footer with the author image and share buttons from all pages', 'options_framework_theme'),
		'id' => 'disable_footer_page',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Disable share buttons in the post footer', 'options_framework_theme'),
		'desc' => __('Check this to remove "Share story" and all the share buttons in the posts footer.', 'options_framework_theme'),
		'id' => 'disable_share_story',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => "Layout",
		'desc' => "Select the layout you want, left sidebar, right sidebar or no sidebar. Default: Right sidebar",
		'id' => "side_bar",
		'std' => "right_side",
		'type' => "images",
		'options' => array(
			'single' => $imagepath . '1col.png',
			'left_side' => $imagepath . '2cl.png',
			'right_side' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' => __('Footer text', 'options_framework_theme'),
		'desc' => __('{year} will be replaced with the current year', 'options_framework_theme'),
		'id' => 'footer_text',
		'std' => 'Copyright &copy; {year} · Theme design by the swblog Company · www.swblog.is',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Analytics', 'options_framework_theme'),
		'desc' => __('Add your Google Analytics tracking code here. Google Analytics is a free web analytics service more info here: <a href="http://www.google.com/analytics/">Google Analytics</a>', 'options_framework_theme'),
		'id' => 'google_analytics',
		'std' => '',
		'type' => 'textarea');



	$options[] = array(
		'name' => __('Colors & Fonts', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Heading font', 'options_framework_theme'),
		'desc' => __('Select a font type for all heading', 'options_framework_theme'),
		'id' => 'heading_font',
		'std' => 'Crete+Round:400,400italic',
		'type' => 'text');

	$options[] = array(
		'name' => __('Main font', 'options_framework_theme'),
		'desc' => __('Select a font type for normal text', 'options_framework_theme'),
		'id' => 'text_font',
		'std' => 'Lato:400,700,400italic',
		'type' => 'text');

	$options[] = array(
		'name' => __('Top Header Color', 'options_framework_theme'),
		'desc' => __('Select the color for the top header that includes the menu and logo', 'options_framework_theme'),
		'id' => 'header_color',
		'std' => '#2E3641',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Post Header Color', 'options_framework_theme'),
		'desc' => __('Select the color for the top header of each post', 'options_framework_theme'),
		'id' => 'post_header_color',
		'std' => '#2E3641',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Widget Header Color', 'options_framework_theme'),
		'desc' => __('Select the default color for the top header of each widget', 'options_framework_theme'),
		'id' => 'widget_header_color',
		'std' => '#2E3641',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Footer Color', 'options_framework_theme'),
		'desc' => __('Select the default color for the footer', 'options_framework_theme'),
		'id' => 'footer_color',
		'std' => '#2E3641',
		'type' => 'color' );



	$options[] = array(
		'name' => __('Advertising', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Ad spot #1 - Above the header.', 'options_framework_theme'),
		'desc' => __('Select what kind of ad you want added above the top menu. <a target="_blank" href="http://www.swblog.is/wordpress/swblog/wp-content/uploads/2013/07/ad_above_example.png">See Example</a>', 'options_framework_theme'),
		'id' => 'ad_header_mode',
		'std' => 'none',
		'type' => 'radio',
		'options' => array(
			'none' => __('None', 'options_framework_theme'),
			'html' => __('HTML code like Adsense', 'options_framework_theme'),
			'image' => __('Image with a link', 'options_framework_theme')
		));

	$options[] = array(
		'name' => __('Add HTML code here', 'options_framework_theme'),
		'desc' => __('Insert advertising code from any provide or use any html that you want. To add Adsense just paste the embed code here that they provide and save.', 'options_framework_theme'),
		'id' => 'ad_header_code',
		'class' => 'hide ad_header_code',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Upload Image', 'options_framework_theme'),
		'desc' => __('Upload an image to add above the header menu and add a link for it in the input box below', 'options_framework_theme'),
		'id' => 'ad_header_image',
		'class' => 'hide ad_header_image',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Image link', 'options_framework_theme'),
		'desc' => __('Add a link to the image that will go above the header', 'options_framework_theme'),
		'id' => 'ad_header_image_link',
		'class' => 'hide ad_header_image',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => __('Ad spot #2 - Between posts', 'options_framework_theme'),
		'desc' => __('Here you can add advertising between posts. <a target="_blank" href="#">See Example</a>', 'options_framework_theme'),
		'id' => 'ad_posts_mode',
		'std' => 'none',
		'type' => 'radio',
		'options' => array(
			'none' => __('None', 'options_framework_theme'),
			'html' => __('HTML code like Adsense', 'options_framework_theme'),
			'image' => __('Image with a link', 'options_framework_theme')
		));

	$options[] = array(
		'name' => __('Add HTML code here', 'options_framework_theme'),
		'desc' => __('Insert advertising code from any provide or use any html that you want. To add Adsense just paste the embed code here that they provide and save.', 'options_framework_theme'),
		'id' => 'ad_posts_code',
		'class' => 'hide ad_posts_code',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Upload Image', 'options_framework_theme'),
		'desc' => __('Upload an image to add between posts and add a link for it in the input box below', 'options_framework_theme'),
		'id' => 'ad_posts_image',
		'class' => 'hide ad_posts_image',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Image link', 'options_framework_theme'),
		'desc' => __('Add a link to the image that will go above the header', 'options_framework_theme'),
		'id' => 'ad_posts_image_link',
		'class' => 'hide ad_posts_image',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Display Frequency', 'options_framework_theme'),
		'desc' => __('How often do you want the ad to appear?', 'options_framework_theme'),
		'id' => 'ad_posts_frequency',
		'std' => 'one',
		'type' => 'select',
		'class' => 'mini hide ad_posts_options', //mini, tiny, small
		'options' => array(
			'1' => __('Between every post', 'options_framework_theme'),
			'2' => __('Every 2th posts', 'options_framework_theme'),
			'3' => __('Every 3th post', 'options_framework_theme'),
			'4' => __('Every 4th post', 'options_framework_theme'),
			'5' => __('Every 5th post', 'options_framework_theme')
		));

	$options[] = array(
		'name' => __('Add white background', 'options_framework_theme'),
		'desc' => __('Check this to wrap the ad content in a white box', 'options_framework_theme'),
		'id' => 'ad_posts_box',
		'std' => '1',
		'class' => 'hide ad_posts_options',
		'type' => 'checkbox');

	return $options;
}