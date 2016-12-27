@extends('adminMain')

@section('title', '| Musica Producciones')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Agrega Música</h2>
		<h4 class="text-center" style="color:#EAE4CC">{{$production->disc}}</h4>
		<hr>

		{!!Form::model($musicProduction, ['route' => ['musicProd.update', $musicProduction->id], 'method' => 'PUT'])!!}

			<input type="hidden" name="id_music" value="{{$production->id}}">
			<div class="row">
				<div class="col-md-8">
					{{Form::label('name_spotify', 'Nombre Link Spotify:', ['class' => 'space-form white'])}}
					{{Form::text('name_spotify',null, ['class' => 'form-control'])}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					{{Form::label('link_spotify', 'Link Spotify:', ['class' => 'space-form white'])}}
					<div class="input-group">
					<span class="input-group-addon">@Spotify</span>
						{{Form::text('link_spotify', null, ['class' => 'form-control'])}}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					{{Form::label('name_soundcloud', 'Nombre Link soundcloud:', ['class' => 'space-form'])}}
					{{Form::text('name_soundcloud',null, ['class' => 'form-control'])}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					{{Form::label('link_soundcloud', 'Link Soundcloud:', ['class' => 'space-form white'])}}
					<div class="input-group">
					<span class="input-group-addon">@soundcloud</span>
						{{Form::text('link_soundcloud', null, ['class' => 'form-control', 'data-parsley-type' => ''])}}
					</div>
				</div>
			</div>

			<div class="row" style="margin-top: 25px;">
				<div class="col-md-6">
					{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block', 'space-form'])}}
				</div>
				<div class="col-md-6">
					<a href=" {{route('musicProd.store', [$production->id])}} " class="btn btn-info btn-sm btn-block"> Volver a Música</a>
				</div>
			</div>

		{!!Form::close()!!}
	</div>
</div>

@stop
