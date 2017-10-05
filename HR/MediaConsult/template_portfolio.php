<?php 
/*
Template Name: Portfolio
*/
global $gw_options;
get_header();

$more = 0;
$posts_per_page = $gw_options['portfolio']['port_pp']; 
$query_string = "posts_per_page=".$gw_options['portfolio']['port_pp'];
$query_string .= "&cat=".$gw_options['portfolio']['port_categ_final']."&paged=$paged"; 

query_posts($query_string);
?>  
    <div id="full">
		<div class="interior-header">
        	<h2 class="full-h">
			<?php         
            if($gw_options['portfolio']['portfolio_paragraph_title']) {
                echo $gw_options['portfolio']['portfolio_paragraph_title'];  
            }
            else {
				the_title();
            }	
            ?>            
            </h2>
            <p class="intheader-paragraph">
			<?php         
            if($gw_options['portfolio']['portfolio_paragraph']) {
                echo $gw_options['portfolio']['portfolio_paragraph'];  
            }
            else {
                echo 'This page is a beautiful and clean example of portfolio or case studies index. This paragraph can be extended, the design of this template is very flexible and you can write here as much text / information as you desire.';
            }	
            ?>
            </p>
        </div>    
        <div class="interior-content">
			<ul class="portfolio-wrapper">
				<?php
                    if (have_posts()) : while (have_posts()) : the_post();
                    $portfolio_image = get_post_meta($post->ID, "portfolio-image", true);
                    $portfolio_image_big = get_post_meta($post->ID, "portfolio-image-big", true);		
                ?>
            
            	<li>
                    <h4 id="post-<?php the_ID(); ?>">
                        <a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h4>
                        
                    <?php
                    if($portfolio_image != "") { ?>
                        <a rel="lightbox" title="<?php the_title(); ?>" href="<?php echo $portfolio_image_big; ?>">
                        <?php echo '<img class="img-border" src="'.$portfolio_image.'" alt="" />'; ?>
                        </a>
                    <?php }?>
                </li>
                            
            	<?php endwhile; else: ?>
            
                <li>
                    <h2>Nothing Found</h2>
                    <p>Sorry, no posts matched your criteria.</p>
                </li>
			<!--do not delete-->
			<?php endif; ?>  
            </ul>
            
            <div class="pagination"><!-- generic pagination, copy/paste this block wherever you like -->
                <div class="previous-pag"><?php next_posts_link('Previous entries'); ?></div>
                <div class="next-pag"><?php previous_posts_link('Newer entries'); ?></div>
            </div> 
 
			
		</div>
        
    </div>

<?php get_footer(); ?>
