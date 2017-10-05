<?php
// Register widgetized areas
if ( function_exists('register_sidebar') ) 
{
	register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Left Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Right Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(3,array('name' => 'Footer Widget %d','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Classifieds listing Page Google Ads','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Classifieds detail Page Google Ads','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
register_sidebars(1,array('name' => 'Classifieds Home Page Banner Left','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
register_sidebars(1,array('name' => 'Header Navigation Menu','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
}
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;
 
	return (isset($sidebars[$key]));
}


// =============================== Feedburner Subscribe widget ======================================
function subscribeWidget()
{
	$settings = get_option("widget_subscribewidget");

	$id = $settings['id'];
	$title = $settings['title'];
	$text = $settings['text'];	

?>
	
    
    <div class="widget" >	
     
  <h3><?php echo $title; ?></h3>
  
   <p><span  class="spacer2" ><a href="<?php bloginfo('rss2_url'); ?>" class="i_rss"><strong>Entries (RSS)</strong></a></span> 
   <a href="<?php bloginfo('comments_rss2_url'); ?>" class="i_rss"><strong>Comment (RSS)</strong></a></p>
   
  	<p><?php echo $text; ?> </p>
 
	  <form  action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow"  onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      
     
     <input type="text" class="subscribe_textield" onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" name="email"/>
      <input type="hidden" value="<?php echo $id; ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/>
       <input type="image" src="<?php bloginfo('template_url'); ?>/images/none.png"   value="Subscribe" class="bsubscribe" />
      
      </form>
      
      
		 
 	</div> 
 
 
<?php
}

function subscribeWidgetAdmin() {

	$settings = get_option("widget_subscribewidget");

	// check if anything's been sent
	if (isset($_POST['update_subscribe'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['subscribe_id']));
		$settings['title'] = strip_tags(stripslashes($_POST['subscribe_title']));
		$settings['text'] = strip_tags(stripslashes($_POST['subscribe_text']));		

		update_option("widget_subscribewidget",$settings);
	}

	echo '<p>
			<label for="subscribe_title">Title:
			<input id="subscribe_title" name="subscribe_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="subscribe_text">Text Under Title:
			<input id="subscribe_text" name="subscribe_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';
	echo '<p>
			<label for="subscribe_id">Feedburner ID <small>(example: templatic/eKPs)</small>:
			<input id="subscribe_id" name="subscribe_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';			
	echo '<input type="hidden" id="update_subscribe" name="update_subscribe" value="1" />';

}

register_sidebar_widget('PT &rarr; Subscribe', 'subscribeWidget');
register_widget_control('PT &rarr; Subscribe', 'subscribeWidgetAdmin', 400, 200);



// =============================== Text Widget ======================================
class AboutWidget extends WP_Widget {
	function AboutWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget text widget', 'description' => '' );		
		$this->WP_Widget('widget_Location', 'PT &rarr; Text Widget', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);		
		$desc = empty($instance['desc']) ? '&nbsp;' : apply_filters('widget_desc', $instance['desc']);
 		    ?>						
            
        
             <h3 > <?php echo $title; ?> </h3>
             <?php echo $desc; ?>
 	     
            
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);		
		$instance['desc'] = ($new_instance['desc']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'desc' => '', 'google_map' => '' ) );		
		$title = strip_tags($instance['title']);		
		$desc = ($instance['desc']);
 ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>			
        <p><label for="<?php echo $this->get_field_id('desc'); ?>">Description here <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo attribute_escape($desc); ?></textarea></label></p>
        
<?php
	}}
register_widget('AboutWidget');


// =============================== google ads Widget ======================================
class google_ads_widget extends WP_Widget {
	function google_ads_widget() {
	//Constructor
		$widget_ops = array('classname' => 'widget text widget', 'description' => '' );		
		$this->WP_Widget('widget_Location2', 'PT &rarr; Google Ads', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);		
		$desc = empty($instance['desc']) ? '&nbsp;' : apply_filters('widget_desc', $instance['desc']);
 		    ?>						
            
        
             <?php /*?><h3 > <?php echo $title; ?> </h3><?php */?>
            
             <?php echo $desc; ?>
 	     
            
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);		
		$instance['desc'] = ($new_instance['desc']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'desc' => '', 'google_map' => '' ) );		
		$title = strip_tags($instance['title']);		
		$desc = ($instance['desc']);
 ?>
		<?php /*?><p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p><?php */?>			
        <p><label for="<?php echo $this->get_field_id('desc'); ?>">Google ads code here <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo attribute_escape($desc); ?></textarea></label></p>
        
<?php
	}}
