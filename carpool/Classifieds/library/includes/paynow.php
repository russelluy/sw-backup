<?php
session_start();
ob_start();
if(!$current_user->data->ID)
{
	wp_redirect(get_settings('home').'/index.php?page=login');
	exit;
}
global $wpdb,$General;

if($_POST)
{
	$amount = $_POST['amount'];
	$_POST = $_SESSION['ads_information_session']['post'];
	
	$general_settings = $General->get_general_settings();
	$termid = $_POST['termid'];
	$post_title = $_POST['post_title'];
	$description = $_POST['description'];
	$post_price = $_POST['post_price'];
	$post_location = $_POST['post_location'];  
	$geo_latitude = $_POST['geo_latitude'];  
	$geo_longitude = $_POST['geo_longitude'];  
	$owner_name = $_POST['owner_name'];
	$owner_email = $_POST['owner_email'];
	$owner_phone = $_POST['owner_phone'];
	$post_tags = $_POST['post_tags'];
	$post_url = $_POST['post_url'];
	$coupon_code = $_POST['coupon_code'];
	
	$expiry_days = get_option('job_post_expiry_days');
	$post_images = '';
	if($_SESSION['ads_information_session']['images'])
	{
		$post_images = implode(',',$_SESSION['ads_information_session']['images']);
	}
	
	
	$alive_days = $General->get_ads_alive_days();
	$custom = array("post_location" 	=> $post_location,
					"geo_latitude"	 	=> $geo_latitude,
					"geo_longitude" 	=> $geo_longitude,
					"owner_name"		=> $owner_name,
					"owner_email" 		=> $owner_email,
					"owner_phone" 		=> $owner_phone,
					"post_url"			=> $post_url,
					"post_images"		=> $post_images,
					"active_days"		=> $alive_days,	
					);

	
	$_SESSION['ads_information_session'] = array();
	if($_REQUEST['pid'])
	{
		$pid = $_REQUEST['pid'];
		$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," "),array('-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),$post_title));
		if($_REQUEST['type']=='renew')
		{
			$date = date('Y-m-d H:i:s');
			if($amount == '' || $amount <= 0) {
				$post_default_status = $General->get_ads_default_status();
			} else {
				$post_default_status = 'draft';
			}
			global $current_user;
			$userID =  $current_user->data->ID;
			if($current_user_id) {
				$my_post['post_author'] = $current_user_id;
			}
			if($_POST['termid']) {
				$catids_arr[] = $_POST['termid'];
				if($_POST['feature_prd'] && $General->get_feature_catid())
				{
					$catids_arr[] = $General->get_feature_catid();
				}
			}
			if($post_tags) {
				$my_post['tags_input'] = explode(',',$post_tags);
			}
			$my_post['post_title'] = $post_title;
			$my_post['post_content'] = $description;
			$my_post['post_category'] = $catids_arr;
			$my_post['post_status'] = $post_default_status;	
			$my_post['ID'] = $pid;	
			$pid = wp_update_post($my_post);
			
		}else
		{
			global $current_user;
			$userID =  $current_user->data->ID;
			if($current_user_id)
			{
				$my_post['post_author'] = $current_user_id;
			}
			if($_POST['termid'])
			{
				$catids_arr[] = $_POST['termid'];
				if($_POST['feature_prd'] && $General->get_feature_catid())
				{
					$catids_arr[] = $General->get_feature_catid();
				}
			}
			if($post_tags)
			{
				$my_post['tags_input'] = explode(',',$post_tags);
			}
			$my_post['post_title'] = $post_title;
			$my_post['post_content'] = $description;
			$my_post['post_category'] = $catids_arr;
			$my_post['ID'] = $pid;		
			$pid = wp_update_post($my_post);
			
		}
		
		
		$wpdb->query($postsql);
		foreach($custom as $key=>$val)
		{				
			update_post_meta($pid, $key, $val);
		}
		//Post Images	
		$post_images=get_post_meta($pid,'post_images',true);	
		$post_images=explode(',',$post_images);		
		foreach($post_images as $images)
		{
			
			$img_attachment=strstr($images,'products_img');	
			$dirinfo = wp_upload_dir();	
			$upload_img_path= $dirinfo['basedir']."/".$img_attachment;
			echo $images."=".$upload_img_path."<br>";
			$wp_filetype = wp_check_filetype(basename($upload_img_path), null );			
			$attachment = array(
				 'guid' => $images, 
				 'post_mime_type' => $wp_filetype['type'],
				 'post_title' => preg_replace('/\.[^.]+$/', '', basename($upload_img_path)),
				 'post_content' => '',
				 'post_status' => 'inherit'
			  );		
			$attach_id = wp_insert_attachment( $attachment, $img_attachment, $last_postid );	
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata( $attach_id, $upload_img_path );					  			 
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}
		//Finish Post Images
			
		$_SESSION['session_message'] = INFO_UPDATE_SUCCESS_MSG;
		if($_REQUEST['type']=='renew')
		{
			if($amount == '' || $amount <= 0)
			{
			
				wp_redirect(get_option('siteurl').'/?page=ads_success');
				exit;
			}else
			{
				$currency_code = $general_settings['currency'];
				$paypal_merchantid = $general_settings['paypal_merchantid'];
				$returnUrl = get_option('siteurl').'/?page=return&pid='.$last_postid;
				$cancel_return = get_option('siteurl').'/?page=cancel&pid='.$last_postid;
				$notify_url = get_option('siteurl').'/?page=ipn';
				$item_name = PAYPAL_ITEM_DESC_TEXT.$post_title;
				echo' 	
				<form name="frm_payment_method" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" value="'.$amount.'" name="amount"/>
			<input type="hidden" value="'.$returnUrl.'" name="return"/>
			<input type="hidden" value="'.$cancel_return.'" name="cancel_return"/>
			<input type="hidden" value="'.$notify_url.'" name="notify_url"/>
			<input type="hidden" value="_xclick" name="cmd"/>
			<input type="hidden" value="'.$item_name.'" name="item_name"/>
			<input type="hidden" value="'.$paypal_merchantid.'" name="business"/>
			<input type="hidden" value="'.$currency_code.'" name="currency_code"/>
			<input type="hidden" value="'.$last_postid.'" name="custom" />
			</form>
			<br /><br /><br />
			<center><p><h1>'.PAYPAL_PROCESSING_MSG.'</h1></p></center>
			<script>
			setTimeout("document.frm_payment_method.submit()",100); 
			</script>';
			}
		}else
		{
			wp_redirect(get_option('siteurl').'/?page=dashboard&msg=success');
			exit;
		}
		exit;
	}else
	{
		if($amount == '' || $amount <= 0)
		{
			$post_default_status = $General->get_ads_default_status();
		}else
		{
			$post_default_status = 'draft';
		}
		global $user_identity;
		get_currentuserinfo();
		$userID =  $current_user->data->ID;
		if($current_user_id)
		{
			$my_post['post_author'] = $current_user_id;
		}
		if($_POST['termid'])
		{
			$catids_arr[] = $_POST['termid'];
			if($_POST['feature_prd'] && $General->get_feature_catid())
			{
				$catids_arr[] = $General->get_feature_catid();
			}
		}
		if($post_tags)
		{
			$my_post['tags_input'] = explode(',',$post_tags);
		}
		$my_post['post_title'] = $post_title;
		$my_post['post_content'] = $description;
		$my_post['post_category'] = $catids_arr;
		$my_post['post_status'] = $post_default_status;
		$last_postid = wp_insert_post($my_post);
		
		$custom["post_price"] = $post_price;
		$custom["amount"] = $amount;
		$custom["coupon_code"] = $coupon_code;
		foreach($custom as $key=>$val)
		{				
			update_post_meta($last_postid, $key, $val);
		}
		
		//Post Images
		$post_images=get_post_meta($last_postid,'post_images',true);		
		$post_images=explode(',',$post_images);		
		foreach($post_images as $images)
		{
			
			$img_attachment=strstr($images,'products_img');	
			$dirinfo = wp_upload_dir();	
			$upload_img_path= $dirinfo['basedir']."/".$img_attachment;			
			$wp_filetype = wp_check_filetype(basename($upload_img_path), null );			
			$attachment = array(
				 'guid' => $images, 
				 'post_mime_type' => $wp_filetype['type'],
				 'post_title' => preg_replace('/\.[^.]+$/', '', basename($upload_img_path)),
				 'post_content' => '',
				 'post_status' => 'inherit'
			  );		
			$attach_id = wp_insert_attachment( $attachment, $img_attachment, $last_postid );	
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata( $attach_id, $upload_img_path );					  			 
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}
		//Finish Post Images
		
		/*$toEmailName = $General->get_site_emailName();
			$toEmail = $General->get_site_emailId();
			$fromEmail = $owner_email;
			$fromEmailName = $owner_name;
			
			$subject = "A New job is posted";
			$message = '<p>Dear '.$toEmailName.',</p>
			<p><b>A New job is posted and detail information is below</b></p>
			<p>Title : <a href="'.get_permalink($last_postid).'">'.$post_title.'</a></p>
			<p>Location : '.$post_location.'</p>
			<p>Owner Name : '.$owner_name.'</p>
			<p>Owner Email : '.$owner_email.'</p>
			<p>Website : '.$post_url.'</p>
			<p>Phone : '.$owner_phone.'</p>
			<p>Description : '.$description.'</p>
			<p>Thank you.</p>';
			$General->sendEmail($fromEmail,$fromEmailName,$toEmail,$toEmailName,$subject,$message); // send email to admin*/
		if($amount == '' || $amount <= 0)
		{			
			wp_redirect(get_option('siteurl').'/?page=ads_success');
			exit;
		}else
		{
			$currency_code = $general_settings['currency'];
			$paypal_merchantid = $general_settings['paypal_merchantid'];
			$returnUrl = get_option('siteurl').'/?page=return&pid='.$last_postid;
			$cancel_return = get_option('siteurl').'/?page=cancel&pid='.$last_postid;
			$notify_url = get_option('siteurl').'/?page=ipn';
			$item_name = PAYPAL_ITEM_DESC_TEXT.$post_title;

			echo' 	
			<form name="frm_payment_method" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" value="'.$amount.'" name="amount"/>
			<input type="hidden" value="'.$returnUrl.'" name="return"/>
			<input type="hidden" value="'.$cancel_return.'" name="cancel_return"/>
			<input type="hidden" value="'.$notify_url.'" name="notify_url"/>
			<input type="hidden" value="_xclick" name="cmd"/>
			<input type="hidden" value="'.$item_name.'" name="item_name"/>
			<input type="hidden" value="'.$paypal_merchantid.'" name="business"/>
			<input type="hidden" value="'.$currency_code.'" name="currency_code"/>
			<input type="hidden" value="'.$last_postid.'" name="custom" />
			</form>
			<br /><br /><br />
			<center><p><h1>'.PAYPAL_PROCESSING_MSG.'</h1></p></center>
			<script>
			setTimeout("document.frm_payment_method.submit()",100); 
			</script>';
		}
	exit;
	}
}
?>