<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://olli.page
 * @since      1.0.0
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/admin
 * @author     Olli Perikanta <olli.perikanta@gmail.com>
 */
class Contact_Widget_Op_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Contact_Widget_Op_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contact_Widget_Op_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/contact-widget-op-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Contact_Widget_Op_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Contact_Widget_Op_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/contact-widget-op-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add custom admin menu item
	 *
	 * @since    1.0.0
	 */
	public function contact_widget_menu_item() {

		add_menu_page('Contact Widget', 'Contact Widget', 'manage_options', 'contact-qidget-op/settings.php', array($this, 'contact_widget_admin_page'), 'dashicons-format-chat', 250);
	}

	public function contact_widget_admin_page(){
		// Return views
		require_once 'partials/contact-widget-op-admin-display.php';

	}

	/**
	 * Register custom fields for plugin settings
	 *
	 * @since    1.0.0
	 */
	public function register_plugin_form_fields() {
		
		register_setting( 'contactWidgetSettings', 'whatsapp');
		register_setting( 'contactWidgetSettings', 'sms');
		register_setting( 'contactWidgetSettings', 'phone');
		register_setting( 'contactWidgetSettings', 'cta');
		register_setting( 'contactWidgetSettings', 'contactWidgetPhone');
		register_setting( 'contactWidgetSettings', 'contactWidgetPretext');
		register_setting( 'contactWidgetSettings', 'whereToShow');
		register_setting( 'contactWidgetSettings', 'whenToShow');
		register_setting( 'contactWidgetSettings', 'SetToBeLive');
		register_setting( 'contactWidgetSettings', 'specificTimeIsSelected');
		register_setting( 'contactWidgetSettings', 'startTime');
		register_setting( 'contactWidgetSettings', 'endTime');
		register_setting( 'contactWidgetSettings', 'specificWeekdayIsSelected');
		register_setting( 'contactWidgetSettings', 'monday');
		register_setting( 'contactWidgetSettings', 'tuesday');
		register_setting( 'contactWidgetSettings', 'wednesday');
		register_setting( 'contactWidgetSettings', 'thursday');
		register_setting( 'contactWidgetSettings', 'friday');
		register_setting( 'contactWidgetSettings', 'saturday');
		register_setting( 'contactWidgetSettings', 'sunday');
		register_setting( 'contactWidgetSettings', 'startDate');
		register_setting( 'contactWidgetSettings', 'endDate');
		register_setting( 'contactWidgetSettings', 'timedStartingTime');
		register_setting( 'contactWidgetSettings', 'timedEndingTime');
		register_setting( 'contactWidgetSettings', 'showOnSpecificURL');
		register_setting( 'contactWidgetSettings', 'showIfURLContains');
		register_setting( 'contactWidgetSettings', 'contactWidgetButtonColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetButtonHoverColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetItemHoverColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetItemColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetButtonContainerColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetItemIconColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetButtonIconColor');
		register_setting( 'contactWidgetSettings', 'contactWidgetEmail');
		register_setting( 'contactWidgetSettings', 'email');
	}

}