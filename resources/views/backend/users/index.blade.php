@extends('layouts.backend')
@section('title','Users')

@section('content')
  <div class="row">
    <div class="col-md-10">
      <!--earning graph start-->
      <section class="panel">
        <header class="panel-heading">
          Earning Graph
        </header>
        <div class="panel-body">
          <a href="{{ route('backend.users.create') }}" class="btn btn-primary">Create new User</a>
          <table class="table table-hover">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <td>
                  <a href="{{ route('backend.users.edit', $user->id) }}">{{$user->name}}</a>
                </td>
                <td>
                  {{$user->email}}
                </td>
                <td>
                  <a class="span glyphicon glyphicon-edit" href="{{ route('backend.users.edit', $user->id) }}"></a>
                </td>
                <td>
                  <a class="span glyphicon glyphicon-remove" href="{{ route('backend.users.confirm', $user->id) }}"></a>
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
      <!--earning graph start-->
      <section class="panel">
        <header class="panel-heading">
          Earning Graph
        </header>
        <div class="panel-body">
          <canvas id="linechart" width="600" height="330"></canvas>
        </div>
      </section>
      <!--earning graph end-->

    </div>
  </div>

@endsection