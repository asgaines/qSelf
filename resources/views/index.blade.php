@extends('app')

@section('head_insert')
  <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div id="title" class="text-center">
    <h1>The Quantified Self</h1>
  </div>
  <h2 id="about" class="text-center">
    Homebase for the information collected from the data radiating from our bodies
  </h2>
  <div id="more-link" class="text-center">
    <a href="{{ url('/about') }}">More >></a>
  </div>
@endsection
