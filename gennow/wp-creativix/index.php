<?php get_header(); ?>

<div id="wrapper">
  <div id="slide-wrapper">
    <div id="wngmission">
      <p class="wngmission">GenNow Employee Resource Group </p>
      <h1 class="thetitle3">Our Mission</h1>
      <p class="wngmission">is to inspire and give a voice to the next generation and future leaders, while bridging the gaps across Safeway's multi-generational culture. Through collaborative insight, mentoring, networking and developmental opportunities, GenNow will increase inter-generational understanding to drive better results for our employees, customers and company.</p>
    </div>
    <div id="wngpicture"><img src="/gennow/wp-content/uploads/2011/11/mission_image.jpg"></div>
    <ul id="slideshow">
      <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if (get_option('feat_cat')) {
	$category = get_option('feat_cat');
	} else {
	$category = 1;
	}
	query_posts("cat=1=$page");
	while ( have_posts() ) : the_post() ?>
      <li>
        <h3><a href="<?php the_permalink();?>" title="<?php _e("Permanent Link to"); ?>">
          <?php the_title();?>
          </a></h3>
        <span>
        <?php $values = get_post_custom_values("Featured"); if(isset($values)) { ?>
        <?php echo $values[0]; ?>
        <?php } else { ?>
        <?php bloginfo('template_directory'); ?>
        /images/add-feat.jpg
        <?php }?>
        </span>
        <p><span class="date">Published
          <?php the_time('j. F Y'); ?>
          at
          <?php the_time( $d ); ?>
          -
          <?php comments_number('No Comments','One Comment','% Comments'); ?>
          </span><br/>
          <br/>
          <?php $chars = get_option('front-chars');?>
          <?php the_slider_limit(300); ?>
        </p>
        <?php 
			$values = get_post_custom_values("Featured");
			$pathtemp = get_theme_root()."/wp-creativix";
			if(is_writeable($pathtemp)) {
			if(isset($values)) {
			?>
        <a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $values[0]; ?>&h=75&w=100&zc=1" alt=""> </a>
        <?php
			} else {
			?>
        <a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/add-feat.jpg&h=75&w=100&zc=1" alt=""> </a>
        <?php
			} 
			} elseif (isset($values)) {
			?>
        <a href="<?php the_permalink();?>"><img src="<?php echo $values[0]; ?>" width="100" height="75" alt=""> </a>
        <?php
			} else {
			?>
        <a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory'); ?>/images/add-feat.jpg" width="100" height="75" alt=""> </a>
        <?php
			}
			?>
      </li>
      <?php endwhile;?>
    </ul>
    <script type="text/javascript">
	$('slideshow').style.display='none';
	$('image-wrapper').style.display='block';
	var slideshow=new SLIDE.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=6;
		slideshow.link="linkhover";
		slideshow.info="text";
		slideshow.thumbs="fronter";
		slideshow.left="arrowleft";
		slideshow.right="arrowright";
		slideshow.scrollSpeed=2;
		slideshow.spacing=20;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
</script> 
  </div>
  <!-- The beginnning of the post. -->
  <div id="big-column">
    <div id="column-content">
    <h2 class="featurednews">Updates<a href="subscribe-via-email/"><img src="/gennow/wp-content/uploads/2011/11/subscribe.png"></a></h2>
      <div class="latest-posts">
        <h2><a href="#">Archive</a></h2>
        <span class="desc">
        <h3>Latest Articles from the Blog</h3>
        </span>
        <ul class="latest-posts">
          <?php $temp_query = $wp_query; ?>
          <?php query_posts('cat=1&showposts=8'); ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php $do_not_duplicate[$post->ID] = $post->ID; ?>
          <li><a href="<?php the_permalink();?>" title="<?php the_title();?>">
            <?php the_title();?>
            </a><span class="date">Published
            <?php the_time('F j, Y'); ?>
            at
            <?php the_time();?>
            </span></li>
          <?php endwhile; else: ?>
          <?php endif; ?>
        </ul>
      </div>
      <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if (get_option('home_cat')) {
	$category = get_option('home_cat');
	} else {
	$category = 1;
	}
