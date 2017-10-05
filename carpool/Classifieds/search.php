<?php get_header(); ?>

<div id="content-wrap" class="clear" >
 <div id="content">
  <!--the loop-->
  <?php if(is_home()){
  $page =(get_query_var('paged')) ? get_query_var ('paged') :".$pt_index_posts";
  query_posts("cat=$pt_exclude_news&showposts= $pt_index_posts&paged=$page");
  } ?>
  <?php  if (have_posts()) : ?>
  <h1>Search Results</h1>
  <!--loop article begin-->
  <?php while (have_posts()) : the_post(); ?>
   <?php 
   $mimg = get_post_meta($post->ID, 'post_images', $single = true);
   $post_images_arr = explode(',',$mimg);
	$mimg = $post_images_arr[0];
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
   ?>  
  <div id="post-<?php the_ID(); ?>" class="listings" >
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
    
    <h2> <a href="<?php the_permalink(); ?>"> <strong>
      <?php the_title(); ?>
      </strong></a></h2>
      
   <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?> </span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
     
  </div>
  <?php endwhile; ?>
  <div class="googleads">
     	  <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(7)) ) { // Show on the front page ?>
				<?php dynamic_sidebar(7); ?>  
         <?php } ?>
     </div>
  <!--page nav end -->
  
  
  <div class="wp-pagenavi">
    <?php wp_pagenavi();  ?>
  </div>

  
  <!-- do not delete-->
   <?php else : ?>
  <h3>Sorry, no posts matched your criteria.</h3>
  <p>Please try searching again here...</p>
  <div class="search404">
    <?php include(TEMPLATEPATH."/searchform.php");?>
  </div>
  <p><strong>Or, take a look at Archives and Categories</strong></p>
  <div class="category">
    <h2>
      <?php _e('Category'); ?>
    </h2>
    <ul>
      <?php wp_list_categories('orderby=name&title_li'); ?>
    </ul>
  </div>
  <div class="archives">
    <h2 class="sidebartitle">
      <?php _e('Archives'); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
  </div>
  <!--do not delete-->
  <?php endif; ?>
  <!--search.php end-->
</div>


<?php get_footer(); ?> <!-- footer #end -->
