<?php

if (function_exists('register_sidebar')) {
	
	/* Side bar */
	register_sidebar(array(				
		'id' => 'sidebar', 					
		'name' => 'Sidebar',				
		'description' => 'Right sidebar', 
		'before_widget' => '<div id="%1$s" class="box %2$s">',	
		'after_widget' => '</div>',	
		'before_title' => '<h3 class="widget-head">',	
		'after_title' => '</h3>',		
		'empty_title'=> '',					
	));

	/* Footer Widgets */
	register_sidebar(array(
	   'name' => __('Footer Widgets','swblog' ),
	   'id'   => 'footer-widgets',
		'description'   => __( 'These are widgets for the Footer.','swblog' ),
		'before_widget' => '<li id="%1$s" class="%2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
   	));
   	
}
