@extends('admin.template.main')
@section('title','Editar Roles' . $rol->descripcion)
@section('nombre','Editar Roles' . $rol->descripcion)
 

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

{!!Form::open(['route'=>['roles.update', $rol],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Rol')!!}
{!! Form::text('descripcion',$rol->descripcion,['placeholder'=>'rol','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
