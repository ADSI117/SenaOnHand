@extends('admin.template.main')
@section('title','Editar Estado de Comentario' . $estado_comentario->descripcion)
@section('nombre','Estado de Comentario' . $estado_comentario->descripcion)
 

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

{!!Form::open(['route'=>['estados_comentarios.update', $estado_comentario],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Descripcion')!!}
{!! Form::text('descripcion',$estado_comentario->descripcion,['placeholder'=>'tipo de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
