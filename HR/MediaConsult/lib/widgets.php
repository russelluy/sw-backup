<?php 
/* Sidebar types */
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar for contact page',
		'before_widget' => '<div id="%1$s" class="blog-categ widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar for Blog Section',
		'before_widget' => '<div id="%1$s" class="blog-categ widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar for Non-Blog Pages',
		'before_widget' => '<div id="%1$s" class="blog-categ widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar for Homepage',
		'before_widget' => '<div id="%1$s" class="blog-categ widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));
		
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar for All Pages',
		'before_widget' => '<div id="%1$s" class="blog-categ widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));


/**
 * FeedsWidget Class
 */
class FeedsWidget extends WP_Widget {
    /** constructor */
    function FeedsWidget() {
		$widget_ops = array('classname' => 'widget_mc_feeds', 'description' => __('RSS Feeds and Subscribe Form','MediaConsult') );
		$this->WP_Widget('mc-feeds', __('MC Feeds','MediaConsult'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		global $mc_feed_url, $mc_feedburner_id;
        ?>
              <?php echo $before_widget; ?>
                  <?php echo $before_title
                      . $instance['title']
                      . $after_title; ?>
                  
<ul>
	<li><a href="<?php if ($mc_feed_url) echo $mc_feed_url; else bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">Posts RSS</a>
    </li>
    <li>
    <a href="<?php bloginfo_rss('comments_rss2_url'); ?> ">Comments RSS</a></li>
<?php if ($mc_feedburner_id) {  ?>
    <li>
  <form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $mc_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<input type="text" id="feedfield" value="<?php _e('enter email address','MediaConsult'); ?>" onfocus="if (this.value == '<?php _e('enter email address','MediaConsult'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('enter email address','MediaConsult'); ?>';}" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $mc_feedburner_id; ?>" name="url"/>
<input type="submit" class="feedbutton" value="Submit"  />    	
    </li>
<?php } ?>
</ul>          
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class FeedsWidget

// register FeedsWidget
add_action('widgets_init', create_function('', 'return register_widget("FeedsWidget");'));




/**
 * NewsWidget Class
 */
class NewsWidget extends WP_Widget {
    /** constructor */
    function NewsWidget() {
		$widget_ops = array('classname' => 'widget_mc_news', 'description' => __('Latest News','MediaConsult') );
		$this->WP_Widget('mc-news', __('MC News','MediaConsult'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		global $gw_options;
		echo $before_widget; ?>
        
	  <?php echo $before_title
          . $instance['title']
          . $after_title; 
      
            $posts_per_page = $gw_options['news']['news_pp'];
            
            $query_string = "showposts=3&cat=".$negative_cats;
            $query_string .= "&cat=".$gw_options['news']['news_categ_final'];
            query_posts($query_string);
		?>

                <ul class="ln-list">
                    <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        $news_image = get_post_meta($post->ID, "news-image", true);	
                    ?>
                    <li>
                        <h6>
                            <a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h6> 
                        <p><?php echo excerpt(18); ?></p>
                        <div class="ln-date"><?php the_time('F jS, Y') ?></div>
                    
                    </li>
        
                    <?php endwhile; else: ?>
                    <li class="ln-list">
                        <h2>Nothing Found</h2>
                        <p>Sorry, no posts matched your criteria.</p>
                    </li>
    
                <!--do not delete-->
                <?php endif; ?>  
                </ul>          
            
            <?php echo $after_widget; ?>
            
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class NewsWidget

// register NewsWidget
add_action('widgets_init', create_function('', 'return register_widget("NewsWidget");'));



/**
 * BrochureWidget Class
 */
class BrochureWidget extends WP_Widget {
    /** constructor */
    function BrochureWidget() {
		$widget_ops = array('classname' => 'widget_mc_brochure', 'description' => __('Brocure','MediaConsult') );
		$this->WP_Widget('mc-brochure', __('MC Brochure','MediaConsult'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		global $gw_options;
		echo $before_widget; ?>

            <a href="<?php echo $gw_options['general']['brochure_link']; ?>"><img src="<?php echo bloginfo('template_url'); ?>/img/pdf_icon.png" width="43" height="53" alt="" /></a>
            <div class="brochure-title">
				<?php echo $before_title
                . $instance['title']
                . $after_title; ?>
                <p class="header-desc">Download our PDF brochure</p>
            </div>            

      
            
            <?php echo $after_widget; ?>
            
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class BrochureWidget

// register BrochureWidget
add_action('widgets_init', create_function('', 'return register_widget("BrochureWidget");'));




/**
 * BlogCategWidget Class
 */
class BlogCategWidget extends WP_Widget {
    /** constructor */
    function BlogCategWidget() {
		$widget_ops = array('classname' => 'widget_mc_blogcateg', 'description' => __('Blog Categories','MediaConsult') );
		$this->WP_Widget('mc-blogcateg', __('MC Blog Categories','MediaConsult'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		global $gw_options;
		echo $before_widget; ?>

	  <?php echo $before_title
          . $instance['title']
          . $after_title; 

		?>
        <ul>
            <?php 

			if ($gw_options['general']['blog_identificator']) {
				wp_list_categories('sort_column=name&title_li=&optioncount=1&child_of='.$gw_options['general']['blog_identificator']);          
			}
			else { ?>
				<li>The category id is not defined.</li>
	  <?php }?>   
        </ul>
    
            <?php echo $after_widget; ?>
            
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class BlogCategWidget

// register BlogCategWidget
add_action('widgets_init', create_function('', 'return register_widget("BlogCategWidget");'));

?>