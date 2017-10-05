<?php get_header(); ?>
<div id="page">
 <div id="content-wrap" class="clear" >
 
<div id="content">
          <div class="page_spacer">
						
		    <?php if (is_category()) { ?>
			<h1  class="head" ><?php echo get_option('ptthemes_browsing_category'); ?> <?php echo single_cat_title(); ?> </h1>  

			<?php } elseif (is_day()) { ?>
			<h1  class="head"><?php echo get_option('ptthemes_browsing_day'); ?> <?php the_time('F jS, Y'); ?> </h1>

			<?php } elseif (is_month()) { ?>
			<h1  class="head"><?php echo get_option('ptthemes_browsing_month'); ?> <?php the_time('F, Y'); ?> </h1>

			<?php } elseif (is_year()) { ?>
			<h1  class="head"><?php echo get_option('ptthemes_browsing_year'); ?> <?php the_time('Y'); ?> </h1>
			
			<?php } elseif (is_author()) { ?>
			<h1  class="head"><?php echo get_option('ptthemes_browsing_author'); ?> <?php echo $curauth->nickname; ?> </h1>
							
			<?php } elseif (is_tag()) { ?>
			<h1  class="head"><?php echo get_option('ptthemes_browsing_tag'); ?> <?php echo single_tag_title('', true); ?> </h1>
			<?php }  elseif ($_GET['page']=='Blog') { ?>
            <h1  class="head"><?php _e(BLOG_TEXT);?></h1>
            <?php } ?>
            
              <?php
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
		?>
        <?php
        $totalpost_count = 0;
		$limit = 1000;
		$blogCategoryIdStr = get_inc_categories("cat_exclude_");
		query_posts('showposts=' . $limit . '&cat='.$blogCategoryIdStr);
		if(have_posts())
		{
			while(have_posts())
			{
				 the_post();
				$totalpost_count++;
			}
		}
		?>
    <?php if (is_paged()) $is_paged = true; ?>
	
 
			<?php if(have_posts()) : ?>
			<?php 
			global $posts_per_page;
			$limit = $posts_per_page;
			global $paged;
			$blogCategoryIdStr = get_inc_categories("cat_exclude_");
			query_posts('showposts=' . $limit . '&paged=' . $paged .'&cat='.$blogCategoryIdStr);
			while(have_posts()) : the_post() ?>
        
                <div class="listings bnone">
    <h1  class="title" id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h1>
    <p class="time_blog"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
    <?php if(function_exists('the_views')) { the_views(); } ?>  in <?php the_category(' / ') ?>  // <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?></p>
      
      
      
         
        <?php if($mimg !== '') { ?>
    <?php } else { echo ''; } ?>
    <?php the_content('continue'); ?>
   
      
       
      </div><!--two section end -->
      
       <div class="post_bottom"> 
            
       <?php the_tags(' <span class="i_tags">'.__('','Templatic').'', ', ', '</span>'); ?> 
        
           <span class="i_print"><a href="#" onclick="window.print();return false;" >Print This Post</a></span>
        </div>                     
        
            <?php endwhile; ?>
			
			<div class="wp-pagenavi">
			
                <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
						
            </div>
			
           
        
            <?php endif; ?>
			
	</div>	
</div>

<?php get_sidebar(); ?> <!-- sidebar #end -->
<?php get_footer(); ?> <!-- footer #end -->