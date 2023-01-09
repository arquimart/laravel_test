<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>

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
</head>
<body>
    <div class="jumbotron vertical-center">
        <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-group">
              <div class="card p-4">
                <div class="card-body">

                  <form method="POST" action="{{ route('registerUser') }}">
                    @csrf
                    <h1>Registro</h1>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input name="name"  type="text" placeholder=" Name"  required autofocus>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input name="email" type="email" placeholder="Email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
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
                    <input name="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input id="password_confirmation" type="password" placeholder="Confirmar contraseña"class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6" >
                            <button type="submit" class="btn btn-dark">
                            {{__('Register') }}
                            </button>
                        </div>
                        <button type="button" class="btn btn-link" onclick="location.href='{{ route('login') }}'">ya tienes una cuenta?</button>
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
    </form>

</body>
</html>
