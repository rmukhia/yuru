function homeInit() {
	$.getScript('/js/unitegallery/ug-theme-default-1-7-28.js', function() {
		$("#home-gallery").unitegallery({
			theme_hide_panel_under_width: null
		});
	});
}