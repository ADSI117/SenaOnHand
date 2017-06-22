<!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="SenaOnHand, ADSI 117" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title','SenaOnHand')</title>
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/font-awesome.min.css')}}" />
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&amp;subset=latin-ext" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.min.css') }}">
	<link rel="stylesheet" href="{{asset('plugins/NowKit/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('plugins/NowKit/css/now-ui-kit.css')}}" />
	{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> --}}
	<link rel="stylesheet"  href="{{asset('plugins/animate/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('css/generales.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/componentes.css') }}" />
</head>
<body >
	<div id="wrapper">
		@yield('main')

		@yield('modal-control')
	</div>

	<script src="{{asset('js/AjaxRequest.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{{asset('plugins/NowKit/js/now-ui-kit.js')}}"></script>
	<script src="{{asset('plugins/NowKit/js/core/tether.min.js')}}"></script>
	<script src="{{asset('plugins/NowKit/js/core/bootstrap.min.js')}}"></script>
	{{-- <script src="{{asset('js/app.js')}}"></script> --}}
	<script src="{{asset('js/componentes/AlertasEmergentes.js')}}"></script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript">
		$(".chosen-select").chosen({
			disable_search_threshold: 10,
			no_results_text: "No hay resultados!",
			placeholder_text_single: "Seleccione una opcion"
		});
		$('#modal-control').on('shown.bs.modal', function (e) {
			// do something...
			$('body').css('padding-right', '0px');
		});
		$('#NewMessage').on('shown.bs.modal', function (e) {
			// do something...
			$('body').css('padding-right', '0px');
		});
	</script>
  @yield('js')

</body>
</html>
