<?php 
global $gw_options;

?>
<div id="sidebar">

<?php
    if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar for All Pages') ) : endif;
        
    if ($gw_options['homepage']['homepage_check'] == true) {
        if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar for Homepage') ) : endif;			  			
    }
    elseif ($gw_options['contact']['contact_check'] == true) {
        if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar for Contact Page') ) : endif;		
    }
    elseif (  (in_category($gw_options['news']['news_categ_final']) || in_category($gw_options['services']['services_categ_final']) || (is_page()) || (is_archive())  ) 
	
	 ) {
        if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar for Non-Blog Pages') ) : endif;		
    }
    else {
        if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar for Blog Section') ) : endif;
    }
        
    ?>			
    
</div>