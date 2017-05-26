@extends('admin.template.main')
@section('title','Editar el Tipo de Anuncio' . $tipo_anuncio->nombre)
@section('nombre','Editar el Tipo de Anuncio' . $tipo_anuncio->nombre)
 

@section('content')
@if (count($errors) > 0)
<div class="alert alert-info" role="alert">
<ul>
	@foreach($errors->all() as $error)
	
		<li> {{$error}}</li>
	
	@endforeach
	
	</ul>
	</div>
@endif

{!!Form::open(['route'=>['tipos_anuncios.update', $tipo_anuncio],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('nombre','Nombre')!!}
{!! Form::text('nombre',$tipo_anuncio->nombre,['placeholder'=>'tipo de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
