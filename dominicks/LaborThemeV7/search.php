<?php get_header(); ?>

<div id="home_content2">
  <div id="home_content">
    <div id="header">
      <div id="logospace"> <a href="/dominicks/"><img src="<?php bloginfo('template_directory'); ?>/images/logo_line_new.gif" border="0" /></a> </div>
      <div id="searchspace">
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <?php get_sidebar(); ?>
    <div id="contentsearch">
      <?php include("laborstyle.php"); ?>
      <?php if (have_posts()) : ?>
      <h2 class="pagetitle">Search Results</h2>
      <div class="navigation">
        <div class="alignleft">
          <?php next_posts_link('&laquo; Older Entries') ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link('Newer Entries &raquo;') ?>
        </div>
      </div>
      <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h3>
        <small>
        <?php the_time('l, F j, Y') ?>
        </small>
        <p class="postmetadata">
          <?php the_tags('Tags: ', ', ', '<br />'); ?>
          Posted in
          <?php the_category(', ') ?>
          |
          <?php edit_post_link('Edit', '', ' '); ?>
        </p>
      </div>
      <?php endwhile; ?>
      <div class="navigation">
        <div class="alignleft">
          <?php next_posts_link('&laquo; Older Entries') ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link('Newer Entries &raquo;') ?>
        </div>
      </div>
      <?php else : ?>
      <h2 class="center">No posts found. Try a different search?</h2>
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      <?php endif; ?>
    </div>
  </div>
  <div id="bottomshadow"></div>
</div>
<?php get_footer(); ?>
