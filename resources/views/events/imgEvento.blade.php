@extends('main')

@section('title', '| Proyectos')

@section('content')

	<div class="container intro" id="proyectos">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="row">
	                <div class="col-md-10">
	                    <h1 style="color:#DEBF45">{{$evento->name}}</h1>
	                    <h3><small><em>Imagenes del evento</em></small></h3>
	                </div>
	            </div>
	            <hr>
	        </div>
	    </div>
	</div>
	<div class="container" style="margin-bottom: 45px;">
		@if(!empty($eventoImages))
		@foreach($eventoImages as $eventoImage)
			<div class="col-md-4" style="padding: 0;">
				<div class="image-wrapper overlay-fade-in">
					<span class="thumbnail" style="margin:0; padding:0; border:none">
						<img src="{{asset($eventoImage->image)}}" class="img-responsive" style="width: 400px; height:240px;">
						<a href="{{asset($eventoImage->image)}}" data-lightbox="{{$eventoImage->name}}" data-title="{{$eventoImage->name}}"><div class="image-overlay-content">
				        		<h2 id="lenteEvento"><i class="fa fa-search fa-4x"></i></h2>
				      		</div>
				      	</a>
					</span>
				</div>
			</div>
		@endforeach
		@endif
	</div>

@stop