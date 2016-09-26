@extends('yuru.app')

@section('content')

<div class="row box-cutout">
	<hr>
	<h2 class="text-center">{{ $page->title }}</h2>
	<hr>
	{!! Markdown::convertToHtml($page->description) !!}
</div>

@if ($page->media->count() > 0)
<div class="row box">
<div id="page-gallery" style="display:none;" class="div-center">
</div>
</div>
@endif
@endsection