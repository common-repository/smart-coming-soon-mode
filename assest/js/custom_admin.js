jQuery.noConflict();
jQuery(document).ready(function($) {
	
	/* countdown timer End date calender */
	$('#countdown-date').datepicker({dateFormat: 'dd/mm/yy',minDate: '0'});

	/* Contact tab label icon*/
	$('.address-field-label > th > div').prepend("<i class='el el-home address-field-label-icon'></i>");

	$('.phone-field-label > th > div').prepend("<i class='el el-phone address-field-label-icon'></i>");

	$('.email-field-label > th > div').prepend("<i class='el el-envelope address-field-label-icon'></i>");
});