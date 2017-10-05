<?php			

/**
 * Adds the Customize page to the WordPress admin area
 */
function hermes_customizer_menu() {
	add_theme_page( __('Customize','hermes_textdomain'), __('Customize','hermes_textdomain'), 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'hermes_customizer_menu' );

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

function hermes_customizer( $wp_customize ) {

	// Define array of web safe fonts
	$hermes_fonts = array(
		'default' => 'Default',
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'Georgia, serif' => 'Georgia, serif',
		'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
		'"Palatino Linotype", "Book Antiqua", Palatino, serif' => 'Palatino Linotype, Book Antique, Palatino, serif',
		'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
	);

	$wp_customize->add_section(
		'hermes_section_general',
		array(
			'title' => 'General Settings',
			'description' => 'This controls various general theme settings.',
			'priority' => 5,
		)
	);

	$wp_customize->add_section(
		'hermes_section_fonts',
		array(
			'title' => 'Fonts & Color Settings',
			'description' => 'Customize theme fonts and color of elements.',
			'priority' => 35,
		)
	);


	$wp_customize->add_setting( 'hermes_logo_upload' );
	
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'file-upload',
			array(
				'label' => 'Logo File Upload',
				'section' => 'hermes_section_general',
				'settings' => 'hermes_logo_upload'
			)
		)
	);

	$copyright_default = __('Copyright &copy; ','hermes_textdomain') . date("Y",time()) . ' ' . get_bloginfo('name') . '. ' . __('All Rights Reserved', 'hermes_textdomain');
	$wp_customize->add_setting(
		'hermes_copyright_text',
		array(
			'default' => $copyright_default,
		)
	);

	$wp_customize->add_control(
		'hermes_copyright_text',
		array(
			'label' => 'Copyright text in Footer',
			'section' => 'hermes_section_general',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'hermes_font_main',
		array(
			'default' => 'Arial, Helvetica, sans-serif',
		)
	);
	
	$wp_customize->add_control(
		'hermes_font_main',
		array(
			'type' => 'select',
			'label' => 'Choose the main body font',
			'section' => 'hermes_section_fonts',
			'choices' => $hermes_fonts,
		)
	);

	$wp_customize->add_setting(
		'hermes_font_widget',
		array(
			'default' => 'Arial, Helvetica, sans-serif',
		)
	);
	
	$wp_customize->add_control(
		'hermes_font_widget',
		array(
			'type' => 'select',
			'label' => 'Choose the widget title font',
			'section' => 'hermes_section_fonts',
			'choices' => $hermes_fonts,
		)
	);

	$wp_customize->add_setting(
		'hermes_color_body',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'hermes_color_body',
			array(
				'label' => 'Main body text color',
				'section' => 'hermes_section_fonts',
				'settings' => 'hermes_color_body',
			)
		)
	);

	$wp_customize->add_setting(
		'hermes_color_link',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'hermes_color_link',
			array(
				'label' => 'Main body anchor(link) color',
				'section' => 'hermes_section_fonts',
				'settings' => 'hermes_color_link',
			)
		)
	);

	$wp_customize->add_setting(
		'hermes_color_link_hover',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'hermes_color_link_hover',
			array(
				'label' => 'Main body anchor(link) :hover color',
				'section' => 'hermes_section_fonts',
				'settings' => 'hermes_color_link_hover',
			)
		)
	);

}
add_action( 'customize_register', 'hermes_customizer' );