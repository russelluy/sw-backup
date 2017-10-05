<?php

/*------------------------------------------*/
/* Hermes: Recent Comments (with gravatar)	*/
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("hermes_recent_comments");'));

class hermes_recent_comments extends WP_Widget {
	
	function hermes_recent_comments() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'recent-comments', 'description' => 'A list of recent comments from all posts' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'hermes-recent-comments' );

		/* Create the widget. */
		$this->WP_Widget( 'hermes-recent-comments', 'Hermes: Recent Comments', $widget_ops, $control_ops );
	}
	
 	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$show_count = $instance['show_count'];
		$show_avatar = isset( $instance['show_avatar'] ) ? $instance['show_avatar'] : false;
		$avatar_size = $instance['avatar_size'];
		$excerpt_length = $instance['excerpt_length'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
				
			$comments = get_comments(array(
				'number' => $show_count,
				'status' => 'approve',
				'type' => 'comment'
			));
			
			echo '<ul class="recent-comments-list">';
			
			foreach($comments as $comment) :
				
				$comm_title = get_the_title($comment->comment_post_ID);
				$comm_link = get_comment_link($comment->comment_ID);
			?>
		
		<li class="recent-comment">
			<?php
				if ( $show_avatar ) {
					echo '<div class="post-cover"><a href="' . $comm_link . '">' . get_avatar($comment,$size=$avatar_size) . '</a></div>';
				}
			?>
			<a href="<?php echo($comm_link)?>"><?php echo($comment->comment_author)?>:</a> <?php echo substr(get_comment_excerpt( $comment->comment_ID ), 0, $excerpt_length); ?><div class="cleaner">&nbsp;</div>
			<div class="cleaner">&nbsp;</div>
		</li><!-- end .recent-comment -->
		
			<?php 
			endforeach;
			
			echo '</ul><!-- end .recent-comments-list -->';
		

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
 	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_count'] = $new_instance['show_count'];
		$instance['show_avatar'] = $new_instance['show_avatar'];
		$instance['avatar_size'] = $new_instance['avatar_size'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];

		return $instance;
	}
	
 	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Recent Comments', 'show_count' => 3, 'show_avatar' => true, 'avatar_size' => 30, 'excerpt_length' => 60 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; font-size: 11px; font-weight: bold; margin: 0 0 5px;"><?php _e('Widget Title', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" style="padding: 7px 5px; font-size: 11px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>"><?php _e('Number of comments to show', 'hermes_textdomain'); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>">
				<?php
				for ( $i = 1; $i < 11; $i++ ) {
					echo '<option' . ( $i == $instance['show_count'] ? ' selected="selected"' : '' ) . '>' . $i . '</option>';
				}
				?>
			</select>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_avatar'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_avatar' ); ?>" name="<?php echo $this->get_field_name( 'show_avatar' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_avatar' ); ?>"><?php _e('Show gravatar', 'hermes_textdomain'); ?>:</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>"><?php _e('Gravatar size', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>" value="<?php echo $instance['avatar_size']; ?>" size="3" type="text" style="padding: 7px 5px; font-size: 11px;" /> px
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e('Comment excerpt length', 'hermes_textdomain'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" value="<?php echo $instance['excerpt_length']; ?>" size="3" type="text" style="padding: 7px 5px; font-size: 11px;" />
		</p>
		
		<?php
	}
}