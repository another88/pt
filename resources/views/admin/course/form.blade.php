@extends('layouts.admin')
@section('title', $course->exists ? 'Editing'. $course->name : 'Создание курса')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          Создание курса
        </header>
        <div class="panel-body">
          {!! Form::model($course, [
            'method' => $course->exists ? 'put' : 'post',
            'route' => $course->exists ? ['admin.courses.update', $course->id] : ['admin.courses.store']
          ]) !!}
          <div class="form-group">
            {!! Form::label('Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Содержимое') !!}
            {!! Form::textarea('description', null,['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Вес') !!}
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Включен') !!}
            {!! Form::checkbox('enabled', 1, ($course->enabled) ? true : false, ['class' => 'form-control', 'id' => 'datepicker', 'style' => 'width:250px']) !!}
          </div>
          {!! Form::submit($course->exists ? 'Сохранить пост' : 'Создать пост', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </section>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
    $(function () {
      CKEDITOR.config.extraPlugins = 'spoiler';
      CKEDITOR.replace('description');
    });
  </script>
@stop