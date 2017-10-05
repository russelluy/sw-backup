<?php
	$generalinfo = $General->get_general_settings();
	while (have_posts())
	{
		the_post();
		$post_images='';
		$post_images = get_post_meta($post->ID, 'post_images', $single = true);
		$post_price = get_post_meta($post->ID, 'post_price', $single = true);
		$post_location = get_post_meta($post->ID, 'post_location', $single = true);
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
		if($_REQUEST['page']=='featured' || $_REQUEST['page']=='latest')
		{
			$guid = $post->guid;
		}else
		{
			$guid = get_option('siteurl')."/?page=ads&pid=".$post->ID;
		}
		$catinfoarr = get_the_category();
		$feature_class = '';
		for($c=0;$c<count($catinfoarr);$c++)
		{
			if($catinfoarr[$c]->term_id == $General->get_feature_catid())
			{
				$feature_class = 'feature_post"';
				break;
			}
		}
		if($_REQUEST['page']=='featured' || $_REQUEST['page']=='latest')
		{
			$guid = $post->guid;
		}else
		{
			$guid = get_option('siteurl')."/?page=ads&pid=".$post->ID;
		}
?>




<div id="post-<?php the_ID(); ?>" class="listings <?php echo $feature_class;?>" >
      <a  href="<?php the_permalink() ?>">  <?php if($mimg !== '') { 
	  
	  ?>
      <?php
			$img_size = bdw_get_images_with_info($post->ID,'listing-thumb');
			$post_images = $img_size[0]['file'];
		?>
     <img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgleft" /> </a>
      <?php } // end if statement
				// if there's not a thumbnail
				else { echo '<div class="imgnot_available" >'.__(NO_IMAGE_AVAILABLE_TEXT).'</div>'; } ?>  </a>
                
      <?php
      if($_REQUEST['page'] =='featured' || $_REQUEST['page']=='latest')
	  {
	  ?>
       <h2> <a href="<?php the_permalink(); ?>"> <strong>  <?php the_title(); ?>  </strong></a></h2>
      <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?> </span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
      <?php
	  }else{
	  ?>
      <h2> <a  href="<?php the_permalink() ?>"> <strong>  <?php the_title(); ?>  </strong></a>  
      (<a href="<?php echo $guid; ?>" class="edit" > <?php _e(EDIT_ADS_TEXT);?> </a>&nbsp; / &nbsp;<a href="<?php echo get_option('siteurl')."/?page=delete&pid=".$post->ID; ?>" class="edit" > <?php _e(DELETE_ADS_TEXT);?> </a>)</h2>
       <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
       <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong> <br  />
  		<span class="status"> <?php _e(STATUS_TEXT);?> : 
        <?php
        if($post->post_status == 'draft')
		{
		?>
        <strong class="expired"><?php _e(EXPIRED_STATUS_TEXT);?></strong> ( <a href="<?php echo get_option('siteurl');?>/?page=ads&type=renew&pid=<?php echo $post->ID?>"><?php _e(RENEW_POST_TEXT);?></a> )
        <?php
		}else
		{
		?>
        <strong class="active"><?php _e(ACTIVE_STATUS_TEXT);?></strong>
        <?php
		}
		?>
        </span>  </p> 
	  <?php }?>
      
    </div>
<?php
	}
?>