<?php 
/* Media Consult Shortcodes */


/* toggle content shortcode */
function gw_toggle_content( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));
	
	$output .= '<h4 class="toggle"><a href="#">' .$title. '</a></h4>';
	$output .= '<div class="toggle-content" style="display: none;">';
	$output .= '<div class="block">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div><div class="clear"></div>';
	
   return $output;
}
add_shortcode('toggle', 'gw_toggle_content');

/* align left shortcode */
function gw_align_left( $atts, $content = null ) {
   return '<span class="alignleft"><img src="' . do_shortcode($content) . '" /></span>';
}
add_shortcode('align_left', 'gw_align_left');

/* align right shortcode */
function gw_align_right( $atts, $content = null ) {
   return '<span class="alignright"><img src="' . do_shortcode($content) . '" /></span>';
}
add_shortcode('align_right', 'gw_align_right');

function gw_slider_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
    ), $atts));
	
	$out = "<div class=\"slideshow-rm\"><a class=\"more-link\" href=\"" .$link. "\">" .do_shortcode($content). "</a></div>";	
	
    
    return $out;
}
add_shortcode('slider_button', 'gw_slider_button');

function gw_bullet_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="bullet-list">', do_shortcode($content));
	return $content;
	
}
add_shortcode('bullet_list', 'gw_bullet_list');

?>