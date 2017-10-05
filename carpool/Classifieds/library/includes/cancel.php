<?php get_header(); ?>
<div id="page">
<div id="content-wrap" class="clear" >
<div id="content" class="content-in-detail" >
<h1><?php _e(PAY_CANCELATION_TITLE);?></h1>
<?php
global $upload_folder_path;
$destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_cancel_paypal.txt";
if(file_exists($destinationfile))
{
	$filecontent = file_get_contents($destinationfile);
}
?>
<?php
$store_name = get_option('blogname');
$search_array = array('[#$store_name#]');
$replace_array = array($store_name);
$filecontent = str_replace($search_array,$replace_array,$filecontent);
if($filecontent)
{
?>

 <?php echo $filecontent; ?> 

<?php
}else
{
?>
<h1><?php _e(PAY_CANCEL_MSG); ?></h1> 
<?php
}
?>
</div>

<?php include (TEMPLATEPATH . "/footer_index.php"); ?>