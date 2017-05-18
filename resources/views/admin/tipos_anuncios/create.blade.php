@extends('admin.template.main')
@section('title','Crear Tipo de Anuncio')
@section('nombre','Crear Tipo de Anuncio')
 

@section('content')

@if (count($errors) > 0)
<div class="">
<ul>
	@foreach($errors->all() as $error)
	
		<li> {{$error}}</li>
	
	@endforeach
	
	</ul>
	</div>
@endif

{!!Form::open(['route'=>'tipos_anuncios.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('nombre','Tipo de Anuncio')!!}
{!! Form::text('nombre',null,['placeholder'=>'tipo de anuncio','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















