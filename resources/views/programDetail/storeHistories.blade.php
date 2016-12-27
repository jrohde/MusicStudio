@extends('adminMain')

@section('title', 'Historial Programa')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		@if(session('status'))
			<div class="alert alert-danger text-center"><strong>{{session('status')}}</strong></div>
		@endif
		<h2 class="text-center" style="color:#DEBF45">Videos Historial</h2>
		<h4 class="text-center"> {{$program->name}} </h4>
		<hr>
			{!!Form::open(['route' => 'historialRadio.store', 'method' => 'post', 'data-parsley-validate' => '', 'id' => 'formVideos'])!!}
			<input type="hidden" class="form-control" name="id_history_prog" value="{{$program->id}}">

				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('link_video', 'Url:', ['class' => 'space-form white'])}}
				<div class="input-group">
					<span class="input-group-addon" id="basic_url">Soundcloud</span>
					{{Form::text('link_video', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => '', 'aria-describedby' => 'basic_url'])}}
				</div>

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
					<a href="{{action('ImgRadioProgController@index', $program)}}" class="btn btn-primary btn-sm btn-block">Gestiona Imagenes</a>
				</div>
				<div class="col-md-6">
					<a href=" {{action('VideoRadioProgController@index', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Links videos</a>
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
			@if(count($historiesRadio) >= 1)
				<table class="table">
					<thead>
						<th>Nombre:</th>
						<th>Acciones:</th>
					</thead>
					<tbody>
					@foreach($historiesRadio as $historyRadioProg)
						<tr>
							<td style="vertical-align: middle; font-weight: 600"> {{$historyRadioProg->name}} </td>
							<td>
								{!!Form::open(array('route' => array( 'historialRadio.destroy', $historyRadioProg->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
								{!!Form::close()!!}
							</td>
							<td>
								<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$historyRadioProg->id}}">Editar</a>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="{{ $historyRadioProg->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color: #313340;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar - {{ $historyRadioProg->name }}</h4>
									</div>
									<div class="modal-body">
										{!! Form::model($historyRadioProg, [ 'route' => ['historialRadio.update', $historyRadioProg->id], 'method' => 'PUT']) !!}
										<input type="hidden" class="form-control" name="id_history_prog" value="{{$program->id}}">
										{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
										{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

										<div class="row">
											<div class="col-md-12">
												{{Form::label('link_video', 'Url:', ['class' => 'space-form white'])}}
												<div class="input-group" id="videoInput_1">
													<span class="input-group-addon" id="basic_url">Soundcloud</span>
													{{Form::text('link_video', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => '', 'aria-describedby' => 'basic_url'])}}
												</div>
											</div>
										</div>
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
					<div class="alert alert-warning text-center"><strong>Tu programa todavía no tiene videos!</strong></div>
				@endif
			</div>
	</div>
	<div class="row">
		<div class="text-center">
			{!!$historiesRadio->render()!!}
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
