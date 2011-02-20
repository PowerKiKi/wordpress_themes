<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="narrowcolumn">

		<h2 class="center">Error 404 - Not Found</h2>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

<?php get_header(); ?>

	<div id="columnleft"> <!-- columnleft -->
	
	   <ul>
		  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
				
				<li><h2>Widget Content!</h2>
				<p>This is a Widgetized section of the home page. Why not add some text about yourself and your contact details?.</p>
				<p>Log in then go to "Dashboard > Appearance > Widgets" then select "Sidebar" to change what's displayed here.</p>
				</li>
			
			<?php endif; ?>
			</ul>
	  
	  <div class="clearall">&nbsp;</div>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  <h1 class="single">Error 404 - Not Found</h1>
	  
	  <p>Sorry, we couldn't find what you're looing for.</p> 
	  
	  <p>Why not visit our <a href="<?php echo get_option('home'); ?>/">home page</a> and start over?</p>
	  
	

	</div> <!-- columnright -->
		
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 