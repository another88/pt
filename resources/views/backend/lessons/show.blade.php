@extends('layouts.backend')
@section('title', 'Просмотр '. $lesson->title)
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Урок {{$lesson->title}}
        </header>
        <div class="panel-body">
          <a href="{{ route('backend.lessons.edit', $lesson->id) }}" class="btn btn-primary">Редактировать урок</a>
          <a href="{{ route('backend.courses.show', $lesson->section->course->id) }}" class="btn btn-primary">Вернуться в курс</a>
          <section class="panel">
            <header class="panel-heading">
              Описание: {!! $lesson->description !!}
            </header>
            <div class="panel-body">
              {!! $lesson->body !!}
            </div>
          </section>
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
