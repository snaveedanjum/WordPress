<?php
/**
 * WP Entrant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Entrant
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// Adding fuctions.
$wpentrant_functions = array(
	'/admin.php',				// make changes to dashboard
	'/cleanup.php',				// Clean site header
	'/disable-emoji.php',			// Disable emojies
	'/enqueue.php',				// Enqueue scripts and styles.
	'/login.php',				// Customazing wordpress login page.
	'/menu.php',				// Adding menus.
	'/og-tags.php',				// Adding og Tags.
	'/pagination.php',			// Adding pagination.
	'/shortcode.php',			// Shortcodes.
	'/sidebar.php',				// Adding sidebar.
	'/theme-support.php',			// Custom theme functions.

);

foreach ( $wpentrant_functions as $function ) {
	$filepath = locate_template( 'functions' . $function );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /functions%s for inclusion', $function ), E_USER_ERROR );
	}
	require_once $filepath;
}

// Includes files.
$wpentrant_includes = array(
	'/wp-navwalker.php',			// Nav menu walker
	'/theme-options.php',			// Theme options
	'/post-types.php',			// Theme Custom post types

);

foreach ( $wpentrant_includes as $files ) {
	$filepath = locate_template( 'inc' . $files );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $files ), E_USER_ERROR );
	}
	require_once $filepath;
}
