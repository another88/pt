@extends('layouts.backend')
@section('title','Блоги')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Курсы
        </header>
        <div class="panel-body">
          <a href="{{ route('backend.courses.create') }}" class="btn btn-primary">Создать курс</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>Название</th>
              <th>Описание</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
              <tr class="">
                <td>
                  <a href="{{ route('backend.courses.show', $course->id) }}">{{$course->title}}</a>
                </td>
                <td>
                  {!!$course->description!!}
                </td>
                <td>
                  <a class="span glyphicon glyphicon-edit" href="{{ route('backend.courses.edit', $course->id) }}"></a>
                </td>
                <td>
                  <a class="span glyphicon glyphicon-remove" href="{{ route('backend.courses.confirm', $course->id) }}"></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {!! $courses->render() !!}
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