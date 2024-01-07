(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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
	 */

})( jQuery );

document.addEventListener("DOMContentLoaded", function () {
	// Container ID's

	var everyPage_C = document.getElementById('everyPageContainer');
	var URLContains_C = document.getElementById('URLContainsContainer');
	var specificURL_C = document.getElementById('SpecificURLContainer');
	var specificTimePeriod_C = document.getElementById('specificTimePeriodContainer');
	var continiously_C = document.getElementById('continiouslyContainer');
	var specificWeekday_C = document.getElementById('specificWeekdayContainer');
	var specificTime_C = document.getElementById('specificTimeContainer');
	var setLive_C = document.getElementById('setLiveContainer');

	// Input ID's

	var specificTimePeriod_ID = document.getElementById('specificTimePeriodInputID');
	var specificTime_ID = document.getElementById('specificTimeInputID');
	var specificWeekday_ID = document.getElementById('specificWeekdayInputID');
	var continiously_ID = document.getElementById('continiouslyInputID');
	var everyPage_ID = document.getElementById('everyPageInputID');
	var specificURL_ID = document.getElementById('specificURLInputID');
	var URLContainsThis_ID = document.getElementById('URLContainsThisInputID');
	var setLive_ID = document.getElementById('setLiveInputID');

	// Continiously js-code
	continiously_C.addEventListener('change', function () {
		this.classList.add('active-label');
		specificTimePeriod_C.classList.remove('active-label');
	});

	// When page load, check if Continiously is checked
	if ( continiously_ID.checked == true ) {
		continiously_C.classList.add('active-label');
	} 

	// Continiously (option show on specific time) js-code
	specificTime_C.addEventListener('change', function () {
		this.classList.toggle('not-selected');
		this.nextElementSibling.classList.toggle('hide-element');
	});

	// When page load, check if 
	if ( specificTime_ID.checked == true ) {
		specificTime_C.classList.remove('not-selected');
		specificTime_C.nextElementSibling.classList.toggle('hide-element');
	} 

	// Continiously (option select specific weekdays) js-code
	specificWeekday_C.addEventListener('change', function () {
		this.classList.toggle('not-selected');
		this.nextElementSibling.classList.toggle('hide-element');
	});

	// When page load, check if 
	if ( specificWeekday_ID.checked == true ) {
		specificWeekday_C.classList.remove('not-selected');
		specificWeekday_C.nextElementSibling.classList.toggle('hide-element');
	} 

	// Specific time period js-code
	specificTimePeriod_C.addEventListener('change', function () {
		this.classList.add('active-label');
		continiously_C.classList.remove('active-label');
	});

	// When page load, check if Specific time period is checked
	if ( specificTimePeriod_ID.checked == true ) {
		specificTimePeriod_C.classList.add('active-label');
	} 

	everyPage_C.addEventListener('click', function () {
		specificURL_C.classList.remove('active-label');
		URLContains_C.classList.remove('active-label');
		everyPage_C.classList.add('active-label');
	});

	// When page load, check if 
	if ( everyPage_ID.checked == true ) {
		everyPage_C.classList.add('active-label');
	}

	specificURL_C.addEventListener('click', function () {
		specificURL_C.classList.add('active-label');
		URLContains_C.classList.remove('active-label');
		everyPage_C.classList.remove('active-label');
	});

	// When page load, check if 
	if ( specificURL_ID.checked == true ) {
		specificURL_C.classList.add('active-label');
	}

	URLContains_C.addEventListener('click', function () {
		specificURL_C.classList.remove('active-label');
		URLContains_C.classList.add('active-label');
		everyPage_C.classList.remove('active-label');
	});

	// When page load, check if 
	if ( URLContainsThis_ID.checked == true ) {
		URLContains_C.classList.add('active-label');
	}

	setLive_C.addEventListener('change', function () {
		setLive_C.classList.toggle('active-label');
	});

	// When page load, check if 
	if ( setLive_ID.checked == true ) {
		setLive_C.classList.add('active-label');
	}
});