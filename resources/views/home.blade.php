@extends('app')

@section('head_insert')
	<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/vis/dist/vis.min.js') }}"></script>
  <link href="{{ asset('/css/vis.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<h1>Your Dashboard</h1>
	@if (!($temperatures->isEmpty()))
		<div class="graph">
			<div id="visualization"></div>
			<script type="text/javascript">
	    	var container = document.getElementById('visualization');
				var groups = new vis.DataSet();
				groups.add({
					id: 1,
					content: "Temperatures",
				});
				groups.add({
					id: 2,
					content: "Thoughts",
				});

	  		var items = [
					// Add each datetime of the temperature recordings as data points
					@foreach ($temperatures as $temperature)
						{x: '{{ $temperature->created_at }}', y: '{{ $temperature->temperature }}', group: 1, label: {content: "{{ $temperature->temperature }}"}},
					@endforeach

					// Add each thought as a separate data point hovering above the interpolated temperature
					@foreach ($thoughts as $thought)
						{x: '{{ $thought->created_at }}', y: 108.5, group: 2, label: {content: "{!! $thought->thought !!}"}},
					@endforeach
			  ];

			  var dataset = new vis.DataSet(items);

			  var options = {
			    start: '{{ $temperatures[0]->created_at->subDay(1) }}',
			    end: '{{ $temperatures->last()->created_at->addDay(1) }}',
					drawPoints: { // Circles look better
	          style: 'circle' // square, circle
	        },
					dataAxis: {
						// Sets the y-axis limits, showing more fluctuation in data
		        left: {
		          range: {min:95, max:109}
		        },
		    	}
			  };
			  var graph2d = new vis.Graph2d(container, dataset, groups, options);
				graph2d.fit(); // Creates a neat effect, growing to a better fit from the day-off initial vals
			</script>
		@endif

		{{-- <div id="visualization"></div>
		<script type="text/javascript">
    	var container = document.getElementById('visualization');
  		var items = [

		  ];

		  var dataset = new vis.DataSet(items);

		  var options = {
		    start: '{{ $temperatures[0]->created_at->subDay(1) }}',
		    end: '{{ $temperatures->last()->created_at->addDay(1) }}',
		  };
		  var graph2d = new vis.Graph2d(container, dataset, options);
		</script> --}}


	<table>
		<tr>
			<td>
				<a href="{{ URL::route('new_thought') }}">
					<div id="new_thought" class="icon_link">
						<img src="{{ URL::asset('thought.png') }}" id="thought-icon" />
						Add a thought
					</div>
				</a>
			</td>
			<td>
				<a href="{{ URL::route('new_temperature') }}">
					<div id="new_temperature" class="icon_link">
						<img src="{{ URL::asset('temperature.png') }}" id="temperature-icon" />
						Add a temperature
					</div>
				</a>
			</td>
		</tr>
	</table>
@endsection
