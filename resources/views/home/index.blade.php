@extends('layouts.app')
@section('title','О проекте')
@section('content')
  <div class="row">
    <div class="col-md-10">
      <section class="panel">
        <header class="panel-heading">
          {{$page->title}}
        </header>
        <div class="panel-body">
          {!! $page->content !!}
        </div>
      </section>
    </div>
    <div class="col-md-2">
      @include('home.rightpanel')
    </div>
  </div>
@endsection