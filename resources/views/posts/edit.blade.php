@extends('adminMain')

@section('title', 'Editar post')

@section('specificAdminLinks')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>
		tinymce.init({
			selector:'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
@stop

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		@include('partials._messages')
		<h1 class="text-center" style="color:#DEBF45">Edita tu Post</h1>
		<hr>
			{!!Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT' , 'data-parsley-validate' => ''))!!}
				{{Form::label('title', 'Titulo:', ['class' => 'space-form white'])}}
				{{Form::text('title',null, ['class' => 'form-control'])}}
				{{Form::label('author', 'Autor:',  ['class' => 'space-form white'])}}
				{{Form::text('author',null, ['class' => 'form-control'])}}
				{{Form::label('body', 'Cuerpo:',  ['class' => 'space-form white'])}}
				{{Form::textarea('body',null, ['class' => 'form-control'])}}
				<br>
				<div class="row">
					<div class="col-md-6">
						{{Form::submit('Guardar modificaciones', ['class' => 'btn btn-success btn-block', 'space-form'])}}
					</div>
					<div class="col-md-6">
						<a href=" {{route('admin.posts.index')}} " class="btn btn-info btn-block"> Volver al listado</a>
					</div>
				</div>
			{!!Form::close()!!}
		</div>
	</div>

@stop
