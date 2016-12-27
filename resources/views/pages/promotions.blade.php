@extends('main')

@section('title', '| Promociones')

@section('content')

<div class="container intro" id="promociones">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <h1>Promociones</h1>
            <h3><small><em>Estudio de grabación</em></small></h3>
            <hr>
            <p class="intro-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
        </div>
    </div>
</div>
<div class="row jimi">
    <img src="{{url('img/crowd.png')}}" class="img-responsive crowd-img">
    <div class="container promociones animatedParent animateOnce">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center animated fadeIn">Jimi Hendrix</h1>
            <h3 class="text-center animated fadeIn">Todo para tocar con tu banda</h3>
            <div class="panel panel-default jimi animated fadeInUp">
                <div class="panel-body">
                    <ul class="list-group promos">
                        <li class="list-group-item"><span class="badge">4</span><span><img src="{{url('img/icons/mic.png')}}" class="img-responsive icon-items"></span>Microfonos Shure para voces </li>
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/cajas.png')}}" class="img-responsive icon-items"></span>Cajas de 300w cada una </li>
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/retornos.png')}}" class="img-responsive icon-items"></span>Retornos potenciados de 150w cada uno</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/consola.png')}}" class="img-responsive icon-items"></span>Consola 12 canales</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/potencia.png')}}" class="img-responsive icon-items"></span>Potencia 2500w</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/cables.png')}}" class="img-responsive icon-items"></span>Cableado y pies de microfono incluidos</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/people.png')}}" class="img-responsive icon-items"></span>Operador y stage</li>
                    </ul>
                    <p class="text-center price-p"><span class="price-promos">$ 5.900</span></p>
                    <input type="button" class="btn btn-primary btn-lg btn-block" value="Reserva Online" data-toggle="modal" data-target="#modalPromo">
                    <p class="text-left nb">Precio por 3 horas de servicio </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row migue-cacho">
    <div class="container promociones animatedParent animateOnce">
         <div class="col-md-6 col-cacho">
            <h2 class="panel-title text-center animated fadeIn">Cacho Castaña</h2>
            <h4 class="text-center animated fadeIn">Ideal para fiestas casamientos y cumpleaños</h4>
            <div class="panel panel-default migue-cacho animated fadeInUp">
                <div class="panel-body migue-cacho">
                    <ul class="list-group promos">
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/cajas.pn')}}g" class="img-responsive icon-items"></span>Cajas de 300w cada una</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/potencia.png')}}" class="img-responsive icon-items"></span>Potencia de 2500w</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/consola.png')}}" class="img-responsive icon-items"></span>Consola apta DJ o PC</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/people.png')}}" class="img-responsive icon-items"></span>Operadores incluidos</li>
                    </ul>
                    <p class="text-center price-p"><span class="price-promos">$ 2.900</span></p>
                    <input type="button" class="btn btn-info btn-lg btn-block" value="Reserva Online" data-toggle="modal" data-target="#modalPromo">
                    <p class="text-left nb">Precio por 3 horas de servicio </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-migue">
            <h2 class="panel-title text-center animated fadeIn">Miguel Abuelo</h2>
            <h4 class="text-center animated fadeIn">Especial para acusticos o shows intimos</h4>
            <div class="panel panel-default migue-cacho animated fadeInUp">
                <div class="panel-body migue-cacho">
                    <ul class="list-group promos">
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/retornos.png')}}" class="img-responsive icon-items"></span>Retornos potenciados 150w cada uno</li>
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/mic.png')}}" class="img-responsive icon-items"></span>Mics Shure</li>
                        <li class="list-group-item"><span class="badge">2</span><span><img src="{{url('img/icons/ampli.png')}}" class="img-responsive icon-items"></span>Cajas directas guitarra o teclado</li>
                        <li class="list-group-item"><span><img src="{{url('img/icons/people.png')}}" class="img-responsive icon-items"></span>Operadores incluidos</li>
                    </ul>
                    <p class="text-center price-p"><span class="price-promos">$ 1.900</span></p>
                    <input type="button" class="btn btn-info btn-lg btn-block" value="Reserva Online" data-toggle="modal" data-target="#modalPromo">
                    <p class="text-left nb">Precio por 3 horas de servicio </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row combo">
    <img src="img/lights.png" class="img-responsive band-img3">
    <!-- <img src="img/speaker-big.png" class="img-responsive band-img">
    <img src="img/stand-mic.png" class="img-responsive band-img2"> -->
    <div class="col-md-8 col-md-offset-2 col-combo animatedParent animateOnce">
        <h1 class="text-center animated tada">Arma tu Combo</h1>
        <div class="row combo-text">
            <div class="col-md-8 col-md-offset-2">
                <ul class="list-group text-center">
                  <li class="list-group-item list-group-item"><i class="fa fa-check" aria-hidden="true"></i> Completa los campos requeridos</li>
                </ul>
            </div>
        </div>
        <div class="row combo-text">
            <div class="col-md-8 col-md-offset-2">
                <ul class="list-group text-center">
                  <li class="list-group-item list-group-item"><i class="fa fa-check" aria-hidden="true"></i> Elegí la instrumentación que mas necesitás</li>
                </ul>
            </div>
        </div>
        <div class="row combo-text">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group text-center">
                  <li class="list-group-item list-group-item"><i class="fa fa-check" aria-hidden="true"></i> Nos comuniqueremos con vos!</li>
                </ul>
            </div>
        </div>
        <div class="row combo-button">
            <div class="col-md-8 col-md-offset-2">
                <input type="button"class="btn btn-danger btn-lg btn-block" value="Let's Combo!">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row calendar" >
        <h2 class="text-center" style="margin-bottom: 35px;">Novedades</h2>
        <div class="row intro-panels">

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body single-event">
                            <div class="row">
                                <div class="col-md-3 col-date-event">
                                    <h4 class="text-center">{{date("d-m-y", strtotime($post->created_at))}}</h4>
                                    <hr style="margin-top: 8px; margin-bottom: 8px;">
                                    <h6 class="text-center">Autor:</h6>
                                    <h5 class="text-center">{{$post->author}}</h5>
                                </div>
                                <div class="col-md-9">
                                    <h4>{{substr($post->title, 0, 30)}} {{strlen($post->title) ? '...' : ''}}</h4>
                                    <p> {{substr(strip_tags($post->body), 0, 120)}} {{strlen($post->body) > 120 ? '...' : ''}} <a style="color:#444550; font-weight: 600;" href="{{route('post.single', $post->id)}}">Leer más</a></p>
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
</div>
<!--SECOND PARALLAX-->

<!-- <div class="row parallax-promociones" style="background-image: url('img/paral_vintage.jpg');">
    <div class="col-md-10 col-md-offset-1">
        <div class="intro-content">
            <div class="brand-name-subtext text-center">No te alcanza lo que...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
        </div>
    </div>
</div> --><!--END SECOND PARALLAX-->

@include('partials._modalPromo')

@stop
