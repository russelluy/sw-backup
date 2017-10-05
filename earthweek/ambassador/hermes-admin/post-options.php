<?php
 
/*----------------------------------*/
/* Custom Posts Options				*/
/*----------------------------------*/

add_action('admin_menu', 'hermes_options_box');

function hermes_options_box() {
	
	add_meta_box('hermes_post_template', 'Post Options', 'hermes_post_options', 'post', 'side', 'high');
	add_meta_box('hermes_post_template', 'Page Options', 'hermes_post_options', 'page', 'side', 'high');

	$template_file = '';
	
	// add_meta_box('hermes_post_template', 'Post Options', 'hermes_post_options', 'post', 'side', 'high');
	add_meta_box('hermes_testimonial_options', 'Testimonial Options', 'hermes_testimonial_options', 'testimonial', 'side', 'high');
	
	// get the id of current post/page
	if (isset($_GET['post']) || isset($_GET['post']) || isset($_POST['post_ID'])) {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	}

	// get the template file used (if a page)
	if (isset($post_id)) {
		$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	}
	
	// if we are using the attraction.php page template, add additional meta boxes
	if ( isset($template_file) && ($template_file == 'page-templates/attraction.php') ) {
		add_meta_box('hermes_attraction_template', 'Attraction Options', 'hermes_attraction_options', 'page', 'side', 'high');
	}
	
	// if we are using the rooms.php page template, add additional meta boxes
	if ( $template_file == 'page-templates/rooms.php' ) {
		add_meta_box('hermes_rooms_template', 'Template Options', 'hermes_rooms_options', 'page', 'side', 'high');
	}

	// if we are using the room.php page template, add additional meta boxes
	if ( $template_file == 'page-templates/room.php' ) {
		add_meta_box('hermes_room_template', 'Room Options', 'hermes_room_options', 'page', 'side', 'high');
	}

	// if we are using the home.php page template, add additional meta boxes
	if ($template_file == 'home.php')
	{
		add_meta_box('hermes_homepage_template', 'Homepage Options', 'hermes_homepage_options', 'page', 'side', 'high');
	}
	
}

add_action('save_post', 'custom_add_save');

function custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
		$postID = $parent_id;
	}
	
	if ($_POST['save'] || $_POST['publish']) {
		update_custom_meta($postID, $_POST['hermes_post_display_featured'], 'hermes_post_display_featured');
		update_custom_meta($postID, $_POST['hermes_post_display_slideshow'], 'hermes_post_display_slideshow');
		update_custom_meta($postID, $_POST['hermes_post_display_slideshow_autoplay'], 'hermes_post_display_slideshow_autoplay');
		update_custom_meta($postID, $_POST['hermes_post_display_slideshow_speed'], 'hermes_post_display_slideshow_speed');
	}
	if ($_POST['saveAttraction']) {
		update_custom_meta($postID, $_POST['hermes_attraction_distance'], 'hermes_attraction_distance');
	}
	if ($_POST['saveRooms']) {
		update_custom_meta($postID, $_POST['hermes_rooms_template'], 'hermes_rooms_template');
	}
	if ($_POST['saveRoom']) {
		update_custom_meta($postID, $_POST['hermes_room_rate'], 'hermes_room_rate');
		update_custom_meta($postID, $_POST['hermes_room_quantity'], 'hermes_room_quantity');
		update_custom_meta($postID, $_POST['hermes_room_occupancy'], 'hermes_room_occupancy');
		update_custom_meta($postID, $_POST['hermes_room_size'], 'hermes_room_size');
		update_custom_meta($postID, $_POST['hermes_room_breakfast'], 'hermes_room_breakfast');
	}
	if ($_POST['saveTestimonial']) {
		update_custom_meta($postID, $_POST['hermes_testimonial_author'], 'hermes_testimonial_author');
		update_custom_meta($postID, $_POST['hermes_testimonial_country'], 'hermes_testimonial_country');
		update_custom_meta($postID, $_POST['hermes_testimonial_date'], 'hermes_testimonial_date');
		update_custom_meta($postID, $_POST['hermes_testimonial_url'], 'hermes_testimonial_url');
	}

}

function update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
		// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
	
}

// Regular Posts Options
function hermes_post_options() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
 				<label for="">Display featured image in current post/page:</label><br />
				<select name="hermes_post_display_featured" id="hermes_post_display_featured">
					<option<?php selected( get_post_meta($post->ID, 'hermes_post_display_featured', true), 'No' ); ?>>No</option>
					<option<?php selected( get_post_meta($post->ID, 'hermes_post_display_featured', true), 'Yes' ); ?>>Yes</option>
				</select>
			</p>
			<p>
				<input class="checkbox" type="checkbox" id="hermes_post_display_slideshow" name="hermes_post_display_slideshow" value="on"<?php if (get_post_meta($post->ID, 'hermes_post_display_slideshow', true) == 'on' ) { echo ' checked="checked"'; } ?> />
 				<label for="hermes_post_display_slideshow">If there are multiple images - display as slideshow.</label><br />
			</p>
			<p>
				<input class="checkbox" type="checkbox" id="hermes_post_display_slideshow_autoplay" name="hermes_post_display_slideshow_autoplay" value="on"<?php if (get_post_meta($post->ID, 'hermes_post_display_slideshow_autoplay', true) == 'on' ) { echo ' checked="checked"'; } ?> />
 				<label for="hermes_post_display_slideshow_autoplay">Enable slideshow autoplay.</label><br />
			</p>
			<p>
				<label for="hermes_post_display_slideshow_speed"><?php _e('Slideshow autoplay speed in miliseconds', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_post_display_slideshow_speed" id="hermes_post_display_slideshow_speed" value="<?php echo get_post_meta($post->ID, 'hermes_post_display_slideshow_speed', true); ?>"><br />
				<span class="description">1 second = 1000 miliseconds.</span>
			</p>
  		</div>
	</fieldset>
	<?php
}

