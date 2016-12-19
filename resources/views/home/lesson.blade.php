@extends('layouts.app')
@section('title', 'Просмотр '. $lesson->title)
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Урок {{$lesson->title}}
        </header>
        <div class="panel-body">
          <a href="{{ route('courses.show', $lesson->section->course->id) }}" class="btn btn-primary">Вернуться в курс</a>
          <a href="{{ route('section.show', $lesson->section->id) }}" class="btn btn-primary">Вернуться в секцию</a>
          <a href="{{ route('lesson.show', [$lesson->getNextId(), $lesson->id]) }}" class="btn btn-success hasTooltip" title="Данный урок будет отмечен как <b>Пройденный</b>! И будет добавлен в прогресс выполнения курса.">Перейти к следующему уроку</a>
          <div class="pad-10"></div>
          <section class="panel">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Описание</a></li>
              <li><a href="#profile" data-toggle="tab">Содержание</a></li>
              <li><a href="#video" data-toggle="tab">Видео</a></li>
              <li><a href="#settings" data-toggle="tab">Доп</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active panel-body" id="home">
                Описание: {!! $lesson->description !!}
              </div>
              <div class="tab-pane panel-body" id="profile">
                {!! $lesson->body !!}
              </div>
              <div class="tab-pane panel-body" id="video">
                <?php
                $embed = Embed::make('http://youtu.be/uifYHNyH-jA')->parseUrl();
                if ($embed) {
                  $embed->setAttribute(['width' => 600]);
                  echo $embed->getHtml();
                }
                ?>
              </div>
              <div class="tab-pane panel-body" id="settings">...</div>
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

@section('scripts')
  <script>
    $(function () {
      $('.hasTooltip').each(function() {
        $(this).qtip({
          content: {
            text: $(this).title
          },
          hide: false,
          prerender: true,
          show: {
            when: false, // Don't specify a show event
            ready: true // Show the tooltip when ready
          },
          position: {
            my: 'bottom left',  // Position my top left...
            at: 'top center', // at the bottom right of...
          },
          style: {
            classes: 'qtip-light qtip-bootstrap'
          }
        });
      });
    });

  </script>
@endsection