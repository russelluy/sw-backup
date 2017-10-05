<?php include (TEMPLATEPATH . "/header_index.php"); ?>

<div id="page">
<div id="content-wrap" class="clear" >

<div id="search_index">
 <form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
<input type="text" value="Search here..." name="s" class="s" onfocus="if (this.value == 'Search here...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search here...';}"/>
<input type="image" src="<?php bloginfo('template_url'); ?>/images/none.png" alt="" class="sgo"  />
</form>
</div>





<div id="category">
	<div class="ctitle"><h3>Categories</h3></div>
     	 <ul class="categories">
         <?php // wp_list_categories('orderby=name&title_li'); ?>
    <?php 
	$blogCategoryIdStr = get_inc_categories("cat_exclude_");
	$blogCategoryIdStr_arr = explode(',',$blogCategoryIdStr);
	$catid_arr = array();
	for($i=0;$i<count($blogCategoryIdStr_arr);$i++)
	{
		if($blogCategoryIdStr_arr[$i])
		{
			$catid_arr[] = $blogCategoryIdStr_arr[$i];
		}
	}
	$blogCategoryIdStr = implode(',',$catid_arr);
	$sub_cat_show = $General->is_show_cat_only_home();

	if($sub_cat_show)
	{
		
	?>
	<style> .categories ul.children,.category_list_index li ul.children { display:none;   }  </style>
	<?php	
	 wp_list_categories("hide_empty=0&exclude=$blogCategoryIdStr&orderby=name&hierarchical=1&title_li=");
	}else
	{
	list_cats(FALSE, '', 'name','asc', '', TRUE, FALSE, FALSE, FALSE, TRUE, 1, FALSE, '', FALSE, FALSE, '', "$blogCategoryIdStr", '');
	}
	 ?>
      </ul>
      
      
        
</div>

<?php get_footer(); ?>