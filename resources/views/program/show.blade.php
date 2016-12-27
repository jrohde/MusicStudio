@extends('adminMain')

@section('title', 'Programa Radio')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('partials._messages')
			<h3 style="margin-bottom: 25px">Nombre:<span style="color:red;"> {{$program->name}} </span></h3>
			<h5>Día y Hora de programa:<span style="color:red;"> {{$program->day}} | {{$program->time}}</span></h5><br>
			<p><img src=" {{asset($program->image)}} " class="img-responsive" style="width: 180px"></p>
			<h5 style="margin-top: 25px">Introducción:</h5>
			<p>{{$progDetail}}</p>
			<table class="table">
				<thead>
					<th class="text-center">Imagenes:</th>
					<th class="text-center">Videos:</th>
					<th class="text-center">Historial: </th>
					<th class="text-center">Conductores: </th>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{count($imgRadioProgram)}}</td>
						<td class="text-center">{{count($videoRadioProg)}}</td>
						<td class="text-center">{{count($historyRadioProg)}}</td>
						<td class="text-center">{{count($conductorRadio)}}</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<a href="{{route('admin.radio.edit',  [$program->id])}}" class="btn btn-sm btn-warning btn-block"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			</div>
			<div class="col-md-4">
				<a href="{{route('admin.radio.index')}}" class="btn btn-info btn-sm btn-block"> Volver al listado</a>
			</div>
		</div> 
	</div>

@stop
