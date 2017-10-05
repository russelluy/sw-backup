<?php
/*
Template Name: New Post Template
*/

if( 'POST' == $_SERVER['REQUEST_METHOD']) {
	// Do some minor form validation to make sure there is content
	if (isset ($_POST['title'])) {
		$title =  $_POST['title'];
		
	} 

	if (isset ($_POST['description'])) {
		$description = $_POST['description'];
	} 

        if (isset ($_POST['definition'])) {
                $definition = $_POST['definition'];
        }
	
	if(!empty($title)){
		$st = substr($title, 0, 1);
		$pattern = '/^[\d\w#]/';
		preg_match($pattern, $st, $matches);
	}
	if(strlen(trim($title)) > 0 && count($matches) > 0 && strlen(trim($description)) > 0 && strlen(trim($definition)) > 0){
		// ADD THE FORM INPUT TO $new_post ARRAY
		$new_post = array(
		'post_title'	=>	$title,
		'post_content'	=>	'<div class="acro_title">'.$description.'</div><div class="acro_desc">'.$definition.'</div>',
	//	'post_desc-title' =>	$description_title,
		'post_category'	=>	array(4), //this is the category id for acrony type post
		'post_status'	=>	'publish',           // Choose: publish, preview, future, draft, etc.
		'post_type'	=>	'post'  //'post',page' or use a custom post type if you want to
		);
		
		//SAVE THE POST
		$pid = wp_insert_post($new_post);
	
		//REDIRECT TO THE NEW POST ON SAVE
		$link = get_permalink( $pid );
		echo $link;
		wp_redirect( $link );
	}

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
do_action('wp_insert_post', 'wp_insert_post');

get_header();

function get_category_id(){
	$cat_name='acronym';
	$args=array(
			'type' => 'post',
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty'  => 0
		);

	$cat = 0;
	$categories=get_categories($args);
	foreach($categories as $category){
		if(strcasecmp(trim($cat_name), $category->name) == 0){
			$cat = $category->cat_ID;
			break;
		}
	}
	return $cat;
}
?>

<script type="text/javascript">
jQuery(document).ready(function(){
<?php if('POST' == $_SERVER['REQUEST_METHOD'] ) {
?>
	jQuery('#title').val("<?php echo $title; ?>");
	jQuery('#definition').val("<?php echo $definition; ?>");
	jQuery('#description').val("<?php echo $description; ?>");
<?php
	if(strlen(trim($title)) == 0){
?>
	alert('Title cannot be empty.');
	jQuery('#title').focus();
<?php	
	}
	else if(count($matches) == 0){
?>
	alert('Title cannot start with special characters other than #.');
	jQuery('#title').val('');
	jQuery('#title').focus();
<?php 		
	} 
	else if(strlen(trim($description)) == 0){
?>
	alert('Description cannot be empty.');
	jQuery('#description').focus();
<?php	
	}
	else if(strlen(trim($definition)) == 0){
?>
	alert('Definition cannot be empty.');
	jQuery('#definition').focus();
<?php	
	}	
}
?>
});	
</script>


<!--</div>
</div>-->
<div class="content_margin2">
	<div class="new_post_wrap">
	<form id="new_post" name="new_post" method="post" action="/safewaypedia/add-new-post/" class="sfy-form" >
	<div style="font-weight:bold;margin-bottom:20px;font-size: 16px;"><?php the_title();?></div>
	<!-- post name -->
	<fieldset name="name">
		<label for="title">Abbreviation:</label>
		<input type="text" id="title" value="" tabindex="5" name="title" />		
	</fieldset>
        <fieldset name="description">
                <label for="description">Meaning:</label>
                <input type="text" id="description" value="" tabindex="5" name="description" />
        </fieldset>

	<!-- post Content -->
	<fieldset class="content">
		<label for="definition">Definition:</label>
		<textarea id="definition" tabindex="15" name="definition" cols="80" rows="10"></textarea>
	</fieldset>
	
	<fieldset class="submit">
		<input type="submit" value="Submit Post" tabindex="40" id="submit" name="submit" />
	</fieldset>
</form>
	</div>

</div>

<?php get_footer();?>
