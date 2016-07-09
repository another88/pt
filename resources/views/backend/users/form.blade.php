@extends('layouts.backend')
@section('title', $user->exists ? 'Editing'. $user->name : 'Create new user')
@section('content')
  {!! Form::model($user, [
    'method' => $user->exists ? 'put' : 'post',
    'route' => $user->exists ? ['backend.users.update', $user->id] : ['backend.users.store']
  ]) !!}
  <div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('is_admin') !!}
    {!! Form::select('is_admin', [1 => 'Admin', 0 => 'User'], null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password_confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
  </div>
  {!! Form::submit($user->exists ? 'Save User' : 'Create User', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
@endsection