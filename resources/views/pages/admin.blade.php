@extends('adminMain')

@section('title', '| Admin Home')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
			@include('partials._messages')
		</div>
	</div>
</div>
<div class="row">
	<h2 class="text-center" style="text-decoration: underline;">Admin Home</h2>
</div>
<div class="row">
	<h4 class="text-center">Bienvenido {{Auth::user()->name}} </h4>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3 animatedParent animateOnce" data-sequence='80'>
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-5 col-md-offset-1">
				<a href="{{url('admin/promociones')}}" class="btn btn-warning btn-lg btn-block animated fadeInUp" data-id='1'>Promociones</a>
			</div>
			<div class="col-md-5">
				<a href="{{url('admin/articulos')}}" class="btn btn-danger btn-lg btn-block animated fadeInUp" data-id='2'>Artic. y Cat.</a>
			</div>
		</div>
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-5 col-md-offset-1">
				<a href="{{ url('admin/proyectos') }}" class="btn btn-danger btn-lg btn-block  animated fadeInUp" data-id='3'>Proyectos</a>
			</div>
			<div class="col-md-5">
				<a href="{{url('admin/radio')}}" class="btn btn-warning btn-lg btn-block  animated fadeInUp" data-id='4'>Radio</a>
			</div>
		</div>
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-5 col-md-offset-1">
				<a href="{{url('admin/posts')}}" class="btn btn-warning btn-lg btn-block  animated fadeInUp" data-id='5'>Blog</a>
			</div>
			<div class="col-md-5">
				<a href="{{url('admin/imagenes')}}" class="btn btn-danger btn-lg btn-block  animated fadeInUp" data-id='6'>Imagenes Home</a>
			</div>
		</div>
	</div>
</div>

@stop
