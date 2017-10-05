<div id="sidebar_l">


 <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(2)) ) { // Show on the front page ?>
					<?php dynamic_sidebar(2); ?>  
             <?php } ?>

<?php /*?><h2 class="sidebartitle">
        <?php _e('sponsores'); ?>
      </h2>
<div class="Sponsors">
    <?php include (TEMPLATEPATH . "/ads.php"); ?>
  </div>

   <ul>
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
      <li>
    	<h2 class="sidebartitle">
        <?php _e('sponsored links'); ?>
      </h2>
      <ul class="list-blogroll">
        <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      </ul>
    </li>
     
    <?php endif; ?>
  </ul><?php */?>
  

</div>
<!--Sidebar right-->
