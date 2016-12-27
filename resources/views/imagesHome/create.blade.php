@extends('adminMain')

@section('title', 'Nueva Img Home')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<h2 class="text-center" style="color:#DEBF45">Nueva Imagen Home</h2>
		<hr>
		@include('partials._messages')
			{!!Form::open(['action' => 'ImageHomeController@store', 'method' => 'POST', 'data-parsley-validate' => '', 'id' => 'formCategImage', 'files' => true])!!}
				{{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
				{{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}
				<label class="space-form"> Seleccióna categoría </label>
				´<select name="id_categs" class="form-control" required="">
					@foreach($categorias as $categoria)
						<option value=" {{$categoria->id}} "> {{$categoria->name}} </option>
					@endforeach
				</select>
				{{Form::label('image', 'Imagen:', ['class' => 'space-form white'])}}
				{{Form::file('image',null, ['class' => 'form-control'])}}
			<div class="row" style="margin-top: 25px;">
				<div class="col-md-6">
					{{Form::submit('Agregar', ['class' => 'btn btn-success btn-block', 'space-form'])}}
				</div>
				<div class="col-md-6">
					<a href=" {{url('admin/imagenes')}} " class="btn btn-info btn-block"> Volver a categorias</a>
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	</div>

	<div class="row" style="margin-top: 45px;">
		<div class="col-md-6 col-md-offset-3">
			<table class="table">
				<thead>
					<th>Nombre:</th>
					<th>Categoria:</th>
					<th>Image:</th>
					<th>Acciones:</th>
				</thead>
				<tbody>
				@foreach($imagenesHome as $imageHome)
					<tr>
						<td style="vertical-align: middle; font-weight: 600"> {{$imageHome->name}} </td>
						<td style="vertical-align: middle; font-weight: 600"> {{$imageHome->cat}} </td>
						<td><img class="img-responsive" src=" {{asset($imageHome->img)}}" style="width: 100px;"></td>
						<td>
						{!!Form::open(array('action' => array('ImageHomeController@destroy', $imageHome->id), 'method' => 'DELETE', 'id' => 'formPrevent'))!!}
							{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px;"></span>',['class' => 'btn btn-xsSmall', 'type' =>'submit', 'id' => 'delete', 'style' => 'background-color:transparent;margin-top: 8px;'])}}
						{!!Form::close()!!}
						</td>
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
