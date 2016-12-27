@extends('main')

@section('title', '| Proyectos')

@section('content')

<div class="container intro" id="proyectos">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="change-title">Producciones</h1>
                    <h3><small><em id="change-sub">Nuestras Producciones y Grabaciones</em></small></h3>
                </div>
            </div>
            <hr>
            <p class="intro-p" id="change-p">Nuestras producciones y grabaciones ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-md-4 col-btn-project">
            <a type="button" class="btn btn-default btn-block btn-project btn-project-dark" id="btn-prod">Producciones y Grabaciones</a>
            <a type="button" class="btn btn-default btn-block btn-project" id="btn-event">Eventos</a>
            {{-- <a type="button" class="btn btn-default btn-block btn-project" id="btn-rec">Grabaciones</a> --}}
        </div>
    </div>
</div>
<div class="container proyectos">
<hr>
<!-- PROJECTS -->
    <div class="row projects">
    @if(!empty($producciones) || !empty($records))
        @foreach($producciones as $produccion)
            <div class="col-md-4">
                <div class="panel panel-default produccion">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$produccion->disc}}</h3>
                    </div>
                    <div class="panel-body">
                        <img src="{{asset($produccion->image)}}" class="img-responsive center-block">
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>Fecha Inicio: </strong>{{$produccion->date_start}}</li>
                            <li><strong>Fecha Finalización: </strong>{{$produccion->date_end}}</li>
                            <li><strong>Productores: </strong>{{$produccion->productors}}</li>
                            <li><strong>Integrantes: </strong>{{$produccion->integrantes}}</li>
                            <li><strong>Mezcla: </strong>{{$produccion->mixing}}</li>
                            <li><strong>Mastering: </strong>{{$produccion->mastering}}</li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="row" id="row-listen">
                            <div class="col-md-6 col-no-padding">
                                <a type="button" class="btn btn-block listen" value=""><i class="fa fa-music fa-2x" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-6 col-no-padding">
                                 <a type="button" class="btn btn-block picture" href="{{url('proyectos/producciones/imagenes', [$produccion->id])}}"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="row" id="row-btn-listen" style="display:none">
                            <div class="col-md-4 col-no-padding">
                                <a type="button" class="btn btn-block itunes" href="{{ url('proyectos/producciones/videos', [$produccion->id]) }}"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-4 col-no-padding">
                                <a type="button" class="btn btn-block {{empty($produccion->link_soundcloud) ? 'disabled red' : 'soundcloud'}}" target="_blank" href="{{$produccion->link_soundcloud}}"><i class="fa fa-soundcloud fa-2x" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-4 col-no-padding">
                                <a type="button" class="btn btn-block {{empty($produccion->link_spotify) ? 'disabled red' : 'spotify'}}" target="_blank" href="{{$produccion->link_spotify}}"><i class="fa fa-spotify fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        @endforeach

        <!-- GRABACIONES -->
        @foreach($records as $record)
              <div class="col-md-4">
                  <div class="panel panel-default produccion">
                      <div class="panel-heading">
                          <h3 class="panel-title">{{$record->disc}}</h3>
                      </div>
                      <div class="panel-body">
                          <img src="{{asset($record->image)}}" class="img-responsive center-block">
                          <hr>
                          <ul class="list-unstyled">
                              <li><strong>Fecha Inicio: </strong>{{$record->date_start}}</li>
                              <li><strong>Fecha Finalización: </strong>{{$record->date_end}}</li>
                              <li><strong>Productores: </strong>{{$record->productors}}</li>
                              <li><strong>Integrantes: </strong>{{$record->integrantes}}</li>
                              <li><strong>Mezcla: </strong>{{$record->mixing}}</li>
                              <li><strong>Mastering: </strong>{{$record->mastering}}</li>
                          </ul>
                      </div>
                      <div class="panel-footer">
                          <div class="row" id="row-listen">
                              <div class="col-md-6 col-no-padding">
                                  <a type="button" class="btn btn-block listen"><i class="fa fa-music fa-2x" aria-hidden="true"></i></a>
                              </div>
                              <div class="col-md-6 col-no-padding">
                                   <a type="button" class="btn btn-block picture"  href="{{ action('PagesController@getImgRecord', $record->id) }}"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></a>
                              </div>
                          </div>
                          <div class="row" id="row-btn-listen" style="display:none">
                              <div class="col-md-4 col-no-padding">
                                  <a type="button" class="btn btn-block itunes"  href="{{ action('PagesController@getVideoRecord', $record->id) }}"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                              </div>
                              <div class="col-md-4 col-no-padding">
                                  <a type="button" class="btn btn-block {{empty($record->link_soundcloud) ? 'disabled red' : 'soundcloud'}}" target="_blank" href="{{$record->link_soundcloud}}"><i class="fa fa-soundcloud fa-2x" aria-hidden="true"></i></a>
                              </div>
                              <div class="col-md-4 col-no-padding">
                                  <a type="button" class="btn btn-block {{empty($record->link_spotify) ? 'disabled red' : 'spotify'}}" target="_blank" href="{{$record->link_spotify}}"><i class="fa fa-spotify fa-2x" aria-hidden="true"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        @else
            @include('partials._noData')
        @endif
    </div>

    <!-- EVENTOS -->

    <div class="row events" style="display:none;">
     @if(!empty($eventos))
        @foreach($eventos as $evento)
            <div class="col-md-4">
                <div class="panel panel-default produccion">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$evento->name}}</h3>
                  </div>
                  <div class="panel-body">
                    <img src="{{asset($evento->image)}}" class="img-responsive center-block">
                    <hr>
                    <ul class="list-unstyled">
                        <li><strong>Fecha: </strong>{{$evento->date}}</li>
                        <li><strong>Lugar: </strong>{{$evento->place}}</li>
                    </ul>
                  </div>
                   <div class="panel-footer">
                        <div class="row" >
                            <div class="col-md-6 col-no-padding">
                                <a href="{{ url('proyectos/eventos/videos', [$evento->id]) }}" type="button" class="btn btn-block youtube" value=""><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-md-6 col-no-padding">
                                 <a href="{{url('proyectos/eventos/imagenes', [$evento->id])}}" type="button" class="btn btn-block picture" value=""><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        @endforeach
    @else
        @include('partials._noData')
    @endif
    </div>
</div>

@stop
