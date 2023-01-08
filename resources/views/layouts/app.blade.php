<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>App - @yield('title')</title>


  <!-- Scripts -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('plugins/DataTables/datatables.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('plugins/jquery-confirm/jquery-confirm.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('plugins/fontawesome/js/all.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('plugins/select2/select2.min.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/DataTables/datatables.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-confirm/jquery-confirm.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome/css/all.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}"/>
    <!-- datatable no jquery -->

  <style type="text/css">
    .select2-selection__rendered {
      line-height: 25px !important;
    }

    .select2-selection {
      height: 37px !important;
    }

    .select2-selection__arrow {
      margin: 5px;
    }

    .btn-group-xs > .btn, .btn-xs {
      padding: .25rem .4rem;
      font-size: .875rem;
      line-height: .5;
      border-radius: .2rem;
    }
  </style>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  @section('styles')
  @show
</head>
<body class="hold-transition sidebar-mini sidebar-collapse" lang="es-sv">
  <div id="app">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link sidebar-toggle" data-widget="pushmenu" href="#" role="button" id="toggle"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <h2>App Películas</h2>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header text-center">
                <strong>
                 {{ Auth::user()->name }}
               </strong>
             </div>
             <div class="dropdown-divider">
             </div>
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
      <a href="" class="brand-link bg-gray-light">
        <span class="brand-text font-weight-light">App películas</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{!!URL::to('/')!!}" class="nav-link">
                <i class="fa fa-home" aria-hidden="true"></i>

                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{!!URL::to('/peliculas')!!}" class="nav-link">
                  <i class="fa fa-film" aria-hidden="true"></i>
                  <p>
                    Películas
                  </p>
                </a>
              </li>

                @if ($model??false)

                    <li class="nav-item">
                    <a href="{!!URL::to('/roles')!!}" class="nav-link">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        <p>
                        Roles
                        </p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{!!URL::to('/categorias')!!}" class="nav-link">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <p>
                        Categorias
                        </p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{!!URL::to('/peliculasAdmin')!!}" class="nav-link">
                          <i class="fa fa-film" aria-hidden="true"></i>
                          <p>
                            Películas Admin
                          </p>
                        </a>
                      </li>


                @endif


          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div id="app">
        @yield('content')
      </div>
    </div>
    <footer class="main-footer bg-dark">
      <div class="float-right d-none d-sm-inline">
      </div>
      <strong>Copyright &copy; 2020 <a href="#">App Películas</a>.</strong> Ronald Abarca All rights reserved.
    </footer>
  </div>
</div>

</body>

@section('scripts')
@show
</html>


