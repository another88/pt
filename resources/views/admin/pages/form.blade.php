@extends('layouts.admin')
@section('title', $page->exists ? 'Editing'. $page->title : 'Create new user')
@section('content')
  {!! Form::model($page, [
    'method' => $page->exists ? 'put' : 'post',
    'route' => $page->exists ? ['admin.pages.update', $page->id] : ['admin.pages.store']
  ]) !!}
  <div class="form-group">
    {!! Form::label('Название') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    <p class="help-block">
      Ссылка использует имя
    </p>
  </div>
  <div class="form-group">
    {!! Form::label('Ссылка') !!}
    {!! Form::text('uri', null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Категория') !!}
    {!! Form::select('category_id', [1 => 'Admin', 0 => 'User'], null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('Контент') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
  </div>

  {!! Form::submit($page->exists ? 'Сохранить страницу' : 'Создать', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
@endsection

@section('scripts')
  <script>
    $(function() {
      CKEDITOR.config.extraPlugins = 'spoiler';
      CKEDITOR.replace('content');
    });
  </script>
@stop