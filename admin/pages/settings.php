<?php
namespace WP_AMP_Themes\Admin\Pages;

$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();

$theme = $wp_amp_themes_options->get_setting('theme');

?>



<script type="text/javascript">
    if (window.WATJSInterface && window.WATJSInterface != null){
        jQuery(document).ready(function(){

            WATJSInterface.localpath = "<?php echo plugins_url()."/".WP_AMP_THEMES_DOMAIN."/"; ?>";
            WATJSInterface.init();
        });
    }
</script>

<div class="wrap">

<h1>Configure WP AMP Themes</h1>


<form name="wp_amp_themes_settings_form" id="wp_amp_themes_settings_form" action="<?php echo admin_url('admin-ajax.php'); ?>?action=wp_amp_themes_settings"  method="post">
    <label >Pick your AMP Theme</label></br></br>
    <input type="radio" name="theme" value="obliq"<?php checked( 'obliq' === $theme ); ?>> Obliq </input></br></br>
	<a href="javascript:void(0)" id="wp_amp_themes_settings_send_btn" class="button button-primary button-large">Save</a>
</form>

</div>


<script type="text/javascript">
    if (window.WATJSInterface && window.WATJSInterface != null){
        jQuery(document).ready(function(){

            window.WATJSInterface.add("UI_settings","WP_AMP_THEMES_SETTINGS",{'DOMDoc':window.document}, window);
        });
    }
</script>
