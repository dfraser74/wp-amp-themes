<?php
$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();

$theme = $wp_amp_themes_options->get_setting( 'theme' );
$analytics_id = $wp_amp_themes_options->get_setting( 'analytics_id' );
$facebook_app_id = $wp_amp_themes_options->get_setting( 'facebook_app_id' );

$wp_amp_themes_admin_updates = new \WP_AMP_Themes\Admin\Admin_Updates();
$premium_content = $wp_amp_themes_admin_updates->premium_themes();
$premium_themes = isset( $premium_content['list'] ) && is_array( $premium_content['list'] ) ? $premium_content['list'] : [];
?>

<script type="text/javascript">
	if (window.WATJSInterface && window.WATJSInterface != null){
		jQuery(document).ready(function(){

			WATJSInterface.localpath = "<?php echo plugins_url() . '/' . WP_AMP_THEMES_DOMAIN . '/'; ?>";
			WATJSInterface.init();
		});
	}
</script>

<div id="wp-amp-themes-admin">

	<div class="wrap">
		<div class="left-side">
			<h1>WP AMP Themes - Settings</h1>
			<hr class="separator" />
			<form name="wp_amp_themes_settings_form" id="wp_amp_themes_settings_form" action="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=wp_amp_themes_settings" method="post">
				<label class="textinput">Pick your AMP Theme:</label>
				<div class="theme-box">
					<img src="<?php echo plugins_url() . '/' . WP_AMP_THEMES_DOMAIN . '/admin/images/theme-obliq.jpg'; ?>" />
					<p>
						<input type="radio" name="theme" value="obliq" <?php checked( 'obliq' === $theme ); ?>> Obliq </input><br/>
					</p>
				</div>
				<div class="spacer-10"></div>

				<label class="textinput">Google Analytics ID:</label>
				<input
					type="text"
					name="wp_amp_themes_settings_analyticsid"
					id="wp_amp_themes_settings_analyticsid"
					value="<?php echo esc_attr($analytics_id); ?>"
					placeholder="UA-xxxxxx-01"
				>
				</input> <br/>
				<p class="field-message error" id="error_analyticsid_container"></p>

				<label class="textinput">Facebook App ID:</label>
				<input
					type="text"
					name="wp_amp_themes_settings_facebookappid"
					id="wp_amp_themes_settings_facebookappid"
					value="<?php echo esc_attr($facebook_app_id); ?>"
				>
				</input> <br/>
				<p class="field-message error" id="error_facebookappid_container"></p>

				<a href="javascript:void(0)" id="wp_amp_themes_settings_send_btn" class="button button-primary button-large">Save</a>
			</form>
			<div class="spacer-20"></div>

			<?php if ( count( $premium_themes ) > 0 ) : ?>

				<h2>Premium WP AMP Themes</h1>
				<hr class="separator" />

				<div class="themes">
					<?php
					foreach ( $premium_themes as $theme ) {
						include( WP_AMP_THEMES_PLUGIN_PATH . 'admin/sections/theme-box-premium.php' );
					}
					?>
				</div>

			<?php endif;?>
		</div>

		<div class="right-side">
			<?php include_once( WP_AMP_THEMES_PLUGIN_PATH . 'admin/sections/subscribe.php' ); ?>
			<div class="spacer-0"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	if (window.WATJSInterface && window.WATJSInterface != null){
		jQuery(document).ready(function(){

			window.WATJSInterface.add("UI_settings","WP_AMP_THEMES_SETTINGS",{'DOMDoc':window.document}, window);
		});
	}
</script>
