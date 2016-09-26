function enableVideoPic() {
	$type = $('#upload-type');
	$videoPic = $('#upload-videopic');

	if ($type.val() == 'video') {
		$videoPic.prop('disabled', false);
		$videoPic.prop('required', true);
	}
	else {
		$videoPic.prop('disabled', true);
		$videoPic.prop('required', false);
	}

	return true;
}

/**
 * Global jquery elements
 */

$divMediaType = $('#div-media-type');
$selectMediaType = $('#div-media-type select');

$divUploadMethod = $('#div-upload-method');
$selectUploadMethod = $("#div-upload-method select");


$divDescription = $('#div-description');

$divVideoThumbnail = $('#div-video-thumbnail');

$inputVideoThumbnail = $('#video-thumbnail');


$divFile = $('#div-file');

$inputFile = $('#file');

$divUploadedFile = $('#div-uploaded-file');

$selectUploadedFile = $('#div-uploaded-file select');

$divSubmitBtn = $('#div-submit-btn');


/**
 *	State Functions
 */

// Initial State
function state1()
{
	//console.log('state1');
	$divUploadMethod.hide();
	$divDescription.hide();
	$divVideoThumbnail.hide();
	$divFile.hide();
	$divUploadedFile.hide();
	$divSubmitBtn.hide();
}

// If media-type is image
function state2()
{
	//console.log('state2');
	$divUploadMethod.show();
	$selectUploadMethod.val("");
	$selectUploadMethod.prop('disabled', false);

	$divVideoThumbnail.hide();
	$inputVideoThumbnail.prop('disabled', true);
	$inputVideoThumbnail.prop('required', false);
	
	$divDescription.show();

	$divFile.hide();
	$divUploadedFile.hide();
	$divSubmitBtn.hide();

}

// If media-type is video
function state3()
{
	//console.log('state3');
	$divUploadMethod.show();
	$selectUploadMethod.val("large");
	$selectUploadMethod.prop('disabled', true);

	$divVideoThumbnail.show();
	$inputVideoThumbnail.prop('disabled', false);
	$inputVideoThumbnail.prop('required', true);

	$divDescription.show();

	$divFile.hide();
	$divUploadedFile.hide();
	$divSubmitBtn.hide();
}

// If upload-type is simple
function state4()
{
	//console.log('state4');
	$divFile.show();
	$inputFile.prop('disabled', false);
	$inputFile.prop('required', true);

	$divUploadedFile.hide();
	$selectUploadedFile.prop('disabled', true);
	$selectUploadedFile.prop('required', false);

	$divSubmitBtn.show();
}

// If upload-type is large
function state5()
{
	//console.log('state5');
	$divFile.hide();
	$inputFile.prop('disabled', true);
	$inputFile.prop('required', false);

	$divUploadedFile.show();
	$selectUploadedFile.prop('disabled', false);
	$selectUploadedFile.prop('required', true);


	$divSubmitBtn.show();
}


/**
 * On Click Functions
 */
function mediaTypeChange()
{
	if ($selectMediaType.val() == 'image') {
		state2();
	}
	else {
		state3();
		state5();
	}
}

function uploadMethodChange()
{
	if ($selectUploadMethod.val() == 'simple') {
		state4();
	}
	else {
		state5();
	}
}

/** 
 * Init function
 */
function adminInit() {
	state1();
	$.getScript('/js/simplemde/simplemde-1-11-2.min.js', function () {
		new SimpleMDE({
		element: document.getElementById("markdown-editor"),
		spellChecker: false,
		hideIcons: ["bold", "side-by-side", "fullscreen"]
		});
	});
}

