@extends('template.layout')

@include('template.h-navbar')

@section('main')

  <div class="container">
    <div class="row justify-content-center">

      {!! Form::open(['route' => 'publicaciones.store', 'method' => 'POST', 'files' => true, 'class' => 'form']) !!}
      <div class="header header-primary text-center">
        <h4 class="title title-up" >Nueva publicacion</h4>
      </div>

      <div class="form-group form-group-no-border">
        {{-- <input type="text" value="" placeholder="Regular" class="form-control" /> --}}
        {!!Form::text('titulo', null, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'form-control'])!!}
      </div>
      <div class="form-group form-group-no-border ">
        {!!Form::textarea('contenido', null,
          ['id' => 'contenido', 'rows' => '5', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}
        </div>
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

        <div class="form-group form-group-no-border">
          {!! Form::select('subcategoria_id', $subcategorias, null, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('estado_id', $estados, null, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group form-group-no-border">
          {!! Form::select('tags', $tags, null, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'form-control']) !!}
        </div>
        <div class="text-center">
          {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}

      </div>
    </div>
  @endsection
