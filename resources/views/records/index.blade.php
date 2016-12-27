@extends('adminMain')

@section('title', 'Crea Grabación')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Nueva Grabación</h2>
		<hr>

			{!!Form::open(['action' => 'RecordController@store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true])!!}
				<input type="hidden" class="form-control" name="id_program" value="">

				{{Form::label('disc', 'Nombre Disco:', ['class' => 'space-form white'])}}
				{{Form::text('disc',null, ['class' => 'form-control', 'required' => ''])}}

				<div class="row">
					<div class="col-md-6">
						{{Form::label('date_start', 'Fecha Inicio:', ['class' => 'space-form white'])}}
						{{Form::date('date_start',null, ['class' => 'form-control', 'required' => ''])}}
					</div>
					<div class="col-md-6">
						{{Form::label('date_end', 'Fecha Finalización:', ['class' => 'space-form white'])}}
						{{Form::date('date_end',null, ['class' => 'form-control', 'required' => ''])}}
					</div>
				</div>

				{{Form::label('productors', 'Productores:', ['class' => 'space-form white'])}}
				{{Form::text('productors',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('integrantes', 'Integrantes:', ['class' => 'space-form white'])}}
				{{Form::text('integrantes',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('mixing', 'Mezcla:', ['class' => 'space-form white'])}}
				{{Form::text('mixing',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('mastering', 'Mastering:', ['class' => 'space-form white'])}}
				{{Form::text('mastering',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('image', 'Imagen Disco:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control', 'required' => ''])}}

				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{url('admin/proyectos')}} " class="btn btn-info btn-sm btn-block"> Volver a Proyectos</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>

			<div class="row" style="margin-top: 45px;">
				<div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
				@if(count($records) >= 1)
					<table class="table">
						<thead>
							<th>Imagen:</th>
							<th>Disco:</th>
							<th>Fecha Inicio:</th>
							<th>Productores:</th>
							<th colspan="4">Acciones:</th>
						</thead>
						<tbody>
						@foreach($records as $record)
							<tr>
								<td style="vertical-align: middle; font-weight: 600"> <img src="{{asset($record->image)}}" class="img-responsive" style="width: 100px"> </td>
								<td style="font-weight: 600"> {{$record->disc}} </td>
								<td style="font-weight: 600"> {{$record->date_start}} </td>
								<td style="font-weight: 600"> {{substr($record->productors, 0, 20)}} {{strlen($record->productors) ? '...' : ''}} </td>
								<td>
									<a href=" {{route( 'admin.grabaciones.edit' ,[$record->id])}} "><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									<a href=" {{action( 'MusicRecordController@index', [$record->id])}} "><span class="glyphicon glyphicon-music" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									<a href=" {{action( 'RecordVideoController@index', [$record->id])}} "><span class="glyphicon glyphicon-film" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									<a href=" {{action( 'RecordImageController@index', [$record->id])}} "><span class="glyphicon glyphicon-picture" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									{!!Form::open(array('action' => array( 'RecordController@destroy', $record->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
										{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-xsSmall', 'id' => 'delete', 'style' => 'margin-top:8px; background-color:transparent'])}}
									{!!Form::close()!!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-warning text-center"><strong>Todavía no tenés grabaciones!</strong></div>
					@endif
				</div>
			</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
