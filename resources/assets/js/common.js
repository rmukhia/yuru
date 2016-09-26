$(function(){
	var $page = $("meta[name='page-name']").attr('content');
	beautifyBoxTable();
	switch ($page) {
		/* Homepage */
		case 'home':
			loadImages($page, $('#home-gallery'), homeInit);
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
			loadImages($page, $('#page-gallery'), pageInit);
	}
	
});

function beautifyBoxTable() {
	var $boxes = $('.box, .box-cutout');
	$boxes.each(function (id, element) {
		var $box = $(element);
		$box.find('table').each(function (id, table) {
			$(table).addClass('table table-bordered table-striped').wrap('<div class="table-responsive"></div>');
		});
	});
}

function loadImages(page, $division, callback) {
	$.getJSON('/images/' + page, function (data) {
		$.each(data, function(key, image) {
			
			var $img = $('<img/>');
			$.each(image, function(attr, value) {
				$img.attr(attr, value);
			});

			$division.append($img);
		});
		callback();
	});
}