register_widget('google_ads_widget');




// =============================== Home Page Banner Widget ======================================
class home_advt_widget extends WP_Widget {
	function home_advt_widget() {
	//Constructor
		$widget_ops = array('classname' => 'widget text widget', 'description' => '' );		
		$this->WP_Widget('widget_home_advt', 'PT &rarr; Home Page Banner (Left)', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$link_title = empty($instance['link_title']) ? '' : apply_filters('widget_link_title', $instance['link_title']);
		$desc = empty($instance['desc']) ? '&nbsp;' : apply_filters('widget_desc', $instance['desc']);
 		    ?>						
            
        
             <h2 > <?php echo $title; ?> </h2>
            
             <?php echo $desc; ?>
 	     
             
             
              <?php if ( $link_title <> "" ) { ?>	
        		<a href="<?php echo get_settings('home'); ?>/?page=ads" class="normal_button alignleft"  >Carpooling for Safeway employees within the Bay Area.</a> 
         <?php } ?>
            
			<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);		
		$instance['desc'] = ($new_instance['desc']);
		$instance['link_title'] = ($new_instance['link_title']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'desc' => '', 'link_title' => '' ) );		
		$title = strip_tags($instance['title']);		
		$desc = ($instance['desc']);
		$link_title = ($instance['link_title']);
 ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>			
        <p><label for="<?php echo $this->get_field_id('desc'); ?>">Description Here : <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo attribute_escape($desc); ?></textarea></label></p>
        <p><label for="<?php echo $this->get_field_id('link_title'); ?>">Link Title: <input class="widefat" id="<?php echo $this->get_field_id('link_title'); ?>" name="<?php echo $this->get_field_name('link_title'); ?>" type="text" value="<?php echo attribute_escape($link_title); ?>" /></label></p>		
        
<?php
	}}
register_widget('home_advt_widget');


// =============================== Featured Posts Widget (particular category) ======================================

class LatestPosts extends WP_Widget {
	function LatestPosts() {
	//Constructor
		$widget_ops = array('classname' => 'widget Featured Posts', 'description' => 'List of Featured Posts' );
		$this->WP_Widget('widget_posts1', 'PT &rarr; Featured Posts', $widget_ops);
	}

	function widget($args, $instance) {
	// prints the widget
		global $General,$thumb_url;
		extract($args, EXTR_SKIP);
		echo $before_widget;
 		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
		$post_link = empty($instance['post_link']) ? '&nbsp;' : apply_filters('widget_post_link', $instance['post_link']);

		// if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		if($post_number == '')
		{
			$post_number = 5;	
		}
		global $General;
		$pt_exclude_cat = $General->get_feature_catid();
	?>           
               
     <div class="classified">
     <h3 > <?php echo $title; ?> </h3>
    <?php global $post; $page = 1; query_posts("cat=$pt_exclude_cat&showposts=$post_number&paged=$page"); while ( have_posts() ) : the_post()  ?>
    <?php 
	$post_images = get_post_meta($post->ID, 'post_images', $single = true);
	$mimg = '';
	if($post_images)
	{
		$post_images_arr = explode(',',$post_images);
	    $mimg = $post_images_arr[0];
		//$image_path1 = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
		$image_path1 = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
		if(!file_exists($image_path1) && get_option('upload_path'))
		{
			$src = str_replace("/files/", str_replace('wp-content','',get_option('upload_path'))."/", str_replace(get_option( 'siteurl' ),'',$mimg));
			$image_path1 = WP_CONTENT_DIR.$src ;	
		}
		if(file_exists($image_path1))
		{
			$mimg = $mimg;
		}else
		{
			$mimg = '';
		}
	}
	?>
    <div id="post-<?php the_ID(); ?>" class="listings" >test
      <?php if($mimg !== '') { ?>
      <?php
			$img_size = bdw_get_images_with_info($post->ID,'listing-thumb');
			$post_images = $img_size[0]['file'];
		?>
      <a  href="<?php the_permalink() ?>"> <img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgleft" /> </a>
      <?php } // end if statement
				// if there's not a thumbnail
				else { echo '<div class="imgnot_available" >No Image Available</div>'; } ?>
      </a>
      <h3> <a href="<?php the_permalink(); ?>"> <strong>
        <?php the_title(); ?>
        </strong></a></h3>
      <p class="time"><span class="i_clock alignleft"><?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?></span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
    </div>
    <?php endwhile; ?>
     
  </div>
  <!--classicfied end -->
                 
                 
                <?php


		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
 		$instance['post_number'] = strip_tags($new_instance['post_number']);
		$instance['post_link'] = strip_tags($new_instance['post_link']);
		return $instance;

	}

	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
		$post_number = strip_tags($instance['post_number']);
		$post_link = strip_tags($instance['post_link']);

?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Title:
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('post_number'); ?>">Number of posts:
    <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" />
  </label>
</p>
<?php
	}

}

