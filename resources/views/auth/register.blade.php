@extends('template.layout')

@section('title','Registro')

@section('main')
  @include('componentes.aviso')
{{-- <div class="page-header-image" style="background-image:url({{asset('imagenes/background/bg-registrer_1.jpg')}})"></div> --}}
<div class="container-fluid">
  <div class="row justify-content-start">

    <div class="col-xs-12 col-md-4 col-lg-3 bg-white full-h p-4">
      <h3 class="titulo">Registro</h3>
      <form class="pl-4 pr-4" role="form" name="formulario" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group ">
          {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> --}}
            <input id="name" type="text" placeholder="Nombre" class="material-input" name="name" value="{{ old('name') }}" autofocus required>
            {{-- @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif --}}
        </div>

        <div class="form-group ">
            <input id="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" placeholder="Correo electrónico" class="material-input" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group ">
            <input id="password" placeholder="Clave" type="password" class="material-input" name="password" required>
        </div>

        <div class="form-group ">
          <input id="password-confirm" placeholder="Confirmar clave" type="password" class="material-input" name="password_confirmation" required>
        </div>

        <div class="text-center mt-4">
<<<<<<< HEAD
            <button type="submit" class="material-btn btn-indigo">
                Registrarse
=======
            <button type="button" id="btn-enviar" class="material-btn btn-indigo">
                Register
>>>>>>> origin/Jhonathan
            </button>
            <hr />
            <a href="{{ url('/login') }}" class="material-link">Ingresar</a>
        </div>

      </form>
    </div>

    <div class="hidden-sm-down col-md-8 col-lg-9 bg-indigo"></div>

  </div>
</div>

@endsection

@section('js')
  <script src="{{ asset('js/login/validaciones.js') }}"></script>
@endsection
