@extends('admin.template.main')
@section('title','Crear Categoria')
@section('nombre','Crear Categoria')
 

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

{!!Form::open(['route'=>'categorias.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Categoría')!!}
{!! Form::text('descripcion',null,['placeholder'=>'categoría','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















