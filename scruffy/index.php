<?php get_header(); ?>

		<?php $count = 0; ?>
		<?php if(have_posts()): ?>

		<div id="corner">
			<a class="subscribe" href="<?php bloginfo('rss2_url'); ?>" title="Posts RSS">Subscribe</a>
			<?php get_search_form(); ?>
		</div>
			
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?> 
			
			<div id="postnav">
				<?php next_posts_link('<img class="floatl" src="'. get_bloginfo('stylesheet_directory') .'/img/prevpost.jpg" alt="prev posts" />') ?>
				<?php previous_posts_link('<img class="floatr" src="'. get_bloginfo('stylesheet_directory') .'/img/nextpost.jpg" alt="prev posts" />') ?>
			</div><!-- /postnav -->
		<?php endif; ?>
		
			
		
		<div id="content">
		
		<?php while(have_posts()) : the_post();?>
		
			<div class="post <?php if($count==0){?>first<?php } ?>" id="post-<?php the_ID(); ?>">
				
				<h2 class="title"><a href="<?php the_permalink(); ?>#content" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<p class="postmetadata">
					<span class="date"><?php the_time('d F Y') ;?></span>
					<span class="author"><?php _e('By'); ?> <?php  the_author_posts_link(); ?></span>
					<span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span>
					<span class="category"><?php _e('In'); ?> <?php the_category(', ') ?></span>
					<?php edit_post_link('Edit', '<span class="edit">', '</span>'); ?>
				</p>
				
				<div class="entry">
				
					<?php the_content(''); ?>
					
					<p class="more alignr"><a href="<?php the_permalink(); ?>#content" title="Read the rest of <?php the_title(); ?>">Continue reading</a></p>
		
					<p class="tags"><?php the_tags('', ', ', '<br />'); ?></p>
					
				</div><!-- /entry -->
				
				<div class="postbottom">
				</div>
				
			</div><!-- /post -->
			
			<?php $count++; ?>
			
		<?php endwhile; ?>

		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?> 
			
			<div id="postnav">
				<?php next_posts_link('<img class="floatl" src="'. get_bloginfo('stylesheet_directory') .'/img/prevpost.jpg" alt="prev posts" />') ?>
				<?php previous_posts_link('<img class="floatr" src="'. get_bloginfo('stylesheet_directory') .'/img/nextpost.jpg" alt="prev posts" />') ?>
			</div><!-- /postnav -->
		<?php endif; ?>
		</div><!-- /content -->
			
		
	
		<?php else: ?>
			<div id="content">		
				<div class="post">
					<h2><?php _e('Not Found'); ?></h2>
				</div><!-- /post -->
			</div><!-- /content -->
		<?php endif; ?>
		
<?php get_footer(); ?>