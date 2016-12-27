@extends('adminMain')

@section('title', 'Crea Evento')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Nuevo Evento</h2>
		<hr>

			{!!Form::open(['action' => 'EventController@store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true])!!}
				<input type="hidden" class="form-control" name="id_program" value="">

				{{Form::label('name', 'Nombre:', ['class' => 'space-form'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('date', 'Fecha:', ['class' => 'space-form'])}}
				{{Form::date('date',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('place', 'Lugar:', ['class' => 'space-form'])}}
				{{Form::text('place',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('image', 'Imagen Evento:', ['class' => 'space-form'])}}
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
				@if(count($eventos) >= 1)
					<table class="table">
						<thead>
							<th>Nombre:</th>
							<th>Fecha:</th>
							<th>Lugar:</th>
							<th colspan="4">Acciones:</th>
						</thead>
						<tbody>
						@foreach($eventos as $evento)
							<tr>
								<td style="vertical-align: middle; font-weight: 600"> {{$evento->name}} </td>
								<td style="vertical-align: middle; font-weight: 600"> {{$evento->date}} </td>
								<td style="vertical-align: middle; font-weight: 600"> {{$evento->place}} </td>
								<td>
									<a href=" {{route( 'admin.eventos.edit' ,[$evento->id])}} "><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									<a href=" {{action( 'EventImageController@index', [$evento->id])}} "><span class="glyphicon glyphicon-picture" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									<a href=" {{action( 'EventVideoController@index' ,[$evento->id])}} "><span class="glyphicon glyphicon-film" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
								</td>
								<td>
									{!!Form::open(array('action' => array( 'EventController@destroy', $evento->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
										{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-xsSmall', 'id' => 'delete', 'style' => 'margin-top:8px; background-color:transparent'])}}
									{!!Form::close()!!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-warning text-center"><strong>Todavía no tenés eventos!</strong></div>
					@endif
				</div>
			</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop