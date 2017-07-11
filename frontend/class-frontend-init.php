<?php

namespace WP_AMP_Themes\Frontend;
/**
 * Frontend_Init class for initializing the admin area of the WP AMP Themes plugin.
 *
 * Displays menu & loads static files for the admin page.
 */
class Frontend_Init {


	public function __construct() {

		$this->integrate_template();

	}


	public function integrate_template() {

		add_filter( 'amp_post_template_file', [ $this, 'set_wp_amp_theme_template' ], 10, 3 );

		add_filter( 'amp_post_template_css', [ $this, 'set_wp_amp_theme_css' ] );

		$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();

		if ( $wp_amp_themes_options->get_setting( 'analytics_id' ) !== '' ) {

			add_filter( 'amp_post_template_analytics', [ $this, 'add_analytics' ] );

		}

	}

	public function set_wp_amp_theme_template( $file, $type, $post ) {

		$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
		$theme = $wp_amp_themes_options->get_setting( 'theme' );

		if ( 'single' === $type ) {
			$file = WP_AMP_THEMES_PLUGIN_PATH . "frontend/themes/$theme/single.php";
		}
		return $file;
	}

	public function set_wp_amp_theme_css( $amp_template ) {

		$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
		$theme = $wp_amp_themes_options->get_setting( 'theme' );

		include( "themes/$theme/style.php" );
	}

	public function add_analytics( $analytics ) {

		$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
		$analytics_id = $wp_amp_themes_options->get_setting( 'analytics_id' );

		if ( ! is_array( $analytics ) ) {
			$analytics = [];
		}

		$analytics['wp-amp-themes-google-analytics'] = [
			'type' => 'googleanalytics',
			'attributes' => [],
			'config_data' => [
				'vars' => [
					'account' => $analytics_id,
				],
				'triggers' => [
					'trackPageview' => [
						'on' => 'visible',
						'request' => 'pageview',
					],
				],
			],
		];

		return $analytics;
	}



}
