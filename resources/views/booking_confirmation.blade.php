@extends('layouts.app')

@section('content')
<div class="bg-light p-5 rounded mt-3">
	<h1>{{$show->name}}</h1>
	<div class="mb-1 text-muted">{{$show->start_date}}</div>
	<p class="lead">{{$show->description}}</p>
	<p class="lead">Booking code : <strong>{{$booking_code}}</strong></p>
	<a class="btn btn-lg btn-success" href="#" role="button">Confirmed</a>
</div>
@endsection