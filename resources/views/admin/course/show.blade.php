@extends('layouts.admin')
@section('title', 'Просмотр '. $course->title)
@section('content')
  <style>

  </style>
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Курс {{$course->title}}
          <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary">Редактировать курс</a>
          <a href="{{ url('/admin/sections/create', ['cid' , $course->id]) }}" class="btn btn-primary">Добавить
            секцию</a>

        </header>
        <div class="panel-body">
          <ul id="sortable">
            @foreach ($course->sections as $section)
              <li class="ui-state-default sort" id="{{$section->id}}">
                <div class="panel-body" style="float: left;width:400px;">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 16px;">
                      <div class="btn-group myBtnMarg" style="float: left;">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span
                            class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('admin.sections.edit', $section->id) }}">Редактировать</a></li>
                          <li><a href="{{ url('/admin/lessons/create/sid/' . $section->id ) }}">Добавить урок</a></li>
                          <li><a href="#">Что-то иное</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Удалить</a></li>
                        </ul>
                      </div>
                      {!!  Html::image($section->page_image, 'main' , array('width' => 50 ,'a')) !!}
                      <a href="{{ route('admin.sections.show', $section->id) }}">>>> {!!$section->title!!} <<<</a>
                    </div>
                    <div class="panel-body">
                      {!!$section->description!!}

                      <div id="accordion" class="accordion">
                        @foreach($section->groupLessons() as $level => $lessons)
                          <h3>Уровень - {{ $level }}</h3>
                          <div>
                            @foreach($lessons as $key => $lesson)
                              <a href="{{ route('admin.lessons.show', $lesson->id) }}"
                                 title="{!!strip_tags($lesson->description)!!}">Урок {{$key + 1}}
                                - {{ $lesson->title }}</a>
                              <a class="span glyphicon glyphicon-edit"
                                 href="{{ route('admin.lessons.edit', $lesson->id) }}"></a>
                              <a class="span glyphicon glyphicon-remove"
                                 href="{{ route('admin.lessons.confirm', $lesson->id) }}"></a>
                              <br>
                            @endforeach
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
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
      $("#sortable").sortable({
        update: function (event, ui) {
          $.post("{{route('sort_courses')}}", {
            items: $(this).sortable('toArray', {attribute: 'id'}),
            target: 'section',
            _token: "{{csrf_token()}}"
          }, function (data) {
            var message = $('#alert-info');
            message.show();
            if (!data.success) {
              message.html('Ошибка при сохранении сортировки');
            } else {
              message.html('Порядок обновлен в БД');
            }
          }, 'json');
        }
      });
      $("#sortable").disableSelection();
      $(".accordion").accordion();
      $(document).tooltip();
    });
  </script>
@endsection
