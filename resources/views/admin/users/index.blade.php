@extends('layouts.admin')
@section('title','Пользователи')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Earning Graph
        </header>
        <div class="panel-body">
          <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Создать пользователя</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>Имя</th>
              <th>Email</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <td>
                  <a href="{{ route('admin.users.edit', $user->id) }}">{{$user->name}}</a>
                </td>
                <td>
                  {{$user->email}}
                </td>
                <td>
                  <a class="span glyphicon glyphicon-edit" href="{{ route('admin.users.edit', $user->id) }}"></a>
                </td>
                <td>
                  <a class="span glyphicon glyphicon-remove" href="{{ route('admin.users.confirm', $user->id) }}"></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {!! $users->render() !!}
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