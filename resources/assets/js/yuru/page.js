$(function(){
	$.material.init(); 
	$("#home-gallery").unitegallery({
		tile_enable_textpanel:true,
		tiles_type:"nested",
		tiles_nested_optimal_tile_width: 500,
		tile_textpanel_title_text_align: "center",
	});

});