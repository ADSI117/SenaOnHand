@extends('template.main')

@section('title','Estados comentarios')

@section('hNavbar')
	@include('template.h-navbar')
@endsection

@section('vNavbar')
	@include('template.v-navbar')
@endsection

@section('title-content', 'Estados de comentarios')

@section('search-content')
	<div class="col-4">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'estados_comentarios.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_estado_comentario']) !!}
				<span class="input-group-addon">
					<i class="fa fa-search" aria-hidden="true"></i>
				</span>
			</div>
			{!! Form::close() !!}
			<!--  FIN BUSCADOR -->
		</div>
	</div>
@endsection


@section('content')

<!-- Colored FAB button -->
	<div class="btn-float">
			<button data-toggle="modal" data-target="#modal-control"
			data-action="{{route('estados_comentarios.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>

<table class="table table-hover table-sm" id="table">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">Estado de Comentario</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($estados_comentarios as $estado_comentario)
		<tr>
			<td class="align-middle">{{$estado_comentario->id}}</td>
			<td class="align-middle">{{$estado_comentario->descripcion}}</td>

			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('estados_comentarios.update', $estado_comentario)}}"
							data-method="PUT"
							data-i="{{$estado_comentario->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-neutral btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' =>
        ['estados_comentarios.destroy', $estado_comentario->id]]) }}
        <button type="submit" class="btn btn-neutral btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>


</table>
{!!$estados_comentarios->links('vendor.pagination.custom')!!}

@endsection
