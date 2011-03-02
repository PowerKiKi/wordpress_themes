<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery-1.3.2.js"></script> 
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/chili-1.7.pack.js"></script> 
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.cycle.all.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.easing.1.2.js"></script>  
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/cufon-yui.js"></script> 
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/YDIPaintL_400.font.js"></script> 

<?php $theme_options = get_option('Grace'); ?>



<script type="text/javascript"> 
Cufon.replace('h1');
Cufon.replace('h2');

<?php if ( !is_single() ) : ?> 

<?php if (!isset($theme_options["galleryspeed"]) || $theme_options["galleryspeed"] == "default") { $speed = 4000; } else if (!isset($theme_options["galleryspeed"]) || $theme_options["galleryspeed"] == "fast") { $speed = 2000; } else if (!isset($theme_options["galleryspeed"]) || $theme_options["galleryspeed"] == "slow") { $speed = 8000; } ?>
$(function() {
    $('#feature').cycle({
        speed:       1000,
        timeout:     <?php echo $speed; ?>
    });
});
 
<?php else: ?>
$(function() {
    $('#feature').cycle({
        timeout:     0,
        pagerEvent: 'mouseenter',
        pagerAnchorBuilder: function(idx, slide) { 
            // return selector string for existing anchor 
            return '#content>div.gallery a:eq(' + idx + ')'; 
        } 
    });
});
<?php endif; ?>
</script> 

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>

<div id="header"> <!-- header -->
  <div id="logo">
    <a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" /></a>  
  </div>
  <div id="blogTitle">
  	<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
	<h2><?php bloginfo('description'); ?></h2>
  </div>
</div> <!-- header -->

<div id="page"> <!-- page -->
  
  <div id="content">  <!-- content -->