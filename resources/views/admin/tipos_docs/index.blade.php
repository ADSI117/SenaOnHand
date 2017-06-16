@extends('template.admin')

@section('title','Tipos documentos')

@section('title-content', 'Tipos de documentos')

@section('search-content')
	<div class="col-4">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'tipos_docs.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_tipo_documento']) !!}
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
			data-action="{{route('tipos_docs.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>

<table class="table table-hover table-responsive" id="table">
<thead>
  <tr>
    <th class="ta-left">Id</th>
    <th class="ta-left">Tipo de Documento</th>
    <th class="ta-right">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($tipos_docs as $tipo_doc)
		<tr data-tr="{{$tipo_doc->id}}">
			<td class="align-middle">{{$tipo_doc->id}}</td>
			<td class="align-middle">{{$tipo_doc->nombre}}</td>
			<td class="ta-right">
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('tipos_docs.update', $tipo_doc)}}"
							data-method="PUT"
							data-td="{{$tipo_doc->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-warning btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' => ['tipos_docs.destroy', $tipo_doc->id]]) }}
        <button type="submit" class="btn btn-danger btn-icon btn-icon-mini btn-round">
						<i class="fa fa-trash" aria-hidden="true"></i>
				</button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$tipos_docs->links('vendor.pagination.custom')!!}

@endsection

@section('modal-control')
	@extends('template.modal')
	@section('modal-title','tipos de documento')
	@section('modal-content')
		{!!Form::open(['id' => 'form-accion'])!!}
		<div class="modal-body">
		    <div class="form-group">

					{!! Form::text('nombre',null,
						['placeholder' => 'Nombre' ,
						 	'required',
							'class' => 'form-control',
							'id' => 'nombre'])!!}

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

	<script src="{{asset('js/tipos_docs.js')}}" charset="utf-8"></script>
@endsection
