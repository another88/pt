@extends('layouts.admin')
@section('title','Delete '.$page->title)

@section('content')
  {!! Form::open(['method'=> 'delete', 'route' => ['admin.pages.destroy', $page->id]]) !!}
  <div class="alert alert-danger">
    <strong>Warning!</strong>
    Delete user! Are you sure?
  </div>
  {!! Form::submit('Yes, delete this user!',['class' => 'btn btn-danger']) !!}
  <a href="{{ route('admin.users.index') }}" class="btn btn-success">
    <strong>Go back</strong>
  </a>
  {!! Form::close() !!}
@endsection