<?php 
global $gw_options;
if ($post->ID == $gw_options['contact']['contact_page']) $contactpage = true;
if ($post->ID == $gw_options['portfolio']['folio_page']) $portfoliopage = true;
if ($post->ID == $gw_options['blog']['blog_page']) $blogpage = true;
if ($post->ID == $gw_options['news']['news_page']) $newspage = true;
if ($post->ID == $gw_options['services']['services_page']) $servicespage = true;
if ($post->ID == $gw_options['fullwidth']['fullwidth_page']) $fullwidthpage = true;

if($contactpage)
{
	include(TEMPLATEPATH."/template_contact.php");
}
else if($blogpage)
{
	include(TEMPLATEPATH."/template_blog.php");
}
else if($portfoliopage)
{
	include(TEMPLATEPATH."/template_portfolio.php");
}
else if($newspage)
{
	include(TEMPLATEPATH."/template_news.php");
}
else if($fullwidthpage)
{
	include(TEMPLATEPATH."/template_fullwidth.php");
}
/*
else if($servicespage)
{
	include(TEMPLATEPATH."/template_services.php");
}
*/
else{

 get_header(); ?>


    <div id="left">
        <div class="interior-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
            $slider_image = get_post_meta($post->ID, "slider-image", true);	            
            ?>
            <h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
            
            <?php
            if($slider_image != "") { 
                echo '<img src="'.$slider_image.'" alt="" class="hp-margin" width="615" height="270" />'; 
            }?>                
                
                
            <?php the_content(); ?>
        </div>			
    
        <?php endwhile; else: ?>
    
        <h2>Nothing Found</h2>
        <p>Sorry, no posts matched your criteria.</p>
    
        <!--do not delete-->
        <?php endif; ?>     
    
    </div>

    <div id="right">
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); } ?>