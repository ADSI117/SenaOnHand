<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="SenaOnHand, ADSI 117 - yao yao">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>@yield('title','empresary') | panel de administrasion</title>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet"  href="{{asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/material/material.min.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/flexbox/flexboxgrid.min.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/font-awesome/font-awesome.min.css')}}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/generales.css') }}">
</head>
<body>

	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
	mdl-layout--fixed-header">
	@yield('navbar')

	<main class="mdl-layout__content">
		<div class="page-content">
			<div class="row center-xs">
				<div class="col-xs-10">
					<div class="box">
						<div class="yeild-titulo-content">
							<h3 class="f-left title-content">@yield('title-content--header')</h3>
							@yield('title-content')
						</div>

						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</main>

</div>
<script src="{{asset('plugins/material/material.min.js')}}"></script>
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

{{-- <script>
$('.selector').chosen({
search_contains: true,
no_results_text: 'No hay resultados',
placeholder_text_single: 'Seleccione una opcion'
});
</script> --}}
@yield('js')

</body>
</html>
