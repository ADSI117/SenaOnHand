@extends('admin.template.main')
@section('title','Crear Tipo de Documento')
@section('nombre','Crear Tipo de Documento')
 

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

{!!Form::open(['route'=>'tipos_docs.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('nombre','Tipo de Documento')!!}
{!! Form::text('nombre',null,['placeholder'=>'tipo de documento','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















