@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<form>
		<div class="row mb-3">
			<div class="col-sm">
				<label for="location" class="form-label">Select Location</label>
				<select class="form-select" id="location">
          		@foreach($locations as $location)
					<option value="{{$location->id}}">{{$location->name}}</option>
				@endforeach
				</select>
			</div>
			<div class="col-sm">
				<label for="venue" class="form-label">Select Venue</label>
				<select class="form-select" id="venue" disabled>
					<option value="">Select venue</option>
				</select>
			</div>
		</div>
	</form>
</div>
<h3 class="pb-4 mb-4 font-italic border-bottom">Now Showing at <span id="venue-name"></span></h3>
<div class="row mb-2" id="show-details"></div>
@endsection

@push('scripts')
<script type="text/javascript">
	var get_venue_url = '{{url("get-venues")}}';
	var get_shows_url = '{{url("get-shows")}}';
	var booking_url = '{{url("booking")}}';
	$( document ).ready(function() {
		getVenues();
	});

	$('#location').on('change', function(){
		getVenues();
	});

	$('#venue').on('change', function(){
		getShows();
	});

	function getVenues() {

		var location_id = $('#location').val();

		$.ajax({
			type: "GET",
			url: get_venue_url+'/'+location_id,
			beforeSend: function(data)
			{
				$('#venue').html('');
				$('#venue').attr('disabled','disabled');
			},
			success: function(data)
			{
				$(data.data).each(function(index, location) {
					$('#venue').append('<option value="'+location.id+'">'+location.name+'</option>');
				});
				$('#venue').prop('disabled',false);
				getShows();
			}
		});
	}

	function getShows() {
		var venue_id = $('#venue').val();

		$.ajax({
			type: "GET",
			url: get_shows_url+'/'+venue_id,
			beforeSend: function(data)
			{
				$('#venue-name').html($('#venue option:selected').text());
				$('#show-details').html('<div class="d-flex align-items-center"><strong>Fetching details...</strong><div class="spinner-border ms-auto" role="status" aria-hidden="true"></div></div>');
			},
			success: function(data)
			{
				$('#show-details').html('');
				if(data.data.length > 0){
					$(data.data).each(function(index, show) {
						var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
						var start_date  = new Date(show.start_date);

						$('#show-details').append('<div class="col-md-6">\
					      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">\
					        <div class="col p-4 d-flex flex-column position-static">\
					          <strong class="d-inline-block mb-2 text-primary">'+show.category+'</strong>\
					          <h5 style="float:right">Seat remaining <span class="badge bg-secondary">'+show.seats_available+'</span></h5>\
					          <h3 class="mb-0">'+show.name+'</h3>\
					          <div class="mb-1 text-muted">'+start_date.toLocaleDateString("en-US", options)+'</div>\
					          <p class="card-text mb-auto">'+show.description+'.</p>\
					          <a href="'+booking_url+'/'+show.code+'" class="stretched-link">Book Now</a>\
					        </div>\
					      </div>\
					    </div>');
					});
				} else {
					$('#show-details').html('<div class="d-flex align-items-center"><strong>No shows at this venue !!</strong>')
				}
				
				$('#venue').prop('disabled',false);
			}
		});
	}
</script>
@endpush