<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
    <div id="feature" class="singlepic">  <!-- feature -->
		<?php  
		// Dump all images from gallery in original size
		$attachments = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
		foreach ($attachments as $image)
		{
			$img = wp_get_attachment_image($image->ID, 'original', false, array('id' => 'attachment_' . $image->post_name));
			echo $img . "\n";
		}
		?>
	</div> <!-- feature -->
	  <div class="clearall">&nbsp;</div>
	<?php
	
	// Dump the image gallery which will be used as navigation control of feature image
	echo gallery_shortcode(array(
		'columns'    => 9,
		'size'       => 'thumbnail',
	));
	?>
	  <div class="clearall">&nbsp;</div>
	
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
		<ul class="single_widgets">
			<?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('Single'); ?>
		</ul>
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  <h1 class="single"><?php the_title(); ?></h1>
	  
	  <p><?php the_content(); ?></p>
	
	  <div id="commentsform"> <!-- commentsform -->
	  <?php //comments_template(); ?>
	  </div> <!-- commentsform -->

	</div> <!-- columnright -->


	<?php endwhile; endif; ?>	
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 
