@extends('layouts.admin')
@section('title', $user->exists ? 'Редактирование'. $user->name : 'Создание нового пользователя')
@section('content')
  {!! Form::model($user, [
    'method' => $user->exists ? 'put' : 'post',
    'route' => $user->exists ? ['admin.users.update', $user->id] : ['admin.users.store']
  ]) !!}
  <div class="form-group">
    {!! Form::label('Имя') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Является Админом') !!}
    {!! Form::select('is_admin', [1 => 'Admin', 0 => 'User'], null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Пароль') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Подтверждение') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
  </div>
  {!! Form::submit($user->exists ? 'Сохранить' : 'Создать пользователя', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
@endsection