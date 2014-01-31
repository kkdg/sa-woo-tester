<?php
/**
 * Woocommerce Tester Plugin
 *
 * Woocommerce Tester off of which to test woocommerce behavior while developing woocommerce extension plugin
 * This also helps you build an extension faster the right way.
 *
 * @package   sa-woo-tester
 * @author    Dr.DeX
 * @license   GPL-2.0+
 * @link      http://www.skyaperture.com/plugin/woo-tester
 * @copyright 2014 SkyAperture
 *
 * @wordpress-plugin
 * Plugin Name:       SA-Woo-Tester
 * Plugin URI:        http://www.skyaperture.com/plugin/woo-tester
 * Description:       Woocommerce Tester off of which to test woocommerce behavior while developing woocommerce extension plugin.
 * Version:           0.1.0
 * Author:            Dr.DeX
 * Author URI:        http://www.wordpressure.co.kr
 * Text Domain:       sa-woo-tester-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/kkdg/sa-woo-tester
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// If woocommerce is not activated, cancel plugin activation.
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    return;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-sa-woo-tester.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-sa-woo-tester.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace sa-woo-tester with the name of the class defined in
 *   `class-sa-woo-tester.php`
 */
register_activation_hook( __FILE__, array( 'sa_woo_tester', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'sa_woo_tester', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace sa_woo_tester with the name of the class defined in
 *   `class-sa_woo_tester.php`
 */
add_action( 'plugins_loaded', array( 'sa_woo_tester', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-admin.php` with the name of the plugin's admin file
 * - replace sa-woo-tester_Admin with the name of the class defined in
 *   `class-sa-woo-tester-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-sa-woo-tester-admin.php' );
	add_action( 'plugins_loaded', array( 'sa_woo_tester_Admin', 'get_instance' ) );

}
