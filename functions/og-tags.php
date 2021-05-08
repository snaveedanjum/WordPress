<?php

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function wpentrant_og_tags() {
	if (is_front_page()) {
		global $post;
	//Facebook Tags
		echo '<meta property="og:title" content=""/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_bloginfo('url') . '"/>';
		echo '<meta property="og:site_name" content=""/>';
		echo '<meta property="og:description" content=""/>';
		$default_image=get_template_directory_uri().'/assets/images/logo.png'; 
		echo '<meta property="og:image" content="' . $default_image . '"/>';

	//Twitter Cards
		echo '<meta name="twitter:card" value="summary" />';
		echo '<meta name="twitter:url" value="'.get_bloginfo('url').'" />';
		echo '<meta name="twitter:title" value="" />';
		echo '<meta name="twitter:description" value="" />';
		echo '<meta name="twitter:image" value="'.get_template_directory_uri().'/assets/images/logo.png" />';
		echo '<meta name="twitter:site" value="@your twitter handle" />';
	}


	if(is_single() || is_page()) {
		global $post;

	//Facebook Tags
		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content=""/>';
		echo '<meta property="og:description" content=""/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
    	$default_image=get_template_directory_uri().'/assets/images/logo.png'; 
    	echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
    	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    	echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }


		//Twitter Cards
	    $twitter_url    = get_permalink();
	    $twitter_title  = get_the_title();
	    $twitter_desc   = strip_tags(get_the_excerpt());
	    $twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	    $twitter_thumb  = $twitter_thumbs[0];
	    if(!$twitter_thumb) {
	    	$twitter_thumb = get_template_directory_uri().'/assets/images/logo.png';
	    }
	    echo '<meta name="twitter:card" value="summary" />';
	    echo '<meta name="twitter:url" value="'. $twitter_url. '" />';
	    echo '<meta name="twitter:title" value="' .$twitter_title. '" />';
	    echo '<meta name="twitter:description" value="'. $twitter_desc. '" />';
	    echo '<meta name="twitter:image" value="'.$twitter_thumb. '" />';
	    echo '<meta name="twitter:site" value="@your twitter handle" />';
	}
}
add_action( 'wp_head', 'wpentrant_og_tags', 5 );