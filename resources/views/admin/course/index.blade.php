@extends('layouts.admin')
@section('title','Блоги')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Курсы
        </header>
        <div class="panel-body">
          <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Создать курс</a>
          <table class="table table-hover db">
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
              <tr class="" id="{{$course->id}}">
                <td>
                  <a href="{{ route('admin.courses.show', $course->id) }}">{{$course->title}}</a>
                </td>
                <td>
                  {!!$course->description!!}
                </td>
                <td>
                  <a class="span glyphicon glyphicon-edit" href="{{ route('admin.courses.edit', $course->id) }}"></a>
                </td>
                <td>
                  <a class="span glyphicon glyphicon-remove"
                     href="{{ route('admin.courses.confirm', $course->id) }}"></a>
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

@section('scripts')
  <script type="text/javascript">
    $(function () {
      $('table.db tbody').sortable({
        'containment': 'parent',
        'revert': true,
        update: function (event, ui) {
          $.post("{{route('sort_courses')}}", {
            items: $(this).sortable('toArray', {attribute: 'id'}),
            target: 'course',
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
      $(window).resize(function () {
        $('table.db tr').css('min-width', $('table.db').width());
      });
    });
  </script>
@endsection