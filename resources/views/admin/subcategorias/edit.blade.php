@extends('admin.template.main')
@section('title','Editar Subcategoria' . $subcategoria->descripcion)
@section('nombre','Editar Subcategoria' . $subcategoria->descripcion)
 

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

{!!Form::open(['route'=>['subcategorias.update', $subcategoria],'method'=>'PUT'])!!}
<div class="form-group">
	{!!form::label('Categoria')!!}
	{!!form::select('categoria_id', $categorias, $subcategoria->categoria->id,['class' => 'form-control selector', 'required'])!!}
</div>

<div class="">
	{!!Form::label('descripcion','Sede')!!}
	{!! Form::text('descripcion',$subcategoria->descripcion,['placeholder'=>'subcategoria','required'])!!}
</div>
<div class="">
{!! Form::submit('Editar',['class'=>''])!!}
</div>
{!!Form::close() !!}

@endsection

@section('js')
<script>
    $(".selector").chosen({
      // disable_search_threshold: 10,
      search_contains: true,
      no_results_text: 'No hay resultados',
      placeholder_text_single: 'Seleccion una opcion'
    });
  </script>
@endsection
