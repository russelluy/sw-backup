<?php 
/*
Template Name: News
*/
global $more, $gw_options;
get_header();

$more = 0;
$posts_per_page = $gw_options['news']['news_pp'];

$query_string = "posts_per_page=".$gw_options['news']['news_pp']."&cat=".$negative_cats."&paged=$paged";
$query_string .= "&cat=".$gw_options['news']['news_categ_final']."&paged=$paged";

query_posts($query_string);

?>  
    <div id="left">
		<div class="interior-header">
        	<h2>
			<?php         
            if($gw_options['news']['news_paragraph_title']) {
                echo $gw_options['news']['news_paragraph_title'];  
            }
            else {
				the_title();
            }	
            ?>            
            </h2>
            <p class="intheader-paragraph">
			<?php         
            if($gw_options['news']['news_paragraph']) {
                echo $gw_options['news']['news_paragraph'];  
            }
            else {
                echo 'We will keep you updated with latest news and events surrounding our company. ';
            }	
            ?>
            </p>
        </div>    
        <div class="interior-content">
	        <ul class="newslist-wrapper">
			<?php
             	if (have_posts()) : while (have_posts()) : the_post();
				$news_image = get_post_meta($post->ID, "news-image", true);	
			?>
            	<li>
               <?php
               if($news_image != "") { ?>
                        <a href="<?php echo get_permalink() ?>"><?php echo '<img class="news-img" src="'.$news_image.'" alt="" />'; ?></a>
					<?php }?>
                    <div class="newslist-content">                
            	        <h4 id="post-<?php the_ID(); ?>">
                        	<a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h4>
        	            <span class="newslist-date"><?php the_time('F jS, Y');?>&nbsp;&nbsp;<?php edit_post_link('Edit', '', ''); ?></span>

						<?php the_content('read more');?>
	              	</div>
                </li>
                
            
            <?php endwhile;?></ul> <?php else: ?>
			<li>
            	<h2>Nothing Found</h2>
            	<p>Sorry, no posts matched your criteria.</p>
			</li>
			<!--do not delete-->
			<?php endif; ?>              


            <div class="pagination"><!-- generic pagination, copy/paste this block wherever you need -->
                <div class="previous-pag"><?php next_posts_link('Older entries'); ?></div>
                <div class="next-pag"><?php previous_posts_link('Newer entries'); ?></div>
            </div> 
     
		</div>
        
    </div>
    <div id="right">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
