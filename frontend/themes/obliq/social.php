<?php

$wp_amp_themes_options = new \WP_AMP_Themes\Includes\Options();
$facebook_app_id = $wp_amp_themes_options->get_setting( 'facebook_app_id' );

?>

<!-- start Socialbox -->
<div class="ampstart-social-box py3">
<amp-social-share type="twitter"></amp-social-share>
<amp-social-share type="facebook" data-param-app_id="<?php echo $facebook_app_id; ?>"></amp-social-share>
<amp-social-share type="gplus"></amp-social-share>

<amp-social-share type="pinterest"></amp-social-share>
<amp-social-share type="email"></amp-social-share>
</div>
<!-- End Socialbox -->
