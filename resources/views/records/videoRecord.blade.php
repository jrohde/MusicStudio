@extends('main')

@section('title', '| Proyectos')

@section('content')

	<div class="container intro" id="proyectos" style="margin-top: 65px">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="row">
	                <div class="col-md-10">
	                    <h1 style="color:#DEBF45">{{$record->disc}}</h1>
	                    <h3><small><em>Videos de la grabación</em></small></h3>
	                </div>
	            </div>
	            <hr>
	        </div>
	    </div>
	</div>
	<div class="container" style="margin-bottom: 35px;">
		@if(count($recordVideos) > 0)
		<div class="row videos">
		    @foreach($recordVideos as $recordVideo)
		        <div class="col-md-3 col-vid-prog">
		            <div class="embed-responsive embed-responsive-4by3">
		                <iframe width="300" height="150" class="embed-responsive-item" src="{{$recordVideo->basic_url}}{{$recordVideo->link_video}}" frameborder="0" allowfullscreen></iframe>
		            </div>
		            <h5> {{$recordVideo->name}} </h5>
		        </div>
		    @endforeach
		   </div>
		@else
			@include('partials._noData')
		@endif
	</div>

@stop