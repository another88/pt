@extends('layouts.admin')
@section('title', $section->id ? 'Редактирование'. $section->title : 'Создание секции')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <a href="{{ route('admin.courses.show', $cid) }}" class="btn btn-primary">Вернуть в Курс</a>
          @if(isset($section->id))
            Редактирование <{{$section->title}}>
          @else
            Создание секции
          @endif
        </header>
        <div class="panel-body">
          {!! Form::model($section, [
            'method' => $section->exists ? 'put' : 'post',
            'files' => true,
            'route' => $section->exists ? ['admin.sections.update', $section->id] : ['admin.sections.store']
          ]) !!}
          <div class="form-group">
            {!! Form::label('Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Описание') !!}
            {!! Form::textarea('description', null,['class' => 'form-control']) !!}
          </div>
          @if (!empty($section->page_image))
            <div class="form-group">
              <label for="page_image" class="col-md-3 control-label">
                Загруженная картинка
              </label>
              <div class="col-md-8">
                {!!  Html::image($section->page_image, 'main' , array('width' => 100)) !!}
              </div>
            </div>
          @endif
          <div class="form-group">
            {!! Form::label('Картинка','Картинка') !!}
            {!! Form::file('page_image', array('class'=>'form-control')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Количество уровней') !!}
            {!! Form::text('levels', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Вес') !!}
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Включен') !!}
            {!! Form::checkbox('enabled', 1, ($section->enabled) ? true : false, ['class' => 'form-control', 'id' => 'datepicker', 'style' => 'width:250px']) !!}
          </div>
          {!! Form::hidden('cid', $cid) !!}
          {!! Form::submit($section->exists ? 'Сохранить пост' : 'Создать пост', ['class' => 'btn btn-primary']) !!}
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