@extends('admin.template.main')
@section('title','Crear Rol')
@section('nombre','Crear Rol')
 

@section('content')

@if (count($errors) > 0)
<div class="">
<ul>
	@foreach($errors->all() as $error)
	
		<li> {{$error}}</li>
	roles
	@endforeach
	
	</ul>
	</div>
@endif

{!!Form::open(['route'=>'roles.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Rol')!!}
{!! Form::text('descripcion',null,['placeholder'=>'rol','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