register_widget('LatestPosts');


 // =============================== Advt 125x125px Widget ======================================
class TextWidget extends WP_Widget {
	function TextWidget() {
	//Constructor
		$widget_ops = array('classname' => 'widget Advt 125x125px', 'description' => 'Front Page Text Widget' );		
		$this->WP_Widget('widget_text', 'PT &rarr; Advt 125x125px', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$advt1 = empty($instance['advt1']) ? '' : apply_filters('widget_advt1', $instance['advt1']);
		$advt_link1 = empty($instance['advt_link1']) ? '' : apply_filters('widget_advt_link1', $instance['advt_link1']);
		$advt2 = empty($instance['advt2']) ? '' : apply_filters('widget_advt2', $instance['advt2']);
		$advt_link2 = empty($instance['advt_link2']) ? '' : apply_filters('widget_advt_link2', $instance['advt_link2']);
		 ?>						

 
      		 <h3><?php echo $title; ?> </h3> 
         
      <div class="advt">
        <?php if ( $advt1 <> "" ) { ?>	
         <a href="<?php echo $advt_link1; ?>"><img src="<?php echo $advt1; ?> " alt="" /></a>
         <?php } ?>
         
         <?php if ( $advt2 <> "" ) { ?>	
         <a href="<?php echo $advt_link2; ?>"><img src="<?php echo $advt2; ?> " alt="" /></a>
         <?php } ?>
		
       </div>
              
	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['advt1'] = ($new_instance['advt1']);
		$instance['advt_link1'] = ($new_instance['advt_link1']);
		$instance['advt2'] = ($new_instance['advt2']);
		$instance['advt_link2'] = ($new_instance['advt_link2']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'advt1' => '', 'advt_link1' => '', 'advt2' => '', 'advt_link2' => '' ) );		
		$title = strip_tags($instance['title']);
		$advt1 = ($instance['advt1']);
		$advt_link1 = ($instance['advt_link1']);
		$advt2 = ($instance['advt2']);
		$advt_link2 = ($instance['advt_link2']);			
?>
 <p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p> 
     
 <p> <label for="<?php echo $this->get_field_id('advt1'); ?>">Advt 1 Image Path (ex.http://pt.com/images/banner.jpg)
    <input class="widefat" id="<?php echo $this->get_field_id('advt1'); ?>" name="<?php echo $this->get_field_name('advt1'); ?>" type="text" value="<?php echo attribute_escape($advt1); ?>" />
  </label> </p>
<p>  <label for="<?php echo $this->get_field_id('advt_link1'); ?>">Advt 1 link 
    <input class="widefat" id="<?php echo $this->get_field_id('advt_link1'); ?>" name="<?php echo $this->get_field_name('advt_link1'); ?>" type="text" value="<?php echo attribute_escape($advt_link1); ?>" />
  </label>
</p>
 <p> <label for="<?php echo $this->get_field_id('advt2'); ?>">Advt 2 Image Path (ex.http://pt.com/images/banner.jpg)
    <input class="widefat" id="<?php echo $this->get_field_id('advt2'); ?>" name="<?php echo $this->get_field_name('advt2'); ?>" type="text" value="<?php echo attribute_escape($advt2); ?>" />
  </label> </p>
<p>  <label for="<?php echo $this->get_field_id('advt_link2'); ?>">Advt 2 link 
    <input class="widefat" id="<?php echo $this->get_field_id('advt_link2'); ?>" name="<?php echo $this->get_field_name('advt_link2'); ?>" type="text" value="<?php echo attribute_escape($advt_link2); ?>" />
  </label>
</p>
<?php
	}}
register_widget('TextWidget');



 // =============================== Advt 300x250px Widget ======================================
class advt_widget extends WP_Widget {
	function advt_widget() {
	//Constructor
		$widget_ops = array('classname' => 'widget Advt 300x250px', 'description' => 'Front Page Text Widget' );		
		$this->WP_Widget('widget_text2', 'PT &rarr; Advt 300x250px', $widget_ops);
	}
	function widget($args, $instance) {
	// prints the widget
		extract($args, EXTR_SKIP);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$advt1 = empty($instance['advt1']) ? '' : apply_filters('widget_advt1', $instance['advt1']);
		$advt_link1 = empty($instance['advt_link1']) ? '' : apply_filters('widget_advt_link1', $instance['advt_link1']);
		$advt2 = empty($instance['advt2']) ? '' : apply_filters('widget_advt2', $instance['advt2']);
		$advt_link2 = empty($instance['advt_link2']) ? '' : apply_filters('widget_advt_link2', $instance['advt_link2']);
		 ?>						

 
      	<?php /*?>	 <h3><?php echo $title; ?> </h3> <?php */?>
         
      <div class="advt">
        <?php if ( $advt1 <> "" ) { ?>	
         <a href="<?php echo $advt_link1; ?>"><img src="<?php echo $advt1; ?> " alt="" /></a>
         <?php } ?>
        </div>
              
	<?php
	}
	function update($new_instance, $old_instance) {
	//save the widget
		$instance = $old_instance;		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['advt1'] = ($new_instance['advt1']);
		$instance['advt_link1'] = ($new_instance['advt_link1']);
		$instance['advt2'] = ($new_instance['advt2']);
		$instance['advt_link2'] = ($new_instance['advt_link2']);
		return $instance;
	}
	function form($instance) {
	//widgetform in backend
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'advt1' => '', 'advt_link1' => '', 'advt2' => '', 'advt_link2' => '' ) );		
		$title = strip_tags($instance['title']);
		$advt1 = ($instance['advt1']);
		$advt_link1 = ($instance['advt_link1']);
		$advt2 = ($instance['advt2']);
		$advt_link2 = ($instance['advt_link2']);			
?>
<?php /*?> <p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p> <?php */?>
     
 <p> <label for="<?php echo $this->get_field_id('advt1'); ?>">Advt Image Path (ex.http://pt.com/images/banner.jpg)
    <input class="widefat" id="<?php echo $this->get_field_id('advt1'); ?>" name="<?php echo $this->get_field_name('advt1'); ?>" type="text" value="<?php echo attribute_escape($advt1); ?>" />
  </label> </p>
<p>  <label for="<?php echo $this->get_field_id('advt_link1'); ?>">Advt link 
    <input class="widefat" id="<?php echo $this->get_field_id('advt_link1'); ?>" name="<?php echo $this->get_field_name('advt_link1'); ?>" type="text" value="<?php echo attribute_escape($advt_link1); ?>" />
  </label>
</p>

<?php
	}}
register_widget('advt_widget');






// =============================== Flickr widget ======================================

function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
			
