<!DOCTYPE html>

	<html lang="es">

		<head>

			@include('partials._head')
			@yield('specificAdminLinks')

		</head>

		<body class="login">

			<div class="container" style="margin-bottom: 65px; margin-top: 15px">

				@yield('content')

			</div>
			@if(!Request::is('auth/login'))
			<nav class="navbar navbar-default navbar-fixed-bottom bottomAdmin">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center" style="padding-top:16px">
							<a href="{{ route('logout') }}" style="font-weight:600"> Logout </a>
							<span style="color:white"> | </span>
							<a href=" {{url('admin')}} " style="font-weight: 600;">Menu Inicio</a>
						</div>
					</div>
				</div>
			</nav>
			@endif
			@include('partials._footerAdmin')
			@yield('specificAdminJs')

		</body>

	</html>
