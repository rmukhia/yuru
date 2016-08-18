@extends('layouts.app')

@section('content')
<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Delete {{$media->filename}}</h3>
	</div>
	<div class="panel-body">
		<p> Are you sure you want to delete {{$media->type}} {{$media->filename}}?</p>
		<p> If not, navigate back using your browser's back button. </p>
		 <form action="{{ route('yuru.admin.deleteMedia.delete' ,['media' => $media->id])}}" method="POST"  role="form">
		 	{{ csrf_field() }}
		 	{{ method_field('DELETE')}}
		 	<input type="hidden" name="previousURL" value="{{$previousURL}}">
		 	<button type="submit" class="btn btn-danger">Yes</button>
		 </form>
	</div>
</div>
@endsection