        <h3 class="hl"><span><span class="flickr-logo">flick<b>r</b></span> photostream</span></h3>
				
		<div class="fix"></div>
            			
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>  
		
		<div class="fix"></div>
		
</div>		

<?php
}
function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('PT &rarr; Flickr Photos', 'flickrWidget');
register_widget_control('PT &rarr; Flickr Photos', 'flickrWidgetAdmin', 250, 200);



// =============================== Popular Posts Widget ======================================

function PopularPostsSidebar()
{

    $settings_pop = get_option("widget_popularposts");

	$name = $settings_pop['name'];
	$number = $settings_pop['number'];
	if ($name <> "") { $popname = $name; } else { $popname = 'Popular Posts'; }
	if ($number <> "") { $popnumber = $number; } else { $popnumber = '10'; }

?>

<div class="widget popular">

	<h3 >  <?php echo $popname; ?></h3>
	
		<ul  class="postlist">
			 
			<?php
			global $wpdb;
            $now = gmdate("Y-m-d H:i:s",time());
            $lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
            $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
            $posts = $wpdb->get_results($popularposts);
            $popular = '';
            if($posts){
                foreach($posts as $post){
	                $post_title = stripslashes($post->post_title);
		               $guid = get_permalink($post->ID);
					   
					      $first_post_title=substr($post_title,0,26);
            ?>
		        <li>
                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $first_post_title; ?></a>
                    <br style="clear:both" />
                </li>
            <?php } } ?>

		</ul>
</div>

<?php
}
function PopularPostsAdmin() {

	$settings_pop = get_option("widget_popularposts");

	// check if anything's been sent
	if (isset($_POST['update_popular'])) {
		$settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
		$settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

		update_option("widget_popularposts",$settings_pop);
	}

	echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="'.$settings_pop['name'].'" /></label></p>';
	echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="'.$settings_pop['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';

}

