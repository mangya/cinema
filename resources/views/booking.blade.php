@extends('layouts.app')

@section('content')
<div class="bg-light p-5 rounded mt-3">
	<h1>{{$show->name}}</h1>
	<div class="mb-1 text-muted">{{$show->start_date}}</div>
	<p class="lead">{{$show->description}}</p>
	<input type="hidden" name="price" id="price" value="{{$show->price}}">
	<form id="booking-form" action="{{ route('book.show') }}" method="POST">
		<input type="hidden" name="event_code" value="{{$show->code}}">
    	{{ csrf_field() }}
    	<div class="row mb-3">
			<div class="col-sm-2">
				<label for="seats" class="form-label">No of Seats</label>
    			<select class="form-select" id="seats" name="seats">
          		@for($i=1; $i <= 10; $i++)
					<option value="{{$i}}">{{$i}}</option>
				@endfor
				</select>
    		</div>
    	</div>
    </form>
    <p class="lead">Total (USD) <strong><span id="amount"></span></strong></p>
	<a class="btn btn-lg btn-primary" href="#" onclick="event.preventDefault();
                                                     document.getElementById('booking-form').submit();" role="button">Confirm Booking</a>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$( document ).ready(function() {
		calcAmount();
	});

	$('#seats').on('change', function(){
		calcAmount();
	})

	function calcAmount() {
		var seats = $('#seats').val();
		var amount = seats * $('#price').val();
		$('#amount').html('$'+amount);
	}
</script>
@endpush