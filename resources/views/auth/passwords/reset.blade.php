@extends('template.layout')

@section('main')
    <div class="container">
        <div class="row full-h justify-content-center align-items-center">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <nav class="breadcrumb bg-white text-center">
                    <span class="breadcrumb-item f-none active">Verificar correo</span>
                    <a class="breadcrumb-item f-none material-link" href="#">Cambiar clave</a>
                </nav>
                <form class="" role="form" method="POST" action="{{ route('password.request') }}">
                    <h3>Cambio de contraseña</h3>

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group pl-2 pr-2">
                        <input id="email" type="email" class="material-input" autofocus placeholder="Correo electronico" name="email" required>
                    </div>

                    <div class="form-group pl-2 pr-2">
                        <input id="password" type="password" class="material-input" placeholder="Nueva Clave" name="password" required>
                    </div>

                    <div class="form-group pl-2 pr-2">
                     <input id="password-confirm" type="password" class="material-input"  placeholder="Confirmar Clave" name="password_confirmation" required>
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

