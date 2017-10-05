<?php
session_start();
ob_start();
global $General;
?>
<?php get_header(); ?>
<div id="page">
 <div id="content-wrap" class="clear" >
<?php
if($_REQUEST['aut'])
{
	$userInfo = get_userdata($_REQUEST['aut']);
	$title = $userInfo->display_name."'s Post Listing";
}else
if($_REQUEST['page']=='featured')
{
	$title = FEATURE_LISTING_TITLE;
}elseif($_REQUEST['page']=='latest')
{
	$title = LATEST_LISTING_TITLE;
}
?>
<?php
if($_SESSION['session_message'])
{
	echo '<p>'.$_SESSION['session_message'].'</p>';
	$_SESSION['session_message'] = '';
}
?>
<?php 
if (have_posts())
{
	$sorttype = $_REQUEST['oby'];
	$blogCategoryIdStr = get_inc_categories("cat_exclude_");
	$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
	$blogcatarr = array();
	for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
	{
		if($blogCategoryIdStr_arr[$i])
		{
			$blogcatarr[] = $blogCategoryIdStr_arr[$i];
		}
	}
	if($blogcatarr)
	{
		$blogcatstr = implode(',-',$blogcatarr);
	}
	if($_REQUEST['page']=='featured')
	{
		global $General;
		$generalinfo = $General->get_general_settings();
		$fcat = $General->get_feature_catid();
		$querypost = "cat=$fcat".$blogcatids;
	}else
	{
		$blogcatids = '-'.$blogcatstr;
		$querypost = "cat=$blogcatids";
	}
	$author = $_REQUEST['aut'];
	if($author)
	{
		$querypost .= "&author=$author";
	}
	if($_REQUEST['ord'] == 'title')
	{
		$querypost .= "&orderby=title&order=$sorttype";
		
	}elseif($_REQUEST['ord'] == 'price')
	{
		$querypost .= "&orderby=meta_value&meta_key=post_price&order=$sorttype";
	}
	elseif($_REQUEST['ord'] == 'loc')
	{
		$querypost .= "&orderby=meta_value&meta_key=post_location&order=$sorttype";
	}
	elseif($_REQUEST['ord'] == 'dt')
	{
		$querypost .= "&orderby=date&order=$sorttype";
	}
	///PAGINATION START///	
$totalpost_count = 0;
$limit = 1000;
$querypost_total = $querypost."&showposts=$limit";
query_posts($querypost_total);
if(have_posts())
{
	while(have_posts())
	{
		 the_post();
		$totalpost_count++;
	}
}
global $paged,$posts_per_page;
$limit = $posts_per_page;
echo $paged;
$querypost .= "&showposts=$limit&paged=$paged";
query_posts($querypost);
///PAGINATION END///
////////POST LISTING START///////	
?>
<div id="content">
  <div class="newlisting"> 
  <h1><?php echo $title;?></h1>
<?php
include (TEMPLATEPATH . "/library/includes/post_listing.php");
?>


<div class="googleads">
     	  <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(7)) ) { // Show on the front page ?>
				<?php dynamic_sidebar(7); ?>  
         <?php } ?>
     </div>


<?php if(function_exists('wp_pagenavi')) { ?>
  <div class="wp-pagenavi">
    <?php wp_pagenavi();  ?>
  </div>
<?php } ?>
<?php
///////POST LISGINT END/////////
}?>




</div>  
</div>
<?php get_sidebar(); ?> <!-- sidebar #end -->
<?php get_footer(); ?> <!-- footer #end -->