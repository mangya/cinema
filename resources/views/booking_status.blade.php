@extends('layouts.app')

@section('content')
<div class="bg-light p-5 rounded mt-3">
	<h1>{{$booking->event->name}}</h1>
	<div class="mb-1 text-muted">{{$booking->event->start_date}}</div>
	<p class="lead">{{$booking->event->description}}</p>
	<p class="lead">Booking code : <strong>{{$booking->code}}</strong></p>
	@if($booking->status == 3)
	<a class="btn btn-lg btn-warning" href="#" role="button">Cancelled</a>
	<a class="btn btn-lg btn-info" href="{{route('my.bookings')}}">Go to my bookings</a>
	@endif
</div>
@endsection