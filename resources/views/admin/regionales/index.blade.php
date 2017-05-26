@extends('template.main')

@section('title','Categorias')

@section('hNavbar')
	@include('template.h-navbar')
@endsection

@section('vNavbar')
	@include('template.v-navbar')
@endsection

@section('title-content', 'Regionales')

@section('search-content')
<div class="col-4">
  <div class="search-content">
  <!-- BUSCADOR -->
  {!! Form::open(['route'=>'regionales.index', 'method'=>'GET','class' => 'f-right form-search']) !!}
  <div class="input-group">
    {!! Form::text('descripcion', null,
      ['placeholder' => 'Buscar...', 'class' => 'form-control', 'id' => 'buscar_regional']) !!}
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
  data-action="{{route('regionales.store')}}"
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
    <th class="ta-left">Regional</th>
    <th class="ta-left">Acciones</th>
  </tr>
</thead>
<tbody>
	@foreach($regionales as $regional)
		<tr>
			<td class="align-middle">{{$regional->id}}</td>
			<td class="align-middle" data-o="td-{{$regional->id}}">{{$regional->descripcion}}</td>

			<td class="ta-right">
        <button
          data-toggle="modal" data-target="#modal-control"
          data-action="{{route('regionales.update', $regional)}}"
          data-method="PUT"
          data-i="{{$regional->id}}"
          onclick="showModalAccion(this.dataset)"
          class="btn btn-neutral btn-icon  btn-icon-mini btn-round">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
				{{ Form::open(['class'=>'d-ib m-0', 'method' => 'DELETE', 'route' => ['regionales.destroy', $regional->id]]) }}
                    <button type="submit"  class="btn btn-neutral btn-icon btn-icon-mini btn-round">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</tbody>
</table>
{!!$regionales->links('vendor.pagination.custom')!!}

@endsection
