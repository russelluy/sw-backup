<?php get_header(); ?>
<?php
if (have_posts()) 
{
 	while (have_posts()) 
	{
		the_post();
		global $General;
		$blogcatids = $General->get_blog_catid();
		global $wp_query, $post;
		$current_term = $wp_query->get_queried_object();
		$terms = wp_get_object_terms( $post->ID, 'category' );
		if($blogcatids){$blogcatids_arr = explode(',',$blogcatids);}
		$isblog_cat = 0;
		foreach ( (array) $terms as $key => $term ) {
			if(in_array($term->term_id,$blogcatids_arr)){
				$isblog_cat = 1;
				break;
			}
		}
		if($isblog_cat)
		{
			include (TEMPLATEPATH . "/library/includes/blog_detail.php");
		}else
		{
			include (TEMPLATEPATH . "/library/includes/ads_detail.php");
		}
	}
}
else
{
	_e(NO_POSTS_MATCH_MSG);
}
?>

<?php get_footer(); ?>