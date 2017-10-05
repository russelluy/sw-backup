<?php
if(!$current_user->data->ID)
{
	wp_redirect(get_settings('home').'/index.php?page=login');
	exit;
}
global $General;
?>
<?php get_header(); ?>

<div id="page">
<div id="content-wrap" class="clear" >
<div id="content">
  <div class="newlisting">
    <h1><?php _e(DASHBOARD_TEXT);?></h1>
    <?php
    if($_REQUEST['msg']=='success')
	{
		_e(ADS_UPDATED_SUCCESS_MSG);
	}else
	if($_REQUEST['msg']=='dsuccess')
	{
		_e(ADS_DELETED_SUCCESS_MSG);
	}
	
	?>
    <h4 class="dash_title"> <?php _e(CLASSIFIED_FOR_YOU_TEXT);?> <span>( <a href="<?php echo get_settings('home'); ?>/index.php?page=ads" ><?php _e(CREATE_NEW_ADS_TEXT);?></a> ) </span> </h4>
    
    <?php

if($_SESSION['session_message'])

{

	echo '<p>'.$_SESSION['session_message'].'</p>';

	$_SESSION['session_message'] = '';

}

?>
    <?php 

if (have_posts())
{

	$userID =  $current_user->data->ID;
	$blogCategoryIdStr = get_inc_categories("cat_exclude_");
	$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
	$blogcag_arr = array();
	for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
	{
		if($blogCategoryIdStr_arr[$i])
		{
			$blogcag_arr[] = $blogCategoryIdStr_arr[$i];
		}
	}
	$blogCategoryIdStr = implode(',-',$blogcag_arr);
	$querypost = "author=$userID";

	$querypost .= "&post_status=draft,publish&cat=-$blogCategoryIdStr";

	$sorttype = $_REQUEST['oby'];
	
	if($_REQUEST['ord'] == 'title')

	{

		$querypost .= "&orderby=title&order=$sorttype";

		

	}elseif($_REQUEST['ord'] == 'price')

	{

		$querypost .= "&orderby=meta_value&meta_key=post_price&order=$sorttype";

	}

	elseif($_REQUEST['ord'] == 'loc')

	{

		$querypost .= "&orderby=meta_value&meta_key=post_location&order=$sorttype";

	}

	elseif($_REQUEST['ord'] == 'dt')

	{

		$querypost .= "&orderby=date&order=$sorttype";

	}
	////change on 27 - feb - 2010 start//
	$totalpost_count = 0;
	$limit = 1000;
	$querypost1 = $querypost . '&showposts=' . $limit;
	query_posts($querypost1);
	if(have_posts())
	{
		while(have_posts())
		{
			 the_post();
			$totalpost_count++;
		}
	}
	global $posts_per_page,$paged;
	$limit = $posts_per_page;
	$querypost .= 'showposts=' . $limit . '&paged=' . $paged;
	query_posts($querypost);
	//// change on 27 - feb - 2010 END//
////////POST LISTING START///////	

include (TEMPLATEPATH . "/library/includes/post_listing.php");

///////POST LISGINT END/////////
if(function_exists('wp_pagenavi') && $totalpost_count>0) 
{
?>
  <div class="wp-pagenavi">
    <?php wp_pagenavi();  ?>
  </div>
<?php 
	}
}

?>
  </div>
</div>
<?php // get_sidebar(); ?>
<!-- sidebar #end -->
<?php 

$user_address_info = unserialize($current_user->data->user_address_info);

$user_add = array();

if($user_address_info['user_add1'])

{

	$user_add[] = $user_address_info['user_add1'];

}

if($user_address_info['user_add2'])

{

	$user_add[] = $user_address_info['user_add2'];

}

if($user_address_info['user_city'])

{

	$user_add[] = $user_address_info['user_city'];

}

if($user_address_info['user_state'])

{

	$user_add[] = $user_address_info['user_state'];

}

if($user_address_info['user_country'])

{

	$user_add[] = $user_address_info['user_country'];

}

$user_email = $current_user->data->user_email;

$user_postalcode = $user_address_info['user_postalcode'];

$user_phone = $user_address_info['user_phone'];

$display_name = $current_user->data->display_name;

$user_web = $current_user->data->user_url;

$display_name_arr = explode(' ',$display_name);

$user_fname = $display_name_arr[0];

$user_lname = $display_name_arr[2];

$address_info = implode(',',$user_add);



?>
<div class="pcontactinfo pcontactinfo2">
  <h3>
    <?php _e(MY_PROFILE_TEXT);?>
    (<a href="<?php echo get_settings('home'); ?>/?page=profile"><?php _e(EDIT_PROFILE_TEXT);?></a>)</h3>
  <h4><?php echo $display_name; ?></h4>
  <?php

        if($user_email)

		{

		?>
  <p class="i_mail2 clearfix"> <span>
    <?php _e(EMAIL_TEXT);?>
    : </span> <span  class="contact_right" ><a href="mailto:<?php echo $user_email;?>"><?php echo $user_email;?></a> </span></p>
  <?php }

		 if($user_phone)

		 {

		 ?>
  <p class="i_phone clearfix"><span>
    <?php _e(PHONE_NUMBER_TEXT);?>
    :</span> <span  class="contact_right" ><?php echo $user_phone;?></span></p>
  <?php

        }

		 if($address_info)

		 {

		?>
  <p class="i_map clearfix"><span>
    <?php _e(LOCATION_TEXT);?>
    :</span> <span  class="contact_right" ><?php echo $address_info;?> </span> </p>
  <?php 

		}

		 if($user_web)

		 {

		?>
  <p class="i_website clearfix"><span>
    <?php _e(URL_SINGLE_TEXT);?>
    :</span> <span  class="contact_right" ><a href="<?php echo $user_web;?>" target="_blank"><?php echo $user_web;?></a></span></p>
  <?php

         }

		 ?>
</div>
<!--pcontactinfo end -->
<?php get_footer(); ?>
<!-- footer #end -->