// Attraction Page Template Options
function hermes_attraction_options() {
	global $post;
	?>
	<fieldset>
		<input type="hidden" name="saveAttraction" id="saveAttraction" value="1" />
		<div>
			<p>
				<label for="hermes_attraction_distance"><?php _e('Distance to Attraction', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_attraction_distance" id="hermes_attraction_distance" value="<?php echo get_post_meta($post->ID, 'hermes_attraction_distance', true); ?>"><br />
			</p>
			
  		</div>
	</fieldset>
	<?php
	}

// Rooms List Page Template Options
function hermes_rooms_options() {
	global $post;
	?>
	<fieldset>
		<input type="hidden" name="saveRooms" id="saveRooms" value="1" />
		<div>
			<p>
 				<label for="hermes_rooms_template">Page Template</label><br />
				<select name="hermes_rooms_template" id="hermes_rooms_template">
					<option<?php selected( get_post_meta($post->ID, 'hermes_rooms_template', true), 'Grid' ); ?>>Grid</option>
					<option<?php selected( get_post_meta($post->ID, 'hermes_rooms_template', true), 'List' ); ?>>List</option>
				</select>
			</p>
  		</div>
	</fieldset>
	<?php
	}

// Room Page Template Options
function hermes_room_options() {
	global $post;
	?>
	<fieldset>
		<input type="hidden" name="saveRoom" id="saveRoom" value="1" />
		<div>
			<p>
				<label for="hermes_room_rate"><?php _e('Room Rate', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_room_rate" id="hermes_room_rate" value="<?php echo get_post_meta($post->ID, 'hermes_room_rate', true); ?>"><br />
			</p>
			<p>
				<label for="hermes_room_quantity"><?php _e('Total Number of Rooms of this Type', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_room_quantity" id="hermes_room_quantity" value="<?php echo get_post_meta($post->ID, 'hermes_room_quantity', true); ?>"><br />
			</p>
			<p>
				<label for="hermes_room_occupancy"><?php _e('Maximum Occupancy', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_room_occupancy" id="hermes_room_occupancy" value="<?php echo get_post_meta($post->ID, 'hermes_room_occupancy', true); ?>"><br />
			</p>			
			<p>
				<label for="hermes_room_size"><?php _e('Room Size', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_room_size" id="hermes_room_size" value="<?php echo get_post_meta($post->ID, 'hermes_room_size', true); ?>"><br />
			</p>
			<p>
				<input class="checkbox" type="checkbox" id="hermes_room_breakfast" name="hermes_room_breakfast" value="on"<?php if (get_post_meta($post->ID, 'hermes_room_breakfast', true) == 'on' ) { echo ' checked="checked"'; } ?> />
 				<label for="hermes_gallery_show">Breakfast Included:</label><br />
			</p>
			
  		</div>
	</fieldset>
	<?php
	}

// Testimonials Options
function hermes_testimonial_options() {
	global $post;
	?>
	<fieldset>
		<input type="hidden" name="saveTestimonial" id="saveTestimonial" value="1" />
		<div>
			<p>
				<label for="hermes_testimonial_author"><?php _e('Testimonial Author', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_testimonial_author" id="hermes_testimonial_author" value="<?php echo get_post_meta($post->ID, 'hermes_testimonial_author', true); ?>"><br />
			</p>
			<p>
				<label for="hermes_testimonial_country"><?php _e('Author Location', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_testimonial_country" id="hermes_testimonial_country" value="<?php echo get_post_meta($post->ID, 'hermes_testimonial_country', true); ?>"><br />
				<span class="description">Example: Rome, Italy</span>
			</p>
			<p>
				<label for="hermes_testimonial_date"><?php _e('Testimonial Date', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_testimonial_date" id="hermes_testimonial_date" value="<?php echo get_post_meta($post->ID, 'hermes_testimonial_date', true); ?>"><br />
				<span class="description">Example: 15th December, 2012</span>
			</p>
			<p>
				<label for="hermes_testimonial_url"><?php _e('Link to Original Source', 'hermes_textdomain'); ?>:</label><br />
				<input type="text" style="width:90%;" name="hermes_testimonial_url" id="hermes_testimonial_url" value="<?php echo get_post_meta($post->ID, 'hermes_testimonial_url', true); ?>"><br />
				<span class="description">Example: http://www.hermesthemes.com</span>
			</p>
			
  		</div>
	</fieldset>
	<?php
	}

?>