<?php

namespace WP_AMP_Themes\Frontend;
/**
 * Frontend_Init class for initializing the admin area of the WP AMP Themes plugin.
 *
 * Displays menu & loads static files for the admin page.
 */
class Frontend_Init {

	function __construct() {

		add_filter( 'amp_post_template_file', [ $this, 'set_wp_amp_theme_template' ], 10, 3 );

		add_filter( 'amp_post_template_css', [ $this, 'set_wp_amp_theme_css']);
	}


	public function set_wp_amp_theme_template( $file, $type, $post ) {
		if ( 'single' === $type ) {
			$file = WP_AMP_THEMES_PLUGIN_PATH . 'frontend/themes/obliq/single.php';
		}
		return $file;
	}

	public function set_wp_amp_theme_css( $amp_template ) {
		include('/../frontend/themes/obliq/style.php');
	}

}
