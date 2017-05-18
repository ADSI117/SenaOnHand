@extends('admin.template.main')
@section('title','Crear Estado de Publicación')
@section('nombre','Crear Estado de Publicación')
 

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

{!!Form::open(['route'=>'estados_publicaciones.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Estado de Publicación')!!}
{!! Form::text('descripcion',null,['placeholder'=>'estado de publicación','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















