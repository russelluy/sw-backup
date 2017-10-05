<?php
session_start();
ob_start();

if(!$current_user->data->ID)
{
	wp_redirect(get_settings('home').'/index.php?page=login');
	exit;
}
if($_REQUEST['ad'] == '1' && $_REQUEST['pid']!='')
{
	$pid = $_REQUEST['pid'];
	$General->delete_post($pid);
	wp_redirect(get_option('siteurl').'/?page=dashboard&msg=dsuccess');
	exit;
}
global $wpdb,$General;
$generalinfo = $General->get_general_settings();

$pid = $_REQUEST['pid'];
$data = array();
if($pid)
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
	$post_images_arr = explode(',',$post_images);
	$mimg = $post_images_arr[0];
}
$_POST = $data;
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

		<div class="post_preview">
        	
            	<h3> <?php _e(DELETE_YOUR_LISTING_TEXT);?> </h3>
                
                <div class="post_preview_in">
                 		 <div><?php _e(DELETE_ADS_CONFIRMATION_MSG);?></div>
                	<div class="post_preview_button">
						  <a href="<?php echo get_option('siteurl');?>/?page=delete&pid=<?php echo $_REQUEST['pid'];?>&ad=1" class="b_continue" ><?php _e(DELETE_BUTTON);?></a>
                          <span class="alignleft">or</span>  <a href="<?php echo get_option('siteurl');?>/?page=dashboard"><input type="button" name="back" class="back" value="<?php _e(DELETE_BACK_BUTTON);?>" /></a>
                    </div>
                
                </div>
            
        </div> <!-- post preview #end -->
  <!--post title-->
  <div class="listings bnone">
    <h1  class="title" id="post-<?php the_ID(); ?>"> 
      <?php echo $_POST['post_title']; ?>
       </h1>
       <p class="time"><span class="i_clock alignleft">
		<?php 
        echo date('j F, Y',strtotime($post->post_date)); ?> at <?php echo date('g:i a',strtotime($post->post_date));
        ?> 
       </span> 
       <strong class=" red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
      
        <div class="details_left">
      <?php 
	  if($mimg !== ''){?>
      <?php
			$img_size = bdw_get_images_with_info($post->ID,'singlepage-thumb');
			$post_images = $img_size[0]['file'];
		?>
      <div class="photo photo_main"  ><a href="#productimage"><img src="<?php echo $post_images;?>" alt=""/></a></div>
      <div style="display: none;" id="productimage" > <img src="<?php echo $mimg; ?>" alt="helmet"> </div>
      <?php }else
            {
            ?>
     	 <div class="imgnot_available2" >No Image Available</div>
      <?php
            }
            ?>
      <?php 
           if(count($post_images_arr)>1)
			{ 
			?>
      <?php
				for($i=1;$i<count($post_images_arr);$i++)
				{
					$mimg = $post_images_arr[$i];
					$image_path = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
					if(file_exists($image_path))
					{
			?>
            <?php
			$img_size = bdw_get_images_with_info($post->ID,'latestpost-thumb');
			$post_images = $img_size[0]['file'];
		?>
      <div class="photo" style="none; border:1px solid #ccc;" > <a href="#productimage<?php echo $i;?>"><img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgdetails" /></a>
        <div style="display: none;" id="productimage<?php echo $i;?>" > <img src="<?php echo $mimg; ?>" alt="helmet"> </div>
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
         <span class="i_tags"><?php echo $_POST['post_tags'];?> </span>
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
                	<td class="title"> Qty</td>
                    <td class="title"> Payment Description</td>
                    <td class="title"> Amount</td>
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
						$priceamt = $generalinfo['ads_price'] + $subamt;
					}
					
				}
			  ?>
                 </td>
                </tr>
               <?php }?>
               <?php
			  if($_POST['feature_prd'])
			  {
			  ?>
               <tr>
               <td></td>
               <td><?php _e(FEATURE_PRODUCT_TEXT);?></td>
               <td>
               <?php 
				echo $General->get_currency_symbol().$General->get_featured_price();
				$priceamt = $priceamt + $General->get_featured_price();
				?>
               </td>
               </tr>
               <?php
				}
				?>
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
		<div class="post_preview">
                <div class="post_preview_in">
                	<div><?php _e(DELETE_ADS_CONFIRMATION_MSG);?></div>
                    <div class="post_preview_button">
                         <a href="<?php echo get_option('siteurl');?>/?page=delete&pid=<?php echo $_REQUEST['pid'];?>&ad=1" class="b_continue" ><?php _e(DELETE_BUTTON);?></a>
                        <span class="alignleft">or</span>  <a href="<?php echo get_option('siteurl');?>/?page=dashboard" class="back" ><?php _e(DELETE_BACK_BUTTON);?></a>
                    </div>
                </div>
        </div> <!-- post preview #end -->
    <!--single.php end-->
    </div>
</div>
 
<?php get_footer(); ?>