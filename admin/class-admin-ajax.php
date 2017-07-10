<?php
namespace WP_AMP_Themes\Admin;

/**
 * WPMP_Pro_Admin_Ajax class for managing Ajax requests from the admin area of the Wordpress Mobile Pack PRO plugin
 */
class Admin_Ajax {

	/**
	 * Update amp themes settings.
	 */
	public function settings() {

		if ( current_user_can( 'manage_options' ) ) {

			$response = [
				'status' => 0,
				'message' => 'There was an error. Please reload the page and try again.',
			];

			if ( ! empty( $_POST ) && isset( $_POST['theme'] ) ) {

				$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
				$wp_amp_themes_config = new \WP_AMP_Themes\Core\Themes_Config();

				if ( in_array( $_POST['theme'], $wp_amp_themes_config->allowed_themes, true ) ) {

					$new_theme = sanitize_text_field( $_POST['theme'] );

					if ( $new_theme !== $wp_amp_themes_options->get_setting( 'theme' ) ) {

						$response['status'] = 1;
						$response['message'] = 'Your AMP Theme settings have been successfully modified!';

						$wp_amp_themes_options->update_settings( 'theme', $new_theme );

					} else {

						$response['message'] = 'Your AMP Theme settings have not changed.';
					}
				}
			}

			echo wp_json_encode( $response );
		}

		exit();
	}

	/**
	 * Subscribe user to mailing list.
	 */
	public function subscribe() {

		if ( current_user_can( 'manage_options' ) ) {

			$status = 0;

			if ( isset( $_POST ) && is_array( $_POST ) && ! empty( $_POST ) ) {

				if ( isset( $_POST['wp_amp_themes_subscribed'] ) && '' != $_POST['wp_amp_themes_subscribed'] ) {

					$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
					$subscribed = $wp_amp_themes_options->get_setting( 'joined_subscriber_list' );

					if ( '' == $subscribed ) {

						$response['status'] = 1;

						$wp_amp_themes_options->update_settings( 'joined_subscriber_list', $_POST['wp_amp_themes_subscribed'] );
					}
				}
			}

			echo $status;

		}

		exit();
	}


}
