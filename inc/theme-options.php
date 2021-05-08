<?php
/**
 *
 * theme options
 *
 * @package WP_Entrant
 */

// create custom  settings menu
add_action('admin_menu', 'wpentrant_theme_options_menu');
function wpentrant_theme_options_menu() {

	//create new top-level menu
	add_menu_page('Options', 'Options', 'manage_options', 'theme-options', 'wpentrant_render_settings_page', 'dashicons-admin-generic', 60   );

	//call register settings function
	add_action( 'admin_init', 'wpentrant_options' );
}

function wpentrant_options() {

	//register our settings

	register_setting( 'wpentrant_options-group', 'facebook' );
	register_setting( 'wpentrant_options-group', 'twitter' );
	register_setting( 'wpentrant_options-group', 'linkedin' );
	register_setting( 'wpentrant_options-group', 'insta' );

	register_setting( 'wpentrant_options-group', 'analytics' );
	register_setting( 'wpentrant_options-group', 'other_code' );

	register_setting( 'wpentrant_options-group', 'address' );
	register_setting( 'wpentrant_options-group', 'phone' );
	register_setting( 'wpentrant_options-group', 'email' );
}



function wpentrant_render_settings_page() {
?>
<div class="wrap wpentrant">
<h1>Theme Options</h1>
<form method="post" action="options.php">
    <?php settings_fields( 'wpentrant_options-group' ); ?>
    <?php do_settings_sections( 'wpentrant_options-group' ); ?>

<div class="admin-box">
	<h2 class="header-box">Social</h2>
	<div class="admin-box-inner">
    	<table class="form-table">
		    <tr valign="top">
		        <th scope="row">Facebook</th>
		        <td><input type="text" name="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" /></td>
		    </tr>
	        <tr valign="top">
		        <th scope="row">Twitter</th>
		        <td><input type="text" name="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" /></td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Linkedin</th>
		        <td><input type="text" name="linkedin" value="<?php echo esc_attr( get_option('linkedin') ); ?>" /></td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Instagram</th>
		        <td><input type="text" name="insta" value="<?php echo esc_attr( get_option('insta') ); ?>" /></td>
		    </tr>
    	</table>
	</div>
</div>

<div class="admin-box">
	<h2 class="header-box">Contact Info</h2>
	<div class="admin-box-inner">
    	<table class="form-table">
	        <tr valign="top">
		        <th scope="row">Address</th>
		        <td><input type="text" name="address" value="<?php echo esc_attr( get_option('address') ); ?>" /></td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Phone</th>
		        <td><input type="text" name="phone" value="<?php echo esc_attr( get_option('phone') ); ?>" /></td>
		    </tr>
		    <tr valign="top">
		        <th scope="row">Email</th>
		        <td><input type="text" name="email" value="<?php echo esc_attr( get_option('email') ); ?>" /></td>
		    </tr>
    	</table>
	</div>
</div>

<div class="admin-box">
	<h2 class="header-box">Global Options</h2>
	<div class="admin-box-inner">
    	<table class="form-table">
		    <tr valign="top">
		        <th scope="row">Google Analytics</th>
		        <td><textarea rows="10" cols="50" name="analytics"><?php echo esc_attr( get_option('analytics') ); ?></textarea></td>
		    </tr>
	        <tr valign="top">
		        <th scope="row">Other Code in header</th>
		        <td><textarea rows="10" cols="50" name="other_code"><?php echo esc_attr( get_option('other_code') ); ?></textarea></td>
		    </tr>
    	</table>
	</div>
</div>

<?php submit_button(); ?>
</form>
</div>

<?php } 

function wpentrant_admin_style() {
    // Register Bootstrap style
    wp_enqueue_style( 'custom-admin-css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'wpentrant_admin_style' );