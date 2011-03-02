<?php

// retrieve the 6 most recent or stickiest posts
query_posts('showposts=6'); 

// show their thumbnails
include(TEMPLATEPATH . '/includes/thumbs.php');
