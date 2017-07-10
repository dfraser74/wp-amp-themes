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
	 * Constructor functions that adds all the admin hooks.
	 */
	function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );

		add_action( 'admin_notices', [ $this, 'amp_plugin_check' ] );

		add_filter( 'plugin_action_links_' . plugin_basename( WP_AMP_THEMES_PLUGIN_PATH . '/wp-amp-themes.php' ), [ $this, 'add_settings_link' ] );

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}


	/**
	 * Function that adds the plugin settings button to the wordpress menu side bar.
	 */
	public function admin_menu() {
		if ( is_plugin_active( 'amp/amp.php' ) ) {
			// Add menu hook.
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-themes', [ $this, 'settings' ], WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo.png' );
		} else {
			add_menu_page( self::$menu_title, self::$label, 'manage_options', 'wp-amp-instructions', [ $this, 'missing_amp_instructions' ], WP_PLUGIN_URL . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/amp-logo-notice.png' );
		}
	}

	/**
	 * Load settings page.
	 */
	public function settings() {
		include( WP_AMP_THEMES_PLUGIN_PATH . 'admin/pages/settings.php' );
	}


	/**
	 * Load page with instructions to install AMP.
	 */
	public function missing_amp_instructions() {
		include( WP_AMP_THEMES_PLUGIN_PATH . 'admin/pages/missing-amp-instructions.php' );
	}


	/**
	 * Checks if the AMP plugin from Automattic is installed and displays a notice if not.
	 */
	public function amp_plugin_check() {
		if ( ! is_plugin_active( 'amp/amp.php' ) ) {

			echo '<div class ="notice notice-warning is-dismissible">
						<p><b>WP AMP Themes</b> requires that you have the AMP plugin from Automattic active.</p>
						<p>
							Please make sure you have the plugin installed and activated. <a href="https://wordpress.org/plugins/amp/">Download the AMP plugin</a>
						</p>
				  </div>';
		}
	}

	/**
	 * Adds a settings link to the plugin in the plugin list.
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=wp-amp-themes">' . __( 'Settings' ) . '</a>';

		if ( ! is_plugin_active( 'amp/amp.php' ) ) {
			$settings_link = '<a href="' . get_admin_url() . 'admin.php?page=wp-amp-instructions"><span style="color:#b30000">' . __( 'Action Required: Get AMP' ) . '</span></a>';
		}

		array_push( $links, $settings_link );

		return $links;
	}

	/**
	 * Used to enqueue scripts for the admin area.
	 */
	public function enqueue_scripts() {

		$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();

		wp_enqueue_style( $wp_amp_themes_options->prefix . 'css_general', plugins_url(WP_AMP_THEMES_DOMAIN.'/admin/css/general.css'), array(), WP_AMP_THEMES_VERSION);

		$dependencies = array( 'jquery-core', 'jquery-migrate' );

		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_validate', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Interface/Lib/jquery.validate.min.js' ), $dependencies, '1.11.1' );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_validate_additional', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Interface/Lib/validate-additional-methods.min.js' ), $dependencies, '1.11.1' );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_loader', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Interface/Loader.min.js' ), $dependencies, WP_AMP_THEMES_VERSION );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_ajax_upload', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Interface/AjaxUpload.min.js' ), $dependencies, WP_AMP_THEMES_VERSION );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_interface', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Interface/JSInterface.min.js' ), $dependencies, WP_AMP_THEMES_VERSION );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_settings', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Modules/WP_AMP_Themes_Settings.js' ), [], WP_AMP_THEMES_VERSION );
		wp_enqueue_script( $wp_amp_themes_options->prefix . 'js_subscribe', plugins_url( WP_AMP_THEMES_DOMAIN . '/admin/js/UI.Modules/WP_AMP_Subscribe.js'), [], WP_AMP_THEMES_VERSION );
	}

}