register_sidebar_widget('PT &rarr;Popular Classifieds', 'PopularPostsSidebar');
register_widget_control('PT &rarr;Popular Classifieds', 'PopularPostsAdmin', 250, 200);


/*
 * Create the templatic twiter post widget
 */	

// Display Twitter messages
function templatic_twitter_messages($options) {
	
	// CHECK OPTIONS
	
	if ($options['username'] == '') {
		return __('Twitter username not configured','templatic');
	} 
	
	if (!is_numeric($options['num']) or $options['num']<=0) {
		return __('Number of tweets not valid','templatic');
	}

	// SET THE NUMBER OF ITEMS TO RETRIEVE - IF "SKIP TEXT" IS ACTIVE, GET MORE ITEMS
	$max_items_to_retrieve = $options['num'];
	if ($options['skip_text']!='') {
		$max_items_to_retrieve *= 3;
	}
	
	// USE TRANSIENT DATA, TO MINIMIZE REQUESTS TO THE TWITTER FEED
	
	$timeout = 30 * 60; //30m
	$error_timeout = 5 * 60; //5m
	$no_cache_timeout = 60 * 60 * 24 * 365 * 10; //10 years should be fine...
	
	$transient_name = 'twitter_data_'.$options['username'].$options['skip_text'].'_'.$options['num'];
    
    $twitter_data = get_transient($transient_name);
    $twitter_status = get_transient($transient_name."_status");
    
	// Twitter Status
    if(!$twitter_status || !$twitter_data) {
        $json = wp_remote_get('http://api.twitter.com/1/account/rate_limit_status.json');
		$twitter_status = json_decode($json['body'], true);
        
		set_transient($transient_name."_status", $twitter_status, $no_cache_timeout);
    }
	//echo "<!-- Twitter status: ".print_r($twitter_status,true)." -->";
    $reset_seconds = (strtotime($twitter_status['reset_time'])-time());
    
    
	// Tweets
	if (!$twitter_data) {

		//echo "\n<!-- Fetching data from Twitter... -->";                            /* Debug Stuff */
		
		if($twitter_status['remaining_hits'] <= 7) {
		    $timeout = $reset_seconds;
		    $error_timeout = $timeout;
		}		
	    
        
		$json = wp_remote_get('http://api.twitter.com/1/statuses/user_timeline.json?screen_name='.$options['username'].'&count='.$max_items_to_retrieve);
 		if( is_wp_error( $json ) ) {
			return __('Error retrieving tweets','templatic');
		} else {
			$twitter_data = json_decode($json['body'], true);
                        
            if(!isset($twitter_data['error']) && (count($twitter_data) == $options['num']) ) {
			    set_transient($transient_name, $twitter_data, $timeout);
			    set_transient($transient_name."_valid", $twitter_data, $no_cache_timeout);
            } else {
			    set_transient($transient_name, $twitter_data, $error_timeout);	// Wait 5 minutes before retry
	            echo "\n<!-- Twitter error: ".$twitter_data['error']." -->";          /* Debug Stuff */
		    }
		}
	} else {		
		if(isset($twitter_data['error'])) {
	        echo "\n<!-- Twitter error: ".$twitter_data['error']." -->";              /* Debug Stuff */
		} 
	}
    
	$items_retrieved = count($twitter_data); 
    
	if (empty($twitter_data) and false === ($twitter_data = get_transient($transient_name."_valid"))) {
	    return __('No public tweets','templatic');
	}

	if (isset($twitter_data['errors'])) {
		// STORE ERROR FOR DISPLAY
		$twitter_error = $twitter_data['errors'];
	    if(false === ($twitter_data = get_transient($transient_name."_valid"))) {
			$debug = ($options['debug']) ? '<br /><i>Debug info:</i> ['.$twitter_error[0]['code'].'] '.$twitter_error[0]['message'].' - username: "'.$options['username'].'"' : '';
		    return __('Unable to get tweets'.$debug,'templatic');
		}
	}
	
	// SET THE MAX NUMBER OF ITEMS  
	$num_items_shown = $options['num'];
	if ($items_retrieved<$options['num']) {
		$num_items_shown = $items_retrieved;
	}
	
	$link_target = ($options['link_target_blank']) ? ' target="_blank" ' : '';
		
	$out = '<ul id="twitter_update_list">';

	$i = 0;
	foreach($twitter_data as $message){
		if ($i>=$num_items_shown) {
			break;
		}
		$msg = $message['text'];
		$flag = 0;
		if(strpos($msg, "http://") !== false){
			$flag = 1;
			$mylink = explode("http",$msg);
		}
		if($flag==1){
			$subtract_link = explode(" ",$mylink[1]);
			$exact_link = 'http'.$subtract_link[0];
			$msg = substr($msg,0,strpos($msg, "http://"));
		}
		if ($options['skip_text']!='' and strpos($msg, $options['skip_text'])!==false) {
			continue;
		}
		$msg = utf8_encode($msg);
				
		$out .= '<li>';

		if ($options['hyperlinks']) { 
			// match protocol://address/path/file.extension?some=variable&another=asf%
			$msg = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);
			// match www.something.domain/path/file.extension?some=variable&another=asf%
			$msg = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);    
			// match name@address
			$msg = preg_replace('/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i',"<a href=\"mailto://$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);
			//NEW mach #trendingtopics
			//$msg = preg_replace('/#([\w\pL-.,:>]+)/iu', '<a href="http://twitter.com/#!/search/\1" class="twitter-link">#\1</a>', $msg);
			//NEWER mach #trendingtopics
			$msg = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="http://twitter.com/#!/search/%23\2" class="twitter-link" '.$link_target.'>#\2</a>', $msg);
		}
		if ($options['twitter_users'])  { 
			$msg = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\" ".$link_target.">@$2</a>$3 ", $msg);
		}
          					
		$link = 'http://twitter.com/#!/'.$options['username'].'/status/'.$message['id_str'];
		if($options['linked'] == 'all')  { 
			$msg = '<a href="'.$link.'" class="twitter-link" '.$link_target.'>'.$msg.'</a>';  // Puts a link to the status of each tweet 
		} else if ($options['linked'] != '') {
			$msg = $msg . ' <a href="'.$link.'" class="twitter-link" '.$link_target.'>'.$options['linked'].'</a>'; // Puts a link to the status of each tweet
		} 
		$out .= $msg;
		if($flag==1){$out .= '<br/><a href="'.$exact_link.'" target="_blank" class="twitter-link" >'.$exact_link.'</a>';}
		$out .= '<span class="twit_time" style="display: block;">'.time_elapsed_string(strtotime($message['created_at'])).'</span>';
		$out .= '</li>';
		$i++;
	}
	$out .= '</ul>';
	
	if ($options['link_user']) {
		$out .= '<div class="rstw_link_user"><a href="http://twitter.com/' . $options['username'] . '" '.$link_target.'>'.$options['link_user_text'].'</a></div>';
	}
	
	return $out;
}

