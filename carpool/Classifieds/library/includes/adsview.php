<?php
session_start();
ob_start();
set_time_limit(0);
global $upload_folder_path;
if(!$current_user->data->ID)
{
	wp_redirect(get_settings('home').'/index.php?page=login');
	exit;
}
global $wpdb,$General,$extension_file;
//$_SESSION['ads_information_session'] = '';

$user_path = array();
$user_path = $_POST['hidden_image'];
$hidden_image = $_POST['hidden_image'];

foreach($_POST as $key=>$val)
{
	$_POST[$key] = stripslashes($val);	
}

if(count($_FILES['images']['name'])>0)
{
	$generalinfo = $General->get_general_settings();
	if($generalinfo['imagepath'])
	{
		$imagepath = $generalinfo['imagepath'];
	}else
	{
		$imagepath = 'products_img';
	}	
	//$destination_path = ABSPATH . "$upload_folder_path".$imagepath."/";
	
	$dirinfo = wp_upload_dir();	
	$destination_path =$dirinfo['basedir']."/".$imagepath."/"; 	
	if (!file_exists($destination_path))
	{
		$imagepatharr = explode('/',$upload_folder_path."$imagepath");
		$year_path = ABSPATH;
		for($i=0;$i<count($imagepatharr);$i++)
		{
			if($imagepatharr[$i])
			{
			 	$year_path .= $imagepatharr[$i]."/";
				if (!file_exists($year_path)){
				  mkdir($year_path, 0777);
			  	}     
			}
		}
		$imagepatharr = explode('/',$imagepath);
		$upload_path = ABSPATH . "$upload_folder_path";
		if (!file_exists($upload_path)){
		mkdir($upload_path, 0777);
		}
		for($i=0;$i<count($imagepatharr);$i++)
		{
		  if($imagepatharr[$i])
		  {
			  $year_path = ABSPATH . "$upload_folder_path".$imagepatharr[$i]."/";
			  if (!file_exists($year_path))
			  {
				  mkdir($year_path, 0777);
			  }     
			  @mkdir($destination_path, 0777);
		}
		}
		}
	for($i=0;$i<count($_FILES['images']['name']);$i++)
	{
		$name = time().'_'.$_FILES['images']['name'][$i];
		$tmp_name = $_FILES['images']['tmp_name'][$i];
		$target_path = $destination_path . str_replace(',','',$name);
		$file_ext= substr($target_path, -4, 4);		
		if(in_array($file_ext,$extension_file))
		{				
			if(@move_uploaded_file($tmp_name, $target_path)) 
			{
				$imagepath1 = $dirinfo['baseurl']."/".$imagepath."/".$name;
				$upload_path = get_option('upload_path');				
				$imagepath1 = str_replace($upload_path,'files',$imagepath1);
				$user_path[] = $imagepath1;
				$result = 1;
			}
		}
	}
}

?>
<?php get_header(); ?>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script> var closebutton='<?php bloginfo('template_directory'); ?>/library/js/closebox.png'; </script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/fancyzoom.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/library/css/thickbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('div.photo a').fancyZoom({scaleImg: true, closeOnClick: true});
	$('#medium_box_link').fancyZoom({width:400, height:300});
	$('#large_box_link').fancyZoom();
	$('#flash_box_link').fancyZoom();
});
</script>

<div id="page">
 <div id="content-wrap" class="clear" >
 
<div id="content" class="content-in-detail" >

