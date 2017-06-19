@extends('template.layout')

@include('template.h-navbar')

@section('main')
	<div class="container">
		<div class="row">
			<div class="col">
			<div class="card">
					<ul class="nav nav-tabs nav-tabs-indigo justify-content-center" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#noleidas" role="tab">
								<i class="fa fa-list-alt"></i> Mis categorías
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#leidas" role="tab">
								<i class="fa fa-graduation-cap"></i> Instructores
							</a>
						</li>
					</ul>
					<div class="card-block">
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="noleidas" role="tabpanel">
								<div class="row">
									@foreach($usuario->categorias as $categoria)
									<div class="col-xs-12 col-md-6 col-lg-4">
										{{ Form::open(['method' => 'DELETE', 'class' => 'material-card__big', 'route' => ['categoria-usuario.destroy', $categoria->id]]) }}
											<div class="card-header__image" style="background-image: url(http://www.popcomunicaciones.com/blog/media/k2/items/cache/e0a70f72bdae9885bfc32d7cd19a26a1_Generic.jpg)">
												<h2 class="card-header__titulo">{{$categoria->descripcion}}</h2>
											</div>
											<p class="card__text">
												Located two hours south of Sydney in the Southern Highland of New South Wales...
											</p>
											<div class="card__action-bar">
												<botton type="submit" class="card__button">
													Dejar de seguir											
												</botton>
											</div>
										{{ Form::close() }}
									</div>
									@endforeach
								</div>
							
							</div>
							<div class="tab-pane" id="leidas" role="tabpanel">
							
							@foreach($usuario->seguidos as $seguido)
								{{ Form::open(['method' => 'DELETE', 'route' => ['seguidos.destroy', $seguido->id]]) }}
								@if($seguido->seguido->url_foto)
								<img src="{{ Storage::url($seguido->seguido->url_foto) }}" alt="" width="50" height="50">
								@else
								<img src="{{url('/')}}/imagenes/perfiles/soh_profile_default.png" alt="" width="50" height="50">
								@endif
								<a href="#">{{$seguido->seguido->nombres}} {{$seguido->seguido->apellidos}}</a>

								{!!Form::submit('Dejar de seguir', ['class'=>'btn btn-warning'])!!}
								{{ Form::close() }}
							@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection



 