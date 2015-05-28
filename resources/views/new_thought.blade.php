@extends('app')

@section('content')
  <h2>Upload new thought</h2>
  @foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
  @endforeach

  {!! Form::open() !!}
    <p>
      Thought
    </p>
    <textarea type="text" name="thought" value=""></textarea>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="submit" name="submit" value="Create">
  {!! Form::close() !!}
@endsection
