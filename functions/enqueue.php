<?php

function wpentrant_scripts() {

    /**
     * Enqueue styles.
     */

    wp_enqueue_style( 'wpentrant-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'wpentrant_scripts' );