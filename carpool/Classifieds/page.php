<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<?php
/*
Template Name: Home2
*/
?>
<?php
if($_REQUEST['page'] == 'register' || $_REQUEST['page'] == 'login')
{
	include (TEMPLATEPATH . "/library/includes/registration.php");
}
elseif($_REQUEST['page'] == 'ads')
{
	include (TEMPLATEPATH . "/library/includes/tpl_createclassified.php");
}
elseif($_REQUEST['page'] == 'delete')
{
	include (TEMPLATEPATH . "/library/includes/delete_ads.php");
}
elseif($_REQUEST['page'] == 'adsview')
{
	include (TEMPLATEPATH . "/library/includes/adsview.php");
}
elseif($_REQUEST['page'] == 'paynow')
{
	include (TEMPLATEPATH . "/library/includes/paynow.php");
}
elseif($_REQUEST['page'] == 'cancel')
{
	include (TEMPLATEPATH . "/library/includes/cancel.php");
}
elseif($_REQUEST['page'] == 'return')
{
	include (TEMPLATEPATH . "/library/includes/return.php");
}
elseif($_REQUEST['page'] == 'ads_success')
{
	include (TEMPLATEPATH . "/library/includes/ordersuccess.php");
}
elseif($_REQUEST['page'] == 'ipn')
{
	include (TEMPLATEPATH . "/library/includes/ipn.php");
}
elseif($_REQUEST['page'] == 'dashboard')
{
	include (TEMPLATEPATH . "/library/includes/dashboard.php");
}
elseif($_REQUEST['page'] == 'profile')
{
	include (TEMPLATEPATH . "/library/includes/edit_profile.php");
}
elseif($_REQUEST['page'] == 'send_inqury')
{
	include (TEMPLATEPATH . "/library/includes/send_inquiry_frm.php");
}
elseif($_REQUEST['page'] == 'featured' || $_REQUEST['page'] == 'latest')
{
	include (TEMPLATEPATH . "/library/includes/catlisting.php");
}
elseif($_REQUEST['page'] == 'csvdl')
{
	
	include (TEMPLATEPATH . "/library/includes/csvdl.php");
}
elseif($_REQUEST['page'] == 'map')
{
	
	include (TEMPLATEPATH . "/library/includes/google_map.php");
}
elseif($_REQUEST['page'] == 'blog')
{
	
	include (TEMPLATEPATH . "/library/includes/blog_listing.php");
}
elseif($_REQUEST['page'] == 'email_frnd')
{
	include (TEMPLATEPATH . "/library/includes/email_friend_frm.php");
}
else
{
	?>
	<div id="page">
 <div id="content-wrap" class="clear" >

     
<div id="content">
  <div class="page_spacer"> 
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!--post title-->
      <h1   id="post-<?php the_ID(); ?>">
        <?php the_title(); ?>
      </h1>
      <!--post with more link -->
      <div class="clear">
        <?php the_content('<p class="serif">continue</p>'); ?>
      </div>
      <!--if you paginate pages-->
      <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
      <!--end of post and end of loop-->
      <?php endwhile; endif; ?>
 </div>  
</div>
<?php
}
?>



 <?php get_footer(); ?> <!-- footer #end -->