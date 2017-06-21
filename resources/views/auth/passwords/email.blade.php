@extends('template.layout')

@section('main')
    
    <a href="{{ url('/login') }}" class="href">
        <button type="button" class="material-btn-float top-left flat-btn">
                <i class="fa fa-chevron-left"></i>
        </button>
    </a>
    <div class="container">
        <div class="row full-h justify-content-center align-items-center relative">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <nav class="breadcrumb bg-white text-center">
                    <a class="breadcrumb-item f-none material-link" href="#">Verificar correo</a>
                    <span class="breadcrumb-item f-none active">Cambiar clave</span>
                </nav>
                <form class="" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <h3>Cambio de contraseña</h3>
                    @if (session('status'))
-                        <div class="alert alert-success">
-                            {{ session('status') }}
-                        </div>
-                    @endif
                    <div class="form-group pl-2 pr-2">
                        <input id="email" type="email" class="material-input" autofocus placeholder="Correo electronico" name="email" required>
                    </div>
                    <div class="form-group text-right pl-2 pr-2">
                        <button type="submit" class="material-btn btn-indigo">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
