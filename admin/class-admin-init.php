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


	/**
	*
	*
	*
	*/
	function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ]);

		add_action( 'admin_notices', [ $this, 'amp_plugin_check' ]);

		add_filter( 'plugin_action_links_' . plugin_basename(WP_AMP_THEMES_PLUGIN_PATH . '/wp-amp-themes.php'), [ $this, 'add_settings_link' ]);
	}

	public function admin_menu() {
		if ( is_plugin_active( 'amp/amp.php' ) ) {
			// Add menu hook.
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-themes', [ $this, 'themes' ], WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo.png' );

			$this->settings_init();

		} else {
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-instructions', [ $this, 'missing_amp_instructions' ], WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo-notice.png' );
		}
	}

	public function settings_init() {
		add_settings_section(
			'wp_amp_themes_options',
			'AMP Themes Options',
			[$this, 'theme_options_callback'],
			'wp-amp-themes'
		);

		add_settings_field(
			'wp_amp_themes_theme',
			'Select Theme',
			[$this, 'theme_field_callback'],
			'wp-amp-themes',
			'wp_amp_themes_options'
		);

	}

	public function theme_options_callback() {

    	echo '<p>Select your AMP theme.</p>';
	}

	public function theme_field_callback() {

		$options = get_option( 'wp_amp_themes_theme' );

		$html = '<input type="radio" id="radio_example_one" name="sandbox_theme_input_examples[radio_example]" value="1"' . checked( 1, $options, false ) . '/>';
		$html .= '<label for="radio_example_one">Obliq</label>';
		echo $html;
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
		$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=wp-amp-themes">' . __( 'Settings' ) . '</a>';

		if ( ! is_plugin_active( 'amp/amp.php' ) ) {
			$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=wp-amp-instructions"><span style="color:#b30000">' . __( 'Action Required: Get AMP' ) . '</span>' . '</a>';
		}

		array_push( $links, $settings_link );

		return $links;
	}

}


