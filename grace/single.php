<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
    <div id="feature" class="singlepic">  <!-- feature -->

		<?php 
		
		$post_id = $post->ID;
		$single = true;
							
		$key = image;
		if ( $image_value = get_post_meta($post_id, $key, $single) ) :
		
		echo '<img src="'.$image_value.'" alt="'.the_title('','',False).'" />';		
				
		endif; // End the Featured loop

	?>
	  
	  <div class="clearall">&nbsp;</div>
	
	</div> <!-- feature -->
	
	<div id="columnleft"> <!-- columnleft -->
	
	  <p class="postnavigation">
	  	<?php previous_post_link('<span class="previouspostbutton">%link</span>', '&nbsp;') ?>
		<?php next_post_link('<span class="nextpostbutton">%link</span>', '&nbsp;') ?>
	  </p>
	  
	  <div class="clearall">&nbsp;</div>
		
		<h2 class="meta">Date Added</h2>
	  <p><?php the_time('l, F jS, Y') ?></p>
	  
	  <h2 class="meta">Posted In</h2>
	  <p><?php the_category(', ') ?></p>
	  
	  <?php
		if(get_the_tag_list()) { ?>
		
		  <h2 class="meta">Tagged</h2>
		
		<?php 
		 echo get_the_tag_list('<p>',' ','</p>');
		}
		?>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  <h1 class="single"><?php the_title(); ?></h1>
	  
	  <h2 class="meta">Description</h2>
	  <p><?php the_content(); ?></p>
	
	  <div id="commentsform"> <!-- commentsform -->
	  <?php comments_template(); ?>
	  </div> <!-- commentsform -->

	</div> <!-- columnright -->


	<?php endwhile; endif; ?>	
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 