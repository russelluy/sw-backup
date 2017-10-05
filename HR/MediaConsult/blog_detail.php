<?php get_header(); ?>


    <div id="left">
        <div class="interior-content">

            <?php if (have_posts()) : while (have_posts()) : the_post();
			$blog_image = get_post_meta($post->ID, "blog-image", true);
			$blog_image_big = get_post_meta($post->ID, "blog-image-big", true);				
            $portfolio_image_big = get_post_meta($post->ID, "portfolio-image-big", true);					
			?>
			
        	<div class="blog-entry">
           	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
                <div class="blog-misc">
                    <span><?php the_time('F jS, Y') ?></span>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;
                    <span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>&nbsp;&nbsp;&nbsp;
                    <span><?php edit_post_link('&bull;&nbsp;&nbsp; Edit', '', ''); ?></span>
                </div>
                
			   <?php 
               if($blog_image != "") { 
					echo '<img class="img-border-nohover" src="'.$blog_image.'" alt="" />'; 
					 }?>

			   <?php 
               if($portfolio_image_big != "") { 
                         echo '<img class="img-border-nohover" src="'.$portfolio_image_big.'" alt="" />';
				}?>
                    
               <?php the_content('Read more'); ?>
			</div>	
            
            <div class="blog-share">
            	<h3>Share this article</h3>
                <ul>
                	<li>
                    	<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                        <img src="<?php echo bloginfo('template_url'); ?>/img/digg_16.png" width="16" height="16" alt="digg" /></a>
                    </li>
                	<li>
                    	<a href="http://del.icio.us/post&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                    	<img src="<?php echo bloginfo('template_url'); ?>/img/delicious_16.png" width="16" height="16" alt="delicious" /></a>
                    </li>    
                	<li>
                    	<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                    	<img src="<?php echo bloginfo('template_url'); ?>/img/facebook_16.png" width="16" height="16" alt="facebook" /></a>
                    </li>
                	<li>
                    	<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                        <img src="<?php echo bloginfo('template_url'); ?>/img/linkedin_16.png" width="16" height="16" alt="linkedin" /></a>
                    </li>
                	<li>
                    	<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                        <img src="<?php echo bloginfo('template_url'); ?>/img/reddit_16.png" width="16" height="16" alt="reddit" /></a>
                    </li>
                	<li>
                    	<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                        <img src="<?php echo bloginfo('template_url'); ?>/img/stumbleupon_16.png" width="16" height="16" alt="stumbleupon" /></a>
                    </li>                	
                    <li>
                    	<a href="http://technorati.com/favorites/?add=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                    	<img src="<?php echo bloginfo('template_url'); ?>/img/technorati_16.png" width="16" height="16" alt="technorati" /></a>
                    </li>
                	<li>
                        <a href="http://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank">
                        <img src="<?php echo bloginfo('template_url'); ?>/img/twitter_16.png" width="16" height="16" alt="twitter" /></a>
                    </li>                                
                </ul>
			</div>
                        		
            <div class='commententry'>
            	<?php comments_template(); ?>
            </div>
           
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