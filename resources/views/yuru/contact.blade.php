@extends('yuru.app')

@section('scripts')
<!-- TripAdvisor Snippet Script-->
<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=636&amp;locationId=7170754&amp;lang=en_IN&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script>

@endsection

@section('content')
<div class="row box-cutout">
	<hr>
	<h2 class="text-center">{{ $page->title}}</h2>
	<hr>
	<div class="no-justify">	
	{!! Markdown::convertToHtml($page->description) !!}
	</div>
</div>
<div class="row box">
	<hr>
	<h2 class="text-center">Reserve Rooms</h2>
	<hr>	
	<p>To book directly with us kindly get in touch through the contact information provided above.</p>
	<p>We reply to mails promptly and will call back in case we cannot answer your phone calls for some reason.</p>
	<div id="TA_selfserveprop636" class="TA_selfserveprop margin-element col-md-12">
			<ul id="KegvSEES6Ve" class="TA_links H9d05X">
				<li id="Vcgx9KIWLp" class="ishjbCYoeTFy">
					<a target="_blank" href="https://www.tripadvisor.in/">
						<img src="https://www.tripadvisor.in/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/>
					</a>
				</li>
			</ul>
	</div>
</div>

<div class="row box">
	<hr>
	<h2 class="text-center">Map</h2>
	<hr>	
	<div class="col-md-12 embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14208.543795570798!2d88.505998!3d27.089009!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a0f30bdd731d39d!2sYuru+Retreat!5e0!3m2!1sen!2sin!4v1472747066445" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>


</div>

@endsection

