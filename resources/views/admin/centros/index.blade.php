@extends('template.main')

@section('title','Centros')

@section('hNavbar')
	@include('template.h-navbar')
@endsection

@section('vNavbar')
	@include('template.v-navbar')
@endsection

@section('title-content', 'Centros')

@section('search-content')
	<div class="col-4">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'centros.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_centro']) !!}
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
			data-action="{{route('centros.store')}}"
			data-method="POST"
			onclick="showModalAccion(this.dataset)"
			class="btn btn-danger btn-icon btn-round">
			<i class="fa fa-plus"></i>
		</button>
	</div>

<table class="table table-hover table-sm" id="table">
<thead>
	<th class="ta-left">Id</th>
	<th class="ta-left">Regional</th>
	<th class="ta-left">Acrónimo</th>
	<th class="ta-left">Centro</th>
	<th class="ta-left">Acciones</th>
</thead>
<tbody>
	@foreach($centros as $centro)

		<tr>
			<td class="align-middle">{{$centro->id}}</td>
			<td class="align-middle">{{$centro->regional->descripcion}}</td>
			<td class="align-middle">{{$centro->acronimo}}</td>
			<td class="align-middle">{{$centro->descripcion}}</td>

			<td class="ta-right">
        <button data-toggle="modal" data-target="#modal-control"
            data-action="{{route('centros.update', $centro->id) }}"
            data-method="PUT"
            data-cati="{{$centro->regional->id}}"
            data-scati="{{$centro->id}}"
            onclick="showModalAccion(this.dataset)"
            class="btn btn-warning btn-icon btn-icon-mini">
          <i class="fa fa-pencil"></i>
        </button>
				{{ Form::open(['class' => 'd-inline-block', 'method' => 'DELETE', 'route' => ['centros.destroy', $centro->id]]) }}
            <button type="submit" class="btn btn-danger btn-icon btn-icon-mini">
              <i class="fa fa-trash"></i>
            </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$centros->links('vendor.pagination.custom')!!}

@endsection
