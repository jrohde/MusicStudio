@extends('adminMain')

@section('title', 'Modifica Evento')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Edita Evento</h2>
		<hr>

			{!!Form::model($evento, ['action' => ['EventController@update', $evento->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true])!!}
				<input type="hidden" class="form-control" name="id_program" value="">

				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('date', 'Data:', ['class' => 'space-form white'])}}
				{{Form::date('date',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('place', 'Lugar:', ['class' => 'space-form white'])}}
				{{Form::text('place',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('image', 'Imagen Evento:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control', 'required' => ''])}}

				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{route('admin.eventos.index')}} " class="btn btn-info btn-sm btn-block"> Volver a Eventos</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
