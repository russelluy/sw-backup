<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *

 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @simplechange
 */

get_header(); ?>

	 <div id="primary" class="site-content">
		<div id="content" role="main">
			<a href="/onesimplechange/wp-content/uploads/2013/08/D461_OSC_Phil_Markert_FINAL.pdf" target="_blank"><div class="clicker2"></div></a>
			<a href="/onesimplechange/wp-content/uploads/2013/08/D489_OSC_Marcus_Phillips2.pdf" target="_blank"><div class="clicker"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D845_OSC_Renee_Hopfner2.pdf" target="_blank"><div class="clicker3"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D530_OSC_Rick_Stark2.pdf" target="_blank"><div class="clicker4"></div></a>


			 <?php while ( have_posts() ) : the_post(); ?>
				 <?php get_template_part( 'content', 'page' ); ?>
				<!-- <?php comments_template( '', true ); ?> 
			 <?php endwhile;  // end of the loop. ?> 

		</div><!-- #content --> 
	</div><!-- #primary -->

 <?php get_footer(); ?> 