@extends('template.layout')

@include('template.h-navbar')

@section('main')

<div class="container">
<h1>Formulario de nueva publicacion</h1>

{!! Form::open(['route' => 'publicaciones.store', 'method' => 'POST', 'files' => true, 'class' => '']) !!}

  {!!Form::text('titulo', null, ['id' => 'nombre', 'placeholder' => 'Título', 'required', 'class' => 'form-control'])!!}
  <br>
  {!!Form::textarea('contenido', null, ['id' => 'contenido', 'placeholder' => 'Contenido de la pubicación', 'required', 'class' => 'form-control'])!!}

  <br>
  {!! Form::label('imagen', 'Imagen') !!}
  {!! Form::file('imagen', ['class' => 'form-control']) !!}

  <br>
  {!! Form::label('archivo', 'Archivo') !!}
  {!! Form::file('archivo', ['class' => 'form-control']) !!}

  <br>
  {!! Form::select('subcategoria_id', $subcategorias, null, ['placeholder' => 'Seleccione una Subcategoria', 'required', 'class' => 'form-control']) !!}

  <br>
  {!! Form::select('estado_id', $estados, null, ['placeholder' => 'Estado publicacion', 'required', 'class' => 'form-control']) !!}

  <br>
  {!! Form::select('tags', $tags, null, ['multiple'=>'multiple', 'name'=>'tags[]',  'required', 'class' => 'form-control']) !!}

  <br>
  {!! Form::submit('Publicar', ['class' => 'form-control btn-primary']) !!}


{!! Form::close()!!}
</div>
@endsection
