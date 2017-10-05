<?php
/*
Template Name: Create a Job
*/
?>
<?php
session_start();
ob_start();
set_time_limit(0);
if($_REQUEST['backedit']=='')
{
	$_SESSION['ads_information_session'] = array();
}
if(!$current_user->data->ID)
{
	wp_redirect(get_settings('home').'/index.php?page=login');
	exit;
}
global $wpdb,$General;
$generalinfo = $General->get_general_settings();

$pid = $_REQUEST['pid'];
$data = array();
if($_SESSION['ads_information_session']['post'])
{
	$post_info = $_SESSION['ads_information_session']['post'];
	$data['post_title'] =  $post_info['post_title'];
	$data['description'] =  $post_info['description'];
	$data['post_location'] = $post_info['post_location'];
	$data['geo_latitude'] = $post_info['geo_latitude'];
	$data['geo_longitude'] = $post_info['geo_longitude'];
	
	$data['post_url'] = $post_info['post_url'];
	$data['owner_name'] = $post_info['owner_name'];
	$data['owner_email'] = $post_info['owner_email'];
	$data['owner_phone'] = $post_info['owner_phone'];
	$data['termid'] = $post_info['termid'];
	$data['post_tags'] = $post_info['post_tags'];
	$data['coupon_code'] = $post_info['coupon_code'];
	$data['feature_prd'] = $post_info['feature_prd'];
	if($_SESSION['ads_information_session']['images'])
	{
		$post_images = implode(',',$_SESSION['ads_information_session']['images']);
	}
}
elseif($pid)
{
	$post_info = $General->get_post_info($pid);
	$data['post_title'] =  $post_info['post_title'];
	$data['description'] =  $post_info['post_content'];
	$catinfoarr = get_the_category($post_info['ID']);
	$isfeature = '';
	for($c=0;$c<count($catinfoarr);$c++)
	{
		if($catinfoarr[$c]->term_id == $generalinfo['feature_catid'])
		{
			$isfeature = 'checked="checked"';
		}else
		{
			$data['termid'] = $catinfoarr[$c]->term_id;
		}
	}
	$data['post_location'] = get_post_meta($post_info['ID'], 'post_location', $single = true);
	$data['geo_latitude'] = get_post_meta($post_info['ID'], 'geo_latitude', $single = true);
	$data['geo_longitude'] = get_post_meta($post_info['ID'], 'geo_longitude', $single = true);
	$data['post_url'] = get_post_meta($post_info['ID'], 'post_url', $single = true);
	$data['owner_name'] = get_post_meta($post_info['ID'], 'owner_name', $single = true);
	$data['owner_email'] = get_post_meta($post_info['ID'], 'owner_email', $single = true);
	$data['owner_phone'] = get_post_meta($post_info['ID'], 'owner_phone', $single = true);
	$post_images = get_post_meta($post_info['ID'], 'post_images', $single = true);
	$tagsarr = get_the_tags($post_info['ID']);
	if($tagsarr)
	{
		$tags = array();
		foreach($tagsarr as $key=>$val)
		{
		$tags[] = $val->name;
		}
		$post_tags = implode(',',$tags);
		$data['post_tags'] = $post_tags;
	}
}
//echo "<pre>";
//print_r($_SESSION['ads_information_session']);
?>

<?php get_header(); ?>

<div id="page">
<div id="content-wrap" class="clearfix" >

<div id="content" class="content-in-detail_form">
<h1><?php _e(POST_CLASSIFIED_PAGE_TITLE);?> </h1>


<div class="clearfix" ><p class="alignright ">
<span class="indicates">*</span>
Indicates mandatory fields </p>
</div>

