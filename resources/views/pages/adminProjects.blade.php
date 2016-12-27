@extends('adminMain')

@section('title', 'Proyectos')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2 class="text-center" style="color:#DEBF45">Proyectos</h2>
	</div>
</div>
<div class="wrapper animatedParent animateOnce"  data-sequence='500'>
	<div class="row" style="margin-top: 45px;">
		<div class="col-md-4 col-md-offset-4">
			<a href="{{ route('admin.eventos.index') }}" class="btn btn-block btn-primary animated fadeInUp" data-id='1'> Evento</a>
		</div>
	</div>
	<div class="row" style="margin-top: 25px;">
		<div class="col-md-4 col-md-offset-4">
			<a href="{{url('admin/grabaciones')}}" class="btn btn-block btn-info animated fadeInUp" data-id='2'> Grabación</a>
		</div>
	</div>
	<div class="row" style="margin-top: 25px;">
		<div class="col-md-4 col-md-offset-4">
			<a href="{{url('admin/producciones')}}" class="btn btn-block btn-primary animated fadeInUp" data-id='3'> Producción</a>
		</div>
	</div>
</div>
@stop