<script>
function go_back()
{
	document.paypalfrm_top.action = "<?php echo get_option('siteurl');?>/?page=ads";
	document.paypalfrm_top.submit();
}
function set_price()
{
	document.paypalfrm_top.amount.value = document.paypalfrm.amount.value;
}
</script>
<form method="post" action="<?php echo get_option('siteurl');?>/?page=paynow" name="paypalfrm_top">
<input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>" />
<div class="post_preview">
    
        <h3> <?php _e(PREVIEW_YOUR_LISTING_TEXT);?> </h3>
        
        <div class="post_preview_in">
                 
            <div class="post_preview_button">
                  <?php 
                  $_POST['totalprice'] = $priceamt;
                  $adsinfo['post'] = $_POST;
                  $adsinfo['images'] = $user_path;
                  $_SESSION['ads_information_session'] = $adsinfo;
				  
                 ?>
                  <input type="hidden" name="amount" value="<?php echo $priceamt;?>"   />
                  <input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
                  <input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>" />
                 <?php
                 if($_REQUEST['pid'] && $_REQUEST['type'] == '')
                 {
                 ?>
                 <input type="submit" name="paynow" value="<?php _e(UPDATE_BUTTON);?>" class="b_continue" />
                 <?php
                 }else
                 {
                 ?>
                 <input type="submit" name="paynow" onclick="set_price();" value="<?php _e(PAYNOW_BUTTON);?>" class="b_continue" />
                 <?php
                 }
                 ?>
                
                <span class="alignleft">or</span>  <input type="button" name="back" class="back" value="<?php _e(BACK_BUTTON);?>" onclick="window.location.href='<?php echo get_option('siteurl');?>/?page=ads&backedit=1<?php if($_REQUEST['pid']){ echo "&pid=".$_REQUEST['pid'];}?>'"  /></a>
            </div>
        
        </div>
    
</div> <!-- post preview #end -->
</form>

  <!--post title-->
  <div class="listings bnone">
    <h1  class="title" id="post-<?php the_ID(); ?>"> 
      <?php echo $_POST['post_title']; ?>
       </h1>
       <p class="time"><span class="i_clock alignleft">
		<?php 
        if($_REQUEST['pid'])
        {
            echo date('j F, Y',strtotime($post->post_date)); ?> at <?php echo date('g:i a',strtotime($post->post_date));
        }else
        {
            echo date('j F, Y',time()); ?> at <?php echo date('g:i a',time());
        }
        ?> 
       </span> 
       <strong class=" red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
      
    <div class="details_left">
      <?php 
	 	$mimg = '';		
		if($user_path && !empty($user_path))
		{
			$post_images_arr = $user_path;
			$mimg = $post_images_arr[0];			
			$image_path1 = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);			
			if(!file_exists($image_path1) && get_option('upload_path'))
			{
				$src = str_replace("/files/", str_replace('wp-content','',get_option('upload_path'))."/", str_replace(get_option( 'siteurl' ),'',$mimg));
				$image_path1 = WP_CONTENT_DIR.$src ;
			}
			
			if(file_exists($image_path1))
			{
				$mimg = $mimg;
			}else
			{
				$mimg = '';
			}
		}
	  if($mimg != '')
	  {	  
			$img_size = bdw_get_images_with_info($post->ID,'singlepage-thumb');
			$post_images = $img_size[0]['file'];
		?>
	      <div class="photo photo_main"  ><a href="#productimage"><img src="<?php echo $mimg; ?>" alt=""/></a></div>
          <div style="display: none;" id="productimage" > <img src="<?php echo $mimg; ?>" alt="helmet"> </div>
      <?php
	  }else
	  {
	  	echo '<div class="imgnot_available2" >No Image Available</div>';
	  }
	  ?> 
     <?php 
	 $mimg = '';
	  if(count($user_path)>1)
	  {
	  	for($im=1;$im<count($user_path);$im++)
		{
			$mimg = '';
			$mimg = $user_path[$im];
			$image_path1 = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
			if(!file_exists($image_path1) && get_option('upload_path'))
			{
				$src = str_replace("/files/", str_replace('wp-content','',get_option('upload_path'))."/", str_replace(get_option( 'siteurl' ),'',$mimg));
				$image_path1 = WP_CONTENT_DIR.$src ;	
			}
			if(file_exists($image_path1))
			{
				$mimg = $mimg;
			}else
			{
				$mimg = '';
			}
			if($mimg)
			{
		  ?>
          <?php
			$img_size = bdw_get_images_with_info($post->ID,'latestpost-thumb');
			$post_images = $img_size[0]['file'];
		?>
		  <div class="photo" style="none; border:1px solid #ccc;" > <a href="#productimage_<?php echo $im;?>"><img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgdetails" /></a> 
          <div style="display: none;" id="productimage_<?php echo $im;?>" > <img src="<?php echo $mimg; ?>" alt=""> </div>
          </div> 
		  <?php
			}
	  	}
	  }
	  ?>
    </div><!--details left-->
       
   <div class="details_right">
      
      <div class="pcontactinfo">
        <h3><?php _e(CONTACT_DETAILS_TEXT);?></h3>
        <h4><?php echo $_POST['owner_name'];?></h4>
        <?php
        if($_POST['owner_email'])
		{
		?>
         	<p class="i_mail2 clearfix"> <span><?php _e(EMAIL_TEXT);?> : </span> <span class="contact_right"><?php echo $_POST['owner_email'];?></span></p>
         <?php }
		 if($_POST['owner_phone'])
		 {
		 ?>
        <p class="i_phone clearfix"><span><?php _e(PHONE_NUMBER_TEXT);?> :</span> <span class="contact_right"><?php echo $_POST['owner_phone'];?></span></p>
        <?php
        }
		 if($_POST['post_location'])
		 {
		?>
        <p class="i_map clearfix"><span><?php _e(LOCATION_TEXT);?> :</span> <span class="contact_right"><?php echo $_POST['post_location'];?></span></p>
        <?php 
		}
		 if($_POST['post_url'])
		 {
		?>  
        <p class="i_website clearfix"><span><?php _e(URL_SINGLE_TEXT);?> :</span> <span class="contact_right"><a href="<?php echo $_POST['post_url'];?>" target="_blank"> 
		<?php echo $_POST['post_url'];?></a> </span></p>      

		<?php }?>
