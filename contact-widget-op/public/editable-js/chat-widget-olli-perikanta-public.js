(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 * whatsApp.classList.toggle('nayta-painike');
	 */

})( jQuery );

document.addEventListener("DOMContentLoaded", function () {

const contactItems = document.querySelectorAll('.contact-widget-item');

const contactButton = document.getElementById('contactButton_2356213');

const contactWidgetContainer = document.getElementById('contactWidgetContainer_2356213');

const contactIcon = document.getElementById('contactWidgetcontactIcon_2356213');

const xIcon = document.getElementById('contactWidgetXIcon_2356213');

const ctaContainer = document.getElementById('contactWidgetCtaContainer_2356213');

const contactCTA = document.getElementById('contactWidgetCTA_2356213'); 

const closeCTAText = document.getElementById('contactWidgetCtaClosing_2356213');

const checkStorage = sessionStorage.getItem('clicked');


// Check if contact widget is in use
if(contactButton) {

	

	// Get saved data from sessionStorage and compare it
	// Data has been set and it is ok
	if ( checkStorage == 'contactCta') {
		// Do nothing, every thing works fine now :)
	} 
	// Data has not been set
	else {
		ctaContainer.classList.add('CTA_show');
	}

	// CTA text closing button is clicked
	closeCTAText.addEventListener('click', function() {

		// Remove cta text
		ctaContainer.classList.remove('CTA_show');
		
		// Add sessionStorage for not to show CTA text anymore on this session
		sessionStorage.setItem('clicked', 'contactCta');
	});

	// CTA is clicked
	contactCTA.addEventListener('click', function() {
	
	// Remove CTA text
	ctaContainer.classList.remove('CTA_show');

	// Add sessionStorage for not to show CTA text anymore on this session
	sessionStorage.setItem('clicked', 'contactCta');
		
	contactButton.classList.toggle('add_dark_contactbutton_color');

	contactWidgetContainer.classList.toggle('topPadding_added');

	if (contactIcon.classList.contains('hide_contactIcon')) {
		setTimeout(function() {
			contactIcon.classList.remove('hide_contactIcon');
			  }, 150);
			  xIcon.classList.remove('show_xIcon');
  } else {
	setTimeout(function() {
		xIcon.classList.add('show_xIcon');
		  }, 150);
		  contactIcon.classList.add('hide_contactIcon');
  }
	

	for (const contactItem of contactItems) { 
		contactItem.classList.toggle('show_contactItems');
	}
	});

	// contact button is clicked
	contactButton.addEventListener('click', function() {
	
	// Remove CTA text
	ctaContainer.classList.remove('CTA_show');

	// Add sessionStorage for not to show CTA text anymore on this session
	sessionStorage.setItem('clicked', 'contactCta');
		
	contactButton.classList.toggle('add_dark_contactbutton_color');

	contactWidgetContainer.classList.toggle('topPadding_added');

	if (contactIcon.classList.contains('hide_contactIcon')) {
		setTimeout(function() {
			contactIcon.classList.remove('hide_contactIcon');
			  }, 150);
			  xIcon.classList.remove('show_xIcon');
  } else {
	setTimeout(function() {
		xIcon.classList.add('show_xIcon');
		  }, 150);
		  contactIcon.classList.add('hide_contactIcon');
  }
	

	for (const contactItem of contactItems) { 
		contactItem.classList.toggle('show_contactItems');
	}
});

}

});