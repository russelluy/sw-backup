<?php 

global $fields, $fieldsname;

$fields[0]= "blog-image";
$fields[1]= "portfolio-image";
$fields[2]= "portfolio-image-big";
$fields[3]= "news-image";
$fields[4]= "service-icon";
$fields[5]= "slider-image";
$fields[6]= "slider-url";

$fieldsname[0]= "Image for blog: height: your choice, width: 615px";
$fieldsname[1]= "Image for portfolio: height: 129px, width: 287px";
$fieldsname[2]= "Big image for portfolio: your choice, width: 615px";
$fieldsname[3]= "Image for news: height: 72px, width: 72px";
$fieldsname[4]= "Image or icon for each service: height: 52px, width: 52px";
$fieldsname[5]= "Image for slider: height: 281px, width: 641px";
$fieldsname[6]= "Slider post links to a page? (leave this field empty if you want your post to simply link to the post detail)";

function gw_create_form(){
global $fields, $fieldsname;
$loop = count($fields);

if(isset($_GET['post'])){
$post_id = $_GET['post'];
}
global $gw_options;
?>

<div class="jquery_move">
<div class="postbox gw_option" id="projektsdiv">
<div title="Click to toggle" class="handlediv"></div>
<h3 class"hndle">Media Consult Options Panel</h3>
<div class="inside">

<?php 

for ($i=0; $i<$loop; $i++){
	if ($post_id != "")
	{
		$current_field = $fields[$i];
		$value = get_post_meta($post_id, $current_field, true);
	}
	echo "<p class='extra_$i $hide'><label for='".$fields[$i]."'>".$fieldsname[$i].": </label><input id='".$fields[$i]."' name='".$fields[$i]."' type='text' value='$value'></p>";

	
} 
echo"<p><strong>For the Images enter a URL that links to an image (eg: http://www.yourdomain/yourimage.jpg)</strong></p>";
?>
</div></div></div>

<?php }
	
function gw_save_data($post_id){
global $fields;
$loop = count($fields);

	for ($i=0; $i<$loop; $i++){
		$current_field = $fields[$i];
		gw_insert_data($current_field, $post_id);		
		}
}

function gw_insert_data($current_field, $post_id){
global $fields;
$new_value = $_POST[$current_field];
		$value = get_post_meta($post_id, $current_field, true);
		
		if ($new_value == ""){
					if ($value != ""){
						delete_post_meta($post_id, $current_field, $value);
					}
		
				} else{
					if ($value == ""){
						add_post_meta($post_id, $current_field, $new_value, true);
					}else if ($value != $new_value ){
						update_post_meta($post_id, $current_field, $new_value, $value);	
					}
				}
			}

function gw_append_admin_head(){?>
<link rel='stylesheet' href='<?php echo bloginfo('template_url'); ?>/options/admin.css' type='text/css' />
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/options/supporting_scripts.js"></script> 
<?php }

if(basename( $_SERVER['PHP_SELF']) == "page.php" || basename( $_SERVER['PHP_SELF']) == "page-new.php" || basename( $_SERVER['PHP_SELF']) == "post-new.php" || basename( $_SERVER['PHP_SELF']) == "post.php"){
add_action('admin_head','gw_append_admin_head');
add_action('save_post','gw_save_data');
add_action('edit_form_advanced','gw_create_form',1);
add_action('edit_page_form','gw_create_form',1);
}
