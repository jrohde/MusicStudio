@extends('adminMain')

@section('title', 'Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				@include('partials._messages')
				<h3 style="color:#DEBF45">{{$post->title}}</h3>
				<h5>{{$post->author}}</h5>
				<h5>{{date('d-m-y H:i', strtotime($post->updated_at))}}</h5>
				<p>{!!$post->body!!}</p>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				{{ Form::open(array('route' => array('admin.posts.destroy', $post->id), 'method' => 'DELETE')) }}
					{{Form::submit('Borrar', ['class' => 'btn btn-danger btn-block', 'space-form'])}}
				{{Form::close()}}

			</div>
			<div class="col-md-4">
				<a href="{{route('admin.posts.index')}}" class="btn btn-info btn-block"> Volver al listado</a>
			</div>
		</div>
	</div>

@stop
