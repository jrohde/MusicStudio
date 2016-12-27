@extends('main')

@section('title', '| Programa Radio')

@section('content')

<div class="container intro" id="proyectos">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <h1 id="change-title">{{$program->name}}</h1>
                    <div class="row">
                        <div class="col-md-12 col-info-prog ">
                            <h2 class="info-prog">
                                <span>{{$program->day}}</span>
                                <span style="margin-left: 10px"> {{$program->time}} </span>
                            </h2>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="intro-p" id="change-p">
                @if($progDetail) {{$progDetail->intro}} @endif
            </p>
        </div>
        <div class="col-md-4 col-player col-btn-project radio-program">
            <button type="button" class="btn btn-default btn-block btn-radio-program" id="btn-fotos">Fotos</button>
            <button type="button" class="btn btn-default btn-block btn-radio-program" id="btn-videos">Videos</button>
            <button type="button" class="btn btn-default btn-block btn-radio-program" id="btn-historial">Historial</button>
        </div>
    </div>
</div>

<div class="container radio-program">
    <div class="row fotos-prog" style="display:none">
      @if(count($imgRadioPrograms) > 0)
           @foreach($imgRadioPrograms as $imgRadioProgram)
              <div class="col-md-3 col-img-prog">
                  <div class="image-wrapper overlay-fade-in">
                      <span class="thumbnail" style="margin:0; padding:5px; border:none">
                          <img src=" {{asset($imgRadioProgram->image)}} " class="img-responsive" style="min-height: 200px;">
                          <a href="{{asset($imgRadioProgram->image)}}" data-lightbox="{{$imgRadioProgram->id}}"><div class="image-overlay-content">
                                  <h2 id="lenteRadio"><i class="fa fa-search fa-4x"></i></h2>
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

    <div class="row videos-prog" style="display:none">
    @if(count($videoRadioProgs) > 0)
        @foreach($videoRadioProgs as $videoRadioProg)
            <div class="col-md-3 col-vid-prog">
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe width="300" height="150" class="embed-responsive-item" src="{{$videoRadioProg->basic_url}}{{$videoRadioProg->link_video}}" frameborder="0" allowfullscreen></iframe>
                </div>
                <h5> {{$videoRadioProg->name}} </h5>
            </div>
        @endforeach
    @else
        @include('partials._noData')
    @endif
    </div>
    <div class="row historial-prog" style="display:none">
      @if(count($historyRadioProgs) > 0)
          @foreach($historyRadioProgs as $historyRadioProg)
              <div class="col-md-3 col-hist-prog">
                  {{-- <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="{{$historyRadioProg->basic_url}}{{$historyRadioProg->link_video}}" frameborder="0" allowfullscreen></iframe>
                  </div>--}}
                  {{-- <iframe width="100%" height="166" scrolling="no" frameborder="no" src="{{$historyRadioProg->basic_url}}{{$historyRadioProg->link_video}}" frameborder="0" allowfullscreen></iframe> --}}
                  {!!html_entity_decode($historyRadioProg->link_video)!!}
                  <h5> {{$historyRadioProg->name}} </h5>
              </div>
          @endforeach
      @else
          @include('partials._noData')
      @endif
    </div>
</div>


<div class="row radio-program">
    <div class="container">
        <div class="col-md-12 col-container-prog">
            <div class="row conduce">
                <div class="col-md-12">
                    <h2 class="text-center">Quien conduce?</h2>
                </div>
            </div>
            <div class="row text-center">
                <ul class="list-inline">
                @if(count($conductorsRadio) > 0)
                    @foreach($conductorsRadio as $conductorRadio)
                            <li><img class="img-responsive img-thumbnail center-block img-conductor" src="{{ asset($conductorRadio->image)}}">
                            <h5 class="text-center nombre-conductor">{{ $conductorRadio->name }}</h5></li>
                    @endforeach
                @else
                    @include('partials._noData')
                @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="margin-top: 25px">
        <div class="col-md-12">
            <h2 class="text-center">Escuchanos en vivo <span class="visible-xs"> <small>Elegí tu dispositivo</small></span></h2>
        </div>
    </div>
    <div class="row">
        <iframe class="hidden-xs" src="{{ $progDetail->link_streaming }}" border="0" scrolling="NO" marginheight="0px" marginwidth="" allowtransparency="yes" frameborder="NO" height="240px" width="100%"></iframe>
        <div class="mobile"></div>
    </div>
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
 {{--    <div class="row comment" style="margin-top: 25px">
        <div class="col-md-8 col-md-offset-2">
            <section class="article-comment" style="margin-top: 25px;margin-bottom: 25px;">
                <h4>Son una masa!!</h4>
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
    <div class="row" style="margin-bottom: 45px; margin-top: 25px">
        <div class="col-md-8 col-md-offset-2">
        <h4>Deja tu comentario!</h4>
            <form method="" action="">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="Titulo" style="margin-bottom: 15px">
                    </div>
                </div>
                <textarea class="form-control" placeholder="Comentario" rows="6"  maxlength="300"></textarea>
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 25px">Comentar</button>
            </form>
        </div>
    </div> --}}
</div>

   @section('specificJs')
   <script type="text/javascript">

     if ($(window).width() < 768) {
       $('.mobile').html('<div class="col-xs-4" style="margin-top:25px"><a href="http://stream.shockmedia.com.ar:1935/radioeltridente/default.stream/playlist.m3u8" alt="Iphone"><img src="http://stream.shockmedia.com.ar/system/theme/Experience/images/iphone.gif" border="0" class="img-responsive center-block"/></a></div> <div class="col-xs-4" style="margin-top:25px"><a href="rtsp://stream.shockmedia.com.ar/radioeltridente/default.stream" alt="Android RTSP"><img src="http://stream.shockmedia.com.ar/system/theme/Experience/images/android.gif" border="0" class="img-responsive center-block"/></a></div><div class="col-xs-4" style="margin-top:25px"><a href="rtsp://stream.shockmedia.com.ar/radioeltridente/default.stream" alt="Blackberry" ><img src="http://stream.shockmedia.com.ar/system/theme/Experience/images/blackberry.gif" border="0" class="img-responsive center-block"/></a></div>');

     };

   </script>
   @stop

@stop
