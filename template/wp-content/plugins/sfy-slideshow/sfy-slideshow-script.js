jQuery(document).ready(function() {
	jQuery('#upload_image_button').click(function() {
		formfield = jQuery('#imagesource').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#imagesource').val(imgurl);
		tb_remove();
	}
	
	jQuery( "#startdate" ).datepicker({
			dateFormat : 'dd-mm-yy'
	});
	
	jQuery( "#enddate" ).datepicker({
			dateFormat : 'dd-mm-yy'
	});
	
	var target = jQuery("#target").val();
	jQuery("#target_select").val(target);

	jQuery( "#target_select" ).change(function(){
		var str = "";
		str = jQuery("#target_select option:selected").text();	
		jQuery("#target").val(str);
	});
});