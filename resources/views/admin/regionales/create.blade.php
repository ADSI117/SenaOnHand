@extends('admin.template.main')
@section('title','Crear Regional')
@section('nombre','Crear Regional')
 

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

{!!Form::open(['route'=>'regionales.store','method'=>'POST'])!!}
<div class="form-group">
{!!Form::label('descripcion','Regional')!!}
{!! Form::text('descripcion',null,['placeholder'=>'regional','required'])!!}
</div>
<div class="">
{!! Form::submit('Registrar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

















