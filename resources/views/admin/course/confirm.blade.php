@extends('layouts.admin')
@section('title','Удалить '.$course->title)

@section('content')
  {!! Form::open(['method'=> 'delete', 'route' => ['admin.course.destroy', $course->id]]) !!}
  <div class="alert alert-danger">
    <strong>Warning!</strong>
    Удалить блог? Вы уверены?!
  </div>
  {!! Form::submit('Да, удалить этот курс!',['class' => 'btn btn-danger']) !!}
  <a href="{{ route('admin.course.index') }}" class="btn btn-success">
    <strong>Назад</strong>
  </a>
  {!! Form::close() !!}
@endsection