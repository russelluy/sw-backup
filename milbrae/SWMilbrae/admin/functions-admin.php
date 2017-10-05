<?php
/*
 * Theme Settings
 *
 */
	
add_action( 'admin_menu', 'SWMilbrae_theme_admin_setup' );

function SWMilbrae_theme_admin_setup() {
    
	global $theme_settings_page;
	
	/* Get the theme settings page name */
	$theme_settings_page = 'appearance_page_theme-settings';

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Create a settings meta box only on the theme settings page. */
	add_action( 'load-appearance_page_theme-settings', 'SWMilbrae_theme_settings_meta_boxes' );

	/* Add a filter to validate/sanitize your settings. */
	add_filter( "sanitize_option_{$prefix}_theme_settings", 'SWMilbrae_theme_validate_settings' );
	
	/* Enqueue scripts */
	add_action( 'admin_enqueue_scripts', 'SWMilbrae_admin_scripts' );
	
}

/* Adds custom meta boxes to the theme settings page. */
function SWMilbrae_theme_settings_meta_boxes() {

	/* Add a custom meta box. */
	add_meta_box(
		'SWMilbrae-theme-meta-box',			// Name/ID
		__( 'General settings', 'SWMilbrae' ),	// Label
		'SWMilbrae_theme_meta_box',			// Callback function
		'appearance_page_theme-settings',		// Page to load on, leave as is
		'normal',					// Which meta box holder?
		'high'					// High/low within the meta box holder
	);

	/* Add additional add_meta_box() calls here. */
}

