@extends('main')

@section('title', '| Proyectos')

@section('content')

	<div class="container intro" id="proyectos">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="row">
	                <div class="col-md-10">
	                    <h1 style="color:#DEBF45">{{$evento->name}}</h1>
	                    <h3><small><em>Videos del evento</em></small></h3>
	                </div>
	            </div>
	            <hr>
	        </div>
	    </div>
	</div>
	<div class="container" style="margin-bottom: 45px;">
		
		@if(count($eventoVideos) > 0)
		<div class="row videos">
		    @foreach($eventoVideos as $eventoVideo)
		        <div class="col-md-3 col-vid-prog">
		            <div class="embed-responsive embed-responsive-4by3">
		                <iframe width="300" height="150" class="embed-responsive-item" src="{{$eventoVideo->basic_url}}{{$eventoVideo->link_video}}" frameborder="0" allowfullscreen></iframe>
		            </div>
		            <h5> {{$eventoVideo->name}} </h5>
		        </div>
		    @endforeach
		   </div>
		@else
			@include('partials._noData')
		@endif
	</div>

@stop
