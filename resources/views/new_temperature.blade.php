@extends('app')

@section('content')
  <h2>Upload new temperature</h2>
  {!! Form::open() !!}
    <textarea type="text" name="temperature" value=""></textarea>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="submit" name="submit" value="Create">
  {!! Form::close() !!}
@endsection