//Function to convert date to time ago format
//eg.1 day ago, 1 year ago, etc...
function time_elapsed_string($ptime) {
    $etime = time() - $ptime;
    
    if ($etime < 1) {
        return __('0 seconds','templatic');
    }
    
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return __($r . ' ' . $str . ($r > 1 ? 's' : '').' ago','templatic');
        }
    }
}
//Function to convert date to time ago format




/**
 * Widget_Twidget Class
 */
class Widget_Twidget extends WP_Widget {
	private /** @type {string} */ $languagePath;

    /** constructor */
    function Widget_Twidget() {
		$this->options = array(
			array(
				'name'	=> 'title',
				'label'	=> __( 'Title', 'templatic' ),
				'type'	=> 'text'
			),			
			array(
				'name'	=> 'username',
				'label'	=> __( 'Twitter Username', 'templatic' ),
				'type'	=> 'text'
			),
			array(
				'name'	=> 'num',
				'label'	=> __( 'Show # of Tweets', 'templatic' ),
				'type'	=> 'text'
			),
			array(
				'name'	=> 'follow_text',
				'label'	=> __( 'Twitter button text <small>(for eg. Follow us, Join me on Twitter, etc.)</small>', 'templatic' ),
				'type'	=> 'text'
			),
				
			
		);

        $widget_ops = array('classname' => 'widget Templatic twitter', 'description' => __('Show your latest tweets on your site.') );
		$this->WP_Widget('Widget_Twidget', __('PT &rarr; Latest Twitter Feeds'), $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$username = apply_filters('widget_title', $instance['username']);
		$follow_text = apply_filters('widget_title', $instance['follow_text']);
		echo $before_widget;
		echo '<div class="twitter clearfix">';
		if ( $title ) {
			$title_icon = ($instance['title_icon']) ? '<img src="'.WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)).'/twitter_small.png" alt="'.$title.'" title="'.$title.'" /> ' : '';
			if ( $instance['link_title'] === true ) {
				$link_target = ($instance['link_target_blank']) ? ' target="_blank" ' : '';
				echo $before_title . '<a href="http://twitter.com/' . $instance['username'] . '" class="twitter_title_link" '.$link_target.'>'. $title_icon . $instance['title'] . '</a>' . $after_title;
			} else {
				echo '<h3 class="twitter_icon">' . $title_icon . $instance['title'] . '</h3>';
			}
		}
		echo '<div class="twitter_post"><div id="twitter">';
		echo templatic_twitter_messages($instance);
		if($follow_text){
            echo '<a class="twitter" href="http://www.twitter.com/'.$username.'/" title="'.$follow_text.'"><strong>'.$follow_text.'</strong></a>' ;
		}
		echo '</div> </div></div>';
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		
		foreach ($this->options as $val) {
			if ($val['type']=='text') {
				$instance[$val['name']] = strip_tags($new_instance[$val['name']]);
			} else if ($val['type']=='checkbox') {
				$instance[$val['name']] = ($new_instance[$val['name']]=='on') ? true : false;
			}
		}
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		if (empty($instance)) {
			$instance['title']			= __( 'Live Tweet', 'templatic' );			
			$instance['username']		= 'templatic';
			$instance['num']			= '5';			
			$instance['follow_text']	= __('Follow Us On Twitter','templatic');
			
		}					
	
		foreach ($this->options as $val) {
			$label = '<label for="'.$this->get_field_id($val['name']).'">'.$val['label'].'</label>';
			if ($val['type']=='separator') {
				echo '<hr />';
			} else if ($val['type']=='text') {
				echo '<p>'.$label.'<br />';
				echo '<input class="widefat" id="'.$this->get_field_id($val['name']).'" name="'.$this->get_field_name($val['name']).'" type="text" value="'.esc_attr($instance[$val['name']]).'" /></p>';
			} else if ($val['type']=='checkbox') {
				$checked = ($instance[$val['name']]) ? 'checked="checked"' : '';
				echo '<input id="'.$this->get_field_id($val['name']).'" name="'.$this->get_field_name($val['name']).'" type="checkbox" '.$checked.' /> '.$label.'<br />';
			}
		}
		echo "<p>Please use this widget <b>once per page</b> only. As it will not display tweet for more than one ID on same page.</p>";
	}

} // class Widget_Twidget

// register Widget_Twidget widget
add_action('widgets_init', create_function('', 'return register_widget("Widget_Twidget");'));

?>