/* Function for displaying the meta box. */
function SWMilbrae_theme_meta_box() { ?>

	<table class="form-table">
	    
		<!-- Favicon upload -->
		<tr class="favicon_url">
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_favicon_url' ); ?>"><?php _e( 'Favicon:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<input type="text" id="<?php echo hybrid_settings_field_id( 'SWMilbrae_favicon_url' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_favicon_url' ); ?>" value="<?php echo esc_attr( hybrid_get_setting( 'SWMilbrae_favicon_url' ) ); ?>" />
				<input id="SWMilbrae_favicon_upload_button" class="button" type="button" value="Upload" />
				<br />
				<span class="description"><?php _e( 'Upload favicon image (recommended max size: 32x32).', 'SWMilbrae' ); ?></span>
				
				<?php /* Display uploaded image */
				if ( hybrid_get_setting( 'SWMilbrae_favicon_url' ) ) { ?>
                    <p><img src="<?php echo hybrid_get_setting( 'SWMilbrae_favicon_url' ); ?>" alt=""/></p>
				<?php } ?>
			</td>
		</tr>
		
		<!-- Logo upload -->
		<tr class="logo_url">
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_logo_url' ); ?>"><?php _e( 'Logo:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<input type="text" id="<?php echo hybrid_settings_field_id( 'SWMilbrae_logo_url' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_logo_url' ); ?>" value="<?php echo esc_attr( hybrid_get_setting( 'SWMilbrae_logo_url' ) ); ?>" />
				<input id="SWMilbrae_logo_upload_button" class="button" type="button" value="Upload" />
				<br />
				<span class="description"><?php _e( 'Upload logo image.', 'SWMilbrae' ); ?></span>
				
				<?php /* Display uploaded image */
				if ( hybrid_get_setting( 'SWMilbrae_logo_url' ) ) { ?>
                    <p><img src="<?php echo hybrid_get_setting( 'SWMilbrae_logo_url' ); ?>" alt=""/></p>
				<?php } ?>
			</td>
		</tr>		
		
		<!-- Title font family -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_font_family' ); ?>"><?php _e( 'Title font family:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
			    <select id="<?php echo hybrid_settings_field_id( 'SWMilbrae_font_family' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_font_family' ); ?>">
				<option value="Abel" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Abel' ? 'selected="selected"' : '' ?>> <?php echo __( 'Abel', 'SWMilbrae' ) ?> </option>				
				<option value="Oswald" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Oswald' ? 'selected="selected"' : '' ?>> <?php echo __( 'Oswald', 'SWMilbrae' ) ?> </option>				
				<option value="Terminal Dosis" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Terminal Dosis' ? 'selected="selected"' : '' ?>> <?php echo __( 'Terminal Dosis', 'SWMilbrae' ) ?> </option>
				<option value="Bitter" <?php echo hybrid_get_setting( 'SWMilbrae_font_family', 'Bitter' ) == 'Bitter' ? 'selected="selected"' : '' ?>> <?php echo __( 'Bitter', 'SWMilbrae' ) ?> </option>
				<option value="Georgia" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Georgia' ? 'selected="selected"' : '' ?>> <?php echo __( 'Georgia', 'SWMilbrae' ) ?> </option>
				<option value="Droid Serif" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Droid Serif' ? 'selected="selected"' : '' ?>> <?php echo __( 'Droid Serif', 'SWMilbrae' ) ?> </option>				
				<option value="Helvetica" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Helvetica' ? 'selected="selected"' : '' ?>> <?php echo __( 'Helvetica', 'SWMilbrae' ) ?> </option>
				<option value="Arial" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Arial' ? 'selected="selected"' : '' ?>> <?php echo __( 'Arial', 'SWMilbrae' ) ?> </option>
				<option value="Droid Sans" <?php echo hybrid_get_setting( 'SWMilbrae_font_family' ) == 'Droid Sans' ? 'selected="selected"' : '' ?>> <?php echo __( 'Droid Sans', 'SWMilbrae' ) ?> </option>
			    </select>
				<span class="description"><?php _e( 'Choose a font for the titles.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>
		
		<!-- Font size -->
		<tr>
			<th>
			    <label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_font_size' ); ?>"><?php _e( 'Font size:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
			    <select id="<?php echo hybrid_settings_field_id( 'SWMilbrae_font_size' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_font_size' ); ?>">
				<option value="16" <?php echo hybrid_get_setting( 'SWMilbrae_font_size', '16' ) == '16' ? 'selected="selected"' : '' ?>> <?php echo __( 'default', 'SWMilbrae' ) ?> </option>
				<option value="17" <?php echo hybrid_get_setting( 'SWMilbrae_font_size', '17' ) == '17' ? 'selected="selected"' : '' ?>> <?php echo __( '17', 'SWMilbrae' ) ?> </option>
				<option value="16" <?php echo hybrid_get_setting( 'SWMilbrae_font_size', '16' ) == '16' ? 'selected="selected"' : '' ?>> <?php echo __( '16', 'SWMilbrae' ) ?> </option>
				<option value="15" <?php echo hybrid_get_setting( 'SWMilbrae_font_size' ) == '15' ? 'selected="selected"' : '' ?>> <?php echo __( '15', 'SWMilbrae' ) ?> </option>
				<option value="14" <?php echo hybrid_get_setting( 'SWMilbrae_font_size' ) == '14' ? 'selected="selected"' : '' ?>> <?php echo __( '14', 'SWMilbrae' ) ?> </option>				
				<option value="13" <?php echo hybrid_get_setting( 'SWMilbrae_font_size' ) == '13' ? 'selected="selected"' : '' ?>> <?php echo __( '13', 'SWMilbrae' ) ?> </option>
				<option value="12" <?php echo hybrid_get_setting( 'SWMilbrae_font_size' ) == '12' ? 'selected="selected"' : '' ?>> <?php echo __( '12', 'SWMilbrae' ) ?> </option>
			    </select>
			    <span class="description"><?php _e( 'The base font size in pixels.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>		
	    
		<!-- Link color -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_link_color' ); ?>"><?php _e( 'Link color:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<input type="text" id="<?php echo hybrid_settings_field_id( 'SWMilbrae_link_color' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_link_color' ); ?>" size="8" value="<?php echo ( hybrid_get_setting( 'SWMilbrae_link_color' ) ) ? esc_attr( hybrid_get_setting( 'SWMilbrae_link_color' ) ) : '#0da4d3'; ?>" data-hex="true" />
				<div id="colorpicker_link_color"></div>
				<span class="description"><?php _e( 'Set the theme link color.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>
		
		<!-- Slider Timeout -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_slider_timeout' ); ?>"><?php _e( 'Slider Timeout:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<input type="text" id="<?php echo hybrid_settings_field_id( 'SWMilbrae_slider_timeout' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_slider_timeout' ); ?>" value="<?php echo ( hybrid_get_setting( 'SWMilbrae_slider_timeout' ) ) ? esc_attr( hybrid_get_setting( 'SWMilbrae_slider_timeout' ) ) : '6000'; ?>" />
				<span class="description"><?php _e( 'The time interval between slides in milliseconds.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>
		
		<!-- Fancybox enable -->
		<tr>
			<th>
			    <label for="<?php echo esc_attr( hybrid_settings_field_id( 'SWMilbrae_fancybox_enable' ) ); ?>"><?php _e( 'Fancybox:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<input class="checkbox" type="checkbox" <?php checked( hybrid_get_setting( 'SWMilbrae_fancybox_enable' ), true ); ?> id="<?php echo esc_attr( hybrid_settings_field_id( 'SWMilbrae_fancybox_enable' ) ); ?>" name="<?php echo esc_attr( hybrid_settings_field_name( 'SWMilbrae_fancybox_enable' ) ); ?>" />
			    <span class="description"><?php _e( 'Check to enable the built-in <a href="http://fancybox.net/" target="_blank">Fancybox</a>.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>		

		<!-- Custom CSS -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'SWMilbrae_custom_css' ); ?>"><?php _e( 'Custom CSS:', 'SWMilbrae' ); ?></label>
			</th>
			<td>
				<textarea id="<?php echo hybrid_settings_field_id( 'SWMilbrae_custom_css' ); ?>" name="<?php echo hybrid_settings_field_name( 'SWMilbrae_custom_css' ); ?>" cols="60" rows="8"><?php echo wp_htmledit_pre( stripslashes( hybrid_get_setting( 'SWMilbrae_custom_css' ) ) ); ?></textarea>
				<span class="description"><?php _e( 'Add your custom CSS here. It would overwrite any default or custom theme settings.', 'SWMilbrae' ); ?></span>
			</td>
		</tr>

		<!-- End custom form elements. -->
	</table><!-- .form-table --><?php
	
}

/* Validate theme settings. */
function SWMilbrae_theme_validate_settings( $input ) {
    
	$input['SWMilbrae_favicon_url'] = esc_url_raw( $input['SWMilbrae_favicon_url'] );
	$input['SWMilbrae_logo_url'] = esc_url_raw( $input['SWMilbrae_logo_url'] );
	$input['SWMilbrae_font_family'] = wp_filter_nohtml_kses( $input['SWMilbrae_font_family'] );
	$input['SWMilbrae_font_size'] = wp_filter_nohtml_kses( $input['SWMilbrae_font_size'] );
    $input['SWMilbrae_link_color'] = wp_filter_nohtml_kses( $input['SWMilbrae_link_color'] );
	$input['SWMilbrae_slider_timeout'] = wp_filter_nohtml_kses( intval( $input['SWMilbrae_slider_timeout'] ) );
    $input['SWMilbrae_custom_css'] = wp_filter_nohtml_kses( $input['SWMilbrae_custom_css'] );
	$input['SWMilbrae_fancybox_enable'] = ( isset( $input['SWMilbrae_fancybox_enable'] ) ? 1 : 0 );	

    /* Return the array of theme settings. */
    return $input;
}

/* Enqueue scripts (and related stylesheets) */
function SWMilbrae_admin_scripts( $hook_suffix ) {
    
    global $theme_settings_page;
	
    if ( $theme_settings_page == $hook_suffix ) {
	    
	    /* Enqueue Scripts */
	    wp_register_script( 'functions-admin', get_template_directory_uri() . '/admin/functions-admin.js', array( 'jquery', 'media-upload', 'thickbox', 'farbtastic' ), '1.0', false );
	    wp_enqueue_script( 'functions-admin' );
	    
	    /* Enqueue Styles */
	    wp_enqueue_style( 'functions-admin', get_template_directory_uri() . '/admin/functions-admin.css', false, 1.0, 'screen' );
	    wp_enqueue_style( 'farbtastic' );
    }
}

?>