<?php get_header(); ?>

    <div id="left">
        <div class="interior-content">
        	<div class="search-results-title">
        		<h3>Search results</h3>
			</div>
            <?php
			if (have_posts()) : while (have_posts()) : the_post(); 
			$blog_image = get_post_meta($post->ID, "blog-image", true);	
			
			?>
			<div class="search-results">  
                <h2 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>                <div class="search-category">
                
                    <div class="search-categ-display">
                    	<?php echo "Posted in: "; the_category(', '); ?>
                        
                        <?php ?>
                    </div>
                </div>
                <?php
               	if($blog_image != "") { ?>
                	<a href="<?php echo get_permalink() ?>"><?php echo '<img class="img-border" src="'.$blog_image.'" alt="" />'; ?></a>
				<?php }
				the_excerpt(); ?>
                
		    </div>
            <?php endwhile; else: ?>

            <h2>Nothing Found</h2>
            <p>Sorry, no posts matched your criteria.</p>

            <!--do not delete-->
            <?php endif; ?> 
             
		</div>
        
        <div class="pagination"><!-- generic pagination, copy/paste this block wherever you need -->
            <div class="previous-pag"><?php next_posts_link('Older entries'); ?></div>
            <div class="next-pag"><?php previous_posts_link('Newer entries'); ?></div>
        </div> 

    </div>
    <div id="right">
		<?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
