<?php

/*------------------------------------------*/
/* Hermes: Testimonials           */
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("hermes_widget_testimonials");'));

class hermes_widget_testimonials extends WP_Widget {
	
	function hermes_widget_testimonials() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hermes-testimonials', 'description' => 'Displays testimonials according to chosen criteria.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'hermes-widget-testimonials' );

		/* Create the widget. */
		$this->WP_Widget( 'hermes-widget-testimonials', 'Hermes: Testimonials', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 	= apply_filters('widget_title', $instance['title'] );
		$link_to_page	= $instance['link_to_page'];
		$link_to_page = hermes_wpml_pageid($link_to_page); // make it WPML-friendly
		$show_count	= $instance['show_count'];
		$show_title = $instance['show_title'];
		$show_photo = $instance['show_photo'];
		$show_author = $instance['show_author'];
		$show_country = $instance['show_country'];
		$show_date = $instance['show_date'];
		$show_random = $instance['show_random'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
	
		/* Title of widget (before and after defined by themes). */
	
		if ( $title ) { 
			echo $before_title;
			
			if ($link_to_page) {
				echo '<a href="' . get_page_link( $link_to_page ) . '">'.$title.'</a>';
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
			$orderby = 'date';
		}

		$loop = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => $show_count, 'orderby' => $orderby ) ); 
		
		while ( $loop->have_posts() ) : $loop->the_post(); global $post;
		
		$testimonial_author = get_post_meta($post->ID, 'hermes_testimonial_author', true);
		$testimonial_country = get_post_meta($post->ID, 'hermes_testimonial_country', true);
		$testimonial_date = get_post_meta($post->ID, 'hermes_testimonial_date', true);
		$testimonial_url = get_post_meta($post->ID, 'hermes_testimonial_url', true);
		?>
		
		<figure>
			
			<blockquote<?php if ($testimonial_url) { echo ' cite="'.$testimonial_url.'"'; } ?> class="hermes-testimonial">
				<?php if ($show_title == 'on') { ?><h2 class="title-post title-s"><?php the_title(); ?></h2><?php } ?>
				<?php
				if ($show_photo == 'on') {
					get_the_image( array( 'size' => 'recent-posts', 'width' => 60, 'height' => 40, 'before' => '<div class="post-cover">', 'after' => '</div>', 'attachment' => false, 'link_to_post' => false ) );
				}
				?>
				<?php the_content(); ?>
			</blockquote><!-- end .hermes-testimonial -->
			<figcaption class="hermes-author"><?php if ($testimonial_author && $show_author == 'on') { echo "<strong>$testimonial_author</strong>, "; } ?>
			<?php if ($testimonial_country && $show_country == 'on') { echo "$testimonial_country"; } ?>
			<?php if ($testimonial_date && $show_date == 'on') { echo " &mdash; $testimonial_date"; } ?></figcaption>
		</figure>
		<?php endwhile; 
		wp_reset_query();

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link_to_page'] = strip_tags( $new_instance['link_to_page'] );
		$instance['show_count'] = strip_tags( $new_instance['show_count'] );
		$instance['show_title'] = strip_tags( $new_instance['show_title'] );
		$instance['show_photo'] = $new_instance['show_photo'];
		$instance['show_author'] = $new_instance['show_author'];
		$instance['show_country'] = $new_instance['show_country'];
		$instance['show_date'] = $new_instance['show_date'];
		$instance['show_random'] = $new_instance['show_random'];
		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Widget Title', 'show_count' => 1, 'show_author' => 'on', 'show_country' => 'on', 'show_date' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Widget Title', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'link_to_page' ); ?>"><?php _e('Link Widget Title to Page', 'hermes_textdomain'); ?>:</label><br />
			<select id="<?php echo $this->get_field_id('link_to_page'); ?>" name="<?php echo $this->get_field_name('link_to_page'); ?>" class="widefat" style="font-size: 11px;">
				<option value="0"><?php _e('Choose page', 'hermes_textdomain'); ?>:</option>
				<?php
				$pages = get_pages();
				
				foreach ($pages as $page) {
				$option = '<option value="'.$page->ID;
				if ($page->ID == $instance['link_to_page']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('How many testimonials to display', 'hermes_textdomain'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" value="<?php echo $instance['show_count']; ?>" type="text" style="padding: 7px 5px; width: 40px;" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_title'); ?>" name="<?php echo $this->get_field_name('show_title'); ?>" <?php if ($instance['show_title'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Testimonial Title', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_photo'); ?>" name="<?php echo $this->get_field_name('show_photo'); ?>" <?php if ($instance['show_photo'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_photo' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Featured Image', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_author'); ?>" name="<?php echo $this->get_field_name('show_author'); ?>" <?php if ($instance['show_author'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_author' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Author Name', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_country'); ?>" name="<?php echo $this->get_field_name('show_country'); ?>" <?php if ($instance['show_country'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_country' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Author Location', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" <?php if ($instance['show_date'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Testimonial Date', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_random'); ?>" name="<?php echo $this->get_field_name('show_random'); ?>" <?php if ($instance['show_random'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_random' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Random Testimonial', 'hermes_textdomain'); ?></label>
		</p>
		
		<?php
	}
}
?>