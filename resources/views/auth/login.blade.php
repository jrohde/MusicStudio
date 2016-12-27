@extends('adminMain')

@section('title', '| Login')

@section('content')

	<div class="row animatedParent animateOnce" style="margin-top: 10%;" id="rowLogin">
		<div class="col-md-6 col-md-offset-3">
			@include('partials._messages')
			<div class="panel panel-danger animated fadeInUpShort go" style="background-color:#444550; border:none">
				<div class="panel-heading">
			    	<h2 class="panel-title text-center" style="color:#A24242"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login Administrador</h2>
			  	</div>
			  	<div class="panel-body">
				    {!! Form::open(['id' => 'formAdmin', 'data-parsley-validate' => '']) !!}
					    {{ Form::label('email', 'Email: ', ['style' => 'color:#fff']) }}
						{{ Form::email('email', null, ['class' => 'form-control', 'data-parsley-required' => '', 'data-parsley-type' => 'email']) }}
						<br>
						{{ Form::label('password', 'Password: ', ['style' => 'color:#fff']) }}
						{{ Form::password('password', ['class' => 'form-control', 'data-parsley-required' => '']) }}
						<br>
						<div class="g-recaptcha" data-sitekey="6LeuQiYTAAAAAKhxUUxk9v2JyaCOnZPR6TplPt2G" style="margin-bottom: 15px;"></div>
						<ul id="errore-captcha" style="color:white; display:none;"></ul>
						{{ Form::submit('Login', ['class' => 'btn btn-danger btn-block']) }}

					{!! Form::close() !!}
			  	</div>
			</div>
		</div>
	</div>

@section('specificAdminJs')
<script>
	$(document).ready(function(){
		$('#formAdmin').submit(function(event){
			var verified = grecaptcha.getResponse();
			if (verified.length === 0) {
				event.preventDefault();
				$('#errore-captcha').show(0, function(){
					$(this).html('<li>El campo captcha es obligatorio</li>');
				});
			}
		})
	});
</script>
@stop

@stop
