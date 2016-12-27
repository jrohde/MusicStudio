@extends('adminMain')

@section('title', '| Musica Producciones')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		@include('partials._messages')
		<h2 class="text-center" style="color:#DEBF45">Agrega Música</h2>
		<h4 class="text-center" style="color:#EAE4CC">{{$production->disc}}</h4>
		<hr>

		{!!Form::open(['action' => ['MusicProductionController@storeMusic', $production->id], 'method' => 'POST'])!!}

			<input type="hidden" name="id_music" value="{{$production->id}}">
			<div class="row">
				<div class="col-md-8">
					{{Form::label('name_spotify', 'Nombre Link Spotify:', ['class' => 'space-form white'])}}
					{{Form::text('name_spotify',null, ['class' => 'form-control dis'])}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					{{Form::label('link_spotify', 'Link Spotify:', ['class' => 'space-form white'])}}
					<div class="input-group">
					<span class="input-group-addon">@Spotify</span>
						{{Form::text('link_spotify', null, ['class' => 'form-control dis'])}}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					{{Form::label('name_soundcloud', 'Nombre Link soundcloud:', ['class' => 'space-form white'])}}
					{{Form::text('name_soundcloud',null, ['class' => 'form-control dis'])}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					{{Form::label('link_soundcloud', 'Link Soundcloud:', ['class' => 'space-form white'])}}
					<div class="input-group">
					<span class="input-group-addon">@soundcloud</span>
						{{Form::text('link_soundcloud', null, ['class' => 'form-control dis', 'data-parsley-type' => ''])}}
					</div>
				</div>
			</div>

			<div class="row" style="margin-top: 25px;">
				<div class="col-md-6">
					{{Form::submit('Guardar', ['class' => 'btn btn-success btn-sm btn-block dis', 'space-form'])}}
				</div>
				<div class="col-md-6">
					<a href=" {{url('admin/producciones')}} " class="btn btn-info btn-sm btn-block"> Volver a Producciones</a>
				</div>
			</div>

		{!!Form::close()!!}
	</div>
</div>
	<div class="row" style="margin-top: 45px;">
		<div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
		@if(count($musicsProduction) >= 1)
			<table class="table">
				<thead>
					<th>Nombre Spotify:</th>
					<th>Link Spotify:</th>
					<th>Nombre Soundcloud:</th>
					<th>Link SoundCloud:</th>
					<th colspan="2">Acciones:</th>
				</thead>
				<tbody>
				@foreach($musicsProduction as $musicProduction)
					<tr>
						<td style="font-weight: 600" class="td_music"> {{$musicProduction->name_spotify}} </td>
						<td style="font-weight: 600" class="td_music">
							@if(!empty($musicProduction->link_spotify))
								<img src="{{asset('img/ok.png')}}" class="img-responsive center-block" style="width: 25px;">
							@else
								<img src="{{asset('img/no.png')}}" class="img-responsive center-block" style="width: 25px;">
							@endif
						</td>
						<td style="font-weight: 600" class="td_music"> {{$musicProduction->name_soundcloud}} </td>
						<td style="font-weight: 600" class="td_music">
							@if(!empty($musicProduction->link_soundcloud))
								<img src="{{asset('img/ok.png')}}" class="img-responsive center-block" style="width: 25px;">
							@else
								<img src="{{asset('img/no.png')}}" class="img-responsive center-block" style="width: 25px;">
							@endif
						</td>
						<td>
							<a href=" {{action('MusicProductionController@getUpdate', [$production->id])}} "><span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#b9b9b9; font-size: 16px; margin-top: 8px;"></span></a>
						</td>
						<td>
							{!!Form::open(array('action' => array( 'MusicProductionController@destroyMusic', $musicProduction->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
								{{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#d9534f; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-xsSmall', 'id' => 'delete', 'style' => 'margin-top:8px; background-color:transparent'])}}
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@else
				<div class="alert alert-warning text-center"><strong>Todavía no agregaste música relativa a <span style="text-decoration: underline;">{{$production->disc}}</span>!</strong></div>
			@endif
		</div>
	</div>

@stop
@section('specificAdminJs')
	@include('partials._parsley')

	<script type="text/javascript">
		if ($('.td_music').length > 0) {
			$('input[type=text]').attr('disabled', true);
			$('input[type=submit]').attr('disabled', true);
		}
	</script>
@stop
