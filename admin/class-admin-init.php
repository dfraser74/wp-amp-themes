<?php

namespace WP_AMP_Themes\Admin;

/**
 * Admin_Init class for initializing the admin area of the WP AMP Themes plugin.
 *
 * Displays menu & loads static files for the admin page.
 */
class Admin_Init {

	private static $menu_title = WP_AMP_THEMES_PLUGIN_NAME;
	private static $label = WP_AMP_THEMES_SHORT_NAME;
	private  $options;

	function __construct() {
		$this->options = json_decode(get_option('wp_amp_themes_options'), true);
	}

	public function admin_menu() {
		if ( is_plugin_active( 'amp/amp.php' ) ) {
			// Add menu hook.
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-themes', array( $this, 'themes' ), WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo.png' );
		} else {
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-instructions', array( $this, 'missing_amp_instructions' ), WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo-notice.png' );
		}
	}

	public function themes() {
		include( WP_AMP_THEMES_PLUGIN_PATH . 'admin/pages/themes.php' );

	}

	public function missing_amp_instructions() {
		include( WP_AMP_THEMES_PLUGIN_PATH . 'admin/pages/missing-amp-instructions.php' );
	}

	public function amp_plugin_check() {
		if ( ! is_plugin_active( 'amp/amp.php' ) ) {

			echo '<div class ="notice notice-warning is-dismissible">
						<p><b>WP AMP Themes</b> requires that you have the AMP plugin from Automattic installed</p>
						<a href="' . get_admin_url() . 'admin.php?page=wp-amp-instructions">Continue Installation</a>
				  </div>';
		}
	}

	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=wp-amp-themes">' . __( 'Settings' ) . '</a>';

		if ( ! is_plugin_active( 'amp/amp.php' ) ) {
			$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=wp-amp-instructions"><span style="color:#b30000">' . __( 'Action Required: Get AMP' ) . '</span>' . '</a>';
		}

		array_push( $links, $settings_link );

		return $links;
	}

	public function set_wp_amp_theme_template( $file, $type, $post ) {
		if ( 'single' === $type ) {
			$file = WP_AMP_THEMES_PLUGIN_PATH . 'frontend/themes/' . $this->options['theme'] . '/single.php';
		}
		return $file;
	}

	public function set_wp_amp_theme_css( $amp_template ) {
		include('/../frontend/themes/' . $this->options['theme'] . '/style.php');
	}


}


