<?php
global $wpdb;
if($_POST)
{
	$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
	$cartinfo = $wpdb->get_results($cartsql);
	if($cartinfo)
	{
		foreach($cartinfo as $cartinfoObj)
		{
			$option_id = $cartinfoObj->option_id;
			$option_value = unserialize($cartinfoObj->option_value);
			$currency = $option_value['currency'];
			$currencysym = $option_value['currencysym'];
			$site_email = $option_value['site_email'];
			$site_email_name = $option_value['site_email_name'];
			$imagepath = $option_value['imagepath'];
			$paypal_merchantid = $option_value['paypal_merchantid'];
			$ads_price = $option_value['ads_price'];
			$apply_cat_price = $option_value['apply_cat_price'];
			$ads_days = $option_value['ads_days'];	
			$approve_ads = $option_value['approve_ads'];
			$feature_ads_price = $option_value['feature_ads_price'];
			$max_ads_char = $option_value['max_ads_char'];
			$feature_catid = $option_value['feature_catid'];
			$google_map_key = $option_value['google_map_key'];
			//is_send_from_email = $option_value['is_send_from_email'];
													
		}
	}
	$option_value['currency'] = $_POST['currency'];
	$option_value['currencysym'] = $_POST['currencysym']; 
	$option_value['site_email'] = $_POST['site_email'];
	$option_value['site_email_name'] = $_POST['site_email_name']; 
	$option_value['imagepath'] = $_POST['imagepath'];
	$option_value['paypal_merchantid'] = $_POST['paypal_merchantid'];
	$option_value['ads_price'] = $_POST['ads_price'];
	$option_value['apply_cat_price'] = $_POST['apply_cat_price'];
	$option_value['ads_days'] = $_POST['ads_days'];
	$option_value['approve_ads'] = $_POST['approve_ads'];
	$option_value['feature_ads_price'] = $_POST['feature_ads_price'];
	$option_value['max_ads_char'] = $_POST['max_ads_char'];	
	$option_value['feature_catid'] = $_POST['feature_catid'];
	$option_value['google_map_key'] = $_POST['google_map_key'];
	//$option_value['is_send_from_email'] = $_POST['is_send_from_email'];
	
		
			
		
	$option_value_str = serialize($option_value);
	$updatestatus = "update $wpdb->options set option_value= '$option_value_str' where option_id='".$option_id."'";
	$wpdb->query($updatestatus);
	$message = "Updated Succesfully.";
}
$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
$cartinfo = $wpdb->get_results($cartsql);
if(count($cartinfo)==0)
{
	$user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID = 1");
	$user_login = $wpdb->get_var("SELECT user_login FROM $wpdb->users WHERE ID = 1");
	$paymethodinfo = array(
						"currency"		=> 'USD',
						"currencysym"	=> '$',
						"site_email"	=> $user_email,
						"site_email_name"=>	$user_email,
						"imagepath"		=>	"",	
						"paypal_merchantid"		=>	"myaccount@mydomain.com",
						"ads_price"		=>	"0.00",		
						"apply_cat_price"		=>	"0",
						"ads_days"		=>	"30",	
						"approve_ads"		=>	"publish",
						"feature_ads_price"		=>	"5",
						"max_ads_char"		=>	"1000",
						"feature_catid"		=>	"",	
						"google_map_key"		=>	"",	
						//"is_send_from_email"	=>	"0",
																											
						);
	$paymethodArray = array(
							"option_name"	=>	'mysite_general_settings',
							"option_value"	=>	serialize($paymethodinfo),
							);
	$wpdb->insert( $wpdb->options, $paymethodArray );
}
$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
$cartinfo = $wpdb->get_results($cartsql);
if($cartinfo)
{
	foreach($cartinfo as $cartinfoObj)
	{
		$option_id = $cartinfoObj->option_id;
		$option_value = unserialize($cartinfoObj->option_value);
		$currency = $option_value['currency'];
		$currencysym = $option_value['currencysym'];
		$site_email = $option_value['site_email'];
		$site_email_name = $option_value['site_email_name'];
		$imagepath = $option_value['imagepath'];
		$paypal_merchantid = $option_value['paypal_merchantid'];
		$ads_price = $option_value['ads_price'];	
		$apply_cat_price = $option_value['apply_cat_price'];
		$ads_days = $option_value['ads_days'];	
		$approve_ads = $option_value['approve_ads'];
		$feature_ads_price = $option_value['feature_ads_price'];
		$max_ads_char = $option_value['max_ads_char'];
		$feature_catid = $option_value['feature_catid'];
		$google_map_key = $option_value['google_map_key'];	
		//$is_send_from_email = $option_value['is_send_from_email'];	
											
	}
}
?>

