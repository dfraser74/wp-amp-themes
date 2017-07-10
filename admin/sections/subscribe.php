<?php

$joined_subscriber_list = $wp_amp_themes_options->get_setting( 'joined_subscriber_list' );

// Check if we have a https connection.
$is_secure = ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== $_SERVER['HTTPS'] ) || 443 == $_SERVER['SERVER_PORT'];

?>

<div class="container wp_amp_themes_subscription_container">
	<h2>News & Updates</h2>
	<hr class="separator" />
	<p>Sign up for news on new themes and features!</p>
	<div class="spacer-10"></div>
	<?php if ( false == $joined_subscriber_list ) : ?>
		<form id="wp_amp_themes_subscribe_form" name="wp_amp_themes_subscribe_form" method="post">
			<input name="wp_amp_themes_subscription_email" id="wp_amp_themes_subscription_email" type="text" placeholder="Your e-mail address" class="small" value="<?php echo get_option( 'admin_email' );?>" />
			<div class="spacer-5"></div>
			<div class="field-message error" id="error_emailaddress_container"></div>
			<div class="spacer-0"></div>
			<a class="button button-primary button-large" href="javascript:void(0)" id="wp_amp_themes_subscribe_send_btn">Subscribe</a>
		</form>
	<?php endif;?>
	<div id="wp_amp_themes_subscription_added" class="added" style="display: <?php echo $joined_subscriber_list ? 'block' : 'none'?>;">
		<div class="switcher blue">
			<div class="msg">SUBSCRIBED</div>
			<div class="check"></div>
		</div>
		<div class="spacer-15"></div>
	</div>
</div>
<div class="spacer-15"></div>

<script type="text/javascript">
	if (window.WATJSInterface && window.WATJSInterface != null){
		jQuery(document).ready(function(){
			<?php if ( false === $joined_subscriber_list ) : ?>
				window.WATJSInterface.add("UI_subscribe",
				"WP_AMP_THEMES_SUBSCRIPTION",
					{
						'DOMDoc':       window.document,
						'container' :   window.document.getElementById('wp_amp_themes_subscription_container'),
						'submitURL' :   '<?php echo $is_secure ? WP_AMP_THEMES_SUBSCRIPTION_PATH_HTTPS : WP_AMP_THEMES_SUBSCRIPTION_PATH;?>'
					},
					window
				);

			<?php endif;?>
		});
	}
</script>
