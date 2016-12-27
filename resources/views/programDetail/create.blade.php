@extends('adminMain')

@section('title', 'Crea Detalles Programa')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Detalles</h2>
		<h4 class="text-center"> {{$program->name}} </h4>
		<hr>
		@if(!count($radioProgs) > 0)
			{!!Form::open(['action' => ['ProgramDetailController@store', $program->id], 'method' => 'post', 'data-parsley-validate' => ''])!!}
				<input type="hidden" class="form-control" name="id_program" value="{{$program->id}}">

				{{Form::label('link_streaming', 'Link Streaming:', ['class' => 'space-form white'])}}
				{{Form::text('link_streaming',null, ['class' => "form-control", 'required' => ''])}}

				{{Form::label('intro', 'Introducción:',  ['class' => 'space-form white'])}}
				{{Form::textarea('intro',null, ['class' => 'form-control', 'rows' => '5', 'required' => ''])}}
				<br>
				<div class="row">
					<div class="col-md-12">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
				</div>
			{!!Form::close()!!}
		@else
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-6">
					<a href=" {{route('images.main', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona imagenes</a>
				</div>
				<div class="col-md-6">
					<a href=" {{route('videos.main', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Links Videos</a>
				</div>
			</div>
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-6">
					<a href=" {{route('historial.main', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Links Historial</a>
				</div>
				<div class="col-md-6">
					<a href=" {{route('conductores.main', $program)}} " class="btn btn-primary btn-sm btn-block">Gestiona Conductores</a>
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

			@foreach ($radioProgs as $radioProg)

			<table class="table">
				<thead>
					<th>Link:</th>
					<th>Descripción:</th>
					<th colspan="2">Acciones:</th>
				</thead>
				<tbody>
					<tr>
						<td style="vertical-align: middle; font-weight: 600"> {{$radioProg->link_streaming}} </td>
						<td style="vertical-align: middle; font-weight: 600"> {{substr($radioProg->intro, 0, 30)}} {{strlen($radioProg->intro) > 30 ? '...' : ''}} </td>
						<td>
							{!!Form::open(array('action' => array( 'ProgramDetailController@destroy', $radioProg->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
							{!!Form::close()!!}
						</td>
						<td>
							<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$radioProg->id}}">Editar</a>
						</td>
					</tr>
					<!-- Modal -->
					<div class="modal fade" id="{{ $radioProg->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						 <div class="modal-dialog" role="document">
							  <div class="modal-content" style="background-color: #313340;">
									<div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										 <h4 class="modal-title" id="myModalLabel">Editar {{ $radioProg->name }}</h4>
									</div>
									<div class="modal-body">
										 {!! Form::model($radioProg, ['action' => ['ProgramDetailController@update', $radioProg->id], 'method' => 'PUT']) !!}
												<input type="hidden" name="id_program" value="{{ $program->id }}">
												{{Form::label('link_streaming', 'Link Streaming:', ['class' => 'space-form white'])}}
												{{Form::text('link_streaming',null, ['class' => 'form-control', 'required' => ''])}}

												{{Form::label('intro', 'Introducción:',  ['class' => 'space-form white'])}}
												{{Form::textarea('intro',null, ['class' => 'form-control', 'rows' => '5', 'required' => ''])}}
									</div>
									<div class="modal-footer">
									  {{ Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) }}
									</div>
									{!! Form::close() !!}
							  </div>
						 </div>
					</div>
				</tbody>
			</table>
			@endforeach

			@endif
		</div>
	</div>

@stop
