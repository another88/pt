@extends('layouts.backend')
@section('title','Delete '.$post->title)

@section('content')
  {!! Form::open(['method'=> 'delete', 'route' => ['backend.blog.destroy', $post->id]]) !!}
  <div class="alert alert-danger">
    <strong>Warning!</strong>
    Удалить блог? Вы уверены?!
  </div>
  {!! Form::submit('Да, удалить этот блог!',['class' => 'btn btn-danger']) !!}
  <a href="{{ route('backend.blog.index') }}" class="btn btn-success">
    <strong>Назад</strong>
  </a>
  {!! Form::close() !!}
@endsection