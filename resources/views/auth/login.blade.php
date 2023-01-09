<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Samuel Palma">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>App - Acceso</title>
  <!-- Styles-->
  <style>
    .vertical-center {
      min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 100vh; /* These two lines are counted as one :-)       */

      display: flex;
      align-items: center;
    }
  </style>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/fontawesome/css/all.min.css') }}" rel="stylesheet" />
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
      // Shared ID
    gtag('config', 'UA-118965717-3');
      // Bootstrap ID
    gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center" lang="es-sv">
    <div class="jumbotron vertical-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-group">
              <div class="card p-4">
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Login</h1>
                    <p class="text-muted">
                      {{ __('Login') }}
                    </p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </span>
                      </div>
                      <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="row">
                      <div class="col-6"  style="display: inline-block;">
                       <button type="submit" class="btn btn-dark">
                        {{ __('Login') }}
                      </button>
                    </div>
                    <div class="col-6">
                    <button type="button" class="btn btn-dark">
                        <a href="{{ route('showRegister') }}" class="text-white">
                          {{ __('Register') }}
                        </a>
                        </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-dark py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>DevTech</h2>
                  <p>Renta de peliculas</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts-->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('/fontawesome/js/all.min.js') }}" defer></script>
</body>
</html>
