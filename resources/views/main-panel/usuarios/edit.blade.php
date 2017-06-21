@extends('template.layout')


@section('main')
@include('template.h-navbar')

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

        <div class="card">
          <div class="card-block">


            <div class="form-group">
              {!! Form::text('nombres', $usuario->nombres,
              ['id' => 'nombres', 'placeholder' => 'Nombre', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              {!! Form::text('apellidos', $usuario->apellidos, ['id' => 'apellidos', 'placeholder' => 'Apellido', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              {!! Form::text('profesion', $usuario->profesion, ['id' => 'profesion', 'placeholder' => 'Profesion', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              <label for="nombres">Tipo de documento: </label>
              {!! Form::select('tipo_doc_id', $tipos_doc, $usuario->tipo_doc_id, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
              {!! Form::number('num_doc', $usuario->num_doc, ['id' => 'num_doc', 'placeholder' => 'Escriba su num de doc', 'required', 'class' => 'material-input'])!!}
            </div>
            <div class="form-group">
              <label for="nombres">Fecha de nacimiento: </label>
              {!! Form::date('fecha_nac', $usuario->fecha_nac, ['id' => 'fecha_nac', 'required', 'class' => 'material-input', 'min' => $usuario->fecha_nac])!!}
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
        </div>
      </div>
      <div class="col-xs-12 col-md-4">

        <div class="form-group form-group-no-border">
          {!!Form::label('Cambiar imagen de perfil.')!!}
          {!! Form::file('imagen', ['class' => ''])!!}
        </div>
        <div class="form-group form-group-no-border">
          {!!Form::label('Cuéntanos algo de ti.')!!}
          {!! Form::textarea('perfil', $usuario->perfil,['class' => ''])!!}
        </div>

        <div class="form-group form-group-no-border">
          @include('flash::message')
        </div>

        <div class="photo-container">

          <img src="{{Storage::url($usuario->url_foto)}}" alt="">

        </div>
      </div>
    </div>
  </div>

  {!!Form::close()!!}
  @endsection
