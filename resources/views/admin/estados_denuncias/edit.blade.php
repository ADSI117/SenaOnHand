@extends('admin.template.main')
@section('title','Editar Estado de Denuncia' . $estado_denuncia->descripcion)
@section('nombre','Editar Estado de Denuncia' . $estado_denuncia->descripcion)
 

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

{!!Form::open(['route'=>['estados_denuncias.update', $estado_denuncia],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Estado de denuncia')!!}
{!! Form::text('descripcion',$estado_denuncia->descripcion,['placeholder'=>'estado de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
