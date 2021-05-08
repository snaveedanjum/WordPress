<?php

/**
 * Metabox for the Services custom post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Entrant
 */


function wpentrant_service_metabox() {
	new WPEntrant_Services_CLS();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'wpentrant_service_metabox' );
	add_action( 'load-post-new.php', 'wpentrant_service_metabox' );
}

class WPEntrant_Services_CLS {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		global $post;
		add_meta_box(
			'_wpentrant_service_metabox',
			__( 'Service Icon', 'wpentrant' ),
			array( $this, 'render_service_meta_box_content' ),
			'services',
			'advanced',
			'high'
		);
	}

	public function save( $post_id ) {

		if ( ! isset( $_POST['wpentrant_service_nonce'] ) )
			return $post_id;

		$nonce = $_POST['wpentrant_service_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'wpentrant_service' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'services' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$service_class 	= isset( $_POST['wpentrant_service_class'] ) ? esc_html($_POST['wpentrant_service_class']) : false;
		update_post_meta( $post_id, 'wpentrant-service-class', $service_class );

	}

	public function render_service_meta_box_content( $post ) {
		wp_nonce_field( 'wpentrant_service', 'wpentrant_service_nonce' );

		$service_class = get_post_meta( $post->ID, 'wpentrant-service-class', true );

		?>
		<p><em><?php _e('Enter Icon Class Name', 'wpentrant'); ?></em></p>
		<p><input type="text" class="widefat" id="wpentrant_service_class" name="wpentrant_service_class" value="<?php echo esc_html($service_class); ?>"></p>	

		<?php
	}
}
