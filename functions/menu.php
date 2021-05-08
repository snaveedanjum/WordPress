<?php
// Register menus
register_nav_menus(
	array(
		'primary' => esc_html__( 'Primary', 'wpentrant' ),		// Main nav in header
		'secondary' => esc_html__( 'Secondary', 'wpentrant' ),		// Secondary nav in header
        'solutions' => esc_html__( 'Solutions', 'wpentrant' ),      // Solutions in header
        'footer-about-us' => esc_html__( 'Footer About Us', 'wpentrant' ),      // About Us Nav in footer
		'footer-our-solutions' => esc_html__( 'Footer Our Solutions', 'wpentrant' ),		// Our Solutions Nav in footer
		'footer-navigation' => esc_html__( 'Footer Navigation', 'wpentrant' ),		// Navigation Nav in footer
	)
);

// The Main Menu
function wpentrant_main_menu() {
	wp_nav_menu( array(
		'theme_location'  => 'primary',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'menu_class'      => 'navbar-nav mxlauto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}

function wpentrant_secondary_menu() {
    wp_nav_menu( array(
        'theme_location'  => 'secondary',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}

function wpentrant_solutions_menu() {
    wp_nav_menu( array(
        'theme_location'  => 'solutions',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}


function wpentrant_footer_about_us_menu() {
	wp_nav_menu( array(
		'theme_location'  => 'footer-about-us',
            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}

function wpentrant_footer_our_solutions_menu() {
	wp_nav_menu( array(
		'theme_location'  => 'footer-our-solutions',
            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}

function wpentrant_footer_navigation_menu() {
	wp_nav_menu( array(
		'theme_location'  => 'footer-navigation',
            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
}