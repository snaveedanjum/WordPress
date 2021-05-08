<?php

/**
 * This file registers the Services custom post type
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Entrant
 */
 

// Register the Services custom post type
function wpentrant_register_services() {

	$slug = apply_filters( 'wpentrant_services_rewrite_slug', 'services' );	

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'wpentrant' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'wpentrant' ),
		'menu_name'             => __( 'Services', 'wpentrant' ),
		'name_admin_bar'        => __( 'Services', 'wpentrant' ),
		'archives'              => __( 'Item Archives', 'wpentrant' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wpentrant' ),
		'all_items'             => __( 'All Services', 'wpentrant' ),
		'add_new_item'          => __( 'Add New Service', 'wpentrant' ),
		'add_new'               => __( 'Add New Service', 'wpentrant' ),
		'new_item'              => __( 'New Service', 'wpentrant' ),
		'edit_item'             => __( 'Edit Service', 'wpentrant' ),
		'update_item'           => __( 'Update Service', 'wpentrant' ),
		'view_item'             => __( 'View Service', 'wpentrant' ),
		'search_items'          => __( 'Search Service', 'wpentrant' ),
		'not_found'             => __( 'Not found', 'wpentrant' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpentrant' ),
		'featured_image'        => __( 'Featured Image', 'wpentrant' ),
		'set_featured_image'    => __( 'Set featured image', 'wpentrant' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpentrant' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpentrant' ),
		'insert_into_item'      => __( 'Insert into item', 'wpentrant' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpentrant' ),
		'items_list'            => __( 'Items list', 'wpentrant' ),
		'items_list_navigation' => __( 'Items list navigation', 'wpentrant' ),
		'filter_items_list'     => __( 'Filter items list', 'wpentrant' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'wpentrant' ),
		'description'           => __( 'A post type for your services', 'wpentrant' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'            => array( 'wpentrant_service_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'        	=> true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),		
	);
	register_post_type( 'services', $args );

}
add_action( 'init', 'wpentrant_register_services', 0 );


//-----------------------------------------------------
// wpentrant_service_category
// Create a Taxonomy for the Services
//-----------------------------------------------------

if ( ! function_exists( 'wpentrant_service_category' ) ) {

// Register Custom Taxonomy
    function wpentrant_service_category() {

        $labels = array(
            'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'wpentrant' ),
            'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'wpentrant' ),
            'menu_name'                  => __( 'Service Categories', 'wpentrant' ),
            'all_items'                  => __( 'All Service Categories', 'wpentrant' ),
            'parent_item'                => __( 'Parent Service Category', 'wpentrant' ),
            'parent_item_colon'          => __( 'Parent Service Category:', 'wpentrant' ),
            'new_item_name'              => __( 'New Service Category Name', 'wpentrant' ),
            'add_new_item'               => __( 'Add New Service Category', 'wpentrant' ),
            'edit_item'                  => __( 'Edit Service Category', 'wpentrant' ),
            'update_item'                => __( 'Update Service Category', 'wpentrant' ),
            'separate_items_with_commas' => __( 'Separate Service Categories with commas', 'wpentrant' ),
            'search_items'               => __( 'Search Service Categories', 'wpentrant' ),
            'add_or_remove_items'        => __( 'Add or remove Service Category', 'wpentrant' ),
            'choose_from_most_used'      => __( 'Choose from the most Service Categories', 'wpentrant' ),
            'not_found'                  => __( 'Not Found', 'wpentrant' ),
        );
        $rewrite = array(
            'slug'                       => 'service-category',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_in_rest'               => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'service_category', array( 'services' ), $args );

    }

// Hook into the 'init' services
    add_action( 'init', 'wpentrant_service_category', 0 );

}



// change the post title to request the name of the service
add_filter( 'enter_title_here', function( $title ) {
     $screen = get_current_screen();
     if  ( 'services' == $screen->post_type ) {
          $title = 'Service Title';
     }
     return $title;
});
