<h1>Crear usuario</h1>
{!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}

<div class="form-group">
  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo']) !!}
</div>

<div class="form-group">
  {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Clave']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Registrarme', ['class' => 'form-control']) !!}
</div>

{!!Form::close()!!}
