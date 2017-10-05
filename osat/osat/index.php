<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div id="main_section">
      <div id="section_1">
        <div id="what_is">
          <?php query_posts('category_name=Uncategorized&showposts=1'); ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
          <?php comments_template( '', true ); ?>
          <?php endwhile; // end of the loop. ?>
          <!--<h2>What is OSAT?</h2>
          <br />
          <p>OSAT is the percentage of customers who—on a 1-5 scale—rated us a 5 when asked on the receipt survey, “Overall, how satisfied were you with your experience at our grocery store?" <a href="#">Click here to read more</a></p>--> 
        </div>
        <!--<div id="slider_bg">
          <h2>Taking service to the next level.</h2>
          <br />
          <p>Denver, Store 1234<br />
            “I appreciated the speed and efficiency of my checkout, especially during such a busy time of day...”</p>
          <br />
          <p><a href="#">Click here to read more</a></p>
        </div>-->
        <div id="featured_section">
          <div id="featured_header">
            <div id="featured_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/training.png"/></div>
            <h2>Tools & Resources</h2>
          </div>
          <ul>
            <li><a href="#">Report 303 Reference Guide</a><br />
              A quick reference guide that breaks down the important components of your store’s OSAT report.</li>
            <li><a href="#">Display Board Guide</a><br />
              A quick reference guide that explains how to maintain your OSAT display boards in the glass service case.</li>
          </ul>
        </div>
        <div id="featured_section">
          <div id="featured_header">
            <div id="featured_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/highlights.png"/></div>
            <h2>From Our Shoppers</h2>
          </div>
          <?php
// retrieve one post with an ID of 5
query_posts( 'category_name=From Our Shoppers&showposts=1' );

// set $more to 0 in order to only get the first part of the post
global $more;
$more = 0;

// the Loop
while (have_posts()) : the_post();
echo '<p class="mini_post">';
    the_title();
    echo '</p>';
	the_excerpt( 'Read the full post »','content', 'page' );
	// the_content( 'Read the full post »' );
endwhile;

// Reset Query
wp_reset_query();
?>
          <!--<a href="<?php the_permalink();?>">Read more...</a>--> 
        </div>
        <div id="featured_section">
          <div id="featured_header">
            <div id="featured_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/scorecard.png"/></div>
            <h2>Track Your Progress</h2>
          </div>
          <ul>
            <li><a href="index.php/track-your-progress/">OSAT Posted Reports – View All and Print</a><br />
              Link description goes here.</li>
            <!--<li><a href="index.php?page_id=17">Link to All Reports</a><br />
              Link description goes here.</li>-->
          </ul>
        </div>
        <div id="featured_section">
          <div id="featured_header">
            <div id="featured_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/video_icon.png"/></div>
            <h2>Featured Video</h2>
          </div>
          <!--<p>OSAT Video #1</p>-->
          <div id="video"><img src="<?php echo get_template_directory_uri(); ?>/images/video.png"/></div>
        </div>
      </div>
    </div>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
