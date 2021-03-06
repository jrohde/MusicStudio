@extends('adminMain')

@section('title', 'Crea Ficha Programa')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		@include('partials._messages')
		<h1 class="text-center" style="color:#DEBF45">Crea nueva ficha Programa</h1>
		<hr>
			{!!Form::open(['route' => 'admin.radio.store', 'method' => 'post', 'files' => true, 'data-parsley-validate' => ''])!!}

				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('day', 'Día:', ['class' => 'space-form white'])}}
				{{Form::select('day', array('Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes', 'Sabado' => 'Sabado', 'Domingo' => 'Domingo'), null, ['class' => 'form-control', 'placeholder' => 'Seleccióna...'])}}

				<div class="form-group">
				<label for="time" class="space-form"> Horario</label>
	                <div class='input-group date' id='datetimepicker3'>
	                    <input name="time" type='text' class="form-control" required/>
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-time"></span>
	                    </span>
	                </div>
	            </div>
		        <script type="text/javascript">
		            $(function () {
		                $('#datetimepicker3').datetimepicker({
		                    format: 'LT'
		                });
		            });
		        </script>

				{{Form::label('image', 'Imagen Ficha:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control', 'required' => ''])}}
				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Crear', ['class' => 'btn btn-success btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{route('admin.radio.index')}} " class="btn btn-info btn-block"> Volver al listado</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
