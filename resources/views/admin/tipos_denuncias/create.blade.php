@extends('admin.template.main')
@section('title','crear tipo de denuncia')
@section('nombre','Crear tipo de denuncia')
 

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

{!!Form::open(['route'=>'tipos_denuncias.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Descripción')!!}
{!! Form::text('descripcion',null,['placeholder'=>'tipo de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