<form name="createjob_frm" id="createjob_frm" action="<?php echo get_option('siteurl');?>/?page=adsview" method="post" enctype="multipart/form-data">
<input type="hidden" name="pid" value="<?php echo $pid;?>" />
 
     <div class="create_post_row clearfix"> <label><?php _e(SELECT_CAT_TEXT);?> : <span class="indicates">*</span> </label>
     
     
     <select name="termid"  id="termid" class="select">
     <option value=""><?php _e(SELECT_CAT_DL_TEXT);?></option>
     <?php
    	$blogcatids = $General->get_blog_catid();
		$excludecat = '1,'.$General->get_feature_catid();
		if($blogcatids)
		{
			$excludecat .= ','.$blogcatids;
		}
		
		echo  $General->get_category_dropdown_options($data['termid'],$excludecat);
	 ?>
     </select>
      <span id="termidInfo"></span>
      </div>  
     
   
     <div class="create_post_row clearfix"> <label> <?php _e(ADS_TITLE_TEXT);?> : <span class="indicates">*</span> </label>  
    <input name="post_title" id="post_title" value="<?php echo $data['post_title'];?>" type="text" class="textfield required email" />
    <span id="post_titleInfo"></span>
     </div>
 
     
     
    <div class="create_post_row clearfix"> <label> <?php _e(LOCATION_TEXT);?> : <span class="indicates">*</span>  </label>
    <input name="post_location" id="post_location" value="<?php echo $data['post_location'];?>" type="text" class="textfield"  />
    <span id="post_locationInfo"></span>
     </div>
     
    <div class="create_post_row"> <label> <?php _e(DESCRIPTION_TEXT);?> : <!--<span class="indicates">*</span>-->  </label>
     <textarea cols="" rows="4" class="textarea" name="description" id="description"  ><?php echo $data['description'];?></textarea>
     
	<?php
		// default settings
		$settings =   array(
			'wpautop' => true, // use wpautop?
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_name' => 'description', // set the textarea name to something different, square brackets [] can be used here
			'textarea_rows' => '10', // rows="..."
			'tabindex' => '',
			'editor_css' => '<style>.wp-editor-wrap{width:640px;margin-left:0px;}</style>', // intended for extra styles for both visual and HTML editors buttons, needs to include the <style> tags, can use "scoped".
			'editor_class' => '', // add extra class(es) to the editor textarea
			'teeny' => false, // output the minimal editor config used in Press This
			'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
			'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
			'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
		);								
		//wp_editor($data['description'], 'description', $settings);
				?>
     <span id="descriptionInfo"></span>
     <input type="hidden" name="description_max_len" id="description_max_len" value="<?php echo $generalinfo['max_ads_char'];?>" />
    <?php
    if($generalinfo['max_ads_char'])
	{
	?>
      
        <span class="note"> <?php _e(MAX_CHARS_MSG);?> <?php echo $generalinfo['max_ads_char'];?>  <?php _e('chars');?>.</span>
     <?php
     }
	 ?>
      </div>
     <?php
     global $user_identity;
	get_currentuserinfo();
	 ?>
    <div class="create_post_row clearfix">  <label> <?php _e(OWNER_NAME_TEXT);?> : <span class="indicates"></span></label>
     <?php
     if($data['owner_name'])
	 {
	 	$owner_name = $data['owner_name'];
	 }else
	 {
	 	$owner_name = $current_user->data->display_name ;
	 }
	 if($data['owner_email'])
	 {
	 	$owner_email = $data['owner_email'];
	 }else
	 {
	 	$owner_email = $current_user->data->user_email ;
	 }
	 $userinfoarr = unserialize($current_user->data->user_address_info);
	 if($data['owner_phone'])
	 {
	 	$owner_phone = $data['owner_phone'];
	 }else
	 {
	 	$owner_phone = $userinfoarr['user_phone'] ;
	 }
	 if($data['post_url'])
	 {
	 	$post_url = $data['post_url'];
	 }else
	 {
	 	$post_url = $current_user->data->user_url ;
	 }
	
	 
	 ?>
     <input name="owner_name" id="owner_name" value="<?php echo $owner_name;?>" disabled="disabled" type="text" class="textfield"  />
     <span id="owner_nameInfo"></span>
      </div>
    
    
    
      
    <div class="create_post_row clearfix">  <label><?php _e(INQUIRY_EMAIL_TEXT);?> : <span class="indicates">*</span> </label>
      <input name="owner_email" id="owner_email" value="<?php echo $owner_email;?>" type="text" class="textfield"  /> <span class="note"><?php _e(INQUIRY_EMAIL_TEXT_NOTE);?> </span>
      <span id="owner_emailInfo"></span>
       </div>
   
   
   
      
    <div class="create_post_row clearfix"> <label><?php _e(PHONE_TEXT);?> : </label> 
    <input name="owner_phone" id="owner_phone" value="<?php echo $owner_phone;?>" type="text" class="textfield" /> </div>
     
     
     
     
   
   <div style="clear:both;">
     <?php
     if($post_images!='')
	 {
	 	$post_images_arr = explode(',',$post_images);
		for($i=0;$i<count($post_images_arr);$i++)
		{
			?>
            
            
           <div style="width:50px;   float:left; margin:0 11px 11px 0; " id="img_<?php echo $i;?>" >
           <?php
			$img_size = bdw_get_images_with_info($post->ID,'latestpost-thumb');
			$post_images = $img_size[0]['file'];
		?>
           <img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>"   />
           <input type="hidden" name="hidden_image[]" value="<?php echo $post_images_arr[$i]; ?>" />
           <a href="javascript:void(0);" onClick="removeImage('<?php echo $post_images_arr[$i]; ?>','img_<?php echo $i;?>');"><?php _e(REMOVE_LINK_TEXT);?></a>
           </div>

           
            <?php
		}
	 }
	 ?>
		           </div>
      </div>
     <input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
     <?php
    if($_REQUEST['pid'])
	{
		if($isfeature!='')
		{
	?>
    <input type="hidden" name="feature_prd" value="1" />
    <strong><?php _e(POST_ADS_FEATURE_MSG1);?></strong>
    <?php
		}
	}else
	{
	?>
    	
    <?php		 
		 if($generalinfo['feature_catid'])
		 {
		?>
        <div class="create_post_row clearfix"> <span class="pay_basic"><?php _e(POST_ADS_FEATURE_MSG2);?> <strong> <?php echo $generalinfo['currencysym'].$generalinfo['ads_price'];?>.</strong></span></div>
		 
		<div class="create_post_row clearfix row_spacer">  <span class="featured_ads_price">  <input type="checkbox" <?php echo $isfeature;?> <?php if($data['feature_prd']){ echo 'checked="checked"';}?>  name="feature_prd" value="1" /> <?php _e(POST_ADS_FEATURE_MSG3);?>
		<?php if($isfeature ==''){?>
		<?php _e(POST_ADS_FEATURE_MSG4);?> <strong class="extra_price">  <?php echo $generalinfo['currencysym'].$generalinfo['feature_ads_price'];?> </strong> <?php _e(POST_ADS_FEATURE_MSG5);?>
		<?php }?>  </span>   
		</div>
		 
		<?php 
		 }
	 }
	 ?>
     <input type="submit" name="submit" value="<?php _e(PREVIEW_BUTTON);?>"  class="normal_button preview" />  
