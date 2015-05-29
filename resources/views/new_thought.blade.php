@extends('app')

@section('content')
  <h1>What are you thinking or feeling at the moment?</h1>

  @foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
  @endforeach

  {!! Form::open() !!}
    <textarea type="text" name="thought" value=""></textarea>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="submit" name="submit" value="Upload">
  {!! Form::close() !!}
@endsection
