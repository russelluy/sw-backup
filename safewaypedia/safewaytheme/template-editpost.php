<?php
/*
Template Name: Ajax Handler
*/
//wp_enqueue_script('jqueryForm', '/wp-content/themes/safewaytheme/sfypedia/jquery.form.js');
//wp_enqueue_script('updatePost', '/wp-content/themes/safewaytheme/sfypedia/updatePost.js');
$post = $_GET['id'];
?>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery.ajax({
			type: "post",
			url: '/safewaypedia/ajax-post/',
			data: {"id":<?php echo $post; ?>},
			success: function(msg){
				jQuery('#id').val(msg.id);
				jQuery('#tmptitle').html(msg.title);
				jQuery('#tmpdescription').html(msg.description);
				jQuery('#tmpdefinition').html(msg.definition);
				jQuery('#title').val(jQuery('#tmptitle').text());
				jQuery('#description').val(jQuery('#tmpdescription').text());
				jQuery('#definition').val(jQuery('#tmpdefinition').text());
			},
			error: function(msg){
//				alert("error: "+msg);
			}
		});

});
</script>

<div class="content_margin">
    <h2>Edit Acronym</h2>
    <div id="message" style="font-weight: bold; margin-top: 10px; text-align: center; font-size: 14px;"><span style="color: white;">Please submit the form</span></div><br />
    <form id="new_post1" name="new_post1" method="post" style="padding-top: 20px;" enctype="multipart/form-data">
	<!-- post name -->
        <input type="hidden" name="id" id="id" value="" />
        <input type="hidden" name="url" value="<?php echo site_url(); ?>" />
	<fieldset>
		<label for="title"><strong>Title:</strong></label>
                <input type="text" id="title" value="" tabindex="5" name="title" style="width: 425px;"/>
	</fieldset>
        <fieldset>
		<label for="description"><strong>Description:</strong></label>
                <input type="text" id="description" value="" tabindex="5" name="description" style="width: 425px;"/>
	</fieldset>
	<!-- post Content -->
	<fieldset>
		<label for="definition"><strong>Definition:</strong></label>
		<textarea id="definition" tabindex="15" name="definition" cols="65" rows="10" style="width: 425px;"></textarea>
	</fieldset>
	
	<fieldset class="submit">
            <input type="button" value="Update" tabindex="40" id="submit" name="submit" onclick="validateUpdate()"/>
	</fieldset>
</form>
<div id="tmptitle" style="display:none;"></div>	
<div id="tmpdescription" style="display:none;"></div>	
<div id="tmpdefinition" style="display:none;"></div>	
</div>

