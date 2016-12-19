@extends('layouts.app')
@section('title','О проекте')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Секция {{$section->title}}
          <a href="{{ route('courses.show', $section->course->id) }}" class="btn btn-primary">Вернуться в Курс</a>
        </header>
        <div class="panel-body">

          <div class="panel-body" style="float: left;width:100%;">
            <div class="panel panel-default">
              <div class="panel-heading" style="font-size: 16px;">
                <div class="btn-group myBtnMarg" style="float: left;">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span
                      class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Что-то иное</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Удалить</a></li>
                  </ul>
                </div>
                {!! Html::image($section->page_image, 'main' , array('width' => 50 ,'a')) !!}
                {!!$section->title!!}
              </div>
              <div class="panel-body">
                {!!$section->description!!}

                <div id="accordion" class="accordion">
                  @foreach($section->groupLessons() as $level => $lessons)
                    <h3>Уровень - {{ $level }}</h3>
                    <div>
                        @foreach($lessons as $key => $lesson)
                          <div>
                            <a href="{{ route('lesson.show', $lesson->id) }}"
                               title="{!!strip_tags($lesson->description)!!}">Урок {{$key + 1}}
                              - {{ $lesson->title }}</a>
                            {!! $lesson->description !!}
                            <hr>
                          </div>
                        @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="col-md-2">
      @include('admin.rightpanel')
    </div>
  </div>
@endsection


@section('scripts')
  <script>
    $(function () {
      $(".accordion").accordion();
    });
  </script>
@endsection