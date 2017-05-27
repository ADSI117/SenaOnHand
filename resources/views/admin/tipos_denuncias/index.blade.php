@extends('template.main')

@section('title','Tipos denuncias')

@section('hNavbar')
	@include('template.h-navbar')
@endsection

@section('vNavbar')
	@include('template.v-navbar')
@endsection

@section('title-content', 'Tipos de denuncias')

@section('search-content')
	<div class="col-4">
		<div class="search-content">
		<!-- BUSCADOR -->
		{!! Form::open(['route'=>'tipos_denuncias.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
		<div class="input-group">
			{!! Form::text('descripcion', null,
				['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_denuncia']) !!}
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
			data-action="{{route('tipos_denuncias.store')}}"
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
    <th class="ta-left">Tipo de Denuncia</th>

    <th class="ta-right">Editar</th>
  </tr>
</thead>
<tbody>
	@foreach($tipos_denuncias as $tipo_denuncia)
		<tr>
			<td class="align-middle">{{$tipo_denuncia->id}}</td>
			<td class="align-middle">{{$tipo_denuncia->descripcion}}</td>

<<<<<<< HEAD
			<td>
=======
			<td class="ta-right">
>>>>>>> b2d51d2e975cfea5c1fa6b33b67ed2e494377019
        <button
							data-toggle="modal" data-target="#modal-control"
							data-action="{{route('tipos_denuncias.update', $tipo_denuncia)}}"
							data-method="PUT"
							data-i="{{$tipo_denuncia->id}}"
							onclick="showModalAccion(this.dataset)"
							class="btn btn-neutral btn-icon  btn-icon-mini btn-round">
								<i class="fa fa-pencil" aria-hidden="true"></i>
						</button>
				{{ Form::open(['class'=>'d-ib m-0','method' => 'DELETE', 'route' =>
        ['tipos_denuncias.destroy', $tipo_denuncia->id]]) }}
          <button type="submit" class="btn btn-neutral btn-icon btn-icon-mini btn-round">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$tipos_denuncias->links('vendor.pagination.custom')!!}

@endsection
