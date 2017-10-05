<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/

/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/
 
register_sidebar(array(
'name'=>'Sidebar',
'id' => 'sidebar',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title-xs title-center title-caps title-ornament title-widget type-custom">',
'after_title' => '</p>',
));

/*----------------------------------*/
/* Footer widgetized areas		*/
/*----------------------------------*/

register_sidebar(array('name'=>'Pre-Footer: 2/3 Column',
'id' => 'prefooter-wide',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h2 class="title-xs title-center title-caps title-ornament title-widget type-custom">',
'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Pre-Footer: 1/3 Column',
'id' => 'prefooter-narrow',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<h2 class="title-xs title-center title-caps title-ornament title-widget type-custom">',
'after_title' => '</h2>',
));

/*----------------------------------*/
/* Prefooter				 		*/
/*----------------------------------*/
 
register_sidebar(array(
'name'=>'Pre-Footer: Full Width',
'id' => 'prefooter-full',
'before_widget' => '<div class="widget widget-prefooter %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title-xs title-center title-caps title-ornament title-widget type-custom">',
'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Column 1',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title">',
'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Column 2',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title">',
'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Column 3',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title">',
'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Column 4',
'before_widget' => '<div class="widget %2$s" id="%1$s">',
'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
'before_title' => '<p class="title">',
'after_title' => '</p>',
));