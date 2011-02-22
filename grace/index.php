<?php get_header(); ?>
  
	<div id="columnleft"> <!-- columnleft -->
	
	  <h2><?php bloginfo('name'); ?> Gallery</h2>
	  
	  <p>These are the latest photos from the <?php bloginfo('name'); ?> gallery.</p>
	  
  	  <p class="clearall">&nbsp;</p>	
	
	   <ul>
		  <?php 	/* Widgetized sidebar */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
				
				<li><h2>Widget Content!</h2>
				<p>This is a Widgetized section of the home page. Why not add some text about yourself and your contact details?.</p>
				<p>Log in then go to "Dashboard > Appearance > Widgets" then select "Sidebar" to change what's displayed here.</p>
				</li>
			
			<?php endif; ?>
			</ul>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  	<ul id="latestworkgallery">	
	  	
			<?php include(TEMPLATEPATH . '/includes/thumbs.php'); ?>

		</ul>	  

	  <div class="clearall">&nbsp;</div>
	  
	  
		<p class="postnavigation">
			<?php next_posts_link('<span class="previouspostbutton">&nbsp;</span>') ?> <?php previous_posts_link('<span class="nextpostbutton">&nbsp;</span>') ?>
		</p>
	
	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 