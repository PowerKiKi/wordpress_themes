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
	
	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	  
	  <h1 class="single"><?php the_title(); ?></h1>

      <?php the_content(); ?>
	  
	  <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	  
	  <?php endwhile; endif; ?>	 
	  
	  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
	  
	  <div id="commentsform"> <!-- commentsform -->
	  <?php comments_template(); ?>
	  </div> <!-- commentsform -->
	

	</div> <!-- columnright -->
		
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 