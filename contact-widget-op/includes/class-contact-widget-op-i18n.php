<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://olli.page
 * @since      1.0.0
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/includes
 * @author     Olli Perikanta <olli.perikanta@gmail.com>
 */
class Contact_Widget_Op_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'contact-widget-op',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
