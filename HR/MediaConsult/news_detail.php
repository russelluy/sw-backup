<?php get_header(); ?>  


    <div id="left">
		<div class="interior-header">
        	<h2><?php the_title(); ?></h2>
        </div>    
        <div class="interior-content">
			<?php
             	if (have_posts()) : while (have_posts()) : the_post();
				$news_image = get_post_meta($post->ID, "news-image", true);	
			?>
			
			<ul class="newslist-wrapper">
            	<li>
                <?php
                if($news_image != "") { 
					echo '<img class="news-img" src="'.$news_image.'" alt="" />';
				}
				?>
                    <div class="newslist-content">             

                        <span class="newslist-date"><?php the_time('F jS, Y') ?></span>
                        <?php the_content('read more');?>
	              	</div>
                </li>
            </ul>
            <?php endwhile; else: ?>
	
            <h2>Nothing Found</h2>
            <p>Sorry, no posts matched your criteria.</p>

			<!--do not delete-->
			<?php endif; ?>              

		</div>
        
    </div>
    <div id="right">
		<?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
