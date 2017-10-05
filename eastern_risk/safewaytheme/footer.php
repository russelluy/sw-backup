                 <!-- END OF BOTTOM BOX -->                 
            <?php if (is_home()) echo '</div>';?> 
            <!-- END OF CONTENT -->
            
            <!-- BEGIN FOOTER -->
            <div id="footer">
            	
              <div class="footer2">
              			<ul id="nav"> 
                    		<li class="menuLink"><a href="http://www.safeway.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_01.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.vons.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_02.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.dominicks.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_03.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.randalls.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_04.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.tomthumb.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_05.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.genuardis.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_06.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.pavilions.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_07.gif"  alt="Brand" border="0"></a></li>
                    		<li class="menuLink"><a href="http://www.carrsqc.com/IFL/Grocery/Home" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/footbrand_08.gif"  alt="Brand" border="0"></a></li>
                    		</ul>
            	            
              </div>
              
            </div>
            <!-- END OF FOOTER -->
            
            </div>
        </div>
    </div>
    <?php wp_footer();?>
  <?php 
  $ga_code = get_option('Ag_ga_code');
  if ($ga_code) echo stripslashes($ga_code);
  ?>      
</body>
</html>
