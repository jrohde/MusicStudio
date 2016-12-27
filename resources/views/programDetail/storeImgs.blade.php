@extends('adminMain')

@section('title', 'Imagenes Programa')

@section('content')
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Imagenes</h2>
		<h4 class="text-center"> {{$program->name}} </h4>
		<hr>

			{!!Form::open(['action' => ['ImgRadioProgController@storeImg', $program->id], 'method' => 'post', 'files' => true, 'data-parsley-validate' => ''])!!}
				<input type="hidden" class="form-control" name="id_img_prog" value="{{$program->id}}">

				{{Form::label('image', 'Imagenes Historial:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control'])}}
				<br>
				<div class="row">
					<div class="col-md-12">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
				</div>
			{!!Form::close()!!}
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-12">
					<a href=" {{action('ConductorRadioController@index', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Conductores</a>
				</div>
			</div>
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-6">
					<a href="{{action('VideoRadioProgController@index', $program)}}" class="btn btn-primary btn-sm btn-block">Gestiona Links Videos</a>
				</div>
				<div class="col-md-6">
					<a href=" {{action('HistoryRadioProgController@index', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Links Historial</a>
				</div>
			</div>
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-12">
					<a href=" {{route('admin.radio.index')}} " class="btn btn-info btn-sm btn-block"> Volver al listado</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 45px;">
	@if(count($imagesRadio) >= 1)
		@foreach($imagesRadio as $imgRadioProgram)
			<div class="col-md-2" style="margin-top: 15px;">
				<img src="{{asset($imgRadioProgram->image)}}" class="img-responsive center-block" style="width: 200px;height: 100px; border-radius:4px">
				{!!Form::open(array('route' => array( 'imgRadio.destroy', $imgRadioProgram->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
					{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-xsSmall', 'id' => 'delete', 'style' => 'margin-top:8px; background-color:transparent'])}}
				{!!Form::close()!!}
			</div>
		@endforeach
	@else
		<div class="alert alert-warning text-center"><strong>Tu programa todavía no tiene Imagenes!</strong></div>
	@endif
	</div>
	<div class="row">
		<div class="text-center">
			{!!$imagesRadio->render()!!}
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
