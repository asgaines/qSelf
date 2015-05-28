@extends('app')

@section('content')
	<h3>Your Dashboard</h3>
	<div id="thoughts">
		@foreach ($thoughts as $thought)
			<p>{{ $thought->thought }}</p>
		@endforeach
	</div>
	<div id="temperatures">

	</div>
	<div>
		<a href="{{ URL::route('new_thought') }}">Add a thought</a>
	</div>
	<div>
		<a href="{{ URL::route('new_temperature') }}">Add a temperature</a>
	</div>
@endsection
