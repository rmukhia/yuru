$(function(){
	var $page = $("meta[name='page-name']").attr('content');
	switch ($page) {
		/* Homepage */
		case 'home':
			homeInit();
			break;
		/* Admin Page */
		case 'admin-edit':
			adminInit();
			break;
		/* Undefined default pages */
		case undefined:
			break;
		/* Contact Page */
		case 'contact':
			break;
		/* All other pages */
		default:
			pageInit();
	}
});

// $(window).load(function() {
//     $("#loader-wrapper").hide();
//     $('html').css('opacity','1');
// });