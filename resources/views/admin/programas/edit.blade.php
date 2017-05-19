@extends('admin.template.main')
@section('title','Editar Programa' . $programa->descripcion)
@section('nombre','Programa' . $programa->descripcion)
 

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

{!!Form::open(['route'=>['programas.update', $programa],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('acronimo','Acronimo')!!}
{!! Form::text('acronimo',$programa->acronimo,['placeholder'=>'acronimo','required'])!!}
</div>
<div class="">
{!!Form::label('descripcion','Descripcion')!!}
{!! Form::text('descripcion',$programa->descripcion,['placeholder'=>'programa','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
