@extends('admin.template.main')
@section('title','Crear Programa')
@section('nombre','Crear Programa')
 

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

{!!Form::open(['route'=>'programas.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('acronimo','Acronimo')!!}
{!! Form::text('acronimo',null,['placeholder'=>'acronimo','required'])!!}
</div>
<div class="form-group">
{!!Form::label('descripcion','Descripción')!!}
{!! Form::text('descripcion',null,['placeholder'=>'nombre del programa','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















