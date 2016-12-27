@extends('adminMain')

@section('title', 'Videos Producción')

@section('content')
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Videos Producción</h2>
		<h4 class="text-center"> {{$produccion->disc}} </h4>
		<hr>

		{!!Form::open(['route' => ['videosProd.store', $produccion->id], 'method' => 'POST', 'data-parsley-validate' => ''])!!}
			<input type="hidden" class="form-control" name="id_prod" value="{{$produccion->id}}">

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
						<a href=" {{route('admin.producciones.index')}} " class="btn btn-info btn-sm btn-block"> Volver a producciones</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
	<div class="row" style="margin-top: 45px;">
		<div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
			@if(count($prodVideos) >= 1)
				<table class="table">
					<thead>
						<th>Nombre:</th>
						<th colspan="2">Acciones:</th>
					</thead>
					<tbody>
					@foreach($prodVideos as $prodVideo)
						<tr>
							<td style="vertical-align: middle; font-weight: 600"> {{$prodVideo->name}} </td>
							<td>
								{!!Form::open(array('route' => array( 'videosProd.destroy', $prodVideo->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
									{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
								{!!Form::close()!!}
							</td>º
							<td>
								<a class="btn btn-warning btn-sm btn-block" href="" data-toggle="modal" name=" {{$prodVideo->id}} " data-target="#{{ $prodVideo->id }}">Editar</a>
							</td>
						</tr>
                        <!-- Modal -->
                        <div class="modal fade" id="{{ $prodVideo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color: #313340;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Editar {{ $prodVideo->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($prodVideo, [ 'route' => ['videosProd.update', $prodVideo->id], 'method' => 'PUT']) !!}
                                            <input type="hidden" name="id_prod" value="{{ $produccion->id }}">
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
					<div class="alert alert-warning text-center"><strong>Tu producción todavía no tiene video!</strong></div>
				@endif
			</div>
	</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
