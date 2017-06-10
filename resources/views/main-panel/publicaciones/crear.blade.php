@extends('template.layout')

@include('template.h-navbar')

@section('main')


  {!! Form::open(['route' => 'publicaciones.store', 'method' => 'POST', 'files' => true, 'class' => '']) !!}
  <div class="page-banner">
    <div class="container">
      <h1>Nueva publicacion</h1>
    </div>
    <div class="btn-float-page">
      <button type="submit" class="btn btn-info btn-icon btn-round">
        <i class="fa fa-floppy-o"></i>
      </button>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-6">
        <div class="form-group form-group-no-border">
          {!! Form::label('titulo', 'Titulo') !!}
          {!!Form::text('titulo', null, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group form-group-no-border ">
          {!! Form::label('contenido', 'Contenido') !!}
          {!!Form::textarea('contenido', null, ['id' => 'contenido', 'rows' => '5', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('subcategoria_id', $subcategorias, null, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('estado_id', $estados, null, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('tags', $tags, null, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group form-group-no-border ">
          {!! Form::label('imagen', 'Imagen') !!}
          {!! Form::file('imagen', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border ">
          {!! Form::label('archivo', 'Archivo') !!}
          {!! Form::file('archivo', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group form-group-no-border">
          {!! Form::label('video', 'Video') !!}
          {!!Form::text('video', null, ['id' => 'video', 'placeholder' => 'URL del video', 'class' => 'form-control'])!!}
        </div>
      </div>
    </div>
    {!! Form::close()!!}
  @endsection