</form>
<script>
function removeImage(imagename,divid)
{
	document.getElementById(divid).innerHTML='';
}
</script>   
<script>
var Row = 1;
function customClick(customfield,nameval)
{
	Row++;

	var email_div = customfield+'_div';
	var emailDiv=document.getElementById(email_div);
	var newDiv=document.createElement('div');
	newDiv.setAttribute('id',email_div+Row);
	newDiv.setAttribute('style','margin-top:5px');
	var newTextBox=document.createElement('input');
	
	newTextBox.type='file';
	newTextBox.setAttribute('id',customfield+'_name'+Row);
	newTextBox.setAttribute('name','images[]');
	newTextBox.setAttribute('class','textbox');
	newTextBox.setAttribute('size','15');
	newTextBox.setAttribute('maxlength','50');
	newTextBox.setAttribute('style','width:auto');
	if(nameval){newTextBox.setAttribute('value',nameval);}else{newTextBox.setAttribute('value',customfield);}			
	newTextBox.setAttribute("onblur","if(this.value=='') this.value = '"+customfield+"';");
	newTextBox.setAttribute("onfocus","if(this.value=='"+customfield+"') this.value= '';");
	
	nameStr = document.getElementById(customfield+'Title').value;
	valueStr = document.getElementById(customfield+'Id').value;
	
	var newLink = document.createElement('a');
	newLink.setAttribute('class','smallLink');
	newLink.setAttribute('href','javascript:void(0)');
	newLink.setAttribute('tabindex','2');
	
	document.getElementById('Count').value = Row;
	
	var linkText=document.createTextNode('Remove');
	newLink.appendChild(linkText);
	newLink.onclick=function RemoveEntry() { var imDiv=document.getElementById(email_div);

	emailDiv.removeChild(this.parentNode);	
	}

	newDiv.appendChild(newTextBox);
	newDiv.appendChild(document.createTextNode('\u00A0\u00A0\u00A0\u00A0'));
	newDiv.appendChild(newLink);
	emailDiv.appendChild(newDiv);
}
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/adv_validation.js"></script> 
</div><!--content end -->

<?php include (TEMPLATEPATH . "/footer_index.php"); ?>