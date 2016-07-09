@extends('layouts.backend')
@section('title', $lesson->id ? 'Редактирование'. $lesson->title : 'Создание урока')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <a href="{{ route('backend.courses.show', $cid) }}" class="btn btn-primary">Вернуть в Курс</a>
          @if(isset($lesson->id))
            Редактирование <{{$lesson->title}}>
          @else
            Создание урока
          @endif
        </header>
        <div class="panel-body">
          {!! Form::model($lesson, [
            'method' => $lesson->exists ? 'put' : 'post',
            'files' => true,
            'route' => $lesson->exists ? ['backend.lessons.update', $lesson->id] : ['backend.lessons.store']
          ]) !!}
          {!! Form::submit($lesson->exists ? 'Сохранить пост' : 'Создать пост', ['class' => 'btn btn-primary']) !!}
          <div class="form-group">
            {!! Form::label('Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Описание') !!}
            {!! Form::textarea('description', null,['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Содержание урока') !!}
            {!! Form::textarea('body', null,['class' => 'form-control']) !!}
          </div>
          @if (!empty($lesson->page_image))
            <div class="form-group">
              <label for="page_image" class="col-md-3 control-label">
                Загруженная картинка
              </label>
              <div class="col-md-8">
                {!!  Html::image($lesson->page_image, 'main' , array('width' => 100)) !!}
              </div>
            </div>
          @endif
          <div class="form-group">
            {!! Form::label('Картинка','Картинка') !!}
            {!! Form::file('page_image', array('class'=>'form-control')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Уровень') !!}
            {!! Form::select('level', range(1, $section->levels), $lesson->level, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Ссылка на видео (ютуб)') !!}
            {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Вес') !!}
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Включен') !!}
            {!! Form::checkbox('enabled', 1, ($lesson->enabled) ? true : false, ['class' => 'form-control', 'id' => 'datepicker', 'style' => 'width:250px']) !!}
          </div>
          {!! Form::hidden('sid', $sid) !!}
          {!! Form::hidden('cid', $cid) !!}
          {!! Form::submit($lesson->exists ? 'Сохранить пост' : 'Создать пост', ['class' => 'btn btn-primary']) !!}
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
      CKEDITOR.replace('body');
    });
  </script>
@stop