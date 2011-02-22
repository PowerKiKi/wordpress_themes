			<?php

			$i = 1; // set variable used to control which style is applied to thumbnail

			  if (have_posts()) : while (have_posts()) : the_post(); // check if there are any posts

				if ($i % 2 == 0) { // check if $i is divisible by 2 with no remainder then apply style to variable $c
       			  $c = ' class="alt"';
    			  } else {
        			$c = '';
   					}
			
			$post_id = $post->ID;
			$single = true;

			
			$image = grace_get_featured_image($post);
			$theme_options = get_option('Grace'); 
			if (true ||!isset($theme_options["autothumb"]) || $theme_options["autothumb"] == "timthumbon")
			{
				$info = wp_get_attachment_image_src($image->ID, 'original');
				$thumbnail_value = '<img src="' . get_bloginfo('template_directory') . '/scripts/timthumb.php?src=' . $info[0] . '&w=280&h=140&zc=1" title="' . get_the_title() . '" alt="' . get_the_title() . '" />';
			}
			else 
			{
				$thumbnail_value = wp_get_attachment_image($image->ID, 'medium', false, array('alt' => get_the_title(), 'title' => get_the_title()));
			}
			
			if ( $thumbnail_value ) : // retreive thumbnail custom field value 
			 
			?>

				<li<?php echo $c ?>>
				  <a href="<?php the_permalink() ?>">
				    <?php echo $thumbnail_value; ?> 
				  </a>
				</li>

				<?php $i++; else :?>
				
				<li<?php echo $c ?>><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a><br/><?php the_excerpt(); ?></li>
				
				<?php $i++; endif; endwhile; endif; ?>