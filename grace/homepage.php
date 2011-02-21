<?php 

/*
Template Name: Home Page
*/

get_header(); ?>
  
    <div id="feature" class="pics">  <!-- feature -->
	
	<?php
		
		$catID = get_cat_id('Featured'); // Get the category ID for the Featured category used to display rotating images on homepage

		query_posts('cat='.$catID.''); // Retrieve the latest post from the Featured category

	  	if (have_posts()) : while (have_posts()) : the_post(); // Start the Featured loop
		
			$attachments = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
			foreach ($attachments as $image)
			{
				$img = wp_get_attachment_image($image->ID, 'original', false, array('id' => 'attachment_' . $image->post_name, 'title' => the_title_attribute(array('echo' => false))));
				?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $img; ?></a>
				<?php 
				break;
			}
		
		endwhile; endif; // End the Featured loop

	?>
	
	</div> <!-- feature -->
	
	<div id="columnleft"> <!-- columnleft -->
	
	   <ul>
		  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page') ) : ?>
				
				<li><h2>Widget Content!</h2>
				<p>This is a Widgetized section of the home page. Why not add some text about yourself and your contact details?.</p>
				<p>Log in then go to "Dashboard > Appearance > Widgets" and select Home Page to change what's displayed here.</p>
				</li>
			
			<?php endif; ?>
			</ul>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  <h2>Latest Photos</h2>
	  
	  <ul id="latestworkgallery">				
				
		<?php $theme_options = get_option('Grace'); ?>
		<?php if (!isset($theme_options["autothumb"]) || $theme_options["autothumb"] == "timthumbon") { 
		    include (TEMPLATEPATH . '/includes/hpautothumbson.php'); 
		    } 
		    else if (!isset($theme_options["autothumb"]) || $theme_options["autothumb"] == "timthumboff") { 
		        include (TEMPLATEPATH . '/includes/hpautothumbsoff.php'); 
		} ?>				
	  
	  </ul>

	  <div class="clearall">&nbsp;</div>
	  
	  <p class="morebutton"><a href="<?php echo get_option('home'); ?>/gallery" title="<?php bloginfo('name'); ?> - Gallery" class="button">&nbsp;</a></p>
	
	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 