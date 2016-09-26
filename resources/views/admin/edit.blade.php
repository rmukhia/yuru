@extends('layouts.app')

@section('meta')
<meta name="page-name" content="admin-edit">
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ url('css/simplemde/simplemde-1-11-2.min.css') }}">
@endsection

@section('content')

<div class="row box-cutout">
	<hr>
	<h2 class="text-center">Edit Description</h2>
	<hr>		
	<form action="{{ route('yuru.admin.savePage', ['page' => $page->id]) }}" method="POST" class="form-horizontal" role="form">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label class="col-md-2">Title</label>
			<div class="col-md-10">
				<input type="text" name="title"  class="form-control" value="{{ $page->title }}" required="required">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<textarea id="markdown-editor" name="description" class="form-control" rows="25">{{ $page->description }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-2 col-md-offset-7">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
	</form>
</div>

<div class="row box">
	<hr>
	<h2 class="text-center">Upload Media</h2>
	<hr>		
	<form action="{{ route('yuru.admin.uploadMedia', ['page' => $page->id]) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group" id="div-media-type">
			<label class="col-md-2">Media Type</label>
			<div class="col-md-10">
				<select name="media-type" class="form-control" required="required" onchange="mediaTypeChange();">
					<option value="" disabled selected>Select your option</option>
					<option value="image">Image</option>
					<option value="video">Video</option>
				</select>
			</div>
		</div>
		<div class="form-group" id="div-upload-method">
			<label class="col-md-2">Upload Method</label>
			<div class="col-md-10">
				<select name="upload-method" class="form-control" required="required" onchange="uploadMethodChange();">
					<option value="" disabled selected>Select your option</option>
					<option value="simple">Simple</option>
					<option value="large">Large File</option>
				</select>
			</div>
		</div>

		<div class="form-group" id="div-video-thumbnail">
			<label class="col-md-2">Video Thumbnail</label>
			<div class="col-md-10">
				<input type="file" name="video-thumbnail" class="form-control" id="video-thumbnail">
			</div>
		</div>

		<div class="form-group" id="div-description">
			<label class="col-md-2">Description</label>
			<div class="col-md-10">
				<textarea name="description" class="form-control" rows="5"></textarea>
			</div>
		</div>

		<div class="form-group" id="div-file">
			<label class="col-md-2">File</label>
			<div class="col-md-10">
				<input type="file" id="file" name="file" class="form-control">
			</div>
		</div>

		<div class="form-group" id="div-uploaded-file">
			<label class="col-md-2">Select Uploaded File</label>
			<div class="col-md-10">
				<select name="uploaded-file" class="form-control">
					<option value="" disabled selected>Select your option</option>
					@foreach($uploadedMedias as $uploadedMedia)
					<option value="{{ $uploadedMedia }}">{{ $uploadedMedia}}</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="form-group" id="div-submit-btn">
			<div class="col-md-2 col-md-offset-9">
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</div>
	</form>
</div>


<div class="row">
	@foreach($medias as $media)
	<div class="col-sm-12 col-md-6">
		<div class="panel panel-warning admin-thumbnail">
			<div class="panel-heading">
				{{$media->filename}} 
				<span class="pull-right"> <a href="{{ route('yuru.admin.deleteMedia' ,['media' => $media->id])}}"><span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span></a></span>
			</div>
			<div class="panel-body">
				<img src="{{$page->getThumbnailURL($media)}}" class="img-responsive" alt="Image">
				<p><b>Description:</b>
					{{$media->description}}</p>
					<p><b>Type:</b>
						{{$media->type}}</p>
						@if ($media->type == 'video')
						<p><b>Video Screenshot:</b>
							{{$media->videopic_filename}}</p>
							@endif
							<p><b>Created At:</b>
								{{$media->created_at}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>

				{{$medias->links()}}


				@endsection

