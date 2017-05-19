
<html>
<head>
	<title>@yield('title','empresary') | panel de administrasion</title>
	<link rel="stylesheet"  href="{{asset('css/general.css')}}">
	

</head>
<body>
@include('admin.template.partials.nave')

<div class="">
	<h3 class="tex">@yield('nombre','nombre')</h3>
</div>


<section>

@yield('content') 

</section>

<script src="{{asset('plugins/jquery/js/jquery.js')}}"></script>
<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
    @yield('js')

</body>
</html>