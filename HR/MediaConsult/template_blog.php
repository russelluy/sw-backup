<?php 
/*
Template Name: Blog
*/
global $more, $gw_options;
get_header();

$more = 0;
$negative_cats = preg_replace("!(\d)+!","-${0}$0", $gw_options['blog']['blog_cat_final']);

$query_string = "posts_per_page=".$gw_options['blog']['item_pp']."&cat=".$negative_cats."&paged=$paged";
query_posts($query_string);

            

?>  
    <div id="left">
        <div class="interior-content">
			<?php
             	if (have_posts()) : while (have_posts()) : the_post();
				$blog_image = get_post_meta($post->ID, "blog-image", true);	
			?>
			
        	<div class="blog-entry">

           	<h2 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="blog-misc">
                    <span><?php the_time('F jS, Y') ?></span>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;
                    <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>&nbsp;&nbsp;&nbsp;
                    <span><?php edit_post_link('&bull;&nbsp;&nbsp; Edit', '', ''); ?></span>
                </div>
                
			   <?php 
               if($blog_image != "") { ?>
                        <a href="<?php echo get_permalink() ?>"><?php echo '<img class="img-border" src="'.$blog_image.'" alt="" />'; ?></a>
					<?php }?>

               <?php the_content('Read more');?>
                        
			</div>			

            <?php endwhile; else: ?>
	
            <h2>Nothing Found</h2>
            <p>Sorry, no posts matched your criteria.</p>

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
