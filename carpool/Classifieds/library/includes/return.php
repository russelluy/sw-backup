<?php session_start();
get_header(); ?>
<div id="page">
<div id="content-wrap" class="clear" >
<?php
global $wpdb,$post;
$pid = $_REQUEST['pid']; 
$posts_of = get_posts(array('post_type'=>'post'));
$posts_of = $wpdb->get_row("select * from $wpdb->posts where ID = '".$pid."'");
if($posts_of){

if($_REQUEST['pid'] != "" && isset($_REQUEST['txn_id']) && $_REQUEST['txn_id'] != "")
{
	global $wpdb;
	$postid = $_REQUEST['pid'];
	$settingoptions = $wpdb->get_var("select option_value from $wpdb->options where option_name like 'mysite_general_settings'");
	$option_value = unserialize($settingoptions);
	$default_status = $option_value['approve_ads'];
	$sql = "update $wpdb->posts set post_status=\"$default_status\" where ID=\"$postid\"";
	$wpdb->query($sql);
?>
<h2><?php _e(PAYMENT_SUCCESS_TITLE);?></h2>
<?php
$destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_success_paypal.txt";
if(file_exists($destinationfile))
{
	$filecontent = file_get_contents($destinationfile);
}else
{
	$filecontent = PAYMENT_SUCCESS_MSG;
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
}else{ 
	echo "<h2>Authentication failed</h2>";
	echo "<h4>Authentication failed, You need to complete the payment first to post your advertisement.</h4>";
	 wp_delete_post($pid);
 }
 }else{
	echo "<h2>Authentication failed</h2>";
	echo "Authentication failed, something is going wrong here";
 }
?>
<?php include (TEMPLATEPATH . "/footer_index.php"); ?>