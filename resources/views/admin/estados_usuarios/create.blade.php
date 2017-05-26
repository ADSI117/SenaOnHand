@extends('admin.template.main')
@section('title','Crear Estado de Usuario')
@section('nombre','Crear Estado de Usuario')
 

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

{!!Form::open(['route'=>'estados_usuarios.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Descripción')!!}
{!! Form::text('descripcion',null,['placeholder'=>'estado de usuario','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















