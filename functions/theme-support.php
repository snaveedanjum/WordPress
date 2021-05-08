<?php


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


if ( ! function_exists( 'wpentrant_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpentrant_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Entrant, use a find and replace
		 * to change 'wpentrant' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpentrant', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wpentrant_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 73,
				'width'       => 218,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_post_type_support( 'page', 'excerpt' );
	}
endif;
add_action( 'after_setup_theme', 'wpentrant_setup' );



/* Adding google analytics and any other code in header using theme option */
add_action('wp_head', 'wpentrant_analytics');
function wpentrant_analytics(){
	echo get_option('analytics');
	echo get_option('other_code');

};



add_filter( 'get_the_archive_title', function ($title) {    
	if ( is_category() ) {    
		$title = single_cat_title( '', false );    
	} elseif ( is_tag() ) {    
		$title = single_tag_title( '', false );    
	} elseif ( is_author() ) {    
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;    
            } elseif ( is_tax() ) { //for custom post types
            	$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
            } elseif (is_post_type_archive()) {
            	$title = post_type_archive_title( '', false );
            }
            return $title;    
        });


function wpentrant_posts_per_page( $query ) {

	if ( $query->is_main_query() && $query->is_post_type_archive('careers')) {
		set_query_var('posts_per_page', get_option('careers'));
	}
	if ( $query->is_main_query() && $query->is_post_type_archive('post')) {
		set_query_var('posts_per_page', get_option('post'));
	}
}
add_action( 'pre_get_posts', 'wpentrant_posts_per_page' );



add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {

	$post_type = get_post_type( get_the_ID() );
	$classes[] = $post_type;

	return $classes;

}

// disable the admin bar
show_admin_bar(false);


/**
 * Redirect back to homepage and not allow access to 
 * WP admin for Subscribers.
 */

function wpentrant_login_redirect( $redirect_to, $request, $user ) {
    //validating user login and roles
	if (isset($user->roles) && is_array($user->roles)) {
        //is this a gold plan subscriber?
		if (in_array('subscriber', $user->roles)) {
            // redirect them to their special plan page
			$redirect_to = esc_url( home_url('/file-uploader') );
		} else {
            //all other members
			$redirect_to = esc_url( home_url('/wp-admin') );
		}
	}
	return $redirect_to;
}

add_filter( 'login_redirect', 'wpentrant_login_redirect', 10, 3 );


/* Adding copyright info in footer */
function wpentrant_remove_js_css_from_homepage() {
	if (!is_page( 383 )) {

		wp_dequeue_style('wordpress-file-upload-style');
		wp_dequeue_style('wordpress-file-upload-style-safe');
		wp_dequeue_style('wordpress-file-upload-adminbar-style');
		wp_dequeue_style('jquery-ui-timepicker-addon-css');
		wp_dequeue_style('jquery-ui-css');

		wp_dequeue_script('wordpress_file_upload_script');
		wp_dequeue_script('jquery-ui-timepicker-addon-js');
	}
}
add_action('wp_enqueue_scripts', 'wpentrant_remove_js_css_from_homepage', 11 );