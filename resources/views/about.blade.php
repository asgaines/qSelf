@extends('app')

@section('extra_css')
  <link href="{{ asset('/css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
  <h1 class="text-center">The quantified Self Revolution</h1>
  <div id="about-body">
    <h3>
      Advances in wearable technology allow us to monitor our bodies in ways previously not possible. Trends formerly below the threshold of our awareness are now capable of being sensed by increasingly sophisticated biosensors and communicated to the cloud and made presentable to us in a digestable manner.
    </h3>
    <h3>
      The problem arising from the myriad products is a lack of centralization and standardization. qSelf aims to be this centralization by combining these data into a central dashboard united by timestamps.
    </h3>
    <ul><h3>Information Combined:</h3>
      <li><h4>Text/Language</h4></li>
      <li><h4>Core Temperature</h4></li>
      <li><h4>Heart-rate Information</h4></li>
      <li><h4>Photographs</h4></li>
      <li><h4>GPS Coordinates</h4></li>
    </ul>
  </div>
@endsection
