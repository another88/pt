@extends('layouts.backend')
@section('title','Pages')

@section('content')
  <a href="{{ route('backend.pages.create') }}" class="btn btn-primary">Создать страницу</a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>Название</th>
      <th>Категория</th>
      <th>Ссылка</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
      <tr>
        <td>
          <a href="{{ route('backend.pages.edit', $page->id) }}">{{$page->title}}</a>
        </td>
        <td>
          {{$page->category_id}}
        </td>
        <td>
          <a href="{{ url($page->uri) }}">{{$page->present()->prettyUri}}</a>
        </td>
        <td>
          <a class="span glyphicon glyphicon-edit" href="{{ route('backend.pages.edit', $page->id) }}"></a>
        </td>
        <td>
          <a class="span glyphicon glyphicon-remove" href="{{ route('backend.pages.confirm', $page->id) }}"></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection