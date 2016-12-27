@extends('adminMain')

@section('title', 'Crea Producción')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Modifíca Producción</h2>
		<hr>

			{!!Form::model($production, ['route' => ['admin.producciones.update', $production->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true])!!}

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
		<div class="col-md-3">
			<a href=" {{url('admin')}} " class="btn btn-default pull-right" style="margin-top: 15px">Menu Inicio</a>
		</div>
	</div>
@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
