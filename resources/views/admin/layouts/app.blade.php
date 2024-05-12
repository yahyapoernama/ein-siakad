<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Ein - Siakad">
	<meta name="author" content="Yahya Poernama">
	<meta name="keywords" content="administration, siakad">
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" />
	<title>{{ config('app.name') . (isset($titlePage) ?  ' - ' . $titlePage : null) }}</title>
	@include('admin.layouts.style')
</head>

<body>
	<div class="wrapper">
		@include('admin.layouts.sidebar')
		<div class="main">
			@include('admin.layouts.navbar')
			<main class="content">
				<div class="container-fluid p-0">
					<div class="row mb-2 mb-xl-3">
						@yield('header')
					</div>
					@yield('content')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="{{ route('admin.dashboard') }}" class="text-muted"><strong>Ein Siakad</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	@include('admin.layouts.scripts')

</body>

</html>