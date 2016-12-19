@extends('layouts.app')
@section('title','О проекте')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          @if($favorite)
            Мои курсы взятые в обучение (избранные)
            @else
            Курсы
          @endif
        </header>
        <div class="panel-body" id="frontend-courses">
          @foreach($courses as $course)
            <div class="panel-body course-body hasTooltip">
              <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 16px;">
                  <a href="{{ route('courses.show', $course->id) }}">{{$course->title}}</a>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span
                        class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ route('courses.show', $course->id) }}">Начать обучение</a></li>
                      <li class="divider"></li>
                      <li class="click" id="click_{{$course->id}}"><a href="#" cid="{{$course->id}}">Добавить в избранное</a></li>
                    </ul>
                  </div>
                </div>
                <div class="panel-body">
                  {!! $course->description !!}
                </div>
                @if($favorite)
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span> 40%
                    </div>
                  </div>
                  @endif
              </div>
            </div>
            <div class="hidden">
              {!! $course->plan !!}
            </div>
          @endforeach
        </div>
      </section>
    </div>
    <div class="col-md-2">
      @include('home.rightpanel')
    </div>
  </div>
@endsection


@section('scripts')
  <script>
    $(function () {
      $('.hasTooltip').each(function() {
        $(this).qtip({
          content: {
            text: $(this).next('div').html() // Use the "div" element next to this for the content
          },
          position: {
            my: 'left bottom'
          },
          style: {
            classes: 'qtip-light qtip-rounded'
          }
        });
      });
      $( ".click a" ).unbind().click(function(evt) {
        event.preventDefault(evt);
        $.post("{{route('bind_user_courses')}}", {
          course_id: $(this).attr('cid'),
          user_id: "{{Auth::user()->id}}",
          _token: "{{csrf_token()}}"
        }, function (data) {
          var message = $('#alert-info');
          message.show().delay(3000).fadeOut('slow');
          if (!data.success) {
            message.html('Ошибка при добавлении курса');
          } else {
            message.html('Курс добавлен в Обучение (избранное)');
          }
        }, 'json');
      });
    });

  </script>
@endsection