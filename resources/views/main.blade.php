<!DOCTYPE html>

	<html lang="es">

		<head>

			@include('partials._head')

		</head>

		<body id="page-top">

			@include('partials._nav')

			@include('partials._header')

				<div class="container-fluid general">

					@yield('content')

				</div>
			
			@include('partials._footer')

			@yield('specificJs')

		</body>

	</html>