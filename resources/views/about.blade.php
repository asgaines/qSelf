@extends('app')

@section('head_insert')
  <link href="{{ asset('/css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
  <h1>The Quantified Self</h1>
  <div id="quantified_self">
    <img src="{{ URL::asset('quantified_self.jpg') }}" />
  </div>
  <div id="about-body">
    <p>
      Advances in wearable technology allow us to monitor our bodies in ways previously not possible. Trends formerly below the threshold of our awareness are now capable of being sensed by increasingly sophisticated biosensors and communicated to the cloud and made presentable to us in a digestable manner.
    </p>
    <p>
      Lack of centralization and standardization currently presents a problem for the digestion of all these data. qSelf aims to be this centralization by combining these data into a central dashboard united by the common thread of time.
    </p>
    <table style="width: 100%">
      <tr>
        <td><h3>Information currently integrated</h3></td>
        <td><h3>Potential additional data</h3></td>
      </tr>
      <tr>
        <td>
          <p>Written Thoughts</p>
          <p>Core Temperature</p>
        </td>
        <td>
          <p>Electroencephalography</p>
          <p>Heart-rate Information</p>
          <p>Photographs</p>
          <p>GPS Coordinates</p>
        </td>
      </tr>
    </table>
    <p>
      Core temperature tracking could potentially be used for tracking ovulation for fertility purposes. Integration with a wearable device (such as the <a href="http://www.bloomring.com" target="blank">OvuRing</a>) API allows for sourcing of a continuous stream of data. Alongside thoughts or feelings recorded from a smartphone update (or via text message), trends are easily viewed from the dashboard on each user's page.
    </p>
    <p>
      <a href="{{ url('/auth/register') }}">Sign up</a> and start recording today.
    </p>
  </div>
@endsection
