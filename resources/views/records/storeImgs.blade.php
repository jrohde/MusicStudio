@extends('adminMain')

@section('title', '| Imagenes Producción')

@section('content')
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Imagenes Grabación</h2>
		<h4 class="text-center"> {{$record->disc}} </h4>
		<hr>

			{!!Form::open(['action' => ['RecordImageController@storeImg', $record->id], 'method' => 'post', 'files' => true, 'data-parsley-validate' => ''])!!}
				<input type="hidden" class="form-control" name="id_rec" value="{{$record->id}}"><!--id_rec è === a $evento->id-->

				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}

				{{Form::label('image', 'Imagen:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control'])}}
				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{route('admin.grabaciones.index')}} " class="btn btn-info btn-sm btn-block"> Volver a grabaciones</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
	<div class="row" style="margin-top: 45px;">
		@if(count($recordImages) >= 1)
			@foreach($recordImages as $recordImage)
				<div class="col-md-2" style="margin-top: 15px;">
					<img src="{{asset($recordImage->image)}}" class="img-responsive center-block" style="width: 200px;height: 100px; border-radius:4px">
					{!!Form::open(array('route' => array( 'imagesRec.destroy', $recordImage->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent', 'data-parsley-validate' => ''))!!}
						{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-xsSmall', 'id' => 'delete', 'style' => 'margin-top:8px; background-color:transparent', 'required' => ''])}}
					{!!Form::close()!!}
				</div>
			@endforeach
		@else
			<div class="alert alert-warning text-center"><strong>Tu grabación todavía no tiene Imagenes!</strong></div>
		@endif
	</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
