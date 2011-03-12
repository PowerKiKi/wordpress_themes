<?php			
if (have_posts()) :
	$i = 1; // set variable used to control which style is applied to thumbnail
	while (have_posts()) :
		the_post();
		
		// check if $i is divisible by 2 with no remainder then apply style to variable $c
		if ($i % 2 == 0)
		{ 
			$c = ' class="alt"';
    	}
    	else
    	{
        	$c = '';
   		}
	
		// retreive thumbnail custom field value
		?>
		<li<?php echo $c ?>>
			<?php
			if (has_post_thumbnail()):
				the_post_thumbnail('post-thumbnail', array('title' => '') );
			else:
				?><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a><br/><?php the_excerpt();
			endif;
			?>
		</li>

		<?php
		$i++;
	 endwhile; 
endif;