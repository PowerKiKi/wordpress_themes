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
								
				$key = image;
				$image_value = get_post_meta($post_id, $key, $single);
				
				if ( $image_value ) : // retreive thumbnail custom field value 
			 
			?>

				 <li<?php echo $c ?>>
					 <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						 <img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image_value; ?>&w=280&h=140&zc=1" width="280" height="140" />
					 </a>				
				 </li>

				<?php $i++; else :?>
				
				<li<?php echo $c ?>><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a><br/><?php the_excerpt(); ?></li>
				
				<?php $i++; endif; endwhile; endif; ?>