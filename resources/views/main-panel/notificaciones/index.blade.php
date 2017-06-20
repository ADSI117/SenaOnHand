<!-- Notificaciones del usuario -->

@extends('template.layout')


@section('main')
	@include('template.h-navbar')
	<div class="container-fluid">
		<div class="row">

			<div class="col">
					<!-- <p class="category">Tabs with Icons on Card</p> -->
					<!-- Nav tabs -->
					<div class="card">
							<ul class="nav nav-tabs nav-tabs-red justify-content-center" role="tablist">
									<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#noleidas" role="tab">
													<i class="fa fa-envelope"></i> No leidas
											</a>
									</li>
									<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#leidas" role="tab">
													<i class="fa fa-envelope-open"></i> Leidas
											</a>
									</li>
							</ul>
							<div class="card-block">
									<!-- Tab panes -->
									<div class="tab-content">
											<div class="tab-pane active" id="noleidas" role="tabpanel">
												@if($noleidas)
												@foreach($noleidas as $noleida)
													<a href="#" data-rol="noleido" class="material-card">
														<small class="content-date">
															<i class="fa fa-clock-o mr-2"></i> {{$noleida->created_at}}
														</small>
														<div class="content-header-icon bl-red">
															<div class="header--icon">
																<i class="red fa fa-envelope-o fa-3x"></i>
															</div>
														</div>
														<div class="material-card-header">
															<div class="content-header-title">
																<h5 class="header--title">{{$noleida->data['text']}}</h5>
															</div>
														</div>
													</a>
													{!!Form::open(['route'=>['notificaciones.update', $noleida], 'method' => 'POST'])!!}
														{{method_field('PATCH')}}
														<input type="hidden" name="enlace" value="{{$noleida->data['link']}}" />
														{{csrf_field()}}
													{!!Form::close()!!}
												@endforeach
												@endif
											</div>
											<div class="tab-pane" id="leidas" role="tabpanel">
												@if($leidas)
													@foreach($leidas as $leida)
														<a href="#" data-rol="leido" data-id="{{$leida->id}}" class="material-card">
															<small class="content-date">
																<i class="fa fa-clock-o mr-2"></i> {{$leida->created_at}}
															</small>
															<div class="content-header-icon bl-red">
																<div class="header--icon">
																	<i class="red fa fa-times fa-3x"></i>
																</div>
															</div>
															<div class="material-card-header">
																<div class="content-header-title">
																	<h5  class="header--title">{{$leida->data['text']}}</h5>
																</div>
															</div>
														</a>
														{!!Form::open(['route'=>['notificaciones.destroy', $leida->id], 'method' => 'DELETE'])!!}
														<input type="hidden" name="enlace" value="{{$leida->data['link']}}" />
														{!!Form::close()!!}
													@endforeach
												@endif
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{asset('js/main/notificaciones.js')}}"></script>
@endsection
