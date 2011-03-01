<?php
## control panel options
include(TEMPLATEPATH.'/includes/themeoptions.php');
$cpanel = new Panel();


if ( function_exists('register_sidebar') ) 
{
	register_sidebar(array(
		'name'=>'Home Page',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	 ));
	 
	 register_sidebar(array(
		'name'=>'Sidebar',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	 ));
	 
	register_sidebar(array(
		'name'=>'Single',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	 ));
	 		 
}		 

if ( !function_exists('grace_get_featured_image') )
{
	function grace_get_featured_image($post)
	{
			$attachments = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
			return reset($attachments);
	} 
}


/**
 * Search widget class
 *
 * @since 2.8.0
 */
class Widget_RSS_Link extends WP_Widget {

	function Widget_RSS_Link() {
		$widget_ops = array('classname' => 'widget_rss_link', 'description' => __( "RSS links from your blog for your visitors") );
		$this->WP_Widget('rss_link', __('RSS Links'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		<p>
			<a class="rss" href="<?php bloginfo('rss2_url'); ?>" title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0')); ?>"><?php _e('Contents <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a> <br/>
			<a class="rss" href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php echo esc_attr(__('The latest comments to all posts in RSS')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a>
		</p>
		<?php 
		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}

register_widget('Widget_RSS_Link');

?>