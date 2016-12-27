@extends('adminMain')

@section('title', '| Todos los Posts')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1 style="color:#DEBF45">Todos los Posts</h1>
			<a href=" {{route('admin.posts.create')}} " class="btn btn-primary" style="margin-top: 15px">Crear nuevo Post</a>
		</div>
		<hr>
	</div> <!-- end of .row -->

	<div class="row" style="margin-top: 45px">
		@include('partials._messages')
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Titulo</th>
					<th>Autor</th>
					<th>Curpo</th>
					<th>Fecha alta</th>
					<th colspan="2">Acciones</th>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th style="color: #fff;">{{$post->title}}</th>
							<td>{{$post->author}}</td>
							<td>{{substr(strip_tags($post->body), 0, 100)}} {{strlen($post->body) ? '...' : ''}}</td>
							<td>{{ date('d-m-y H:i', strtotime($post->updated_at))}}</td>
							<td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-info btn-block">Ver</a></td>
							<td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning btn-block">Editar</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{{$posts->render()}}
			</div>
		</div>
	</div>

@stop
