<?php

/*------------------------------------------*/
/* Hermes: Gallery				            */
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("hermes_gallery");'));

class hermes_gallery extends WP_Widget {
	
	function hermes_gallery() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hermes-gallery-widget', 'description' => 'A selection of photos taken from a static page.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'hermes-gallery-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hermes-gallery-widget', 'Hermes: Gallery', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 			= apply_filters('widget_title', $instance['title'] );
		$gallery_page 		= $instance['gallery_page'];
		$pagid = hermes_wpml_pageid($gallery_page); // make it WPML-friendly
		$show_count 	= $instance['show_count'];
		$show_more = $instance['show_more'];
		$show_random = $instance['show_random'];


		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title ) { 
			echo $before_title;
			
			if ($gallery_page) {
				echo '<a href="' . get_page_link( $gallery_page ) . '">'.$title.'</a>';
			}
			else {
				echo $title;
			}
			
			echo $after_title;
		}
		
		if ($show_random == 'on')
		{
			$orderby = 'rand';
		}
		else
		{
			$orderby = 'menu_order';
		}

		if ($gallery_page) {

			$args = array(
				'order'          => 'ASC',
				'orderby'          => $orderby,
				'post_type'      => 'attachment',
				'post_parent'    => $gallery_page,
				'post_mime_type' => 'image',
				'post_status'    => null,
				'numberposts'    => $show_count
			);
			$attachments = get_posts($args);
			
			$i = 0;
			
			if (count($attachments) > 0) { ?>


			<ul class="hermes-gallery-widget">
			
			<?php foreach ($attachments as $attachment) { 
				$i++;
				$image_data = wp_get_attachment_image_src( $attachment->ID, 'full' ); 
				?>
				<li class="hermes-gallery-widget-photo<?php if ($i % 2 == 0) { echo ' last'; } elseif ($i % 2 == 1) { echo ' first'; } ?>">
		
					<div class="post-cover">
						<a href="<?php echo $image_data[0]; ?>" class="thickbox" title="<?php echo apply_filters( 'the_title', $attachment->post_title ); ?>"><?php echo wp_get_attachment_image( $attachment->ID, 'thumb-loop-main' ); ?></a>
					</div><!-- end .post-cover -->
					
					<div class="cleaner">&nbsp;</div>
					
				</li><!-- end .hermes-gallery-widget-photo -->
			<?php } // foreach ?>
			
			</ul><!-- end .hermes-gallery-widget -->
			
			<?php if ($show_more == 'on') { ?><p class="title-xs title-caps title-center type-custom"><a href="<?php echo get_page_link( $pagid ); ?>"><?php _e('More Photos','hermes_textdomain'); ?></a></p><?php } ?>
			
			<?php } // if there are attachments
		
		} // if gallery page is selected

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['gallery_page'] = $new_instance['gallery_page'];
		$instance['show_count'] = $new_instance['show_count'];
		$instance['show_more'] = $new_instance['show_more'];
		$instance['show_random'] = $new_instance['show_random'];
		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Widget Title', 'category' => 0, 'show_count' => 6, 'show_more' => 'on', 'show_random' => 'off');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Widget Title', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'gallery_page' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Page containing the photos', 'hermes_textdomain'); ?>:</label>
			<select id="<?php echo $this->get_field_id('gallery_page'); ?>" name="<?php echo $this->get_field_name('gallery_page'); ?>" class="widefat" style="font-size: 11px;">
				<option value="0"><?php _e('Choose page', 'hermes_textdomain'); ?>:</option>
				<?php
				$pages = get_pages();
				
				foreach ($pages as $page) {
				$option = '<option value="'.$page->ID;
				if ($page->ID == $instance['gallery_page']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>"><?php _e('Number of photos to display', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" value="<?php echo $instance['show_count']; ?>" size="3" type="text" style="padding: 7px 5px; font-size: 11px;" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_more'); ?>" name="<?php echo $this->get_field_name('show_more'); ?>" <?php if ($instance['show_more'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_more' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display the More link', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_random'); ?>" name="<?php echo $this->get_field_name('show_random'); ?>" <?php if ($instance['show_random'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_random' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Random Photos', 'hermes_textdomain'); ?></label>
		</p>

		<?php
	}
}