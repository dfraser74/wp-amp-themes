<?php
/**
 * Plugin Name: Wordpress AMP Themes
 * Description: AMP THEMES!
 * Author: Appticles
 * Version: 0.1
 */

namespace WP_AMP_Themes;

require_once 'vendor/autoload.php';
require_once 'core/config.php';

global $wp_amp_themes;
$wp_amp_themes  = new Core\WP_AMP_Themes();

function wp_amp_themes_admin_init() {
	new Admin\Admin_Init();
}

function wp_amp_themes_frontend_init() {
	new Frontend\Frontend_Init();
}

register_activation_hook( __FILE__, [ &$wp_amp_themes, 'activate' ] );
register_deactivation_hook( __FILE__, [ &$wp_amp_themes, 'deactivate' ] );

if ( is_admin() ) {

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

		$wp_amp_themes_admin_ajax = new Admin\Admin_Ajax();

		add_action( 'wp_ajax_wp_amp_themes_settings', [ &$wp_amp_themes_admin_ajax, 'settings' ] );

	} else {

		add_action( 'plugins_loaded', 'WP_AMP_Themes\wp_amp_themes_admin_init' );
	}

} else {
	add_action( 'plugins_loaded', 'WP_AMP_Themes\wp_amp_themes_frontend_init' );

}
