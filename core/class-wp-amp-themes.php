<?php

namespace WP_AMP_Themes\Core;

/**
 * Main class for the Wordpress AMP Themes plugin. This class handles:
 *
 * - activation / deactivation of the plugin
 */
class WP_AMP_Themes {


	/**
	 *
	 * The activate() method is called on the activation of the plugin.
	 */
	public function activate() {

		update_option('wp_amp_themes_options_theme', 'obliq');
	}


	/**
	 *
	 * The deactivate() method is called when the plugin is deactivated.
	 */
	public function deactivate() {

	}


}
