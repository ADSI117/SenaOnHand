<!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="SenaOnHand, ADSI 117" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title>@yield('title','empresary') | panel de administrasion</title>
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/font-awesome.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&amp;subset=latin-ext" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('plugins/NowKit/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/NowKit/css/now-ui-kit.css')}}">
	{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> --}}
	{{-- <link rel="stylesheet"  href="{{asset('plugins/chosen/chosen.css')}}"> --}}
	<link rel="stylesheet" href="{{ asset('css/generales.css') }}" />
</head>
<body>

	<div class="row">
		<div class="col-2 p-0">
			@yield('vNavbar')
		</div>
		<div class="col-10 p-0">
			@yield('hNavbar')

			<div class="container">
				<div class="row justify-content-center">
					<div class="col-10">
						<div class="row">
							<div class="col-8">
								<h3 class="title-header">@yield('title-content')</h3>
							</div>
							<div class="col-4">
								<div class="search-content">
									@yield('search-content')
								</div>
							</div>
						</div>
						@yield('content')
					</div>
				</div>
			</div>

		</div>
	</div>

	@yield('modal-control')

	<script src="{{asset('js/AjaxRequest.js')}}"></script>
	<script src="{{asset('plugins/nowkit/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('plugins/NowKit/js/now-ui-kit.js')}}"></script>
	<script src="{{asset('plugins/NowKit/js/core/tether.min.js')}}"></script>
	<script src="{{asset('plugins/NowKit/js/core/bootstrap.min.js')}}"></script>
	{{--
	<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
	<script src="https://unpkg.com/vue@2.3.3" charset="utf-8"></script>
	<script>
	$('.selector').chosen({
	search_contains: true,
	no_results_text: 'No hay resultados',
	placeholder_text_single: 'Seleccione una opcion'
});
</script> --}}
@yield('js')

</body>
</html>
