@extends('admin.template.main')
@section('title','Crear Estado de Comentario')
@section('nombre','Crear Estado de Comentario')
 

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

{!!Form::open(['route'=>'estados_comentarios.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Estado de Comentario')!!}
{!! Form::text('descripcion',null,['placeholder'=>'estado de comentario','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















