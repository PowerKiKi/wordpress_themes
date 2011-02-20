			<?php
			
			query_posts('showposts=6'); // retrieve the 6 most recent or stickiest posts			

			$i = 1; // set variable used to control which style is applied to thumbnail

			  if (have_posts()) : while (have_posts()) : the_post(); // check if there are any posts

				if ($i % 2 == 0) { // check if $i is divisible by 2 with no remainder then apply style to variable $c
       			  $c = ' class="alt"';
    			  } else {
        			$c = '';
   					}
			
			$post_id = $post->ID;
			$single = true;
							
			$key = thumbnail;
			$thumbnail_value = get_post_meta($post_id, $key, $single);
			
			if ( $thumbnail_value ) : // retreive thumbnail custom field value 
			 
			?>

				<li<?php echo $c ?>>
				  <a href="<?php the_permalink() ?>">
				    <img src="<?php echo $thumbnail_value; ?>" alt="<?php the_title('','',False); ?> "/> 
				  </a>
				</li>

				<?php $i++; else :?>
				
				<li<?php echo $c ?>><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a><br/><?php the_excerpt(); ?></li>
				
				<?php $i++; endif; endwhile; endif; ?>