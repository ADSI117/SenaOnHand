@extends('template.layout')

@section('title', 'Login')

@section('main')

    @include('componentes.aviso')
  {{-- <div class="page-header-image" style="background-image:url({{asset('imagenes/background/bg-registrer_1.jpg')}})"></div> --}}
  <div class="container-fluid">
    <div class="row justify-content-start">


      <div class="hidden-sm-down col-md-8 col-lg-9 bg-teal"></div>

      <div class="col-xs-12 col-md-4 col-lg-3 bg-white full-h p-4">
        <div class="">
          @include('flash::message')
        </div>

        <h3 class="titulo">Iniciar sesion</h3>
        <form class="pl-4 pr-4" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
              <input id="email" type="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Correo electrónico" class="material-input" name="email" value="{{ old('email') }}" required>
          </div>

          <div class="form-group">
              <input id="password" placeholder="Clave" type="password" class="material-input" name="password" required>
          </div>

          <div class="text-center mt-4">
              <div class="form-group">
                <div class="checkbox">
                  <input id="checkbox1" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                  <label for="checkbox1">
                    Recordarme
                  </label>
                </div>
              </div>

              <button type="submit" class="material-btn btn-indigo">
                  Ingresar
              </button>
              <hr />
              <a class="material-link" href="{{ route('password.request') }}">
                ¿Olvidó su contraseña?
              </a>
              <br />
              <a class="material-link" href="{{ url('/register') }}">Registrarse</a>
          </div>

        </form>
      </div>

    </div>
  </div>

  @endsection
