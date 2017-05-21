<html>
<head>
	<title>@yield('title','empresary') | panel de administrasion</title>
	<!-- <link rel="stylesheet"  href="{{asset('css/general.css')}}"> -->
	<link rel="stylesheet"  href="{{asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/material/material.min.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/flexbox/flexboxgrid.min.css')}}">
	<link rel="stylesheet"  href="{{asset('plugins/font-awesome/font-awesome.min.css')}}">
</head>
<body>
	@include('admin.template.partials.nave')

	<div class="">
		<h3 class="tex">@yield('nombre','nombre')</h3>
	</div>


	<section>

		@yield('content')

	</section>

	<script src="{{asset('plugins/material/material.min.js')}}"></script>
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>

	<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

	<script>
		$('.selector').chosen({
			search_contains: true,
			no_results_text: 'No hay resultados',
			placeholder_text_single: 'Seleccione una opcion'
		});
	</script>
	@yield('js')

</body>
</html>
