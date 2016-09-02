@extends('yuru.app')

@section('content')

<div class="row box">
	<hr>
	<h2 class="text-center">{{ $page->title }}</h2>
	<hr>
	@foreach($description as $paragraph)
	<p>{{ $paragraph }}</p>
	@endforeach
</div>


<div class="row box">
<div id="page-gallery" style="display:none;" class="div-center">
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
</div>
@endsection