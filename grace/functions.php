<?php
## control panel options
include(TEMPLATEPATH.'/includes/themeoptions.php');
$cpanel = new Panel();


if ( function_exists('register_sidebar') ) {
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
		 
	}		 


// Custom Write Panel Code

$new_meta_boxes =
  array(
	"image" => array(
	"name" => "image",
	"title" => "Main Photo",
	"description" => "Using the \"<em>Add an Image</em>\" button, upload an image and paste the URL here. Images should be no bigger than 900px wide."),
	"thumbnail" => array(
	"name" => "thumbnail",
	"title" => "Thumbnail",
	"description" => "Using the \"<em>Add an Image</em>\" button, upload a thumbnail image then paste the URL here. Images should be 280px wide by 140px high.")
);

function new_meta_boxes() {
  global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
    
    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];
    
    echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
    
    echo'<label style="font-weight: bold; display: block; padding: 5px 0 2px 2px" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
    
    echo"<input type='text' name='".$meta_box['name']."' value='".$meta_box_value."' size='120' />";
    
    echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
  }
}

function create_meta_box() {
  global $theme_name;
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', 'Grace Image Custom Fields', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}

function save_postdata( $post_id ) {
  global $post, $new_meta_boxes;
  
  foreach($new_meta_boxes as $meta_box) {
  // Verify
  if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }
  
  if ( 'page' == $_POST['post_type'] ) {
  if ( !current_user_can( 'edit_page', $post_id ))
    return $post_id;
  } else {
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  }
  
  $data = $_POST[$meta_box['name']];
  
  if(get_post_meta($post_id, $meta_box['name']) == "")
    add_post_meta($post_id, $meta_box['name'], $data, true);

  elseif($data != get_post_meta($post_id, $meta_box['name'], true))
    update_post_meta($post_id, $meta_box['name'], $data);
  elseif($data == "")
    delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
  }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
?>