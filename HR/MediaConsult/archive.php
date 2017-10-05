<?php get_header(); ?>

    <div id="left">
        <div class="interior-content">
           
            <?php if (have_posts()) : 
            echo "<div class='archive-header'><h3>";
            $post = $posts[0]; /* Set $post so the_date() will work. */ ?>
				<?php if (is_category()) { ?>				
				Archive for <?php echo single_cat_title(); ?>
				
 			  	<?php } elseif (is_day()) { ?>
				Archive for <?php the_time('F jS, Y'); ?>
				
			 	<?php } elseif (is_month()) { ?>
				Archive for <?php the_time('F, Y'); ?>
			
				<?php } elseif (is_year()) { ?>
				Archive for <?php the_time('Y'); ?>
				
			  	<?php } elseif (is_search()) { ?>
				Search Results
				
			  	<?php } elseif (is_author()) { ?>
				Author Archive
			
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				Blog Archives
              	
				<?php }
            echo"</h3></div>";
            while (have_posts()) : the_post(); 
			?>           
			<div class="archive-results"> 	

           	<h4 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

            <?php the_excerpt(); ?>
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