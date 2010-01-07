<?php
if ( function_exists('register_sidebar') )
{
    register_sidebar(array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '<div class="widgetbottom"></div></div><!--/widget-->',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
    	'name' => 'languageBar',
	    'before_widget' => '',
	    'after_widget'  => '',
	    'before_title'  => '',
	    'after_title'   => '',
    ));
    
}
?>