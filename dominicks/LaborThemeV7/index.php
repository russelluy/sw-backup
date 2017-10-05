<?php get_header(); ?>
<?php get_sidebar(); ?>

    <div id="content">
		
        <?php include (TEMPLATEPATH . '/laborstyle.php'); ?>

		<?php if ( is_home() ) : ?>

			<?php if (have_posts()) : ?>

				
					<!-- DIVISION PRES POST -->
				<?php query_posts('category_name=welcome-message'); ?>
				<div class="heading">
				  <h1>Dominicks Employee Information</h1>
				</div>
				
				
				
				
				
				
				
				
				
				<!-- END -->
				
				<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="entry">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>
					</div>
				<?php endwhile; ?>

				<!-- OTHER POSTS -->
				<?php query_posts('cat=4,5&showposts=10'); ?>
					<!--<div class="heading">
					  <h1>Latest Updates</h1>
					</div>-->
				<?php while (have_posts()) : the_post(); ?>
	
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<small>Posted: <?php the_time('l, F j, Y') ?></small>
	
						<div class="entry">
						<?php the_excerpt('Read the rest of this entry &raquo;'); ?><br/>
	
						</div>
					</div>
	
				<?php endwhile; ?>			
			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<?php endif; ?>
		<?php else : ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div>
				</div>
			<?php endwhile; endif; ?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		<?php endif; ?>
			<!--<div><a href="#top"><img style="float: right;" title="topfooter" src="http://safewaynegotiations.ca/wp-content/uploads/2008/06/topfooter.gif" border="0" alt="" width="25" height="25" /></a></div>-->
    </div>
<?php get_footer(); ?>
