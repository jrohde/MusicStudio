@extends('adminMain')

@section('title', 'Conductores de Radio')

@section('content')
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Conductores</h2>
		<h4 class="text-center"> {{$program->name}} </h4>
		<hr>

			{!!Form::open(['action' => ['ConductorRadioController@storeConductor', $program->id], 'method' => 'post', 'files' => true, 'data-parsley-validate' => ''])!!}
				<input type="hidden" class="form-control" name="id_img_conduct" value="{{$program->id}}">

				{{Form::label('name', 'Nombre conductor:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('image', 'Imagen:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control', 'required' => ''])}}

				<br>
				<div class="row">
					<div class="col-md-12">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
				</div>
			{!!Form::close()!!}
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-12">
					<a href=" {{action('ImgRadioProgController@index', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Imagenes</a>
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
			<div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
			@if(count($conductorsRadio) > 0)
				<table class="table">
					<thead>
						<th>Nombre:</th>
						<th>Acciones:</th>
					</thead>
					<tbody>
					@foreach($conductorsRadio as $conductorRadio)
						<tr>
							<td style="vertical-align: middle; font-weight: 600"> {{$conductorRadio->name}} </td>
							<td>
								{!!Form::open(array('route' => array( 'conductores.destroy', $conductorRadio->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
								{!!Form::close()!!}
							</td>
							<td>
								<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$conductorRadio->id}}">Editar</a>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="{{ $conductorRadio->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							 <div class="modal-dialog" role="document">
								  <div class="modal-content" style="background-color: #313340;">
										<div class="modal-header">
											 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 <h4 class="modal-title" id="myModalLabel">Editar {{ $conductorRadio->name }}</h4>
										</div>
										<div class="modal-body">
											 {!! Form::model($conductorRadio, [ 'route' => ['conductores.update', $conductorRadio->id], 'method' => 'PUT']) !!}
												  <input type="hidden" name="id_img_conduct" value="{{ $program->id }}">
												  {{Form::label('name', 'Nombre conductor:', ['class' => 'space-form white'])}}
												  {{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

												  {{Form::label('image', 'Imagen:', ['class' => 'space-form white'])}}
								  				  {{Form::file('image',null, ['class' => 'form-control', 'required' => ''])}}
											 </div>
											 <div class="modal-footer">
												  {{ Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) }}
											 </div>
										{!! Form::close() !!}
								  </div>
							 </div>
						</div>
					@endforeach
					</tbody>
				</table>
				@else
					<div class="alert alert-warning text-center"><strong>Tu programa todavía no tiene Conductores!</strong></div>
				@endif
			</div>

	</div>
	<div class="row">
		<div class="text-center">
			{!!$conductorsRadio->render()!!}
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
