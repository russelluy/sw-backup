<?php

global $wpdb,$General;
global $upload_folder_path;
$url = 'https://www.paypal.com/cgi-bin/webscr';

$postdata = '';

foreach($_POST as $i => $v) 

{

	$postdata .= $i.'='.urlencode($v).'&amp;';

}

$postdata .= 'cmd=_notify-validate';

 

$web = parse_url($url);

if ($web['scheme'] == 'https') 

{

	$web['port'] = 443;

	$ssl = 'ssl://';

} 

else 

{

	$web['port'] = 80;

	$ssl = '';

}

$fp = @fsockopen($ssl.$web['host'], $web['port'], $errnum, $errstr, 30);

 

if (!$fp) 

{

	echo $errnum.': '.$errstr;

}

else

{

	fputs($fp, "POST ".$web['path']." HTTP/1.1\r\n");

	fputs($fp, "Host: ".$web['host']."\r\n");

	fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");

	fputs($fp, "Content-length: ".strlen($postdata)."\r\n");

	fputs($fp, "Connection: close\r\n\r\n");

	fputs($fp, $postdata . "\r\n\r\n");

 

	while(!feof($fp)) 

	{

		$info[] = @fgets($fp, 1024);

	}

	fclose($fp);

	$info = implode(',', $info);

	if (eregi('VERIFIED', $info)) 

	{

		$to = get_option('site_email_id');

		

		// yes valid, f.e. change payment status

		$postid = $_POST['custom'];

		$item_name = $_POST['item_name'];

		$txn_id = $_POST['txn_id'];

		$payment_status       = $_POST['payment_status'];

		$payment_type         = $_POST['payment_type'];

		$payment_date         = $_POST['payment_date'];

		$txn_type             = $_POST['txn_type'];

		

		$default_status = $General->get_ads_default_status();

		$sql = "update $wpdb->posts set post_status=\"$default_status\" where ID=\"$postid\"";

		$wpdb->query($sql);

		

		$transaction_details .= "--------------------------------------------------\r";

		$transaction_details .= "Payment Details for Ads Post ID #$postid\r";

		$transaction_details .= "--------------------------------------------------\r";

		$transaction_details .= " Title: $item_name \r";

		$transaction_details .= "--------------------------------------------------\r";

		$transaction_details .= "Trans ID: $txn_id\r";

		$transaction_details .= "  Status: $payment_status\r";

		$transaction_details .= "    Type: $payment_type\r";

		$transaction_details .= "  Date: $payment_date\r";

		$transaction_details .= "  Method: $txn_type\r";

		$transaction_details .= "--------------------------------------------------\r";

		$subject = PAYMENT_CONFIRM_EMAIL_SUBJECT;

		

		//mail($to,$subject,$transaction_details,$headerarr);

///////////email start//////////

		$store_name = get_option('blogname');

		$siteemail_name = $General->get_site_emailName();

		$siteemail_id = $General->get_site_emailId();

		$postinfo = get_post($postid);

		$author_id = $postinfo->post_author;

		$user_email = $wpdb->get_var("select user_email from $wpdb->users where ID = \"$author_id\"");

		$userName = $wpdb->get_var("select user_nicename 	 from $wpdb->users where ID = \"$author_id\"");

		

		$admindestinationfile =   ABSPATH . $upload_folder_path."notification/emails/paypal_ipn_payment_success_customer.txt";

		if(file_exists($admindestinationfile))

		{

			$customer_message = file_get_contents($admindestinationfile);

		}else

		{

			$customer_message = '[SUBJECT-STR]Payment Success Acknowledge[SUBJECT-END]

								<p>Dear [#$to_name#],</p>

								<p>[#$transaction_details#]</p>

								<br>

								<p>We hope you enjoy. Thanks!</p>

								<p>[#$store_name#]</p>';

		}

		$filecontent_arr1 = explode('[SUBJECT-STR]',$customer_message);

		$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);

		$customer_subject = $filecontent_arr2[0];

		if($customer_subject == '')

		{

			$customer_subject = PAYMENT_CONFIRM_EMAIL_SUBJECT;

		}

		$customer_message = $filecontent_arr2[1];

		$search_array = array('[#$to_name#]','[#$transaction_details#]','[#$store_name#]');

		$replace_array = array($customer_address,$transaction_details,$store_name);

		$customer_message = str_replace($search_array,$replace_array,$customer_message);

		$General->sendEmail($siteemail_id,$siteemail_name,$user_email,$userName,$subject,$customer_message,$extra='');///To customer

		

		$admindestinationfile =   ABSPATH . $upload_folder_path."notification/emails/paypal_ipn_payment_success_supplier.txt";

		if(file_exists($admindestinationfile))

		{

			$supplier_message = file_get_contents($admindestinationfile);

		}else

		{

			$supplier_message = '[SUBJECT-STR]Payment Success Acknowledge[SUBJECT-END]

								<p>Dear [#$to_name#],</p>

								<p>[#$transaction_details#]</p>

								<br>

								<p>Thanks!</p>

								<p>[#$store_name#]</p>';

		}

		$filecontent_arr1 = explode('[SUBJECT-STR]',$customer_message);

		$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);

		$supplier_subject = $filecontent_arr2[0];

		if($supplier_subject == '')

		{

			$supplier_subject = PAYMENT_CONFIRM_EMAIL_SUBJECT;

		}

		$supplier_message = $filecontent_arr2[1];

		$search_array = array('[#$to_name#]','[#$transaction_details#]','[#$store_name#]');

		$replace_array = array($supplier_address,$transaction_details,'Pay Pal');

		$supplier_message = str_replace($search_array,$replace_array,$supplier_message);

		$paypalid = $General->get_paypal_merchantID();

		$General->sendEmail($paypalid,'Pay Pal',$siteemail_id,$siteemail_name,$subject,$supplier_message,$extra='');///To supplier

		//////////////////email end/////////

	}

	else

	{

		// invalid, log error or something

	}

}

?>

