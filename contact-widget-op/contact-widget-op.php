<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://olli.page
 * @since             1.0.0
 * @package           Contact_Widget_Op
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Widget
 * Plugin URI:        https://olli.page
 * Description:       Contact Widget is a WordPress plugin that allows you to add a contact button to your WordPress site.
 * Version:           1.0.0
 * Author:            Olli Perikanta
 * Author URI:        https://olli.page/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       contact-widget-op
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CONTACT_WIDGET_OP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-contact-widget-op-activator.php
 */
function activate_contact_widget_op() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-widget-op-activator.php';
	Contact_Widget_Op_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-contact-widget-op-deactivator.php
 */
function deactivate_contact_widget_op() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-widget-op-deactivator.php';
	Contact_Widget_Op_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_contact_widget_op' );
register_deactivation_hook( __FILE__, 'deactivate_contact_widget_op' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-contact-widget-op.php';

// Call shortcode to print content to frontend
function call_contact_widget_shortcode() {
	//Check if user is using in WordPress LiteSpeed Cache plugin and ESI is enabled
	$esi_status = apply_filters( 'litespeed_esi_status', false );
	if ($esi_status == true) :
		echo do_shortcode('[esi contact_widget ttl="0"]');
		else :
    	echo do_shortcode('[contact_widget]');
		endif;
}
add_action( 'wp_footer', 'call_contact_widget_shortcode' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_contact_widget_op() {

	$plugin = new Contact_Widget_Op();
	$plugin->run();

}
run_contact_widget_op();