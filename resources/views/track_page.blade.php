@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<div class="row mb-3">
		<div class="col-sm">
			<label for="booking_code" class="form-label">Enter Booking Code</label>
			<input type="text" name="booking_code" id="booking_code" class="form-control"/>
		</div>
	</div>
	<button id="search" class="btn btn-primary" type="button">Search</button>
</div>
<div class="row mb-2" id="booking-details"></div>
@endsection
@push('scripts')
<script type="text/javascript">
	var get_booking_url = '{{url("get-booking")}}';

	$('#search').on('click', function(){
		var booking_code = $('#booking_code').val();

		$.ajax({
			type: "GET",
			url: get_booking_url+'/'+booking_code,
			beforeSend: function(data) {
				$('#booking-details').html('');
				$('#booking-code').attr('disabled','disabled');
			},
			success: function(data) {
				if(data.data){
					if(data.data.status == 1) {
						$('#booking-details').html('<div class="bg-light p-5 rounded mt-3">\
						<h1>'+data.data.event.name+'</h1>\
						<div class="mb-1 text-muted"></div>\
						<p class="lead">'+data.data.event.description+'</p>\
						<p class="lead">Booking code : <strong>'+data.data.code+'</strong></p>\
						<a class="btn btn-lg btn-success" href="#" role="button">Confirmed</a>\
						</div>');
					} else if(data.data.status == 3) {
						$('#booking-details').html('<div class="bg-light p-5 rounded mt-3">\
						<h1>'+data.data.event.name+'</h1>\
						<div class="mb-1 text-muted"></div>\
						<p class="lead">'+data.data.event.description+'</p>\
						<p class="lead">Booking code : <strong>'+data.data.code+'</strong></p>\
						<a class="btn btn-lg btn-warning" href="#" role="button">Cancelled</a>\
						</div>');
					} else {
						$('#booking-details').html('<div class="bg-light p-5 rounded mt-3">\
						<h1>'+data.data.event.name+'</h1>\
						<div class="mb-1 text-muted"></div>\
						<p class="lead">'+data.data.event.description+'</p>\
						<p class="lead">Booking code : <strong>'+data.data.code+'</strong></p>\
						<a class="btn btn-lg btn-info" href="#" role="button"></a>\
						</div>');
					}
				} else {
					$('#booking-details').html('No data found !');
				}	
			},
			error: function (error) {
			    $('#booking-code').prop('disabled',false);
			}
		});
	});
</script>
@endpush
