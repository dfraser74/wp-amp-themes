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
		$defaults = ['theme' => 'obliq'];

		update_option('wp_amp_themes_options', json_encode($defaults));
	}


	/**
	 *
	 * The deactivate() method is called when the plugin is deactivated.
	 */
	public function deactivate() {

	}


}
