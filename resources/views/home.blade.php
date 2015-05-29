@extends('app')

@section('head_insert')
	<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/vis/dist/vis.min.js') }}"></script>
  <link href="{{ asset('/css/vis.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<h3>Your Dashboard</h3>
	<div id="thoughts">
		@foreach ($thoughts as $thought)
			<p>{{ $thought->thought }}</p>
		@endforeach
	</div>

	<div class="graph">
		<div id="visualization"></div>
		<script type="text/javascript">
    	var container = document.getElementById('visualization');
  		var items = [
				@foreach ($temperatures as $temperature)
					{x: '{{ $temperature->created_at }}', y: '{{ $temperature->temperature }}' },
				@endforeach
		  ];

		  var dataset = new vis.DataSet(items);
		  var options = {
		    start: '{{ $temperatures[0]->created_at->subDay(1) }}',
		    end: '{{ $temperatures->last()->created_at->addDay(1) }}'
		  };
		  var graph2d = new vis.Graph2d(container, dataset, options);
		</script>

	<div id="temperatures">
		@foreach ($temperatures as $temperature)
			<p>{{ $temperature->temperature }}<p>
		@endforeach

	</div>
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
