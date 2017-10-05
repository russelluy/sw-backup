<?php
global $options;
foreach ($options as $value) {
		global $$value['id'];
        if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
</div>
</div>
<!--content-wrap end -->

<div id="bottom">
  <div id="bottom-in">
  <div class="fsingle  border">
      <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(4)) ) { // Show on the front page ?>
					<?php dynamic_sidebar(4); ?>  
             <?php } ?>
       </div>
    
    <div class="fsingle fspacer border">
      <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(5)) ) { // Show on the front page ?>
					<?php dynamic_sidebar(5); ?>  
             <?php } ?>
    </div>
    
       <div class="subscribe"><?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(6)) ) { // Show on the front page ?>
					<?php dynamic_sidebar(6); ?>  
             <?php } ?> </div>
    
    
  </div>   <!--bottomin end-->
</div><!--bottom end-->


<div id="footer" class="clearfix">
  <div id="footer-in"  >
    <p class="alignleft">Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> All right reserved
      
      </p>
   
       <?php if ( get_option('ptthemes_footerpages') <> "" ) { ?>
            <ul id="flinks">
            <?php wp_list_pages('title_li=&depth=0&include=' . get_option('ptthemes_footerpages') . '&sort_column=menu_order'); ?>
            </ul>
		<?php } ?>
    
  </div> <!--footer-in end-->
</div> <!--footer end-->
<?php wp_footer(); ?>
</body></html>