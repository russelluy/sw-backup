<?php

/*

Plugin Name: WP-PageNavi 

Plugin URI: http://www.lesterchan.net/portfolio/programming.php 

*/ 



function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {



	global $request, $posts_per_page, $wpdb, $paged, $totalpost_count, $posts_per_page_homepage;

	if($posts_per_page_homepage)

	{

		$posts_per_page = $posts_per_page_homepage;

	}

	if(empty($prelabel)) {

		$prelabel  = '<strong>&laquo;</strong>';

	}

	if(empty($nxtlabel)) {

		$nxtlabel = '<strong>&raquo;</strong>';

	}

	$half_pages_to_show = round($pages_to_show/2);

	if (!is_single()) {

		if(is_tag()) {

			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		

		} elseif (!is_category()) {

			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);	

		} else {

			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		

		}

		$fromwhere = $matches[1];

		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");

		

	}

	if($totalpost_count)

	{

		$numposts = $totalpost_count;

	}

	$max_page = ceil($numposts /$posts_per_page);

		if(empty($paged)) {

			$paged = 1;

		}

		if($max_page > 1 || $always_show) {

			echo "$before <div class='Navi'>";

			if ($paged >= ($pages_to_show-1)) {

				echo '<a href="'.str_replace('&','&',str_replace('&','&',get_pagenum_link())).'">&laquo; First</a>';

			}

			previous_posts_link($prelabel);

			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {

				if ($i >= 1 && $i <= $max_page) {

					if($i == $paged) {

						echo "<strong class='on'>$i</strong>";

					} else {

						echo ' <a href="'.str_replace('&','&',get_pagenum_link($i)).'">'.$i.'</a> ';

					}

				}

			}

			next_posts_link($nxtlabel, $max_page);

			if (($paged+$half_pages_to_show) < ($max_page)) {

				echo '<a href="'.str_replace('&','&',get_pagenum_link($max_page)).'">Last &raquo;</a>';

			}

			echo "</div> $after";

		}

}

function bdw_get_images_with_info($iPostID,$img_size='thumb') 
{
    $arrImages =& get_children('order=ASC&orderby=menu_order ID&post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
	$return_arr = array();
	if($arrImages) 
	{		
       foreach($arrImages as $key=>$val)
	   {
	   		$id = $val->ID;
			if($img_size == 'large')
			{
				$img_arr = wp_get_attachment_image_src($id,'full');	// THE FULL SIZE IMAGE INSTEAD
				$imgarr['id'] = $id;
				$imgarr['file'] = $img_arr[0];
				$return_arr[] = $imgarr;
			}
			elseif($img_size == 'medium')
			{
				$img_arr = wp_get_attachment_image_src($id, 'medium'); //THE medium SIZE IMAGE INSTEAD
				$imgarr['id'] = $id;
				$imgarr['file'] = $img_arr[0];
				$return_arr[] = $imgarr;
			}
			elseif($img_size == 'thumb')
			{
				$img_arr = wp_get_attachment_image_src($id, 'thumbnail'); // Get the thumbnail url for the attachment
				$imgarr['id'] = $id;
				$imgarr['file'] = $img_arr[0];
				$return_arr[] = $imgarr;
				
			}
			else
			{
				$img_arr = wp_get_attachment_image_src($id, $img_size); // Get the thumbnail url for the attachment
				$imgarr['id'] = $id;
				$imgarr['file'] = $img_arr[0];
				$return_arr[] = $imgarr;
				
			}
	   }
	  return $return_arr;
	}
}

?>