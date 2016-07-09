@extends('layouts.backend')
@section('title', $post->exists ? 'Editing'. $post->name : 'Создание блога')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          Создание блога
        </header>
        <div class="panel-body">
          {!! Form::model($post, [
            'method' => $post->exists ? 'put' : 'post',
            'route' => $post->exists ? ['backend.blog.update', $post->id] : ['backend.blog.store']
          ]) !!}
          <div class="form-group">
            {!! Form::label('Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Дата публикации') !!}
            {!! Form::text('published_at', null, ['class' => 'form-control', 'id' => 'datepicker', 'style' => 'width:250px']) !!}
          </div>
          <div class="form-group excerpt">
            {!! Form::label('excerpt') !!}
            {!! Form::textarea('excerpt', null,['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Содержимое') !!}
            {!! Form::textarea('body', null,['class' => 'form-control']) !!}
          </div>
          {!! Form::submit($post->exists ? 'Сохранить пост' : 'Создать пост', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </section>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
    function translite(str) {
      var arr = {
        'а': 'a',
        'б': 'b',
        'в': 'v',
        'г': 'g',
        'д': 'd',
        'е': 'e',
        'ж': 'g',
        'з': 'z',
        'и': 'i',
        'й': 'y',
        'к': 'k',
        'л': 'l',
        'м': 'm',
        'н': 'n',
        'о': 'o',
        'п': 'p',
        'р': 'r',
        'с': 's',
        'т': 't',
        'у': 'u',
        'ф': 'f',
        'ы': 'i',
        'э': 'e',
        'А': 'A',
        'Б': 'B',
        'В': 'V',
        'Г': 'G',
        'Д': 'D',
        'Е': 'E',
        'Ж': 'G',
        'З': 'Z',
        'И': 'I',
        'Й': 'Y',
        'К': 'K',
        'Л': 'L',
        'М': 'M',
        'Н': 'N',
        'О': 'O',
        'П': 'P',
        'Р': 'R',
        'С': 'S',
        'Т': 'T',
        'У': 'U',
        'Ф': 'F',
        'Ы': 'I',
        'Э': 'E',
        'ё': 'yo',
        'х': 'h',
        'ц': 'ts',
        'ч': 'ch',
        'ш': 'sh',
        'щ': 'shch',
        'ъ': '',
        'ь': '',
        'ю': 'yu',
        'я': 'ya',
        'Ё': 'YO',
        'Х': 'H',
        'Ц': 'TS',
        'Ч': 'CH',
        'Ш': 'SH',
        'Щ': 'SHCH',
        'Ъ': '',
        'Ь': '',
        'Ю': 'YU',
        'Я': 'YA'
      };
      var replacer = function (a) {
        return arr[a] || a
      };
      return str.replace(/[А-яёЁ]/g, replacer)
    }

    $(function () {
      CKEDITOR.config.extraPlugins = 'spoiler';
      CKEDITOR.replace('excerpt');
      CKEDITOR.replace('body');
      var params = {
        format: 'YYYY-MM-DD HH:mm',
        allowInputToggle: true,
        showClear: true
      };
      @if(old('published_at',$post->published_at))
        params.defaultDate = '{{ old('published_at',$post->published_at)}}}'
      @endif
        $("#datepicker").datetimepicker(params);

      $('input[name=title]').on('blur', function () {
        var slugElement = $('input[name=slug]');
        if (slugElement.val()) {
          return;
        }

        slugElement.val(translite(this.value.toLowerCase()).replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
      });
    });
  </script>
@stop