@extends('admin.template.main')
@section('title','Editar Estado de Publicación' . $estado_publicacion->descripcion)
@section('nombre','Editar Estado de Publicación' . $estado_publicacion->descripcion)
 

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

{!!Form::open(['route'=>['estados_publicaciones.update', $estado_publicacion],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Estado de Publicación')!!}
{!! Form::text('descripcion',$estado_publicacion->descripcion,['placeholder'=>'estado de publicación','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
