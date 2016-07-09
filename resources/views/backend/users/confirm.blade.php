@extends('layouts.backend')
@section('title','Delete '.$user->name)

@section('content')
  {!! Form::open(['method'=> 'delete', 'route' => ['backend.users.destroy', $user->id]]) !!}
  <div class="alert alert-danger">
    <strong>Warning!</strong>
    Delete user! Are you sure?
  </div>
  {!! Form::submit('Yes, delete this user!',['class' => 'btn btn-danger']) !!}
  <a href="{{ route('backend.users.index') }}" class="btn btn-success">
    <strong>Go back</strong>
  </a>
  {!! Form::close() !!}
@endsection