@extends('template.admin')

@section('title','Estados publicaciones')

@section('title-content', 'Estados de publicaciones')

@section('search-content')
	<div class="col-12">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'estados_publicaciones.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_estado_publicacion']) !!}
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
	<div class="btn-float hidden-xs-down" >
			<button data-toggle="modal" data-target="#modal-control"
			data-action="{{route('estados_publicaciones.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>


<table class="table table-hover" id="table">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">Estado de Publicación</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($estados_publicaciones as $estado_publicacion)
		<tr data-tr="{{$estado_publicacion->id}}">
			<td>{{$estado_publicacion->id}}</td>
			<td>{{$estado_publicacion->descripcion}}</td>
			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('estados_publicaciones.update', $estado_publicacion)}}"
							data-method="PUT"
							data-td="{{$estado_publicacion->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' =>
        ['estados_publicaciones.destroy', $estado_publicacion->id]]) }}
        <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}
			</td>
		</tr>


	@endforeach
</tbody>
</table>
{!!$estados_publicaciones->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Estados publicaciones')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
		    <div class="form-group">
					{!! Form::text('descripcion',null,
						['placeholder' => 'Nombre' ,
						 	'required',
							'class' => 'form-control'])!!}
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
			<button type="submit" name="btnSubmit" class="btn btn-info btn-simple">Registrar</button>
			{{-- {!! Form::submit('Registrar',['class'=>'mdl-button'])!!} --}}
		</div>
		{!!Form::close() !!}
	@endsection
@endsection

@section('js')

	<script src="{{asset('js/estados_publicaciones.js')}}" charset="utf-8"></script>
@endsection
