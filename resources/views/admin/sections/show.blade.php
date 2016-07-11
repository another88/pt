@extends('layouts.admin')
@section('title', 'Просмотр '. $course->title)
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Курс {{$course->title}}
        </header>
        <div class="panel-body">
          <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary">Редактировать курс</a>
          <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary">Добавить секцию</a>

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
