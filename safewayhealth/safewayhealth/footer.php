                 <!-- END OF BOTTOM BOX -->                 
            <?php if (is_home()) echo '</div>';?> 
            <!-- END OF CONTENT -->
            
            <!-- BEGIN FOOTER -->
            <div id="footer">
            	<div class="footer1">
              </div>
              <div class="footer2">
            	     <span>
						<a href="contact-us">Contact Us</a> | <a href="careers">Careers</a><br />
						<h5>© 2012 Safeway Health Inc. All rights reserved.</h5>
					</span>  
              </div>
              <div class="footer3">
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

<!-- Piwik --> 
<script type="text/javascript">
var pkBaseURL = "https://piwik.safeway.com/piwik/"; //(("https:" == document.location.protocol) ? "https://piwik.safeway.com/piwik/" : "http://piwik.safeway.com/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 12);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}

</script><noscript><p><img src="https://piwik.safeway.com/piwik/piwik.php?idsite=12" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
      
</body>
</html>
