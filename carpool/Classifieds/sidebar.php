<div id="sidebar">
 <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(1)) ) { // Show on the front page ?>
					<?php dynamic_sidebar(1); ?>  
             <?php } ?>
             
             
<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>
</div>