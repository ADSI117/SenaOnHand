<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<div class="container">

  <h1>Formulario de edicion de perfil de cada usuario</h1>

  {!! Form::open(['route' => ['usuarios.update', $usuario] , 'method' => 'PUT', 'files' => true])!!}

    {!! Form::text('nombres', $usuario->nombres, ['id' => 'nombres', 'placeholder' => 'Escriba su nombre', 'required', 'class' => 'form-control'])!!}
    <br>
    {!! Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'placeholder' => 'Escriba su apellido', 'required', 'class' => 'form-control'])!!}
    <br>
    {!! Form::text('profesion', $usuario->profesion, ['id' => 'profesion', 'placeholder' => 'Escriba su profesion', 'required', 'class' => 'form-control'])!!}
    <br>
    {!! Form::select('tipo_doc_id', $tipos_doc, $usuario->tipo_doc_id, ['class' => 'form-control'])!!}
    <br>
    {!! Form::number('num_doc', $usuario->num_doc, ['id' => 'num_doc', 'placeholder' => 'Escriba su num de doc', 'required', 'class' => 'form-control'])!!}
    <br>
    {!!Form::label('Fecha de nacimiento')!!}
    {!! Form::date('fecha_nac', $usuario->fecha_nac, ['id' => 'fecha_nac', 'required', 'class' => 'form-control'])!!}
    <br>
    {!!Form::label('Sede')!!}
    {!! Form::select('sede_id', $sedes, $usuario->sede_id, ['class' => 'form-control'])!!}
    <br>
    {!!Form::label('Grupo')!!}
    {!! Form::select('grupo_id', $grupos, $usuario->grupo_id, ['class' => 'form-control'])!!}
    <br>
    {!!Form::label('Imagen de perfil')!!}
    {!! Form::file('imagen', ['class' => 'form-control'])!!}
    <br>
    {!!FORM::submit('Guardar', ['class' => 'form-control btn-primary'])!!}

  {!!Form::close()!!}

</div>
