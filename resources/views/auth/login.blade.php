@extends('template.layout')

@section('title', 'Login')

@section('main')
  {{-- <div class="video-container">
    <video autoplay poster="{{asset('media/Wall-Sketching.jpg')}}">
      <source src="{{asset('media/Wall-Sketching.mp4')}}" type="video/mp4">
    </video>
  </div> --}}
  <div class="section section-signup full-h green">
    <div class="container">
      <div class="row">
        <div class="card card-signup">
          <form class="form" role="form" method="POST" action="{{ route('login') }}">
            <div class="header header-primary text-center">
              <h4 class="title title-up">Inicio</h4>
            </div>
            <div class="content">
              {{ csrf_field() }}
              <div class="input-group form-group-no-border input-lg">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input id="email" type="email" class="form-control" name="email" placeholder="Correo electronico" required>
              </div>

              <div class="input-group form-group-no-border input-lg">
                <span class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
                </span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Clave" required>
              </div>

            </div>

            <div class="footer text-center p-0">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                <label for="checkbox1">
                  Recordarme
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-round btn-lg">
                  Ingresar
              </button>
              <br>
              <a class="btn btn-link" href="{{ route('password.request') }}">
                ¿Olvidó su contraseña?
              </a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
