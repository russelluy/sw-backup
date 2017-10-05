<?php get_header(); ?>

<div id="page">
<div id="content-wrap" class="clear" >


<div id="banner">

<div class="index_left">

  <div class="advt_banner_index advt_banner_index_spacer advt_banner_index_bg2">
    <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(9)) ) { // Show on the front page ?>
			<?php dynamic_sidebar(9); ?>  
     <?php } ?>
   
  </div><!--advt_banner_index end -->
  
  
  
 <div id="category">
  <div class="ctitle">
    <h3>Categories</h3>
  </div>
  <ul class="category_list_index">
    <?php 
	$blogCategoryIdStr = get_inc_categories("cat_exclude_");
	$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
	$catid_arr = array();
	for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
	{
		if($blogCategoryIdStr_arr[$i])
		{
			$catid_arr[] = $blogCategoryIdStr_arr[$i];
		}
	}
	$blogCategoryIdStr = implode(',',$catid_arr);
	$sub_cat_show = $General->is_show_cat_only_home();
	if($sub_cat_show)
	{
		
	?>
	<style> .categories ul.children,.category_list_index li ul.children { display:none;   }  </style>
	<?php	
	 wp_list_categories("hide_empty=0&exclude=$blogCategoryIdStr&orderby=name&hierarchical=1&title_li=");
	}else
	{
	list_cats(FALSE, '', 'name','asc', '', TRUE, FALSE, FALSE, FALSE, TRUE, 1, FALSE, '', FALSE, FALSE, '', "$blogCategoryIdStr", '');
	}
	?>
  </ul>
</div>
  
</div> <!-- index left #end -->
  
  
  
  <div class="classified classified2">
    <h2>
     <?php
	global $General; 
	if($General->is_latest_listing_home())
	{
		_e(LATEST_CLASS_TEXT);
		$blogCategoryIdStr = get_inc_categories("cat_exclude_");
		$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
		$blogcatarr = array();
		for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
		{
			if($blogCategoryIdStr_arr[$i])
			{
				$blogcatarr[] = $blogCategoryIdStr_arr[$i];
			}
		}
		if($blogcatarr)
		{
			$blogcatstr = implode(',-',$blogcatarr);
		}
		$blogcatids = '-'.$blogcatstr;
		query_posts("cat=$blogcatids&showposts=6&paged=$page");
	}else
	{
		_e(FEATURE_CLASS_TEXT);
		$pt_exclude_cat = $General->get_feature_catid();
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		query_posts("cat=$pt_exclude_cat&showposts=6&paged=$page");
	}
	?>
	</h2>
    <?php 
	
	 while ( have_posts() ) : the_post()  ?>
    <?php 
	$post_images = get_post_meta($post->ID, 'post_images', $single = true);
	$mimg = '';
	if($post_images)
	{
		$post_images_arr = explode(',',$post_images);
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
      <h3> <a href="<?php the_permalink(); ?>"> <strong>
        <?php the_title(); ?>
        </strong></a></h3>
      <p class="time"><span class="i_clock alignleft"><?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?></span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
    </div>
    <?php endwhile; ?>
    
    <p class="slinks">
    <?php
    if($General->is_latest_listing_home())
	{
	?>
	<a href="<?php echo get_settings('home'); ?>/?page=latest" >view all</a></p>
    <?php
	}else
	{
	?>
    <a href="<?php echo get_settings('home'); ?>/?page=featured" >view all</a></p>
    <?php
	}
	?>
    
    
  </div>
  <!--classicfied end -->
  
  
</div>


<?php include (TEMPLATEPATH . "/footer_index.php"); ?>