<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>phpteach</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ theme('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ theme('css/backend.css') }}">
  <link href="/assets/ckeditor/contents.css" rel="stylesheet">
  <link href="/assets/ckeditor/spoiler.css" rel="stylesheet">
  <link href="{{ theme('css/ionicons.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/iCheck/all.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/style.css') }}" rel="stylesheet" type="text/css"/>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <link href="{{ theme('css/bs-datetimepicker/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ theme('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body id="app-layout" class="skin-black">
<header class="header">
  <a href="/backend" class="logo">
    Admin Panel
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ theme('img/26115.jpg') }}" class="img-circle" alt="User Image"/>
                    </div>
                    <h4>
                      Support Team
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>
                  </a>
                </li><!-- end message -->
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ theme('img/26115.jpg') }}" class="img-circle" alt="user image"/>
                    </div>
                    <h4>
                      Director Design Team

                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    <small class="pull-right"><i class="fa fa-clock-o"></i> 2 hours</small>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ theme('img/avatar.png') }}" class="img-circle" alt="user image"/>
                    </div>
                    <h4>
                      Developers

                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    <small class="pull-right"><i class="fa fa-clock-o"></i> Today</small>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ theme('img/26115.jpg') }}" class="img-circle" alt="user image"/>
                    </div>
                    <h4>
                      Sales Department

                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    <small class="pull-right"><i class="fa fa-clock-o"></i> Yesterday</small>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ theme('img/avatar.png') }}" class="img-circle" alt="user image"/>
                    </div>
                    <h4>
                      Reviewers

                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                    <small class="pull-right"><i class="fa fa-clock-o"></i> 2 days</small>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-tasks"></i>
            <span class="label label-danger">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Design some buttons
                      <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress progress-striped xs">
                      <div class="progress-bar progress-bar-success" style="width: 20%" role="progressbar"
                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Create a nice theme
                      <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress progress-striped xs">
                      <div class="progress-bar progress-bar-danger" style="width: 40%" role="progressbar"
                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Some task I need to do
                      <small class="pull-right">60%</small>
                    </h3>
                    <div class="progress progress-striped xs">
                      <div class="progress-bar progress-bar-info" style="width: 60%" role="progressbar"
                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Make beautiful transitions
                      <small class="pull-right">80%</small>
                    </h3>
                    <div class="progress progress-striped xs">
                      <div class="progress-bar progress-bar-warning" style="width: 80%" role="progressbar"
                           aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>
                  </a>
                </li><!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">View all tasks</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <span>{{auth()->user()->name}} <i class="caret"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
            <li class="dropdown-header text-center">Account</li>

            <li>
              <a href="#">
                <i class="fa fa-clock-o fa-fw pull-right"></i>
                <span class="badge badge-success pull-right">10</span> Updates</a>
              <a href="#">
                <i class="fa fa-envelope-o fa-fw pull-right"></i>
                <span class="badge badge-danger pull-right">5</span> Messages</a>
              <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                <span class="badge badge-info pull-right">3</span> Subscriptions</a>
              <a href="#"><i class="fa fa-question fa-fw pull-right"></i> <span class=
                                                                                "badge pull-right">11</span> FAQ</a>
            </li>

            <li class="divider"></li>

            <li>
              <a href="#">
                <i class="fa fa-user fa-fw pull-right"></i>
                Profile
              </a>
              <a data-toggle="modal" href="#modal-user-settings">
                <i class="fa fa-cog fa-fw pull-right"></i>
                Settings
              </a>
            </li>

            <li class="divider"></li>

            <li>
              <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ theme('img/26115.jpg') }}" class="img-circle" alt="User Image"/>
        </div>
        <div class="pull-left info">
          <p>Admin, {{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                                            class="fa fa-search"></i></button>
                                    </span>
        </div>
      </form>
      <ul class="sidebar-menu">
        <li {{ !Request::segment(2) ? ' class=active' : null }}>
          <a href="{{ route('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Админка</span>
          </a>
        </li>
       <li {{ Request::segment(2) === 'users' ? ' class=active' : null }}>
          <a href="{{route('admin.users.index')}}">
            <i class="fa fa-dashboard"></i> <span>Пользователи</span>
          </a>
        </li>
        <li {{ Request::segment(2) === 'courses' ? ' class=active' : null }}>
          <a href="{{route('admin.courses.index')}}">
            <i class="fa fa-dashboard"></i> <span>Курсы</span>
          </a>
        </li>
        <li  {{ Request::segment(2) === 'pages' ? ' class=active' : null }}>
          <a href="{{route('admin.pages.index')}}">
            <i class="fa fa-gavel"></i> <span>Страницы</span>
          </a>
        </li>
        <li  {{ Request::segment(2) === 'blog' ? ' class=active' : null }}>
          <a href="{{route('admin.blog.index')}}">
            <i class="fa fa-globe"></i> <span>Блог</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <aside class="right-side">
    <!-- Main content -->
    <section class="content">

      <div class="row" style="margin-bottom:5px;">
        <div class="col-md-3">
          <div class="sm-st clearfix">
            <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
            <div class="sm-st-info">
              <span>3200</span>
              Total Tasks
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-st clearfix">
            <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
            <div class="sm-st-info">
              <span>2200</span>
              Total Messages
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-st clearfix">
            <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
            <div class="sm-st-info">
              <span>100,320</span>
              Total Profit
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-st clearfix">
            <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
            <div class="sm-st-info">
              <span>4567</span>
              Total Documents
            </div>
          </div>
        </div>
      </div>
      @if($errors->any())
        <div class="alert alert-danger">
          <strong>Errors: </strong>
          <ul>
            @foreach($errors->all() as $error)
              <li> {{ $error }} </li>
            @endforeach
          </ul>
        </div>
      @endif
      @if($status)
        <div class="alert alert-info">
          {{ $status }}
        </div>
      @endif
      @yield('content')
    </section><!-- /.content -->
    <div class="footer-main">
      Copyright &copy phpTeach, 2016
    </div>
  </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{theme('ckeditor/ckeditor.js')}}"></script>
<script src="{{theme('ckeditor/spoiler.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ theme('js/moment.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/chart.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/bs-datetimepicker/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/chart.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/plugins/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/Director/app.js') }}" type="text/javascript"></script>
<script src="{{ theme('js/Director/dashboard.js') }}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>
