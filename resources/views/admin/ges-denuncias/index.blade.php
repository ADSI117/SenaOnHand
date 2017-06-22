{{-- llama main blade --}}
@extends('template.admin')
{{-- seteamos el titulo --}}
@section('title','Programas')

{{-- titulo del contenido --}}
@section('title-content', 'Gestion de denuncias')
{{-- poner el buscar al lado del titulo --}}
@section('search-content')
  <!-- BUSCADOR -->
  	{!!Form::open(['route'=>'denuncias.index','method'=>'GET'])!!}
  	<div class="input-group">
  			{!! Form::text('filtro',null,
          ['placeholder'=>'Buscar...', 'class' => 'form-control'])!!}
          <span class="input-group-addon">
            <i class="fa fa-search"></i>
        </span>
  	</div>
  	{!!Form::close() !!}
  <!--  FIN BUSCADOR -->
@endsection
@section('content')
<div class="container">
  <div class="row">
     @include('flash::message')
  </div>
</div>

<table class="table table-hover">
<thead>
  <tr>
    <!-- <th class="ta-left">Id</th> -->
    <th class="ta-left">Borrar denun</th>
    <th class="ta-left">Usuario</th>
    <th class="ta-left">Publicacion</th>
    <th class="ta-left">Comentario</th>
    <th class="ta-left">Tipo</th>
    <th class="ta-right">Estado</th>
    <th class="ta-right">Fecha</th>
    <th class="ta-right">Borrar Coment</th>
  </tr>
</thead>
<tbody>
	@foreach($denuncias as $denuncia)
		<tr data-tr="{{$denuncia->id}}">
      <td>
        {{ Form::open(['class'=>'d-ib m-0','method' => 'PUT', 'route' =>
        ['denuncias.update', $denuncia->id]]) }}
        <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}
      </td>
      <td>{{$denuncia->nombres}} {{$denuncia->apellidos}}</td>
      <td>{{$denuncia->titulo}}</td>
			<td>{{$denuncia->comentario}}</td>
			<td>{{$denuncia->tip_den}}</td>
      <td>{{$denuncia->estado}}</td>

      <td>{{$denuncia->created_at}}</td>


			<td class="ta-right">

        {{ Form::open(['class'=>'d-ib m-0','method' => 'PUT', 'route' =>
        ['comentarios.update', $denuncia->comentario_id]]) }}
        {!!Form::hidden('denuncia_id', $denuncia->id)!!}
        <button type="submit" class="btn btn-warning btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}

			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$denuncias->links('vendor.pagination.custom')!!}

@endsection
