@extends('adminMain')

@section('title', 'Videos Programa')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		@if(session('status'))
			<div class="alert alert-danger text-center"><strong>{{session('status')}}</strong></div>
		@endif
		<h2 class="text-center" style="color:#DEBF45">Videos</h2>
		<h4 class="text-center"> {{$program->name}} </h4>
		<hr>
			{!!Form::open(['route' => 'videosRadio.store', 'method' => 'post', 'data-parsley-validate' => '', 'id' => 'formVideos'])!!}
			<input type="hidden" class="form-control" name="id_video_prog" value="{{$program->id}}">

				{{Form::label('name', 'Nombre video:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				<div class="row">
					<div class="col-md-12">
						{{Form::label('link_video', 'Codice Video:', ['class' => 'space-form white'])}}
						<div class="input-group" id="videoInput_1">
							<span class="input-group-addon" id="basic_url">https://www.youtube.com/embed/</span>
							{{Form::text('link_video', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => '', 'aria-describedby' => 'basic_url'])}}
						</div>
						<div id="newVideo"></div>
					</div>
					<!-- <div class="col-md-2" style="margin-top:30px">
						<button type="button" class="btn btn-default btn-xs" id="btnMas" style="padding: 5px 8px;margin-top: 15px; background-color: #C5C5C5;">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:white"></span>
						</button>
					</div> -->
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
			@if(count($videosRadio) >= 1)
				<table class="table">
					<thead>
						<th>Nombre:</th>
						<th colspan="2">Acciones:</th>
					</thead>
					<tbody>
					@foreach($videosRadio as $videoRadioProg)
						<tr>
							<td style="vertical-align: middle; font-weight: 600"> {{$videoRadioProg->name}} </td>
							<td>
								{!!Form::open(array('route' => array( 'videoRadio.destroy', $videoRadioProg->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
								{!!Form::close()!!}
							</td>
							<td>
								<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$videoRadioProg->id}}">Editar</a>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="{{ $videoRadioProg->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color: #313340;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar - {{ $videoRadioProg->name }}</h4>
									</div>
									<div class="modal-body">
										{!! Form::model($videoRadioProg, [ 'route' => ['videoRadio.update', $videoRadioProg->id], 'method' => 'PUT']) !!}
										<input type="hidden" class="form-control" name="id_video_prog" value="{{$program->id}}">
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
					<div class="alert alert-warning text-center"><strong>Tu programa todavía no tiene videos!</strong></div>
				@endif
			</div>
	</div>
	<div class="row">
		<div class="text-center">
			{!!$videosRadio->render()!!}
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
<script>
// var counter = 1;
 // $('#btnMas').on('click', function(){
 // 	var video = $('#videoInput_1');
 // 	if(counter < 5){
 // 		counter++;
 // 		video.clone()
 // 		.attr('id', 'videoInput_' + counter)
 // 		.addClass('space-form')
 // 		.appendTo('#newVideo')
 // 		.find('input[type="text"]')
 // 		.attr('name', 'link_video_' + counter)
 // 		.attr('id', 'link_video_' + counter)
 // 		.val('');
 // 	}
 // });
</script>
