@extends('layouts.app')

@section('meta')
<meta name="page-name" content="{{ $page->name }}">
@endsection

@section('scripts')
<!-- TripAdvisor Snippet Script-->
<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=636&amp;locationId=7170754&amp;lang=en_IN&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=false&amp;display_version=2"></script>

@yield('yuru-scripts')
@endsection

@section('sidebar')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $page->title }}</h3>
			</div>
			<div class="panel-body description-text">
				@foreach($description as $paragraph)
				<p>{{ $paragraph }}</p>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-md-12">
		{{--  Contact Details --}}
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">Contact</h3>
			</div>
			<div class="panel-body description-text">
				<table class="table table-hover">
					<tr>
						<td> Email: </td>
						<td> <a href="mailto:yurukalimpong@gmail.com?Subject=I%20got%20this%20email%20id%20from%20www.yurukalimpong.com" target="_top">yurukalimpong@gmail.com</a></td>
					</tr>
					<tr>
						<td> Phone Numbers: </td>
						<td> +91-9563773297, +91-8436152083, +91-8159921233 </td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	{{-- Bookings --}}
	<div class="col-md-12">
		<div class="panel panel-info ">
			<div class="panel-heading">
				<h3 class="panel-title">Reserve Rooms</h3>
			</div>
			<div class="panel-body description-text">
				<table class="table">
					<tr>
						<td>
							<p class="col-md-offset-1">To book directly with us kindly get in touch through the contact information provided above.</p>
							<p class="col-md-offset-1">We reply to mails promptly and will call back in case we cannot answer your phone calls for some reason.</p>
						</td>
					</tr>
					<tr>
						<td>
							<!-- Booking.com Snippet -->
							<p class="col-md-offset-1">Reserve rooms at <a href="http://www.booking.com/hotel/in/yuru-retreat.html" target="_blank">Booking.com</a></p>
						</td>
					</tr>
					<tr>
						<td>
							<!-- TripAdvisor Snippet -->
							<div id="TA_selfserveprop636" class="TA_selfserveprop col-md-offset-1">
								<ul id="KegvSEES6Ve" class="TA_links H9d05X">
									<li id="Vcgx9KIWLp" class="ishjbCYoeTFy">
										<a target="_blank" href="https://www.tripadvisor.in/">
											<img src="https://www.tripadvisor.in/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/>
										</a>
									</li>
								</ul>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	
</div>
@endsection