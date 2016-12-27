@extends('main')

@section('title', '| Blog')

@section('content')

<div class="container intro">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <h1>News</h1>
            <h3><small><em>Ullamco laboris ut</em></small></h3>
            <hr>
            <p class="intro-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 25px;margin-bottom: 25px;">
	<div class="col-md-4 col-md-push-4">
		{!!Form::open(['route' => 'blog.main', 'method' => 'get', 'id' => 'formPosts'])!!}
			<div class="input-group">
				{{Form::text('term', null, ['class' => 'form-control input-lg', 'placeholder' => 'Search...', 'id' => 'term'])}}
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			    </span>
			</div><!-- /input-group -->
		{!!Form::close()!!}
	</div>
</div>
<div class="container blog-posts">
	@if(count($posts) >= 1)
		@if(Request::get('term'))
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-success text-center"><strong>Hemos econtrado <span style="font-size: 22px;text-transform: uppercase;">{{count(Request::get('term'))}}</span> post relativos a tu busqueda</strong></div>
				</div>
			</div>
		@endif
		@foreach($posts as $post)
	    <div class="row posts">
	    	<div class="col-xs-12 col-md-10 col-md-offset-1">
	    		 <div class="col-xs-12 col-md-8 col-md-offset-2" style="padding-left:0; padding-right: 0;">
	    		 	<div class="panel panel-default post">
					  	<div class="panel-heading">
					    	<h3 class="panel-title">{{$post->title}}</h3>
					  	</div>
					 	 <div class="panel-body">
					    	<section class="section-blog">
				                <p><small><em><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$post->author}} <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{date("d-m-y H:i", strtotime($post->created_at))}} </em></small></p>
				                <p class="p-blog">{{substr(strip_tags($post->body), 0, 180)}} {{strlen($post->body) > 180 ? '...' : ''}} </p>
				                <div class="row">
				                	<div class="col-md-3">
				                		 <a href="{{route('post.single', $post->id)}}" type="button" class="btn btn-default btn-project-dark btn-block">Leer Mas</a>
				                	</div>
				                	<div class="col-md-4">
				                		 <ul class="list-inline">
				                		 	<li><strong>Share: </strong></li>
				                		 	<li style="padding-left: 0;"><a href="#"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a></li>
				                		 	<li  style="padding-left: 0;"><a href="#"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a></li>
				                		 </ul>
				                	</div>
				                </div>
				            </section>
					  	</div>
					</div>
		        </div>
	    	</div>
	    </div><!--END ROW POST-->
		@endforeach
	@else
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-warning text-center"><strong>Ningun post encontrado relativo a <span style="font-size: 22px;text-transform: uppercase;">{{Request::get('term')}}</span></strong></div>
		</div>
	</div>
	@endif
	<div class="text-center">
		{{$posts->render()}}
	</div>

</div><!--END CONTAINER BLOG-POSTS-->

@section('specificJs')
	<script>

		// $('#formPosts').submit(function(event) {
		// 	event.preventDefault();
		// 	$.ajax({
		// 		url: $(this).attr('action'),
		// 		method: $(this).attr('method'),
		// 		data:{term: $('#term').val()},
		// 		//dataType: 'Json',
		// 		success:function(rta){
		// 			if (rta.success == true) {
		// 				$('.post').each(function(){
		// 					var valor = $('#term').val();
		// 					$('.post:contains("'+valor+'")').hide();

		// 				});
		// 			}
		// 		}
		// 	});
		// });

	</script>
@stop

@stop
