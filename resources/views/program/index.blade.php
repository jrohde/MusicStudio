@extends('adminMain')

@section('title', '| Todos los Programas de Radio')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1 style="color:#DEBF45">Programas de Radio</h1>
			<a href=" {{route('admin.radio.create')}} " class="btn btn-primary btn-sm" style="margin-top: 15px">Crear nueva ficha Programa</a>
		</div>
		<hr>
	</div> <!-- end of .row -->

	<div class="row" style="margin-top: 45px">
		@include('partials._messages')
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Día/Hora</th>
					<th>Imagen</th>
					<th colspan="3" style="width: 60%">Acciones</th>
				</thead>
				<tbody>

				@foreach($programs as $program)
						<tr>
							<td> {{$program->name}} </td>
							<td> {{$program->day}} | {{$program->time}}</td>
							<!--<td> {{-- substr($program->intro,0, 120)--}} {{--strlen($program->intro) ? '...' : ''--}}</td>-->
							<td><img src=" {{asset($program->image)}} " class="img-responsive" style="width: 120px"></td>
							<td><a href="{{route('admin.radio.edit',  [$program->id])}}" class="btn btn-sm btn-warning btn-block">Editar ficha</a></td>
							<td><a href=" {{action('ProgramDetailController@index', [$program->id])}} " class="btn btn-success btn-sm btn-block">Administra contenido</a></td>
							<!-- <td><a href=" {{--action('ProgramDetailController@edit', $program->id)--}} " class="btn btn-success btn-block">Editar contenido</a></td> -->
							<td><a href=" {{route('admin.radio.show', [$program->id])}} " class="btn btn-sm btn-primary btn-block"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>
							<td>{{Form::open(array('route' => array('admin.radio.destroy', $program->id), 'method' => 'DELETE', 'id' => 'formPrevent'))}}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['class' => 'btn btn-danger btn-sm btn-block', 'type' => 'submit', 'space-form', 'id' => 'delete'])}}
							{{Form::close()}}</td>
						</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop