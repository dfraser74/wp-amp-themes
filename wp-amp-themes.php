<?php
/**
 * Plugin Name: Wordpress AMP Themes
 * Description: AMP THEMES!
 * Author: Appticles
 * Version: 0.1
 */

namespace WP_AMP_Themes;

require_once 'vendor/autoload.php';
require_once '/core/config.php';



$wp_amp_themes  = new Core\WP_AMP_Themes();

register_activation_hook( __FILE__, [ &$wp_amp_themes, 'activate' ] );
register_deactivation_hook( __FILE__, [ &$wp_amp_themes, 'deactivate' ] );

$admin_menu = new Admin\Admin_Init();

add_action( 'admin_menu', [ &$admin_menu, 'admin_menu' ] );

add_action( 'admin_notices', [ &$admin_menu, 'amp_plugin_check' ]);

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ &$admin_menu, 'add_settings_link' ]);

add_filter( 'amp_post_template_file', [ &$admin_menu, 'set_wp_amp_theme_template' ], 10, 3 );

add_filter( 'amp_post_template_css', [ &$admin_menu, 'set_wp_amp_theme_css']);
