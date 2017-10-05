<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script> var closebutton='<?php bloginfo('template_directory'); ?>/library/js/closebox.png'; </script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/fancyzoom.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/library/css/thickbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

	$('div.photo a').fancyZoom({scaleImg: true, closeOnClick: true});

	$('#medium_box_link').fancyZoom({width:400, height:300});

	$('#large_box_link').fancyZoom();

	$('#flash_box_link').fancyZoom();

});

</script>
<div id="page">
<div id="content-wrap" class="clear" >
<div id="content" class="content-in-detail" >
  <?php

$post_images = get_post_meta($post->ID, 'post_images', $single = true);

$owner_name = get_post_meta($post->ID, 'owner_name', $single = true);

$owner_email = get_post_meta($post->ID, 'owner_email', $single = true);

$owner_phone = get_post_meta($post->ID, 'owner_phone', $single = true);

$post_location = get_post_meta($post->ID, 'post_location', $single = true);
$geo_latitude = get_post_meta($post->ID, 'geo_latitude', $single = true);
$geo_longitude = get_post_meta($post->ID, 'geo_longitude', $single = true);

$post_url = get_post_meta($post->ID, 'post_url', $single = true);

$post_images_arr = explode(',',$post_images);

$mimg = $post_images_arr[0];

$tagsarr = get_the_tags($post->ID);

$tags = array();

if($tagsarr)

{

	foreach($tagsarr as $key=>$val)

	{

	$tags[] = '<a href="#">'.$val->name.'</a>';

	}

	$post_tags = implode(',',$tags);

}

?>
  <!--post title-->
  <div class="listings bnone">
    <h1  class="title" id="post-<?php the_ID(); ?>">
      <?php the_title(); ?>
    </h1>
    <p class="time clearfix"><span class="i_clock alignleft">
      <?php the_time('j F, Y') ?>
      at
      <?php the_time('g:i a') ?>
      </span>
      <?php if(function_exists('the_views')) { the_views(); } ?>
      in
      <?php the_category(' / ') ?>
    </p>
    <div class="details_left">
      <?php if($mimg !== ''){?>
       <?php
			$img_size = bdw_get_images_with_info($post->ID,'singlepage-thumb');
			$post_images = $img_size[0]['file'];
		?>
      <div class="photo photo_main"  ><a href="#productimage"><img src="<?php echo $post_images;?>" alt=""/></a></div>
      <div style="display: none;" id="productimage" > <img src="<?php echo $mimg; ?>" alt="helmet"> </div>
      <?php }else
            {
            ?>
      <div class="imgnot_available2" ><?php _e('No Image Available');?></div>
      <?php
            }
            ?>
      <?php 
           if(count($post_images_arr)>1)
			{ 
			?>
      <?php
				for($i=1;$i<count($post_images_arr);$i++)
				{
					$mimg = $post_images_arr[$i];
					$image_path = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
					if(!file_exists($image_path) && get_option('upload_path'))
					{
						$src = str_replace("/files/", str_replace('wp-content','',get_option('upload_path'))."/", str_replace(get_option( 'siteurl' ),'',$mimg));
						$image_path = WP_CONTENT_DIR.$src ;	
					}
					if(file_exists($image_path))
					{
			?>
             <?php
			$img_size = bdw_get_images_with_info($post->ID,'latestpost-thumb');
			$post_images = $img_size[0]['file'];
		?>
      <div class="photo" style="none; border:1px solid #ccc;" > <a href="#productimage<?php echo $i;?>"><img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgdetails" /></a>
        <div style="display: none;" id="productimage<?php echo $i;?>" > <img src="<?php echo $mimg; ?>" alt="helmet"> </div>
      </div>
      <?php
					}				
				}			
			}
			?>
    </div>
    <!--details left-->
    <div class="details_right">
      
      <!--pcontactinfo end -->
      <?php if($mimg !== '') { ?>
      <?php } else { echo ''; } ?>
      <?php 
	  echo stripslashes($post->post_content);
	  //the_content('continue'); ?>
    </div>
	<div class="pcontactinfo">
        <h3>
          <?php _e(CONTACT_DETAILS_TEXT);?>
        </h3>
        <h4><a href="<?php echo get_option( 'siteurl' );?>/?page=latest&aut=<?php echo $post->post_author;?>"><?php echo $owner_name; ?></a></h4>
        <?php
		if($General->is_show_contact_email())
		{
        if($owner_email)
		{
		?>
        <p class="i_mail2 clearfix"> <span>
          <?php _e(EMAIL_TEXT);?>
          : </span> <span class="contact_right"><a href="mailto:<?php echo $owner_email;?>"><?php echo $owner_email;?></a></span> </p>
        <?php }

		 }
		 if($owner_phone)

		 {

		 ?>
        <p class="i_phone clearfix "><span>
          <?php _e(PHONE_NUMBER_TEXT);?>
          :</span> <span class="contact_right"><?php echo $owner_phone;?></span></p>
        <?php

        }

		 if($post_location)

		 {

		?>
        <p class="i_map clearfix"><span>
          <?php _e(LOCATION_TEXT);?>
          :</span> <span class="contact_right"><?php echo $post_location;?></span></p>
        <?php 

		}

		 if($post_url)

		 {

		?>
        <p class="i_website clearfix"><span>
          <?php _e(URL_SINGLE_TEXT);?>
          :</span> <span class="contact_right"><a href="<?php echo $post_url;?>" target="_blank"><?php echo $post_url;?></a></span></p>
        <?php

         }

		 ?>
        <?php include (TEMPLATEPATH . "/library/includes/send_inquiry.php");?>
      </div>
    <div class="twosection">
      <?php if($features !== ''){ ?>
<?php /*?>      <iframe id="map_ifram" name="map_ifram" scrolling="no" frameborder="0" style="border:none; width:645px; padding-left:250px; height:280px;" src="<?php echo get_option('siteurl')."/?page=map&pid=".$post->ID;?>"></iframe><?php */?>
<?php $post_location = get_post_meta($post->ID, 'post_location', $single = true);?>
      <?php if($geo_longitude &&  $geo_latitude){
				preview_address_google_map($geo_latitude,$geo_longitude,$post_location);
			 }else{?>
            <iframe src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $post_location;?>&ie=UTF8&z=14&iwloc=A&output=embed" height="358" width="645" style="border:none; width:645px; padding-left:250px; height:280px;" ></iframe>
            <?php }?>
<?php /*?> <iframe name="map_ifram" scrolling="no" frameborder="0" style="border:none; width:645px; padding-left:250px; height:280px;" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $post_location;?>&amp;ie=UTF8&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><?php */?>      
      
      <?php echo $features; ?>
      <?php } else { echo ''; } ?>
    </div>
    <!--two section end -->
    <div class="post_bottom">
      <?php if($post_tags)

		   {

		?>
      <span class="i_tags">
      <?php echo $post_tags;?> </span>
      <?php

		   }

          ?>
      <?php include (TEMPLATEPATH . "/library/includes/email_friend.php");?>
      <span class="i_print"><a href="#" onclick="window.print();return false;" >Print This Post</a></span> </div>
    <div class="post_navigation">
      <div class="alignleft">
        <?php previous_post_link(' %link','&laquo; Previous') ?>
      </div>
      <div class="alignright">
        <?php next_post_link('%link ','Next &raquo;') ?>
      </div>
    </div>
    <div class="googleads">
      <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(8)) ) { // Show on the front page ?>
      <?php dynamic_sidebar(8); ?>
      <?php } ?>
    </div>
    <div id="comments_wrap">
      <?php comments_template(); ?>
    </div>
    <!--single.php end-->
  </div>
</div>
