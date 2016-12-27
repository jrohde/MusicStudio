@extends('adminMain')

@section('title', 'Videos Evento')

@section('content')
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Videos Evento</h2>
		<h4 class="text-center"> </h4>
		<hr>

		{!!Form::open(['route' => ['videosEvento.store', $evento->id], 'method' => 'POST', 'data-parsley-validate' => ''])!!}
			<input type="hidden" class="form-control" name="id_event" value="{{$evento->id}}">

				{{Form::label('name', 'Nombre video:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				<div class="row">
					<div class="col-md-12">
						{{Form::label('link_video', 'Codice Video:', ['class' => 'space-form white'])}}
						<div class="input-group" id="videoInput_1">
							<span class="input-group-addon" id="basic_url">https://www.youtube.com/embed/</span>
							{{Form::text('link_video', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => '', 'aria-describedby' => 'basic_url'])}}
						</div>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{route('admin.eventos.index')}} " class="btn btn-info btn-sm btn-block"> Volver a eventos</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
	<div class="row" style="margin-top: 45px;">
		<div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
			@if(count($eventoVideos) >= 1)
				<table class="table">
					<thead>
						<th>Nombre:</th>
						<th colspan="2">Acciones:</th>
					</thead>
					<tbody>
					@foreach($eventoVideos as $eventoVideo)
						<tr>
							<td style="vertical-align: middle; font-weight: 600"> {{$eventoVideo->name}} </td>
							<td>
								{!!Form::open(array('route' => array( 'videosEvento.destroy', $eventoVideo->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
								{!!Form::close()!!}
							</td>
							<td>
								<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$eventoVideo->id}}">Editar</a>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="{{ $eventoVideo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color: #313340;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar {{ $eventoVideo->name }}</h4>
									</div>
									<div class="modal-body">
										{!! Form::model($eventoVideo, [ 'route' => ['videosEvento.update', $eventoVideo->id], 'method' => 'PUT']) !!}
										<input type="hidden" name="id_event" value="{{ $evento->id }}">
										{{Form::label('name', 'Nombre video:', ['class' => 'space-form white'])}}
										{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

										<div class="row">
											<div class="col-md-12">
												{{Form::label('link_video', 'Codice Video:', ['class' => 'space-form white'])}}
												<div class="input-group" id="videoInput_1">
													<span class="input-group-addon" id="basic_url">https://www.youtube.com/embed/</span>
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
					<div class="alert alert-warning text-center"><strong>Tu evento todavía no tiene video!</strong></div>
				@endif
			</div>
	</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
