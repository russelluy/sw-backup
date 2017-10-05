<?php get_header(); ?>
<div id="home_content2">
<div id="home_content">
  <div id="header">
    <div id="logospace"> <a href="/dominicks/"><img src="<?php bloginfo('template_directory'); ?>/images/logo_line_new.gif" border="0" /></a> </div>
<!--<p class="easterntitle">Safeway NorCal Division Labor Negotiations</p>-->
	<div id="canadaflag"></div>
    <div class="clear"></div>
  </div>
  <?php get_sidebar(); ?>
  <div id="content">
    <?php if(is_page("Messages from President")){ ?>
    <div class="heading">
      <h1 style="font-size:1.3em;">Messages from President</h1>
    </div>
    <?php query_posts('cat=7'); ?>
    <?php } else if(is_page("Negotiations Update")){ ?>
    <div class="heading">
      <h1 style="font-size:1.3em;">Negotiations Update</h1>
    </div>
    <?php query_posts('cat=5'); ?>
    <?php } else { } ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(is_page("The Safeway Story") || is_page("Facts and Figures") || is_page("Q&A") || is_page("In the News")){ ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <?php } else { ?>
    <!--<h2 style="font-size:1.2em;"><?php the_title(); ?></h2>-->
    <?php } ?>
    <?php the_content(); ?>
    <?php endwhile; endif; ?>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
  </div>
</div>

</div>
<?php get_footer(); ?>
