<?php get_header(); ?>
<div id="page">
<div id="content-wrap" class="clear" >
<?php
if($_REQUEST['pid'])
{
	global $wpdb;
	$postid = $_REQUEST['pid'];
	$settingoptions = $wpdb->get_var("select option_value from $wpdb->options where option_name like 'mysite_general_settings'");
	$option_value = unserialize($settingoptions);
	$default_status = $option_value['approve_ads'];
	$sql = "update $wpdb->posts set post_status=\"$default_status\" where ID=\"$postid\"";
	$wpdb->query($sql);
}
?>
<h1><?php _e(ADD_POSTED_SUCCESS_TITLE);?></h1>
<?php
$destinationfile =   ABSPATH . $upload_folder_path."notification/message/post_added_success.txt";
if(file_exists($destinationfile))
{
	$filecontent = file_get_contents($destinationfile);
}else
{
	$filecontent = ADS_POSTED_SUCCESS_MSG;
}
?>
<?php
$store_name = get_option('blogname');
$search_array = array('[#$store_name#]');
$replace_array = array($store_name);
$filecontent = str_replace($search_array,$replace_array,$filecontent);
if($filecontent)
{
	echo $filecontent;
}
?>
<?php include (TEMPLATEPATH . "/footer_index.php"); ?>