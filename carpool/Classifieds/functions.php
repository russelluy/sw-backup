<?php //Begin widget code
error_reporting(E_ERROR);

load_theme_textdomain('default');
/*load_textdomain( 'default', TEMPLATEPATH.'/en_US.mo' );*/

global $blog_id;
if(get_option('upload_path') && !strstr(get_option('upload_path'),'wp-content/uploads'))
{
	$upload_folder_path = "wp-content/blogs.dir/$blog_id/files/";
}else
{
	$upload_folder_path = "wp-content/uploads/";
}
global $blog_id;
if($blog_id){ $thumb_url = "&amp;bid=$blog_id";}

if ( function_exists( 'add_theme_support' ) ){
	add_theme_support( 'post-thumbnails' );
	}
define('DOMAIN','templatic');
require_once (TEMPLATEPATH . '/library/map/map_functions.php');
require_once (TEMPLATEPATH . '/library/map/preview_map.php');

//** ADMINISTRATION FILES **//
 	// Theme variables
	require_once (TEMPLATEPATH . '/library/functions/theme_variables.php');
    // Theme admin functions
    require_once ($functions_path . 'admin_functions.php');
    // Theme admin options
    require_once ($functions_path . 'admin_options.php');
    // Theme admin Settings
    require_once ($functions_path . 'admin_settings.php');
	// Comments
    require_once ($functions_path . 'comments_functions.php');
// Widgetss
    require_once ($functions_path . 'widgets_functions.php');
	require(TEMPLATEPATH . "/product_menu.php");
 	//require_once ($functions_path . 'yoast-canonical.php');
	require_once ($functions_path . 'yoast-breadcrumbs.php');
	require_once ($functions_path . 'general_functions.php');
	require_once (TEMPLATEPATH . '/language.php');
	require_once (TEMPLATEPATH . '/library/functions/admin_dashboard.php');
	require_once (TEMPLATEPATH . '/library/functions/custom_functions.php');
	
	
/* Set the file extension for allown only image/picture file extension in upload file*/
$extension_file=array('.jpg','.JPG','jpeg','JPEG','.png','.PNG','.gif','.GIF','.jpe','.JPE');  
global $extension_file;

