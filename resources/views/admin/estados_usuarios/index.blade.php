@extends('template.admin')

@section('title','Estados usuarios')

@section('title-content', 'Estados de usuarios')

@section('search-content')
	<div class="col-4">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'estados_usuarios.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_estado_usuario']) !!}
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
			data-action="{{route('estados_usuarios.store')}}"
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
    <th class="ta-left">Estado de Usuario</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($estados_usuarios as $estado_usuario)
		<tr data-tr="{{$estado_usuario->id}}">
			<td>{{$estado_usuario->id}}</td>
			<td>{{$estado_usuario->descripcion}}</td>
			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('estados_usuarios.update', $estado_usuario)}}"
							data-method="PUT"
							data-td="{{$estado_usuario->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' =>
        ['estados_usuarios.destroy', $estado_usuario->id]]) }}
        <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$estados_usuarios->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','Categoria')
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

	<script src="{{asset('js/estados_usuarios.js')}}" charset="utf-8"></script>
@endsection
