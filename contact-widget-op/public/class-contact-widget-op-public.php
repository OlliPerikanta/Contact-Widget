<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://olli.page
 * @since      1.0.0
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/public
 * @author     Olli Perikanta <olli.perikanta@gmail.com>
 */
class Contact_Widget_Op_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/contact-widget-op-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/contact-widget-op-public.js', array( 'jquery' ), $this->version, false );

	}

		//Shortcode what will be displayed on front end
		public function contact_widget_public() {

		add_shortcode( 'contact_widget','contact_widget_function'  );

		function contact_widget_function() {

			// Get option checkbox value
			$checkLive = get_option( 'SetToBeLive' );
		
			// Get option checkbox value
			$checkWhereToShow = get_option( 'whereToShow' );
		
			// Get "When do you want to display the button?" checkbox value
			$checkWhenToShow = get_option( 'whenToShow' );
			
			// Get input field value (URL-path is specific this)
			$getSpecificUrlPath = get_option( 'showOnSpecificURL' );
			
			// Get input field value (URL-path contains this)
			$getUrlContains = get_option( 'showIfURLContains' );
		
			// Get value of checkbox "Set the time when contact widget will be displayed"
			$checkSpecificTime = get_option( 'specificTimeIsSelected' );
		
			// Get value of checkbox "Select specific days of the week when to show contact widget"
			$checkSpecificWeekDays = get_option( 'specificWeekdayIsSelected' );
		
			// Get timezone
			date_default_timezone_set('Europe/Helsinki');
		
			// Get server time
			$info = getdate();
			$hour = $info['hours'];
			$min = $info['minutes'];
			$sec = $info['seconds'];
		
			// Get to this format: 12:12:12
			$serverTime = "$hour:$min:$sec";
		
			// Get selected time when to show button
			$startingTime = get_option( 'startTime' ) . ':00';
		
			// Get selected time when to hide button
			$endingTime = get_option( 'endTime' ) . ':00';
			
			// Check if clock is under midnight
			$underMidnight = '23:59:59';
			
			// Check if clock is midnight or over midnight
			$overMidnight = '00:00:00';
		
			// Get server date and time
			$info = getdate();
			$date = $info['mday'];
			$month = $info['mon'];
			$year = $info['year'];
			$hour = $info['hours'];
			$min = $info['minutes'];
			$sec = $info['seconds'];
			// Get date and time to this format: 12-12-2021 12:12:12
			$serverDateAndTime = "$date-$month-$year $hour:$min:$sec";
		
			// Get timed starting date 
			$startDate = get_option( 'startDate' );
		
			// Get timed starting time
			$timedStartingTime = get_option( 'timedStartingTime' ) . ':00';
		
			// Add timed starting date and time
			$startDateTime = $startDate . ' ' . $timedStartingTime;
		
			// Get timed ending date 
			$endDate = get_option( 'endDate' );
		
			// Get timed ending time
			$timedEndingTime = get_option( 'timedEndingTime' ) . ':00';
		
			// Add timed starting date and time
			$endDateTime = $endDate . ' ' . $timedEndingTime;
		
			// Parse datetime into a Unix timestamp
			$end_time = strtotime($endingTime);
			$start_time = strtotime($startingTime);
			$server_time = strtotime($serverTime);
			$is_not_midnight = strtotime($underMidnight);
			$is_midnight = strtotime($overMidnight);
			$server_date = strtotime($serverDateAndTime);
			$start_date = strtotime($startDateTime);
			$end_date = strtotime($endDateTime);
		
			// Get day of the week
			$dayOfWeek = date('N');
		
			// Get monday checkbox value
			$mondaySelected = get_option( 'monday' );
		
			// Get tuesday checkbox value
			$tuesdaySelected = get_option( 'tuesday' );
		
			// Get wednesday checkbox value
			$wednesdaySelected = get_option( 'wednesday' );
		
			// Get thursday checkbox value
			$thursdaySelected = get_option( 'thursday' );
		
			// Get friday checkbox value
			$fridaySelected = get_option( 'friday' );
		
			// Get saturday checkbox value
			$saturdaySelected = get_option( 'saturday' );
		
			// Get sunday checkbox value
			$sundaySelected = get_option( 'sunday' );
			
		
			// Get browser current page URL-path
			if (
				isset( $_SERVER['HTTPS'] ) &&
				( $_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1 ) ||
				isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
				$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
			) :
				$protocol = 'https://';
			else :
				$protocol = 'http://';
			endif;
			$browserUrlPath = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		
			// Escape browser URL-path
			$escaped_url = htmlspecialchars( $browserUrlPath, ENT_QUOTES, 'UTF-8' );
		
			// Check if whatsapp is selected
			$checkWhatsapp = get_option( 'whatsapp' );
		
			// Check if phone is selected
			$checkPhone = get_option( 'phone' );
		
			// Check if email is selected
			$checkEmail = get_option( 'email' );
		
			// Check if sms is selected
			$checkSms = get_option( 'sms' );
		
			// Get phonenumber field 
			$phoneNumber = get_option( 'contactWidgetPhone' );
		
			// Get prefilled text field
			$prefilledMessage = get_option( 'contactWidgetPretext' );
		
			// Get button text
			$messageText = get_option( 'cta' );
		
			// Get email address
			$emailAddress = get_option( 'contactWidgetEmail' );
		
			// contact widget color settings
			$buttonColor = get_option( 'contactWidgetButtonColor' );
			$buttonHoverColor = get_option( 'contactWidgetButtonHoverColor' );
			$buttonIconColor = get_option( 'contactWidgetButtonIconColor' );
			$itemColor = get_option( 'contactWidgetItemColor' );
			$itemHoverColor = get_option( 'contactWidgetItemHoverColor' );
			$itemIconColor = get_option( 'contactWidgetItemIconColor' );
		
			// Call to action "contact buddle"
			$call_to_action = '<div style="display: none;" id="contactWidgetCtaContainer_2356213" class="contact-widget-cta-container"><div id="contactWidgetCtaClosing_2356213" class="cta-closing-tab"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg></div><div id="contactWidgetCTA_2356213" class="contact-widget-cta-content">' . $messageText .'</div></div>';
		
			if ($checkSms == 'sms') :
			// Device check
			$useragent = $_SERVER['HTTP_USER_AGENT']; 
			$iPod = stripos($useragent, "iPod"); 
			$iPad = stripos($useragent, "iPad"); 
			$iPhone = stripos($useragent, "iPhone");
			$Android = stripos($useragent, "Android"); 
			$iOS = stripos($useragent, "iOS");
		
			$IOS_Device = ($iPod||$iPad||$iPhone||$iOS);
			$Android_Device = ($Android);
		
			// SMS function
			if (!$IOS_Device) :
				$sms = '<a id="smsButton" class="contact-widget-item sms-item" href="sms:' . $phoneNumber . '/?body=' . $prefilledMessage . '">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path fill="' . $itemIconColor .'" d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.144 7.961-9.91 7.961-1.937 0-3.384-.397-4.394-.644-1 .613-1.594 1.037-4.272 1.82.535-1.373.722-2.748.601-4.265-.837-1-2.025-2.4-2.025-4.872 0-4.415 4.486-8.007 10-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.417.345 2.774.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-4.449 10.151c.246.277.369.621.369 1.034 0 .529-.208.958-.624 1.289-.416.33-.996.495-1.74.495-.637 0-1.201-.123-1.69-.367l.274-1.083c.494.249.993.375 1.501.375.293 0 .521-.056.686-.167.315-.214.334-.646.023-.892-.149-.117-.404-.236-.769-.357-1.097-.366-1.645-.937-1.645-1.716 0-.503.202-.917.604-1.243.404-.325.943-.488 1.614-.488.586 0 1.096.099 1.535.298l-.299 1.049c-.401-.187-.82-.28-1.254-.28-.267 0-.476.052-.627.153-.299.204-.293.57-.035.787.126.107.428.246.91.416.532.187.92.42 1.167.697zm12.205-.021c-.249-.28-.645-.518-1.181-.706-.475-.168-.776-.307-.899-.41-.243-.205-.249-.545.032-.738.146-.099.352-.148.609-.148.464 0 .87.104 1.274.295l.316-1.111-.022-.012c-.441-.199-.962-.3-1.55-.3-.675 0-1.225.166-1.632.495-.41.33-.618.757-.618 1.267 0 .791.562 1.377 1.67 1.745.357.122.612.239.757.353.292.231.28.637-.022.841-.157.108-.381.162-.667.162-.549 0-1.042-.145-1.522-.39l-.29 1.147c.549.273 1.122.38 1.728.38.749 0 1.34-.168 1.759-.502.422-.334.636-.776.636-1.313 0-.418-.127-.772-.378-1.055zm-6.644-3.005l-1.228 3.967-1.014-3.967h-1.791l-.366 5.75h1.229l.204-4.642h.018s.702 2.878 1.178 4.547h1.031c.794-2.419 1.261-3.936 1.399-4.547h.026c0 .813.045 2.36.136 4.642h1.298l-.309-5.75h-1.811z" />
			</svg>
			  </a>';
				elseif (!$Android_Device) :
					$sms = '<a id="smsButton" class="contact-widget-item sms-item" href="sms:' . $phoneNumber . '/;body=' . $prefilledMessage . '">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path fill="' . $itemIconColor .'" d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.144 7.961-9.91 7.961-1.937 0-3.384-.397-4.394-.644-1 .613-1.594 1.037-4.272 1.82.535-1.373.722-2.748.601-4.265-.837-1-2.025-2.4-2.025-4.872 0-4.415 4.486-8.007 10-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.417.345 2.774.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-4.449 10.151c.246.277.369.621.369 1.034 0 .529-.208.958-.624 1.289-.416.33-.996.495-1.74.495-.637 0-1.201-.123-1.69-.367l.274-1.083c.494.249.993.375 1.501.375.293 0 .521-.056.686-.167.315-.214.334-.646.023-.892-.149-.117-.404-.236-.769-.357-1.097-.366-1.645-.937-1.645-1.716 0-.503.202-.917.604-1.243.404-.325.943-.488 1.614-.488.586 0 1.096.099 1.535.298l-.299 1.049c-.401-.187-.82-.28-1.254-.28-.267 0-.476.052-.627.153-.299.204-.293.57-.035.787.126.107.428.246.91.416.532.187.92.42 1.167.697zm12.205-.021c-.249-.28-.645-.518-1.181-.706-.475-.168-.776-.307-.899-.41-.243-.205-.249-.545.032-.738.146-.099.352-.148.609-.148.464 0 .87.104 1.274.295l.316-1.111-.022-.012c-.441-.199-.962-.3-1.55-.3-.675 0-1.225.166-1.632.495-.41.33-.618.757-.618 1.267 0 .791.562 1.377 1.67 1.745.357.122.612.239.757.353.292.231.28.637-.022.841-.157.108-.381.162-.667.162-.549 0-1.042-.145-1.522-.39l-.29 1.147c.549.273 1.122.38 1.728.38.749 0 1.34-.168 1.759-.502.422-.334.636-.776.636-1.313 0-.418-.127-.772-.378-1.055zm-6.644-3.005l-1.228 3.967-1.014-3.967h-1.791l-.366 5.75h1.229l.204-4.642h.018s.702 2.878 1.178 4.547h1.031c.794-2.419 1.261-3.936 1.399-4.547h.026c0 .813.045 2.36.136 4.642h1.298l-.309-5.75h-1.811z" />
				</svg>
				  </a>';
					else :
						$sms = '<a id="smsButton" class="contact-widget-item sms-item" href="sms:' . $phoneNumber . '/?body=' . $prefilledMessage . '">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path fill="' . $itemIconColor .'" d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.144 7.961-9.91 7.961-1.937 0-3.384-.397-4.394-.644-1 .613-1.594 1.037-4.272 1.82.535-1.373.722-2.748.601-4.265-.837-1-2.025-2.4-2.025-4.872 0-4.415 4.486-8.007 10-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.417.345 2.774.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-4.449 10.151c.246.277.369.621.369 1.034 0 .529-.208.958-.624 1.289-.416.33-.996.495-1.74.495-.637 0-1.201-.123-1.69-.367l.274-1.083c.494.249.993.375 1.501.375.293 0 .521-.056.686-.167.315-.214.334-.646.023-.892-.149-.117-.404-.236-.769-.357-1.097-.366-1.645-.937-1.645-1.716 0-.503.202-.917.604-1.243.404-.325.943-.488 1.614-.488.586 0 1.096.099 1.535.298l-.299 1.049c-.401-.187-.82-.28-1.254-.28-.267 0-.476.052-.627.153-.299.204-.293.57-.035.787.126.107.428.246.91.416.532.187.92.42 1.167.697zm12.205-.021c-.249-.28-.645-.518-1.181-.706-.475-.168-.776-.307-.899-.41-.243-.205-.249-.545.032-.738.146-.099.352-.148.609-.148.464 0 .87.104 1.274.295l.316-1.111-.022-.012c-.441-.199-.962-.3-1.55-.3-.675 0-1.225.166-1.632.495-.41.33-.618.757-.618 1.267 0 .791.562 1.377 1.67 1.745.357.122.612.239.757.353.292.231.28.637-.022.841-.157.108-.381.162-.667.162-.549 0-1.042-.145-1.522-.39l-.29 1.147c.549.273 1.122.38 1.728.38.749 0 1.34-.168 1.759-.502.422-.334.636-.776.636-1.313 0-.418-.127-.772-.378-1.055zm-6.644-3.005l-1.228 3.967-1.014-3.967h-1.791l-.366 5.75h1.229l.204-4.642h.018s.702 2.878 1.178 4.547h1.031c.794-2.419 1.261-3.936 1.399-4.547h.026c0 .813.045 2.36.136 4.642h1.298l-.309-5.75h-1.811z" />
									</svg>
					  </a>';
			endif;
		
			else :
		
				$sms = '';
		
			endif; 
		
			// Phone function
			if ( $checkPhone == 'phone') :
		
				$phone = '<a id="phoneButton" class="contact-widget-item phone-item" href="tel:' . $phoneNumber . '">
							<svg class="phone-item-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path fill="' . $itemIconColor .'" d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z" />
							</svg>
							  </a>';
		
				else :
		
					$phone = '';
		
				endif; 
		
		
			// Whatsapp function
			if ( $checkWhatsapp == 'whatsapp') :
		
				$whatsapp = '<a id="whatsappButton" class="contact-widget-item whatsapp-item" href="https://wa.me/' . $phoneNumber . '?text=' . $prefilledMessage . '">
								<svg class="whatsapp-item-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path fill="' . $itemIconColor .'" d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
								</svg>
							  </a>';
		
				else :
		
					$whatsapp = '';
		
				endif;
		
			// Email function
			if ( $checkEmail == 'email') :
		
				$email = '<a id="emailButton" class="contact-widget-item email-item" href="mailto:' . $emailAddress . '">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path fill="' . $itemIconColor .'" d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
							</svg>
						  </a>';
		
				else :
		
					$email = '';
		
				endif;
		
			// contact Widget
			$contactWidget = '<div id="contactWidgetContainer_2356213" class="contact-widget-container">
			' . $call_to_action . '
			' . $email . '
			' . $sms . '
			' . $phone . '
			' . $whatsapp . '
			<button class="contact-widget-button" id="contactButton_2356213">
			<svg id="contactWidgetXIcon_2356213" class="contact-widget-button-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="' . $buttonIconColor .'" d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
			<svg id="contactWidgetcontactIcon_2356213" class="contact-widget-button-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="' . $buttonIconColor .'" d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.145 7.961-9.91 7.961-1.937 0-3.383-.397-4.394-.644-1 .613-1.595 1.037-4.272 1.82.535-1.373.723-2.748.602-4.265-.838-1-2.025-2.4-2.025-4.872-.001-4.415 4.485-8.007 9.999-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.418.345 2.775.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm0 14h-5v-1h5v1zm5-3h-10v-1h10v1zm0-3h-10v-1h10v1z"/></svg>
			 </button>
			 </div>
			 <style>.contact-widget-button {background-color: '. $buttonColor .';} .contact-widget-button:hover {background-color: ' . $buttonHoverColor .'!important;} .add_dark_contactbutton_color { background-color: ' . $buttonHoverColor .'!important; } .contact-widget-item { background-color: ' . $itemColor .'; } .contact-widget-item:hover { background-color: ' . $itemHoverColor .'!important; } </style>';
		
			// Check if user has set contact widget to be on live mode
			if ($checkLive == 'isLive') :
		
				// Check if user wants to show contact widget everywhere on website
				if ($checkWhereToShow == 'onEveryPage') :
					
					// Show contact widget continiously
					if ($checkWhenToShow == 'showContiniously') :
		
						// Check if user has selected both (specific time and weekdays) when to show button
						if ($checkSpecificTime == 'specificTimeIsSelected' && $checkSpecificWeekDays == 'specificWeekdayIsSelected') :
		
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
									
										return $contactWidget;
								
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										
										// If above conditions are false that means contact widget needs to be hidden
										else :
										
											return '';
										
									endif; // End of checking if time is over midnight or not 
								
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
									
									return $contactWidget;
								
									else :
								
									return '';
								
							endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
											
												return $contactWidget;
								
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
											
												return $contactWidget;
											
											// If above conditions are false that means contact widget needs to be hidden
											else :
											
												return '';
											
										endif; // End of checking if time is over midnight or not  
		
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										else :
										
											return '';
										
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
								
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
												
													return $contactWidget;
												
												// If above conditions are false that means contact widget needs to be hidden
												else :
												
													return '';
												
											endif; // End of checking if time is over midnight or not  
		
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
											
												return $contactWidget;
											
											else :
											
												return '';
											
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
		
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
													
														return $contactWidget;
								
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													// If above conditions are false that means contact widget needs to be hidden
													else :
													
														return '';
													
												endif; // End of checking if time is over midnight or not  
		
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
												
													return $contactWidget;
												
												else :
												
													return '';
												
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
		
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
														
															return $contactWidget;
								
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														// If above conditions are false that means contact widget needs to be hidden
														else :
														
															return '';
														
													endif; // End of checking if time is over midnight or not  
		
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													else :
													
														return '';
													
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
															
																return $contactWidget;
								
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
																return $contactWidget;
															
															// If above conditions are false that means contact widget needs to be hidden
															else :
															
																return '';
															
														endif; // End of checking if time is over midnight or not  
		
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														else :
														
															return '';
														
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
														
															// Check if start time is bigger than ending time
															if ($start_time > $end_time) :
							
																// Check if current time is bigger than start time and check if time is not over midnight
																if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
																
																	return $contactWidget;
								
																// Check if current time is over midnight but not over ending time
																elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
																
																	return $contactWidget;
																
																// If above conditions are false that means contact widget needs to be hidden
																else :
																
																	return '';
																
																endif; // End of checking if time is over midnight or not  
		
															elseif ($server_time >= $start_time && $server_time <= $end_time ) :
															
																return $contactWidget;
															
															else :
															
																return '';
															
															endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
														endif; // End of checking what day of week is now
		
						// End of checking if both (specific time and weekdays)	are checked					
						elseif ($checkSpecificWeekDays == 'specificWeekdayIsSelected') :
							
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
										return $contactWidget;
													
									// Check if current time is over midnight but not over ending time
									elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
										return $contactWidget;
									
									// If above conditions are false that means contact widget needs to be hidden
									else :
									
										return '';
									
								endif; // End of checking if time is over midnight or not  
							
								elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								else :
		
								return '';
		
								endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
									
									// Check if start time is bigger than ending time
									if ($start_time > $end_time) :
							
										// Check if current time is bigger than start time and check if time is not over midnight
										if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
											return $contactWidget;
													
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
											return $contactWidget;
		
										// If above conditions are false that means contact widget needs to be hidden
										else :
		
										return '';
		
										endif; // End of checking if time is over midnight or not  
							
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
										return $contactWidget;
		
									else :
		
									return '';
									
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
												return $contactWidget;
													
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
												return $contactWidget;
		
											// If above conditions are false that means contact widget needs to be hidden
											else :
		
											return '';
		
											endif; // End of checking if time is over midnight or not  
							
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
											return $contactWidget;
		
										else :
		
										return '';
		
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
											
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
													
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
													return $contactWidget;
		
												// If above conditions are false that means contact widget needs to be hidden
												else :
		
												return '';
		
												endif; // End of checking if time is over midnight or not 
							
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
											else :
		
											return '';
		
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
												
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
														return $contactWidget;
													
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
														return $contactWidget;
		
													// If above conditions are false that means contact widget needs to be hidden
													else :
		
														return '';
		
													endif; // End of checking if time is over midnight or not 
							
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
												else :
		
													return '';
		
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
															
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
															return $contactWidget;
													
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
															return $contactWidget;
		
														// If above conditions are false that means contact widget needs to be hidden
														else :
		
														return '';
		
														endif; // End of checking if time is over midnight or not
							
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
														return $contactWidget;
		
													else :
		
														return '';
		
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
																return $contactWidget;
													
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
																return $contactWidget;
		
															// If above conditions are false that means contact widget needs to be hidden
															else :
		
															return '';
		
															endif; // End of checking if time is over midnight or not 
							
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
															return $contactWidget;
		
														else :
		
														return '';
		
														endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
							endif; // End of checking what day of week is now
		
						elseif ($checkSpecificTime == 'specificTimeIsSelected') :
							
						// Check if start time is bigger than ending time
						if ($start_time > $end_time) :
							
							// Check if current time is bigger than start time and check if time is not over midnight
							if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
								return $contactWidget;
								
								// Check if current time is over midnight but not over ending time
								elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								// If above conditions are false that means contact widget needs to be hidden
								else :
		
									return '';
		
								endif; // End of checking if time is over midnight or not 
		
							elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
								return $contactWidget;
		
							else :
		
								return '';
		
						endif; // end of checking is start time bigger or not than ending time
		
							// User has not select any more custom display options so button will be displayed all the time
							else :
		
								return $contactWidget;
		
						endif; // End of checking when to show button
		
						elseif ($checkWhenToShow == 'showSpecificTimePeriod'):
		
							if($start_date <= $server_date && $end_date >= $server_date) :
		
								return $contactWidget;
		
								else :
		
									return '';
		
								endif; // End of specific time period
		
						endif; // End of checking when to show contact widget (continoisly or specific time period)
		
					// Check if user wants to show contact widget only on specific URL-path
					elseif($checkWhereToShow == 'onlySpecificURL' && $escaped_url == $getSpecificUrlPath) :
						
						// Show contact widget continiously
					if ($checkWhenToShow == 'showContiniously') :
		
						// Check if user has selected both (specific time and weekdays) when to show button
						if ($checkSpecificTime == 'specificTimeIsSelected' && $checkSpecificWeekDays == 'specificWeekdayIsSelected') :
		
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
									
										return $contactWidget;
								
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										
										// If above conditions are false that means contact widget needs to be hidden
										else :
										
											return '';
										
									endif; // End of checking if time is over midnight or not 
								
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
									
									return $contactWidget;
								
									else :
								
									return '';
								
							endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
											
												return $contactWidget;
								
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
											
												return $contactWidget;
											
											// If above conditions are false that means contact widget needs to be hidden
											else :
											
												return '';
											
										endif; // End of checking if time is over midnight or not  
		
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										else :
										
											return '';
										
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
								
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
												
													return $contactWidget;
												
												// If above conditions are false that means contact widget needs to be hidden
												else :
												
													return '';
												
											endif; // End of checking if time is over midnight or not  
		
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
											
												return $contactWidget;
											
											else :
											
												return '';
											
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
		
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
													
														return $contactWidget;
								
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													// If above conditions are false that means contact widget needs to be hidden
													else :
													
														return '';
													
												endif; // End of checking if time is over midnight or not  
		
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
												
													return $contactWidget;
												
												else :
												
													return '';
												
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
		
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
														
															return $contactWidget;
								
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														// If above conditions are false that means contact widget needs to be hidden
														else :
														
															return '';
														
													endif; // End of checking if time is over midnight or not  
		
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													else :
													
														return '';
													
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
															
																return $contactWidget;
								
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
																return $contactWidget;
															
															// If above conditions are false that means contact widget needs to be hidden
															else :
															
																return '';
															
														endif; // End of checking if time is over midnight or not  
		
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														else :
														
															return '';
														
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
														
															// Check if start time is bigger than ending time
															if ($start_time > $end_time) :
							
																// Check if current time is bigger than start time and check if time is not over midnight
																if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
																
																	return $contactWidget;
								
																// Check if current time is over midnight but not over ending time
																elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
																
																	return $contactWidget;
																
																// If above conditions are false that means contact widget needs to be hidden
																else :
																
																	return '';
																
																endif; // End of checking if time is over midnight or not  
		
															elseif ($server_time >= $start_time && $server_time <= $end_time ) :
															
																return $contactWidget;
															
															else :
															
																return '';
															
															endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
														endif; // End of checking what day of week is now
		
						// End of checking if both (specific time and weekdays)	are checked					
						elseif ($checkSpecificWeekDays == 'specificWeekdayIsSelected') :
							
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
										return $contactWidget;
													
									// Check if current time is over midnight but not over ending time
									elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
										return $contactWidget;
									
									// If above conditions are false that means contact widget needs to be hidden
									else :
									
										return '';
									
								endif; // End of checking if time is over midnight or not  
							
								elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								else :
		
								return '';
		
								endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
									
									// Check if start time is bigger than ending time
									if ($start_time > $end_time) :
							
										// Check if current time is bigger than start time and check if time is not over midnight
										if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
											return $contactWidget;
													
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
											return $contactWidget;
		
										// If above conditions are false that means contact widget needs to be hidden
										else :
		
										return '';
		
										endif; // End of checking if time is over midnight or not  
							
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
										return $contactWidget;
		
									else :
		
									return '';
									
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
												return $contactWidget;
													
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
												return $contactWidget;
		
											// If above conditions are false that means contact widget needs to be hidden
											else :
		
											return '';
		
											endif; // End of checking if time is over midnight or not  
							
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
											return $contactWidget;
		
										else :
		
										return '';
		
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
											
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
													
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
													return $contactWidget;
		
												// If above conditions are false that means contact widget needs to be hidden
												else :
		
												return '';
		
												endif; // End of checking if time is over midnight or not 
							
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
											else :
		
											return '';
		
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
												
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
														return $contactWidget;
													
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
														return $contactWidget;
		
													// If above conditions are false that means contact widget needs to be hidden
													else :
		
														return '';
		
													endif; // End of checking if time is over midnight or not 
							
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
												else :
		
													return '';
		
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
															
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
															return $contactWidget;
													
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
															return $contactWidget;
		
														// If above conditions are false that means contact widget needs to be hidden
														else :
		
														return '';
		
														endif; // End of checking if time is over midnight or not
							
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
														return $contactWidget;
		
													else :
		
														return '';
		
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
																return $contactWidget;
													
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
																return $contactWidget;
		
															// If above conditions are false that means contact widget needs to be hidden
															else :
		
															return '';
		
															endif; // End of checking if time is over midnight or not 
							
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
															return $contactWidget;
		
														else :
		
														return '';
		
														endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
							endif; // End of checking what day of week is now
		
						elseif ($checkSpecificTime == 'specificTimeIsSelected') :
							
						// Check if start time is bigger than ending time
						if ($start_time > $end_time) :
							
							// Check if current time is bigger than start time and check if time is not over midnight
							if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
								return $contactWidget;
								
								// Check if current time is over midnight but not over ending time
								elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								// If above conditions are false that means contact widget needs to be hidden
								else :
		
									return '';
		
								endif; // End of checking if time is over midnight or not 
		
							elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
								return $contactWidget;
		
							else :
		
								return '';
		
						endif; // end of checking is start time bigger or not than ending time
		
							// User has not select any more custom display options so button will be displayed all the time
							else :
		
								return $contactWidget;
		
						endif; // End of checking when to show button
		
						elseif ($checkWhenToShow == 'showSpecificTimePeriod'):
		
							if($start_date <= $server_date && $end_date >= $server_date) :
		
								return $contactWidget;
		
								else :
		
									return '';
		
								endif; // End of specific time period
		
						endif; // End of checking when to show contact widget (continoisly or specific time period)
		
						// Check if user wants to show contact widget on specific part of URL-path
						elseif($checkWhereToShow == 'URLContainsThis' && !empty($getUrlContains) && strpos($escaped_url, "$getUrlContains")!==false) :
							
							// Show contact widget continiously
					if ($checkWhenToShow == 'showContiniously') :
		
						// Check if user has selected both (specific time and weekdays) when to show button
						if ($checkSpecificTime == 'specificTimeIsSelected' && $checkSpecificWeekDays == 'specificWeekdayIsSelected') :
		
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
									
										return $contactWidget;
								
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										
										// If above conditions are false that means contact widget needs to be hidden
										else :
										
											return '';
										
									endif; // End of checking if time is over midnight or not 
								
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
									
									return $contactWidget;
								
									else :
								
									return '';
								
							endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
											
												return $contactWidget;
								
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
											
												return $contactWidget;
											
											// If above conditions are false that means contact widget needs to be hidden
											else :
											
												return '';
											
										endif; // End of checking if time is over midnight or not  
		
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
										
											return $contactWidget;
										
										else :
										
											return '';
										
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
								
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
												
													return $contactWidget;
												
												// If above conditions are false that means contact widget needs to be hidden
												else :
												
													return '';
												
											endif; // End of checking if time is over midnight or not  
		
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
											
												return $contactWidget;
											
											else :
											
												return '';
											
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
		
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
													
														return $contactWidget;
								
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													// If above conditions are false that means contact widget needs to be hidden
													else :
													
														return '';
													
												endif; // End of checking if time is over midnight or not  
		
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
												
													return $contactWidget;
												
												else :
												
													return '';
												
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
		
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
														
															return $contactWidget;
								
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														// If above conditions are false that means contact widget needs to be hidden
														else :
														
															return '';
														
													endif; // End of checking if time is over midnight or not  
		
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
													
														return $contactWidget;
													
													else :
													
														return '';
													
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
															
																return $contactWidget;
								
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
																return $contactWidget;
															
															// If above conditions are false that means contact widget needs to be hidden
															else :
															
																return '';
															
														endif; // End of checking if time is over midnight or not  
		
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
														
															return $contactWidget;
														
														else :
														
															return '';
														
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
														
															// Check if start time is bigger than ending time
															if ($start_time > $end_time) :
							
																// Check if current time is bigger than start time and check if time is not over midnight
																if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
																
																	return $contactWidget;
								
																// Check if current time is over midnight but not over ending time
																elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
																
																	return $contactWidget;
																
																// If above conditions are false that means contact widget needs to be hidden
																else :
																
																	return '';
																
																endif; // End of checking if time is over midnight or not  
		
															elseif ($server_time >= $start_time && $server_time <= $end_time ) :
															
																return $contactWidget;
															
															else :
															
																return '';
															
															endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
														endif; // End of checking what day of week is now
		
						// End of checking if both (specific time and weekdays)	are checked					
						elseif ($checkSpecificWeekDays == 'specificWeekdayIsSelected') :
							
							// Monday
							if ($dayOfWeek == '1' && $mondaySelected == 'mondaySelected') :
		
								// Check if start time is bigger than ending time
								if ($start_time > $end_time) :
							
									// Check if current time is bigger than start time and check if time is not over midnight
									if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
										return $contactWidget;
													
									// Check if current time is over midnight but not over ending time
									elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
										return $contactWidget;
									
									// If above conditions are false that means contact widget needs to be hidden
									else :
									
										return '';
									
								endif; // End of checking if time is over midnight or not  
							
								elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								else :
		
								return '';
		
								endif; // end of checking is start time bigger or not than ending time
		
								//Tuesday
								elseif ($dayOfWeek == '2' && $tuesdaySelected == 'tuesdaySelected') :
									
									// Check if start time is bigger than ending time
									if ($start_time > $end_time) :
							
										// Check if current time is bigger than start time and check if time is not over midnight
										if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
											return $contactWidget;
													
										// Check if current time is over midnight but not over ending time
										elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
											return $contactWidget;
		
										// If above conditions are false that means contact widget needs to be hidden
										else :
		
										return '';
		
										endif; // End of checking if time is over midnight or not  
							
									elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
										return $contactWidget;
		
									else :
		
									return '';
									
									endif; // end of checking is start time bigger or not than ending time
		
									//Wednesday
									elseif ($dayOfWeek == '3' && $wednesdaySelected == 'wednesdaySelected') :
		
										// Check if start time is bigger than ending time
										if ($start_time > $end_time) :
							
											// Check if current time is bigger than start time and check if time is not over midnight
											if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
												return $contactWidget;
													
											// Check if current time is over midnight but not over ending time
											elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
												return $contactWidget;
		
											// If above conditions are false that means contact widget needs to be hidden
											else :
		
											return '';
		
											endif; // End of checking if time is over midnight or not  
							
										elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
											return $contactWidget;
		
										else :
		
										return '';
		
										endif; // end of checking is start time bigger or not than ending time
		
										//Thursday
										elseif ($dayOfWeek == '4' && $thursdaySelected == 'thursdaySelected') :
											
											// Check if start time is bigger than ending time
											if ($start_time > $end_time) :
							
												// Check if current time is bigger than start time and check if time is not over midnight
												if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
												
													return $contactWidget;
													
												// Check if current time is over midnight but not over ending time
												elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
													return $contactWidget;
		
												// If above conditions are false that means contact widget needs to be hidden
												else :
		
												return '';
		
												endif; // End of checking if time is over midnight or not 
							
											elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
											else :
		
											return '';
		
											endif; // end of checking is start time bigger or not than ending time
		
											//Friday
											elseif ($dayOfWeek == '5' && $fridaySelected == 'fridaySelected') : 
												
												// Check if start time is bigger than ending time
												if ($start_time > $end_time) :
							
													// Check if current time is bigger than start time and check if time is not over midnight
													if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
														return $contactWidget;
													
													// Check if current time is over midnight but not over ending time
													elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
														return $contactWidget;
		
													// If above conditions are false that means contact widget needs to be hidden
													else :
		
														return '';
		
													endif; // End of checking if time is over midnight or not 
							
												elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
												return $contactWidget;
		
												else :
		
													return '';
		
												endif; // end of checking is start time bigger or not than ending time
		
												//Saturday
												elseif ($dayOfWeek == '6' && $saturdaySelected == 'saturdaySelected') :
															
													// Check if start time is bigger than ending time
													if ($start_time > $end_time) :
							
														// Check if current time is bigger than start time and check if time is not over midnight
														if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
															return $contactWidget;
													
														// Check if current time is over midnight but not over ending time
														elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
															return $contactWidget;
		
														// If above conditions are false that means contact widget needs to be hidden
														else :
		
														return '';
		
														endif; // End of checking if time is over midnight or not
							
													elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
														return $contactWidget;
		
													else :
		
														return '';
		
													endif; // end of checking is start time bigger or not than ending time
		
													//Sunday
													elseif ($dayOfWeek == '7'  && $sundaySelected == 'sundaySelected') :
		
														// Check if start time is bigger than ending time
														if ($start_time > $end_time) :
							
															// Check if current time is bigger than start time and check if time is not over midnight
															if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
																return $contactWidget;
													
															// Check if current time is over midnight but not over ending time
															elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
							
																return $contactWidget;
		
															// If above conditions are false that means contact widget needs to be hidden
															else :
		
															return '';
		
															endif; // End of checking if time is over midnight or not 
							
														elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
															return $contactWidget;
		
														else :
		
														return '';
		
														endif; // end of checking is start time bigger or not than ending time
		
														else :
		
															return '';
		
							endif; // End of checking what day of week is now
		
						elseif ($checkSpecificTime == 'specificTimeIsSelected') :
							
						// Check if start time is bigger than ending time
						if ($start_time > $end_time) :
							
							// Check if current time is bigger than start time and check if time is not over midnight
							if ($server_time >= $start_time && $server_time <= $is_not_midnight) :
		
								return $contactWidget;
								
								// Check if current time is over midnight but not over ending time
								elseif ($server_time >= $is_midnight && $server_time <= $end_time ) :
		
									return $contactWidget;
		
								// If above conditions are false that means contact widget needs to be hidden
								else :
		
									return '';
		
								endif; // End of checking if time is over midnight or not 
		
							elseif ($server_time >= $start_time && $server_time <= $end_time ) :
		
								return $contactWidget;
		
							else :
		
								return '';
		
						endif; // end of checking is start time bigger or not than ending time
		
							// User has not select any more custom display options so button will be displayed all the time
							else :
		
								return $contactWidget;
		
						endif; // End of checking when to show button
		
						elseif ($checkWhenToShow == 'showSpecificTimePeriod'):
		
							if($start_date <= $server_date && $end_date >= $server_date) :
		
								return $contactWidget;
		
								else :
		
									return '';
		
								endif; // End of specific time period
		
						endif; // End of checking when to show contact widget (continoisly or specific time period)
						else :
							return '';
					endif; // End of checking where contact widget want to be displayed
				
				else :
		
					return '';
		
				endif; // End of checking if contact widget is set to be on live mode
			}
		}

}