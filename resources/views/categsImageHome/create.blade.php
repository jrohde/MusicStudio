@extends('adminMain')

@section('title', 'Crea Categoria Imagen')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<h2 class="text-center" style="color:#DEBF45">Categorias Imagenes</h2>
		<hr>
		@include('partials._messages')
			{!!Form::open(['action' => 'CategImageController@store', 'method' => 'POST', 'data-parsley-validate' => '', 'id' => 'formCategImage'])!!}
				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}
			<div class="row" style="margin-top: 25px;">
				<div class="col-md-6">
					{{Form::submit('Crear', ['class' => 'btn btn-success btn-block', 'space-form'])}}
				</div>
				<div class="col-md-6">
					<a href=" {{url('admin/imagenes/new')}}" class="btn btn-info btn-block" style="{{count($categsImage) > 0 ? '' : 'pointer-events:none; opacity:0.7'}}"> Agregar Imagen</a>
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@if(count($categsImage)>0)
	<div class="row" style="margin-top: 45px;">
		<div class="col-md-6 col-md-offset-3">
			<table class="table">
				<thead>
					<th>Nombre:</th>
					<th colspan="2">Acciones:</th>
				</thead>
				<tbody>
				@foreach($categsImage as $categImage)
					<tr>
						<td style="vertical-align: middle; font-weight: 600"> {{$categImage->name}} </td>
						<td>
						{!!Form::open(array('action' => array('CategImageController@destroy', $categImage->id), 'method' => 'DELETE', 'id' => 'formPrevent'))!!}
							{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
						{!!Form::close()!!}
						</td>
						<td>
							<a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#{{$categImage->id}}">Editar</a>
						</td>
					</tr>
					<!-- Modal -->
					<div class="modal fade" id="{{ $categImage->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content" style="background-color: #313340;">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Editar - {{ $categImage->name }}</h4>
								</div>
								<div class="modal-body">
									{!! Form::model($categImage, [ 'action' => ['CategImageController@update', $categImage->id], 'method' => 'PUT']) !!}
									{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
									{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

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
		</div>
	</div>
@else
	<div class="row" style="margin-top:25px">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-warning text-center"><strong>No hay Categorias! Agregar categorias para poder subir imagenes</strong></div>
		</div>
	</div>
@endif

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