<form action="<?php echo get_option( 'siteurl' );?>/wp-admin/admin.php?page=product_menu.php" method="post">
  <style>
h2 { color:#464646;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
font-size:24px;
font-size-adjust:none;
font-stretch:normal;
font-style:italic;
font-variant:normal;
font-weight:normal;
line-height:35px;
margin:0;
padding:14px 15px 3px 0;
text-shadow:0 1px 0 #FFFFFF;  }
</style>
  <h2>General Settings</h2>
  <?php if($message){?>
  <div class="updated fade below-h2" id="message" style="background-color: rgb(255, 251, 204);" >
    <p><?php echo $message;?> </p>
  </div>
  <?php }?>
  <table width="80%" cellpadding="5" class="widefat post fixed" >
    <thead>
      <tr>
        <td width="29%">Your Name (email author)</td>
        <td width="71%"><input type="text" name="site_email_name" value="<?php echo $site_email_name;?>" /></td>
      </tr>
      <tr>
        <td>Email Address (emails to users will be sent via this mail ID)</td>
        <td><input type="text" name="site_email" value="<?php echo $site_email;?>" /></td>
      </tr>
     <?php /*?> <tr>
        <td>Send Email Address (when any email is send to user, would you like to send Classifieds email address?)</td>
        <td><select name="is_send_from_email">
            <option value="1" <?php if($is_send_from_email=='1'){?> selected="selected"<?php }?>>Yes</option>
            <option value="0" <?php if($is_send_from_email=='0'){?> selected="selected"<?php }?>>No</option>
          </select>
        </td>
      </tr><?php */?>
      <tr>
        <td>Default Currency (Ex.: USD)</td>
        <td><input type="text" name="currency" value="<?php echo $currency;?>" /></td>
      </tr>
      <tr>
        <td>Default Currency Symbol (Ex.: $)</td>
        <td><input type="text" name="currencysym" value="<?php echo $currencysym;?>" /></td>
      </tr>
      <tr>
        <td>Paypal User ID (user payments will be sent here)</td>
        <td><input type="text" name="paypal_merchantid" value="<?php echo $paypal_merchantid;?>" /></td>
      </tr>
      <tr>
        <td>Classifieds  Duration in days (how long the ads should be displayed on the site?)</td>
        <td><input type="text" name="ads_days" value="<?php echo $ads_days;?>" /></td>
      </tr>
      <tr>
        <td>Default  Price for Classifieds </td>
        <td><input type="text" name="ads_price" value="<?php echo $ads_price;?>" /></td>
      </tr>
      <tr>
        <td>Featured Listing Price</td>
        <td><input type="text" name="feature_ads_price" value="<?php echo $feature_ads_price;?>" /></td>
      </tr>
      <tr>
        <td>Maximum  Characters per Classifieds</td>
        <td><input type="text" name="max_ads_char" value="<?php echo $max_ads_char;?>" /></td>
      </tr>
         <tr>
        <td>Classified Default  Status (when a user posts a classified, should they auto publish?)</td>
        <td><select name="approve_ads">
            <option value="publish" <?php if($approve_ads=='publish'){?> selected="selected"<?php }?>>Publish</option>
            <option value="draft" <?php if($approve_ads=='draft'){?> selected="selected"<?php }?>>Draft</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Classifieds Images Path (<?php global $upload_folder_path;  echo get_option('siteurl') . "/$upload_folder_path";?>) <br />
          (Default folder is "products_img") </td>
        <td><input type="text" name="imagepath" value="<?php echo $imagepath;?>" /></td>
      </tr>
      <tr>
        <td>Google Map Key
        <br />
        To show the google map on the site, It is unique for each domain name.
        <br />You can generate from 
        <a href="http://code.google.com/apis/maps/signup.html" target="_blank">Google API Key</a> and just paste and submit.
        </td>
        <td><input type="text" name="google_map_key" value="<?php echo $google_map_key;?>" /></td>
      </tr>
       
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit" class="button-secondary action" /></td>
      </tr>
    </thead>
  </table>
</form>
