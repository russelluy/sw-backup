<?php
/*
Template Name: Form Update
*/
require(dirname(dirname(dirname(dirname(__FILE__)))).'/wp-load.php');
global $wpdb;

//var_dump($_POST);
function cleanInput($name){
	return (!empty($name)?mysql_real_escape_string(stripslashes(htmlentities($_POST[$name]))):$name);
}

try{
$id = cleanInput('id');
$user_id = cleanInput('user_id');
$items = $_POST['item_meta'];
$_SESSION['update_id'] = $id;
$_SESSION['update_items'] = $items;
foreach($items as $item_id=>$value){
	echo "$id -> item: $item_id  Val: $value";
	echo "  count Q: select count(*) FROM wp_frm_item_metas where item_id=$id and field_id=$item_id";
	$count = $wpdb->get_var("select count(*) FROM wp_frm_item_metas where item_id=$id and field_id=$item_id");
	echo " count: $count <br />";
	if($count > 0){		
		$query = "update wp_frm_item_metas set meta_value='".str_replace('\\', '\\\\', mysql_real_escape_string($value))."' where item_id=$id and field_id=$item_id";
		echo $query.'<br />';
		$var = $wpdb->query($query);
		echo $var .'<br />';
	}
}
$key = 'form_complete';
echo 'user id: '.$user_id;
delete_user_meta( $user_id, $key);
add_user_meta( $user_id, $key, 'true');
$_SESSION['update_status'] = 'success';
}
catch(Exception $e){
	$_SESSION['update_status'] = 'failure';	
}
header('Location: /onesimplechange/?page_id=214');