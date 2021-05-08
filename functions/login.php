<?php
// Calling your own login css so you can style it
function wpentrant_login_css() {
	wp_enqueue_style( 'wpentrant_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function wpentrant_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function wpentrant_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'wpentrant_login_css', 10 );
add_filter('login_headerurl', 'wpentrant_login_url');
add_filter('login_headertext', 'wpentrant_login_title');