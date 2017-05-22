@extends('template.main')
@section('title','Categorias')

@section('navbar')
	@include('template.navbar')
@endsection

@section('title-content','Editar Categorias' . $categoria->descripcion)


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

{!!Form::open(['route'=>['categorias.update', $categoria],'method'=>'PUT'])!!}
<div class="">
{!!Form::label('descripcion','Categoria')!!}
{!! Form::text('descripcion',$categoria->descripcion,['placeholder'=>'categoria','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection
