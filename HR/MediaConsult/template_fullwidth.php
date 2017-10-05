<?php 
/*
Template Name: Fullwidth
*/
global $gw_options;
get_header();
?>  
    <div id="full">
		
		<?php if ($gw_options['fullwidth']['fwi_option'] == 2) {} else
			{ ?>		
            <div class="interior-header">
                <h2 class="full-h">
                <?php         
                if($gw_options['fullwidth']['fullwidth_paragraph_title']) {
                    echo $gw_options['fullwidth']['fullwidth_paragraph_title'];  
                }
                else {
                    the_title();
                }	
                ?>            
                </h2>
                <p class="intheader-paragraph">
                <?php         
                if($gw_options['fullwidth']['fullwidth_paragraph']) {
                    echo $gw_options['fullwidth']['fullwidth_paragraph'];  
                }
                else {
                    echo 'This is an example of fullwidth page. All this text can be changed or disabled from wordpress backend. This paragraph can be extended, the design of this template is very flexible and you can write here as much text / information as you desire.';
                }	
                ?>
                </p>
            </div>
        <?php } ?>
        
        <div class="interior-content">
        
			<?php if (have_posts()) : while (have_posts()) : the_post(); // start loop ?>
                        
            <?php the_content(); ?>
                    
            <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
            <!--do not delete-->
            <?php endif; ?>

		</div>
        
    </div>

<?php get_footer(); ?>
