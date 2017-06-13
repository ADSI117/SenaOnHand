@extends('template.layout')

@include('template.h-navbar')

@section('main')

  {!! Form::open(['route' => ['usuarios.update', $usuario] , 'method' => 'PUT', 'files' => true])!!}
  <div class="page-banner bg-brown">
    <div class="container">
      <h1>
        Editar perfil
      </h1>
    </div>
    <div class="btn-float-page">
      <button type="submit" class="btn btn-info btn-icon btn-round">
        <i class="fa fa-floppy-o"></i>
      </button>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xs-12 col-md-6">
        <div class="form-group">
          <label for="nombres">Nombre: </label>
          {!! Form::text('nombres', $usuario->nombres,
            ['id' => 'nombres', 'placeholder' => 'Escriba su nombre', 'required', 'class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Apellido: </label>
            {!! Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'placeholder' => 'Escriba su apellido', 'required', 'class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Profesion: </label>
            {!! Form::text('profesion', $usuario->profesion, ['id' => 'profesion', 'placeholder' => 'Escriba su profesion', 'required', 'class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Tipo de documento: </label>
            {!! Form::select('tipo_doc_id', $tipos_doc, $usuario->tipo_doc_id, ['class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Número de documento: </label>
            {!! Form::number('num_doc', $usuario->num_doc, ['id' => 'num_doc', 'placeholder' => 'Escriba su num de doc', 'required', 'class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Fecha de nacimiento: </label>
            {!! Form::date('fecha_nac', $usuario->fecha_nac, ['id' => 'fecha_nac', 'required', 'class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Sede: </label>
            {!! Form::select('sede_id', $sedes, $usuario->sede_id, ['class' => 'form-control'])!!}
          </div>
          <div class="form-group">
            <label for="nombres">Grupo: </label>
            {!! Form::select('grupo_id', $grupos, $usuario->grupo_id, ['class' => 'form-control'])!!}
          </div>

        </div>
        <div class="col-xs-12 col-md-4">
          {!!Form::label('Imagen de perfil')!!}
          {!! Form::file('imagen', ['class' => 'form-control'])!!}
          <div class="photo-container">
            <img src="{{url('/')}}/imagenes/perfiles/{{$usuario->url_foto}}" alt="Foto de perfil" />
          </div>
        </div>
      </div>
    </div>

    {!!Form::close()!!}
  @endsection
