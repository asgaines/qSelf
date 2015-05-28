@extends('app')

@section('content')
  <p>
    {{ $thought->thought }}
  </p>
  <p>
    {{ $thought->created_at }}
  </p>
@endsection
