<?php get_header();
  
  if (have_posts()) : ?>
  
	<div id="columnleft"> <!-- columnleft -->
	
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
		<p>These are all of the photos from the &#8216;<?php single_cat_title(); ?>&#8217; category.</p>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Photos Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<p>These are all of the photos tagged &#8216;<?php single_tag_title(); ?>&#8217;.</p>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
		<p>These are all of the photos from <?php the_time('F jS, Y'); ?>.</p>		
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
		<p>These are all of the photos from <?php the_time('F, Y'); ?>.</p>		
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<p>These are all of the photos from <?php the_time('Y'); ?>.</p>				
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
		<p>These are all of the photos added by <?php the_author(); ?>.</p>				
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php bloginfo('name'); ?> Gallery Archives</h2>
		<p>These are all of the photos from the <?php bloginfo('name'); ?> gallery archives.</p>
 	  <?php } ?>
	  
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

		<?php include(TEMPLATEPATH . '/includes/thumb.php'); ?>
	  
	  </ul>

	  <div class="clearall">&nbsp;</div>
	  
	  
		<p class="postnavigation">
			<?php next_posts_link('<span class="previouspostbutton">&nbsp;</span>') ?> <?php previous_posts_link('<span class="nextpostbutton">&nbsp;</span>') ?>
		</p>
	

	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>
	
	 <?php endif; ?>	

  </div>  <!-- content -->
  
<?php get_footer(); ?> 