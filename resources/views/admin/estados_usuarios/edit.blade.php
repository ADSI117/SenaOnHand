@extends('admin.template.main')
@section('title','Editar Estado de Usuario' . $estado_usuario->descripcion)
@section('nombre','Editar Estado de Usuario' . $estado_usuario->descripcion)
 

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

{!!Form::open(['route'=>['estados_usuarios.update', $estado_usuario],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Descripcion')!!}
{!! Form::text('descripcion',$estado_usuario->descripcion,['placeholder'=>'estado de usuario','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
