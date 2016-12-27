@extends('AdminMain')

@section('title', '| Register')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		
			{!! Form::open() !!}
				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
				<br>
				{{ Form::label('email', 'Email: ') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
				<br>
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				<br>
				{{ Form::label('password_confirmation', 'Confirm Passowrd:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
				<br>
				<br>
				{{ Form::submit('Register', ['class' => 'btn btn-info btn-block']) }}

			{!! Form::close() !!}
		</div>
	</div>

@stop