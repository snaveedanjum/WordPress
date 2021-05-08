<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function wpentrant_disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');             // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');          // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');           // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');                  // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');           // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');            // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');                  //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');                //

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');                  // Yoast's SEO Plugin Widget

}

// removing the dashboard widgets
add_action('admin_menu', 'wpentrant_disable_default_dashboard_widgets');


/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function wpentrant_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="https://naveedanjum.info" target="_blank">Naveed Anjum</a></span>.', 'wpentrant');
}

// adding it to the admin area
add_filter('admin_footer_text', 'wpentrant_custom_admin_footer');



/* Adding copyright info in footer */
function wpentrant_copyright_info() {
	$my_theme = wp_get_theme();
	printf('<section class="bg-blue copyrights"><div class="container"><div class="row"><div class="col-md-6"><p>© %s %s | All Rights Reserved | Designed By: <a rel="noopener" href="%s" target="_blank">%s</a></p></div><div class="col-md-6"><div class="privacy"><ul><li><a href="https://starspmb.com/cookie-policy/">Cookies</a></li><li><a href="https://starspmb.com/privacy-policy/">Privacy</a></li></ul></div></div></div></section>', get_bloginfo( 'name' ), date('Y'), $my_theme->get( 'ThemeURI' ), $my_theme->get( 'Name' ));
}
add_action('wp_footer', 'wpentrant_copyright_info');
