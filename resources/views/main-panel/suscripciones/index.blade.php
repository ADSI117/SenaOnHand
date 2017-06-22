@extends('template.layout')

@section('main')

	 @include('template.h-navbar')
	<div class="container-fluid">
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
											<div class="card-header__image" style="background-image: url({{Storage::url($categoria->url_imagen)}})">
												<h2 class="card-header__titulo"><a href="#">{{$categoria->nombre}}</a></h2>
											</div>
											<p class="card__text">
												{{$categoria->descripcion}}
											</p>
											<div class="card__action-bar">
												{!!Form::submit('Dejar de seguir', ['class' => 'card__button'])!!}
											</div>
										{{ Form::close() }}
									</div>
									@endforeach
								</div>

							</div>

							<div class="tab-pane" id="leidas" role="tabpanel">

								<div class="row">
									@foreach($usuario->seguidos as $seguido)
									<div class="col-xs-12 col-md-6 col-lg-4">
										{{ Form::open(['method' => 'DELETE', 'route' => ['seguidos.destroy', $seguido->id]]) }}
											@if($seguido->seguido->url_foto)
													<img src="{{Storage::url($seguido->seguido->url_foto)}}" alt="Imagen de perfil">
												@else
													<img src="{{Storage::url('soh_profile_default.png')}}" alt="Imagen de perfil">

												@endif
												<h4>
													<a href="{{route('instructores.show', [$seguido->seguido->id])}}">
						                {{$seguido->seguido->nombres}} {{$seguido->seguido->apellidos}}
						              </a>
												</h4>
											<p>
												{{$seguido->perfil}}
											</p>
											<div>
												{!!Form::submit('Dejar de seguir', ['class'=>'card__button'])!!}
											</div>
										{{ Form::close() }}
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
