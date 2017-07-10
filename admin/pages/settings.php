<?php
$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();

$theme = $wp_amp_themes_options->get_setting( 'theme' );

$wp_amp_themes_admin_updates = new \WP_AMP_Themes\Admin\Admin_Updates();
$wp_amp_themes_premium = $wp_amp_themes_admin_updates->premium_themes();
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
				<label>Pick your AMP Theme</label>
				<input type="radio" name="theme" value="obliq" <?php checked( 'obliq' === $theme ); ?>> Obliq </input><br/><br/>

				<label class="textinput">Google Analytics ID:</label>
				<input type="text" name="analytics_id"></input> </br> </br>

				<label class="textinput">Facebook App ID:</label>
				<input type="text" name="facebook_app_id"></input> </br> </br>

				<a href="javascript:void(0)" id="wp_amp_themes_settings_send_btn" class="button button-primary button-large">Save</a>
			</form>
			<div class="spacer-0"></div>
		</div>

		<div class="right-side">
			<?php include_once(WP_AMP_THEMES_PLUGIN_PATH . 'admin/sections/subscribe.php'); ?>
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
