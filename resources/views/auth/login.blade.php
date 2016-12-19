@extends('layouts.app')
@section('title','Регистрация')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          Пройдите быструю регистрацию для просмотра списка курсов и уроков!
          <a class="btn btn-lg btn-primary" href="{{ url('/register') }}" role="button">Регистрация</a>
        </header>
        <div class="margin"></div>
      </section>
      <section class="panel">
        <header class="panel-heading">
          Авторизация
        </header>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' Ошибка' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Пароль</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Запомнить меня
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Login
                </button>

                <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <div class="col-md-2">
      @include('home.rightpanel')
    </div>
  </div>
@endsection