<?php
global $gw_options;
$post = $wp_query->post;

if (in_category($gw_options['news']['news_categ_final']) ) {
	include(TEMPLATEPATH . '/news_detail.php');
}
elseif ( in_category($gw_options['services']['services_categ_final']) || in_category($gw_options['homepage']['homepage_categ_final']) ) {
	include(TEMPLATEPATH . '/page.php');
}
else {
	include(TEMPLATEPATH . '/blog_detail.php');
}
?>
