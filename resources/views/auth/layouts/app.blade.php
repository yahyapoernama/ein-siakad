<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }} - Login</title>
    <!--===============================================================================================-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	@stack('styles')
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/_login_v1/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/_login_v1/css/main.css') }}">
    <!--===============================================================================================-->
	@stack('custom-styles')
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('assets/img/favicon.png') }}" alt="IMG">
				</div>

				@yield('content')
			</div>
		</div>
	</div>
	
	

	
    <!--===============================================================================================-->	
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
	<script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	@stack('scripts')
    <!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
	@stack('custom-scripts')
</body>
</html>