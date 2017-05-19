@extends('admin.template.main')
@section('title','Editar el tipo de denuncia' . $tipo_denuncia->descripcion)
@section('nombre','Editar el tipo de denuncia' . $tipo_denuncia->descripcion)
 

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

{!!Form::open(['route'=>['tipos_denuncias.update', $tipo_denuncia],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Descripcion')!!}
{!! Form::text('descripcion',$tipo_denuncia->descripcion,['placeholder'=>'tipo de denuncia','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
