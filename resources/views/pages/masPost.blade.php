@extends('main')

@section('title', '| Titulo Post')

@section('content')

<div class="container intro" style="margin-top: 65px">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$post->title}}</h1>
            <hr>
        </div>
    </div>
</div>
<div class="container single-post">
    <div class="row posts">
    	<div class="col-md-12">
		 	<div class="col-md-10 col-md-offset-1">
	    		<section class="section-single-post">
	                <p><small><em><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$post->author}} <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{date("d-m-y H:i", strtotime($post->created_at))}} </em></small></p>
	                <p class="p-post">{!!$post->body!!}</p>
	                <div class="row">
	                	<div class="col-md-4">
	                		 <ul class="list-inline">
	                		 	<li><strong>Share: </strong></li>
	                		 	<li><a href="#"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a></li>
	                		 	<li><a href="#"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a></li>
	                		 </ul>
	                	</div>
	                </div>
            	</section>
            	<hr>
            	<div id="disqus_thread"></div>
				<script>
				    /**
				     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
				     */
				    /*
				    var disqus_config = function () {
				        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
				        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				    };
				    */
				    (function() {  // DON'T EDIT BELOW THIS LINE
				        var d = document, s = d.createElement('script');

				        s.src = '//tridente.disqus.com/embed.js';

				        s.setAttribute('data-timestamp', +new Date());
				        (d.head || d.body).appendChild(s);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
				<hr>
{{--             	 <div class="row comment" style="margin-top: 25px">
			        <div class="col-md-12">
			            <section class="article-comment">
			                <h4>Quieremos mas música</h4>
			                <p class="p-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			                <p><small><em><span style="font-weight: 600">Autor:</span><span> El Gabeee</span><br><span style="font-weight: 600">Horario: </span><span>17:35</span></em></small></p>
			            </section>
			        </div>
			    </div>
			    <div class="row" style="margin-bottom: 45px;">
			        <div class="col-md-12">
			        <h4>Deja tu comentario!</h4>
			            <form method="" action="">
			                <div class="row">
			                    <div class="col-md-8">
			                        <input type="text" class="form-control" placeholder="Titulo" style="margin-bottom: 15px">
			                    </div>
			                </div>
			                <textarea class="form-control" placeholder="Comentario" rows="6" maxlength="300"></textarea>
			                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 25px">Comentar</button>
			            </form>
			        </div>
			    </div> --}}
			</div>
        </div>
    </div><!--END ROW POST-->
</div><!--END CONTAINER BLOG-POSTS-->

@stop
