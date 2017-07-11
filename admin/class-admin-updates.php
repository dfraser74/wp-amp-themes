<?php
namespace WP_AMP_Themes\Admin;

use \WP_AMP_Themes\Includes\Options;

/**
 * Admin_Updates class for reading premium updates.
 */
class Admin_Updates {

	/**
	 *
	 * Request json with premium themes.
	 * The method returns an array containing the upgrade information or an empty array by default.
	 *
	 * @return array or string
	 */
	public function premium_themes() {

		$wp_amp_themes_options = new Options();

		$json_data = get_transient( $wp_amp_themes_options->prefix . 'premium_themes' );

		if ( $json_data ) {

			if ( 'warning' === $json_data ) {
				return $json_data;
			}

			$response = json_decode( $json_data, true );

			if ( isset( $response['content'] ) && is_array( $response['content'] ) && ! empty( $response['content'] ) ) {

				if ( isset( $response['content']['version'] ) && WP_AMP_THEMES_PREMIUM_THEMES_VERSION == $response['content']['version'] ) {
					return $response['content'];
				}
			}
		}

		// JSON URL that should be requested.
		$json_url = WP_AMP_THEMES_PREMIUM_THEMES;

		// Get response.
		$json_response = $this->read_data( $json_url );

		if ( false !== $json_response && '' != $json_response ) {

			// Store this data in a transient.
			set_transient( $wp_amp_themes_options->prefix . 'premium_themes', $json_response, 3600 * 24 * 2 );

			$response = json_decode( $json_response, true );

			if ( isset( $response['content'] ) && is_array( $response['content'] ) && ! empty( $response['content'] ) ) {
				return $response['content'];
			}

		} elseif ( false == $json_response ) {

			// Store this data in a transient.
			set_transient( $wp_amp_themes_options->prefix . 'premium_themes', 'warning', 3600 * 24 * 2 );
			return 'warning';
		}

		return [];
	}

	/**
	 *
	 * Static method used to request the content of different pages using curl or fopen.
	 * This method returns false if both curl and fopen are dissabled and an empty string ig the json could not be read.
	 *
	 * @param string $json_url
	 * @return string or bool
	 */
	public static function read_data( $json_url ) {

		// Check if curl is enabled.
		if ( extension_loaded( 'curl' ) ) {

			$send_curl = curl_init( $json_url );

			// Set curl options.
			curl_setopt( $send_curl, CURLOPT_URL, $json_url ) ;
			curl_setopt( $send_curl, CURLOPT_HEADER, false );
			curl_setopt( $send_curl, CURLOPT_CONNECTTIMEOUT, 2 );
			curl_setopt( $send_curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $send_curl, CURLOPT_HTTPHEADER, [ 'Accept: application/json', "Content-type: application/json" ] );
			curl_setopt( $send_curl, CURLOPT_FAILONERROR, FALSE );
			curl_setopt( $send_curl, CURLOPT_SSL_VERIFYPEER, FALSE );
			curl_setopt( $send_curl, CURLOPT_SSL_VERIFYHOST, FALSE );
			$json_response = curl_exec( $send_curl );

			// Get request status.
			$status = curl_getinfo( $send_curl, CURLINFO_HTTP_CODE );
			curl_close( $send_curl );

			// Return json if success.
			if ( 200 == $status ) {
				return $json_response;
			}

		} elseif ( ini_get( 'allow_url_fopen' ) ) { // Check if allow_url_fopen is enabled.

			$json_file = fopen( $json_url, 'rb' );

			if ( $json_file ) {

				$json_response = '';

				// Read contents of file.
				while ( ! feof( $json_file ) ) {
					$json_response .= fgets( $json_file );
				}
			}

			if ( $json_response ) {
				return $json_response;
			}

		} else {
			// Both curl and fopen are disabled.
			return false;
		}

		return '';
	}
}
