<?php /* Template Name: Backstage Gateway*/ ?>
<style>
<!--
.widget-post{
font-family: Verdana,Geneva,sans-serif;
font-size: 10px;
color: #000000;
font-weight: normal;
font-style: normal;
vertical-align:top;
text-align: left;
}
li {
   list-style: none;
}
h2{
color:#78A642;
font-family: Verdana,Geneva,sans-serif;
font-size:14px;
//margin-left: -15px;
}
.rss_desc{
color:#333333;
}
kbrsswidget.img{border:hidden; margin: 0;}
a.kbrsswidget:link{color: #000000;text-decoration: underline; vertical-align:top; text-align:left;}
a.kbrsswidget:visited{color: #CC6633;text-decoration: underline;}
a.kbrsswidget:active,a.news_title:hover{color: #3E3E3E;text-decoration: underline !important;}
li.widget widget_kbrss {
list-type: none;
margin: 0;
padding: 5px 0 5px 0;
} 
-->
</style>
<html>
<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.safeway.com/piwik/" : "http://piwik.safeway.com/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 9);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://piwik.safeway.com/piwik/piwik.php?idsite=9" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
    <div class="widget-post">
		<img src="<?php bloginfo('template_directory'); ?>/images/food_for_thought_dash.jpg" title="Food For Thought" alt="" /><br/><br/>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Backstage Widget') ) : ?>
        <?php endif; ?>    
    </div> 
</html>