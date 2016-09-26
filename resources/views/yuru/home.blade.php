@extends('yuru.app')

@section('content')
<div class="row box-cutout">
	<hr>
	<h2 class="text-center">{{ $page->title }}</h2>
	<hr>	
	<div id="home-gallery" style="display:none;" class="div-center">
	</div>
{{-- </div>

<div class="row box"> --}}
	<div stype="margin:20px;">&nbsp;</div>
	{!! Markdown::convertToHtml($page->description) !!}
</div>

@endsection

