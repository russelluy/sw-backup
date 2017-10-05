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
	$indexfile = $General->get_index_settings();
	include (TEMPLATEPATH . "/library/includes/$indexfile");
}
?>