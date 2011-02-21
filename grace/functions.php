<?php
## control panel options
include(TEMPLATEPATH.'/includes/themeoptions.php');
$cpanel = new Panel();


if ( function_exists('register_sidebar') ) 
{
	register_sidebar(array(
		'name'=>'Home Page',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	 ));
	 
	 register_sidebar(array(
		'name'=>'Sidebar',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	 ));		 
}		 


?>