<?php

/*------------------------------------------*/
/* Hermes: Recent Posts           */
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("hermes_recent_posts");'));

class hermes_recent_posts extends WP_Widget {
	
	function hermes_recent_posts() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'recent-posts', 'description' => 'A list of posts, optionally filtered by category.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'hermes-recent-posts' );

		/* Create the widget. */
		$this->WP_Widget( 'hermes-recent-posts', 'Hermes: Recent Posts', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title 			= apply_filters('widget_title', $instance['title'] );
		$category 		= $instance['category'];
		$show_count 	= $instance['show_count'];
		$show_date = $instance['datetime'];
		$show_comments = $instance['comments'];
		$show_category = $instance['show_category'];


		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		

		echo '<ul class="hermes-posts hermes-posts-recent">';
		
		$loop = new WP_Query( array( 'posts_per_page' => $show_count, 'orderby' => 'date', 'order' => 'DESC', 'cat' => $category ) );
		while ( $loop->have_posts() ) : $loop->the_post();
		unset($prev); 
		?>
			<li class="hermes-post">
				<?php
				get_the_image( array( 'size' => 'thumb-recent-posts', 'width' => 60, 'before' => '<div class="post-cover">', 'after' => '</div><!-- end .post-cover -->' ) );
				?>
				<div class="post-excerpt">
					<h2 class="title-post title-s"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'hermes_textdomain' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h2>
					<p class="postmeta">
						<span>
							<?php if ($show_date == 'on') { ?><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php printf( __('%s', 'hermes_textdomain'), the_time(get_option('date_format'))); ?></time><?php $prev = TRUE; } ?>
							<?php if ($show_category == 'on') { if ($prev) {echo ' / '; } the_category(', '); } ?>
							<?php if ($show_comments == 'on') { if ($prev) {echo ' / '; } ?><?php comments_popup_link( __('0 comments', 'hermes_textdomain'), __('1 comment', 'hermes_textdomain'), __('% comments', 'hermes_textdomain'), '', ''); } ?>
						</span>
					</p><!-- end .postmeta -->
				</div><!-- end .post-excerpt -->
			<div class="cleaner">&nbsp;</div>
			</li><!-- end .hermes-post -->
			<?php
			endwhile; 
			
			//Reset query_posts
			wp_reset_query();			
		echo '</ul><!-- end .hermes-posts .hermes-posts-recent -->';

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category'] = $new_instance['category'];
		$instance['show_count'] = $new_instance['show_count'];
		$instance['datetime'] = $new_instance['datetime'];
		$instance['show_category'] = $new_instance['show_category'];
		$instance['comments'] = $new_instance['comments'];


		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Widget Title', 'category' => 0, 'show_count' => 3, 'datetime' => 'on', 'show_category' => 'on', 'comments' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Widget Title', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Category of posts', 'hermes_textdomain'); ?>:</label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="font-size: 11px;">
					<option value="0">- show from all categories -</option>
					<?php
					
					$cats = get_categories('hide_empty=0');
					foreach ($cats as $cat) {
					$option = '<option value="'.$cat->term_id;
					if ($cat->term_id == $instance['category']) { $option .='" selected="selected';}
					$option .= '">';
					$option .= $cat->cat_name;
					$option .= ' ('.$cat->category_count.')';
					$option .= '</option>';
					echo $option;
					}
				?>
				</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>"><?php _e('Number of posts to display', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" value="<?php echo $instance['show_count']; ?>" size="3" type="text" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('datetime'); ?>" name="<?php echo $this->get_field_name('datetime'); ?>" <?php if ($instance['datetime'] == 'on') { echo ' checked="checked"';  } ?> /> 
			<label for="<?php echo $this->get_field_id('datetime'); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display date', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('show_category'); ?>" name="<?php echo $this->get_field_name('show_category'); ?>" <?php if ($instance['show_category'] == 'on') { echo ' checked="checked"';  } ?> /> 
			<label for="<?php echo $this->get_field_id('show_category'); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display post category', 'hermes_textdomain'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" <?php if ($instance['comments'] == 'on') { echo ' checked="checked"';  } ?> /> 
			<label for="<?php echo $this->get_field_id('comments'); ?>" style="font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Display number of comments', 'hermes_textdomain'); ?></label>
		</p>
		
		<?php
	}
}