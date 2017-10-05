<?php
////////////DASHBOARD CUSTOM WIDGETS START/////
/**
 * Content of Dashboard-Widget
 */
function my_ads_summary()
{
	list($post_stati, $avail_post_stati) = wp_edit_posts_query();
	query_posts('orderby=post_date&order=DESC'); 
	$blogCategoryIdStr = get_inc_categories("cat_exclude_");
	$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
	$blogcat_arr = array();
	for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
	{
		if($blogCategoryIdStr_arr[$i])
		{
			$blogcat_arr[] = $blogCategoryIdStr_arr[$i];	
		}
	}
	if($blogcat_arr)
	{
		$blogcat_str = '-'.implode(',-',$blogcat_arr);	
	}
	query_posts("cat=$blogcat_str&posts_per_page=10");
	if (have_posts())
	{
	?>
        <table width="100%">
        <tr>
        <td><strong>Classified Title</strong></td>
        <td><strong>Category</strong></td>
        <td><strong>Date</strong></td>
        <td><strong>Status</strong></td>
        </tr>
        <?php
                global $post;
				while (have_posts())
                {
                    the_post();
        ?>
        <tr>
        <td><a href="<?php echo get_option('siteurl');?>/wp-admin/post.php?action=edit&post=<?php the_ID(); ?>" rel="bookmark" title="Permanent Link to "><?php the_title(); ?></a></td>
        <td><?php echo the_category();?></td>
        <td><?php echo the_time('d/m/Y');?></td>
        <td><?php echo $post->post_status;?></td>
        </tr>
				<?php } ?>
        </table>
	<?php
	}else
	{
	?>
   	 <table width="100%">
        <tr>
        <td>No Ads Available.</strong></td>
       </tr>
       </table>
    <?php
	}
}
/**
 * add Dashboard Widget via function wp_add_dashboard_widget()
 */
function my_wp_dashboard_setup() 
{
	wp_add_dashboard_widget( 'my_ads_summary', __( 'Latest Ads' ), 'my_ads_summary' );
}
 
/**
 * use hook, to integrate new widget
 */
add_action('wp_dashboard_setup', 'my_wp_dashboard_setup');
?>