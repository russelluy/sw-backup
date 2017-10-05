                 <!-- END OF BOTTOM BOX -->                 
            <?php if (is_home()) echo '</div>';?> 
            <!-- END OF CONTENT -->
            
            <!-- BEGIN FOOTER -->
            <div id="footer">
            	<div class="footer1">
            	<img src="/jeremy/apps/safewaypedia/wp-content/themes/darwin/images/sw_replace_logo.gif" alt="Safeway" /><br />
            	 <span>
	            	 5918 Stoneridge Mall Rd. <br />
	            	 Pleasanton, CA 94588
            	 </span>
              </div>
              <div class="footer2">
            	            
              </div>
              <div class="footer3">
            		 <span>
						web.communications@safeway.com<br />
						Copyright Safeway, Inc. 2011
					</span>                        
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