</div><!--pcontactinfo end -->
    <?php //echo $_POST['description'];?>
    <?php echo stripslashes($_POST['description']);?>
    
    </div>
 
           <?php
        
		 if($_POST['post_tags'])
		 {
		?>
         <div class="post_bottom"> 
         <span class="i_tags"> <?php echo $_POST['post_tags'];?> </span>
          </div>
         <?php
         }
		 ?>
		<?php
        if($_REQUEST['pid']=='' || $_REQUEST['type'] != '')
        {
        ?>      
         <div class="payment_section">
         	<table class="table" cellpadding="0" cellspacing="0" border="0" >
            	<tr>
                	<td class="title"> <?php _e('Qty');?></td>
                    <td class="title"> <?php _e('Payment Description');?></td>
                    <td class="title"> <?php _e('Amount');?></td>
                </tr>
                <tr>
                <td>1</td>
                <td><?php //_e(BASIC_AMOUNT_TEXT);?><?php echo $_POST['post_title']; ?></td>
                <td>
				<?php
                global $General;
				$generalinfo = $General->get_general_settings();
				echo $General->get_currency_symbol().number_format($generalinfo['ads_price'],2);
				?></td>
                </tr>
                 <?php
				$subamt = 0;
				$is_Category_show_flag = 0;
				$priceamt = $generalinfo['ads_price'];
				if($General->get_category_price($_POST['termid']))
				{
					$catprice = $General->get_category_price($_POST['termid']);
					if($catprice!='')
					{
						$subamt = $catprice-$generalinfo['ads_price'];
					}
					if($subamt && $subamt>0)
					{
						$is_Category_show_flag = 1;
					}
					elseif($subamt && $subamt<0)
					{
						$is_Category_show_flag = 1;
					}
					
				}
				
				if($is_Category_show_flag)
				{
				?>
                <tr>
                <td></td>
                <td><?php echo CAT_WISE_PRICE_TEXT;?></td>
                <td>
                <?php
				$subamt = 0;
				$priceamt = $generalinfo['ads_price'];
				if($General->get_category_price($_POST['termid']))
				{
					$catprice = $General->get_category_price($_POST['termid']);
					if($catprice!='')
					{
						$subamt = $catprice-$generalinfo['ads_price'];
					}
					if($subamt != '' && $subamt>0)
					{
						$catprice = '+'.$General->get_currency_symbol().number_format(abs($subamt),2);
						echo $catprice;
						$priceamt = $generalinfo['ads_price'] + $subamt;
					}
					elseif($subamt != '' && $subamt<0)
					{
						$catprice = '-'.$General->get_currency_symbol().number_format(abs($subamt),2);
						echo $catprice;
						$priceamt = str_replace(',','',$generalinfo['ads_price']) + str_replace(',','',$subamt);
					}
					
				}
			  ?>
                 </td>
                </tr>
               <?php }?>
               <?php
			  if($_POST['feature_prd'])
			  {//print_r($_POST);
			  ?>
               <tr>
               <td></td>
               <td><?php _e(FEATURE_PRODUCT_TEXT);?></td>
               <td>
               <?php 
				echo $General->get_currency_symbol().$General->get_featured_price();
				$priceamt = str_replace(',','',$priceamt) + str_replace(',','',$General->get_featured_price());
				?>
               </td>
               </tr>
               <?php
				}
				?>
                <?php
                if($_POST['coupon_code'])
				{
				?>
                <tr><td></td><td>
                <?php _e(DISCOUNT_AMOUNT_TEXT);?>
                </td>
                <td>
				<?php
                $discount_amt = $General->get_discount_amount($_POST['coupon_code'],$priceamt);
				if($discount_amt)
				{
					echo $General->get_currency_symbol().number_format($discount_amt,2);
					if($discount_amt>0)
					{
						$priceamt = $priceamt - $discount_amt;
						$coupon_code = $_POST['coupon_code'];
					}
				}else
				{
					_e(INVALID_COUPON_TEXT);		
				}
				?>
                </td></tr>
                <?php }?>
                 <tr>
                	<td class="total"> </td>
                    <td class="total"> <?php _e(TOTAL_AMT_TEXT);?></td>
                    <td class="total" > <?php echo $General->get_currency_symbol().number_format($priceamt,2);?></td>
                </tr>
            </table>
         </div>
    	<?php
        }
		?>
      <form method="post" action="<?php echo get_option('siteurl');?>/?page=paynow" name="paypalfrm">
     <?php if($_REQUEST['type']){?>
      <input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
      <?php }?>
	<input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>" />
	<input type="hidden" name="feature_prd" value="1" />
		<div class="post_preview">
        	
             
                
                <div class="post_preview_in">
                 		 
                	<div class="post_preview_button">
                          <?php 
						  $_POST['totalprice'] = $priceamt;
						  $adsinfo['post'] = $_POST;
						  $adsinfo['images'] = $user_path;
						  $_SESSION['ads_information_session'] = $adsinfo;
						 ?>
						  <input type="hidden" name="amount" value="<?php echo $priceamt;?>"   />
                          <input type="hidden" name="coupon_code" value="<?php echo $coupon_code;?>"   />
						 <?php
						 if($_REQUEST['pid'] && $_REQUEST['type'] == '')
						 {
						 ?>
						 <input type="submit" name="paynow" value="<?php _e(UPDATE_BUTTON);?>" class="b_continue" />
						 <?php
						 }else
						 {
						 ?>
						 <input type="submit" name="paynow" value="<?php _e(PAYNOW_BUTTON);?>" class="b_continue" />
						 <?php
						 }
						 ?>                        
                        <span class="alignleft">or</span>  <input type="button" name="back" class="back" value="<?php _e(BACK_BUTTON);?>" onclick="window.location.href='<?php echo get_option('siteurl');?>/?page=ads&backedit=1<?php if($_REQUEST['pid']){ echo "&pid=".$_REQUEST['pid'];}?>'"  /></a>
                    </div>                
                </div>            
        </div> <!-- post preview #end -->
    </form>
    <!--single.php end-->
    </div>
</div>
<?php get_footer(); ?>