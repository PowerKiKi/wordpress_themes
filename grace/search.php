<?php get_header();
  
  if (have_posts()) : ?>
  
	<div id="columnleft"> <!-- columnleft -->
	
		<h2 class="pagetitle">Search Results</h2>
		<p>Here are all the photos from your search for &#8216;<?php the_search_query(); ?>&#8217;.</p>
		
		<p><?php get_search_form(); ?></p>
	  
  	  <p class="clearall">&nbsp;</p>	
	
	   <ul>
		  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
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

			<?php

			$i = 1;

			  while (have_posts()) : the_post();

				if ($i % 2 == 0) {

       			  $c = ' class="alt"';

    			  } else {

        			$c = '';

   					}
			
			 $mykey_values = get_post_custom_values('Thumbnail');
			 
			 if ( $mykey_values ) :
			 
			 ?>

				<li<?php echo $c ?>><a href="<?php the_permalink() ?>"><?php

				  foreach ( $mykey_values as $key => $value ) {

			      echo $value; 

				  }



				?></a></li>



				<?php $i++; endif; endwhile; ?>
	  
	  </ul>

	  <div class="clearall">&nbsp;</div>
	  
	  
		<p class="postnavigation">
			<?php next_posts_link('<span class="previouspostbutton">&nbsp;</span>') ?> <?php previous_posts_link('<span class="nextpostbutton">&nbsp;</span>') ?>
		</p>
	

	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>
	
	 <?php else: ?>
	 
	<div id="columnleft"> <!-- columnleft -->
	
		<h2 class="pagetitle">Search Results</h2>
		<p>Sorry nothing was found from your search for &#8216;<?php the_search_query(); ?>&#8217;.</p>
	  
  	  <p class="clearall">&nbsp;</p>	
	
	   <ul>
		  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
				
				<li><h2>Widget Content!</h2>
				<p>This is a Widgetized section of the home page. Why not add some text about yourself and your contact details?.</p>
				<p>Log in then go to "Dashboard > Appearance > Widgets" then select "Sidebar" to change what's displayed here.</p>
				</li>
			
			<?php endif; ?>
			</ul>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->	 
	
		<h2 class="pagetitle">We Couldn't Find Anything</h2>
		
		<p>Sorry nothing was found from your search for &#8216;<?php the_search_query(); ?>&#8217;.</p>
		
		<p><?php get_search_form(); ?></p>
	
		<p class="clearall">&nbsp;</p>
	
	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>	
	 
	
	 <?php endif; ?>	

  </div>  <!-- content -->
  
<?php get_footer(); ?> 