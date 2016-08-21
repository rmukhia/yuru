@extends('yuru.app')

@section('content')
<div id="page-gallery" style="display:none;">
	@foreach($page->media as $media)
	@if ($media->type == 'video')
		<img alt="{{ $media->description }}"
		src="{{ $page->getThumbnailURL($media) }}"
		data-type="html5video"
		data-image="{{ $page->getThumbnailURL($media) }}"
		data-videomp4="{{ $page->getFilenameURL($media) }}"
		data-description="{{ $media->description }}">
	@else
		<img alt="{{ $media->description }}"
		src="{{ $page->getThumbnailURL($media) }}"
		data-image="{{ $page->getFilenameURL($media) }}"
		data-description="{{ $media->description }}">
	@endif
	@endforeach
</div>
@endsection