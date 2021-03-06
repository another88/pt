@extends('layouts.admin')
@section('title','Pages')

@section('content')
  <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Создать страницу</a>
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
          <a href="{{ route('admin.pages.edit', $page->id) }}">{{$page->title}}</a>
        </td>
        <td>
          {{$page->category_id}}
        </td>
        <td>
          <a href="{{ url($page->uri) }}">{{$page->prettyUri}}</a>
        </td>
        <td>
          <a class="span glyphicon glyphicon-edit" href="{{ route('admin.pages.edit', $page->id) }}"></a>
        </td>
        <td>
          <a class="span glyphicon glyphicon-remove" href="{{ route('admin.pages.confirm', $page->id) }}"></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection