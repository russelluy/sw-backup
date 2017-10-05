<?php

/*------------------------------------------*/
/* Hermes: Featured Pages		            */
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("hermes_widget_child_pages");'));

class hermes_widget_child_pages extends WP_Widget {
	
	function hermes_widget_child_pages() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hermes-child-pages', 'description' => 'Displays child pages of a parent page, according to chosen criteria. Best to use in the \'Before Footer\' sidebar.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'hermes-widget-pages' );

		/* Create the widget. */
		$this->WP_Widget( 'hermes-widget-pages', 'Hermes: Child Pages', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 	= apply_filters('widget_title', $instance['title'] );
		$parent_page	= $instance['parent_page'];
		$parent_page = hermes_wpml_pageid($parent_page); // make it WPML-friendly
		$link_to_page	= $instance['link_to_page'];
		$orderby	= $instance['orderby'];
		$order	= $instance['order'];
		$show_count	= $instance['show_count'];
		$show_title = $instance['show_title'];
		$show_photo = $instance['show_photo'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
	
		/* Title of widget (before and after defined by themes). */
	
		if ( $title ) { 
			echo $before_title;
			
			if ($link_to_page) {
				echo '<a href="' . get_page_link( $parent_page ) . '">'.$title.'</a>';
			}
			else {
				echo $title;
			}
			
			echo $after_title;
		}
		
		$loop = new WP_Query( array( 'post_parent' => $parent_page, 'post_type' => 'page', 'posts_per_page' => $show_count, 'orderby' => $orderby, 'order' => $order ) ); 
		
		if ($loop->have_posts()) {
			$i = 0;
		
			echo '<ul class="hermes-attractions">';
			
			while ( $loop->have_posts() ) : $loop->the_post(); global $post; $i++;
			$attraction_distance = get_post_meta($post->ID, 'hermes_attraction_distance', true);
			
			?>

			<li class="hermes-attraction<?php if ($i % 3 == 0) { echo ' last'; } elseif ($i % 4 == 0) { echo ' first'; } ?>">
	
				<?php
				if ($show_photo == 'on') {
					get_the_image( array( 'size' => 'thumb-attraction', 'width' => 290, 'height' => 180, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
				}
				?>
				
				<div class="post-excerpt">
					<?php if ($show_title == 'on') { ?><h2 class="title-post title-s title-center"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2><?php } ?>
					<?php if ($attraction_distance) { ?><p class="postmeta"><?php _e('Distance from Hotel','hermes_textdomain'); ?>: <?php echo $attraction_distance; ?></p><?php } ?>
				</div><!-- end .post-excerpt -->
				<div class="cleaner">&nbsp;</div>
				
			</li><!-- end .hermes-attraction -->
			
			<?php endwhile;
			
			echo '</ul><!-- end .hermes-attractions -->';
		
		} // if there are pages
		
		wp_reset_query();

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['parent_page'] = strip_tags( $new_instance['parent_page'] );
		$instance['link_to_page'] = strip_tags( $new_instance['link_to_page'] );
		$instance['show_count'] = strip_tags( $new_instance['show_count'] );
		$instance['show_title'] = strip_tags( $new_instance['show_title'] );
		$instance['show_photo'] = $new_instance['show_photo'];
		$instance['orderby'] = strip_tags( $new_instance['orderby'] );
		$instance['order'] = strip_tags( $new_instance['order'] );
		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Widget Title', 'show_count' => 3, 'parent_page' => 0, 'show_title' => 'on', 'show_photo' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Widget Title', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('link_to_page'); ?>" name="<?php echo $this->get_field_name('link_to_page'); ?>" <?php if ($instance['link_to_page'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'link_to_page' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Link Widget Title to Page', 'hermes_textdomain'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'parent_page' ); ?>" style="display: inline-block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Parent Page', 'hermes_textdomain'); ?>:</label><br />
			<select id="<?php echo $this->get_field_id('parent_page'); ?>" name="<?php echo $this->get_field_name('parent_page'); ?>" class="widefat" style="font-size: 11px;">
				<option value="0"><?php _e('Choose page', 'hermes_textdomain'); ?>:</option>
				<?php
				$pages = get_pages();
				
				foreach ($pages as $page) {
				$option = '<option value="'.$page->ID;
				if ($page->ID == $instance['parent_page']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $page->post_title;
				$option .= '</option>';
				echo $option;
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>" style="display: inline-block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('How many pages to display', 'hermes_textdomain'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" value="<?php echo $instance['show_count']; ?>" type="text" style="padding: 7px 5px; width: 40px;" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_title'); ?>" name="<?php echo $this->get_field_name('show_title'); ?>" <?php if ($instance['show_title'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Page Title', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_photo'); ?>" name="<?php echo $this->get_field_name('show_photo'); ?>" <?php if ($instance['show_photo'] == 'on') { echo ' checked="checked"';  } ?> />
			<label for="<?php echo $this->get_field_id( 'show_photo' ); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display Page Featured Image', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>" style="display: inline-block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Order By', 'hermes_textdomain'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" style="font-size: 11px;">
				<option value="menu_order"<?php if (!$instance['orderby'] || $instance['orderby'] == 'menu_order') { echo ' selected="selected"';} ?>><?php _e('Page Order','hermes_textdomain'); ?></option>
				<option value="ID"<?php if ($instance['orderby'] == 'ID') { echo ' selected="selected"';} ?>><?php _e('Page ID','hermes_textdomain'); ?></option>
				<option value="title"<?php if ($instance['orderby'] == 'title') { echo ' selected="selected"';} ?>><?php _e('Page Title','hermes_textdomain'); ?></option>
				<option value="date"<?php if ($instance['orderby'] == 'date') { echo ' selected="selected"';} ?>><?php _e('Published Date','hermes_textdomain'); ?></option>
				<option value="rand"<?php if ($instance['orderby'] == 'rand') { echo ' selected="selected"';} ?>><?php _e('Random Order (can decrease performance)','hermes_textdomain'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>" style="display: inline-block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Sorting Order', 'hermes_textdomain'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" style="font-size: 11px;">
				<option value="ASC"<?php if (!$instance['order'] || $instance['order'] == 'ASC') { echo ' selected="selected"';} ?>><?php _e('Ascending Order (1, 2, 3; a, b, c)','hermes_textdomain'); ?></option>
				<option value="DESC"<?php if ($instance['order'] == 'DESC') { echo ' selected="selected"';} ?>><?php _e('Descending Order (3, 2, 1; c, b, a)','hermes_textdomain'); ?></option>
			</select>
		</p>
		
		<?php
	}
}
?>