query_posts("cat=1&showposts=2&paged=$page&caller_get_posts=1");
while ( have_posts() ) : the_post() ?>
      <div class="feat-post">
        <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>">
          <?php the_title();?>
          </a></h2>
        <span class="desc">
        <h3>Published
          <?php the_time('F j, Y'); ?>
          at
          <?php the_time();?>
          -
          <?php comments_number('No Comments','1 Comment','% Comments'); ?>
        </h3>
        </span>
	<?php the_content('read more ...'); ?>
        <?php $values = get_post_custom_values("Featured");
$pathtemp = get_theme_root()."/wp-creativix";
if(is_writeable($pathtemp)) {
if(isset($values)) {
?>
        <a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $values[0]; ?>&h=100&w=295&zc=1" alt=""> </a>
        <?php
} 
} elseif (isset($values)) {
?>
        <a href="<?php the_permalink();?>"><img src="<?php echo $values[0]; ?>" width="295" height="100" alt=""> </a>
        <?php
}
?>
      </div>
      <?php endwhile;?>
    </div>
  </div>
  <!-- The end of the post. -->
    <div id="idea">
    <div id="title4">
      <h2 class="title4">Message from Thom</h2>
    </div>
    <div id="para1">
<?php 
																	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
																	$temp = $wp_query;
																	$wp_query= null;
																	$wp_query = new WP_Query();
																	$wp_query->query("paged=$page&category_name='Message'&posts_per_page=1");
																	echo '<ul>';
																	while ($wp_query->have_posts()) : 
																		$wp_query->the_post();
																		echo '<li>' . $post->post_content . '</li>';
																	endwhile;
																	echo '</ul><div class="clear"></div>';
																	if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
																	$wp_query = null; $wp_query = $temp;
																	?>
  </div>    </div>
  <div id="idea2">
    <div id="title4">
      <h2 class="title4">Next Meeting</h2>
    </div>
        <div id="para1">
      <?php 
																	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
																	$temp = $wp_query;
																	$wp_query= null;
																	$wp_query = new WP_Query();
																	$wp_query->query("paged=$page&category_name='Meeting'&posts_per_page=1");
																	echo '<ul>';
																	while ($wp_query->have_posts()) : 
																		$wp_query->the_post();
																		echo '<li>' . $post->post_content . '</li>';
																	endwhile;
																	echo '</ul><div class="clear"></div>';
																	if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
																	$wp_query = null; $wp_query = $temp;
																	?>
     </div> </div>
  <div id="idea3">
    <div id="title4">
      <h2 class="title4">Video Commercials</h2>
    </div>
    <div id="member"><a href="http://video.safeway.com/viewerportal/safeway/home.vp?programId=esc_program%3A27092" target="_blank"><img src="/gennow/wp-content/uploads/2011/11/Bridging_Gaps.jpg" valign="center" align="center"/></a></div>
    <!--<div class="latest-posts">
      <h2><a href="#">Latest Articles</a></h2>
      <span class="desc">
      <h3>Latest Articles from the Blog</h3>
      </span>
      <ul class="latest-posts">
        <?php $temp_query = $wp_query; ?>
        <?php query_posts('cat=1&showposts=8'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $do_not_duplicate[$post->ID] = $post->ID; ?>
        <li><a href="<?php the_permalink();?>" title="<?php the_title();?>">
          <?php the_title();?>
          </a><span class="date">Published
          <?php the_time('F j, Y'); ?>
          at
          <?php the_time();?>
          </span></li>
        <?php endwhile; else: ?>
        <?php endif; ?>
      </ul>
    </div>--> 
  </div>
</div>
<?php get_footer(); ?>
