<?php
/*
Template Name: Form Submission Template
*/
get_header(); 

$current_user = wp_get_current_user();
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.frm_form_fields').html('<span style="font-size: 11px; margin-bottom: 10px;">The pledge you make is yours, it will not be shared with others unless you opt-in to share and become a Star of Change. </span>'+$('.frm_form_fields').html());
    $('.submit').html('<span style="font-size: 11px; margin-bottom: 10px; color:#ff0000;">* Required Fields</br></br></span>'+$('.submit').html());
    $('a[title="Add Media"]').remove();

    
    if($('#field_15-0').length){
	    $('#field_15-0').attr('checked',true);
    }
    if($('#field_aat1w9').length){
	    $('#field_aat1w9').val('<?php echo $current_user->user_email; ?>');
    }
    if($('#field_firstname').length){
	$('#field_firstname').val('<?php echo $current_user->user_firstname; ?>');
    }
    if($('#field_7aj34p').length){
	$('#field_7aj34p').val('<?php echo $current_user->user_lastname; ?>');
    }
    if($('.frm_radio').length){
	var frm_radio_count = 0;
	$('.frm_radio').each(function(index, value){
		if(frm_radio_count > 0){			
			$(value).css('border-left','2px solid #406325');
		}
		frm_radio_count++;
	});
    }
<?php
  $update_track = mysql_real_escape_string(stripslashes(htmlentities($_GET['update'])));
  $done_track = mysql_real_escape_string(stripslashes(htmlentities($_GET['done'])));
  $id_track = mysql_real_escape_string(stripslashes(htmlentities($_GET['id'])));
  $user_track = mysql_real_escape_string(stripslashes(htmlentities($_GET['user'])));
  $check_completion = get_user_meta($current_user->ID, 'form_complete');
  
  if( !empty($check_completion) && is_array($check_completion) && $check_completion[0] === 'true'){

  }
  else if(!empty($update_track) && $update_track == 'true' && !empty($done_track) && $done_track == 'true'){
     $id_track = $_SESSION['id'];
	 $update_status = $_SESSION['update_status'];
	 $items = $_SESSION['update_items'];
	 if(!empty($update_status) && $update_status !== 'success'){
?>
     var update = <?php echo ($update_track == 'true'?'true':'false'); ?>;
     if($('form').length && update == true){
	    $('form').attr('action', '/onesimplechange/?page_id=82');
	    $('#frm_action').val('update');
	    $('#frm_field_9_container').html($('#frm_field_9_container').html()+'<input type="hidden" id="id" name="id" value="<?php echo $id_track; ?>" />');
        $('#frm_field_9_container').html($('#frm_field_9_container').html()+'<input type="hidden" id="user_id" name="user_id" value="<?php echo $current_user->ID; ?>" />');
		<?php
		foreach($items as $item_id=>$value){						
					?>
					if($("input[name='item_meta[<?php echo $item_id;?>]']").length() > 1){
						$("input[name='item_meta[<?php echo $item_id;?>]']").each(function(index, val){
							if(val.value == '<?php echo $value; ?>'){
								val.checked = true;
							}
						});
					}
					else{
						$("input[name='item_meta[<?php echo $item_id;?>]']").val($value);	
					}
					//$("input[name='item_meta[<?php echo $rec->id;?>]']").val('<?php echo $rec->meta_value; ?>');
					<?php
				}		 
		?>
     }
<?php
	}
  }  
  else if(empty($done_track) && !empty($update_track) && $update_track == 'true'){
    $match_from_db = $wpdb->get_results("SELECT id, user_id FROM wp_frm_items where id=$id_track and user_id=$user_track");
    if(!empty($match_from_db) && count($match_from_db) > 0){     
?>
     var update = <?php echo ($update_track == 'true'?'true':'false'); ?>;
     if($('form').length && update == true){
	    $('form').attr('action', '/onesimplechange/?page_id=82');
		$('input[type=submit]').attr('onSubmit','');
		$('input[type=submit]').val('Complete');
	    $('#frm_field_9_container').html($('#frm_field_9_container').html()+'<input type="hidden" id="id" name="id" value="<?php echo $id_track; ?>" />');
		$('#frm_field_9_container').html($('#frm_field_9_container').html()+'<input type="hidden" id="user_id" name="user_id" value="<?php echo $current_user->ID; ?>" />');
		<?php
		$user_update_records = $wpdb->get_results("SELECT wff.id, wff.name, wff.field_key, wff.type, wfim.meta_value FROM wp_frm_items wfi join wp_frm_item_metas wfim on wfi.id=wfim.item_id join wp_frm_fields wff on wff.id=wfim.field_id where wfi.user_id = $user_track and wfi.id = $id_track");
		foreach($user_update_records as $rec){
				if($rec->type == 'text' || $rec->type == 'textarea' || $rec->type == 'select'){
					?>			
					$('#dscesfsdsd').val('<?php echo $rec->meta_value; ?>');		
					$('#field_<?php echo $rec->field_key; ?>').val($('#dscesfsdsd').val());
					<?php
				}
				else{
					?>
					$("input[name='item_meta[<?php echo $rec->id;?>]']").each(function(index, val){
						if(val.value == '<?php echo $rec->meta_value; ?>'){
							val.checked = true;
						}
					});
					//$("input[name='item_meta[<?php echo $rec->id;?>]']").val('<?php echo $rec->meta_value; ?>');
					<?php
				}
		 }
		?>
     }
<?php
	}
  }
 ?>
});
</script>

<p></p>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/form.css" />
<div style="margin-left: auto; margin-right: auto; width: 50%; margin-top: 20px;">

<?php


$count_submissions = $wpdb->get_var("select count(*) from wp_frm_items where form_id=2 and user_id=$current_user->ID");
if( !empty($check_completion) && is_array($check_completion) && $check_completion[0] === 'true'){
?>
<div class="frm_message_custom">
<p>
You have already completed the form. Thank you!
</p>
</div>
<?php
}
else if(!empty($done_track) && $done_track == 'true' && !empty($update_status) && $update_status == 'success'){
?>
<div class="frm_message_custom">
<p>
You have successfully completed the form. Thank you!
</p>
</div>
<?php
}
else if($count_submissions >= 1 && !($update_track == 'true' && !empty($match_from_db) && count($match_from_db) > 0)){
?>
<div class="frm_message_custom">
<p>
You have already submitted the form.
</p>
</div>
<?php
}
else{
// to use short code
//$page = get_page_by_title( 'G' );
//$content = apply_filters('the_content', $page->post_content); 
//echo $content;

echo FrmEntriesController::show_form(2, $key = '', $title=true);
}
?>

</div>
</div>
<?php get_footer(); ?>
<input type="hidden" id="dscesfsdsd" />