function autoinstall_admin_header()
	{
		global $wpdb;
		if(strstr($_SERVER['REQUEST_URI'],'themes.php') && $_REQUEST['template']=='' && $_GET['page']=='') 
		{
			
			if($_REQUEST['dummy']=='del')
			{
				delete_dummy_data();	
				$dummy_deleted = '<p><b>All Dummy data has been removed from your database successfully!</b></p>';
			}
			if($_REQUEST['dummy_insert'])
			{
				require_once (TEMPLATEPATH . '/auto_install.php');
			}
			if($_REQUEST['activated']=='true')
			{
				$theme_actived_success = '<p class="message">Theme activated successfully.</p>';	
			}
			$post_counts = $wpdb->get_var("select count(post_id) from $wpdb->postmeta where (meta_key='pt_dummy_content' || meta_key='tl_dummy_content') and meta_value=1");
			if($post_counts>0)
			{
				$dummy_data_msg = '<p> <b>Sample data has been populated on your site. Wish to delete sample data?</b> <br />  <a class="button_delete" href="'.get_option('siteurl').'/wp-admin/themes.php?dummy=del">Yes Delete Please!</a><p>';
			}else
			{
				$dummy_data_msg = '<p> <b>Would you like to auto install this theme and populate sample data on your site?</b> <br />  <a class="button_insert" href="'.get_option('siteurl').'/wp-admin/themes.php?dummy_insert=1">Yes, insert sample data please</a></p>';
			}
	
	
			define('THEME_ACTIVE_MESSAGE','
		<style>
		.highlight { width:60% !important; background:#FFFFE0 !important; overflow:hidden; display:table; border:2px solid #558e23 !important; padding:15px 20px 0px 20px !important; -moz-border-radius:11px  !important;  -webkit-border-radius:11px  !important; } 
		.highlight p { color:#444 !important; font:15px Arial, Helvetica, sans-serif !important; text-align:center;  } 
		.highlight p.message { font-size:13px !important; }
		.highlight p a { color:#ff7e00; text-decoration:none !important; } 
		.highlight p a:hover { color:#000; }
		.highlight p a.button_insert 
			{ display:block; width:230px; margin:10px auto 0 auto;  background:#5aa145; padding:10px 15px; color:#fff; border:1px solid #4c9a35; -moz-border-radius:5px;  -webkit-border-radius:5px;  } 
		.highlight p a:hover.button_insert { background:#347c1e; color:#fff; border:1px solid #4c9a35;   } 
		.highlight p a.button_delete 
			{ display:block; width:140px; margin:10px auto 0 auto; background:#dd4401; padding:10px 15px; color:#fff; border:1px solid #9e3000; -moz-border-radius:5px;  -webkit-border-radius:5px;  } 
		.highlight p a:hover.button_delete { background:#c43e03; color:#fff; border:1px solid #9e3000;   } 
		#message0 { display:none !important;  }
		</style>
		
		<div class="updated highlight fade"> '.$theme_actived_success.$dummy_deleted.$dummy_data_msg.'</div>');
			echo THEME_ACTIVE_MESSAGE;
			
		}
	}
	
	add_action("admin_head", "autoinstall_admin_header"); // please comment this line if you wish to DEACTIVE SAMPLE DATA INSERT.

	function delete_dummy_data()
	{
		global $wpdb;
		delete_option('sidebars_widgets'); //delete widgets
		$productArray = array();
		$pids_sql = "select p.ID from $wpdb->posts p join $wpdb->postmeta pm on pm.post_id=p.ID where (meta_key='pt_dummy_content' || meta_key='tl_dummy_content') and meta_value=1";
		$pids_info = $wpdb->get_results($pids_sql);
		foreach($pids_info as $pids_info_obj)
		{
			wp_delete_post($pids_info_obj->ID);
		}
	}
	
	function get_image_cutting_edge($args=array())
{
	if($args['image_cut'])
	{
		$cut_post =$args['image_cut'];
	}else
	{
		$cut_post = get_option('ptthemes_image_x_cut');
	}
	if($cut_post)
	{		
		if($cut_post=='top')
		{
			$thumb_url .= "&amp;a=t";	
		}elseif($cut_post=='bottom')
		{
			$thumb_url .= "&amp;a=b";	
		}elseif($cut_post=='left')
		{
			$thumb_url .= "&amp;a=l";
		}elseif($cut_post=='right')
		{
			$thumb_url .= "&amp;a=r";
		}elseif($cut_post=='top right')
		{
			$thumb_url .= "&amp;a=tr";
		}elseif($cut_post=='top left')
		{
			$thumb_url .= "&amp;a=tl";
		}elseif($cut_post=='bottom right')
		{
			$thumb_url .= "&amp;a=br";
		}elseif($cut_post=='bottom left')
		{
			$thumb_url .= "&amp;a=bl";
		}
	}
	return $thumb_url;
}

add_action( 'after_setup_theme', 'setup' );
function setup() {
        add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme  
		add_image_size( 'listing-thumb', 95, 45, true ); //(cropped)
		add_image_size( 'singlepage-thumb', 220, 200, true ); //(cropped)
		add_image_size( 'latestpost-thumb', 60, 60, true ); //(cropped)
}

add_filter( 'image_size_names_choose', 'custom_image_sizes_crop' );
function custom_image_sizes_crop( $sizes ) {
	$custom_sizes = array(
		'listing-thumb' => 'Listing Thumb',
		'singlepage-thumb' => 'Singlepage Thumb',
		'latestpost-thumb' => 'Latestpost Thumb'
	);
	return array_merge( $sizes, $custom_sizes );
}

?>