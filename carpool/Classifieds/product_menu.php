<?php
/////////////////////////////////////////

// ************* Theme Options Page *********** //

add_action('admin_menu', 'mkt_add_product'); //Add new menu block to admin side

function mkt_add_product(){	
	//add_menu_page("Products", "Products", 8, 'product_menu.php', 'product_listing', get_option( 'siteurl' ).'/wp-content/themes/'.get_option( 'template' ).'/images/favicon.ico'); // title of new sidebar
	add_menu_page("Classified", "Classified", 8, 'product_menu.php', 'post_listing', get_option( 'siteurl' ).'/wp-content/themes/'.get_option( 'template' ).'/images/favicon.ico'); // title of new sidebar
	add_submenu_page('product_menu.php', "Design Settings", "Design Settings", 8, 'theme_settings', 'theme_settings');
	add_submenu_page('product_menu.php', "Manage Category Price", "Category Price", 8, 'category', 'manage_category');
	add_submenu_page('product_menu.php', "Motifications", "Notifications", 8, 'notification', 'notification');
	add_submenu_page('product_menu.php', "Manage Coupon", "Manage Coupon", 8, 'managecoupon', 'manage_coupon'); // sublink4
	add_submenu_page('product_menu.php', "Bulk Upload", "Bulk Upload", 8, 'bulkupload', 'bulk_upload');
}

function manage_coupon()
{
	if($_REQUEST['pagetype']=='addedit')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_coupon.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_manage_coupon.php');
	}
}

function post_listing()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_settings.php');
}

function manage_category()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_manage_category.php');
}

function bulk_upload()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_bulk_upload.php');
}

function theme_settings()
{
	mytheme_add_admin();
	//include_once(TEMPLATEPATH . '/library/functions/admin_settings.php');
}

function general_settings()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_settings.php');
}

function notification()
{
	if($_REQUEST['file']!='')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification_edit.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification.php');
	}
}
?>