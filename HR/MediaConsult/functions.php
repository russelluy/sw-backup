<?php

define('GOLDENWORKS_LIB', TEMPLATEPATH . '/lib'); /* library path definition */
define('GOLDENWORKS_JS', get_template_directory_uri() . '/js' ); /* theme's js path definition */


// load javascript files in theme's header
require_once(GOLDENWORKS_LIB . '/scripts.php');

// load shortcodes
require_once(GOLDENWORKS_LIB.'/shortcodes.php');

// load widgets
require_once(GOLDENWORKS_LIB.'/widgets.php');

global $goldenworks_options, $gw_options;
$goldenworks_options  = get_option('goldenworks_options');

include(TEMPLATEPATH.'/options/import_options_no_auto_include.php');

function gw_no_generator() { return ''; }  
add_filter('the_generator','gw_no_generator');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');

// register two menus
function register_menus() {
	register_nav_menus(
		array(
		'header-menu' => __('Header Menu'),
		'footer-menu' => __('Footer Menu')
		)
	);
}

add_action('init', 'register_menus');