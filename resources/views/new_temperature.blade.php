@extends('app')

<script>
  // Functions for calculating Celsius from Fahrenheit and vice versa
  function calculateF() {
    var tempC = document.getElementById("temperatureC").value;
    document.getElementById("temperatureF").value = (tempC * 1.8) + 32;
  }
  function calculateC() {
    var tempF = document.getElementById("temperatureF").value;
    document.getElementById("temperatureC").value = (tempF - 32) / 1.8;
  }
</script>

@section('content')
  <h1>What's your body temperature at the moment?</h1>

  @foreach ($errors->all() as $error)
    <p class="error">{{ $error }}<p>
  @endforeach

  {!! Form::open() !!}
    <input type="text" name="temperature" id="temperatureF" onkeyup="calculateC()" value="">&deg; Fahrenheit
    <br />
    <input type="text" id="temperatureC" onkeyup="calculateF()" value="">&deg; Celcius
    <br />
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="submit" name="submit" value="Upload">
  {!! Form::close() !!}
@endsection
