@extends('main')

@section('title', '| Proyectos')

@section('content')

	<div class="container intro" id="proyectos" style="margin-top: 65px">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="row">
	                <div class="col-md-10">
	                    <h1 style="color:#DEBF45">{{$record->disc}}</h1>
	                    <h3><small><em>Imagenes de la grabación</em></small></h3>
	                </div>
	            </div>
	            <hr>
	        </div>
	    </div>
	</div>
	<div class="container" style="margin-bottom: 45px;">
		@if(count($recordImages) > 0)
		@foreach($recordImages as $recordImage)
			<div class="col-md-4" style="padding: 0;">
				<div class="image-wrapper overlay-fade-in">
					<span class="thumbnail" style="margin:0; padding:0; border:none">
						<img src="{{asset($recordImage->image)}}" class="img-responsive" style="width: 400px; height:240px;">
						<a href="{{asset($recordImage->image)}}" data-lightbox="{{$recordImage->name}}" data-title="{{$recordImage->name}}"><div class="image-overlay-content">
				        		<h2 id="lenteEvento"><i class="fa fa-search fa-4x"></i></h2>
				      		</div>
				      	</a>
					</span>
				</div>
			</div>
		@endforeach
		@else
			@include('partials._noData')
		@endif
	</div>

@stop