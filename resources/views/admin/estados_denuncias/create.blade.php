@extends('admin.template.main')
@section('title','Crear Estado de Denuncia')
@section('nombre','Crear Estado de Denuncia')
 

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

{!!Form::open(['route'=>'estados_denuncias.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Descripción')!!}
{!! Form::text('descripcion',null,['placeholder'=>'estado de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















