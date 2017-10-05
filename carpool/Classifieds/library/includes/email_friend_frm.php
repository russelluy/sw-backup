<?php
if($_POST)
{
	global $General;
	$generalinfo = $General->get_general_settings();
	$yourname = $_POST['yourname'];

	$youremail = $_POST['youremail'];

	$frnd_subject = $_POST['frnd_subject'];

	$frnd_comments = $_POST['frnd_comments'];

	$pid = $_POST['pid'];

	$to_email = $_POST['to_email'];

	$to_name = $_POST['to_name'];

	

	if($_REQUEST['pid'])

	{

		$productinfosql = "select ID,post_title from $wpdb->posts where ID =".$_REQUEST['pid'];

		$productinfo = $wpdb->get_results($productinfosql);

		foreach($productinfo as $productinfoObj)

		{

			$post_title = $productinfoObj->post_title; 

		}

	}

	///////Inquiry EMAIL START//////

	global $General;

	//$site_emailId = $General->get_site_emailId();

	//$site_email_name = $General->get_site_emailName();

	$store_name = get_option('blogname');
	global $upload_folder_path;
	$clientdestinationfile =   ABSPATH . $upload_folder_path."notification/emails/email_post.txt";

	if(!file_exists($clientdestinationfile))

	{

		$message1 = '[SUBJECT-STR]Email the post [SUBJECT-END]
					<p>Dear [#$to_name#],</p>
					<p>Here is message related to <b>[#$post_title#]</b> </p>
					<p><b>Subject : [#$frnd_subject#]</b></p>
					<p>[#$frnd_comments#]</p>
					<p>Thank you, [#$your_name#]</p>';

	}else

	{

		$message1 = file_get_contents($clientdestinationfile);

	}

	$filecontent_arr1 = explode('[SUBJECT-STR]',$message1);

	$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);

	$subject = $filecontent_arr2[0];

	if($subject == '')

	{

		$subject = $frnd_subject;

	}

	$client_message = $filecontent_arr2[1];
	$post_url_link = '<a href="'.get_option('siteurl').'/?p='.$_REQUEST['pid'].'">'.$post_title.'</a>';
	/////////////customer email//////////////
	$yourname_link = $yourname.'<br>Send from - <b><a href="'.get_option('siteurl').'">'.get_option('blogname').'</a></b>.';
	$search_array = array('[#$to_name#]','[#$post_title#]','[#$frnd_subject#]','[#$frnd_comments#]','[#$your_name#]','[#$post_url_link#]');

	$replace_array = array($to_name,$post_url_link,$frnd_subject,nl2br($frnd_comments),$yourname_link,$post_url_link);

	/*echo "from : ".$youremail;

	echo "<br>from name : ".$yourname;

	echo "<br>to name : ".$to_name;

	echo "<br>to email : ".$to_email;*/

	$client_message = str_replace($search_array,$replace_array,$client_message);

	$General->sendEmail($youremail,$yourname,$to_email,$to_name,$subject,$client_message,$extra='');///To clidne email

	//////Inquiry EMAIL END////////	

}

else

{

?>
<?php

if($_REQUEST['pid'])

{

	$productinfosql = "select ID,post_title from $wpdb->posts where ID =".$_REQUEST['pid'];

	$productinfo = $wpdb->get_results($productinfosql);

	foreach($productinfo as $productinfoObj)

	{

		$post_title = $productinfoObj->post_title; 

	}

}

?>
<style>
.inquiry_row {
	margin-bottom:10px;
	overflow:hidden;
	margin-right:20px;
}
.inquiry_row label {
	display:block;
	margin-bottom:5px;
	float:left;
	width:120px;
	font:13px Arial, Helvetica, sans-serif;
}
.inquiry_row .reg_row_textarea {
	padding:4px;
	width:400px;
	height:250px;
	font:12px Arial, Helvetica, sans-serif;
	border:1px solid #ccc;
	font:14px Arial, Helvetica, sans-serif;
}
.inquiry_row .reg_row_textfield {
	padding:4px;
	width:400px;
	font:12px Arial, Helvetica, sans-serif;
	border:1px solid #ccc;
	font:14px Arial, Helvetica, sans-serif;
}
.send_inquiry {
	margin-left:120px;
	margin-right:10px;
}
h4 {
	margin:0 0 15px 0;
	padding:0;
	font:22px Arial, Helvetica, sans-serif;
}
.indicates {
	color:#F00;
}
.b_sendinquiry2 {
	width:100px;
	height:26px;
	border:none;
	margin-left:118px;
	text-transform:uppercase;
	background:#000;
	-moz-border-radius:35px;
	float:left;
	display:block;
	font:bold 12px Arial, Helvetica, sans-serif;
	cursor:pointer;
	color:#fff;
}
.b_sendinquiry2:hover {
	background:#9c0405;
}
.error {
	border:2px solid #F00 !important;
}
.message_error2 {
	font:bold 12px Arial, Helvetica, sans-serif;
	color:#F00;
	clear:both;
	padding-top:4px;
	display:block;
}
</style>
<div>
  <h4>
    <?php _e(EMAIL_FRND_TEXT);?>
  </h4>
  <form name="enquiryfrm" id="enquiryfrm" action="<?php echo get_option('siteurl')."/?page=email_frnd";?>" method="post">
    <input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>" />
    <div class="form" >
      <div class="inquiry_row ">
        <label>
        <?php _e(FRND_NAME_TEXT);?>
        <span class="indicates">*</span></label>
        <input type="text" name="to_name" value="" id="to_name" class="reg_row_textfield" />
        <span id="to_nameInfo"></span> </div>
      <div class="inquiry_row ">
        <label>
        <?php _e(EMAIL_ADDRESS_TEXT);?>
        : <span class="indicates">*</span></label>
        <input type="text" name="to_email" value="" id="to_email" class="reg_row_textfield"  />
        <span id="to_emailInfo"></span> </div>
      <div class="inquiry_row ">
        <label>
        <?php _e(YOUR_NAME_TEXT);?>
        <span class="indicates">*</span></label>
        <input type="text" name="yourname" value="" id="yourname" class="reg_row_textfield" />
        <span id="yournameInfo"></span> </div>
      <div class="inquiry_row ">
        <label>
        <?php _e(EMAIL_ADDRESS_TEXT);?>
        : <span class="indicates">*</span></label>
        <input type="text" name="youremail" value="" id="youremail" class="reg_row_textfield"  />
        <span id="youremailInfo"></span> </div>
      <div class="inquiry_row ">
        <label>
        <?php _e(SUBJECT_TEXT);?>
        : <span class="indicates">*</span></label>
        <input type="text" readonly="readonly" name="frnd_subject" value="<?php echo $post_title;?>" id="frnd_subject" class="reg_row_textfield" />
      </div>
      <div class="inquiry_row ">
        <label>
        <?php _e(COMMENTS_TEXT);?>
        : <span class="indicates">*</span></label>
        <textarea name="frnd_comments" id="frnd_comments" cols="10" rows="3" class="reg_row_textarea" style="height:150px;"  ><?php _e(INQUIRY_CONTENT_DEFAULT);?> 

     </textarea>
        <span id="frnd_commentsInfo"></span> </div>
      <div class="inquiry_row ">
        <input type="submit" name="submit" value="Send" class="b_sendinquiry2" />
      </div>
    </div>
  </form>
</div>
<script language="javascript">
function hideform()
{
window.parent.document.getElementById('infoBacking').style.display = 'none';
window.parent.document.getElementById('info').style.display = 'none';
}
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/email_frnd_validation.js"></script>
<?php

}

?>
