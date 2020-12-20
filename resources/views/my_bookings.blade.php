@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Show</th>
			<th scope="col">Booking Code</th>
			<th scope="col">Seats</th>
			<th scope="col">Show Date</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($bookings as $key => $booking)
		<tr>
			<td scope="row">{{($key+1)}}</td>
			<td>{{$booking->event->name}}</td>
			<td>{{$booking->code}}</td>
			<td>{{$booking->seats}}</td>
			<td>{{date("F j, Y, g:i a", strtotime($booking->event->start_date))}}</td>
			@if($booking->status == 1)
			<td><form id="cancel-form-{{$booking->code}}" action="{{ route('cancel.booking') }}" method="POST">
				{{ csrf_field() }}
		<input type="hidden" name="booking_code" value="{{$booking->code}}"></form><button  class="btn btn-sm btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('cancel-form-{{$booking->code}}').submit();">Cancel</button></td>
            @else
            <td><span class="badge bg-danger">Cancelled</span></td>
            @endif
		</tr>
		@endforeach
	</tbody>
</table>
@endsection