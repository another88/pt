@extends('layouts.backend')
@section('title','Блоги')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Блог посты
        </header>
        <div class="panel-body">
          <a href="{{ route('backend.blog.create') }}" class="btn btn-primary">Создать блог</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>Название</th>
              <th>slug</th>
              <th>Автор</th>
              <th>Дата публикации</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
              <tr class="{{$post->present()->publishedDateHighlight}}">
                <td>
                  <a href="{{ route('backend.blog.edit', $post->id) }}">{{$post->title}}</a>
                </td>
                <td>
                  {{$post->slug}}
                </td>
                <td>
                  {{$post->user->name}}
                </td>
                <td>
                  {{$post->present()->publishedDate}}
                </td>
                <td>
                  <a class="span glyphicon glyphicon-edit" href="{{ route('backend.blog.edit', $post->id) }}"></a>
                </td>
                <td>
                  <a class="span glyphicon glyphicon-remove" href="{{ route('backend.blog.confirm', $post->id) }}"></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {!! $posts->render() !!}
        </div>
      </section>
    </div>
    <div class="col-md-2">
      <section class="panel">
        <header class="panel-heading">
          Earning Graph
        </header>
        <div class="panel-body">
          <canvas id="linechart" width="600" height="330"></canvas>
        </div>
      </section>
    </div>
  </div>
@endsection